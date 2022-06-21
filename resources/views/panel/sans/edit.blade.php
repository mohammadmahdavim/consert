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
                        <h4 class="card-title">ویرایش سانس</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="/panel/sansUpdate/{{$row->id}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('errors')
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <span>تاریخ</span>

                                            <input type="text" id="date-picker-shamsi" name="date" class="form-control" required autocomplete="off"
                                                   value="{{$row->date}}"
                                            >
                                        </div>

                                        <div class="col-md-3">
                                            <span>ساعت</span>

                                            <input type="text" class="form-control" name="time" required
                                                   value="{{$row->time}}">
                                        </div>

                                        <div class="col-md-3">
                                            <span>سالن محل اجرا</span>
                                            <select class="form-control" name="salon_id">
                                                @foreach($salons as $salon)
                                                    <option @if($row->salon_id==$salon->id) selected @endif value="{{$salon->id}}">{{$salon->name}}</option>
                                                @endforeach
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
