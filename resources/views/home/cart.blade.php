@extends('layouts.home')

@section('content')
    <script src="/js/sweet.js"></script>

    @include('sweetalert::alert')
    <script src="/js/jquery.min.js"></script>


    <link rel="stylesheet" href="/panel/assets/icons/font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/home/vendors/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/panel/assets/css/pure.min.css" type="text/css">
    <!-- end::custom styles -->
    <section class="section-content pv12 bg-cover">
        <div class="container">


            <div class="row">

                <h3>بلیت ها</h3>

                <div class="table-responsive">
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
                            <th>حذف</th>
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

                                <td>{{$row->plane->row}}</td>
                                <td>{{$row->name}}</td>
                                <td>{{number_format($row->price)}}</td>

                                <td>

                                    <x-destroy :id="$row->id" url="'/panel/planeDestroy'"/>


                                </td>
                                <?php
                                $price = $row->price + $price;
                                $chair[] = $row->id;
                                $count = $count + 1;
                                ?>
                            </tr>
                        @endforeach
                        <?php
                        $chair=json_encode($chair);
                        ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <h4 style="font-family: 'B Koodak'">  قیمت کل با ۹ درصد ارزرش افزوده:
                    {{number_format($price*1.09)}}
                    تومان
                </h4>
                <a href="/home/chair/{{$row->plane->id}}/{{$row->sans->id}}">
                    <button class="btn btn-warning" style="font-family: 'B Koodak'">
                        برگشت به انتخاب صندلی
                        &nbsp;
                        <i
                            class="fa fa-arrow-left"></i>

                    </button>
                </a>
                <form action="/ticket/pay" method="post">
                    @csrf
                    <input type="hidden" name="price" value="{{$price}}">
                    <input type="hidden" name="program_id" value="{{$row->sans->program_id}}">
                    <input type="hidden" name="sans_id" value="{{$row->sans->id}}">
                    <input type="hidden" name="count" value="{{$count}}">
                    <input type="hidden" name="chair" value="{{$chair}}">
                    <input type="hidden" name="gateway_id" value="1">
                    <h2 style="font-family: 'B Koodak';text-align: center">مشخصات</h2>

                    <div class="row">

                        <div class="col-md-6">
                            <label style="font-family: 'B Koodak'">شماره همراه</label>
                            <input class="form-control" style="font-family: 'B Koodak'" name="mobile" required>

                        </div>

                        <div class="col-md-6">
                            <label style="font-family: 'B Koodak'">نام</label>
                            <input class="form-control" style="font-family: 'B Koodak'" name="name" required>

                        </div>
                    </div>
                    <br>
                    <button style="font-family: 'B Koodak';font-size: x-large" class="btn btn-info btn-block"
                            type="submit">ثبت
                    </button>
                </form>
            </div>
        </div>
    </section>

@endsection


