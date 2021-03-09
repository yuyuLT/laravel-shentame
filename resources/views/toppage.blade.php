<?php 
use App\Models\TopPageForm; 
use Illuminate\Support\Facades\Auth; 
$login_id = Auth::user()->id
?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header title_big">動画一覧 </div>
                    <div class="form-container">
                        <div class="form-b-container">
                            <form method="GET" action="{{route('submit')}}">
                                <button type="submit" class="btn btn-primary">
                                    情報登録
                                </button>
                            </form>
                        </div>
                        <div>
                            <form method = "GET" action="{{route('toppage')}}" class="form-inline my-2 my-lg-0">
                            @csrf
                                <input class="form-control mr-sm-2" name="search" type="search" placeholder="検索ワードを入力" aria-label="Search">
                                <span class="input-group-btn">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
                                </span>
                            </form>
                        </div>
                    </div>

                    <table class="table" >
                        <thead class="thead-dark">
                            <tr valign="middle">
                                <th scope="col">ID</th>
                                <th scope="col">タイトル</th>
                                <th scope="col">動画</th>
                                <th scope="col">登録ユーザ</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                            <?php $roland = '';
                                if($data->user_id == $login_id){
                                    $roland = "true";
                                }else{
                                    $roland = "false";
                                }
                            ?>
                            <tr valign="middle">
                                <td rowspan="3">{{$loop->index + 1}}</td>
                                <td rowspan="3">{{$data->title}}</td>
                                <td rowspan="3">{!!TopPageForm::youtubeConvert($data->link)!!}</td>
                                <td rowspan="3"><a href="{{route('mypage',['user_id'=>$data->user_id])}}">{{$data->name}}</a></td>
                                <td>
                                    <form method = "GET" action="{{route('detail',['video_id'=>$data->video_id])}}" class="form-inline my-2 my-lg-0">
                                        @csrf
                                        <span class="input-group-btn">
                                            <button class="btn btn-success my-2 my-sm-0" type="submit">詳細</button>
                                        </span>
                                    </form>    
                                </td>
                            <tr valign="middle">
                                <td>
                                    <form method = "GET" action="{{route('edit',['video_id'=>$data->video_id])}}" class="form-inline my-2 my-lg-0">
                                        @csrf
                                        <span class="input-group-btn">
                                            <button  
                                            <?php if ($roland == "false") { ?> class="btn btn-secondary my-2 my-sm-0" disabled
                                            <?php }else{ ?>
                                                class="btn btn-success my-2 my-sm-0" type="submit"　 
                                            <?php } ?>
                                        >編集</button>
                                        </span>
                                    </form>
                                </td>
                            </tr>
                            <tr valign="middle">
                                <td>
                                    <form method = "POST" action="{{route('delete',['video_id'=>$data->video_id])}}" id="delete_{{$data->video_id}}" class="form-inline my-2 my-lg-0">
                                        @csrf
                                            <a   
                                            <?php if ($roland == "true") { ?> 
                                                href="#" class="btn btn-danger my-2 my-sm-0" data-id = "{{$data->video_id}}" onclick="deletePost(this);" 
                                            <?php }else{ ?>
                                                class="btn btn-secondary my-2 my-sm-0" 
                                            <?php } ?>
                                            >削除</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                      {{ $datas->links() }}
                    
            </div>
        </div>
    </div>
</div>

<script>
function deletePost(e){
    'use strict';
    if(confirm('本当に削除していいですか？')){
        document.getElementById('delete_' + e.dataset.id).submit();  
    }
}
</script>
@endsection