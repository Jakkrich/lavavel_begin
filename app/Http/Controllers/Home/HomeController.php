<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function Hello($id)
    {
        //return view("hello")->with('id', $id);
        return view('hello', compact('id'));
    }

    public function Hello2($id)
    {
        //return view("hello")->with('id', $id);
        $user['info'] = 'aaa';
        $user['name'] = 'bbb';
        $user['desc'] = 'ccc';
        return view('welcome.hello', compact('user'));
    }

    public function HelloAdmin()
    {
        $data = config('admin.admin');
        //dd($data);
        $data = $data[0];
        $users = array('aaa@gmail.com', 'bbb@gmail.com', 'ccc@gmail.com');

        return view('helloadmin', compact('data', 'users'));
    }
}
