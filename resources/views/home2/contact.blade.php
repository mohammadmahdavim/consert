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
            <h6 style="font-family: 'B Koodak'">تمامی حقوق مادی و معنوی سایت آپ بلیط تحت لیبل رسانه آپ مدیا و گروه هنر بینهایت برتر شرق می باشد. </h6>
            <br>
            <h3 style="font-family:  'B Titr';color: deeppink">تماس و پشتیبانی</h3>
           <div class="row">
               <div class="col-md-6">


                   <h6 style="font-family:  'B Koodak'"><i class="fa fa-map-marker" aria-hidden="true"></i> نشانی </h6>
                   <h6 style="font-family:  'B Koodak'">تبریز- چهارراه آبرسان- پشت قنادی ایوبی- برج امید- طیقه ی 5- واحد C</h6>

                   <br>

                   <h6 style="font-family:  'B Koodak'"><i class="fa fa-phone" aria-hidden="true"> تلفن تماس </i></h6>
                   <h6 style="font-family:  'B Koodak'">0922-678-7588 <br> 0914-222-2688</h6>
                   <br>
                   <h6 style="font-family:  'B Koodak'"><i class="fa fa-envelope" aria-hidden="true"> پست الکترونیکی </i></h6>
                   <h6 style="font-family:  'Times New Roman'">support@upbelit.ir</h6>

                   <br>

                   <h6 style="font-family:  'B Koodak'"><i class="fa fa-instagram" aria-hidden="true"> شبکه های مجازی </i></h6>
                   <h6 style="font-family:  'B Koodak'">
                       <i class="fa fa-whatsapp fa-2xl" aria-hidden="true"></i>
                       <i class="fa-2xl fa fa-telegram" aria-hidden="true"></i>

                   </h6>
               </div>
               <div class="col-md-6"></div>
           </div>
        </div>

    </section>
@endsection




