@extends('layouts.panel')


@section('content')
    <main class="main-content">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">ایجاد اسلایدر</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="/panel/slider" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @include('errors')
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-md-3">
                                            <br>
                                            <span>عنوان</span>

                                            <input type="text" id="title" name="title" class="form-control" required
                                                   value="{{old('title')}}"
                                            >
                                        </div>
                                        <div class="col-md-3">
                                            <br>
                                            <span>برنامه</span>
                                            <select class="form-control" name="program_id">
                                                @foreach($programs as $program)
                                                    <option value="{{$program->id}}">{{$program->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <br>
                                            <span>تصویر</span>

                                            <input type="file" class="form-control" name="file" required
                                                   value="{{old('file')}}">
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
