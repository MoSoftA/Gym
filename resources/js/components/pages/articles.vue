<template>
    <div id="article">
        <Navabr3/>
            
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        
                        <div class="img"><img :src="article[0].img" width="100%" height="200px" alt="" class="img-fliud"></div>

                        <h1>
                            {{ article[0].title }} 
                        </h1>

                        <div class="article-body">
                        </div>
                    </div>

                </div>
            </div>

        <Footer3/>
    </div>
</template>

<script>
import Navabr3 from "../blocks/Nav";
import Footer3 from "../blocks/Footer";

export default {
    data(){
        return {
            id: this.$route.params.id
        }
    },
    computed:{
        article(){
            return this.$store.getters.article(this.id)
        }
    },
    mounted(){
        console.log(this.article.body);

        $('.article-body').html(this.article[0].body)
    },
    components:{
        Navabr3,
        Footer3
    }
}
</script>

<style>
    #article{
        direction: rtl;
        text-align: right;
    }

    .container{
        margin-top: 30px
    }
    .article-body{
        margin-top: 30px;
        line-height: 1.6;
    }
</style>
