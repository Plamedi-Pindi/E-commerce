<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use illuminate\Support\Facades\Auth;
use illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function loginWithGoogle(){

        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle(){
        try {
            $user = Socialite::driver()->user();
            $is_user = User::where('email', $user->getEmail())->first();

            if (!$is_user) {
               $saveUser = User::updateOrCreate(
                    [
                        'google_id' => $user->getId()
                    ],
                    [
                        'name'=> $user->getName(),
                        'email'=> $user->getEmail(),
                        'password'=> Hash::make($user->getName().'@'.$user->getId()),
                    ]
                    );
            }
            else {
                $saveUser = User::where('email', $user->getEmail()->update([
                    'google_id' => $user->getId(),
                ]));
                $saveUser = User::where('email', $user->getEmail())->first();
            }

            Auth::loginUsingId($saveUser->id);
            return redirect()->route('/');

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
