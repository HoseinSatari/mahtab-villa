@extends('template.layout.header')
@section('image' , '/assets/images/backgrounds/page-header-bg.jpg')
@section('title' , 'بلاگ')
@section('content')

    <section class="news-one">
        <div class="container">
            <div class="row">
                @foreach($articles as $articl)
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms" >
                    <!--News One Single-->
                    <div class="news-one__single">
                        <div class="news-one__img">
                            <img src="{{$articl->image}}" alt="{{$articl->title}}" style="height: 480px">
                            <a href="{{route('single.article' , ['slug' => $articl->slug])}}">
                                <span class="news-one__plus"></span>
                            </a>
                            <div class="news-one__date">
                                <p>{{jdate($articl->created_at)->format('%d')}} <br> <span>{{jdate($articl->created_at)->format('%B')}}</span></p>
                            </div>
                        </div>
                        <div class="news-one__content">
                            <ul class="list-unstyled news-one__meta">
                                <li><a href="" onclick="event.preventDefault()"><i class="far fa-user-circle"></i>{{$articl->user->name}}</a></li>
                                <li><a href="" onclick="event.preventDefault()"><i class="far fa-comments"></i>{{$articl->comments()->where('approved','1')->count()}} نظر</a>
                                </li>
                            </ul>
                            <h3 class="news-one__title">
                                <a href="{{route('single.article' , ['slug' => $articl->slug])}}">{{$articl->title}}</a>
                            </h3>
                        </div>
                    </div>
                </div>
                @endforeach


                {{$articles->render()}}
            </div>
        </div>
    </section>

@endsection
