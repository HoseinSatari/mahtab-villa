@extends('template.layout.header')
@section('image' , '/assets/images/backgrounds/page-header-bg.jpg')
@section('title' , 'سفارش شما ')
@section('content')
    <script>
        function code() {
            if (!$("#code").val()){
                if (!$("#alert-empty").length) {
                    $('#alert').html("<div class='alert alert-danger'>"+'فیلد کد تخفیف خالی میباشد'+"</div>");
                    $('#alert').show();
                    setTimeout(function(){
                        $('#alert').hide();
                    }, 3000);
                }

            }else{
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json'
                    }
                })
                $.ajax({
                    type: 'POST',
                    url: '/check_discount/'+ $("#code").val(),
                    data: JSON.stringify('send'),
                    success: function (item) {
                        if (item['error']){
                            $('#alert').html("<div class='alert alert-danger'>"+item['error']+"</div>");
                            $('#alert').show();
                            setTimeout(function(){
                                $('#alert').hide();
                            }, 3000);
                        }
                        if (item['success']){
                            $("#total").text(item['total']+' تومان');
                            $('#alert').html("<div class='alert alert-success'>"+item['success']+"</div>");
                            $('#alert').show();
                            setTimeout(function(){
                                $('#alert').hide();
                            }, 5000);

                        }


                    }
                })
            }


        }
    </script>
    <div class="container" style="margin-bottom: 20px;margin-top: 100px">
        <div class="row" style="margin-bottom: 50px">
            <p>زمان تحویل {{jdate(request()->session()->get('order.start'))->format('l')}} ساعت چهار بعد از ظهر و زمان تحویل {{jdate(request()->session()->get('order.end'))->format('l')}} ساعت دو بعد از ظهر میباشد</p>
            <div class="table-responsive">
                <table class="table table-striped" style="color: black;">
                    <thead>
                    <tr>
                        <th scope="col">نام </th>
                        <th scope="col">تعداد </th>
                        <th scope="col">تاریخ شروع</th>
                        <th scope="col">تاریخ پایان</th>
                        <th scope="col">تعداد روز</th>
                        <th scope="col"> مجموع</th>
                    </tr>
                    </thead>
                     <tbody>
                     <tr>
                         <th>خانه مهتاب</th>
                         <th>{{request()->session()->get('order.qty')}}</th>
                         <th>{{jdate(request()->session()->get('order.start'))->format('%Y-%m-%d')}}</th>
                         <th>{{jdate(request()->session()->get('order.end'))->format('%Y-%m-%d')}}</th>
                         <th>{{request()->session()->get('order.day')}}</th>
                         <th id="total">{{number_format(request()->session()->get('order.price'))}} تومان </th>

                     </tr>
                     </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-4"><div id='alert' class="hide"></div></div>
        </div>
        <form action="{{route('order.store')}}" method="post">
            @csrf
        <div class="row mb-3" >
            <div class="form-group col-xl-4 col-sm-11 col-md-4" >
                <div class="input-group">
                    <input type="text"  class="form-control" id="code" name="discount" placeholder="کد تخفیف">
                    <div class="input-group-append">
                        <a href="" class="btn btn-outline-secondary" onclick="event.preventDefault();code()">برسی</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="form-group col-xl-4 col-sm-11 col-md-4">
                <textarea name="descrip" id="" cols="30" rows="4" class="form-control" placeholder="توضیحی درباره رزرو خود اگه دارید در اینجا بنویسید"></textarea>
            </div>
        </div>
        @if(! \Illuminate\Support\Facades\Auth::check())
            <div class="row mb-3">
                <div class="form-group col-xl-4 col-sm-11 col-md-4">
                    <input type="number" name="phone" placeholder="شماره خود را وارد کنید (اجباری)" class="form-control" required>
                </div>
            </div>
            @endif
        <button class="btn btn-success">ثبت سفارش و پرداخت</button>
    </div>
</form>
@endsection



