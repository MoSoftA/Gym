<template>
    <div class="container">
        <div class="card">
            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 col-sm-12">
                        <p class="h1">Footer</p>

                        <label for="text" class="my-2">Who are we</label>
                        <div class="input-group">
                            <input type="text" id="text" class="form-control" v-model="about" placeholder="Who are we">
                        </div>

                        <label for="info" class="my-2">Info</label>
                        <div class="input-group">
                            <input type="text" id="info" class="form-control" v-model="info" placeholder="Info">
                        </div>

                        <p class="h3 mt-3">Contact us</p>

                        <label for="adress" class="my-2">Adress</label>
                        <div class="input-group">
                            <input type="text" id="adress" class="form-control" v-model="adress" placeholder="Adress">
                        </div>


                        <label for="number" class="my-2">Phone number</label>
                        <div class="input-group">
                            <input type="tel" id="number" class="form-control" v-model="number"
                                placeholder="Phone number">
                        </div>

                        <label for="fax" class="my-2">Fax</label>
                        <div class="input-group">
                            <input type="text" id="fax" class="form-control" v-model="fax" placeholder="Fax">
                        </div>

                        <label for="facebook" class="my-2">Facebook</label>
                        <div class="input-group">
                            <input type="text" id="facebook" class="form-control" v-model="facebook" placeholder="Facebook">
                        </div>

                        <label for="google" class="my-2">Google</label>
                        <div class="input-group">
                            <input type="text" id="google" class="form-control" v-model="google" placeholder="Google">
                        </div>

                        <label for="linkedIn" class="my-2">LinkedIn</label>
                        <div class="input-group">
                            <input type="text" id="linkedIn" class="form-control" v-model="linkedIn" placeholder="LinkedIn">
                        </div>

                        <label for="twitter" class="my-2">Twitter</label>
                        <div class="input-group">
                            <input type="text" id="twitter" class="form-control" v-model="twitter" placeholder="Twitter">
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
    export default {
        data() {
            return {
                about: '',
                info: '',
                adress: '',
                number: '',
                fax: '',
                facebook: '',
                google: '',
                linkedIn: '',
                twitter: '',
            }
        },
        methods:{
            send() {
                let foot = new FormData();
                foot.append('we', this.about);
                foot.append('info', this.info);
                foot.append('address', this.adress);
                foot.append('Phone', this.number);
                foot.append('fax', this.fax);
                foot.append('info', this.info);
                foot.append('facebook', this.facebook);
                foot.append('google', this.google);
                foot.append('linkedIn', this.linkedIn);
                foot.append('twitter', this.twitter);

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token
                    }
                }
                Axios.post('api/storeFooter', foot, config).then(res => console.log(res)).catch(err => console.log(
                    err))
            }
        },
        mounted(){
            Axios.get('api/getFooter').then(res => console.log(res)).catch(err => console.log(err))
        }
    }

</script>
