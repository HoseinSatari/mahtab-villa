@extends('panel.layouts.master')
@section('title' , "ویرایش ویلا  ")
@section('scripts')
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script src="/js/ckeditor/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/admin/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/admin/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
            filebrowserBrowseUrl: '/admin/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/admin/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}'
        };
        CKEDITOR.replace('descrip', options);

        $('#lfm').filemanager('file');

        let changeAttributeValues = (event, id) => {
            let valueBox = $(`select[name='attributes[${id}][value]']`);

            //
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                }
            })
            //
            $.ajax({
                type: 'POST',
                url: '/admin/attribute/values',
                data: JSON.stringify({
                    name: event.target.value
                }),
                success: function (res) {
                    valueBox.html(`
                            <option value="" selected>انتخاب کنید</option>
                            ${
                        res.data.map(function (item) {
                            return `<option value="${item}">${item}</option>`
                        })
                    }
                        `);
                }
            });
        }

        let createNewAttr = ({attributes, id}) => {

            return `
                    <div class="row" id="attribute-${id}">
                        <div class="col-5">
                            <div class="form-group">
                                 <label>عنوان ویژگی</label>
                                 <select name="attributes[${id}][name]" onchange="changeAttributeValues(event, ${id});" class="attribute-select form-control">
                                    <option value="">انتخاب کنید</option>
                                    ${
                attributes.map(function (item) {
                    return `<option value="${item}">${item}</option>`
                })
            }
                                 </select>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                 <label>مقدار ویژگی</label>
                                 <select name="attributes[${id}][value]" class="attribute-select form-control">
                                        <option value="">انتخاب کنید</option>
                                 </select>
                            </div>
                        </div>
                         <div class="col-2">
                            <label >اقدامات</label>
                            <div>
                                <button type="button" class="btn btn-sm btn-warning" onclick="document.getElementById('attribute-${id}').remove()">حذف</button>
                            </div>
                        </div>
                    </div>
                `
        }

        $('#add_product_attribute').click(function () {
            let attributesSection = $('#attribute_section');
            let id = attributesSection.children().length;

            let attributes = $('#attributes').data('attributes');

            attributesSection.append(
                createNewAttr({
                    attributes,
                    id
                })
            );
            {!! \File::get(public_path('/plugins/select2/select2.full.js')) !!}
            $('.attribute-select').select2({tags: true});
        });

    </script>
@endsection
@section('content')

    <div class="content-wrapper">


        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12">
                        <h1 class="m-0 text-dark">ویرایش ویلا</h1>
                    </div>
                </div>


            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card shadow-sm">

                    <div class="py-4 px-4 col-lg-10">

                        <div id="attributes"
                             data-attributes="{{ json_encode(\App\Attribute::all()->pluck('name')) }}"></div>

                        <form action="{{route('admin.vila.update' , ['vila' => $vila->id] )}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label ">نام </label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="inputEmail3"
                                           placeholder="نام ویلا" value="{{ old('title' , $vila->title) }}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail2" class="col-sm-3 control-label">توضیح کوتاه درباره محصول</label>
                                    <textarea class="form-control @error('short_descrip') is-invalid @enderror" name="short_descrip"
                                              id="short_descrip" cols="30"
                                              rows="4">{{ old('short_descrip', $vila->short_descrip) }}</textarea>
                                    @error('short_descrip')
                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">توضیحات</label>
                                    <textarea class="form-control @error('descrip') is-invalid @enderror" name="descrip"
                                              id="descrip" cols="30"
                                              rows="10">{{ old('descrip' , $vila->descrip) }}</textarea>
                                    @error('descrip')
                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label " >ویدیو ویلا </label>
                                    <div class="input-group">
                                        <input type="text" id="thumbnail" value="{{old('video' , $vila->video)}}" class="form-control" name="video">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="button" id="lfm" data-input="thumbnail" data-preview="holder">انتخاب</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">قیمت</label>
                                    <input type="number" name="price"
                                           class="form-control @error('price') is-invalid @enderror" id="inputPassword3"
                                           placeholder="قیمت را وارد کنید" value="{{ old('price' , $vila->price) }}">
                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-4 control-label">قیمت (شنبه،یکشنبه،دوشنبه،سه شنبه)</label>
                                    <input type="number" name="price2"
                                           class="form-control @error('price2') is-invalid @enderror" id="inputPassword3"
                                           placeholder="قیمت را وارد کنید" value="{{ old('price2' , $vila->price2) }}">
                                    @error('price2')
                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword3" class="col-sm-2 control-label">ظرفیت استاندارد</label>
                                    <input type="number" name="qty"
                                           class="form-control @error('qty') is-invalid @enderror" id="inputPassword3"
                                           placeholder="تعداد را وارد کنید" value="{{ old('qty' , $vila->qty) }}">
                                    @error('qty')
                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                    @enderror
                                </div>

                                <h6>ویژگی محصول</h6>
                                <hr>
                                <div id="attribute_section">
                                    @foreach($vila->attributes as $attribut)
                                        <div class="row" id="attribute-{{$loop->index}}">
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label>عنوان ویژگی</label>
                                                    <select name="attributes[{{$loop->index}}][name]"
                                                            onchange="changeAttributeValues(event, {{$loop->index}});"
                                                            class="attribute-select form-control">
                                                        <option value="">انتخاب کنید</option>
                                                        @foreach(\App\Attribute::all() as $at)
                                                            <option
                                                                value="{{$at->name}}" {{$at->name == $attribut->name ? 'selected' : ''}}>{{$at->name}} </option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="form-group">
                                                    <label>مقدار ویژگی</label>
                                                    <select name="attributes[{{$loop->index}}][value]"
                                                            class="attribute-select form-control">
                                                        <option value="">انتخاب کنید</option>

                                                        @foreach($attribut->values as $value)
                                                            <option
                                                                value="{{$value->value}}"{{$value->id == $attribut->pivot->value_id ? 'selected' : ''}} >{{$value->value}} </option>

                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <label>اقدامات</label>
                                                <div>
                                                    <button type="button" class="btn btn-sm btn-warning"
                                                            onclick="document.getElementById('attribute-{{$loop->index}}').remove()">
                                                        حذف
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button class="btn btn-sm btn-danger" type="button" id="add_product_attribute">ویژگی
                                    جدید
                                </button>
                                <hr>

                            </div>

                            <div class="col-lg-12">
                                <button class="btn btn-success" type="submit">ویرایش</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
