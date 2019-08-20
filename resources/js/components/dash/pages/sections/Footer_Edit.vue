<template>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <realFooter></realFooter>
                <div class="row">

                    <div class="col-md-6 col-sm-12">
                        <p class="h1">Footer</p>

                        <label for="text" class="my-2">Who are we</label>
                        <div class="input-group">
                            <input type="text" id="text" class="form-control" v-model="footer.we"
                                placeholder="Who are we">
                        </div>

                        <label for="info" class="my-2">Info</label>
                        <div class="input-group">
                            <input type="text" id="info" class="form-control" v-model="footer.info" placeholder="Info">
                        </div>

                        <p class="h3 mt-3">Contact us</p>

                        <label for="adress" class="my-2">Adress</label>
                        <div class="input-group">
                            <input type="text" id="adress" class="form-control" v-model="footer.address"
                                placeholder="Adress">
                        </div>


                        <label for="number" class="my-2">Phone number</label>
                        <div class="input-group">
                            <input type="tel" id="number" class="form-control" v-model="footer.Phone"
                                placeholder="Phone number">
                        </div>

                        <label for="fax" class="my-2">Fax</label>
                        <div class="input-group">
                            <input type="text" id="fax" class="form-control" v-model="footer.fax" placeholder="Fax">
                        </div>

                        <label for="facebook" class="my-2">Facebook</label>
                        <div class="input-group">
                            <input type="text" id="facebook" class="form-control" v-model="footer.facebook"
                                placeholder="Facebook">
                        </div>

                        <label for="google" class="my-2">Google</label>
                        <div class="input-group">
                            <input type="text" id="google" class="form-control" v-model="footer.google"
                                placeholder="Google">
                        </div>

                        <label for="linkedIn" class="my-2">LinkedIn</label>
                        <div class="input-group">
                            <input type="text" id="linkedIn" class="form-control" v-model="footer.linkedIn"
                                placeholder="LinkedIn">
                        </div>

                        <label for="twitter" class="my-2">Twitter</label>
                        <div class="input-group">
                            <input type="text" id="twitter" class="form-control" v-model="footer.twitter"
                                placeholder="Twitter">
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
    import realFooter from '../../../blocks/Footer';

    export default {
        data() {
            return {
                footer: {
                    Phone: null,
                    address: null,
                    created_at: null,
                    facebook: null,
                    fax: null,
                    google: null,
                    id: null,
                    info: null,
                    linkedIn: null,
                    twitter: null,
                    we: null,
                }
            }
        },
        components: {
            realFooter
        },
        methods: {
            send() {
                let foot = new FormData();
                foot.append('we', this.footer.we);
                foot.append('info', this.footer.info);
                foot.append('address', this.footer.address);
                foot.append('Phone', this.footer.Phone);
                foot.append('fax', this.footer.fax);
                foot.append('info', this.footer.info);
                foot.append('facebook', this.footer.facebook);
                foot.append('google', this.footer.google);
                foot.append('linkedIn', this.footer.linkedIn);
                foot.append('twitter', this.footer.twitter);

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token
                    }
                }
                Axios.post('api/storeFooter', foot, config).then(

                    Axios.get('api/getFooter').then(res => {
                        this.$store.commit('Edit_Footer', res.data.data[0]);
                        Object.assign(this.footer, this.$store.state.sections.footer)
                    }).catch(err => console.log(err))

                    ).catch(err => console.log(err))
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
                Axios.get('api/getFooter').then(res =>
                    Object.assign(this.footer, res.data.data[0])
                ).catch(
                    err => console.log(err)
                )
            }
        }

</script>
