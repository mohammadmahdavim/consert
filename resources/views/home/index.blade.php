@extends('layouts.home')

@section('content')

    <div class="fullwidth-slider">
        <div id="headerslider" class="carousel slide">
            <ol class="carousel-indicators">
                @foreach($sliders as $key=>$slider)
                    <li data-target="#headerslider" data-slide-to="{{$key}}" @if($key==0) class="active" @endif></li>
                @endforeach

            </ol>

            <div class="carousel-inner" role="listbox">
                @foreach($sliders as $key=>$slider)

                    <div style="cursor: pointer" href="#" onclick="modal_show('{{$slider->program->id}}','/sans');" @if($key==0) class="item active" @else class="item" @endif >
                        <div class="fill"  data-bg-image="file/{{$slider->filename}}">
                            <div class="bs-slider-overlay"></div>
                            <div class="container movie-slider-container">
                                <div class="row">
                                    <div class="col-sm-12 movie-slider-content">
                                        <div class="slider-content">

                                            <div class="title"
                                                 data-animation="animated bounceInRight">
                                                {{$slider->title}}
                                                <button type="button" class="btn btn-primary btn-sm"
                                                        id="neonShadow"     onclick="modal_show('{{$slider->program->id}}','/sans');">  خرید بلیت
                                                </button>
                                               </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            <!-- Controls -->
            <a class="carousel-control left" href="#headerslider" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control right" href="#headerslider" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <section class="section-content">
        <div class="container-fluid pv11 ">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="heading text-center">درحال اجرا</h3>
                    <div class="ticket-carousel pvt85">
                        <div class="swiper-container carousel-container movie-images" data-col="5">
                            <div class="swiper-wrapper">
                                @foreach($programs as $program)
                                    <div class="swiper-slide">
                                        <div class="movie-image" @if($program->image=='[]')
                                        data-bg-image="/home/images/carousel/movie-1.jpg"
                                             @else
                                             data-bg-image="/images/{{$program->image[0]->filename}}"
                                            @endif
                                        >
                                            <div class="entry-hover">
                                                <div class="entry-actions">
                                                    <span></span>
                                                    <div class="modal-dark mr-1 mb-1 d-inline-block">
                                                        <!-- Button trigger modal -->
                                                        <button type="button" class="btn btn-primary btn-sm"
                                                                onclick="modal_show('{{$program->id}}','/sans');">  خرید بلیت
                                                            {{$program->name}}
                                                        </button>

                                                        <!-- Modal -->
                                                        <!-- end modal -->
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                    &nbsp;
                                @endforeach

                            </div>
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    @include('include.modal.show')

@endsection

