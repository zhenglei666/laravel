<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ZhuceController extends Controller
{
    public function index()
    {
       return view('Home.zhuce.index'); 
    }

    public function create(Request $request)
    {
        $data = $request->except('_token','passwordt');
        $name = $request->input('uname');
        $id = DB::table('user')->insertGetId($data);
        if($id>0){
            $ob = DB::table('user')->where('uname',$name)->first();
            session(['adminuser'=>$ob]);
            return redirect('home/index')->with('msg','添加成功');
        }
    }
        
}

