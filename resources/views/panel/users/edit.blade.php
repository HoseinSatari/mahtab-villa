@extends('panel.layouts.master')

@section('content')

    <div class="content-wrapper">



        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12">
                        <h1 class="m-0 text-dark">ویرایش اطلاعات  {{$user->name}}</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card shadow-sm p-2">
                    <form action="{{route('admin.user.update' , $user->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <label for="name">نام و نام خانوادگی</label>
                                <input type="text" name="name"
                                       class="form-control @error('name') is-invalid @enderror "
                                       value="{{old('name' , $user->name)}}" id="name" placeholder="نام و نام خانوادگی ">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                @enderror
                            </div>
                            <div class="col-lg-6 form-group">
                                <label for="phone">شماره تماس</label>
                                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror " id="phone"
                                       value="{{old('phone' , $user->phone)}}" placeholder="شماره تماس را وارد کنید ">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                @enderror
                            </div>

                            <div class="col-lg-12 form-group p-2">
                                <input type="checkbox" class="is_active" name="is_staff" id="is_staff" @if($user->is_staff or $user->is_superuser) checked @endif>
                                <label for="is_staff">کاربر مدیر </label>
                            </div>
                            <div class="col-lg-12">
                                <button class="btn btn-success" type="submit"> ویرایش</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection
