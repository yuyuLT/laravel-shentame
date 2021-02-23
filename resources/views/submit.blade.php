@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">動画登録</div>

                <!-- エラーチェック -->
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}
                        @endforeach
                    </ul>
                </div>
                @endif

            
                <form method = "POST" action="{{route('store')}}">
                @csrf
                    <br>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">タイトル</label>
                        <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="タイトルを入力してください">
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">リンク</label>
                        <input name="link" type="url" class="form-control" id="exampleFormControlInput1" placeholder="リンクをコピペしてください">
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">感想</label>
                        <textarea name="thought" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="感想を適当に入力してください"></textarea>
                    </div>
                    <br>
                    <input class="btn btn-info" type="submit" value="登録">
                </form>
                 <div class="card-body"></div>
            </div>
        </div>
    </div>
</div>
@endsection