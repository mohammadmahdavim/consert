<div style="text-align: center" class="modal-header bg-warning ">
    <h3 style="font-family: 'B Koodak'" class="modal-title" id="myModalLabel17">
        سانس های
        {{$program->name}}
    </h3>
{{--        <button style="text-align: left" type="button" class="close"--}}
{{--                data-dismiss="modal"--}}
{{--                aria-label="Close">--}}
{{--            <span aria-hidden="true">&times;</span>--}}
{{--        </button>--}}
</div>
<div class="modal-body">
    <ol>
        @foreach($program->sans as $key=>$sans)
            <li>

                <a href="/single/{{$sans->id}}">
                    <button class="btn btn-danger" style="font-family: 'B Koodak';color: black">  {{$sans->date}}
                        - {{$sans->time}}</button>
                </a>
                <br>
                <br>
            </li>
        @endforeach
    </ol>
</div>
