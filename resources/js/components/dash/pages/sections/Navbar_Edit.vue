<template>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <realNav></realNav>
                <p class="h1 mt-5">NAVBAR</p>

                <div class="row">

                    <div class="input col-6 col-sm-12">
                        <label for="text">Company Name</label>
                        <div class="input-group">
                            <input type="text" id="text" class="form-control" v-model="navbar.name"
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
                            <input type="color" id="bgc" class="form-control" v-model="navbar.background_color">
                        </div>
                    </div>

                    <div class="input col-md-4 col-sm-10 mx-sm-auto mx-md-0 col-lg-2 mt-3">

                        <label for="fc">Font color</label>
                        <div class="input-group">
                            <input type="color" id="fc" class="form-control" v-model="navbar.font_color">
                        </div>
                    </div>

                    <div class="input col-md-4 col-sm-10 mx-sm-auto mx-md-0 col-lg-2 mt-3">
                        <label for="bgc">button background</label>
                        <div class="input-group">
                            <input type="color" id="bgc" class="form-control" v-model="navbar.button_background">
                        </div>
                    </div>

                    <div class="input col-md-4 col-sm-10 mx-sm-auto mx-md-0 col-lg-2 mt-3">
                        <label for="bf">button font color</label>
                        <div class="input-group">
                            <input type="color" id="bf" class="form-control" v-model="navbar.button_font_color">
                        </div>
                    </div>
                </div>

                <div class="col-4 my-4">
                    <button class="btn btn-primary btn-block btn-flat" @click="send" role="button">Done</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import Axios from 'axios';
    import realNav from '../../../blocks/Nav';
    export default {
        data() {
            return {
                navbar: {
                    background_color: null,
                    button_background: null,
                    button_font_color: null,
                    font_color: null,
                    name: null,
                    logo: null,
                }
            }
        },
        components: {
            realNav
        },
        methods: {
            get_image(e) {
                this.navbar.logo = e.target.files[0];

            },
            send() {
                let vm= this; 

                let Nav = new FormData();
                Nav.append('name', this.navbar.name);
                Nav.append('background_color', this.navbar.background_color);
                Nav.append('font_color', this.navbar.font_color);
                Nav.append('button_background', this.navbar.button_background);
                Nav.append('button_font_color', this.navbar.button_font_color);
                Nav.append('img', this.navbar.logo);

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token
                    }
                }
                Axios.post('api/storeNavbar', Nav, config).then(
                    
                    Axios.get('api/getNavbar').then(res => {
                    this.$store.commit('Edit_Navbar', res.data.data);
                    Object.assign(vm.navbar, vm.$store.state.sections.navbar)    
                }).catch(
                    err => console.log(err)
                )).catch(err => console.log(err))
            }
        },
        mounted() {
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    Accept: 'application/json',
                    Authorization: 'Bearer ' + this.$store.state.user.token
                }
            }
            Axios.get('api/getNavbar').then(res =>
                Object.assign(this.navbar, res.data.data) 
                ).catch(
                    err => console.log(err)
            )
        }
    }

</script>
