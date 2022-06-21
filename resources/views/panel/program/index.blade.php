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
                            <h4 class="card-title">مدیریت برنامه</h4>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a href="{{url('panel/program/create')}}" class="btn  btn-success">افزودن <i
                                                class="fa fa-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <p class="card-text">در این قسمت می توانید برنامه جدید تعریف نمایید و هم چنین تمامی برنامه ها را
                                    مدیریت نمایید.</p>
                                <div class="table-responsive">
                                    <table class="table zero-configuration">
                                        <thead>
                                        <tr style="text-align: center">
                                            <th>ردیف</th>
                                            <th>نام</th>
                                            <th>کارگردان</th>
                                            <th>دوره اجرا</th>
                                            <th>مدت برنامه</th>
                                            <th>متن زیربلیت</th>
                                            <th>شروع اطلاع رسانی</th>
                                            <th>شروع فروش بلیت</th>
                                            <th>فعال/غیرفعال</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rows as $index=>$row)
                                            <tr style="text-align: center">
                                                <th scope="row">{{ $index +1 }}</th>
                                                <td>{{$row->name}} </td>
                                                <td>{{$row->director}}</td>
                                                <td>{{$row->period}}</td>
                                                <td>{{$row->time}}</td>
                                                <td>{{$row->textTicket}}</td>
                                                <td>{{$row->publish}}</td>
                                                <td>{{$row->start}}</td>
                                                <td>
                                                    <input style="text-align: right" type="checkbox" class=""
                                                           id=""
                                                           {{ $row->active ? 'checked' : '' }} onclick="toggless('{{$row->id}}',this) ">
                                                </td>
                                                <td>

                                                    <a href="/panel/image/{{$row->id}}/1">
                                                        <button class="btn btn-info btn-sm" title="تصاویر">
                                                            <i class="fa fa-image"></i>
                                                        </button>
                                                    </a>
                                                    <a href="/panel/image/{{$row->id}}/2">
                                                        <button class="btn btn-primary btn-sm" title="چهره ها">
                                                            <i class="fa fa-users"></i>
                                                        </button>
                                                    </a>
                                                    <a href="/panel/image/{{$row->id}}/3">
                                                        <button class="btn btn-warning btn-sm" title="مجوز ها">
                                                            <i class="fa fa-book"></i>
                                                        </button>
                                                    </a>

                                                    <a href="/panel/sans/{{$row->id}}">
                                                        <button class="btn btn-dark btn-sm" title="سانس ها">
                                                            <i class="fa fa-list-ul"></i>
                                                        </button>
                                                    </a>
                                                    <a href="/panel/program/{{$row->id}}/edit">
                                                        <button class="btn btn-success btn-sm" title="ویرایش">
                                                            <i class="icon ti-pencil"></i>
                                                        </button>
                                                    </a>

                                                    <x-destroy :id="$row->id" url="'/panel/program/programDestroy'"/>
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
                url: '{{url('/panel/program/changeStatus')}}',
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    active: active,
                    "id": id
                },
                success: function (data) {
                    if (active == 1) {
                        swal.fire({
                            title: "وضعیت برنامه فعال شد",
                            icon: "success",

                        });
                    }
                    if (active == 0) {
                        swal.fire({
                            title: "وضعیت برنامه غیر فعال شد",
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
