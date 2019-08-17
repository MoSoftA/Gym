<template>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">All users</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th :key='index' v-for="(header, index) in head">{{ header }}</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr :key='index' v-for="(user, index) in rows">
                            <td :key='index' v-for="(val, index) in user">{{ val }}</td>
                            <td>
                                <button class="btn btn-success" title="Edit user"
                                    @click="change_component($event, 'userEdit')"><i class="fas fa-edit"></i></button>

                                <button class="btn btn-danger" title="Delete user" data-toggle="modal"
                                    data-target="#exampleModalCenter" @click="get_id($event)"><i
                                        class="fas fa-user-minus"></i></button>
                                <button class="btn btn-warning" title="Add tasks"
                                    @click="change_component($event, 'tasks')"><i class="fas fa-plus"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <!-- /.card-body -->
                <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <p class="h2">Are you sure you wanna delete this user?</p>
                        <button class="btn btn-warning btn-flat my-4 mx-auto" data-dismiss="modal" type="button"
                            id="button-addon2" @click="deleteUser($event)">Just Do It</button>
                        <button type="button" class="btn btn-primary btn-flat my-4 mx-auto" data-dismiss="modal">cancel</button>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.card -->
</template>




<script>
    import axios from 'axios';
    export default {
        data() {
            return {
                id: null,
                head: null,
                rows: [],
            }

        },
        methods: {

            change_component(e, payload) {
                let id = $(e.target).parents('tr').first().children()[0].innerText;
                let users = this.rows;

                users.forEach(user => {
                    for (let key in user) {
                        if (user[key] == id) {
                            this.$store.commit('target_user', user);
                            console.log(this.$store.state.AdminPanel.userEdit);
                        }
                    }
                });

                this.$store.commit('change_current_page', payload);
            },
            get_id(e) {
                this.id = $(e.target).parents('tr').first().children()[0].innerText;
            },
            deleteUser(e) {
                axios.post(`api/deleteUser`, {id : this.id} ,  {
                        headers: {
                            Accept: 'application/json',
                            Authorization: 'Bearer ' + this.$store.state.user.token,
                        },

                    })
                    .then(res => {
                        Swal.fire({
                            title: 'Deleted successfully',
                            text: null,
                            type: 'success',
                            confirmButtonText: 'good'
                        });
                        
                        this.rows =[]

                        axios.get('api/users', {
                                headers: {
                                    Accept: 'application/json',
                                    Authorization: 'Bearer ' + this.$store.state.user.token
                                },
                            })
                            .then(res => {
                                let users = res.data.data;
                                users.forEach(user => {
                                    delete user.admin;
                                    

                                    this.head = Object.keys(user);
                                    this.rows.push(Object.values(user));
                                })
                            })
                            .catch(err => err.message);


                        console.log(res)
                    })
                    .catch(err =>  Swal.fire({
                            title: 'Faild',
                            text: err.message,
                            type: 'error',
                            confirmButtonText: 'good'
                        }));
            }
        },

        mounted() {
            axios.get('api/users', {
                    headers: {
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token
                    },
                })
                .then(res => {
                    let users = res.data.data;
                    users.forEach(user => {
                        if(user.admin == 0){
                            user.admin = "No"
                        }else {
                            user.admin = "Yes"
                        }

                        this.head = Object.keys(user);
                        this.rows.push(Object.values(user));
                    })
                })
                .catch(err => err.message);
        }
    }

</script>
