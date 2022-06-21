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
                                    ویرایش سالن


                                </h4>
                            </div>
                            <div class="col-md-3" style="text-align: left">
                                <a href="/panel/salon">
                                    <button class="btn btn-warning">

                                        برگشت به لیست سالن ها
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
                            <form class="form form-horizontal" action="/panel/salon/{{$row->id}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @include('errors')
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <br>
                                            <span>نام سالن</span>

                                            <input type="text" id="name" name="name" class="form-control" required
                                                   value="{{$row->name}}"
                                            >
                                        </div>

                                        <div class="col-md-9">
                                            <br>
                                            <span>آدرس</span>

                                            <input type="text" class="form-control" name="address" required
                                                   value="{{$row->address}}">
                                        </div>

                                        <div class="col-md-3">
                                            <br>
                                            <span>چینش صندلی</span>
                                            <select class="form-control" name="type_chair">
                                                <option @if($row->type_chair==1) selected @endif value="1">براساس نقشه سالن</option>
                                                <option @if($row->type_chair==2) selected @endif  value="2">به صورت دستی</option>
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
