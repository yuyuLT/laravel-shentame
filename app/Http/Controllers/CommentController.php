<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\CommentForm;
use App\Http\Requests\StoreCommentForm;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentForm $request)
    {
        $datas = new CommentForm; 
        $datas->user_name = Auth::user()->name;
        $datas->comment = $request->input('comment');
        $datas->detail_id = $request->input('id');
        $datas->save();

        return redirect()->route('detail', ['id' => $datas->detail_id]);
    }
}
