<?php use App\Models\TopPageForm; ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="card">
                <div class="card-header title_big">{{$user_name}}さんの登録動画</div>
                <form method="GET" action="{{route('toppage')}}" class="form-inline">
                <div class="container bg-light">
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" >動画一覧へ戻る</button>
                        </div>
                    </div>
                </form>
                <table class="table" >
                        <thead class="thead-dark">
                            <tr valign="middle">
                                <th scope="col">ID</th>
                                <th scope="col">タイトル</th>
                                <th scope="col">動画</th>
                                <th scope="col">詳細</th>
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
                                <td><a href="{{route('detail',['video_id'=>$data->video_id])}}">動画詳細</a></td>
                                <td class="d-none">{{$data->thought}}</td>
                                <td class="d-none">{{$data->created_at}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $datas->links() }}
            </div>
        </div>
    </div>
</div>
@endsection