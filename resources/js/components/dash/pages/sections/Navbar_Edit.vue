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
                        <button class="btn btn-primary btn-block btn-flat" @click="send" role="button">Done</button>
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
                this.navbar.logo.img = e.target.files[0];
                
            },
            send(){
                let Nav = new FormData();
                 Nav.append('name', this.navbar.logo.text);
                 Nav.append('background_color', this.navbar.color.bg);
                 Nav.append('font_color', this.navbar.color.font);
                 Nav.append('button_background', this.navbar.color.bgc);
                 Nav.append('button_font_color', this.navbar.color.bf);
                 Nav.append('img', this.navbar.logo.img);

                const config = {
                    headers: { 
                        'content-type': 'multipart/form-data', 
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token 
                    }
                }
                Axios.post('api/storeNavbar', Nav,config).then(res => console.log(res)).catch(err => console.log(err))
            }
        },
        mounted(){
            const config = {
                    headers: { 'content-type': 'multipart/form-data', Accept: 'application/json',
                            Authorization: 'Bearer ' + this.$store.state.user.token }
                }
            Axios.get('api/getNavbar', config).then(res => console.log(res)).catch(err => console.log(err))
        }
    }

</script>
