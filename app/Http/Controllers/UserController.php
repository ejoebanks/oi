<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Staff;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        //$users = User::where('id', auth()->user()->id)->get();
        $users = User::oldest()->get();
        return view('crud.users.index', compact('users'));
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
            'email'=> $request->get('email'),
            'clockNumber'=> $request->get('clockNumber'),
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
        if (Staff::find($id) != null) {
            $user = User::join('staff', 'staff.clockNumber', '=', 'users.clockNumber')
                        ->where('id', $id)
                        ->first();
        } else {
            $user = User::where('id', $id)->first();
        }


        return view('crud.users.update', compact('user', 'id'));
    }

    public function update(Request $request, $id)
    {
        $user = new User();
        $data = $this->validate($request, [
          'email'=> 'required|string|email|max:255',
          'clockNumber'=> 'nullable|string|max:30',
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
          'email'=> 'required|string|email|max:255',
          'emergencycontact'=> 'nullable|string|max:15',
          'password'=> 'required|string|min:6|confirmed',
        ]);
        $data['id'] = $id;
        $data['clockNumber'] = Auth::user()->clockNumber;
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
