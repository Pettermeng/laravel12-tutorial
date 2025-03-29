<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request) {
        $isShow   = false;
        $password = Hash::make('1111');
        $userInfo = ['001', 'sok', 'Male', 'Phnom Penh'];
        $title = "Hello Title";
        $description = "Let`s take a look at an example of a basic controller. A controller may have any number of public methods which will respond to incoming HTTP requests:";

        return view('about',
            [
                'title' =>  $title,
                'description' => $description,
                'userInfo' => $userInfo,
                'isShow' => $isShow,
                'currentPage' => $request->page
            ]
        );
    }

    public function submitData(Request $request) {
        $file = $request->file('image');
        $fileName = rand(1,999)."-".$file->getClientOriginalName();
        $file->move('uploads', $fileName);
    }

    public function homePage() {
        return view('home');
    }
    public function contactPage() {
        return view('contact');
    }

    // User
    public function register() {
        return view('register');
    }

    public function submitRegister(Request $request) {
        $name     = $request->name;
        $email    = $request->email;
        $password = Hash::make($request->password);
        $date     = date('Y-m-d');

        // Insert to DB
        $user = DB::table('users')->insert([
            'name'       => $name,
            'email'      => $email,
            'password'   => $password,
            'created_at' => $date,
            'updated_at' => $date
        ]);

        if($user) {
            return redirect('/register')->with('message', 'User Registered');
        }
    }

    public function login() {
        return view('login');
    }

    public function submitLogin(Request $request) {
        $email    = $request->email;
        $password = $request->password;

        // action login
        if(Auth::attempt([
            'email'    => $email,
            'password' => $password
        ])) {
            return 111;
        }
        else {
            return 222;
        }
    }

    public function listUser() {
        $users = DB::table('users')
                    ->orderBy('id', 'DESC')
                    // ->limit(2)
                    // ->where('id', 2)
                    ->get();

        return view('user', [
            'users' => $users
        ]);
    }

    public function userDetail($id) {
        $user = DB::table('users')
                ->where('id', $id)
                ->first();

        return view('user-detail',[
            'user' => $user
        ]);
    }

    public function userUpdate($id) {
        $user = DB::table('users')
                ->find($id);

        return view('update',[
            'user' => $user
        ]);
    }

    public function submitUpdate(Request $request) {
        $id       = $request->id;
        $name     = $request->name;
        $email    = $request->email;
        $date     = date('Y-m-d');

        // Update to DB
        $user = DB::table('users')
                    ->where('id', $id)
                    ->update([
                        'name'       => $name,
                        'email'      => $email,
                        'updated_at' => $date
                    ]);

        if($user) {
            return redirect('/user')->with('message-update', 'Updated');
        }
    }

    public function userDelete($id) {
        $user = DB::table('users')->delete($id);
        if($user) {
            return redirect('/user')->with('message-delete', 'Deleted');
        }
    }

    public function admin() {
        return view('admin');
    }

}
