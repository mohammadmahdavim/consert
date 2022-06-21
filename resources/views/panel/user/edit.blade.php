@extends('layouts.panel')


@section('content')
    <main class="main-content">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ویرایش فرد</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="/panel/users/{{$row->id}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('errors')

                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <span>نام</span>

                                            <input type="text" id="name" class="form-control" name="name"
                                                   value="{{$row->name}}"
                                            >
                                        </div>


                                        <div class="col-md-3">
                                            <span>شماره موبایل</span>
                                            <input type="text" id="mobile" class="form-control" name="mobile"
                                                   value="{{$row->mobile}}">
                                        </div>
                                        <div class="col-md-3">
                                            <span>کد ملی</span>
                                            <input type="text" id="national_code" class="form-control"
                                                   value="{{$row->national_code}}" name="national_code" >
                                        </div>


{{--                                        <div class="col-md-6">--}}
{{--                                            <span >تصویر </span>--}}
{{--                                            <input type="file" class="form-control" id="file" name="file[]" multiple>--}}
{{--                                            @foreach($row->images as $image)--}}
{{--                                                <img src="{{asset('user_photos')}}/{{$image->file }}" id="previewImg"--}}
{{--                                                     alt="Partner Image">--}}
{{--                                                <x-destroy :id="$image->id" url="'/panel/deleteImage'"/>--}}
{{--                                                &nbsp;--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
                                    </div>

                                </div>
                                <br>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary mr-1 mb-1">ثبت</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
@stop

@section('script')
@stop
