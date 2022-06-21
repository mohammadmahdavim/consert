<html dir="rtl">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>

<link rel="stylesheet" href="/panel/assets/css/pure.min.css" type="text/css">
<style>
    * {
        box-sizing: border-box;
    }

    html, body {
        height: 100%;
        margin: 0;

    }

    .button-success,
    .button-error,
    .button-warning,
    .button-secondary {
        color: white;
        border-radius: 4px;
        text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
    }

    .button-success {
        background: rgb(28, 184, 65);
        /* this is a green */
    }

    body {
    @import url("https://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700");
        font-family: "B Koodak";
        background-color: #3f32e5;
        height: 100%;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #1c1c1c;
        display: flex;
        justify-content: center;
    }

    .ticket-system {
        max-width: 385px;
    }

    .ticket-system .top {
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .ticket-system .top .title {
        font-weight: normal;
        font-size: 1.6em;
        text-align: left;
        margin-left: 20px;
        margin-bottom: 50px;
        color: #fff;
    }

    .ticket-system .top .printer {
        width: 90%;
        height: 20px;
        border: 5px solid #fff;
        border-radius: 10px;
        box-shadow: 1px 3px 3px 0px rgba(0, 0, 0, 0.2);
    }

    .ticket-system .receipts-wrapper {
        overflow: hidden;
        margin-top: -10px;
        padding-bottom: 10px;
    }

    .ticket-system .receipts {
        width: 100%;
        display: flex;
        align-items: center;
        flex-direction: column;
        transform: translateY(-510px);
        animation-duration: 2.5s;
        animation-delay: 500ms;
        animation-name: print;
        animation-fill-mode: forwards;
    }

    .ticket-system .receipts .receipt {
        padding: 25px 30px;
        text-align: left;
        min-height: 200px;
        width: 88%;
        background-color: #fff;
        border-radius: 10px 10px 20px 20px;
        box-shadow: 1px 3px 8px 3px rgba(0, 0, 0, 0.2);
    }

    .ticket-system .receipts .receipt .airliner-logo {
        max-width: 80px;
    }

    .ticket-system .receipts .receipt .route {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 30px 0;
    }

    .ticket-system .receipts .receipt .route .plane-icon {
        width: 30px;
        height: 30px;
        transform: rotate(90deg);
    }

    .ticket-system .receipts .receipt .route h2 {
        font-weight: 300;
        font-size: 2.2em;
        margin: 0;
    }

    .ticket-system .receipts .receipt .details {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .ticket-system .receipts .receipt .details .item {
        display: flex;
        flex-direction: column;
        min-width: 110px;
        max-width: 500px;
    }

    .ticket-system .receipts .receipt .details .item span {
        font-size: 0.8em;
        color: rgba(28, 28, 28, 0.7);
        font-weight: 500;
    }

    .ticket-system .receipts .receipt .details .item h4 {
        margin-top: 10px;
        margin-bottom: 25px;
    }

    .ticket-system .receipts .receipt.qr-code {
        height: 230px;
        min-height: unset;
        position: relative;
        border-radius: 20px 20px 10px 10px;
        display: flex;
        align-items: center;
    }

    .ticket-system .receipts .receipt.qr-code::before {
        content: "";
        background: linear-gradient(to right, #fff 50%, #3f32e5 50%);
        background-size: 22px 4px, 100% 4px;
        height: 4px;
        width: 90%;
        display: block;
        left: 0;
        right: 0;
        top: -1px;
        position: absolute;
        margin: auto;
    }

    .ticket-system .receipts .receipt.qr-code .qr {
        width: 70px;
        height: 70px;
    }

    .ticket-system .receipts .receipt.qr-code .description {
        margin-left: 20px;
    }

    .ticket-system .receipts .receipt.qr-code .description h2 {
        margin: 0 0 5px 0;
        font-weight: 500;
    }

    .ticket-system .receipts .receipt.qr-code .description p {
        margin: 0;
        font-weight: 400;
    }

    @keyframes print {
        0% {
            transform: translateY(-510px);
        }
        35% {
            transform: translateY(-395px);
        }
        70% {
            transform: translateY(-140px);
        }
        100% {
            transform: translateY(0);
        }
    }

    @media print {
        #printPageButton {
            display: none;
        }
    }
</style>
<!-- INSPO:  https://www.behance.net/gallery/69583099/Mobile-Flights-App-Concept -->
@if($salled)

    @foreach($salled->chair as $key=> $row)

        <main class="ticket-system">
            <div class="top">

                <div class="printer"/>
            </div>
            <div class="receipts-wrapper">
                <div class="receipts">
                    <div class="receipt" style="text-align: right">
                        <img height="50px" width="110px" alt="" src="/home2/logo.jpeg"/>
                        <div class="route" style="text-align: center">
                            <h4>

                                بلیت
                                {{$row->sans->program->name}}
                            </h4>
                        </div>
                        <div class="details" style="text-align: right">
                            <div class="item">
                                <span>نام:</span>
                                <h5>
                                    {{$salled->user->name}}
                                </h5>
                            </div>
                            <div class="item">
                                <span>شماره تماس:</span>
                                <h5>
                                    {{$salled->user->mobile}}

                                </h5>
                            </div>
                            <div class="item">
                                <span>جایگاه</span>
                                <h5>{{$row->plane->name}}</h5>
                            </div>
                            <div class="item">
                                <span>طبقه</span>
                                <h5>   @if($row->plane->floor==1)
                                        همکف
                                    @else
                                        بالکن
                                    @endif</h5>
                            </div>
                            <div class="item">
                                <span>ساعت</span>
                                <h5>{{$row->sans->time}}</h5>
                            </div>
                            <div class="item">
                                <span>زمان</span>
                                <h5>{{$row->sans->date}}</h5>
                            </div>
                            <div class="item">
                                <span>صندلی</span>
                                <h4>{{$row->name}}</h4>
                            </div>
                            <div class="item">
                                <span>ردیف</span>
                                <h4>{{$row->row->name}}</h4>
                            </div>
                            <img height="80px" width="310px" alt="" src="/home2/logo.jpeg"/>

                        </div>
                    </div>
                    <div class="receipt qr-code">
                        <?php
                        $code = $row->pivot->code;
                        ?>

                        <div class="mb-3">{!! DNS2D::getBarcodeHTML("$code", 'QRCODE','7','7') !!}</div>

                        <div class="description">
                            <h5>صندلی: {{$row->name}}</h5>
                            <h5> {{$code}}</h5>

                            <p> &nbsp;
                                نمایش هنگام چک کردن بلیت

                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @if($key==0)
                <button id="printPageButton" class="button-success pure-button" onclick="window.print();return false;">
                    چاپ بلیت
                </button>@endif
        </main>

    @endforeach
@else

    <main class="ticket-system">
        <div class="receipts-wrapper">


            <h4>بلیتی یافت نشد!!!!</h4>
            <a href="/">
                <button id="printPageButton" class="button-success pure-button">
                    بازگشت
                </button>
            </a>


        </div>
    </main>
@endif
</html>
