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
                <div class="col-md-12">
                    <article class="blog-item single">

                        <div class="col-md-12 col-sm-12 col-xs-12 ph0">
                            <div class="post-content bg-cover"
                                 @if($images=='[]') data-bg-image="/home/images/header/icon5.jpg"
                                 @else data-bg-image="/images/{{$images[0]->filename}}"
                                @endif>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="row">
                <section class="section-content">
                    <div class="container-fluid pv11 ">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="heading text-center">تصاویر</h3>
                                <div class="ticket-carousel pvt85">
                                    <div class="swiper-container carousel-container movie-images" data-col="5">
                                        <div class="swiper-wrapper">
                                            @foreach($images as $image)
                                                <div class="swiper-slide">
                                                    <div class="movie-image"
                                                         data-bg-image="/images/{{$image->filename}}"
                                                    >
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
                <h3>جایگاه ها</h3>
                <div class="table-responsive">
                    <table class="pure-table">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>سالن</th>
                            <th>نام جایگاه</th>
                            <th>طبقه</th>
                            <th>موقعیت</th>
                            <th>ردیف</th>
                            <th>تعداد صندلی</th>
                            <th>جهت صندلی ها</th>
                            <th>انتخاب صندلی</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rows as $index=>$row)
                            <tr>
                                <th scope="row">{{ $index +1 }}</th>

                                <td>{{$row->salon->name}} </td>
                                <td>{{$row->name}}</td>
                                <td>
                                    @if($row->floor==1)
                                        همکف
                                    @else
                                        بالکن
                                    @endif
                                </td>
                                <td>
                                    @if($row->position==1)
                                        مقابل
                                    @elseif($row->position==2)
                                        چپ
                                    @elseif($row->position==3)
                                        راست
                                    @else
                                        بالکن
                                    @endif
                                </td>
                                <td>{{$row->row}}</td>
                                <td>{{$row->countChair}}</td>
                                <td>
                                    @if($row->direction==1)
                                        راست به چپ
                                    @else
                                        چپ به راست
                                    @endif
                                </td>


                                <td>

                                    <a href="/home/chair/{{$row->id}}/{{$sans->id}}">
                                        انتخاب صندلی
                                    </a>


                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <img id="Image-Maps-Com-image-maps-2022-02-25-064207" src="/home/images/stages/1.png" border="0" width="500" height="471" orgWidth="500" orgHeight="471" usemap="#image-maps-2022-02-25-064207" alt="" />


                <map name="image-maps-2022-02-25-064207" id="ImageMapsCom-image-maps-2022-02-25-064207">
                    <area  alt="" title="" href="/home/chair/{{$rows->where('floor',1)->first()->id}}/{{$sans->id}}"  shape="rect" coords="103,86,409,269" style="outline:none;" target="_self" />
                    <area  alt="" title="" href="/home/chair/{{$rows->where('floor',2)->first()->id}}/{{$sans->id}}"  shape="rect" coords="36,301,468,426" style="outline:none;" target="_self" />
                    <area shape="rect" coords="498,469,500,471" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_0" />
                </map>
            </div>
        </div>
    </section>

@endsection


