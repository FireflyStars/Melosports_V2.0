<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('user_access')) {
            return abort(401);
        }

        $users = User::wherestatus(1)->get();
        $data['users']  = $users;
        $data['active_class']  = 'users';

        return view('admin.users.index', $data);
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('user_create')) {
            return abort(401);
        }
        $roles = \App\Role::get()->pluck('title', 'id')->prepend('Please select', '');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (! Gate::allows('user_create')) {
            return abort(401);
        }
$this->validate($request, [
		'email' => 'required|email|unique:users',
		'name' => 'required|max:35|regex:/^[a-zA-Z]+$/u',
		'password' => 'required|max:10',
]);		
	 //  $user = User::create($request->all());
	  
	//dd($request->all());

	$user = New User;
	  $user->name=$request->name;
	  $user->email=$request->email;
	  $user->password=Hash::make($request->password);
	  $user->role_id=2;
	  $user->status=1;
	  //$user->admin_type=2;
	  $user->save();
	
	           
		

        return redirect()->route('admin.users.index');
    }


    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
        $roles = \App\Role::get()->pluck('title', 'id')->prepend('Please select', '');

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->update($request->all());



        return redirect()->route('admin.users.index');
    }


    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('user_view')) {
            return abort(401);
        }
        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
    }


    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        $user = User::findOrFail($id);

         if(!env('DEMO_MODE')) {
        $user->delete();
       }

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
		
		/* echo "sfsd";
		exit; */
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {

                // if(!env('DEMO_MODE')) {
                $entry->delete();
               //}
            }
        }
    }

}
