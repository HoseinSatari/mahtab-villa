@extends('panel.layouts.master')
@section('title' , 'ارسال پیامک ')
@section('content')


    <div class="content-wrapper">


        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12">
                        <h1 class="m-0 text-dark">ارسال پیامک</h1>
                    </div>
                </div>


            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card shadow-sm">

                    <div class="py-4 px-4 col-lg-10">

                        <form action="{{route('admin.sms.send' )}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-4 control-label "> متن پیامک</label>
                                    <textarea name="text" placeholder="متن پیامک را تایپ کنید"
                                              class="form-control @error('text') is-invalid @enderror" id="" cols="30"
                                              rows="4"></textarea>
                                    @error('text')
                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-lg-12">
                                <button class="btn btn-success" style="width: 100%" type="submit">ارسال</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
