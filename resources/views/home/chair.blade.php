<html dir="rtl" lang="fa"
      class=" js flexbox flexboxlegacy canvas canvastext webgl no-touch geolocation postmessage websqldatabase indexeddb hashchange history draganddrop websockets rgba hsla multiplebgs backgroundsize borderimage borderradius boxshadow textshadow opacity cssanimations csscolumns cssgradients cssreflections csstransforms csstransforms3d csstransitions fontface generatedcontent video audio localstorage sessionstorage webworkers no-applicationcache svg inlinesvg smil svgclippaths"
      style="">
<head>

    <meta charset="UTF-8">
    <title>انتخاب صندلی</title>
    <meta name="robots" content="noindex">

</head>
<body>

<script src="/js/sweet.js"></script>

@include('sweetalert::alert')
<script src="/js/jquery.min.js"></script>


<link rel="stylesheet" href="/panel/assets/icons/font-awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="/home/vendors/bootstrap/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="/panel/assets/css/pure.min.css" type="text/css">


<style class="INLINE_PEN_STYLESHEET_ID">
    *,
    *:before,
    *:after {
        box-sizing: border-box;
    }

    html {
        font-size: 16px;
        background-color: #309084;
    }

    .plane {
        /*margin: 0px auto;*/
        max-width: 400px;
    }

    .cockpit {
        height: 150px;
        /*position: relative;*/
        overflow: hidden;
        text-align: center;
        border-bottom: 5px solid #d8d8d8;
    }

    .cockpit:before {
        content: "";
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        height: 100px;
        width: 100%;
        border-radius: 50%;
        border-right: 250px solid #0d115f;
        border-left: 250px solid #0d115f;
    }

    .cockpit h1 {
        width: 60%;
        margin: 100px auto 35px auto;
    }

    .exit {
        position: relative;
        height: 50px;
    }

    .exit:before, .exit:after {
        content: "EXIT";
        font-size: 14px;
        line-height: 18px;
        padding: 0px 2px;
        font-family: "Arial Narrow", Arial, sans-serif;
        display: block;
        position: absolute;
        background: green;
        color: white;
        top: 50%;
        transform: translate(0, -50%);
    }

    .exit:before {
        left: 0;
    }

    .exit:after {
        right: 0;
    }

    .fuselage {
        border-right: 5px solid #d8d8d8;
        border-left: 5px solid #d8d8d8;
    }

    ol {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .seats {
        display: flex;
        flex-direction: row;
        flex -wrap: nowrap;
        justify-content: flex-start;
    }

    .seat {
        display: flex;
        flex: 0 0 7.2857142857%;
        padding: 1px;
        position: relative;
    }

    .seat:nth-child(3) {
        /*margin-right: 14.2857142857%;*/
    }

    .seat input[type=checkbox] {
        position: absolute;
        opacity: 0;
    }

    .seat input[type=checkbox]:checked + label {
        background: #6161f6 ;
        -webkit-animation-name: rubberBand;
        animation-name: rubberBand;
        animation-duration: 300ms;
        animation-fill-mode: both;
    }

    .seat input[type=checkbox]:disabled + label {
        background: #dddddd;
        text-indent: -9999px;
        overflow: hidden;
    }

    .seat input[type=checkbox]:disabled + label:after {
        content: "X";
        text-indent: 0;
        position: absolute;
        top: 4px;
        left: 50%;
        transform: translate(-50%, 0%);
    }

    .seat input[type=checkbox]:disabled + label:hover {
        box-shadow: none;
        cursor: not-allowed;
    }

    .seat label {
        display: block;
        position: relative;
        width: 100%;
        text-align: center;
        font-size: 14px;
        font-weight: bold;
        line-height: 1.5rem;
        padding: 4px 0;
        background: #b0f3b7;
        border-radius: 5px;
        animation-duration: 300ms;
        animation-fill-mode: both;
    }

    .seat label:before {
        content: "";
        position: absolute;
        width: 75%;
        height: 75%;
        top: 1px;
        left: 50%;
        transform: translate(-50%, 0%);
        background: rgba(255, 255, 255, 0.4);
        border-radius: 3px;
    }

    .seat label:hover {
        cursor: pointer;
        box-shadow: 0 0 0px 2px #5c6aff;
    }

    @-webkit-keyframes rubberBand {
        0% {
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
        }
        30% {
            -webkit-transform: scale3d(1.25, 0.75, 1);
            transform: scale3d(1.25, 0.75, 1);
        }
        40% {
            -webkit-transform: scale3d(0.75, 1.25, 1);
            transform: scale3d(0.75, 1.25, 1);
        }
        50% {
            -webkit-transform: scale3d(1.15, 0.85, 1);
            transform: scale3d(1.15, 0.85, 1);
        }
        65% {
            -webkit-transform: scale3d(0.95, 1.05, 1);
            transform: scale3d(0.95, 1.05, 1);
        }
        75% {
            -webkit-transform: scale3d(1.05, 0.95, 1);
            transform: scale3d(1.05, 0.95, 1);
        }
        100% {
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
        }
    }

    @keyframes rubberBand {
        0% {
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
        }
        30% {
            -webkit-transform: scale3d(1.25, 0.75, 1);
            transform: scale3d(1.25, 0.75, 1);
        }
        40% {
            -webkit-transform: scale3d(0.75, 1.25, 1);
            transform: scale3d(0.75, 1.25, 1);
        }
        50% {
            -webkit-transform: scale3d(1.15, 0.85, 1);
            transform: scale3d(1.15, 0.85, 1);
        }
        65% {
            -webkit-transform: scale3d(0.95, 1.05, 1);
            transform: scale3d(0.95, 1.05, 1);
        }
        75% {
            -webkit-transform: scale3d(1.05, 0.95, 1);
            transform: scale3d(1.05, 0.95, 1);
        }
        100% {
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
        }
    }

    .rubberBand {
        -webkit-animation-name: rubberBand;
        animation-name: rubberBand;
    }
</style>
<link rel="stylesheet" href="https://unpkg.com/purecss@2.0.6/build/pure-min.css"
      integrity="sha384-Uu6IeWbM+gzNVXJcM9XV3SohHtmWE+3VGi496jvgX1jyvDTXfdK+rfZc8C1Aehk5" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
<div class="table-responsive">
    <div class="cockpit">
    </div>
    <div class="pure-g">
        <div class="pure-u-1-24">
        </div>
        <div class="pure-u-1-5">

        </div>
        <div class="pure-u-1-24">
        </div>
        <div class="pure-u-1-3">
            <div class="plane">
                <br>
                <br>
                <ol class="cabin">
                    <form action="/sans/ticket" method="post">
                        @csrf
                        <input type="hidden" name="sans" value="{{$sans}}">
                        @foreach($plane->chairRow as $chairRow)
                            <li class="row row--1">
                                <ol class="seats" type="A">
                                    &nbsp;
                                    &nbsp;

                                    <span style="font-family: 'B Koodak'">{{$chairRow->name}}</span>
                                    &nbsp;
                                    @foreach($chairRow->chairSans   as $chair)
                                        <li class="seat">
                                            @if($chair->status!=2)

                                                <input class="chair-checkbox" value="{{$chair->id}}"
                                                       @if($chair->status==3 or $chair->status==4)
                                                           disabled
                                                           @endif
                                                       name="chair[]"
                                                       type="checkbox" id="{{$chair->id}}">
                                                <label
                                                    @if($chair->status==3 or $chair->status==4) style="background-color: #9e8080"
                                                    @else style="font-family: 'B Koodak';color: black" @endif
                                                    title="قیمت صندلی:{{$chair->price}} تومان
ردیف:{{$chairRow->name}}
شماره صندلی :{{$chair->id}} "
                                                       style="font-family: 'B Koodak';color: black"
                                                       for="{{$chair->id}}">{{$chair->name}}</label>
                                            @endif
                                        </li>
                                    @endforeach

                                </ol>

                            </li>

                        @endforeach
                        <br>
                        <div class="d-flex flex-row">
                            <div style="font-family: 'B Koodak'" class="p-2>">
                                <button class="btn" style="background-color: #b0f3b7"></button>
                                قابل خرید
                            </div>
                            <div style="font-family: 'B Koodak'" class="p-2>">
                                <button class="btn" style="background-color: #9e8080"></button>
                                فروخته شده
                            </div>
                            <div style="font-family: 'B Koodak'" class="p-2>">
                                <button class="btn" style="background-color: #6161f6"></button>
                                انتخاب شما
                            </div>
                        </div>
                        <hr>

                        {{--                        <h2 style="font-family: 'B Koodak'">نتایج</h2>--}}

                        {{--                        <div class="row">--}}
                        {{--                        <span>تعداد بلیت:۴ عدد</span>--}}
                        {{--                            <br> --}}
                        {{--                        <span>قیمت کل :۴۷۰۰۰۰ هزار تومان</span>--}}
                        {{--                        </div>--}}
                        <br>
                        <button class="btn btn-danger btn-block" type="submit">ثبت</button>
                    </form>
                </ol>

            </div>
        </div>
        <div class="pure-u-1-5">
        </div>
        <div class="pure-u-1-12">
            <a href="/single/{{$sans}}">
                <button class="btn btn-warning" style="font-family: 'B Koodak'">
                    برگشت به لیست چیدمان
                    &nbsp;
                    <i
                        class="fa fa-arrow-left"></i>

                </button>
            </a>

        </div>
    </div>
</div>
<script>
    $(".chair-checkbox").change(function () {
        var checkbox_value = [];
        $(":checkbox").each(function () {
            var ischecked = $(this).is(":checked");
            if (ischecked) {
                checkbox_value += $(this).val() + " ,";
            }
        });
        console.log(checkbox_value);
    });

</script>
</body>
</html>
