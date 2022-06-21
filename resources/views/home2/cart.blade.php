@extends('layouts.home2')
@section('menu')
    <div class="de-flex-col header-col-mid">
        <!-- mainmenu begin -->
        <ul id="mainmenu">
            <li><a style="font-family: 'B Koodak';color: white" href="/">خانه</a></li>

            <li><a style="color: white" href="contact">تماس و پشتیبانی</a>
            <li><a style="color: white" href="/law">قوانین ما</a>
            </li>

        </ul>
    </div>

@endsection
@section('content')
    <script src="/js/sweet.js"></script>

    @include('sweetalert::alert')
    <script src="/js/jquery.min.js"></script>


    <link rel="stylesheet" href="/panel/assets/css/pure.min.css" type="text/css">
    <!-- end::custom styles -->
    <section class="section-content pv12 bg-cover">
        <div class="container">
            <div class="d-flex flex-nowrap justify-content-start" style="font-family: 'B Koodak'">
                <div class="order-4 p-2" style="font-family: 'B Titr';color: #f14949">4.پرداخت</div>
                <div class="order-3 p-2"  style="font-family: 'B Titr';color: #f14949">3.انتخاب صندلی</div>
                <div class="order-2 p-2" style="font-family: 'B Titr';color: #f14949">2.انتخاب جایگاه</div>
                <div class="order-1 p-2" style="font-family: 'B Titr';color: #f14949">1.انتخاب سانس</div>
            </div>

            <div class="row">

                <h3>بلیت ها</h3>

                <div id="divid" class="table-responsive">
                    <table class="pure-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>سالن</th>
                            <th>تاریخ</th>
                            <th>ساعت</th>
                            <th>نام جایگاه</th>
                            <th>طبقه</th>
                            <th>موقعیت</th>
                            <th>ردیف</th>
                            <th>صندلی</th>
                            <th>قیمت بلیت</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $price = 0;
                        $count = 0;
                        $chair = [];
                        ?>
                        @foreach($chairs as $index=>$row)
                            <tr>
                                <th scope="row">{{ $index +1 }}</th>

                                <td>{{$row->salon->name}} </td>
                                <td>{{$row->sans->date}}</td>
                                <td>{{$row->sans->time}}</td>
                                <td>{{$row->plane->name}}</td>
                                <td>
                                    @if($row->plane->floor==1)
                                        همکف
                                    @else
                                        بالکن
                                    @endif
                                </td>
                                <td>
                                    @if($row->plane->position==1)
                                        مقابل
                                    @elseif($row->plane->position==2)
                                        چپ
                                    @elseif($row->plane->position==3)
                                        راست
                                    @else
                                        بالکن
                                    @endif
                                </td>

                                <td>{{$row->row->name}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{number_format($row->price)}}</td>


                                <?php
                                $price = $row->price + $price;
                                $chair[] = $row->id;
                                $count = $count + 1;
                                ?>
                            </tr>
                        @endforeach
                        <?php
                        $chair = json_encode($chair);
                        ?>
                        </tbody>
                    </table>
                </div>
                &nbsp;
            </div>
            <div class="row">

                <div class="col-md-3">
                    <input name="discount" class="form-control" id="discount" placeholder="کد تخفیف دارید؟">
                </div>
                <div class="col-md-2">
                    <button onclick="myFunction()" class="btn btn-success" style="font-family: 'B Koodak'">
                        ثبت
                        &nbsp
                    </button>
                </div>
                <div class="col-md-4">
                </div>
                <div class="col-md-2">
                    <button onclick="history.back()" class="btn btn-danger" style="font-family: 'B Koodak'">
                        ویرایش صندلی ها
                        &nbsp;
                        <i class="fa fa-arrow-left"></i>

                    </button>
                </div>
            </div>
            <h4 style="font-family: 'B Koodak'"> قیمت کل با ۹ درصد ارزرش افزوده:
                <span id="price-ticket">
                    {{number_format($price*1.09)}}
                </span>
                تومان
            </h4>
            <form id="form-contract" onsubmit="return false">
                @csrf
                <input type="hidden" id="price" name="price" value="{{$price*1.09}}">
                <input type="hidden" id="discount_value" name="discount_value" value="0">
                <input type="hidden" name="program_id" value="{{$row->sans->program_id}}">
                <input type="hidden" id="sans_id" name="sans_id" value="{{$row->sans->id}}">
                <input type="hidden" id="count" name="count" value="{{$count}}">
                <input type="hidden" name="chair" value="{{$chair}}">
                <input type="hidden" name="gateway_id" value="1">
                <h2 style="font-family: 'B Koodak';text-align: center"> مشخصات فردی</h2>

                <div class="row">
                    <div class="col-md-4">
                        <br>
                        <label style="font-family: 'B Koodak'">نام</label>
                        <input class="form-control" style="font-family: 'B Koodak'" name="name" id="name" required>

                    </div>
                    <div class="col-md-4">
                        <br>
                        <label style="font-family: 'B Koodak'">شماره همراه</label>

                        <input class="form-control" style="font-family: 'B Koodak'" name="mobile" id="mobile" required>

                    </div>
                    <div class="col-md-4">
                        @captcha
                        برای تغییر تصویر روی آن کلیک کنید.
                        <input type="text" class="form-control" id="captcha" name="captcha" autocomplete="off" required>
                    </div>
                </div>
                <br>
                <button style="font-family: 'B Koodak';font-size: x-large" class="btn btn-info btn-block"
                        onclick="formSend()"
                        type="submit">ثبت
                </button>
            </form>
        </div>

    </section>

@endsection
<script>
    function myFunction() {

        var code = document.getElementById("discount").value;
        var sans = document.getElementById("sans_id").value;
        var count = document.getElementById("count").value;
        $.ajax({
            url: '/discount' + '/' + code + '/' + sans + '/' + count,
            type: "GET",
            success: function (response) {
                console.log(response['percent'])
                if (response['status'] == 'ok') {
                    swal.fire({
                        title: "مجاز",
                        text: "کد تخفیف معتبر",
                        icon: "success",
                        timer: '3500'

                    });
                    var price = document.getElementById("price").value;
                    var pricedis = (price * (100 - response['percent'])) / 100
                    document.getElementById("price").value = pricedis;
                    $("#price-ticket").html(pricedis);
                    document.getElementById("discount_value").value = code;
                } else {
                    swal.fire({
                        title: "غیر مجاز",
                        text: response['message'],
                        icon: "error",
                        timer: '3500'
                    })
                }

            },
            error: function () {

                swal.fire({
                    title: "ناموفق",
                    text: "دوباره اقدام کنید",
                    icon: "warning",
                    timer: '3500'

                });

            },
        });

    }

    function formSend() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var data = $('#form-contract').serialize();

        $.ajax({
            url: '{{ url('/ticket/pay') }}',
            type: 'POST',
            data: data,

            success: function (response) {
                top.location.href = response['url'];
                swal.fire({
                    title: "عملیات موفق",
                    text: "هدایت به درگاه پرداخت!!!",
                    type: "success",
                    timer: 10000000,
                    buttons: true,
                })
            },

            error: function (xhr) {
                if (xhr.status === 422) {
                    jQuery.each(xhr.responseJSON.errors, function (key, value) {
                        alert(value)
                    });
                }
                if (xhr.status !== 422) {
                    alert(xhr.responseJSON.errors)
                }
            },

        });
    }


    <!-- END: Page CSS-->


</script>


