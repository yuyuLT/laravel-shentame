<?php use App\Models\TopPageForm; ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header title_big">情報編集</div>
                <form method="GET" action="{{route('toppage')}}" class="form-inline">
                <div class="container bg-light">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" >動画一覧へ戻る</button>
                        </div>
                    </div>
                </form>

                <form method = "POST" action="{{route('update',['video_id'=>$data->video_id])}}">
                @csrf
                    <div class="form-group">
                        {!!TopPageForm::youtubeConvert($data->link)!!}
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">タイトル</label>
                        <input name="title" type="text" class="form-control" id="exampleFormControlInput1" value="{{$data->title}}">
                    </div>
                    <br>
                    
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">感想</label>
                        <textarea name="thought" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$data->thought}}</textarea>
                    </div>
                    <br>
                    <input class="btn btn-info" type="submit" value="更新">
                </form>        

            </div>
        </div>
    </div>
</div>
@endsection