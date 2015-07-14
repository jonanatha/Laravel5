<?php
namespace App\Http\Controllers;

use Input;
//use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Student;
//use Input;


class StudentController extends Controller
{
  public function index()
  {
      return view('Student.index');
  }

  public function form(){
      return view('Student.form');
  }

  public function student()
  {
      return view('Student.student');
  }
    public function save()
    {
        $student = Input::all();
        $data = array(
            'name' => $student['name'],
            'gender' => $student['gender'],
            'phone' => $student['phone']
        );
        $id = DB::table('student')->insertGetId($data);
    }

    public function create()
    {
        $validation = array(
            'name' => 'required',
            'phone' => 'required'
        );
        $vd = Validator::make(Input::all(), $validation);
        if($vd->fails()){
            return Redirect::to('newstudent')->withErrors($vd);
        }else{
            $student = new StudentController;
            DB::table('student')->insert(
                array(
                    'name' => Input::get('name'), // Set a value for the column “price”
                    'gender' => Input::get('gender'), // Set a value for the column “product”
                    'phone' => Input::get('phone')
                )
            );

            //$student->name = Input::get('name');
            //$student->gender = Input::get('gender');
            //$student->phone = Input::get('phone');
            //$student->save();

            return Redirect::back();
        }
    }

  public function delete($id)
  {
      DB::table('student')->where('id',$id)->delete();
      return Redirect::back();
  }

  public function edit($id)
  {
      return view('Student.edit')->with('id', $id);
  }


    public function update()
    {
        $validation = array(
            'name' => 'required',
            'phone' => 'required'
        );
        $vd = Validator::make(Input::all(), $validation);
        if($vd->fails()){
            return Redirect::to('newstudent')->withErrors($vd);
        }else{

            //$id = 7;
            $data = array(
                'name' => Input::get('name'),
                'gender' => Input::get('gender'),
                'phone' => Input::get('phone')
            );
            $id = Input::get('id');
            DB::table('student')->where('id', $id)->update($data);
            return Redirect::back();
        }
    }
}
