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
                    <input type="email" class="form-control" placeholder="Email" v-model.lazy="user.email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" v-model.lazy="user.password" placeholder="Password">
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
        data() {
            return {
                user: {
                    email: '',
                    admin: '',
                    password: '',
                }
            }
        },
        computed: {
            // Get user

            loged() {
                return this.$store.state.user.loged
            }
        },
        methods: {
            login() {
                // Send the request
                axios.post('/api/login', {
                        email: this.user.email,
                        password: this.user.password
                    })
                    .then(res => {

                        this.$store.commit('user', res.data.data.user);

                        if (res.data.data.user.admin == 1){
                            this.user.admin = true;
                            this.$store.state.user.admin = true
                        }
                        else
                        {
                            this.user.admin = false;
                         this.$store.state.user.admin = false
                        }

                        console.log(this.$store.state.user);

                        // Make it 
                        this.$store.state.user.loged = true;
                        this.$store.state.user.token = res.data.data.token ;
                        this.user.name = this.$store.state.user.name;
					}).catch(err => console.log(err.message))
            },
    }
    }
    

</script>
