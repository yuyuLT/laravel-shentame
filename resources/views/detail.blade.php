<?php use App\Models\TopPageForm; ?>
@extends('layouts.app')

@section('content')
<head>
<style>
.element {
  width: 130px;
}
</style>
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">動画詳細</div>
                <table class="table">
                    <tbody>
                        <tr valign="middle">
                            <td class="element">タイトル</td>
                            <td>{{$datas->title}}</td>
                        </tr>
                        <tr valign="middle">
                            <td class="element">動画</td>
                            <td>{!!TopPageForm::youtubeConvert($datas->link)!!}</td>
                        </tr>
                        <tr valign="middle">
                            <td class="element">リンク</td>
                            <td><a href="{{$datas->link}}">動画リンクはこちら</a></td>
                        </tr>
                        <tr valign="middle">
                            <td class="element">感想</td>
                            <td>{{$datas->thought}}</td>
                        </tr>
                        <tr valign="middle">
                            <td class="element">登録ユーザ名</td>
                            <td>{{$datas->user_name}}</td>
                        </tr>
                        <tr valign="middle">
                            <td class="element">登録日時</td>
                            <td>{{$datas->created_at}}</td>
                        </tr>
                    </tbody>
                </table>

                <form method = "POST" action="{{route('comment')}}" class="bg-light">
                    @csrf
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">コメントを入力</label>
                        <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder=""></textarea>
                        <input type="hidden" name="id" value ="{{$id}}">                        
                    </div>
                    <input class="btn btn-info" type="submit" value="コメントする">
                </form>
                
                <br>

                コメント一覧
                <table class="table">
                    <thead class="thead-dark">
                        <tr valign="middle">
                            <th scope="col">ユーザ</th>
                            <th scope="col">コメント</th>
                            <th scope="col">コメント日時</th>
                        </tr>
                    </thead>
                    <tbody>    
                        @foreach($commentDatas as $commentData)
                            <tr valign="middle">
                                <td class="element">{{$commentData->user_name}}</td>
                                <td>{{$commentData->comment}}</td>
                                <td>{{$commentData->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection