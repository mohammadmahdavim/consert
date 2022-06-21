@extends('layouts.panel')

@section('css')
@endsection

@section('content')
    <main class="main-content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">مدیریت جایگاه سالن</h4>
                            <div class="heading-elements">
                                <div class="row">

                                    <div class="col-md-3" style="text-align: left">
                                        <a href="/panel/sans/{{$sans->program_id}}">
                                            <button class="btn btn-warning">
                                                برگشت به لیست سانس ها
                                                &nbsp;
                                                <i
                                                    class="fa fa-arrow-left"></i>

                                            </button>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body card-dashboard">

                                <div class="table-responsive">
                                    <table class="table zero-configuration">
                                        <thead>
                                        <tr style="text-align: center">
                                            <th>ردیف</th>
                                            <th>سالن</th>
                                            <th>نام جایگاه</th>
                                            <th>طبقه</th>
                                            <th>موقعیت</th>
                                            <th>ردیف</th>
                                            <th>تعداد صندلی</th>
                                            <th>جهت صندلی ها</th>
                                            <th>عملیات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($rows as $index=>$row)
                                            <tr style="text-align: center">
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
                                                    <a href="/panel/sans/chair/{{$row->id}}/{{$sans->id}}">
                                                        <button class="btn btn-primary btn-sm" title="صندلی ها">
                                                            <i class="fa fa-university"></i>
                                                        </button>
                                                    </a>

                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                        </div>
                        <img id="Image-Maps-Com-image-maps-2022-02-25-064207" src="/home/images/stages/1.png" border="0"
                             width="500" height="471" orgWidth="500" orgHeight="471"
                             usemap="#image-maps-2022-02-25-064207" alt=""/>


                        <map name="image-maps-2022-02-25-064207" id="ImageMapsCom-image-maps-2022-02-25-064207">
                            <area alt="" title="" href="/panel/sans/chair/{{$rows->where('floor',1)->first()->id}}/{{$sans->id}}"
                                  shape="rect" coords="103,86,409,269" style="outline:none;" target="_self"/>
                            <area alt="" title="" href="/panel/sans/chair/{{$rows->where('floor',2)->first()->id}}/{{$sans->id}}"
                                  shape="rect" coords="36,301,468,426" style="outline:none;" target="_self"/>
                            <area shape="rect" coords="498,469,500,471" alt="Image Map" style="outline:none;"
                                  title="Image Map" href="http://www.image-maps.com/index.php?aff=mapped_users_0"/>
                        </map>
                    </div>

                </div>

            </div>
        </div>

    </main>
    <!--/ Zero configuration table -->
@stop

@section('js')

    <script src="/js/sweet.js"></script>

    @include('sweetalert::alert')
@endsection
