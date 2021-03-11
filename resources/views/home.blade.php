@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header title_big">登録完了</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>ようこそ！あなたのお気に入り動画をシェアしよう！</div>
                    <br>
                    <form method="GET" action="{{route('toppage')}}" class="form-inline">
                        @csrf
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary" >動画一覧へ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
