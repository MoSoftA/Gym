<template>
<div class="mt-5" id="featClass">
<div class="container">
    <p class="h1">أخر الأخبار</p>
    <hr/>
    <div class="owl-carousel owl-theme">
    
    <div class="item" :key="index" v-for="(article, index) in articles">
        <div class="card"><img class="card-img-top" :src="article.img"/>
        <div class="card-body border">
            <h5 class="card-title">{{ article.title  }}</h5>
            <hr>
            <p class="card-text">{{ article.info }}</p><i class="fas fa-user"></i><span class="mr-2"> محمد أيمن - مصر</span>
        </div>
        </div>
    </div>
    
    
    </div>
</div>
</div>
</template>

<style lang="scss" scoped>
#featClass{

    p.h1{
        padding:0;
    }
    text-align: right;

    .card{
        transition:all 0.4s ease;

        border-radius: 0;
        background-color: #fff;

        &:hover{
            cursor: pointer;
            box-shadow: 0 5px 20px -7px rgba(0,0,0,.9)!important;
        }
    }
}

</style>

<script>
export default {
    computed:{
        articles(){
            return this.$store.state.articles
        }
    }
}
</script>
