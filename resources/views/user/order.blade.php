@extends('template.layout.header')
@section('image' , '/assets/images/backgrounds/page-header-bg.jpg')
@section('title' , 'رزرو های شما ')
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
                <div class="table-responsive">

                    <table class="table table-bordered" style="direction: rtl;color: black">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>تاریخ شروع</th>
                            <th>تاریخ پایان</th>
                            <th>تعداد روز</th>
                            <th>مجموع</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(auth()->user()->orders()->count())
                            @foreach(auth()->user()->orders()->orderBy('created_at' , 'desc')->get() as $order)
                                <tr>
                                    <td>{{$loop->index}}</td>
                                    <td>{{jdate($order->start)->format('%Y-%m-%d')}}</td>
                                    <td>{{jdate($order->end)->format('%Y-%m-%d')}}</td>
                                    <td>{{datediff($order->start,$order->end)}}</td>
                                    <td>{{number_format($order->price)}} تومان </td>
                                </tr>
                            @endforeach
                        @else
                            <td colspan="6" style="text-align: center">رزرو قبلی ندارید</td>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
@endsection
