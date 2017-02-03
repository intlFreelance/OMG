<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
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

class UserController extends Controller
{
    public function __construct(){
        $this->middleware(['role:admin']);
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
                    (new User)->newQuery()
                )
            )
            ->setColumns([
                (new FieldConfig)
                    ->setName('id')
                    ->setLabel('ID')
                    ->setSortable(true)
                    ->setSorting(Grid::SORT_ASC),
                (new FieldConfig)
                    ->setName('name')
                    ->setSortable(true),
                (new FieldConfig)
                    ->setName('email')
                    ->setSortable(true)
                    ->setCallback(function ($val) {
                        $icon = '<span class="glyphicon glyphicon-envelope"></span>';
                        $icon = HTML::decode(HTML::link("mailto:$val", $icon, ['class'=>'email-icon']));
                            return
                                $icon." ".HTML::link("mailto:$val", $val, ['class'=>'email-link']);
                        }),
                (new FieldConfig)
                    ->setName('roles')
                    ->setLabel('Roles')
                    ->setCallback(function($val, $row){
                        $user = $row->getSrc();
                        $str = "";
                        foreach($user->roles as $role)
                            $str .= "<li>$role->display_name</li>";
                        $str = "<ul>$str</ul>";
                        return $str;
                    }),
                (new FieldConfig)
                    ->setName('actions')
                    ->setLabel('Actions')
                    ->setCallback(function($val, $row){
                        $user = $row->getSrc();
                        $buttons = 
                            "<div class='btn-group'>".
                            "<a href='".route('users.show', [$user->id])."' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-eye-open'></i></a>
                            <a href='". route('users.edit', [$user->id])."' class='btn btn-default btn-xs'><i class='glyphicon glyphicon-edit'></i></a>
                            <a href='". route('users.destroy', [$user->id]) ."' data-delete=''  class='btn btn-danger btn-xs'><i class='glyphicon glyphicon-trash'></i></a>
                            ";
                        $buttons .= "</div>";
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
        
        return view('users.index', compact('grid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(var_dump($request->all()));
        $this->validate($request, [
            'name' => 'required|max:255',
            //'lastName' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password'=>'required|min:6|confirmed',
            'roles'=>'required|array|min:1'
        ]);
        $input = $request->all();
        $input["password"] = bcrypt($input["password"]);
        $user = User::create($input);
        foreach($input['roles'] as $roleId){
            $role = Role::find($roleId);
            $user->attachRole($role);
        }
        Session::flash('success','User added successfully.');
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            Session::flash('error','User not found');
            return redirect(route('users.index'));
        }
        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            Session::flash('error','User not found');
            return redirect(route('users.index'));
        }
        return view('users.edit')->with('user', $user);
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
        $user = User::find($id);
        if (empty($user)) {
          Session::flash('error','User not found');
          return redirect(route('users.index'));
        }
        
         $this->validate($request, [
            'name' => 'required|max:255',
            //'lastName' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,'.$id,
            'password'=>'min:6|confirmed',
            'roles'=>'required|array|min:1'
        ]);
         
        $input = $request->all();
        if(empty($input["password"])){
            unset($input["password"]);
        }else{
            $input["password"] = bcrypt($input["password"]);
        }
        $user = User::find($id);
        $user->update($input);
        $user->detachRoles();
        foreach($input['roles'] as $roleId){
            $role = Role::find($roleId);
            $user->attachRole($role);
        }
        Session::flash('success','User updated successfully.');
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (empty($user)) {
          Session::flash('error','User not found');
          return redirect(route('users.index'));
        }
        User::find($id)->delete();
        Session::flash('success','User deleted successfully.');
        return redirect(route('users.index'));
    }
}
