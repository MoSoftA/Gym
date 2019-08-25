<template>
<div id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-6 my-5">
                <div class="about-body"></div>
                <button class="btn btn-danger rounded-pill px-3 mt-5">اقرأ المزيد</button>
            </div>
            <div class="col-md-6 my-5"><img class="img-fluid" height="200" :src="about.image"/></div>
        </div>
    </div>
</div>
</template>

<style lang="scss" scoped>
.row{
    text-align: right;
}

ul{
    padding: 0 20px 0 0;
    li{
        position: relative;
        i{
            position: absolute;
            color: #28a745;
            right: -25px;
            top: 1px
        }
        p{
            font-size: 18px;
        }
    }
}
</style>

<script>
import Axios from 'axios';
export default {
    data(){
        return{
            about: {
                body: '',
                image: ''

            },
        }
    },
    mounted(){
        Axios.get('api/getAboutUsr').then(
            res => {
                Object.assign(this.about, res.data.data[0]);
                $('.about-body').append(res.data.data[0].body )
                console.log(this.image)
            }
        ).catch(err => console.log(err));

    }
}
</script>