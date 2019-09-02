<template>
  <div id="article" class="py-5">
    <Navabr3 />

    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-12">
          <div class="img">
            <img :src="article[0].image" width="100%" height="400px" alt class="img-fliud" />
          </div>
          <br />
          <h1>{{ article[0].title }}</h1>

          <div class="article-body"></div>
        </div>

        <div class="col-md-4 col-sm-12 p-5">
            <div class="caty">
                <div class="actions">
                    
                </div>
            </div>
        </div>

      </div>
    </div>

    <Footer3 />
  </div>
</template>

<script>
import Navabr3 from "../blocks/Nav";
import Footer3 from "../blocks/Footer";

export default {
  data() {
    return {
      id: this.$route.params.id
    };
  },
  computed: {
    article() {
      return this.$store.getters.article(this.id);
    }
  },
  mounted() {
    console.log(this.article);

    $(".article-body").html(this.article[0].longDescription);
  },
  components: {
    Navabr3,
    Footer3
  }
};
</script>

<style lang="scss" scoped>

.caty{
    border: 1px solid rgb(167, 131, 131);
    border-radius: 40px;
}

#article {
  direction: rtl;
  text-align: right;
}

.container {
  margin-top: 30px;
}
.article-body {
  margin-top: 30px;
  line-height: 1.6;
}
</style>
