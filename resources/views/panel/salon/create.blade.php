@extends('layouts.panel')


@section('content')
    <main class="main-content">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ایجاد سالن</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="/panel/salon" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @include('errors')
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <br>
                                            <span>نام سالن</span>

                                            <input type="text" id="name" name="name" class="form-control" required
                                                   value="{{old('name')}}"
                                            >
                                        </div>

                                        <div class="col-md-9">
                                            <br>
                                            <span>آدرس</span>

                                            <input type="text" class="form-control" name="address" required
                                                   value="{{old('address')}}">
                                        </div>

                                        <div class="col-md-3">
                                            <br>
                                            <span>چینش صندلی</span>
                                            <select class="form-control" name="type_chair">
                                                <option value="1">براساس نقشه سالن</option>
                                                <option value="2">به صورت دستی</option>
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

@section('script')
@stop
