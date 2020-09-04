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
}
