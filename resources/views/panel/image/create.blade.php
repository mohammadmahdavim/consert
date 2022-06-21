@extends('layouts.panel')

@section('content')
    <link href="/panel/assets/dropzone.min.css" rel="stylesheet">
    <script src="/panel/assets/dropzone.min.js"></script>
    <script type="text/javascript">

        Dropzone.options.dropzone =
            {

                maxFilesize: 5,
                renameFile: function (file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time + file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                timeout: 5000,
                addRemoveLinks: false,


            };
    </script>

    <!-- end::page header -->

    <main class="main-content">

        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="/panel/imageStore" enctype="multipart/form-data"
                                  class="dropzone" id="dropzone">
                                <label><b>انتخاب عکس</b><br>عکس های خود را اینجا بکشید</label>
                                <input name="id" value="{{$id}}" hidden>
                                <input name="type" value="{{$type}}" hidden>
                                @csrf
                                <div class="header-topinfo text-right">
                                    <ul>
                                        {{--<li><i class="fa fa-clock-o"></i>{{$rows->day}}:{{$rows->time}}</li>--}}


                                    </ul>
                                </div>
                            </form>
                            <a href="/panel/image/{{$id}}/{{$type}}">
                                <button type="submit" class="btn btn-primary btn-rounded btn-block">ثبت</button>

                            </a>
                        </div>
                    </div>
                    <script src="/js/sweet.js"></script>


                </div>
            </div>
        </div>
    </main>
    @include('sweetalert::alert')
@endsection('content')


