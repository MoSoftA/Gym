<template>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <p class="h1 mt-5">Tasks</p>

                <div class="row">
                    <button class="col-xs-4 col-md-3 btn btn-flat btn-outline-primary m-1" @click="Saturday()">Saturday</button>
                    <button class="col-xs-4 col-md-3 btn btn-flat btn-outline-primary m-1" @click="Sunday()">Sunday</button>
                    <button class="col-xs-4 col-md-3 btn btn-flat btn-outline-primary m-1" @click="Monday()">Monday</button>
                    <button class="col-xs-4 col-md-3 btn btn-flat btn-outline-primary m-1" @click="Thursday()">Thursday</button>
                    <button class="col-xs-4 col-md-3 btn btn-flat btn-outline-primary m-1" @click="Wednesday()">Wednesday</button>
                    <button class="col-xs-4 col-md-3 btn btn-flat btn-outline-primary m-1" @click="Thuesday()">Thuesday</button>
                    <button class="col-xs-4 col-md-3 btn btn-flat btn-outline-primary m-1" @click="Friday()">Friday</button>
                </div>
                <div class="row">
                    <div class="day mb-2 col-sm-12 col-md-4 col-lg-3" :key="index" v-for="(item, index) in listsa">
                        <h1>{{ item.day }}</h1>
                        <ul class="list-unstyled">
                            <li :key="index" v-for="(itemd,index) in item.exercise">
                                {{ itemd }}
                                <button class="btn btn-danger btn-flat ml-4" @click="remove(index, item)">
                                    Remove
                                </button>
                            </li>
                        </ul>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Type your exercise"
                                aria-label="Recipient's username" v-model='D[index]' @keyup.enter="add(index, item)" aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-flat" type="button" id="button-addon2"
                                    @click="add(index, item)">Add</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</template>


<style lang="scss" scoped>
    .day {
        background-color: #fff;
        padding: 10px;
        border-radius: 20px;
        margin-right: 10px;

        box-shadow: 0 0 1px rgba(0, 0, 0, .125), 0 1px 3px rgba(0, 0, 0, .2);

        ul {
            padding: 0;

            li {
                padding: 10px;
                transition: all 0.4s ease;

                &:hover {
                    background-color: tomato;
                }
            }
        }
    }

    .inputs {
        margin-top: 20px;
    }

</style>


<script>
    import Axios from 'axios';
    export default {

        data() {
            return {
                listsa: [],
                addList: {
                    day: '',
                    exercieses: [],
                    user_id: null
                },
                task: '',
                D: [null, null, null, null, null, null]
            }
        },
        computed: {

        },
        methods: {
            Saturday(){
                Axios.post(`api/addExerciese`, {
                    day: 'Saturday',
                    lists: ['sd','dasadsadsda'],
                    user_id: this.$store.state.AdminPanel.userEdit[0]
                }, {
                    headers: {
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token,
                    }
                }).then(res => {
                    this.listsa.push(res.data);
                    console.log(res)
                }).catch(err => {
                    console.log(err)
                })
            },
            Sunday(){
                Axios.post(`api/addExerciese`, {
                    day: 'Sunday',
                    lists: [''],
                    user_id: this.$store.state.AdminPanel.userEdit[0]
                }, {
                    headers: {
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token,
                    }
                }).then(res => {
                    console.log(res)
                }).catch(err => {
                    console.log(err)
                })
            },
            Monday(){
                Axios.post(`api/addExerciese`, {
                    day: 'Monday',
                    lists: [''],
                    user_id: this.$store.state.AdminPanel.userEdit[0]
                }, {
                    headers: {
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token,
                    }
                }).then(res => {
                    console.log(res)
                }).catch(err => {
                    console.log(err)
                })
            },
            Thursday(){
                Axios.post(`api/addExerciese`, {
                    day: 'Thursday',
                    lists: [''],
                    user_id: this.$store.state.AdminPanel.userEdit[0]
                }, {
                    headers: {
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token,
                    }
                }).then(res => {
                    console.log(res)
                }).catch(err => {
                    console.log(err)
                })
            },
            Wednesday(){
                Axios.post(`api/addExerciese`, {
                    day: 'Wednesday',
                    lists: [''],
                    user_id: this.$store.state.AdminPanel.userEdit[0]
                }, {
                    headers: {
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token,
                    }
                }).then(res => {
                    console.log(res)
                }).catch(err => {
                    console.log(err)
                })
            },
            Thuesday(){
                Axios.post(`api/addExerciese`, {
                    day: 'Thuesday',
                    lists: [''],
                    user_id: this.$store.state.AdminPanel.userEdit[0]
                }, {
                    headers: {
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token,
                    }
                }).then(res => {
                    console.log(res)
                }).catch(err => {
                    console.log(err)
                })
            },
            Friday(){
                Axios.post(`api/addExerciese`, {
                    day: 'Friday',
                    lists: ['sd'],
                    user_id: this.$store.state.AdminPanel.userEdit[0]
                }, {
                    headers: {
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token,
                    }
                }).then(res => {
                    console.log(res)
                }).catch(err => {
                    console.log(err)
                })
            },

            add(index, i) {
                let source = {
                    day: i.day,
                    lists: this.listsa.filter(w => w.id == i.id)[0].exercise,
                    user_id: this.$store.state.AdminPanel.userEdit[0]
                };

                source.lists.push(this.D[index]);


                Axios.put(`api/addExerciese/${this.$store.state.AdminPanel.userEdit[0]}`, source, {
                    headers: {
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token,
                    }
                }).then(res => console.log(res)).catch(err => console.log(err));
                this.D[index] = null;
            },

            remove(index, i) {
                let source = {
                    day: i.day,
                    lists: this.listsa.filter(w => w.day == i.day)[0].exercise,
                    user_id: this.$store.state.AdminPanel.userEdit[0]
                };

                i.exercise.splice(index, 1);
                source.lists = i.exercise;

                Axios.put(`api/editExerciese/${this.$store.state.AdminPanel.userEdit[0]}`, source, {
                    headers: {
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token,
                    }
                }).then(

                    Axios.get(`api/exerciese/${this.$store.state.AdminPanel.userEdit[0]}`, {
                        headers: {
                            Accept: 'application/json',
                            Authorization: 'Bearer ' + this.$store.state.user.token,
                        }
                    })
                    .then(res => {
                        this.listsa = [];
                        let exercieses = res.data.data;
                        // Convert response to array
                        exercieses.forEach(exercisea => {
                            if (typeof (exercisea.exercise == 'string')) {

                                exercisea.exercise = exercisea.exercise.replace(/[^a-zA-Zأ-ي0-9\, ]/g,
                                    "");
                                exercisea.exercise = exercisea.exercise.split(',');

                            } else {
                                this.listsa.push(exercisea.exercise)
                            }
                            this.listsa.push(exercisea)
                        });
                    })
                    .catch(err => console.log(err))


                ).catch(err => console.log(err));

            }
        },
        mounted() {

            Axios.get(`api/exerciese/${this.$store.state.AdminPanel.userEdit[0]}`, {
                    headers: {
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token,
                    }
                })
                .then(res => {
                    console.log(res);
                    let exercieses = res.data.data;
                    if(exercieses != []){
                        
                        // Convert response to array
                        exercieses.forEach(exercisea => {
                            if (typeof (exercisea.exercise == 'string')) {
                                
                                exercisea.exercise = exercisea.exercise.replace(/[^a-zA-Zأ-ي0-9\, ]/g, "");
                                exercisea.exercise = exercisea.exercise.split(',');

                            } else {
                                this.listsa.push(exercisea.exercise)
                            }
                            this.listsa.push(exercisea)
                        });
                    }   
                })
                .catch(err => console.log(err))
        }
    }

</script>
