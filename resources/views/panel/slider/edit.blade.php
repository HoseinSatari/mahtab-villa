@extends('panel.layouts.master')
@section('title' , "ویرایش اسلاید")
@section('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('#lfm').filemanager('image');

    </script>

@endsection
@section('content')

<div class="content-wrapper">



    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                <h1 class="m-0 text-dark">ویرایش اسلاید</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
           <div class="card shadow-sm p-2">
               <div class="py-4 px-4 col-lg-10">
               <form action="{{route('admin.slider.update' , $slider->id)}}" method="post" enctype="multipart/form-data">
                   @csrf
                   @method('put')

                   <div class="row">
                       <div class="col-lg-6 form-group">
                           <label for="name"> متن(اختیاری) </label>
                           <input type="text" name="text"
                                  class="form-control @error('text') is-invalid @enderror "
                                  value="{{old('text' , $slider->text)}}" id="text" placeholder="متن  ">
                           @error('text')
                           <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                           @enderror
                       </div>
                       <div class="col-lg-6 form-group">
                           <label for="name">متن دو(اختیاری) </label>
                           <input type="text" name="text2"
                                  class="form-control @error('text2') is-invalid @enderror "
                                  value="{{old('text2',$slider->text2)}}" id="text2" placeholder="متن دو  ">
                           @error('title')
                           <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                           @enderror
                       </div>

                       <div class="col-lg-6 form-group">
                           <label for="name">عکس اسلاید (برای نمایش صحیح عرض را روی 1920 و ارتفاع 1000 بگذارید) </label>
                           <div class="input-group">
                               <input type="text" value="{{old('image' , $slider->image)}}" id="thumbnail" class="form-control" name="image">
                               <div class="input-group-append">
                                   <div class="input-group-append">
                                       <button class="btn btn-outline-secondary" type="button" id="lfm" data-input="thumbnail" data-preview="holder">انتخاب</button>
                                   </div>
                               </div>
                           </div>
                       </div>

                       <div class="col-lg-6 form-group">
                           <label for="name">ترتیب نمایش  </label>
                           <input type="number" name="order"
                                  class="form-control @error('order') is-invalid @enderror "
                                  value="{{old('order' , $slider->order)}}" id="name" placeholder="1">
                           @error('order')
                           <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                           @enderror
                       </div>

                       <div class="col-lg-12 form-group p-2">
                           <input type="checkbox" class="is_active" name="is_active" id="is_active" @if(!$slider->is_active) checked @endif>
                           <label for="is_active">اسلاید غیرفعال باشد  </label>
                       </div>

                       <div class="col-lg-12">
                           <button class="btn btn-success" type="submit">ویرایش اسلاید</button>
                       </div>
                   </div>

               </form>
               </div>
           </div>
        </div>
    </div>

</div>

@endsection
