<template>
<div class="my-5" id="feats">
    <div class="container">
        <div class="row">
        <div class="col-md-6 col-lg-3 p-5 k" @click="get_id(index)" :key="index" v-for="(feat , index) in feats">
            <div class="feat">
                <img class="mb-2" :src="feat.image" width="56" height="56"/>
                <p class="h4">{{ feat.title }}</p>
                <hr>
                <p>{{ feat.text }}</p>
            </div>
        </div>
        <!-- <div class="col-md-6 col-lg-3 p-5 k">
                <div class="feat"><img class="mb-2" src="../../assets/002-dumbbell.svg" width="56" height="56"/>
                <p class="h4">خسارة الوزن</p>
                <hr/>
                <p> لوريم ايبسوم دولار سيت أميت أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أيوسمود.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 p-5 k">
                <div class="feat"><img class="mb-2" src="../../assets/003-boxing-gloves.svg" width="56" height="56"/>
                <p class="h4">الملاكمة</p>
                <hr/>
                <p> لوريم ايبسوم دولار سيت أميت أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أيوسمود.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 p-5 k">
                <div class="feat"><img class="mb-2" src="../../assets/004-running.svg" width="56" height="56"/>
                <p class="h4">الركض</p>
                <hr/>
                <p> لوريم ايبسوم دولار سيت أميت أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور أيوسمود.</p>
                </div>
            </div> -->
        </div>
    </div>
</div>
</template>

<script>
import Axios from 'axios';
export default {
    data(){
        return {
            feats: []
        }
    },
    methods: {
        get_id(index){

            let element = this.feats.find(el => el.id ==  index+1)
            console.log(element)
        }
    },
    mounted(){
        Axios.get("api/getFeatures")
        .then(res => {
            this.feats = res.data.data;

            console.log('dasaad', res.data.data);
        })
        .catch(err => {
            console.log(err);
        });
    }
}
</script>

<style lang="scss" scoped>
#feats{
    .k:nth-child(even){
        background-color: #eee !important;
    }
    .feat{
        text-align: right;
    }
}
</style>
