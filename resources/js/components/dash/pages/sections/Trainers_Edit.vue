<template>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <label for="image">Image</label>
                    <div class="input-group">
                        <input type="file" id="image" class="form-control" @change="get_image($event)">
                    </div>
                    <br>
                    <div class="input col-md-4 col-sm-10 mx-sm-auto mx-md-0 col-lg-12 mt-3">
                        <label for="bgc">Image title</label>
                        <div class="input-group">
                            <input type="text" id="text" class="form-control" placeholder="Image title">
                        </div>
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
                body: '',
                image: ''
            }
        },
        methods: {
            get_image(e) {
                this.image = e.target.files[0];
            },
            send() {
                let about = new FormData();
                about.append('body', String($('#some-textarea').val()));
                about.append('image', this.image);

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
