<template>
  <div class="bd-example">
    <div class="carousel slide" id="carouselExampleCaptions" data-ride="carousel">
      <div class="carousel-inner">
        <div class="bd-example">
          <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li
                data-target="#carouselExampleCaptions"
                :data-slide-to="index"
                :key="index"
                v-for="(slider, index) in list"
              ></li>
            </ol>
            <div class="carousel-inner">
              <div
                class="carousel-item active"
                :style="{backgroundImage: `url(${list[0].image})`, backgroundPosition: 'center center', } "
              >
                <div class="carousel-caption d-none d-md-block">
                  <h5>{{list[0].text}}</h5>
                </div>
              </div>
              <div
                class="carousel-item"
                :key="index"
                v-for="(item, index) in list.slice(1)"
                :style="{backgroundImage: `url(${item.image})`, backgroundPosition: 'center center', }"
              >
                <div class="carousel-caption d-none d-md-block">
                  <h5>{{item.text}}</h5>
                </div>
              </div>
            </div>
            <a
              class="carousel-control-prev"
              href="#carouselExampleCaptions"
              role="button"
              data-slide="prev"
            >
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a
              class="carousel-control-next"
              href="#carouselExampleCaptions"
              role="button"
              data-slide="next"
            >
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
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
      list: [],
      config: {
        headers: {
          "content-type": "multipart/form-data",
          Accept: "application/json",
          Authorization: "Bearer " + this.$store.state.user.token
        }
      }
    };
  },
  beforeMount() {
    Axios.get("api/getSlider", this.config)
      .then(res => {
        this.list = res.data.data;
        console.log(res)
      })
      .catch(err => console.log(err));
  }
};
</script>
<style lang="scss" scoped>
.bd-example {
  .carousel-inner {
    .carousel-item {
      height: 100vh !important;
      background-position: center center;
      background-size: cover;
      background-attachment: fixed;

      .carousel-caption {
        padding: 0;
        position: absolute;
        top: 40%;
        left: 50%;
        text-align: center !important;
        font-size: 30px;
        transform: translate(-50%, -50%);

        h5 {
          font-weight: bolder;
          font-size: 50px;
        }
      }
    }
  }

  .carousel-control-next,
  .carousel-control-prev {
    width: 50px;
    height: 50px;
    position: absolute;
    top: 50%;
    background-color: rgba(0, 0, 0, 0.8);

    &:hover {
      background-color: #000;
    }
  }
}

@media (max-width: 576px) {
  .bd-example {
    .carousel-inner {
      .carousel-item {
        .carousel-caption {
          p.h1 {
            font-weight: bolder;
            font-size: 60px !important;
          }
        }
      }
    }
  }
}
</style>
