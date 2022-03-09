@extends('panel.layouts.master')
@section( 'title','تاریخ های بسته ')
@section('content')

    <div class="content-wrapper">


        <div class="content-header">
            <div class="container-fluid px-4">
                <div class="row mb-2 d-flex flex-wrap justify-content-between">

                    <h1 class="m-0 text-dark">مدیریت تاریخ بسته </h1>

                    <div>
                        <a href="{{route('admin.panel')}}" class="btn btn-sm btn-outline-secondary p-2">بازگشت</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card shadow-sm">
                    <form action="" method="get">

                        <div class="row py-2">

                        </div>
                    </form>
                    <div class="py-4 px-4 ">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead class="thead-light">
                                <tr>
                                    <th>شروع</th>
                                    <th>پایان</th>
                                    <th>اقدامات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dates as $date)
                                <tr>
                                    <td class="text-align-center">{{jdate($date->start)->format('%d-%m-%Y')}}</td>
                                    <td class="text-align-center">{{jdate($date->date)->format('%d-%m-%Y')}}</td>
                                    <td class="text-align-center">
                                        <form action="{{route('admin.date.delete' , ['date' => $date->id])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection
