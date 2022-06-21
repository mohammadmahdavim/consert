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
                            <form class="form form-horizontal" action="/panel/discountUpdate/{{$row->id}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('errors')
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <span>تعداد</span>

                                            <input type="number" name="count" class="form-control" required
                                                   autocomplete="off"
                                                   value="{{$row->count}}"
                                            >
                                        </div>
                                        <div class="col-md-3">
                                            <span>نوع</span>
                                            <select class="form-control" name="type">
                                                <option @if($row->type==1) selected @endif value="1">درصدی</option>
                                                <option @if($row->type==2) selected @endif value="2">مبلغ (ریال)</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <span>میزان تخفیف</span>

                                            <input type="number" class="form-control" name="value" required
                                                   value="{{$row->value}}">
                                        </div>

                                        <div class="col-md-3">
                                            <span>شرط حداقل خرید</span>

                                            <input type="number" placeholder="۴ صندلی" class="form-control" name="if"
                                                   required
                                                   value="{{$row->if}}">
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
