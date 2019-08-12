<template>
    <div id="navbar">
        <nav class="navbar navbar-expand-lg navbar-dark" :style='{backgroundColor: Navbar.color.bg}'>
            <div class="container"><a class="navbar-brand" href="#">{{ Navbar.logo.text }}</a>
                <button class="navbar-toggler" @click="show()"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse justify-content-end d-lg-flex">
                    <button type="button" @click="show()" class="close d-xl-none d-lg-none"
                        data-dismiss="modal">&times;</button>
                    <ul class="navbar-nav">
                        <li class="nav-item ml-3">
                            <router-link to="/" active-class="active" class="nav-link"
                                :style='{color: Navbar.color.font}' exact>الرئيسية<span class="sr-only">(current)</span>
                            </router-link>
                        <li class="nav-item ml-3" v-if="users.loged">
                            <router-link to="/profile" active-class="active" class="nav-link"
                                :style='{color: Navbar.color.font}' exact>حسابك<span class="sr-only">(current)</span>
                            </router-link>
                        </li>
                        <li class="nav-item ml-3">
                            <router-link to="/news" class="nav-link" :style='{color: Navbar.color.font}' exact>آخر
                                الأخبار<span class="sr-only">(current)</span></router-link>
                        </li>
                        <li class="nav-item ml-3" v-if="users.loged && users.admin">
                            <router-link to="/adminpanel" active-class="active" class="nav-link"
                                :style='{color: Navbar.color.font}' exact>لوحة التحكم<span
                                    class="sr-only">(current)</span></router-link>
                        </li>
                        <li class="nav-item ml-3" v-if="!users.loged">
                            <form class="form-inline my-2 my-lg-0">
                                <button class="btn btn-secondary rounded-pill border-0 ml-3"
                                    @click="show()"
                                    :style='{color: Navbar.color.bf, backgroundColor: Navbar.color.bgc}'
                                    data-toggle="modal" data-target="#myModal" type="button">سجل دخول</button>
                            </form>
                        </li>
                        <li class="mt-1 nav-item ml-3" v-if="users.loged">
                            <span class="font-weight-bold">{{ users.name }}</span>
                        </li>

                        <li class="mt-1 nav-item ml-3" v-if="users.loged">
                            <button
                                class="btn btn-danger rounded-pill mt-xl-0 mt-lg-0 mr-2 d-md-block mt-sm-1 d-sm-block"
                                @click="logout()">تسجيل الخروج</button>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">قائمة التسجيل</h4>
                        <button type="button" class="close float-left" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="login">
                            <input class="form-control mb-4" v-model.lazy="user.email" type="email"
                                placeholder="البريد الإلكتروني" />
                            <input class="form-control mb-4" v-model.lazy="user.password" type="password"
                                placeholder="كلمة المرور" />
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button class="btn btn-secondary rounded-pill ml-3" @click="login()" data-dismiss="modal"
                            type="button">سجل دخول</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: 'Nav',
        data() {
            return {
                user: {
					name:'',
                    email: '',
                    admin: '',
                    password: '',
                }
            }
        },
        computed: {
            Navbar() {
                return this.$store.state.sections.navbar
            },
            users(){
                return this.$store.state.user
            },
        },
        methods: {
            show() {
                $('nav .collapse').toggleClass('show');
            },
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
            logout() {
                this.$store.commit('user', {
                    id: null,
                    name: null,
                    email: null,
                    admin: null,
                    subscription: {
                        start: null,
                        end: null,
                    },
                    loged: false,
                })
            }
        }
    }

</script>

<style lang="scss" scoped>
    $main-red: rgb(242, 58, 46);

    nav {
        min-height: 70px;
        background-color: rgb(242, 58, 46);

        button.navbar-toggler {
            outline: none;
            border: none;
            color: black;
        }

        .collapse {
            color: white !important;

            &:not(.show) {
                display: block
            }

            input.form-control {
                background-color: transparent;
                border-radius: 4px;
                border: 1px solid #fff;
                transition: all 0.4s ease;
                width: 200px;

                &::placeholder {
                    color: black;
                    font-weight: bolder
                }

                &:active,
                &:focus {
                    box-shadow: none;
                }
            }
        }
    }

    .modal {
        .modal-header {
            .close {
                position: absolute;
                display: block;
                left: 0px;
                font-weight: bolder;
                outline: none;
            }
        }
    }

    .active {
        color: white !important;
    }

    * {
        text-align: right
    }

    @media (max-width: 991px) {
        .active {
            color: black !important;
        }

        nav .collapse {
            position: fixed;
            right: -75%;
            z-index: 999999;
            display: block;
            top: 0;
            height: 100%;
            width: 75%;
            transition: all 0.4s ease;

            input.form-control {
                border: 1px solid #000;
                margin-bottom: 10px
            }

            button {
                margin-bottom: 10px;

                &.close {
                    position: absolute;
                    display: block;
                    top: 50px;
                    right: 20px;
                    font-size: 50px;
                    font-weight: bolder;
                    outline: none;
                }
            }

            &.show {
                right: 0;
                background-color: #FFF;
                color: black !important;
                transform: translate(-0%);

                ul {
                    li form {
                        min-width: 200px;
                    }

                    li a,
                    a.nav-link {
                        color: black;
                        font-size: 25px;
                    }
                }
            }

            ul {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
            }
        }
    }

</style>
