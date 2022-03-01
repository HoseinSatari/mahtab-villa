@extends('template.layout.header')
@section('image' , '/assets/images/backgrounds/page-header-bg.jpg')
@section('title' , 'درباره ما')
@section('content')

    <section class="about-page">
        <div class="container">
            <div class="row">
                {!! option()->about !!}
            </div>
        </div>
    </section>
@endsection
