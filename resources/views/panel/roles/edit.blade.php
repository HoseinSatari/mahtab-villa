@extends('panel.layouts.master')
@section('title' , 'ویرایش مقام')
@section('content')


    <div class="content-wrapper">


        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12">
                        <h1 class="m-0 text-dark">ویرایش مقام </h1>
                    </div>
                </div>


            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card shadow-sm">

                    <div class="py-4 px-4 col-lg-10">


                        <form action="{{route('admin.Role.update' , $Role->id)}}" method="post" >
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label for="name"> مقام   </label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror "
                                           value="{{old('name', $Role->name)}}" id="name" placeholder="دسترسی  ">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="name">عنوان مقام   </label>
                                    <input type="text" name="label"
                                           class="form-control @error('label') is-invalid @enderror "
                                           value="{{old('label' , $Role->label)}}" id="name" placeholder="عنوان دسترسی  ">
                                    @error('label')
                                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">دسترسی ها  </label>
                                    <select class="form-control" name="permissions[]" id="permissions" multiple>
                                        @foreach(\App\Permission::all() as $permission)
                                            <option value="{{ $permission->id }}" {{in_array($permission->id , $Role->permissions()->pluck('id')->toarray()) ? 'selected'  : ''}}>{{ $permission->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-12">
                                    <button class="btn btn-success" type="submit">ویرایش </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>





@endsection
