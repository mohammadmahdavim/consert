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

    <section id="section-gallery" >

        <div class="container">
            <div class="d-flex flex-nowrap justify-content-start" style="font-family: 'B Koodak'">
                <div class="order-4 p-2">4.پرداخت</div>
                <div class="order-3 p-2">3.انتخاب صندلی</div>
                <div class="order-2 p-2" style="font-family: 'B Titr';color: #f14949">2.انتخاب جایگاه</div>
                <div class="order-1 p-2" style="font-family: 'B Titr';color: #f14949">1.انتخاب سانس</div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="wm">Gallery</div>
                    <h2 class="mt-10"><span class="id-color"></span> {{$sans->program->name}}</h2>
                    <div class="small-border bg-color"></div>
                </div>
                <div class="spacer-single"></div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-mdb-ride="carousel">
                        <!-- Slides -->
                        <div class="carousel-inner mb-5">
                            @foreach($images as $key=>$image)
                            <div @if($key==0) class="carousel-item active" @else class="carousel-item "  @endif>
                                <img src="/images/{{$image->filename}}" class="d-block w-100" alt="" />
                            </div>
                            @endforeach
                        </div>
                        <!-- Slides -->
                        <!-- Controls -->
                        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <!-- Controls -->
                        <!-- Thumbnails -->
                        <div class="carousel-indicators" style="margin-bottom: -20px;">
                            @foreach($images as $image)
                            <button type="button" data-mdb-target="#carouselExampleIndicators" data-mdb-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="width: 100px;">
                                <img class="d-block w-100 img-fluid" src="/images/{{$image->filename}}" alt="" />
                            </button>
                            @endforeach

                        </div>

                        <!-- Thumbnails -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="col-md-12">
    <div class="card">
    <div class="card-body">
        <h3>جایگاه ها</h3>
        <div class="table-responsive">
            <table class="table" style="font-family: 'B Koodak'">
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
            @if($rows->where('floor',1)->first())
            <area  alt="" title="" href="/home/chair/{{$rows->where('floor',1)->first()->id}}/{{$sans->id}}"  shape="rect" coords="103,86,409,269" style="outline:none;" target="_self" />
         @endif
                @if($rows->where('floor',2)->first())

                <area  alt="" title="" href="/home/chair/{{$rows->where('floor',2)->first()->id}}/{{$sans->id}}"  shape="rect" coords="36,301,468,426" style="outline:none;" target="_self" />
                @endif
            <area shape="rect" coords="498,469,500,471" alt="Image Map" style="outline:none;" title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_0" />
        </map>
    </div>
    </div>
    </div>

@endsection


