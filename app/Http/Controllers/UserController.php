<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Staff;

class UserController extends Controller
{

    public function index()
    {
        $user = User::find(3648);
        //$users = User::where('id', auth()->user()->id)->get();
        $users = \DB::table('users')->oldest()->get();
        return view('crud.users.index', compact('users', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.users.create');
    }

    public function store(Request $request)
    {
        $user = new User([
            'id'=>$request->get('id'),
            'firstname'=>$request->get('firstname'),
            'lastname'=>$request->get('lastname'),
            'email'=> $request->get('email'),
            'emergencyContact'=>$request->get('emergencyContact'),
            'seniority'=>$request->get('seniority'),
            'type'=> $request->get('type'),
            'password'=> bcrypt($request->get('password'))
        ]);

        $user->save();
        return redirect('/users');
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::where('id', $id)
                      ->first();

        return view('crud.users.edit', compact('user', 'id'));
    }

    public function singleEdit($id)
    {
        $user = User::where('id', $id)
                      ->first();

        return view('crud.users.update', compact('user', 'id'));
    }

    public function update(Request $request, $id)
    {
        $user = new User();
        $data = $this->validate($request, [
          'id'=>'required|integer|max:255',
          'firstName'=>'required|string|max:255',
          'lastName'=>'required|string|max:255',
          'seniority'=>'required|string|max:20',
          'email'=> 'required|string|email|max:255',
          'emergencyContact'=> 'required|string|max:15',
          'password'=> 'required|string|min:6',
          'type'=> 'required'
        ]);
        $data['id'] = $id;
        $user->updateUser($data);

        return redirect('/users');
    }

    public function singleUpdate(Request $request, $id)
    {
        $user = new User();
        $data = $this->validate($request, [
          'firstName'=>'required|string|max:255',
          'lastName'=>'required|string|max:255',
          'email'=> 'required|string|email|max:255',
          'emergencyContact'=> 'required|string|max:15',
          'password'=> 'required|string|min:6|confirmed',
        ]);
        $data['id'] = $id;
        $user->singleUpdate($data);

        return redirect('');
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect('/users');
    }
}
