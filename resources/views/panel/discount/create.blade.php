@extends('layouts.panel')

@section('css')


@endsection
@section('content')
    <main class="main-content">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ایجاد تخفیف</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="/panel/discount/{{$id}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @include('errors')
                                <input type="hidden" name="sans_id" value="{{$id}}">
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <span>تعداد</span>

                                            <input type="number" name="count" class="form-control" required autocomplete="off"
                                                   value="{{old('count')}}"
                                            >
                                        </div>
                                        <div class="col-md-3">
                                            <span>نوع</span>
                                            <select class="form-control" name="type">
                                                <option value="1">درصدی</option>
                                                <option value="2">مبلغ (ریال)</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <span>میزان تخفیف</span>

                                            <input type="number" class="form-control" name="value" required
                                                   value="{{old('value')}}">
                                        </div>

                                        <div class="col-md-3">
                                            <span>شرط حداقل خرید</span>

                                            <input type="number" placeholder="۴ صندلی" class="form-control" name="if" required
                                                   value="{{old('if')}}">
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


@stop
