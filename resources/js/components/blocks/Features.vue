<template>
    <div class="my-5" id="feats">
        <div class="container">
            <p class="h1">خدماتنا</p>
            <hr />

            <div v-if="is_here > 4">
                <div class="owl-carousel">
                    <div
                        class="p-5 k"
                        @click="get_id(index)"
                        :key="index"
                        v-for="(feat , index) in all_feats"
                    >
                        <div class="feat">
                            <img
                                class="mb-2"
                                :src="feat.image"
                                width="56px"
                                style="width: 56px !important; height: 56px !important"
                                height="56px"
                            />
                            <p class="h4">{{ feat.title }}</p>
                            <hr />
                            <p>{{ feat.text }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" v-if="is_here <= 4">
                <div
                    class="col-md-6 col-lg-3 p-5 k"
                    @click="get_id(index)"
                    :key="index"
                    v-for="(feat , index) in all_feats"
                >
                    <div class="feat">
                        <img class="mb-2" :src="feat.image" width="56" height="56" />
                        <p class="h4">{{ feat.title }}</p>
                        <hr />
                        <p>{{ feat.text }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Axios from "axios";
export default {
    data() {
        return {
            
        };
    },
    methods: {
        get_id(index) {
            let element = this.all_feats.find(el => el.id == index + 1);
            console.log(element);
        }
    },
    computed:{
        is_here(){
            return this.$store.getters.feats_num;
        },
        all_feats(){
            return this.$store.state.feats
        }
    },
    mounted() {
        Axios.get("api/getFeatures")
            .then(res => {
                this.$store.commit("got_feats", res.data.data)
            })
            .catch(err => {
                console.log(err);
            });
            console.log(this.is_here);

            
            $('.owl-carousel').owlCarousel({
                rtl: true,
                center:true,
                animateOut: 'fadeOut',
                loop: false,
                margin: 10,
                autoplay: false,
                nav: false,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    600: {
                        items: 2,
                        loop: true
                    },
                    1000: {
                        items: 2,
                        loop: true,
                    }
                }
            })
        }
    }
</script>

<style lang="scss" scoped>
#feats {
    text-align: right;
    direction: rtl;

    .k:nth-child(even) {
        background-color: #eee !important;
    }
    .feat {
        text-align: right;
    }
}
</style>
