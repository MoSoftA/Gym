<template>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <p class="h1 mt-5">Tasks</p>


                <!-- <div class="buttons">

                    <button class="btn btn-primary btn-flat" @click="one=!one">Saturday</button>
                    <button class="btn btn-primary btn-flat" @click="two=!two">Sunday</button>
                    <button class="btn btn-primary btn-flat" @click="three=!three">Monday</button>
                    <button class="btn btn-primary btn-flat" @click="four=!four">Tuesday</button>
                    <button class="btn btn-primary btn-flat" @click="five=!five">Wednesday</button>
                    <button class="btn btn-primary btn-flat" @click="six=!six">Thursday</button>
                </div> -->

                <div class="row">
                    <div class="day mb-2 col-sm-12 col-md-4 col-lg-3" :key="index" v-for="(item, index) in listsa" >
                        <h1>{{ item.day }}</h1>
                        <ul class="list-unstyled">
                            <li :key="itemd" v-for="(itemd) in item.lists">
                                {{ itemd }}
                                <button class="btn btn-danger btn-flat ml-4" @click="add(index)">
                                    add
                                </button>
                            </li>
                        </ul>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Type your exercise" aria-label="Recipient's username" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="button-addon2" @click="add(index)">Button</button>
                            </div>
                        </div>
                    </div>
                   
                </div>
                </div>
            </div>
        </div>

</template>


<style lang="scss" scoped>
.buttons{
    margin-bottom: 20px;
}

    .day{
        background-color: #fff;
        padding: 10px;
        border-radius: 20px;
        margin-right: 10px;

        box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
        ul{
            padding: 0;

            li{
                padding: 10px;
                transition: all 0.4s ease;

                &:hover{
                    background-color: tomato;
                }

                .buttonss{
                    float: right;
                    
                    &::after{
                        content: '';
                        display: block;
                        clear: both;
                    }
                }
            }
        }
    }

.inputs{
    margin-top: 20px;
}
</style>


<script>
import Axios from 'axios';
export default {
    
    data(){
        return {
            listsa:[ 
                {day: "Saturday", lists: ['Some thing98','Some thing15','Some thing1']},
                {day: "Sunday", lists: ['Some thing98','Some thing15','Some thing2']},
                {day: "Monday", lists: ['Some thing98','Some thing15','Some thing3']},
                {day: "Tuesday", lists: ['Some thing98','Some thing15','Some thing4']},
                {day: "Wednesday", lists: ['Some thing98','Some thing15','Some thing5']},
                {day: "Thursday", lists: ['Some thing98','Some thing15','Some thing6']},
            ],
            one: true,
            two: false,
            three: false, 
            four: false,
            five: false,
            six: false,
        }
    },
    computed:{

    },
    methods:{
        add(index){
            console.log(index);
            Axios.post('api/addExerciese', {
                day: 'Saturday',
                id: 3,
                lists: ['Some thing98','Some thing15','Some thing1']
            },
            {
            headers:{
                 Accept: 'application/json',
                 Authorization: 'Bearer '+ this.$store.state.user.token,
            }
        }).then(res => console.log(res)).catch(err => console.log(err))
        },
    },
    mounted(){
        Axios.get(`api/exerciese/1`, {
            headers:{
                 Accept: 'application/json',
                 Authorization: 'Bearer '+ this.$store.state.user.token,
            }
        })
        .then(res => console.log(res.data.data))
        .catch(err => console.log(err)) 

    }
}
</script>