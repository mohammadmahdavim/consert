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
            <br>

            <h3 style="font-family:  'B Titr';color: deeppink">راهنمای خرید اینترنتی بلیت </h3>
            <h6 style="font-family:  'B Titr'">الزامات خرید اینترنتی :</h6>

            <ul>
                <li style="font-family: 'B Koodak'">دارا بودن کارت عابر بانک عضو شبکه شتاب.</li>
                <li style="font-family: 'B Koodak'">داشتن رمز خرید اینترنتی (رمز دوم کارت) که از طریق دستگاه های عابر
                    بانک (ATM) می توانید به کارت مربوطه اختصاص دهید.
                </li>
                <li style="font-family: 'B Koodak'">آگاهی از کد اعتبار سنجی ( CVV2 ) و تاریخ انقضای کارت بانکی که
                    معمولاً روی و یا پشت کارت عابر بانک درج شده است.
                </li>

            </ul>


            <h6 style="font-family:  'B Titr'">انتخاب برنامه :</h6>

            <ul>
                <li style="font-family: 'B Koodak'">در صفحه اصلی سایت و یا در قسمت کنسرت ها بر روی خرید بلیت کلیک کنید.</li>
                <li style="font-family: 'B Koodak'">در قسمت مربوطه بر روی سانس دلخواه کلیک کنید( بسیاری از برنامه ها همانند کنسرت ها در طی چندین روز و چند سانس متوالی اجرا می گردد. لذا دقت کنید پس از تعیین برنامه مورد نظر، روز و ساعت اجرای آن را مطابق با خواسته خود انتخاب نمایید)
                </li>

            </ul>
            <h6 style="font-family:  'B Titr'">وارد کردن اطلاعات فردی :</h6>
            <ul>
                <li style="font-family: 'B Koodak'">بر روی کلید ادامه کلیک کنید تا به قسمت وارد کردن اطلاعات بلیت بروید(مشخصات خود را بصورت صحیح وارد نمایید ثبت شماره تلفن همراه، نام و نام خانوادگی خریدار الزامی است لطفاً در وارد کردن اطلاعات دقت نمایید).</li>

            </ul>
            <h6 style="font-family:  'B Titr'">رفتن به مرحله پرداخت بانکی :</h6>
            <ul>
                <li style="font-family: 'B Koodak'">در این قسمت اطلاعات کارت بانکی را وارد و پرداخت اینترنتی خود را انجام میدهید. </li>
            </ul>

            <h6 style="font-family:  'B Titr'">بازگشت به وب سایت آپ بلیط  :</h6>
<ul>
    <li style="font-family: 'B Koodak'">در این قسمت تمام بلیط های خریدشده برایتان نمایش داده میشود میتوانید با زدن گزینه پرینت ؛ بلیط هایتان را پرینت یا سیو کنید.</li>

</ul>
        </div>
    </section>
@endsection


