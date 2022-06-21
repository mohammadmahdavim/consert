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
                        <h4 class="card-title">ایجاد سانس</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="/panel/sans/{{$id}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @include('errors')
                                <input type="hidden" name="program_id" value="{{$id}}">
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <span>تاریخ</span>

                                            <input type="text" id="date-picker-shamsi" name="date" class="form-control" required autocomplete="off"
                                                   value="{{old('date')}}"
                                            >
                                        </div>

                                        <div class="col-md-3">
                                            <span>ساعت</span>

                                            <input type="text" class="form-control" name="time" required
                                                   value="{{old('time')}}">
                                        </div>

                                        <div class="col-md-3">
                                            <span>سالن محل اجرا</span>
                                            <select class="form-control" name="salon_id">
                                                @foreach($salons as $salon)
                                                    <option value="{{$salon->id}}">{{$salon->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <span>وضعیت</span>
                                            <select class="form-control" name="active">
                                                    <option value="1">فعال</option>
                                                    <option value="0">غیرفعال</option>
                                            </select>
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

    <script src="/panel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.js"></script>
    <script src="/panel/assets/vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js"></script>
    <script src="/panel/assets/vendors/datepicker/daterangepicker.js"></script>
    <script src="/panel/assets/js/examples/datepicker.js"></script>
@stop
