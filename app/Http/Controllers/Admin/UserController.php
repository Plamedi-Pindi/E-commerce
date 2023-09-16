<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Logger;
use App\Http\Controllers\Controller;
use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $response['users'] =  User::where('level', '!=', 'Formador')->get();;

        //Logger


        return view('admin.user.list.index', $response);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if (Auth::user()->level != 'Administrador' && Auth::user()->id != $id) {
            return redirect()->route('admin.home')->with('NoAuth', '1');
        } else {

            $response['user'] = User::find($id);



            return view('admin.user.details.index', $response);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response['users'] =  User::where('level', '!=', 'Formador')->get();

        if (Auth::user()->level != 'Administrador' && Auth::user()->id != $id) {
            return redirect()->route('admin.home')->with('NoAuth', '1');
        } else {

            $response['user'] = User::find($id);



            return view('admin.user.edit.index', $response);
        }
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
        if (Auth::user()->level != 'Administrador' && Auth::user()->id != $id) {
            return redirect()->route('admin.home')->with('NoAuth', '1');
        } else {

            $request->validate([
                'name' => 'required|string|max:255',
                'level' => 'required|string|max:40',
                'email' => 'required|string|email|max:255',
                'password' => ['required', 'confirmed', Rules\Password::defaults()], ]);

            if ($middle = $request->file('photo')) {
                $file = $middle->store('photos');
            } else {
                $file = User::find($id)->photo;
            }
            if ('Administrador' == Auth::user()->level){
               $nivel =  $request->level;
            }else{
               $nivel =  User::find($id)->level;
            }
            $user = User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'level' => $nivel,
                'password' => Hash::make($request->password),
                'photo' => $file, ]);
            //Logger

            return redirect()->route('admin.user.index')->with('edit', '1');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $count = User::count();

        if ($count > 1) {
            //Logger

            User::find($id)->delete();
            return redirect()->back()->with('destroy', '1');
        } else {
            return redirect()->back();
        }
    }
}
