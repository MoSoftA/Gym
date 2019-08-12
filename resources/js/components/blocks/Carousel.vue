<template>
    <div class="bd-example">
        <div class="carousel slide" id="carouselExampleCaptions" data-ride="carousel">
            <div class="carousel-inner">
                
                <div class="carousel-item active">
                    <div class="carousel-caption d-md-block">
                        <p class="h1">ابن جسم قوي</p>
                    </div>
                </div>
                
                <div class="carousel-item">
                    <div class="carousel-caption d-md-block">
                        <p class="h1">احصل على جسم لائق</p>
                    </div>
                </div>
            </div>
            <div class="container"><a class="carousel-control-prev mx-2 rounded" href="#carouselExampleCaptions"
                    role="button" data-slide="prev"><span class="carousel-control-prev-icon"
                        aria-hidden="true"></span><span class="sr-only">Previous</span></a><a
                    class="carousel-control-next mx-2 rounded" href="#carouselExampleCaptions" role="button"
                    data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span
                        class="sr-only">Next</span></a></div>
        </div>
    </div>
</template>

<script>
    export default {

    }

</script>
<style lang="scss" scoped>
    .bd-example {
        .carousel-inner {
            .carousel-item {
                height: 90vh !important;
                background-position: top center;
                background-size: cover;
                background-attachment: fixed;

               img{
                   position: fixed;
               }    

                &:first-child {
                    background-image: url('../../assets/hero_bg_2.jpg');
                }
                &:last-child {
                    background-image: url('../../assets/hero_bg_2.jpg');
                }

                .carousel-caption {
                    padding: 0;
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    text-align: center !important;
                    transform: translate(-50%, -50%);

                    p {
                        font-weight: bolder;
                        font-size: 80px;
                    }
                }
            }
        }


        .carousel-control-next,
        .carousel-control-prev {
            width: 50px;
            height: 50px;
            position: absolute;
            top: 50%;
            background-color: rgba(0, 0, 0, 0.8);

            &:hover {
                background-color: #000;
            }
        }
    }

    @media (max-width: 576px) {
        .bd-example {
            .carousel-inner {
                .carousel-item {
                    .carousel-caption {
                        p.h1 {
                            font-weight: bolder;
                            font-size: 60px !important;
                        }
                    }
                }
            }
        }
    }

</style>
