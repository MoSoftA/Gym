<template>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <realNav v-if="preview"></realNav>
        <p class="h1 mt-5">NAVBAR</p>

        <div class="form-group col-4 mb-3">
            <label class="font-wieght-bold control-label" for="inputGroupSelect01">choose</label>
            <br>
            <label for="one">text logo</label>
            <input type="radio" id="one" value="0" v-model="picked" name="thi">
            <label for="two">image logo</label>
            <input type="radio" id="two" value="1" v-model="picked" name="thi">
        </div>

        <div class="row">
          <div class="input col-6 col-sm-12" v-if="picked==0">
            <label for="text">Company Name</label>
            <div class="input-group">
              <input
                
                type="text"
                id="text"
                class="form-control"
                v-model="navbar.name"
                placeholder="Company Name"
              />
            </div>
          </div>

          <div class="input col-6 col-sm-12" v-if="picked==1">
            <label for="image" >Company logo</label>
            <div class="input-group">
              <input
                
                type="file"
                id="image"
                class="form-control"
                @change="get_image($event)"
                placeholder="Company logo"
              />
            </div>
          </div>

          <div class="input col-md-4 col-sm-10 mx-sm-auto mx-md-0 col-lg-2 mt-3">
            <label for="bgc">Background color</label>
            <div class="input-group">
              <input type="color" id="bgc" class="form-control" v-model="navbar.background_color" />
            </div>
          </div>

          <div class="input col-md-4 col-sm-10 mx-sm-auto mx-md-0 col-lg-2 mt-3">
            <label for="fc">Font color</label>
            <div class="input-group">
              <input type="color" id="fc" class="form-control" v-model="navbar.font_color" />
            </div>
          </div>

          <div class="input col-md-4 col-sm-10 mx-sm-auto mx-md-0 col-lg-2 mt-3">
            <label for="bgc">log in background</label>
            <div class="input-group">
              <input type="color" id="bgc" class="form-control" v-model="navbar.button_background" />
            </div>
          </div>

          <div class="input col-md-4 col-sm-10 mx-sm-auto mx-md-0 col-lg-2 mt-3">
            <label for="bf">log in font color</label>
            <div class="input-group">
              <input type="color" id="bf" class="form-control" v-model="navbar.button_font_color" />
            </div>
          </div>

          <div class="input col-md-4 col-sm-10 mx-sm-auto mx-md-0 col-lg-2 mt-3">
            <label for="bf">log out font color</label>
            <div class="input-group">
              <input type="color" id="bf" class="form-control" v-model="navbar.sec_button_background" />
            </div>
          </div>

          <div class="input col-md-4 col-sm-10 mx-sm-auto mx-md-0 col-lg-2 mt-3">
            <label for="bf">log out bgc color</label>
            <div class="input-group">
              <input type="color" id="bf" class="form-control" v-model="navbar.sec_button_font_color" />
            </div>
          </div>

          <div class="col-4 mx-2 my-4">
            <button
              class="btn btn-primary btn-block btn-flat"
              @click=" preview = !preview"
              role="button"
            >preview</button>
          </div>
          <div class="col-4 mx-2 my-4">
            <button class="btn btn-primary btn-block btn-flat" @click="send" role="button">Done</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Axios from "axios";
import realNav from "../../../blocks/Nav";
export default {
  data() {
    return {
        preview: false,
        picked: '',
      navbar: {
        background_color: null,
        button_background: null,
        button_font_color: null,
        sec_button_background: null,
        sec_button_font_color: null,
        font_color: null,
        name: null,
        logo: null
      }
    };
  },
  components: {
    realNav
  },
  methods: {
    get_image(e) {
      this.navbar.logo = e.target.files[0];
    },
    send() {
      let vm = this;

      let Nav = new FormData();
      Nav.append("name", this.navbar.name);
      Nav.append("background_color", this.navbar.background_color);
      Nav.append("font_color", this.navbar.font_color);
      Nav.append("button_background", this.navbar.button_background);
      Nav.append("button_font_color", this.navbar.button_font_color);
        // HERE ============================================<<>>+++ HERE=====

      Nav.append("sec_button_background", this.navbar.sec_button_background);
      Nav.append("sec_button_font_color", this.navbar.sec_button_font_color);

      Nav.append("img", this.navbar.logo);

      const config = {
        headers: {
          "content-type": "multipart/form-data",
          Accept: "application/json",
          Authorization: "Bearer " + this.$store.state.user.token
        }
      };
      Axios.post("api/storeNavbar", Nav, config)
        .then(res => {
          this.$store.commit("Edit_Navbar", this.navbar);
        console.log(res.data.data);
          Swal.fire({
            title: "you Edited Navbar",
            text: res.data.message,
            type: "success",
            confirmButtonText: "Cool!"
          });
        })
        .catch(err => {
          Swal.fire({
            title: "Proplem ",  
            text: err.message,
            type: "error",
            confirmButtonText: "ok!"
          });
        });
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
    Axios.get("api/getNavbar")
      .then(res => Object.assign(this.navbar, res.data.data))
      .catch(err => console.log(err));
  }
};
</script>
