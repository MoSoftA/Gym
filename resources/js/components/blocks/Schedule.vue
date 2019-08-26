<template>
<div class="py-5" id="Schedule">
    <div class="container">
        <p class="h1 text-white">جدولك الأسبوعي</p>
        <hr>
        <ul class="nav nav-pills mb-3 p-0" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-one" aria-selected="true">السبت</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-two" aria-selected="false">الأحد</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-three" aria-selected="false">الإثنين</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-four" role="tab" aria-controls="pills-four" aria-selected="false">الثلاثاء</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-five" role="tab" aria-controls="pills-five" aria-selected="false">الأربعاء</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-six" role="tab" aria-controls="pills-six" aria-selected="false">الخميس</a>
            </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-one-tab">
                <ul>
                    <li :key="index" v-for="(train, index) in listsa[0].exercise">{{ train }}</li>
                </ul>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-two-tab">
                <ul>
                    <li :key="index" v-for="(train, index) in listsa[1].exercise">{{ train }}</li>
                </ul>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-three-tab">
                <ul>
                    <li :key="index" v-for="(train, index) in listsa[2].exercise">{{ train }}</li>
                </ul>
            </div>
            <div class="tab-pane fade" id="pills-four" role="tabpanel" aria-labelledby="pills-four-tab">
                <ul>
                    <li :key="index" v-for="(train, index) in listsa[3].exercise">{{ train }}</li>
                </ul>
            </div>
            <div class="tab-pane fade" id="pills-five" role="tabpanel" aria-labelledby="pills-five-tab">
                <ul>
                    <li :key="index" v-for="(train, index) in listsa[4].exercise">{{ train }}</li>
                </ul>
            </div>
            <div class="tab-pane fade" id="pills-six" role="tabpanel" aria-labelledby="pills-six-tab">
                <ul>
                    <li :key="index" v-for="(train, index) in listsa[5].exercise">{{ train }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import Axios from 'axios';
export default {
    computed:{
        
    },
    data(){
        return{
            listsa: []
        }
    },
    mounted(){
        // Git the links
         Axios.get(`api/exerciese/${this.$store.state.user.id}`, {
                    headers: {
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token,
                    }
                })
                .then(res => {
                    console.log(res)
                    this.listsa = [];
                    let exercieses = res.data.data;
                    // Convert response to array
                    exercieses.forEach(exercisea => {
                        if (typeof (exercisea.exercise == 'string')) {

                            exercisea.exercise = exercisea.exercise.replace(/[^a-zA-Zأ-ي0-9\, ]/g, "");
                            exercisea.exercise = exercisea.exercise.split(',');

                            console.log(exercisea.exercise)

                        } else {
                            this.listsa.push(exercisea.exercise)
                        }
                        this.listsa.push(exercisea)
                    });
                    console.log(this.listsa)
                })
                .catch(err => console.log(err))
    }
}
</script>


<style lang="scss" scoped>
$main-red: rgb(242, 58, 46);

#Schedule{
    background-image: url('../../assets/hero_bg_1.jpg');
    background-position: top center;
    background-attachment: fixed;
    text-align: right;
    ul{
        .nav-link{
            color: white;
            &.active{
                background-color: $main-red;
            }
        }
    }
    .tab-content {
        .tab-pane{
            ul {
                list-style: none;
                padding: 0;

                li{
                    background-color: #fff;
                    padding: 10px 0px;
                    transition: all 0.2s ease;
                    &:hover{
                        border-left: 10px solid $main-red;
                        border-right: 10px solid $main-red;
                    }
                }
            }
        }
    }
}
</style>
