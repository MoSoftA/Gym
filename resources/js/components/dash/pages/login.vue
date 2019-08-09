<template>
    <div class="login-box">
        <div class="login-logo">
            <a role="button"><b>Gym</b>Manager</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in</p>

                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" v-model.lazy="get_user_email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" v-model.lazy="get_user_password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" @click="login()">Sign
                            In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->
</template>

<script>
    import axios from 'axios';
    
    export default {
        computed: {
            // Get user
            get_user_email: {
                get() {
                    return this.$store.state.user.email;
                },
                set(value) {
                    this.$store.commit('get_user_email', value)
                }
            },
            get_user_password: {
                get() {
                    return this.$store.state.user.password;
                },
                set(value) {
                    this.$store.commit('get_user_password', value)
                }
            },
        },
        methods: {
            login() {
                // Send the request
                axios.post('/api/login', {
                        email: this.$store.state.user.email,
                        password: this.$store.state.user.password,
                    })
                    .then(res => {
                        // Get user
                        this.$store.state.AdminPanel.token = res.data.data.token;
                        this.$store.state.AdminPanel.loged = true;

                        console.log(res.data)
                    }).catch(err => {
                        console.log(err);
                        Swal.fire({
                            title: 'email or password is un correct',
                            text: 'Please make sure you are signed up',
                            type: 'error',
                            confirmButtonText: 'ok'
                        });
                    })
            }
        }
    }

</script>
