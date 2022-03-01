@extends('template.layout.header')
@section('image' , '/assets/images/backgrounds/page-header-bg.jpg')
@section('title' , 'ورود و ثبت نام')
@section('content')

    <div class="container">
        <div class="row">
            <form action="{{route('login')}}" method="post">
                @csrf
                <div class="form-group col-8" style="margin-left: auto;margin-right: auto ; margin-top: 100px">
                    <input type="text" name="phone" class="form-control " style="margin-left: auto;margin-right: auto" placeholder="شماه موبایل" autofocus required>
                    <button class="btn btn-success" style="width: 100%;margin-top: 20px ;margin-bottom: 100px">ارسال</button>
                </div>


            </form>
        </div>
    </div>

@endsection
