<template>
    <div class="box box-info">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add users</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="row">

                        <div class="form-group col-4">
                            <label class="font-wieght-bold">User name</label>
                            <input type="text" class="form-control" v-model.lazy="name" placeholder="User Name">
                        </div>

                        <div class="form-group col-4">
                            <label for="inputEmail3" class="font-wieght-bold control-label">Email</label>
                            <input type="email" class="form-control" id="inputEmail3" v-model.lazy="email"
                                placeholder="Email">
                        </div>

                        <div class="col-4">
                            <label for="inputPassword3" class="font-wieght-bold control-label">Password</label>
                            <input type="password" class="form-control" id="inputPassword3" v-model.lazy="password"
                                placeholder="Password">
                        </div>


                        <div class="form-group col-4">
                            <label for="DateStart" class="font-wieght-bold control-label">Date Start</label>
                            <input type="date" class="form-control" id="DateStart" v-model="date_start"
                                placeholder="DD/MM/YYY">
                        </div>

                        <div class="form-group col-4">
                            <label for="DateEnd" class="font-wieght-bold control-label">Date End</label>
                            <input type="date" class="form-control" id="DateEnd" v-model="date_end"
                                placeholder="DD/MM/YYY">
                        </div>
                    </div>
                    
                        <div class="form-group col-4 mb-3">
                            <label class="font-wieght-bold control-label" for="inputGroupSelect01">Admin</label>
                            <br>
                            <label for="one">Yes</label>
                            <input type="radio" id="two" value="0" v-model="admin">
                            <label for="two">No</label>
                            <input type="radio" id="one" value="1" v-model="admin">
                        </div>

                    <div class="col-4 my-4">
                        <button class="btn btn-primary btn-block btn-flat" type="button" @click="register">ADD
                            USER</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Vue from 'vue';
    import axios from 'axios';
    import {
        mapState
    } from 'vuex'


    Vue.use(axios);

    export default {
        data() {
            return {
                name: '',
                email: '',
                password: '',
                date_start: '',
                date_end: '',
                admin: 'No'
            }
        },

        methods: {
            register() {
                // Send the request
                axios.post('api/register', {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        date_start: this.date_start,
                        date_end: this.date_end,
                        admin: 0
                    })
                    .then(res => {
                        console.log(res);
                        // Todo
                        if (res.status == 200) {
                            Swal.fire({
                                title: 'you add user',
                                text: res.data.message,
                                type: 'success',
                                confirmButtonText: 'Cool!'
                            });
                        }
                    }).catch(

                        (err) => {
                            console.log(err.message)

                            Swal.fire({
                                title: 'Something Wrong',
                                text: err.message,
                                type: 'error',
                                confirmButtonText: 'ok'
                            })
                        })
            }
        }
    }

</script>
