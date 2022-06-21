@extends('layouts.panel')


@section('content')
    <main class="main-content">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ایجاد جایگاه</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="/panel/plane/{{$id}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @include('errors')
                                <div class="form-body">
                                    <div class="row">
                                        <input type="hidden" name="salon_id" value="{{$id}}">
                                        <div class="col-md-3">
                                            <span>نام جایگاه</span>

                                            <input type="text" id="name" name="name" class="form-control" required
                                                   value="{{old('name')}}"
                                            >
                                        </div>


                                        <div class="col-md-3">
                                            <span>طبقه</span>
                                            <select class="form-control" name="floor">
                                                <option value="1">همکف</option>
                                                <option value="2">بالکن</option>
                                            </select>
                                        </div>
                                            <div class="col-md-3">
                                                <span>موقعیت</span>
                                                <select class="form-control" name="position">
                                                    <option value="1">مقابل</option>
{{--                                                    <option value="2">چپ</option>--}}
{{--                                                    <option value="3">راست</option>--}}
{{--                                                    <option value="4">پشت</option>--}}
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <span>ردیف</span>
                                                <select class="form-control" name="row">
                                                    <option >1</option>
{{--                                                    <option >2</option>--}}
{{--                                                    <option >3</option>--}}
{{--                                                    <option >4</option>--}}
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <span>جهت صندلی</span>
                                                <select class="form-control" name="direction">
                                                    <option value="1">راست به چپ</option>
                                                    <option value="2">چپ به راست</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <span>تعداد صندلی</span>

                                                <input type="number" id="countChair" name="countChair"
                                                       class="form-control" required
                                                       value="{{old('countChair')}}"
                                                >
                                            </div>

                                        </div>
                                    </div>

                                <br>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block">ثبت</button>
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
