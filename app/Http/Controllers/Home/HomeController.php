<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Model\CountyrModel;
use Illuminate\Http\Request;

use App\Models\City;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Card;
use App\Models\SubjectSelection;

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

    public function create()
    {
        $CountyrModel = new CountyrModel();
        # SQL
        //$CountyrModel->insert();

        # ORM
        $date = new \DateTime();
        $unixTimeStamp = $date->getTimestamp();

        $CountyrModel->code = 'F';
        $CountyrModel->name = 'FF';
        $CountyrModel->dname = 'FFF';
        $CountyrModel->num_code = 0;
        $CountyrModel->phone_code = 0;

        $CountyrModel->created = $unixTimeStamp;
        $CountyrModel->register_by = 1;
        $CountyrModel->modified = $unixTimeStamp;
        $CountyrModel->modified_by = 1;

        $CountyrModel->save();
        echo "Record Inserted...";
    }
    public function edit()
    {
        # SQL
        // $CountyrModel = new CountyrModel();
        // $CountyrModel->edit();

        # ORM
        $CountyrModel = CountyrModel::find(1);
        $CountyrModel->name = 'xyz';
        $CountyrModel->save();

        $CountyrModel = CountyrModel::where('id', 1)->update(
            [
                'dname' => 'ggg'
            ]
        );

        echo "Record Edited...";
    }
    public function read()
    {
        # SQL
        // $CountyrModel = new CountyrModel();
        // $data = $CountyrModel->read();
        // dd($data);

        # ORM
        // $data = CountyrModel::fine(1);
        // $data = CountyrModel::where('record_deleted', 0)->orderBy('name', 'ASC')->take(2)->get();
        // $data = CountyrModel::where('id', '>', 3)->orderBy('name', 'ASC')->get();
        $data = CountyrModel::all();
        foreach ($data as $country) {
            echo '<br/>' . $country->name;
        }
    }
    public function delete()
    {
        # SQL
        // $CountyrModel = new CountyrModel();
        // $CountyrModel->delete();

        # ORM
        // $CountyrModel = CountyrModel::find(4);
        // $CountyrModel->delete();

        CountyrModel::destroy([3, 4]);
        echo "Record Deleted...";
    }

    public function relationship()
    {
        # code...
    }
}
