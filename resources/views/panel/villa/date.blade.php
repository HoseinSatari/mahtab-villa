@extends('panel.layouts.master')
@section('title' , 'بستن روز ')
@section('content')
    <div class="content-wrapper">


        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12">
                        <h1 class="m-0 text-dark">بستن روز</h1>
                    </div>
                </div>


            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card shadow-sm">

                    <div class="py-4 px-4 col-lg-10">


                        <form action="{{route('admin.date')}}" method="post" enctype="multipart/form-data">
                            @csrf

                                <div class="col-lg-6 form-group">
                                    <label for="email" id="span1">تاریخ بستن  </label>
                                    <input type="text" name="date"
                                           class="example1 form-control @error('date') is-invalid @enderror "
                                           value="{{old('date')}}" placeholder="تاریخ  " id="date">
                                    @error('date')
                                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                    @enderror
                                </div>



                                <div class="col-lg-12">
                                    <button class="btn btn-success" type="submit">ثبت </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function() {

            {!! \File::get(public_path('/date/jquery-1.12.0.min.js')) !!}
            {!! \File::get(public_path('/date/persian-date.min.js')) !!}
            {!! \File::get(public_path('/date/persian-datepicker.min.js')) !!}
            $(".example1").pDatepicker({
                format : "YYYY-MM-DD",
            });
        });
    </script>


@endsection
