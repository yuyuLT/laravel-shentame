<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubmitForm;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
   
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($video_id)
    {  
        //詳細データを取得
        $datas = DB::table('entame_info')
        ->leftJoin('users', 'entame_info.user_id', '=', 'users.id')
        ->where('video_id', $video_id)
        ->first();

        //コメント欄を表示
        $commentDatas = DB::table('detail_comment')->where('detail_id',$video_id)->orderBy('id', 'asc')->get();

        return view('detail', compact('datas','commentDatas','video_id'));
    }

}
