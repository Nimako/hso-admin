<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Transaction;
use Datatables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Redirect, Response;


class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function GetEntries(Request $request, $id){
  
  
        $data["info"]  = Transaction::Where(["ID"=>$id])->first();
  
        $whereCon = ['TransactionID'=>$data["info"]->ID];
        $data["list"]  = DB::table('v_transaction_items')->where($whereCon)->get();
  
        if(!empty($data["info"])){

            return view("transaction/order_details",$data);  
  
        }else{
            return view("transaction/order_details",$data);  
        }
    }


    public function Orders(Request $request, $status){
        

        if($status == "submitted" || $status=="draft" || $status=="completed"){

          $data["entryStatus"] = $status;
          $ShowRoomID = Auth()->user()->ShowRoomID;

          $whereCon = ["Status"=>$status,"ShowRoomID"=>$ShowRoomID];
            
          $data['list'] = DB::table('transaction')->where($whereCon)->paginate(20);
  
        if(!empty($data["list"])){ 

            return view("transaction/orders_list",$data);  
  
        }else{
            return view("transaction/orders_list",$data);  
        }

       }else{
           return Redirect::to("dashboard");
       }

    }





    public function index(){

        $data['suburb'] = DB::table('suburb')->get();
        $data['revenueType'] = DB::table('revenue_type')->get();

        return view('collector/collectors_list', $data);

    }

    public function collectorList(Request $request)
    {
        if ($request->ajax()) {

            //$data = Collector::latest()->get();
            $data = DB::table('collectors')->latest()->get();
            return Datatables::of($data)->addColumn('action', function ($data) {
                $button = '<button type="button" onclick="editCollector('.$data->id.')"  class="btn btn-primary btn-sm">Edit</button>';
                $button .= '&nbsp;&nbsp;&nbsp;<a type="button" href="collector-statement/'.$data->id.'"  class="delete btn btn-success btn-sm">Statement</a>';
                return $button;
            })->rawColumns(['action'])->make(true);

        }
    }



    public function SaveCollector(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'  => 'required',
            'contact' => 'numeric|unique:collectors',
            'suburb'  => 'required',
            //'house_number'  => 'required',
            'username'  => 'required|unique:collectors|min:2',
            'password'  => 'required|min:4',
            'revenueType'  => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('collectors')->withErrors($validator)->withInput();
        }

        $data = [
            'name'         => $request->name,
            'contact'      => $request->contact,
            'suburb'       => $request->suburb,
            'house_number' => $request->house_number,
            'username'     => $request->username,
            'password'     => Hash::make($request->password),
        ];

        $id  =  DB::table('collectors')->insertGetId($data);

        if($id>0){

            foreach($request->revenueType as $revenueType){

               DB::table('collector_revenuetypes')->insert(['collector_id'=> $id, 'revenueType_id'=> $revenueType]);

            }

            return redirect()->route('collectors')->with('success', 'Collector created successfully.');
        }

    }


    public function statement($id , Request $request)
    {
        $data = [];
        $data['list'] = DB::table('ledgers')->where('collector_id',$id)->orderBy('id', 'desc')->paginate(10);
        $data['info'] = DB::table('collectors')->where('id', $id)->first();

        $data['today']     = DB::table('ledgers')->whereRaw("collector_id = $id AND DATE_FORMAT(created_at, '%Y-%m-%d') = CURRENT_DATE()  ")->sum('credit');
        $data['thismonth'] = DB::table('ledgers')->whereRaw("collector_id = $id AND DATE_FORMAT(created_at, '%Y-%m') = DATE_FORMAT(NOW(), '%Y-%m') ")->sum('credit');
        $data['lastmonth'] = DB::table('ledgers')->whereRaw("collector_id = $id AND YEAR(created_at) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(created_at) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)")->sum('credit');
        $data['thisyear']  = DB::table('ledgers')->whereRaw("collector_id = $id AND YEAR(created_at) = YEAR(NOW())")->sum('credit');

        return view('collector/collector_statement',$data);
    }


    public function SearchStatement()
    {
        $start_date    =  $_GET['start_date'];
        $end_date      =  $_GET['end_date'];
        $id            =  $_GET['collector_id'];

        $data = [];
        $data['list'] = DB::table('ledgers')->whereRaw("collector_id = $id AND DATE_FORMAT(created_at,'%Y-%m-%d') >= '$start_date' AND DATE_FORMAT(created_at,'%Y-%m-%d') <= '$end_date'  ")->orderBy('id', 'desc')->get();
        $data['info'] = DB::table('collectors')->where('id', $id)->first();

        $data['today']     = DB::table('ledgers')->whereRaw("collector_id = $id AND DATE_FORMAT(created_at, '%Y-%m-%d') = CURRENT_DATE()  ")->sum('credit');
        $data['thismonth'] = DB::table('ledgers')->whereRaw("collector_id = $id AND DATE_FORMAT(created_at, '%Y-%m') = DATE_FORMAT(NOW(), '%Y-%m') ")->sum('credit');
        $data['lastmonth'] = DB::table('ledgers')->whereRaw("collector_id = $id AND YEAR(created_at) = YEAR(CURRENT_DATE - INTERVAL 1 MONTH) AND MONTH(created_at) = MONTH(CURRENT_DATE - INTERVAL 1 MONTH)")->sum('credit');
        $data['thisyear']  = DB::table('ledgers')->whereRaw("collector_id = $id AND YEAR(created_at) = YEAR(NOW())")->sum('credit');

        return view('collector/collector_searchstatement',$data);
    }





    public function editCollector($id)
    {
        $data = [];
        $data['suburb'] = DB::table('suburb')->get();
        $data['revenueType'] = DB::table('revenue_type')->get();
        $data['collector_revenue'] = DB::table('v_collector_revenuetypes')->where('collector_id',$id)->get();

        $data['info'] = DB::table('collectors')->where('id', $id)->first();

        return view('collector/collector_edit_form', $data);
    }


    public function DeleteCollectorRevenue(Request $request)
    {

        $id = $request->input("revenueTypeID");

        $affected = DB::table('collector_revenuetypes')->where('id',  $id)->delete();

        if($affected){
           echo "OK";
        }else{
           echo "NOT";
        }

    }

    public function UpdateCollector(Request $request){

        $data = [
            'name'         => $request->name,
            'contact'      => $request->contact,
            'suburb'       => $request->suburb,
            'house_number' => $request->house_number,
            //'username'   => $request->username,
            //'password'   => Hash::make($request->password),
        ];

        if(!empty($request->input('password'))){
             $data['password'] = Hash::make($request->password);
        }

        $affected = DB::table('collectors')->where('id', $request->input('collector_id'))->update($data);

        if (!empty($request->revenueType)) {
            foreach ($request->revenueType as $revenueType) {

                DB::table('collector_revenuetypes')->insert(['collector_id' => $request->input('collector_id'), 'revenueType_id' => $revenueType]);
            }
        }

        return redirect()->route('collectors')->with('success', 'Changes Saved');
        //return redirect()->route('collectors');


    }


}
