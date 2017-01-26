<?php

namespace App\Http\Controllers;

use App\AccountShippingAddress;
use App\Contact;
use Illuminate\Http\Request;
use App\Account;
use App\User;
use Session;
use Exception;

use HTML;
use Form;
use Nayjest\Grids\Components\ColumnHeadersRow;
use Nayjest\Grids\Components\FiltersRow;
use Nayjest\Grids\Components\HtmlTag;
use Nayjest\Grids\Components\Laravel5\Pager;
use Nayjest\Grids\Components\OneCellRow;
use Nayjest\Grids\Components\ShowingRecords;
use Nayjest\Grids\Components\TFoot;
use Nayjest\Grids\Components\THead;
use Nayjest\Grids\EloquentDataProvider;
use Nayjest\Grids\FieldConfig;
use Nayjest\Grids\FilterConfig;
use Nayjest\Grids\Grid;
use Nayjest\Grids\GridConfig;

class AccountController extends Controller
{

    public function __construct(){
        $this->middleware(['role:admin|sales-rep']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cfg = (new GridConfig())
            ->setDataProvider(
                new EloquentDataProvider((new Account())->newQuery())
            )
            ->setColumns([
                (new FieldConfig)
                    ->setName('id')
                    ->setLabel('ID')
                    ->setSortable(true)
                    ->setSorting(Grid::SORT_ASC),
                (new FieldConfig)
                    ->setName('name')
                    ->setSortable(true)
                    ->addFilter(
                        (new FilterConfig)->setOperator(FilterConfig::OPERATOR_LIKE)
                    ),
                (new FieldConfig)
                    ->setName('actions')
                    ->setLabel('Actions')
                    ->setCallback(function($val, $row){
                        $account = $row->getSrc();
                        $buttons =
                            "<div class='btn-group'>
                                <!--a href='".route('accounts.show', [$account->id])."' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-eye-open'></i></a-->
                                <a href='". route('accounts.edit', [$account->id])."' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-edit'></i></a>
                                <a href='". route('accounts.destroy', [$account->id]) ."' data-delete=''  class='btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></a>
                            </div>";
                        return $buttons;
                    })

            ])
            ->setComponents([
                (new THead)
                    ->setComponents([
                        (new ColumnHeadersRow),
                        (new FiltersRow)
                    ]),
                (new TFoot)
                    ->setComponents([
                        (new OneCellRow)
                            ->setComponents([
                                new Pager,
                                (new HtmlTag)
                                    ->setAttributes(['class' => 'pull-right'])
                                    ->addComponent(new ShowingRecords),
                            ])
                    ])
            ]);
        $grid = (new Grid($cfg))->render();
        return view('accounts.index', compact('grid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
       // try{
            $data = json_decode($request->input()['data'], true);
            if(isset($data['id'])){
                $account = Account::find($data['id']);
            }else{
                $account = new Account();
            }
            $account->fill($data);
            $account->primarySalesRep_id = $data["primary_sales_rep"]["id"];
            $account->secondarySalesRep_id = $data["secondary_sales_rep"]["id"];
            $account->save();
            foreach($account->contacts as $contact){
                $contact->account_id = null;
                $contact->isPrimary = false;
                $contact->save();
            }
            foreach($data['contacts'] as $key => $contact){
                $dbContact = Contact::find($contact['id']);
                if($key == 0){
                    $dbContact->isPrimary = true;
                }else{
                    $dbContact->isPrimary = false;
                }
                $dbContact->account_id = $account->id;
                $dbContact->save();
            }

            foreach($account->shippingAddresses as $shippingAddress){
                if($account->shippingAddressSameAsBilling){
                    $shippingAddress->delete();
                    continue;
                }
                foreach($data['shipping_addresses'] as $shipping_address){
                    if(isset($shipping_address['id']) && $shipping_address['id'] == $shippingAddress->id){
                        continue 2;
                    }
                }
                $shippingAddress->delete();
            }
            foreach($data['shipping_addresses'] as $shipping_address){
                if(isset($shipping_address['id'])){
                    $dbAccountShippingAddress = AccountShippingAddress::find($shipping_address['id']);
                }else{
                    $dbAccountShippingAddress = new AccountShippingAddress();
                }
                $dbAccountShippingAddress->account_id = $account->id;
                $dbAccountShippingAddress->address = $shipping_address['address'];
                $dbAccountShippingAddress->save();
            }
            $response = ["success"=>true];
      //  }catch(Exception $ex){
      //      $response = ["success"=>false, "message"=>$ex->getMessage()];
      //  }
        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('accounts.edit')->with('id', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = $this->loadModel($id);
        $account->delete();
        Session::flash('success','Account deleted successfully.');
        return redirect(route('accounts.index'));
    }

    private function loadModel($id){
        $model = Account::find($id);
        if(empty($model)){
            Session::flash('error','Account not found');
            return redirect(route('accounts.index'));
        }
        return $model;
    }

    public function searchSalesRep($query){
        $users = User::whereHas('roles', function($q){
                $q->where('name','=','sales-rep');
            })
            ->where('name','LIKE', '%'.strtolower($query).'%')
            ->get();
        return response()->json($users);
    }
    public function searchContacts($query){
        $contacts = Contact::where('name','LIKE', '%'.strtolower($query).'%')
                            ->get();
        return response()->json($contacts);
    }
    public function getById($id){
        $account = Account::with([
                                    'primarySalesRep',
                                    'secondarySalesRep',
                                    'shippingAddresses' => function($query){
                                        $query->orderBy('id', 'asc');
                                    },
                                    'contacts'=>function($query){
                                        $query->orderBy('isPrimary', 'desc');
                                    }]
                                )->where('id','=',$id)->first();
        return response()->json($account);
    }
}
