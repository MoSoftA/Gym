<template>
  <div class="container">
    <div class="bd-example col-12" v-if="preview ">
      <div class="carousel slide" id="carouselExampleCaptions" data-ride="carousel">
        <div class="carousel-inner">
          <div class="bd-example">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li
                  data-target="#carouselExampleCaptions"
                  :data-slide-to="index"
                  :key="index"
                  v-for="(slider, index) in sliders"
                ></li>
              </ol>
              <div class="carousel-inner">
                <div
                  class="carousel-item active"
                  :style="{backgroundImage: 'url('+sliders[0].image+')', backgroundPosition: 'center center', } "
                >
                  <div class="carousel-caption d-md-block">
                    <h5>{{sliders[0].text}}</h5>

                    <button
                      class="btn btn-danger btn-block btn-flat"
                      data-toggle="modal"
                      data-target="#exampleModalCenter"
                      @click="get_slider(sliders[0].id)"
                      role="button"
                    >Delete this slider</button>

                  </div>
                </div>
                <div
                  class="carousel-item"
                  :key="index"
                  v-for="(item, index) in sliders.slice(1)"
                  :style="{backgroundImage: 'url('+item.image+')', backgroundPosition: 'center center', }"
                >
                  <div class="carousel-caption d-none d-md-block">
                    <h5>{{item.text}}</h5>

                    <button
                      class="btn btn-danger btn-block btn-flat"
                      data-toggle="modal"
                      data-target="#exampleModalCenter"
                      @click="get_slider(item.id)"
                      role="button"
                    >Delete this slider</button>
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
    <div class="card">
      <div class="card-body row">
        <p class="h1 mt-5">SLider Edit</p>

        <div class="input col-sm-12 mt-4">
          <label for="image">image</label>
          <div class="input-group">
            <input type="file" id="image" class="form-control" @change="get_image($event)" />
          </div>
        </div>

        <div class="input col-md-4 col-sm-10 mx-sm-auto mx-md-0 col-lg-12 mt-3">
          <label for="bgc">Image title</label>
          <div class="input-group">
            <input
              type="text"
              id="text"
              class="form-control"
              placeholder="Image title"
              autocomplete="off"
              v-model="text"
            />
          </div>
        </div>

        <div class="col-4 mx-2 my-4">
          <button
            class="btn btn-primary btn-block btn-flat"
            @click="preview = !preview"
            role="button"
          >preview</button>
        </div>
        <div class="col-4 mx-2 my-4">
          <button class="btn btn-primary btn-block btn-flat" @click="send" role="button">Done</button>
        </div>
      </div>
    </div>

      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
          aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">

                  <div class="modal-body">
                      <p class="h2">Are you sure you wanna delete this user?</p>
                      <button class="btn btn-warning btn-flat my-4 mx-auto" data-dismiss="modal" type="button"
                          id="button-addon2" @click="delsete">Just Do It</button>
                      <button type="button" class="btn btn-primary btn-flat my-4 mx-auto" data-dismiss="modal">cancel</button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</template>

<style lang="scss" scoped>
.bd-example {
  height: 400px !important;
  * {
    height: 400px !important;
  }
  h5{
    height: 60px !important
  }
  button{
    height: 60px !important
  } 

  .carousel-caption {
    top: 50%;
    }

  .carousel-indicators,
  .carousel-indicators * {
    height: 5px !important;
  }
}

.carousel-item.active {
  border: 2px solid #000;
}
</style>

<script>
import Axios from "axios";
import realCarousel from "../../../blocks/Carousel";

export default {
  data() {
    return {
      sliders: [],
      preview: false,
      img: "",
      text: "",
      id: null
    };
  },
  methods: {
    get_image(e) {
      this.img = e.target.files[0];
    },
    send() {
      let slider = new FormData();
      slider.append("text", this.text);
      slider.append("image", this.img);

      const config = {
        headers: {
          "content-type": "multipart/form-data",
          Accept: "application/json",
          Authorization: "Bearer " + this.$store.state.user.token
        }
      };
      Axios.post("api/storeSlider", slider, config)
        .then(res => {
          Axios.get("api/getSlider", config)
            .then(res => {
              this.sliders = res.data.data;
              console.log(this.sliders);
            })
            .catch(err => console.log(err));
        })        .catch(err => console.log(err));


          Swal.fire({
            title: "you Added Slider",
            text: res.data.message,
            type: "success",
            confirmButtonText: "Cool!"
          });

    },

    delsete() {

      const config = {
        headers: {
          "content-type": "multipart/form-data",
          Accept: "application/json",
          Authorization: "Bearer " + this.$store.state.user.token
        }
      };
      Axios.delete(`api/deleteSlider/${this.id}`, config)
        .then(
          Axios.get("api/getSlider", config)
            .then(res => {
              this.sliders = res.data.data;

              console.log(this.sliders);
            })
            .catch(err => console.log(err))
        )
        .catch(err => console.log(err));
    }
  },
  mounted() {
    const config = {
      headers: {
        "content-type": "multipart/form-data",
        Accept: "application/json",
        Authorization: "Bearer " + this.$store.state.user.token
      }
    };
    Axios.get("api/getSlider", config)
      .then(res => {
        res.data.data.forEach(slider => {
          this.sliders.push(slider);
        });
        console.log(this.sliders);
      })
      .catch(err => console.log(err));
  }
};
</script>
