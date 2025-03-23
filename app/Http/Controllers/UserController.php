<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

}
