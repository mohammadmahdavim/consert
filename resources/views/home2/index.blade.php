@extends('layouts.home2')

@section('menu')
    <div class="de-flex-col header-col-mid">
        <!-- mainmenu begin -->
        <ul id="mainmenu">
            <li><a style="font-family: 'B Koodak'" href="/">خانه</a></li>
            <li><a href="#consert">کنسرت ها</a></li>
            <li><a href="#jong">جنگ شادی</a></li>
            <li><a href="#teater">تئاتر</a></li>
            <li><a href="#hamayesh">همایش</a></li>
            <li><a href="/contact">تماس و پشتیبانی</a>
            <li><a href="/law">قوانین ما</a>
            </li>

        </ul>
    </div>

@endsection
@section('content')

    <img src="/home2/blit.png" width="100%" height="500px">

    <header class="transparent">

        <div class="de-flex-col header-col-mid">
            <!-- mainmenu begin -->
            <ul id="mainmenu">

                <li><a href="#consert">

                        <button style="size: 40px" class="btn btn-sm btn-warning">
                            <h4>کنسرت ها</h4>
                        </button>
                    </a></li>
                <li><a href="#hamayesh">
                        <button style="size: 40px" class="btn btn-sm btn-warning">
                            <h4>همایش</h4>

                        </button>
                    </a></li>
                <li><a href="#teater">
                        <button style="size: 40px" class="btn btn-sm btn-warning">
                            <h4>تئاتر</h4>

                        </button>
                    </a></li>

                <li><a href="#jong">
                        <button style="size: 40px" class="btn btn-sm btn-warning">
                            <h4>جنگ شادی</h4>

                        </button>
                    </a></li>
                </li>
                <li>


                </li>
            </ul>

        </div>

    </header>
    <!-- Carousel wrapper -->
    <section id="consert">
        <div class="container">
            <div class="row g-custom-x align-items-center">
                <div class="col-lg-12">
                    <div class="text-center">
                        <div class="title-box-outer">
                            <div class="title-box-inner">
                                <h2><span class="id-color"></span> کنسرت ها</h2>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($programs->where('type',1) as $program)

                    <div class="col-md-4 mb-sm-30">
                        <div class="de-image-text s2">
                            <a class="d-text" href="/sans/{{$program->id}}">

                                <button type="button" class="btn btn-primary btn-sm"
                                        id="neonShadow" > خرید بلیت
                                </button>

                                <h3>{{$program->name}}</h3>
                            </a>
                            <img height="334px" width="500px"
                                 @if($program->image=='[]')
                                 src="home2\images\misc\featured-2.jpg"
                                 @else
                                 src="/images/{{$program->image[0]->filename}}"
                                 @endif
                                 class="img-fluid" alt="">
                        </div>
                    </div>

                @endforeach
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 text-center">
                    <div class="spacer-single"></div>
                    <ul class="list-inline-style-1">

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="hamayesh">
        <div class="container">
            <div class="row g-custom-x align-items-center">
                <div class="col-lg-12">
                    <div class="text-center">
                        <div class="title-box-outer">
                            <div class="title-box-inner">
                                <h2><span class="id-color"></span> همایش</h2>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($programs->where('type',3) as $program)

                    <div class="col-md-4 mb-sm-30">
                        <div class="de-image-text s2">
                            @if($program->start <= \Morilog\Jalali\Jalalian::now()->format('Y/m/d'))
                            <a class="d-text" href="/sans/{{$program->id}}">

                                <button type="button" class="btn btn-primary btn-sm"
                                        id="neonShadow" > خرید بلیت
                                </button>

                                <h3>{{$program->name}}</h3>
                            </a>
                            @else
                                <a class="d-text" >

                                <button type="button" class="btn btn-danger btn-sm"
                                        id="" >بلیت فروشی فعال نیست.
                                </button>
                                <h3>{{$program->name}}</h3>
                                </a>

                            @endif
                            <img height="334px" width="500px"
                                 @if($program->image=='[]')
                                 src="home2\images\misc\featured-2.jpg"
                                 @else
                                 src="/images/{{$program->image[0]->filename}}"
                                 @endif
                                 class="img-fluid" alt="">
                        </div>
                    </div>

                @endforeach
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 text-center">
                    <div class="spacer-single"></div>
                    <ul class="list-inline-style-1">

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="teater">
        <div class="container">
            <div class="row g-custom-x align-items-center">
                <div class="col-lg-12">
                    <div class="text-center">
                        <div class="title-box-outer">
                            <div class="title-box-inner">
                                <h2><span class="id-color"></span>تئاتر</h2>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($programs->where('type',4) as $program)

                    <div class="col-md-4 mb-sm-30">
                        <div class="de-image-text s2">
                            <a class="d-text" href="/sans/{{$program->id}}">

                                <button type="button" class="btn btn-primary btn-sm"
                                        id="neonShadow" > خرید بلیت
                                </button>

                                <h3>{{$program->name}}</h3>
                            </a>
                            <img height="334px" width="500px"
                                 @if($program->image=='[]')
                                 src="home2\images\misc\featured-2.jpg"
                                 @else
                                 src="/images/{{$program->image[0]->filename}}"
                                 @endif
                                 class="img-fluid" alt="">
                        </div>
                    </div>

                @endforeach
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 text-center">
                    <div class="spacer-single"></div>
                    <ul class="list-inline-style-1">

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="jong">
        <div class="container">
            <div class="row g-custom-x align-items-center">
                <div class="col-lg-12">
                    <div class="text-center">
                        <div class="title-box-outer">
                            <div class="title-box-inner">
                                <h2><span class="id-color"></span>جنگ شادی</h2>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($programs->where('type',2) as $program)

                    <div class="col-md-4 mb-sm-30">
                        <div class="de-image-text s2">
                            <a class="d-text" href="/sans/{{$program->id}}">

                                <button type="button" class="btn btn-primary btn-sm"
                                        id="neonShadow" > خرید بلیت
                                </button>

                                <h3>{{$program->name}}</h3>
                            </a>
                            <img height="334px" width="500px"
                                 @if($program->image=='[]')
                                 src="home2\images\misc\featured-2.jpg"
                                 @else
                                 src="/images/{{$program->image[0]->filename}}"
                                 @endif
                                 class="img-fluid" alt="">
                        </div>
                    </div>

                @endforeach
            </div>
            <div class="row">
                <div class="col-md-10 offset-md-1 text-center">
                    <div class="spacer-single"></div>
                    <ul class="list-inline-style-1">

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id="de-carousel" class="no-top no-bottom carousel slide carousel-fade shadow-2-strong"
             data-mdb-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-mdb-target="#de-carousel" data-mdb-slide-to="0" class="active"></li>
            @foreach($sliders as $key=>$slider)
                <li data-mdb-target="#de-carousel" data-mdb-slide-to="{{$key+1}}"></li>
            @endforeach
        </ol>
        <!-- Inner -->
        <div class="carousel-inner">
            <!-- Single item -->


            <!-- Single item -->
            @foreach($sliders as $key=>$slider)

                <div @if($key==0) class="carousel-item active" @else  class="carousel-item"
                     @endif data-bgimage="url(file/{{$slider->filename}})">
                    <div class="mask">
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <div class="container text-white text-center">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <div class="box-line-outer wow flipInX">
                                            <div class="box-line-inner">
                                                <h1 class="ultra-big mb-3 wow fadeInUp">جنگ شادی<br>{{$slider->title}}
                                                </h1>
                                                <div class="col-md-6 offset-md-3">
                                                    <h4 class="s2 lead wow fadeInUp" data-wow-delay=".3s"
                                                        style="font-family: 'B Koodak'">سراسر خنده</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-main-wrap">
                                            <a href="/sans/{{$slider->program->id}}">
                                                <button type="button" class="btn btn-primary btn-lg"
                                                        id="neonShadow" style="font-family: 'B Koodak'"
                                                > خرید بلیت
                                                </button>
                                            </a>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- Inner -->
        <!-- Controls -->
        <a class="carousel-control-prev" href="#de-carousel" role="button" data-mdb-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#de-carousel" role="button" data-mdb-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>

    </section>

    @include('include.modal.show')

@endsection

