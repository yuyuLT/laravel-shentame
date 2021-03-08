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
    public function show($user_id)
    {
        $query = DB::table('entame_info')
        ->leftJoin('users', 'entame_info.user_id', '=', 'users.id')
        ->where('entame_info.user_id', $user_id)
        ->orderBy('video_id', 'desc');
        $datas = $query->paginate(5);

        $user_name = DB::table('users')
        ->where('id',$user_id)
        ->first()
        ->name;
        
        return view('mypage',compact('datas','user_name'));    
    }   
}
