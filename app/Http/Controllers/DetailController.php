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
    public function show($id)
    {  
        //詳細データを取得
        $datas = submitForm::find($id);

        //コメント欄を表示
        $commentDatas = DB::table('detail_comment')->where('detail_id',$id)->orderBy('id', 'asc')->get();

        return view('detail', compact('datas','commentDatas','id'));
    }

}
