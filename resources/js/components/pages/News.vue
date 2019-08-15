<template>
    <div id="news">
        <Nav2></Nav2>
        <div class="jumbotron mt-5 py-0">
            <div class="container">
                <h1 class="display-6 text-right">المقالات</h1>
            </div>
        </div>
        <div class="container">

            <ul class="paginationList row">

                <li class="listItem col-sm-12 col-md-3" :key="article.id" v-for="article in articles">
                    <div class="border-white ">
                        <div class="card">
                            <img class="card-img-top" :src="article.img" alt="Card image cap">
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
import Axios from 'axios';

    export default {
        data(){
            return{
                articles: null
            }
        },
        mounted(){
            $(document).ready(function(){

            var HZperPage = 4,//number of results per page
                HZwrapper = 'paginationList',//wrapper class
                HZlines   = 'listItem',//items class
                HZpaginationId ='pagination-container',//id of pagination container
                HZpaginationArrowsClass = 'paginacaoCursor',//set the class of pagi
                HZpaginationColorDefault =  'white',//default color for the pagination numbers
                HZpaginationColorActive = 'black', //color when page is clicked
                HZpaginationCustomClass = 'page-link'; //custom class for styling the pagination (css)

            /*-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
            function paginationShow(){if($("#"+HZpaginationId).children().length>8){var a=$(".activePagination").attr("data-valor");if(a>=4){var i=parseInt(a)-3,o=parseInt(a)+2;$(".paginacaoValor").hide(),exibir2=$(".paginacaoValor").slice(i,o).show()}else $(".paginacaoValor").hide(),exibir2=$(".paginacaoValor").slice(0,5).show()}}paginationShow(),$("#beforePagination").hide(),$("."+HZlines).hide();for(var tamanhotabela=$("."+HZwrapper).children().length,porPagina=HZperPage,paginas=Math.ceil(tamanhotabela/porPagina),i=1;i<=paginas;)$("#"+HZpaginationId).append("<p class='paginacaoValor "+HZpaginationCustomClass+"' data-valor="+i+">"+i+"</p>"),i++,$(".paginacaoValor").hide(),exibir2=$(".paginacaoValor").slice(0,5).show();$(".paginacaoValor:eq(0)").css("background",""+HZpaginationColorActive).addClass("activePagination");var exibir=$("."+HZlines).slice(0,porPagina).show();$(".paginacaoValor").on("click",function(){$(".paginacaoValor").css("background",""+HZpaginationColorDefault).removeClass("activePagination"),$(this).css("background",""+HZpaginationColorActive).addClass("activePagination");var a=$(this).attr("data-valor"),i=a*porPagina,o=i-porPagina;$("."+HZlines).hide(),exibir=$("."+HZlines).slice(o,i).show(),"1"===a?$("#beforePagination").hide():$("#beforePagination").show(),a===""+$(".paginacaoValor:last").attr("data-valor")?$("#afterPagination").hide():$("#afterPagination").show(),paginationShow()}),$(".paginacaoValor").last().after($("#afterPagination")),$("#beforePagination").on("click",function(){var a=$(".activePagination").attr("data-valor"),i=parseInt(a)-1;$("[data-valor="+i+"]").click(),paginationShow()}),$("#afterPagination").on("click",function(){var a=$(".activePagination").attr("data-valor"),i=parseInt(a)+1;$("[data-valor="+i+"]").click(),paginationShow()}),$(".paginacaoValor").css("float","left"),$("."+HZpaginationArrowsClass).css("float","left");
        })
        },
        components: {
            Nav2,
            Footer2
        },
        computed: {
            get_articles() {
                return this.$store.state.articles
            }
        },
        beforeCreate(){
            Axios.get('api/articles',{
                headers: {
                    Accept: 'application/json',
                    Authorization: 'Bearer '+ this.$store.state.user.token
                },
            })
            .then(res => {
                this.articles = res.data.data;
                this.$store.commit('got_articles', res.data.data);

                console.log(res.data.data[0]);                
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
