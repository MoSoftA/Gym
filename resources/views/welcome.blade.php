<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link type="text/css" href="{{ asset('css/bootstrap.4.3.1.css') }}">

    <link href="{{ asset('css/googleFont.css') }}" type="text/css" rel="stylesheet">

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/fontawesome.css') }}" type="text/css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/owlCarousel.css') }}" />

    <link rel="stylesheet" type="text/css" href='{{ asset("css/owlCarouselTheme.css") }}'>


    <!-- For Admin panel -->

    <!-- IonIcons -->
    <link type="text/css" href="{{ asset('css/ionicons.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('Admin/css/adminlte.min.css') }}">
    <link rel="stylesheet" type="text/css" href=" {{ asset('Admin/css/dataTables.bootstrap4.min.css') }}">


    <!-- summernote -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" type="text/css" rel="stylesheet">
    <title>GYM</title>
    <style>
        #app {
            font-family: 'Tajawal', sans-serif !important;
            /* font-family: 'Quicksand', sans-serif; */
        }

        .owl-dots .owl-dot span {
            width: 30px !important;
            border-radius: 0 !important;
            height: 5px !important;
            outline: none;
        }

        .owl-dots .owl-dot.active span {
            outline: none;
            background-color: rgb(242, 58, 46) !important;
        }

        .fade-enter-active,
        .fade-leave-active {
        transition-duration: 0.3s;
        transition-property: opacity;
        transition-timing-function: ease;
        }

        .fade-enter,
        .fade-leave-active {
        opacity: 0
        }

    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <div id="app">
        <transition name="fade" mode="out-in">
            <router-view></router-view>
        </transition>

    </div>

</body>

<script src="{{ asset('js/app.js') }}"></script>

<script src="{{ asset('js/fontawesome.js') }}"></script>

<!-- jQuery -->
<script src="{{ asset('Admin/js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src=" {{ asset('js/owl.carousel.min.js') }}"></script>



<!-- AdminLTE App -->
<script src="{{ asset('Admin/js/adminlte.min.js') }}"></script>
<script src="{{ asset('js/HZpagination.js') }}"></script>



<!-- DataTables -->
<script src=" {{ asset('Admin/js/jquery.dataTables.min.js') }}"></script>

<script src=" {{ asset('Admin/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script><!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->

<script>
    $(document).ready(function () {
        setTimeout(() => {
            $('.owl-carousel').owlCarousel({
                rtl: true,
                center:true,
                animateOut: 'fadeOut',
                loop: false,
                margin: 10,
                autoplay: false,
                nav: false,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    600: {
                        items: 2,
                        loop: true
                    },
                    1000: {
                        items: 2,
                        loop: true,
                    }
                }
            })
        }, 1500);
        
    });

</script>

</html>
