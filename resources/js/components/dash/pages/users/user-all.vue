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

                                <button class="btn btn-danger" title="Delete user" @click="deleteUser($event)"><i
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
    </div>
    <!-- /.card -->
</template>




<script>
    import axios from 'axios';
    export default {
        data() {
            return {
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
                            Object.assign(this.$store.state.user, user);
                            console.log(user);
                        }
                    }
                });

                this.$store.commit('change_current_page', payload);
            },
            deleteUser(e) {
                axios.post(`api/deleteUser`, {
                        id: $(e.target).parents('tr').first().children()[0].innerText
                    }, {
                        headers: {
                            Accept: 'application/json',
                            Authorization: 'Bearer ' + this.$store.state.user.token,
                        },

                    })
                    .then(res => {
                        console.log(res)
                    })
                    .catch(err => err.message);
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
                    let users = res.data.data
                    users.forEach(user => {
                        delete user.admin;

                        this.head = Object.keys(user);
                        this.rows.push(Object.values(user));
                    })
                })
                .catch(err => err.message);

        }
    }

</script>
