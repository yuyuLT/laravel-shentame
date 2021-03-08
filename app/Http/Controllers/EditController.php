<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        return view('edit', compact('data'));
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
