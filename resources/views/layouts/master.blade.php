<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vk Downloader</title>

    <link rel="stylesheet" href="/css/bootstrap.min.css"/>

    <style>
        body {
            padding-top: 60px;
        }

        .bottom-right {
            position: fixed;
            bottom: 0;
            right: 0;
            padding: 60px;
        }

        /*
        ==============================================
        slideDown
        ==============================================
        */

        .slideDown{
            animation-name: slideDown;
            -webkit-animation-name: slideDown;

            animation-duration: 1s;
            -webkit-animation-duration: 1s;

            animation-timing-function: ease;
            -webkit-animation-timing-function: ease;

            visibility: visible !important;
        }

        @keyframes slideDown {
            0% {
                transform: translateY(-100%);
            }
            50%{
                transform: translateY(8%);
            }
            65%{
                transform: translateY(-4%);
            }
            80%{
                transform: translateY(4%);
            }
            95%{
                transform: translateY(-2%);
            }
            100% {
                transform: translateY(0%);
            }
        }

        @-webkit-keyframes slideDown {
            0% {
                -webkit-transform: translateY(-100%);
            }
            50%{
                -webkit-transform: translateY(8%);
            }
            65%{
                -webkit-transform: translateY(-4%);
            }
            80%{
                -webkit-transform: translateY(4%);
            }
            95%{
                -webkit-transform: translateY(-2%);
            }
            100% {
                -webkit-transform: translateY(0%);
            }
        }

        /*
        ==============================================
        pulse
        ==============================================
        */

        .pulse{
            animation-name: pulse;
            -webkit-animation-name: pulse;

            animation-duration: 1.5s;
            -webkit-animation-duration: 1.5s;

            animation-iteration-count: infinite;
            -webkit-animation-iteration-count: infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(0.9);
                opacity: 0.7;
            }
            50% {
                transform: scale(1);
                opacity: 1;
            }
            100% {
                transform: scale(0.9);
                opacity: 0.7;
            }
        }

        @-webkit-keyframes pulse {
            0% {
                -webkit-transform: scale(0.95);
                opacity: 0.7;
            }
            50% {
                -webkit-transform: scale(1);
                opacity: 1;
            }
            100% {
                -webkit-transform: scale(0.95);
                opacity: 0.7;
            }
        }


    </style>
</head>
<body>

    <div class="container">

        @yield('content')

    </div><!-- /.container -->



    {{--<script src="/js/jquery.min.js"></script>--}}
    {{--<script src="/js/bootstrap.min.js"></script>--}}

    @yield('custom-script')

</body>
</html>