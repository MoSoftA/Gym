<template>
  <div id="news" class="py-5">
    <Nav2></Nav2>
    <div
      class="jumbotron mt-5"
      :style="{ backgroundColor: color.background_color, color: color.font_color }"
    >
      <div class="container">
        <h1 class="display-4 text-right">المقالات</h1>
      </div>
    </div>
    <div class="container">
      <transition name="fade" mode="out-in">

        <ul class="row">
          <li class="listItem col-sm-12 col-md-3" :key="article.id" v-for="article in view_article">
            <div class="border-white">
              <div class="card">
                <img class="card-img-top" :src="article.image" alt="Card image cap" />
                <div class="card-body">
                  <h5 class="card-title">{{ article.title }}</h5>
                  <p class="card-text">{{ article.shortDescription }}</p>
                  <router-link :to="'/articles/'+article.id" class="btn btn-success">اقرأ المزيد</router-link>
                </div>
              </div>
            </div>
          </li>
        </ul>

      </transition>

      <div>
        <div class="row">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item" :class="{disabled: current_page == 0}">
                <a class="page-link" role="button" @click="go_back">Previous</a>
              </li>
              <li
                class="page-item"
                :class="{active: index == current_page}"
                :key="index"
                v-for="(pages , index) in this.page_counter"
              >
                <a class="page-link"  role="button" @click="go_to(index)" >{{ index + 1 }}</a>
              </li>

              <li class="page-item" :class="{disabled: current_page == page_counter-1}" >
                <a class="page-link"  role="button" @click="go_forward">Next</a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <Footer2></Footer2>
  </div>
</template>

<script>
import Nav2 from "../blocks/Nav";
import Footer2 from "../blocks/Footer";
import Axios from "axios";

export default {
  data() {
    return {
      all_articles: null,
      articles: null,
      current_page: 0,

      first_page: 0
    };
  },
  components: {
    Nav2,
    Footer2
  },
  methods: {
    go_back(){
      this.current_page -= 1;
    },
    go_to(index){
      this.current_page = index;
    },
    go_forward(){
      this.current_page += 1;
    }
  },
  computed: {
    page_counter() {
      return Math.round(this.all_articles.length / 8);
    },
    get_articles() {
      return this.$store.state.articles;
    },

    color() {
      return this.$store.state.sections.navbar;
    },
    view_article() {
      let last_article = 8 * (this.current_page);

      return this.get_articles.slice(last_article, last_article + 8);
    }
  },
  beforeMount() {
    Axios.get("api/articles", {
      headers: {
        Accept: "application/json",
        Authorization: "Bearer " + this.$store.state.user.token
      }
    })
      .then(res => {
        console.log(res.data.data);
        this.$store.commit("got_articles", res.data.data);
        this.all_articles = res.data.data;
      })
      .catch(err => err.message);
  }
};
</script>

<style lang="scss" scoped>
#news {
  text-align: right;
}

.fade-enter-active,
.fade-leave-active {
  transition-duration: 0.3s;
  transition-property: opacity;
  transition-timing-function: ease;
}

.fade-enter,
.fade-leave-active {
  opacity: 0
}

.jumbotron {
  background-color: rgb(242, 58, 46);
  color: white;
}

ul {
  list-style: none;
}
.page-item .page-link{
  border-radius: 0
}

footer {
  margin-top: 130px;
}
</style>
