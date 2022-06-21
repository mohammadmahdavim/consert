@extends('layouts.panel')

@section('css')
@endsection

@section('content')
    <main class="main-content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">


                        <div class="card-header">

                            <h4 class="card-title">مدیریت اسلایدر</h4>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a href="{{url('panel/slider/create')}}" class="btn  btn-success">افزودن <i
                                                class="fa fa-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">

                                <div class="table-responsive">
                                    <table class="table zero-configuration">
                                        <thead>
                                        <tr style="text-align: center">
                                            <th>#</th>
                                            <th>عنوان</th>
                                            <th>برنامه</th>
                                            <th>تصویر</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rows as $index=>$row)
                                            <tr style="text-align: center">
                                                <th scope="row">{{ $index +1 }}</th>

                                                <td>{{$row->title}} </td>
                                                <td>{{$row->program->name}} </td>
                                                <td>
                                                <img src="/file/{{$row->filename}}" height="300 px" width="500px">
                                                </td>
                                                <td>

                                                    <input style="text-align: right" type="checkbox" class="form-check-input"
                                                           id="materialUnchecked"
                                                           {{ $row->active ? 'checked' : '' }} onclick="toggless('{{$row->id}}',this) ">



                                                    <x-destroy :id="$row->id" url="'/panel/slider/sliderDestroy'"/>

                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>


    </main>
    <!--/ Zero configuration table -->
@stop

@section('js')
    <script>
        function toggless(id, obj) {
            var $input = $(obj);
            var active = 0;
            if ($input.prop('checked')) {
                var active = 1;
            }

            $.ajaxSetup({

                'headers': {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $.ajax({
                url: '{{url('/panel/slider/changeStatus')}}',
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    active: active,
                    "id": id
                },
                success: function (data) {
                    if (active == 1) {
                        swal.fire({
                            title: "وضعیت اسلایدر فعال شد",
                            icon: "success",

                        });
                    }
                    if (active == 0) {
                        swal.fire({
                            title: "وضعیت اسلایدر غیر فعال شد",
                            icon: "success",

                        });
                    }
                }
            })


        }
    </script>

    <script src="/js/sweet.js"></script>

    @include('sweetalert::alert')
@endsection
