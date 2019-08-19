<template>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <label for="image">Trainer image</label>
                    <div class="input-group">
                        <input type="file" id="image" class="form-control" @change="get_image($event)">
                    </div>
                    <br>

                    <div class="input col-md-4 col-sm-10 mx-sm-auto mx-md-0 col-lg-12 mt-3">
                        <label for="info">Trainer Info</label>
                        <div class="input-group">
                            <input type="text" id="info" class="form-control" v-model='info' placeholder="Image title">
                        </div>
                    </div>
                    
                    <div class="input col-md-4 col-sm-10 mx-sm-auto mx-md-0 col-lg-12 mt-3">
                        <label for="name">Trainer name</label>
                        <div class="input-group">
                            <input type="text" id="name" class="form-control" v-model='name' placeholder="Image title">
                        </div>
                    </div>

                    <label for="email" class="my-2">Trainer email</label>
                        <div class="input-group">
                            <input type="email" id="email" autocomplete="off" class="form-control" v-model="email" placeholder="email">
                        </div>


                        <label for="number" class="my-2">Trainer phone number</label>
                        <div class="input-group">
                            <input type="tel" id="number" class="form-control" v-model="phone"
                                placeholder="Phone number">
                        </div>

                    <div class="col-4 my-4">
                        <button class="btn btn-primary btn-block btn-flat" @click="send" role="button">Done</button>
                    </div>
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
                name: '',
                email: '',
                image: '',
                info: '',
                phone: '',

            }
        },
        methods: {
            get_image(e) {
                this.image = e.target.files[0];
            },
            send() {
                let about = new FormData();
                about.append('name', this.name);
                about.append('email', this.email);
                about.append('info', this.info);
                about.append('phone', this.phone);
                about.append('img', this.image);

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token
                    }
                }
                Axios.post('api/storeTrainer', about, config).then(res => console.log(res)).catch(err => console.log(
                    err))
            }
        }
    }

</script>
