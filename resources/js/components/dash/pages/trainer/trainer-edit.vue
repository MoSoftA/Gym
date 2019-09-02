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
                            <input type="email" class="form-control" id="inputEmail3" v-model.lazy="email" placeholder="ادخل البريد الإلكتروني">
                        </div>

                        <div class="form-group col-4">
                            <label for="inputPassword3" class="font-wieght-bold control-label">رقم الهاتف</label>
                            <input type="password" class="form-control" id="inputPassword3" v-model.lazy="phone" placeholder="ادخل رقم الهاتف">
                        </div>

                        <div class="form-group col-4">
                            <label for="inputPasswosd3" class="font-wieght-bold control-label">الصورة</label>
                            <img :src="image" alt="صورة" class="img-fluid">
                            <input type="file" accept="image/*" name="img" class="form-control" id="inputPasswosd3" @change="get_image($event)">
                        </div>
                        
                        <div class="form-group col-4">
                            <label for="inputEmai3" class="font-wieght-bold control-label">معلومات عن المدرب</label>
                            <textarea type="email" class="form-control" id="inputEmai3" v-model.lazy="info"></textarea>
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
                id: this.$store.state.AdminPanel.trainer[0],
                name: this.$store.state.AdminPanel.trainer[1],
                email: this.$store.state.AdminPanel.trainer[2],
                phone: this.$store.state.AdminPanel.trainer[3],
                image: this.$store.state.AdminPanel.trainer[4],
                info: this.$store.state.AdminPanel.trainer[5],
            }
        },

        methods: {
            get_image(e) {

                this.image = e.target.files[0]

            },
            update_user() {
                 let art = new FormData();
                 art.append('id', this.id);
                 art.append('image', this.image);
                 art.append('name', this.name);
                 art.append('email', this.email);
                 art.append('phone', this.phone);
                 art.append('info', this.info);

                // Send the request
                axios.post(`api/updateTrainer`, art,  {
                        headers: {
                            Accept: 'application/json',
                            Authorization: 'Bearer ' + this.$store.state.user.token
                        },

                    })
                    .then(res => {
                        // Todo
                        if (res.data == 'success') {
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
            console.log('lol', this.$store.state.AdminPanel.trainer[0])
        }
    }

</script>

<style scoped>
    .box {
        direction: rtl;
        text-align: right;
    }

</style>
