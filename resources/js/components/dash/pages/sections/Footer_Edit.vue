<template>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <realFooter></realFooter>
        <p class="h1">Footer</p>
        <div class="row">
          <div class="input col-12">
            <label for="text" class="my-2">Who are we</label>
            <div class="input-group">
              <input
                type="text"
                id="text"
                class="form-control"
                v-model="footer.we"
                placeholder="Who are we"
              />
            </div>
          </div>
        </div>

        <div class="row">
          <div class="input col-sm-12 col-md-3">
            <label for="text" class="my-2">section | one</label>
            <div class="input-group">
              <input
                type="text"
                id="text"
                class="form-control"
                v-model="footer.sections.one"
                placeholder="Who are we"
              />
            </div>
          </div>
          <div class="input col-sm-12 col-md-3">
            <label for="text" class="my-2">section | two</label>
            <div class="input-group">
              <input
                type="text"
                id="text"
                class="form-control"
                v-model="footer.sections.two"
                placeholder="Who are we"
              />
            </div>
          </div>
          <div class="input col-sm-12 col-md-3">
            <label for="text" class="my-2">section | three</label>
            <div class="input-group">
              <input
                type="text"
                id="text"
                class="form-control"
                v-model="footer.sections.three"
                placeholder="Who are we"
              />
            </div>
          </div>
          <div class="input col-sm-12 col-md-3">
            <label for="text" class="my-2">section | four</label>
            <div class="input-group">
              <input
                type="text"
                id="text"
                class="form-control"
                v-model="footer.sections.four"
                placeholder="Who are we"
              />
            </div>
          </div>
        </div>

        <div class="row">
          <div class="input col-12">
            <label for="info" class="my-2">Info</label>
            <div class="input-group">
              <input
                type="text"
                id="info"
                class="form-control"
                v-model="footer.info"
                placeholder="Info"
              />
            </div>
          </div>
        </div>

        <div class="row">
          <div class="input col-sm-12 col-md-4">
            <label for="adress" class="my-2">Contact us | Adress</label>
            <div class="input-group">
              <input
                type="text"
                id="adress"
                class="form-control"
                v-model="footer.address"
                placeholder="Adress"
              />
            </div>
          </div>

          <div class="input col-sm-12 col-md-4">
            <label for="number" class="my-2">Contact us | number</label>
            <div class="input-group">
              <input
                type="tel"
                id="number"
                class="form-control"
                v-model="footer.Phone"
                placeholder="Phone number"
              />
            </div>
          </div>

          <div class="input col-sm-12 col-md-4">
            <label for="fax" class="my-2">Contact us | Fax</label>
            <div class="input-group">
              <input
                type="text"
                id="fax"
                class="form-control"
                v-model="footer.fax"
                placeholder="Fax"
              />
            </div>
          </div>
        </div>

        <div class="row">
          <div class="input col-sm-12 col-md-3">
            <label for="facebook" class="my-2">Facebook</label>
            <div class="input-group">
              <input
                type="text"
                id="facebook"
                class="form-control"
                v-model="footer.facebook"
                placeholder="Facebook"
              />
            </div>
          </div>
          <div class="input col-sm-12 col-md-3">
            <label for="google" class="my-2">Google</label>
            <div class="input-group">
              <input
                type="text"
                id="google"
                class="form-control"
                v-model="footer.google"
                placeholder="Google"
              />
            </div>
          </div>
          <div class="input col-sm-12 col-md-3">
            <label for="linkedIn" class="my-2">LinkedIn</label>
            <div class="input-group">
              <input
                type="text"
                id="linkedIn"
                class="form-control"
                v-model="footer.linkedIn"
                placeholder="LinkedIn"
              />
            </div>
          </div>
          <div class="input col-sm-12 col-md-3">
            <label for="twitter" class="my-2">Twitter</label>
            <div class="input-group">
              <input
                type="text"
                id="twitter"
                class="form-control"
                v-model="footer.twitter"
                placeholder="Twitter"
              />
            </div>
          </div>
        </div>
      </div>

      <div class="col-4 my-4">
        <button class="btn btn-primary btn-block btn-flat" @click="send" role="button">Done</button>
      </div>
    </div>
  </div>
</template>

<script>
import Axios from "axios";
import realFooter from "../../../blocks/Footer";

export default {
  data() {
    return {
      footer: {
        Phone: null,
        address: null,
        created_at: null,
        facebook: null,
        fax: null,
        google: null,
        id: null,
        info: null,
        linkedIn: null,
        twitter: null,
        we: null,
        sections: {
            one: null,
            two: null,
            three: null,
            four: null,
        }
      }
    };
  },
  components: {
    realFooter
  },
  methods: {
    send() {
      let foot = new FormData();
      foot.append("we", this.footer.we);
      foot.append("info", this.footer.info);
      foot.append("address", this.footer.address);
      foot.append("Phone", this.footer.Phone);
      foot.append("fax", this.footer.fax);
      foot.append("info", this.footer.info);
      foot.append("facebook", this.footer.facebook);
      foot.append("google", this.footer.google);
      foot.append("linkedIn", this.footer.linkedIn);
      foot.append("twitter", this.footer.twitter);
      // ========================= HERE ==========================
      foot.append("one", this.footer.sections.one);
      foot.append("two", this.footer.sections.two);
      foot.append("three", this.footer.sections.three);
      foot.append("four", this.footer.sections.four);

      const config = {
        headers: {
          "content-type": "multipart/form-data",
          Accept: "application/json",
          Authorization: "Bearer " + this.$store.state.user.token
        }
      };
      Axios.post("api/storeFooter", foot, config)
        .then(res => {
          Swal.fire({
            title: "you Edited Footer",
            text: res.data.message,
            type: "success",
            confirmButtonText: "Cool!"
          });

          Axios.get("api/getFooter")
            .then(res => {
              this.$store.commit("Edit_Footer", res.data.data[0]);
              Object.assign(this.footer, this.$store.state.sections.footer);
            })
            .catch(err => console.log(err));
        })
        .catch(err =>
          console.log(err => {
            Swal.fire({
              title: "Proplem ",
              text: err.message,
              type: "error",
              confirmButtonText: "ok!"
            });
          })
        );
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
    Axios.get("api/getFooter")
      .then(res => Object.assign(this.footer, res.data.data[0]))
      .catch(err => console.log(err));
  }
};
</script>
