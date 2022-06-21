@extends('layouts.panel')

@section('css')
    <link rel="stylesheet" href="/panel/assets/vendors/select2/css/select2.min.css" type="text/css">
@endsection

@section('content')
    <main class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">لیست مالی</h4>
                            <div class="heading-elements">

                            </div>
                        </div>
                        <div class="d-flex flex-row">

                            <div class="p-2">

                                <button type='button' class="btn btn-primary" onclick="hideshow()" id='hideshow'>
                                    جستجوی پیشرفته
                                </button>
                            </div>
                            <div class="p-2">

                                <form method="get" action="/panel/finance/export">

                                    <input hidden name="status" value="{{request()->status}}">
                                    <input hidden name="name" value="{{request()->name}}">
                                    <input hidden name="mobile" value="{{request()->mobile}}">
                                    <input hidden name="count" value="{{request()->count}}">
                                    <input hidden name="code" value="{{request()->code}}">
                                    <input hidden name="price" value="{{request()->price}}">
                                    @if(request()->sans_id)
                                        <select hidden name="sans_id[]" multiple="multiple">
                                            @foreach(request()->sans_id as $sans)
                                                <option selected>{{$sans}}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                    @if(request()->program_id)
                                        <select hidden name="program_id[]" multiple="multiple">
                                            @foreach(request()->program_id as $program)
                                                <option selected>{{$program}}</option>
                                            @endforeach
                                        </select>
                                    @endif


                                    <button type='submit' class="btn btn-danger">
                                        دریافت فایل
                                    </button>
                                </form>
                            </div>

                        </div>
                        <div id='search' style="display: none">
                            <form method="get" action="/panel/finance">
                                <div class="d-flex flex-row">
                                    <div class="p-2">
                                        <label>خریدار</label>

                                        <input class="form-control" id="name" name="name" autocomplete="off"
                                               value="{{request()->name}}"
                                               placeholder="خریدار">
                                    </div>

                                    <div class="p-2">
                                        <label>موبایل</label>

                                        <input class="form-control" id="mobile" name="mobile" autocomplete="off"
                                               value="{{request()->mobile}}"
                                               placeholder="موبایل">
                                    </div>
                                    <div class="p-2">
                                        <label>برنامه</label>
                                        <br>
                                        <select multiple="multiple" class="js-example-basic-single" dir="rtl" id="program_id" name="program_id[]">
                                            @foreach($programs as $program)
                                                <option
                                                    @if(isset(request()->program_id) && is_array(request()->program_id)&& in_array($program->id, request()->program_id))  selected
                                                    @endif value="{{$program->id}}">{{$program->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="p-2">
                                        <label>سانس</label>
                                        <br>
                                        <select multiple="multiple" class="js-example-basic-single" dir="rtl" id="sans_id" name="sans_id[]">
                                            @foreach($sanses as $sans)
                                                <option
                                                    @if(isset(request()->sans_id) && is_array(request()->sans_id)&& in_array($sans->id, request()->sans_id))  selected
                                                    @endif value="{{$sans->id}}">{{$sans->date}}({{$sans->time}})</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <div class="p-2">
                                        <label>وضعیت</label>
                                        <br>
                                        <select  class="form-control" dir="rtl" id="status" name="status">
                                            <option></option>
                                            <option @if(request()->status=='waiting') selected @endif value="waiting">موفق</option>
                                            <option @if(request()->status=='success') selected @endif value="success">ناموفق</option>
                                        </select>

                                    </div>
                                    <div class="p-2">
                                        <label>تعداد بلیت</label>

                                        <input class="form-control" id="count" name="count" autocomplete="off"
                                               value="{{request()->count}}"
                                               placeholder="تعداد بلیت">
                                    </div>
                                    <div class="p-2">
                                        <label>پرداخت شده</label>

                                        <input class="form-control" id="price" name="price" autocomplete="off"
                                               value="{{request()->price}}"
                                               placeholder="پرداخت شده">
                                    </div>
                                    <div class="p-2">
                                        <label>کد پیگیری</label>

                                        <input class="form-control" id="code" name="code" autocomplete="off"
                                               value="{{request()->code}}"
                                               placeholder="کد پیگیری">
                                    </div>

                                </div>

                                <div class="d-flex flex-row">

                                    <div class="p-2">
                                        <br>
                                        <button type="submit" class="btn btn-info">جستجوکن</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">

                                <div class="table-responsive">
                                    <table class="table zero-configuration">
                                        <thead>
                                        <tr style="text-align: center">
                                            <th>ردیف</th>
                                            <th>خریدار</th>
                                            <th>موبایل</th>
                                            <th>برنامه</th>
                                            <th>سانس</th>
                                            <th>تعداد بلیت</th>
                                            <th>پرداخت شده</th>
                                            <th>کد پیگیری</th>
                                            <th>وضعیت</th>
                                            <th>صندلی ها</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rows as $index=>$row)
                                            <tr style="text-align: center">
                                                <th scope="row">{{ $index +1 }}</th>
                                                <td>{{$row->user->name}} </td>
                                                <td>{{$row->user->mobile}} </td>
                                                <td>{{$row->program->name}} </td>
                                                <td>{{$row->sans->date}}({{$row->sans->time}})</td>
                                                <td>{{$row->count}} </td>
                                                <td>{{$row->price}} </td>
                                                <td>{{$row->code}} </td>
                                                <td>{{$row->status}} </td>
                                                <td>
                                                    <button class="btn btn-info btn-sm" title="صندلی ها"
                                                            onclick="modal_show('{{$row->id}}','/panel/finance/chair');">
                                                        <i class="icon ti-user"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{$rows->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('include.modal.show')

@stop
@section('js')
    <!-- begin::select2 -->
    <script src="/panel/assets/vendors/select2/js/select2.min.js"></script>
    <script src="/panel/assets/js/examples/select2.js"></script>
    <!-- end::select2 -->

    <script>
        function hideshow() {
            var x = document.getElementById("search");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

    </script>
@endsection
