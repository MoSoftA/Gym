<template>
    <div class="box box-info">

        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="box-header with-border">
                        <h3 class="box-title">تعديل بيانات العميل</h3>
                    </div>
                    <!-- /.box-header -->

                    <div class="row">


                        <div class="form-group col-4">
                            <label class="font-wieght-bold">الأسم</label>
                            <input type="text" class="form-control" v-model.lazy="name" placeholder="ادخل الاسم">
                        </div>

                        <div class="form-group col-4">
                            <label for="inputEmail3" class="font-wieght-bold control-label">البريد الإلكتروني</label>
                            <input type="email" class="form-control" id="inputEmail3" v-model.lazy="email"
                                placeholder="ادخل البريد الإلكتروني">
                        </div>

                        <div class="form-group col-4">
                            <label for="inputPassword3" class="font-wieght-bold control-label">كلمة السر</label>
                            <input type="password" class="form-control" id="inputPassword3" v-model.lazy="password"
                                placeholder="ادخل كلمة السر">
                        </div>

                        <div class="form-group col-6">
                            <label for="DateStart" class="font-wieght-bold control-label">تاريخ بداية الإشتراك</label>
                            <input type="date" class="form-control" id="DateStart" v-model="date_start"
                                placeholder="DD/MM/YYY">
                        </div>

                        <div class="form-group col-6">
                            <label for="DateEnd" class="font-wieght-bold control-label">تاريخ نهاية الإشتراك</label>
                            <input type="date" class="form-control" id="DateEnd" v-model="date_end"
                                placeholder="DD/MM/YYY">
                        </div>


                        <div class="col-4 my-4">
                            <button class="btn btn-primary btn-block btn-flat" type="button" @click="update_user">عدّل
                            </button>
                        </div>
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
                name: this.$store.state.AdminPanel.userEdit[1],
                email: this.$store.state.AdminPanel.userEdit[2],
                password: '',
                id: this.$store.state.AdminPanel.userEdit[0],
                date_start: this.$store.state.AdminPanel.userEdit[3],
                date_end: this.$store.state.AdminPanel.userEdit[4]
            }
        },

        methods: {
            update_user() {

                // Send the request
                axios.put(`api/editUser/${this.id}`, {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        date_start: this.date_start,
                        date_end: this.date_end,
                    },  {
                        headers: {
                            Accept: 'application/json',
                            Authorization: 'Bearer ' + this.$store.state.user.token
                        },

                    })
                    .then(res => {
                        // Todo
                        if (res.status == 200) {
                            Swal.fire({
                                title: 'تم تعديل العميل',
                                text: res.data,
                                type: 'success',
                                confirmButtonText: 'حسناً'
                            });

                        }
                        console.log(res);
                    }).catch(
                        err =>
                        Swal.fire({
                            title: 'فشلت العملية',
                            text: err.data,
                            type: 'error',
                            confirmButtonText: 'حسناً'
                        })
                    )
            }
        },
        mounted() {
            console.log('lol', this.$store.state.AdminPanel.userEdit[0])
        }
    }

</script>

<style scoped>
    .box {
        direction: rtl;
        text-align: right;
    }

</style>
