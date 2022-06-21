@extends('layouts.panel')
@section('css')

<link rel="stylesheet" href="/panel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="/panel/assets/vendors/datepicker/daterangepicker.css">

@endsection
@section('content')
    <main class="main-content">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ایجاد برنامه</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="/panel/program" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @include('errors')
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <br>

                                            <span>نام برنامه</span>

                                            <input type="text" id="name" name="name" class="form-control" required
                                                   value="{{old('name')}}"
                                            >
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <span> کارگردان</span>

                                            <input type="text" id="director" name="director" class="form-control" required
                                                   value="{{old('director')}}" >
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <span>دوره اجرا</span>

                                            <input placeholder="۲۰ تا ۲۵ فروردین" type="text" id="period" name="period" class="form-control" required
                                                   value="{{old('period')}}" >
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <span>مدت برنامه به دقیقه</span>

                                            <input type="number" id="time" name="time" class="form-control" required
                                                   value="{{old('time')}}" >
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <span>متن زیربلیت</span>

                                            <input type="text" id="textTicket" name="textTicket" class="form-control" required
                                                   value="{{old('textTicket')}}" >
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <span>نوع نمایش</span>
<select class="form-control" name="type">
    <option value="1">کنسرت</option>
    <option value="2">جنگ شادی</option>
    <option value="3">همایش</option>
    <option value="4">تئاتر</option>
</select>

                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <span>شروع اطلاع رسانی</span>

                                            <input autocomplete="off" type="text" id="date-picker-shamsi-new" name="publish" class="form-control" required
                                                   value="{{old('publish')}}" >
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <span>شروع فروش بلیت</span>

                                            <input autocomplete="off" type="text" id="date-picker-shamsi" name="start" class="form-control" required
                                                   value="{{old('start')}}" >
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <span> ساعت شروع فروش بلیت</span>

                                            <input autocomplete="off" type="time" id="start_time" name="start_time"
                                                   class="form-control" required
                                                   value="{{old('start_time')}}">
                                        </div>
                                        <div class="col-md-12">
                                            <br>
                                            <span>توضیحات</span>

                                            <textarea id="editor-demo1" name="description"
                                            >{{old('description')}}</textarea>
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

@section('js')
    <!-- begin::CKEditor -->
    <script src="/panel/assets/vendors/ckeditor/ckeditor.js"></script>
    <script src="/panel/assets/js/examples/ckeditor.js"></script>
    <!-- end::CKEditor -->
    <script src="/panel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.js"></script>
    <script src="/panel/assets/vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js"></script>
    <script src="/panel/assets/vendors/datepicker/daterangepicker.js"></script>
    <script src="/panel/assets/js/examples/datepicker.js"></script>
@stop
