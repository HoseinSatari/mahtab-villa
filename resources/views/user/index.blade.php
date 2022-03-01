@extends('template.layout.header')
@section('image' , '/assets/images/backgrounds/page-header-bg.jpg')
@section('title' , 'پنل کاربری')
@section('content')

    <div class="container" style="margin-top: 100px ; margin-bottom: 150px">
        <div class="row">

            <div class="col-12" style="margin-right: auto;margin-left: auto">
                <p>
                    @include('user.menu')
                </p>
            </div>

        </div>
        <div class="row mt-4">
            <div class="col-3"></div>
            <div class="col-6">
                <form action="{{route('user.edit')}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <input type="text" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="نام و نام خانوادگی" required >
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                    <div class="form-group" style="margin-top: 20px;margin-bottom: 20px">
                        <input type="number" value="{{$user->phone}}" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="شماره تلفن" required>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                        @enderror
                    </div>
                    <button class="btn btn-success" style="width: 100%" >ویرایش</button>
                </form>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
@endsection
