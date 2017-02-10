<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\Account;
use Session;

use Grids;
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

class ContactController extends Controller
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
                new EloquentDataProvider(
                    (new Contact)->newQuery()
                )
            )
            ->setName('contacts_grid')
            ->setColumns([
                /*(new FieldConfig)
                    ->setName('id')
                    ->setLabel('ID')
                    ->setSortable(true)
                    ->setSorting(Grid::SORT_ASC),*/
                (new FieldConfig)
                    ->setName('fullName')
                    ->setLabel('Name')
                    ->setCallback(function ($val, $row) {
                        $contact = $row->getSrc();
                        return $contact->fullName;
                    }),
                (new FieldConfig)
                    ->setName('email')
                    ->setSortable(true)
                    ->setCallback(function ($val) {
                        if(empty($val)) return "";
                        $icon = '<span class="glyphicon glyphicon-envelope"></span>';
                        $icon = HTML::decode(HTML::link("mailto:$val", $icon));
                        return
                            $icon." ".HTML::link("mailto:$val", $val);
                    }),
                (new FieldConfig)
                    ->setName('account_id')
                    ->setLabel('Account')
                    ->setCallback(function ($val, $row) {
                        $contact = $row->getSrc();
                        return $contact->account->name;
                    }),
                (new FieldConfig)
                    ->setName('actions')
                    ->setLabel(' ')
                    ->setCallback(function($val, $row){
                        $contact = $row->getSrc();

                        $buttons = 
                            "<div class='btn-group'>
                                <a href='mailto:".$contact->email."' class='btn btn-default btn-xs show-mobile'><i class='glyphicon glyphicon-envelope'></i></a>
                                <a href='".route('contacts.show', [$contact->id])."' class='btn btn-primary btn-xs'><i class='glyphicon glyphicon-eye-open'></i></a>
                                <a href='". route('contacts.edit', [$contact->id])."' class='btn btn-success btn-xs'><i class='glyphicon glyphicon-edit'></i></a>
                                <a href='". route('contacts.destroy', [$contact->id]) ."' data-delete=''  class='btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></a>
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
            ])
            ;
        $grid = (new Grid($cfg))->render();
        
        return view('contacts.index', compact('grid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = Account::pluck('name', 'id')->all();
        return view('contacts.create', ['accounts' => $accounts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'account_id' => 'required',
            'email' => 'required|email|max:255',
            'mainPhone' => 'required|max:255',
        ]);
        $input = $request->all();
        $contact = Contact::create($input);
        Session::flash('success','Contact added successfully.');
        return redirect(route('contacts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = $this->loadModel($id);
        return view('contacts.show')->with('contact', $contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = $this->loadModel($id);
        return view('contacts.edit')->with('contact', $contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'account_id' => 'required',
            'email' => 'required|email|max:255',
            'mainPhone' => 'required|max:255',
        ]);
        $input = $request->all();
        $contact = Contact::find($id);
        $contact->update($input);
        Session::flash('success','Contact updated successfully.');
        return redirect(route('contacts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = $this->loadModel($id);
        $contact->delete();
        Session::flash('success','Contact deleted successfully.');
        return redirect(route('contacts.index'));
    }
    
    private function loadModel($id){
        $model = Contact::find($id);
        if(empty($model)){
            Session::flash('error','Contact not found');
            return redirect(route('contacts.index'));
        }
        return $model;
    }
}
