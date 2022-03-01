@extends('template.layout.header')
@section('image' , '/assets/images/backgrounds/page-header-bg.jpg')
@section('title' , 'کد تایید')
@section('content')

    <div class="container">
        <div class="row">
            <form action="{{route('user.token')}}" method="post">
                @csrf
                <div class="form-group col-8" style="margin-left: auto;margin-right: auto ; margin-top: 100px">
                    <input type="text" name="code" class="form-control " style="margin-left: auto;margin-right: auto" placeholder="کد تایید " autofocus required>
                    <button class="btn btn-success" style="width: 100%;margin-top: 20px ;margin-bottom: 100px">تایید</button>
                </div>


            </form>
        </div>
    </div>

@endsection



