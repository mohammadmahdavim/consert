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


    <link rel="stylesheet" href="/panel/assets/icons/font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/home/vendors/bootstrap/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/panel/assets/css/pure.min.css" type="text/css">
    <!-- end::custom styles -->
    <section class="section-content pv12 bg-cover">
        <div class="container">

<br>
<br>
<br>
<br>
            <div class="row">

                <form action="/ticket/code" method="post">
                    @csrf



                    <div class="row">

                        <div class="col-md-6">
                            <label style="font-family: 'B Koodak'">کد پیگیری</label>
                            <input class="form-control" style="font-family: 'B Koodak'" name="code" required>

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


