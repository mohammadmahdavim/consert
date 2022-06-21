@extends('layouts.home2')
<link rel="stylesheet" href="/panel/assets/icons/font-awesome/css/font-awesome.min.css" type="text/css">

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



    <section id="section-gallery">




        <div class="container">
            <div class="d-flex flex-nowrap justify-content-start" style="font-family: 'B Koodak'">
                <div class="order-4 p-2">4.پرداخت</div>
                <div class="order-3 p-2">3.انتخاب صندلی</div>
                <div class="order-2 p-2">2.انتخاب جایگاه</div>
                <div class="order-1 p-2" style="font-family: 'B Titr';color: #f14949">1.انتخاب سانس</div>
            </div>

            <!-- end::custom styles -->
            <div class="row">

                @foreach($program->sans as $key=>$sans)
                    {{--                    @dd($sans)--}}
                    <div class="col-md-3">
                        <br>
                        <div class="card" style="width: 18rem;">

                            <div class="card-body">
                                <h6 class="card-title" style="color: black;font-family: 'B Koodak'">
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    تاریخ :
                                    {{$sans->date}}
                                </h6>
                                <h6 class="card-text" style="color: black;font-family: 'B Koodak'">

                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    {{$sans->salon->name}} -
                                    {{$sans->salon->address}}

                                </h6>
                                <h6 class="card-text" style="color: black;font-family: 'B Koodak'">
                                    <i class="fa fa-clock-o" aria-hidden="true"></i>
                                    ساعت :
                                    {{$sans->time}}
                                </h6>
                                <hr>
                                <a  href="/single/{{$sans->id}}" class="btn btn-primary center" style="text-align: center;font-family: 'B Koodak'" >خرید بلیط</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <br>
            <h3 style="font-family:  'B Titr';color: deeppink">قوانین پذیرش و خرید</h3>
            <h6 style="font-family:  'B Titr'">قوانین و اطلاعیه‌هاتوجه نمایید خرید از این سایت به منزله پذیرش قوانین
                زیر است:</h6>

            <ul>
                <li style="font-family: 'B Koodak'">برای تندرستی شما، استفاده از ماسک از لحظه ورود تا پایان اجرا
                    الزامیست.
                </li>
                <li style="font-family: 'B Koodak'">لطفا در انتخاب صندلی دقت فرمایید، پس از اتمام خرید امکان جابجایی یا
                    کنسلی وجود ندارد.
                </li>
                <li style="font-family: 'B Koodak'">پس از پایان پرداخت در درگاه بانک، با دکمه «تکمیل فرآیند خرید» به آپ
                    بلیط بازگردید.
                </li>
                <li style="font-family: 'B Koodak'">تنها رسید آپ بلیط نشانه نهایی شدن خرید شماست و رسید بانکی معیار خرید
                    موفق نیست.
                </li>
                <li style="font-family: 'B Koodak'">با آغاز روند خرید، 10 دقیقه فرصت پرداخت برای نهایی‌سازی رزرو موقت
                    وجود دارد.
                </li>
                <li style="font-family: 'B Koodak'">داشتن پوشش کامل و رعایت حجاب کامل اسلامی جهت ورود به سالن برگزاري
                    الزامیست.
                </li>
                <li style="font-family: 'B Koodak'">داشتن بلیط براي افراد بالای ۴ سال الزامیست.</li>
                <li style="font-family: 'B Koodak'">لطفا یک ساعت قبل از ساعت شروع اجرا، در محل برگزاری تشریف داشته
                    ‌باشید.
                </li>
                <li style="font-family: 'B Koodak'">استعمال دخانیات و همراه داشتن هرنوع خوراکی در سالن اصلی برنامه ممنوع
                    و از ورود آن ها جلوگیری می شود.
                </li>
                <li style="font-family: 'B Koodak'">براي جلوگیري از بی نظمی، هنگام اجرا از ورود افراد به داخل سالن
                    جلوگیری خواهد شد و تا اتمام قطعه یا بخش درحال اجرا ، درب هاي سالن بسته می ماند.
                </li>
                <li style="font-family: 'B Koodak'">در صورت وجود هرگونه مشکل در زمان خرید بلیط و ورود به سالن، با
                    پشتبانی تماس بگیرید.
                </li>
                <li style="font-family: 'B Koodak'">آپ بلیط تنها در روند خرید بلیط و ورود به سالن متعهد خواهد بود و
                    برگزاری برنامه بر عهده این سایت نمی باشد.
                </li>
                <li style="font-family: 'B Koodak'">این سامانه تنها در قبال خرید شما از سایت آپ بلیط و مراکز معتبر اعلام
                    شده متعهد خواهد بود.
                </li>

            </ul>
        </div>
    </section>
@endsection


