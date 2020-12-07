<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator, Redirect, Response;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function index()
    {
        return view('login');
    }

    public function registration()
    {
        if (Auth::check()) {

            $data['list'] = User::where('Status', '<>', "DELETED")->get();
            $data['showroom'] = DB::table("showroom")->get();

            return view('registration',$data);
        }
        return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }

    public function postLogin(Request $request)
    {
        request()->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

            //Auth()->user()->FullName;

            return redirect()->intended('dashboard');
        }

        return Redirect::to("login")->withSuccess('Oppes! You have entered invalid credentials');
    }

    public function postRegistration(Request $request)
    {
       request()->validate([
            'FullName'  => 'required',
            'email'     => 'required|email|unique:employee',
            'password'  => 'required|min:6',
            'UserType'  => 'required',
            'ShowRoomID'=> 'required',
        ]);

        $data = $request->all();

        $result = $this->create($data);

        return Redirect::to("registration")->withSuccess('Great! Account created Successfully');
    }

    public function dashboard()
    {

        if (Auth::check()) {            
           
            $ShowRoomID = Auth()->user()->ShowRoomID;
            
            $data['list'] = DB::table('transaction')->where("ShowRoomID",$ShowRoomID)->paginate(20);

            return view('dashboard',$data);
       }
        return Redirect::to("login")->withSuccess('Opps! You do not have access');
    }


    public function create(array $data)
    {
        return User::create([
            'FullName' => $data['FullName'],
            'email'    => $data['email'],
            'password'   => Hash::make($data['password']),
            'UserType'   => $data['UserType'],
            'ShowRoomID' => $data['ShowRoomID'],
        ]);
    }

    public function editUser($id)
    {
        $data = [];
        $data['list'] = User::where('Status', '<>', "DELETED")->get();
        $data['showroom'] = DB::table("showroom")->get();

        $data['info'] = User::where(['id' => $id])->first();

        return view('registration', $data);
    }

    public function updateRegistration(Request $request)
    {
        $data = [
                'FullName'   =>$request->FullName,
                'email'      => $request->email,
                'UserType'   => $request->UserType,
                'ShowRoomID' => $request->ShowRoomID,
                'UserType'   => $request->UserType,
                //'Status' => $request->Status,
        ];

        if(!empty($request->password)){
            $data['password'] = Hash::make($request->password);
        }

        $id =  $request->user_id;
        $affected = DB::table('employee')->where('id', $id)->update($data);

        if ($affected) {
            return Redirect::to("registration")->withSuccess('User Update Successfully');
        }else{
            return Redirect::to("registration");
        }
    }


    public function deleteRegistration($id){

        $affected = DB::table('employee')->where('id', $id)->update(['Status'=>'DELETED']);

        if ($affected) {
            return Redirect::to("registration")->withSuccess('User deleted Successfully');
        }
    }



    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }



}
