<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyPageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user_name)
    {
        $query = DB::table('entame_info')->where('user_name', $user_name)->orderBy('id', 'desc');;
        $datas = $query->paginate(5);
        return view('mypage',compact('datas','user_name'));    
    }   
}
