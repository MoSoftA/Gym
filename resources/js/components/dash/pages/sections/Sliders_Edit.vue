<template>
   <div class="container">
        <div class="card">
            <div class="card-body row">

                <p class="h1 mt-5">SLider Edit</p>

                <div class="input col-2 col-sm-12">
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

                    <div class="col-4 d-block mx-2 my-4">
                        <button class="btn btn-primary btn-block btn-flat" @click="send" role="button">Done</button>
                </div>
            </div>
        </div>
   </div>
</template>


<script>
import Axios from 'axios';
export default {
    data(){
        return {
            image: '' ,
            text: ''
        }
    },
    methods:{
            get_image(e){
                this.image = e.target.files[0];
        },send(){
                let slider = new FormData();
                 slider.append('text', this.text);
                 slider.append('image', this.image);

                const config = {
                    headers: { 
                        'content-type': 'multipart/form-data', 
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token 
                    }
                }
                Axios.post('api/storeSlider', slider,config).then(res => console.log(res)).catch(err => console.log(err))
            }
    },
    mounted(){
         const config = {
                    headers: { 'content-type': 'multipart/form-data', Accept: 'application/json',
                            Authorization: 'Bearer ' + this.$store.state.user.token }
                }
            Axios.get('api/getSlider', config).then(res => console.log(res)).catch(err => console.log(err))
    }
}
</script>
