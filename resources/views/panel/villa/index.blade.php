@extends('panel.layouts.master')
@section( 'title','مدیریت ویلا')
@section('content')

    <div class="content-wrapper">


        <div class="content-header">
            <div class="container-fluid px-4">
                <div class="row mb-2 d-flex flex-wrap justify-content-between">

                    <h1 class="m-0 text-dark">مدیریت ویلا </h1>

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
                                    <th>عکس</th>
                                    <th>نام</th>
                                    <th>مبلغ</th>
                                    <th> ظرفیت استاندارد</th>
                                    <th>تعداد بازدید</th>
                                    <th>تعداد بازدیدکنندگان</th>
                                    <th>تعداد خرید</th>
                                    <th>تعداد خریداران</th>
                                    <th>اقدامات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-align-center"><img src="{{$vila->image}}"
                                                                       class="rounded-circle"
                                                                       alt="{{$vila->title}}" width="75px"
                                                                       height="75px"></td>
                                    <td class="text-align-center">{{$vila->title}}</td>
                                    <td class="text-align-center">{{number_format($vila->price)}}</td>
                                    <td class="text-align-center">{{$vila->qty}}</td>
                                    <td class="text-align-center"><i
                                            class="badge badge-info">0
{{--                                            {{$vila->visitor()}}--}}
                                        </i></td>
                                    <td class="text-align-center"><i
                                            class="badge badge-info">0
{{--                                            {{$vila->visit()->count()}}--}}
                                        </i></td>
                                    <td class="text-align-center"><i
                                            class="badge badge-success">0
{{--                                           {{$vila->order->sum(function ($item){ return $item->pivot->quantity;} )}}--}}
                                        </i>
                                    </td>
                                    <td class="text-align-center"><i
                                            class="badge badge-success">0
{{--                                            {{$vila->order->count() }}--}}
                                        </i></td>

                                    <td class="text-align-center">
                                        @can('update_vila')
                                            <a href="{{route('admin.vila.edit' , $vila->id)}}"
                                               class="btn btn-sm btn-success">ویرایش</a>
                                        @endcan
                                        @can('show_gallery')
                                            <a href="{{route('admin.gallery.index' , ['vila' => $vila->id])}}"
                                               class="btn btn-sm btn-warning">گالری محصول</a>
                                        @endcan
                                    </td>
                                </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection
