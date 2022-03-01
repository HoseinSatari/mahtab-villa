@extends('template.layout.header')
@section('image' , '/assets/images/backgrounds/page-header-bg.jpg')
@section('title' , 'بلاگ')
@section('content')

    <section class="news-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="news-details__left">
                        <div class="news-details__img">
                            <img src="{{$article->image}}" alt="{{$article->title}}">
                            <div class="news-one__date">
                                <p>{{jdate($article->created_at)->format('%d')}} <br> <span>{{jdate($article->created_at)->format('%B')}}</span></p>
                            </div>
                        </div>
                        <div class="news-details__content">
                            <ul class="list-unstyled news-one__meta">
                                <li><a href="" onclick="event.preventDefault()"><i class="far fa-user-circle"></i>{{$article->user->name}}</a></li>
                                <li><a href="#comment"><i class="far fa-comments"></i>{{$article->comments()->where('approved' , '1')->count()}} نظر</a>
                                </li>
                            </ul>
                          {!! $article->text !!}
                        </div>
                        <div class="news-details__bottom">
                            <p class="news-details__tags">
                                <span>دسته بندی ها:</span>
                                @foreach($article->category()->where('is_active' , '1')->get() as $cat)
                                <a href="{{route('articles' , ['c' => $cat->slug])}}">{{$cat->name}}</a>
                                @endforeach
                            </p>
                            <div class="news-details__social-list">
                                <a href="whatsapp://send?text={{route('single.article' , $article->slug)}}"><i style="font-family: 'Font Awesome 5 Brands'" class="fa fa-whatsapp"></i></a>
                                <a href="https://telegram.me/share/url?url={{route('single.article' , $article->slug)}}"><i style="font-family: 'Font Awesome 5 Brands'" class="fa fa-telegram"></i></a>


                            </div>
                        </div>
                        <div class="comment-one" id="comment">
                            <h3 class="comment-one__title">{{$article->comments()->where('approved' , '1')->count()}} نظر</h3>
                            @foreach($article->comments()->where('approved' , '1')->where('parent_id' , null)->get() as $comment)
                            <div class="comment-one__single">
                                <div class="comment-one__content">
                                    <h3>{{$comment->name}} </h3>
                                    <p>{{$comment->comment}}</p>
                                    @if($comment->child()->count())
                                        @foreach($comment->child()->get() as $child)
                                            <div class="comment-one__single">
                                                <div class="comment-one__content" style="margin-top: 20px;margin-right: 30px">
                                                    <h3>{{$child->name}} </h3>
                                                    <p>{{$child->comment}}</p>

                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            @endforeach

                        </div>
                        <div class="comment-form">
                            <h3 class="comment-form__title">پیام بگذارید</h3>
                            <form action="{{route('comment')}}" class="comment-one__form" method="post">
                                @csrf
                                <input type="hidden" name="commentable_id" value="{{$article->id}}">
                                <input type="hidden" name="commentable_type" value="{{get_class($article)}}">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="نام شما" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="شماره شما" name="phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="comment-form__input-box">
                                            <textarea name="comment" placeholder="نوشتن پیام"></textarea>
                                        </div>
                                        <button type="submit" class="thm-btn comment-form__btn">ارسال</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="sidebar">
                        <div class="sidebar__single sidebar__search">
                            <h3 class="sidebar__title clr-white">جستجو</h3>
                            <form action="{{route('articles')}}" class="sidebar__search-form">
                                <input type="search" placeholder="جستجو" name="q">
                                <button type="submit"><i class="icon-magnifying-glass"></i></button>
                            </form>
                        </div>
                        <div class="sidebar__single sidebar__post">
                            <h3 class="sidebar__title">اخبار اخیر</h3>
                            <ul class="sidebar__post-list list-unstyled">
                                @foreach(\App\Article::where('is_active' , '1')->latest()->get()->take(4) as $article)
                                <li>
                                    <div class="sidebar__post-image">
                                        <img src="{{$article->image}}" alt="{{$article->title}}">
                                    </div>
                                    <div class="sidebar__post-content">
                                        <h3>
                                            <a href="#" class="sidebar__post-content_meta"><i class="far fa-comments"></i>{{$article->comments()->where('approved', '1')->count()}} نظر</a>
                                            <a href="{{route('single.article' , ['slug' => $article->slug])}}">{{$article->title}}</a>
                                        </h3>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__single sidebar__category">
                            <h3 class="sidebar__title"> دسته بندی</h3>
                            <ul class="sidebar__category-list list-unstyled">
                                @foreach(\App\Category::where('is_active' , '1')->get()->take(5) as $cat)
                                <li><a href="{{route('articles' , ['c' => $cat->slug])}}">{{$cat->name}} </a></li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
