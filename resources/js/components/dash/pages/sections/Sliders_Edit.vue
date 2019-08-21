<template>
    <div class="container">
        <div class="card">
            <div class="card-body row">

                <p class="h1 mt-5">SLider Edit</p>

                <div class="bd-example col-12">
                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleCaptions" :data-slide-to="index" :key="index"
                                v-for='(slider, index) in sliders'></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active" @click="get_slider(sliders[0].id)">
                                <img :src="sliders[0].image" class="d-block w-100" :alt="sliders[0].text">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ sliders[0].text }}</h5>
                                </div>
                            </div>
                            <div class="carousel-item" @click="get_slider(slider.id)" :key="index"
                                v-for='(slider, index) in sliders.slice(1)'>
                                <img :src="slider.image" class="d-block w-100" :alt="slider.text">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>{{ slider.text }}</h5>
                                </div>
                            </div>

                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>

                <center v-if="id" class="my-4"><p><mark>you selected the slider with title {{ text }}</mark></p></center>

                <div class="input col-sm-12 ">
                    <label for="image">image</label>
                    <div class="input-group">
                        <input type="file" id="image" class="form-control" @change="get_image($event)">
                    </div>
                </div>

                <div class="input col-md-4 col-sm-10 mx-sm-auto mx-md-0 col-lg-12 mt-3">
                    <label for="bgc">Image title</label>
                    <div class="input-group">
                        <input type="text" id="text" class="form-control" placeholder="Image title" v-model="text">
                    </div>
                </div>

                <div class="col-4 mx-2 my-4">
                    <button class="btn btn-primary btn-block btn-flat" @click="send" role="button">Done</button>
                </div>

                <div class="col-8 mx-2 my-4">
                    <button class="btn btn-danger btn-block btn-flat" @click="delsete" role="button">Delete this slider</button>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    .carousel-item.active{
        border: 2px solid #000;
    }
</style>

<script>
    import Axios from 'axios';
    import realCarousel from '../../../blocks/Carousel';
    import {
        setTimeout
    } from 'timers';

    export default {
        data() {
            return {
                sliders: [],
                img: '',
                text: '',
                id: null
            }
        },
        components: {
            realCarousel
        },
        methods: {
            get_image(e) {
                this.img = e.target.files[0];
            },
            get_slider(slide) {
                let it = this.sliders.filter(thing => thing.id == slide );

                this.img = it[0].image;
                this.text = it[0].text;
                this.id = it[0].id;
                console.log(it)
            },
            send() {
                let slider = new FormData();
                slider.append('text', this.text);
                slider.append('image', this.img);

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token
                    }
                }
                Axios.post('api/storeSlider', slider, config).then(
                    Axios.get('api/getSlider', config).then(
                        res => {
                            this.sliders = res.data.data; 

                            console.log(this.sliders)
                        }
                    ).catch(err => console.log(err))
                ).catch(err => console.log(
                    err))
            },

            delsete() {
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token
                    }
                }
                Axios.delete(`api/deleteSlider/${this.id}`, config).then(
                    Axios.get('api/getSlider', config).then(
                        res => {
                            this.sliders = res.data.data; 

                            console.log(this.sliders)
                        }
                    ).catch(err => console.log(err))
                ).catch(err => console.log(err));
            }
        },
        beforeMount() {
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    Accept: 'application/json',
                    Authorization: 'Bearer ' + this.$store.state.user.token
                }
            }
            Axios.get('api/getSlider', config).then(
                res => {
                    res.data.data.forEach(slider => {
                        this.sliders.push(slider);
                    });
                    console.log(this.sliders)
                }
            ).catch(err => console.log(err))
        }
    }

</script>
