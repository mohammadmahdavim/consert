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

                            <h4 class="card-title">مدیریت تخفیف</h4>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a href="{{url('panel/discount/'.$id.'/create')}}" class="btn  btn-success">افزودن <i
                                                class="fa fa-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <p class="card-text">در این قسمت می توانید تخفیف جدید تعریف نمایید و هم چنین تمامی تخفیف ها را
                                    مدیریت نمایید.</p>
                                <div class="table-responsive">
                                    <table class="table zero-configuration">
                                        <thead>
                                        <tr style="text-align: center">
                                            <th>ردیف</th>
                                            <th>نام برنامه</th>
                                            <th>سانس</th>
                                            <th>کد تخفیف</th>
                                            <th>میزان تخفیف</th>
                                            <th>تعداد تخفیف</th>
                                            <th>استفاده شده</th>
                                            <th>شرط حداقل خرید</th>
                                            <th>فعال/غیرفعال</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rows as $index=>$row)
                                            <tr style="text-align: center">
                                                <th scope="row">{{ $index +1 }}</th>

                                                <td>{{$row->sans->program->name}} </td>
                                                <td>{{$row->sans->date}}({{$row->sans->time}})</td>


                                                <td>{{$row->code}}</td>
                                                <td>{{$row->value}}</td>
                                                <td>{{$row->count}}</td>
                                                <td>{{$row->used}}</td>
                                                <td>{{$row->if}}</td>
                                                <td>

                                                    <input style="text-align: right" type="checkbox" class=""
                                                           id=""
                                                           {{ $row->active ? 'checked' : '' }} onclick="toggless('{{$row->id}}',this) ">
                                                </td>

                                                <td>

                                                    <a href="/panel/discountEdit/{{$row->id}}">
                                                        <button class="btn btn-success btn-sm" title="ویرایش">
                                                            <i class="icon ti-pencil"></i>
                                                        </button>
                                                    </a>
                                                    <x-destroy :id="$row->id" url="'/panel/discountDestroy'"/>

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
                url: '{{url('/panel/discount/changeStatus')}}',
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    active: active,
                    "id": id
                },
                success: function (data) {
                    if (active == 1) {
                        swal.fire({
                            title: "وضعیت تخفیف فعال شد",
                            icon: "success",

                        });
                    }
                    if (active == 0) {
                        swal.fire({
                            title: "وضعیت تخفیف غیر فعال شد",
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
