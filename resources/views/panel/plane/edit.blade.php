@extends('layouts.panel')


@section('content')
    <main class="main-content">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h4 class="card-title">
                                    ویرایش جایگاه


                                </h4>
                            </div>
                            <div class="col-md-3" style="text-align: left">
                                <a href="/panel/plane/{{$row->salon_id}}">
                                    <button class="btn btn-warning">

                                        برگشت به لیست جایگاه ها
                                        &nbsp;
                                        <i
                                            class="fa fa-arrow-left"></i>

                                    </button>
                                </a>
                            </div>
                        </div>


                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="/panel/planeUpdate/{{$row->id}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                @include('errors')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <span>نام جایگاه</span>

                                            <input type="text" id="name" name="name" class="form-control" required
                                                   value="{{$row->name}}"
                                            >
                                        </div>


                                        <div class="col-md-3">
                                            <span>طبقه</span>
                                            <select class="form-control" name="floor">
                                                <option @if($row->floor==1) selected @endif  value="1">همکف</option>
                                                <option @if($row->floor==2) selected @endif  value="2">بالکن</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <span>موقعیت</span>
                                            <select class="form-control" name="position">
                                                <option @if($row->position==1) selected @endif value="1">مقابل</option>
{{--                                                <option @if($row->position==2) selected @endif value="2">چپ</option>--}}
{{--                                                <option @if($row->position==3) selected @endif value="3">راست</option>--}}
{{--                                                <option @if($row->position==4) selected @endif value="4">پشت</option>--}}
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <span>ردیف</span>
                                            <select class="form-control" name="row">
                                                <option @if($row->row==1) selected @endif>1</option>
{{--                                                <option @if($row->row==2) selected @endif>2</option>--}}
{{--                                                <option @if($row->row==3) selected @endif>3</option>--}}
{{--                                                <option @if($row->row==4) selected @endif>4</option>--}}
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <span>جهت صندلی</span>
                                            <select class="form-control" name="direction">
                                                <option @if($row->direction==1) selected @endif value="1">راست به چپ
                                                </option>
                                                <option @if($row->direction==2) selected @endif value="2">چپ به راست
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <span>تعداد صندلی</span>

                                            <input type="number" id="countChair" name="countChair"
                                                   class="form-control" required
                                                   value="{{$row->countChair}}"
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
