<template>
    <div id="task">
        <section class="content-header">
            <h1>
                Tasks
            </h1>
        </section>

        <div class="buttons">

            <button class="btn btn-default" @click="one=!one">Saturday</button>
            <button class="btn btn-default" @click="two=!two">Sunday</button>
            <button class="btn btn-default" @click="three=!three">Monday</button>
            <button class="btn btn-default" @click="four=!four">Tuesday</button>
            <button class="btn btn-default" @click="five=!five">Wednesday</button>
            <button class="btn btn-default" @click="six=!six">Thursday</button>
        </div>

        <div class="days container">
            <div class="day col-xs-12" >
                <h1>{{ lists[0].day }}</h1>
                <ul class="list-unstyled">
                    <li :key="index" v-for="(item, index) in lists[0].listsq">
                        {{ item }}
                        <div class='buttonss'>
                            <button class="btn btn-success">
                                get
                            </button>
                            <button class="btn btn-danger" @click="add">
                                add
                            </button>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
    </div>
</template>


<style lang="scss" scoped>
.buttons{
    margin-bottom: 20px;
}

.days{
    background-color: #222d32;
    padding: 10px;
    display: flex;
    justify-content: center;
    align-items: center;

    .day{
        background-color: #fff;
        padding: 10px;
        border-radius: 20px;

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
            lists:[ 
                {day: 'Saturday', listsq: ['Some thing98','Some thing15','Some thing1']},
            ],
            one: true,
            two: false,
            three: false, 
            four: false,
            five: false,
            six: false,
        }
    },
    methods:{
        add(){
            Axios.post('api/addExerciese', {
                tasks: {day: 0, lists: ['Some thing98','Some thing15','Some thing1']}
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
        Axios.get(`api/exerciese/2`, {
            headers:{
                 Accept: 'application/json',
                 Authorization: 'Bearer '+ this.$store.state.user.token,
            }
        })
        .then(res => console.log(res))
        .catch(err => console.log(err)) 

    }
}
</script>