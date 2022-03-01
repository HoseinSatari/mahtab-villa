@extends('panel.layouts.master')
@section('title' , "اعمال دسترسی کاربر $user->name")
@section('content')

    <div class="content-wrapper">


        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12">
                        <h1 class="m-0 text-dark">اعمال دسترسی کاربر {{$user->name}}  </h1>
                    </div>
                </div>


            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card shadow-sm">

                    <div class="py-4 px-4 col-lg-10">


                        <form action="{{route('admin.user.permission' , $user->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">دسترسی ها  </label>
                                    <select class="form-control" name="permissions[]" style="height: 700px" id="permissions" multiple>
                                        @foreach(\App\Permission::all() as $permission)
                                            <option value="{{ $permission->id }}" {{in_array($permission->id , $user->permissions()->pluck('id')->toarray()) ? 'selected' : '' }}>{{ $permission->label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">مقام ها  </label>
                                    <select class="form-control" name="roles[]" id="roles" style="height: 700px" multiple>
                                        @foreach(\App\Role::all() as $role)
                                            <option value="{{ $role->id }}" {{in_array($role->id , $user->rolls()->pluck('id')->toarray()) ? 'selected' : '' }}>{{ $role->label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <button class="btn btn-success" type="submit">ثبت </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>





@endsection
