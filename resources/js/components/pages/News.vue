<template>
    <div id="news">
        <Nav2></Nav2>
        <div class="jumbotron mt-5 p0">
            <div class="container">
                <h1 class="display-6 text-right">المقالات</h1>
            </div>
        </div>
        <div class="container">

            <ul class="paginationList row">
                <!-- <div class="row"> -->

                <li class="listItem col-sm-12 col-md-3" :key="article.id" v-for="article in get_articles">
                    <div class="border-white ">
                        <div class="card">
                            <img class="card-img-top" :src="article.img" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ article.id }}</h5>
                                <p class="card-text">{{ article.info }}</p>
                                <router-link :to="'/articles/'+article.id" class="btn btn-success">اقرأ المزيد
                                </router-link>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- </div> -->
            </ul>
            <div id="pagination-container">
                <p class='paginacaoCursor' id="beforePagination">السابق</p>
                <p class='paginacaoCursor' id="afterPagination"> التالي</p>
            </div>
        </div>
        <Footer2></Footer2>
    </div>
</template>

<script>
    import Nav2 from "../blocks/Nav";
    import Footer2 from "../blocks/Footer";

    export default {
        data() {
            return {
                link: '',

                allArticles: null
            }
        },
        methods: {

        },
        components: {
            Nav2,
            Footer2
        },
        computed: {
            get_articles() {
                return this.$store.state.articles
            }
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

</style>
