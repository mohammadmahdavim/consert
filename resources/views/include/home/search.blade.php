<div id="overlay-search">
    <form method="post" action="/ticket/code">
        @csrf
        <input style="color: black;font-family: 'B Nazanin'" type="text" name="code" placeholder="کد پیگیری..." autocomplete="off">
        <button type="submit">
            <i class="fa fa-search"></i>
        </button>
    </form>
    <a href="javascript:;" class="close-window"></a>
</div>
