<template>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <p class="h1 mt-5">NAVBAR</p>

                <div class="row">

                    <div class="input col-6 col-sm-12">
                        <label for="text">Company Name</label>
                        <div class="input-group">
                            <input type="text" id="text" class="form-control" v-model="navbar.logo.text"
                                placeholder="Company Name">
                        </div>
                    </div>

                    <div class="input col-6 col-sm-12">
                        <label for="image">Company logo</label>
                        <div class="input-group">
                            <input type="file" id="image" class="form-control" @change="get_image($event)"
                                placeholder="Company logo">
                        </div>
                    </div>

                    <div class="input col-md-4 col-sm-10 mx-sm-auto mx-md-0 col-lg-2 mt-3">
                        <label for="bgc">Background color</label>
                        <div class="input-group">
                            <input type="color" id="bgc" class="form-control" v-model="navbar.color.bg">
                        </div>
                    </div>

                    <div class="input col-md-4 col-sm-10 mx-sm-auto mx-md-0 col-lg-2 mt-3">

                        <label for="fc">Font color</label>
                        <div class="input-group">
                            <input type="color" id="fc" class="form-control" v-model="navbar.color.font">
                        </div>
                    </div>

                    <div class="input col-md-4 col-sm-10 mx-sm-auto mx-md-0 col-lg-2 mt-3">
                        <label for="bgc">button background</label>
                        <div class="input-group">
                            <input type="color" id="bgc" class="form-control" v-model="navbar.color.bgc">
                        </div>
                    </div>

                    <div class="input col-md-4 col-sm-10 mx-sm-auto mx-md-0 col-lg-2 mt-3">
                        <label for="bf">button font color</label>
                        <div class="input-group">
                            <input type="color" id="bf" class="form-control"  v-model="navbar.color.bf">
                        </div>
                    </div>
                </div>

                <div class="col-4 my-4">
                        <button class="btn btn-primary btn-block btn-flat" >Done</button>
                </div>
            </div>
        </div>
    </div>
<!-- @click="assign" -->

</template>

<script>
import Axios from 'axios';
// import realNav from '../../../blocks/Nav';
    export default {
        data() {
            return {
                navbar: {
                    logo: {
                        text: '',
                        img: ''
                    },
                    color: {
                        bg: '',
                        font: '',
                        bgc: '',
                        bf: ''
                    }
                }
            }
        },
        methods: {
            get_image(e) {

                let fileReader = new FileReader();

                fileReader.readAsDataURL(e.target.files[0]);

                fileReader.onload = (e) => {
                    this.logo.image = e.target.result;
                }
            }
        },
        mounted(){
            // Axios.get('api/storeNavbar', {
            //         headers: {
            //             Accept: 'application/json',
            //             Authorization: 'Bearer ' + this.$store.state.user.token
            //         },
            //     }).then(res => console.log(res)).catch(err => console.log(err));

                Axios.post('api/storeNav', {
                    name: 'لوجو',
                    background_color: 'blue',
                    font_color: 'black',
                    button_background: 'red',
                    button_font_color: 'white'
                },{
                    headers: {
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token
                    },
                 }).then(res => console.log(res)).catch(err => console.log(err))

            // Object.assign(this.navbar, this.$store.state.sections.navbar)
        }
    }

</script>
