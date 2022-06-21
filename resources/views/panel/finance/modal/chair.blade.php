<!-- begin::datepicker -->
<link rel="stylesheet" href="/panel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="/panel/assets/vendors/datepicker/daterangepicker.css">
<!-- end::datepicker -->
<div class="modal-header bg-primary white">
    <h5 class="modal-title" id="myModalLabel17">
        خریدار:
        {{$row->user->name}} &nbsp;{{$row->user->mobile}}

    </h5>
    <button type="button" class="close"
            data-dismiss="modal"
            aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr style="text-align: center">
                <th>#</th>
                <th>سالن</th>
                <th>تاریخ</th>
                <th>ساعت</th>
                <th>جایگاه</th>
                <th>طبقه</th>
                <th>موقعیت</th>
                <th>ردیف</th>
                <th>صندلی</th>
                <th>قیمت</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $key = 1;
            ?>
            @foreach($row->chair as $index=>$row)
                <tr>
                    <th scope="row">{{ $index +1 }}</th>

                    <td>{{$row->salon->name}} </td>
                    <td>{{$row->sans->date}}</td>
                    <td>{{$row->sans->time}}</td>
                    <td>{{$row->plane->name}}</td>
                    <td>
                        @if($row->plane->floor==1)
                            همکف
                        @else
                            بالکن
                        @endif
                    </td>
                    <td>
                        @if($row->plane->position==1)
                            مقابل
                        @elseif($row->plane->position==2)
                            چپ
                        @elseif($row->plane->position==3)
                            راست
                        @else
                            بالکن
                        @endif
                    </td>

                    <td>{{$row->plane->row}}</td>
                    <td>{{$row->name}}</td>
                    <td>{{$row->price}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>
<!-- end::datepicker -->
