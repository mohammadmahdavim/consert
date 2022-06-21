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

                            <h4 class="card-title">مدیریت سالن</h4>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a href="{{url('panel/salon/create')}}" class="btn  btn-success">افزودن <i
                                                class="fa fa-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <p class="card-text">در این قسمت می توانید سالن جدید تعریف نمایید و هم چنین تمامی سالن ها را
                                    مدیریت نمایید.</p>
                                <div class="table-responsive">
                                    <table class="table zero-configuration">
                                        <thead>
                                        <tr style="text-align: center">
                                            <th>ردیف</th>
                                            <th>نام</th>
                                            <th>آدرس</th>
                                            <th>فعال/غیرفعال</th>
{{--                                            <th>صندلی</th>--}}
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rows as $index=>$row)
                                            <tr style="text-align: center">
                                                <th scope="row">{{ $index +1 }}</th>

                                                <td>{{$row->name}} </td>
                                                <td>{{$row->address}}</td>
                                                <td>

                                                    <input style="text-align: right" type="checkbox" class="form-check-input"
                                                           id="materialUnchecked"
                                                           {{ $row->active ? 'checked' : '' }} onclick="toggless('{{$row->id}}',this) ">
                                                </td>
{{--                                                <td>{{$row->type_chair}}</td>--}}

                                                <td>
                                                    <a href="/panel/plane/{{$row->id}}">
                                                        <button class="btn btn-primary btn-sm" title="چیدمان">
                                                            <i class="icon ti-unlink"></i>
                                                        </button>
                                                    </a>
                                                    <a href="/panel/salon/{{$row->id}}/edit">
                                                        <button class="btn btn-success btn-sm" title="ویرایش">
                                                            <i class="icon ti-pencil"></i>
                                                        </button>
                                                    </a>

                                                    <x-destroy :id="$row->id" url="'/panel/salon/salonDestroy'"/>

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
                url: '{{url('/panel/salon/changeStatus')}}',
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    active: active,
                    "id": id
                },
                success: function (data) {
                    if (active == 1) {
                        swal.fire({
                            title: "وضعیت سالن فعال شد",
                            icon: "success",

                        });
                    }
                    if (active == 0) {
                        swal.fire({
                            title: "وضعیت سالن غیر فعال شد",
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
