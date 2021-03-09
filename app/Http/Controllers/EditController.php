<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\SubmitForm;
use Illuminate\Support\Facades\DB;

class EditController extends Controller
{
    
    public function edit($video_id)
    {
        //１行持ってくる
        $data = DB::table('entame_info')
        ->leftJoin('users', 'entame_info.user_id', '=', 'users.id')
        ->where('video_id', $video_id)
        ->first();

        //登録者本人であれば編集可能,そうでなければトップページへ
        if(Auth::user()->id == $data->user_id){
            return view('edit', compact('data'));
        }else{
            return redirect('toppage');
        }

        
    }

    public function update(Request $request, $video_id)
    {
        $data = DB::table('entame_info')
        ->leftJoin('users', 'entame_info.user_id', '=', 'users.id')
        ->where('video_id', $video_id)
        ->update(['title' => $request->input('title'),'thought' => $request->input('thought')]);

        return redirect('toppage');
    }


}
