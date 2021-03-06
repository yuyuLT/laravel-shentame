<?php

namespace App\Http\Controllers;

use App\Models\SubmitForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB;

class TopPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        //検索フォーム用
        $query = DB::table('entame_info')
        ->leftJoin('users', 'entame_info.user_id', '=', 'users.id')
        ->orderBy('video_id', 'desc');

        //検索処理
        if($search !== null){
            //全角⇨半角
            $search_split = mb_convert_kana($search,'s');

            //空白で区切る
            $search_split2 = preg_split('/[\s]+/',$search_split,-1,PREG_SPLIT_NO_EMPTY);

            //単語をループで回す
            foreach($search_split2 as $value)
            {
                $query->where('title','like','%'.$value.'%');
            } 
        };
        
        $datas = $query->paginate(10);
        
        return view('toppage',compact('datas'));
    }

    public function delete($video_id)
    {
        $datas = SubmitForm::find($video_id);
    
         //登録者本人であれば削除
         if(Auth::user()->id == $datas->user_id){
            $datas->delete();
        }

        return redirect('toppage');
    }
}
