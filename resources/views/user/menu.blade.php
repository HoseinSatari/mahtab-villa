<a href="{{route('user')}}"  class="btn btn-success col-lg-4 col-sm-11 col-md-11 col-xl-4" >
    اطلاعات کاربری
</a>
<a href="{{route('user.order')}}"   class="btn btn-success col-lg-4 col-sm-11  col-md-11 col-xl-4" >
    سفارشات
</a>

<a href="" onclick="event.preventDefault(); document.getElementById('logout').submit()" class="btn btn-success col-lg-3 col-sm-11 col-md-11 col-xl-3" >
    خروح
</a>
<form action="{{route('logout')}}"  id="logout" method="post">
    @csrf
</form>
