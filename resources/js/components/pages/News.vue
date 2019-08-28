<template>
    <div id="news" class="py-5">
        <Nav2></Nav2>
        <div class="jumbotron mt-5" :style="{ backgroundColor: color.background_color, color: color.font_color }">
            <div class="container">
                <h1 class="display-4 text-right">المقالات</h1>
            </div>
        </div>
        <div class="container">

            <ul class="paginationList row">

                <li class="listItem col-sm-12 col-md-3" :key="article.id" v-for="article in articles">
                    <div class="border-white ">
                        <div class="card">
                            <img class="card-img-top" :src="article.image" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ article.title }}</h5>
                                <p class="card-text">{{ article.shortDescription }}</p>
                                <router-link :to="'/articles/'+article.id" class="btn btn-success">اقرأ المزيد
                                </router-link>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

        </div>
        <Footer2></Footer2>
    </div>
</template>

<script>
    import Nav2 from "../blocks/Nav";
    import Footer2 from "../blocks/Footer";
    import Axios from 'axios';

    export default {
        data(){
            return{
                articles: null
            }
        },
        components: {
            Nav2,
            Footer2
        },
        computed: {
            get_articles() {
                return this.$store.state.articles
            },color(){
            return this.$store.state.sections.navbar
        }
        },
        mounted(){
            Axios.get('api/articles',{
                headers: {
                    Accept: 'application/json',
                    Authorization: 'Bearer '+ this.$store.state.user.token
                },
            })
            .then(res => {
                this.articles = res.data.data;
                this.$store.commit('got_articles', res.data.data);
              
            }).catch(err => err.message);
        }
    }

</script>

<style lang="scss" scoped>
    #news {
        text-align: right
    }

    .jumbotron {
        background-color: rgb(242, 58, 46);
        color: white;
    }

    ul {
        list-style: none;
    }

    .paginacaoCursor {
        position: relative;
        display: block;
        padding: .5rem .75rem;
        margin-left: -1px;
        line-height: 1.25;
        color: #007bff;
        background-color: #fff;
        border: 1px solid #dee2e6;
    }

    #pagination-container {
        float: right;

        * {
            float: right;
        }
    }
    footer{
        margin-top: 130px;
    }

</style>
