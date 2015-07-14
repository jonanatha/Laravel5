<?php
namespace App\Http\Controllers;



use Illuminate\Support\Facades\Auth;
use Input;
//use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Paginator;
use DB;
use App\Student;
use App\Users;
//use Carbon\Carbon;


class AccountController extends Controller
{
  public function index()
  {
      return view('Accounting.index');
  }

  public function register(){
      return view('Accounting.register');
  }

  public function income()
  {
      return view('Accounting.income');
  }

  public function addIncome()
  {
      return view('Accounting.addIncome');
  }

  public function addExpend(){
      return view('Accounting.addExpend');
  }

  // Function for register new expend
  public function newExpend(){
      $val = array('name'=> 'required', 'amount'=> 'required');
      $checkValidation = Validator::make(Input::all(), $val);
      if($checkValidation->fails()){
          return Redirect::back()->withErrors($checkValidation);
      }else{
          DB::table('expend')->insert(
              array(
                  'name' => Input::get('name'),
                  'amount' => Input::get('amount'),
                  'date' => Input::get('date'),
                  'userID' => Input::get('userID'),
                  'month' => Input::get('month'),
                  'year' => Input::get('year')
              )
          );
          return Redirect::back();
      }
  }

  public function edit_Expend($id){
      return view('Accounting.editExpend')->with('id', $id);
  }

  // Function show edit income page
  public function edit_Income($id)
  {
      return view('Accounting.editIncome')->with('id', $id);
  }

  // Function for update income
  public function updateIncome(){
      $val = array('name'=>'required', 'amount'=>'required');
      $checkVal = Validator::make(Input::all(), $val);
      if($checkVal->fails()){
          return Redirect::back()->withErrors($val);
      }else{
          $data = array(
                'name'      =>  Input::get('name'),
                'amount'    =>  Input::get('amount'),
                'date'      =>  Input::get('date'),
                'month'     =>  Input::get('month'),
                'year'      =>  Input::get('year')
          );
          $id = Input::get('id');
          DB::table('income')->where('id', $id)->update($data);
          return Redirect::to('addIncome');
      }
  }


  // Function delete income
  public function delete_income($id)
  {
      DB::table('income')->where('id', $id)->delete();
      return Redirect::back();
  }

  // Function delete expend
  public function delete_expend($id)
  {
      DB::table('expend')->where('id',$id)->delete();
      return Redirect::back();
  }

  // Function for Edit Expend
  public function updateExpend()
  {
      $val=array('name'=>'required', 'amount'=>'required');
      $checkVal = Validator::make(Input::all(), $val);
      if($checkVal->fails())
      {
          return Redirect::back()->withErrors($val);
      }else{
          $data = array(
                'name'  => Input::get('name'),
                'amount'=> Input::get('amount'),
                'date'  => Input::get('date'),
                'userID'=> Input::get('userID'),
                'month' => Input::get('month'),
                'year'  => Input::get('year')
          );
          $id = Input::get('id');
          DB::table('expend')->where('id', $id)->update($data);
          return Redirect::to('addExpend');
      }
  }

  // Function for register new income
  public function newIncome(){

    $val = array('name'=> 'required', 'amount'=>'required');
    $vl = Validator::make(Input::all(), $val);
    if($vl->fails()){
        return Redirect::back()->withErrors($vl);
    }else{
        DB::table('income')->insert(
            array(
                'userID' => Input::get('userID'),
                'name' => Input::get('name'),
                'amount' => Input::get('amount'),
                'date' => Input::get('date'),
                'month' => Input::get('month'),
                'year' => Input::get('year')
            )
        );
        return Redirect::back();
    }
  }

  public function create()
    {
        $validation = array(
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'

        );
       // $date = Carbon\Carbon::now();
        $vd = Validator::make(Input::all(), $validation);
        if($vd->fails()){
            return Redirect::to('Register')->withErrors($vd);
        }else{
            $student = new AccountController;
            DB::table('users')->insert(
                array(
                    'name' => Input::get('name'), // Set a value for the column “price”
                    'email' => Input::get('email'), // Set a value for the column “product”
                    'password' => bcrypt(Input::get('password'))
                )
            );
            return Redirect::back();
        }
    }


  public function Userlogin()
  {
      $input = Input::only('email', 'password');
      if (Auth::attempt($input))
      {
          $email = Auth::user()->email;
          return Redirect::intended('/income');
      }
      return Redirect::to('/');

  }

  public function Userlogout()
  {
      Auth::logout();
      return Redirect::to('/');
  }



}
