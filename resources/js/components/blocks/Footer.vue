<template>
    <footer class="page-footer">
        <div class="container text-center text-md-right mt-5">
            <div class="row mt-3">
                <div class="col-md-6 col-lg-4 col-xl-3 mx-auto mb-4">
                    <h6 class="font-weight-bold mb-4">من نحن</h6>
                    <p> {{ footer.we }} </p>
                </div>
                <div class="col-md-6 pr-md-5 col-lg-3 col-xl-2 mx-auto mb-4 font-weight-bold">
                    <h6 class="mb-4 font-weight-bold">أقسام الموقع</h6><a class="d-block my-4" href="#!">مميزاتنا</a><a
                        class="d-block my-4" href="#!">معلومات عن مركزنا</a><a class="d-block my-4" href="#!">خدماتنا
                        المستقبلية</a><a class="d-block my-4" href="#!">مدربينا الخبراء</a>
                </div>
                <div class="col-md-6 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="font-weight-bold mb-4">معلومات التواصل</h6>
                    <p> {{ footer.address }} </p>
                    <div class="social mx-auto">
                        <h6 class="font-weight-bold mb-4">مواقع التواصل</h6>
                        <a class="fb-ic" :href="footer.facebook">
                            <i class="fab fa-facebook-f ml-4 ml-lg-3"> </i>
                        </a>
                        <a class="tw-ic" :href="footer.twitter">
                            <i class="fab fa-twitter ml-4 ml-lg-3"> </i>
                        </a>
                        <a class="gplus-ic" :href="footer.google">
                            <i class="fab fa-google-plus-g ml-4 ml-lg-3"></i>
                        </a>
                        <a class="li-ic" :href="footer.linkedIn">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 pr-md-5 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h6 class="font-weight-bold mb-4">تواصل معنا</h6>
                    <p><i class="fas fa-home mr-3"></i> {{ footer.address }}</p>
                    <p><i class="fas fa-envelope mr-3"></i> {{ footer.google }}</p>
                    <p><i class="fas fa-phone mr-3"></i> {{ footer.Phone }}</p>
                    <p><i class="fas fa-print mr-3"></i> {{ footer.fax }}</p>
                </div>
            </div>
        </div>
    </footer>
</template>

<script>
    import Axios from 'axios';
    export default {
        computed: {
            footer() {
                return this.$store.state.sections.footer
            }
        },
        mounted() {
            Axios.get('api/getFooter').then(
                res => {

                    this.$store.commit('Edit_Footer', res.data.data[0])
                }
            ).catch(err => console.log(err))
        }
    }

</script>

<style lang="scss" scoped>
    $main-red: rgb(242, 58, 46);

    h6 {
        color: $main-red;
    }

    a {
        color: black;

        &:hover {
            text-decoration: none;
        }
    }

    i {
        cursor: pointer;
    }

</style>
