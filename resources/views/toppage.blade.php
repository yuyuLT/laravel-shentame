<?php use App\Models\TopPageForm; ?>
@extends('layouts.app')

@section('content')

<style type="text/css">
.form-a-container,
.form-b-container {
    float:left;
    width:12%;
}
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">動画一覧</div>
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
                                <th scope="col">詳細</th>
                                <th scope="col">登録ユーザ</th>
                                <th scope="col" class="d-none">感想</th>
                                <th scope="col" class="d-none">登録日時</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datas as $data)
                            <tr valign="middle">
                                <td>{{$loop->index + 1}}</td>
                                <td>{{$data->title}}</td>
                                <td>{!!TopPageForm::youtubeConvert($data->link)!!}</td>
                                <td><a href="{{route('detail',['id'=>$data->id])}}">動画詳細</a></td>
                                <td><a href="{{route('mypage',['user_name'=>$data->user_name])}}">{{$data->user_name}}</a></td>
                                <td class="d-none">{{$data->thought}}</td>
                                <td class="d-none">{{$data->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                      {{ $datas->links() }}
                    
            
                    <div class="card-body"></div>
            </div>
        </div>
    </div>
</div>
@endsection


