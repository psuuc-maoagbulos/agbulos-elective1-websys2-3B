<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use DB;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class StudInsertController extends Controller
{
    public function index(){
        $users = DB::select('select * from student');
    
    return view('stud_view' , ['users'=> $users]);
    }
    public function insertform(){
        return view('stud_create');
    }


    public function insert(Request $request){
        $name = $request->input('stud_name');
        DB::insert('insert into student(name)
        values(?)',[$name]);
        return Redirect('/view-records');
        // echo "Record inserted successfully <br/>";
        // echo '<a href = "/insert">Click Here</a>
        // to go back';
    }

    public function show(){
        $users = DB::select('select * from student');
        return view('stud_view' , ['users' => $users]);
    }

    public function destroy($id){
        DB::delete('delete from student where id=?', [$id]);
        return redirect('/view-records');
    }


    }