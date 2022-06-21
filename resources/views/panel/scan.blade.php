@extends('layouts.panel')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>

@endsection
@section('content')
    <main class="main-content">

        <div class="container-fluid">

            <!-- begin::page header -->
            <div class="page-header">
                <div>
                    <h3>داشبورد</h3>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">داشبورد</a></li>
                            <li class="breadcrumb-item active" aria-current="page">پیش فرض</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!-- end::page header -->

            <div id="qr-reader" style="width:500px"></div>
        </div>

    </main>

@endsection
@section('js')
    <script src="/js/sweet.js"></script>

    @include('sweetalert::alert')
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script>
        function docReady(fn) {
            // see if DOM is already available
            if (document.readyState === "complete"
                || document.readyState === "interactive") {
                // call on next available tick
                setTimeout(fn, 1);
            } else {
                document.addEventListener("DOMContentLoaded", fn);
            }
        }

        docReady(function () {
            var resultContainer = document.getElementById('qr-reader-results');
            var lastResult, countResults = 0;
            function onScanSuccess(decodedText, decodedResult) {
                if (decodedText !== lastResult) {
                    ++countResults;
                    lastResult = decodedText;
                    // Handle on success condition with the decoded message.
                    console.log(decodedText);
                    $.ajax({
                        url: '/panel/scan' + '/' + decodedText,
                        type: "GET",
                        success: function (response) {

                            if (response == 'ok') {

                                swal.fire({
                                    title: "خوش آمدید",
                                    text: "شما صندلی دارید",
                                    icon: "success",
                                    timer: '3500'

                                });
                            }
                            if(response == 'duplicate') {
                                swal.fire({
                                    title: "غیر مجاز",
                                    text: "یکبار وارد شده اید.",
                                    icon: "error",
                                    timer: '3500'
                                })
                            }
                            if(response == 'no') {

                                swal.fire({
                                    title: "غیر مجاز",
                                    text: "صندلی ندارید",
                                    icon: "error",
                                    timer: '3500'
                                })
                            }
                            window.location.reload(true);

                        },
                        error: function () {

                            swal.fire({
                                title: "ناموفق",
                                text: "دوباره اقدام کنید",
                                icon: "warning",
                                timer: '3500'

                            });
                            window.location.reload(true);

                        },
                    });

                    document.getElementById("myText").value = decodedText;


                }
            }

            var html5QrcodeScanner = new Html5QrcodeScanner(
                "qr-reader", { fps: 10, qrbox: 250 });
            html5QrcodeScanner.render(onScanSuccess);
        });
    </script>
    @include('sweetalert::alert')

@endsection


