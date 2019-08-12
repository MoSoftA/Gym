<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Quicksand|Tajawal&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/animate.css@3.5.1" rel="stylesheet" type="text/css">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- For Admin panel -->

    <!-- IonIcons -->
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('Admin/css/adminlte.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('Admin/css/dataTables.bootstrap4.min.css') }}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('Admin/css/summernote-bs4.css') }}">
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

<script src="https://kit.fontawesome.com/7ccf14bcd9.js"></script>

<!-- jQuery -->
<script src="{{ asset('Admin/js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0=" crossorigin="anonymous"></script>


<!-- AdminLTE App -->
<script src="{{ asset('Admin/js/adminlte.min.js') }}"></script>


<!-- DataTables -->
<script src=" {{ asset('Admin/js/jquery.dataTables.min.js') }}"></script>
<script src=" {{ asset('Admin/js/dataTables.bootstrap4.min.js') }}"></script>
<script src=" {{ asset('Admin/js/summernote-bs4.min.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>


<script>
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
            rtl: true,
            animateOut: 'fadeOut',
            loop: true,
            margin: 10,
            autoplay: true,
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
    });

</script>

</html>
