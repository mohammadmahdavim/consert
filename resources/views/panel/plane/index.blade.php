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
                            <h4 class="card-title">مدیریت جایگاه سالن</h4>
                            <div class="heading-elements">
                                <div class="row">
                                    <div class="col-md-9">
                                        <a href="{{url('/panel/plane/'.$id.'/create/')}}" class="btn  btn-success">افزودن
                                            <i
                                                class="fa fa-plus"></i></a>
                                    </div>
                                    <div class="col-md-3" style="text-align: left">
                                        <a href="/panel/salon"><button class="btn btn-warning">
                                                برگشت به لیست سالن ها
                                                &nbsp;
                                                <i
                                                    class="fa fa-arrow-left"></i>

                                            </button></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">
                                <p class="card-text">در این قسمت می توانید جایگاه سالن جدید تعریف نمایید و هم چنین تمامی
                                    جایگاه سالن ها را
                                    مدیریت نمایید.</p>
                                <div class="table-responsive">
                                    <table class="table zero-configuration">
                                        <thead>
                                        <tr style="text-align: center">
                                            <th>ردیف</th>
                                            <th>سالن</th>
                                            <th>نام جایگاه</th>
                                            <th>طبقه</th>
                                            <th>موقعیت</th>
                                            <th>ردیف</th>
                                            <th>تعداد صندلی</th>
                                            <th>جهت صندلی ها</th>
                                            <th>وضعیت</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rows as $index=>$row)
                                            <tr style="text-align: center">
                                                <th scope="row">{{ $index +1 }}</th>

                                                <td>{{$row->salon->name}} </td>
                                                <td>{{$row->name}}</td>
                                                <td>
                                                    @if($row->floor==1)
                                                        همکف
                                                    @else
                                                        بالکن
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($row->position==1)
                                                        مقابل
                                                    @elseif($row->position==2)
                                                        چپ
                                                    @elseif($row->position==3)
                                                        راست
                                                    @else
                                                        بالکن
                                                    @endif
                                                </td>
                                                <td>{{$row->row}}</td>
                                                <td>{{$row->countChair}}</td>
                                                <td>
                                                    @if($row->direction==1)
                                                        راست به چپ
                                                    @else
                                                        چپ به راست
                                                    @endif
                                                </td>
                                                <td>

                                                    <input style="text-align: right" type="checkbox" class=""
                                                           id=""
                                                           {{ $row->active ? 'checked' : '' }} onclick="toggless('{{$row->id}}',this) ">
                                                </td>

                                                <td>
                                                    <a href="/panel/plane/chair/{{$row->id}}">
                                                        <button class="btn btn-primary btn-sm" title="صندلی ها">
                                                            <i class="fa fa-university"></i>
                                                        </button>
                                                    </a>
                                                    <a href="/panel/planeEdit/{{$row->id}}">
                                                        <button class="btn btn-success btn-sm" title="ویرایش">
                                                            <i class="icon ti-pencil"></i>
                                                        </button>
                                                    </a>

                                                    <x-destroy :id="$row->id" url="'/panel/planeDestroy'"/>

                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <img id="Image-Maps-Com-image-maps-2022-02-25-064207" src="/home/images/stages/1.png" border="0" width="500" height="471" orgWidth="500" orgHeight="471" usemap="#image-maps-2022-02-25-064207" alt="" />


                                <map name="image-maps-2022-02-25-064207" id="ImageMapsCom-image-maps-2022-02-25-064207">
                                    <area  alt="" title="" href="/panel/plane/chair/{{$rows->where('floor',1)->first()->id}}"  shape="rect" coords="103,86,409,269" style="outline:none;" target="_self" />
                                    <area  alt="" title="" href="/panel/plane/chair/{{$rows->where('floor',2)->first()->id}}"  shape="rect" coords="36,301,468,426" style="outline:none;" target="_self" />
                                    <area shape="rect" coords="498,469,500,471" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_0" />
                                </map>
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
                url: '{{url('/panel/plane/changeStatus')}}',
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    active: active,
                    "id": id
                },
                success: function (data) {
                    if (active == 1) {
                        swal.fire({
                            title: "وضعیت جایگاه فعال شد",
                            icon: "success",

                        });
                    }
                    if (active == 0) {
                        swal.fire({
                            title: "وضعیت جایگاه غیر فعال شد",
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
