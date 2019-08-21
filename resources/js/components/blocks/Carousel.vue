<template>
    <div class="bd-example">
        <div class="carousel slide" id="carouselExampleCaptions" data-ride="carousel">
            <div class="carousel-inner">
                
                <div class="carousel-item active" :style="{backgroundImage: 'url('+list[0].image+')' }" >
                    <div class="carousel-caption d-md-block">
                        <p class="h1" style="color: black">{{list[0].text}}</p>
                    </div>
                </div>
                <div class="carousel-item" :key="index" v-for="(item, index) in list" :style="{backgroundImage: 'url('+item.image +')' }" >
                    <div class="carousel-caption d-md-block">
                        <p class="h1" style="color: black">{{item.text}}</p>
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
import Axios from 'axios';
    export default {
        data(){
            return{
                list:[]
            }
        },
        mounted(){
            const config = {
                    headers: { 'content-type': 'multipart/form-data', Accept: 'application/json',
                            Authorization: 'Bearer ' + this.$store.state.user.token }
                }
            Axios.get('api/getSlider', config).then(res => {
                this.list = res.data.data;
                console.log(res.data.data)
            }).catch(err => console.log(err))
        }
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

                // &:first-child {
                //     background-image: url('F:\\Gym-Manager\\public\\uploads\\slider\\TXyEw6JtptdSw5Sl3hsoEBulfLCNEboPKA0ufVNb0nyDsoHCdZ.png');
                // }
                // &:last-child {
                //     background-image: url('../../assets/hero_bg_2.jpg');
                // }

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
