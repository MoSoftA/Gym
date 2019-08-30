<template>
  <div id="navbar">
    <nav
      class="navbar navbar-expand-lg navbar-dark"
      :style="{backgroundColor: Navbar.background_color}"
    >
      <div class="container" style="margin-top: 0">
        <a
          class="navbar-brand"
          href="#"
          v-if='(Navbar.logo==null || Navbar.logo=="") && Navbar.name'
        >{{ Navbar.name }}</a>
        <a
          class="navbar-brand"
          href="#"
          v-else-if='(Navbar.name==null || Navbar.name=="") && Navbar.logo'
          style="width: 200px"
        >
          <img :src="Navbar.logo" alt="logo" class="img-fluid" width="40%" />
        </a>
        <button class="navbar-toggler" @click="show()">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div
          class="collapse justify-content-end d-lg-flex"
          :style="{backgroundColor: Navbar.background_color}"
        >
          <button
            type="button"
            @click="show()"
            class="close d-xl-none d-lg-none"
            data-dismiss="modal"
          >&times;</button>
          <ul class="navbar-nav">
            <li class="nav-item ml-3">
              <router-link to="/" class="nav-link" :style="{color: Navbar.font_color}" exact>
                الرئيسية
                <span class="sr-only">(current)</span>
              </router-link>
            </li>
            <li class="nav-item ml-3" v-if="users.loged">
              <router-link
                to="/profile"
                active-class="active"
                class="nav-link"
                :style="{color: Navbar.font_color}"
                exact
              >
                حسابك
                <span class="sr-only">(current)</span>
              </router-link>
            </li>
            <li class="nav-item ml-3">
              <router-link to="/news" class="nav-link" :style="{color: Navbar.font_color}" exact>
                آخر
                الأخبار
                <span class="sr-only">(current)</span>
              </router-link>
            </li>
            <li class="nav-item ml-3" v-if="users.loged && users.admin">
              <router-link
                to="/adminpanel"
                active-class="active"
                class="nav-link"
                :style="{color: Navbar.font_color}"
                exact
              >
                لوحة التحكم
                <span class="sr-only">(current)</span>
              </router-link>
            </li>
            <li class="nav-item ml-3" v-if="!users.loged">
              <form class="form-inline my-2 my-lg-0">
                <button
                  class="btn btn-secondary rounded-pill border-0 ml-3"
                  @click="show()"
                  :style="{color: Navbar.button_font_color, backgroundColor: Navbar.button_background}"
                  data-toggle="modal"
                  data-target="#myModal"
                  type="button"
                >سجل دخول</button>
              </form>
            </li>
            <li class="mt-1 nav-item ml-3" v-if="users.loged">
              <span class="font-weight-bold">{{ users.name }}</span>
            </li>

            <li class="mt-1 nav-item ml-3" v-if="users.loged">
              <button
                :style="{color: Navbar.sec_button_font_color, backgroundColor: Navbar.sec_button_background}"
                class="btn btn-danger rounded-pill mt-xl-0 mt-lg-0 mr-2 d-md-block mt-sm-1 d-sm-block border-0"
                @click="logout()"
              >تسجيل الخروج</button>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">قائمة التسجيل</h4>
            <button type="button" class="close float-left" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <div class="login">
              <input
                class="form-control mb-4"
                v-model.lazy="user.email"
                type="email"
                placeholder="البريد الإلكتروني"
              />
              <input
                class="form-control mb-4"
                v-model.lazy="user.password"
                type="password"
                placeholder="كلمة المرور"
              />
            </div>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button
              class="btn btn-secondary rounded-pill ml-3"
              @click="login()"
              data-dismiss="modal"
              type="button"
            >سجل دخول</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Nav",
  data() {
    return {
      user: {
        name: "",
        email: "",
        admin: "",
        password: ""
      }
    };
  },
  computed: {
    Navbar() {
      return this.$store.state.sections.navbar;
    },
    users() {
      return this.$store.state.user;
    }
  },
  methods: {
    show() {
      $("nav .collapse").toggleClass("show");
    },
    login() {
      // Send the request
      axios
        .post("/api/login", {
          email: this.user.email,
          password: this.user.password
        })
        .then(res => {
          this.$store.commit("user", res.data.data.user);

          if (res.data.data.user.admin == 1) {
            this.user.admin = true;
            this.$store.state.user.admin = true;
          } else {
            this.user.admin = false;
            this.$store.state.user.admin = false;
          }

          console.log(this.$store.state.user);

          // Make it
          this.$store.state.user.loged = true;
          this.$store.state.user.token = res.data.data.token;
          this.user.name = this.$store.state.user.name;
        })
        .catch(err => console.log(err.message));
    },
    logout() {
      this.$store.commit("user", {
        id: null,
        name: null,
        email: null,
        admin: null,
        subscription: {
          start: null,
          end: null
        },
        loged: false
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
    axios
      .get("api/getNavbar")
      .then(res => {
        this.$store.commit("Edit_Navbar", res.data.data);
        console.log("Navbeat", res.data.data);
      })
      .catch(err => console.log(err));
  }
};
</script>

<style lang="scss" scoped>
$main-red: rgb(242, 58, 46);

nav {
  position: fixed;
  top: 0;
  left: 0;
  z-index: 999999;
  width: 100%;
  min-height: 70px;
  background-color: rgb(242, 58, 46);

  button.navbar-toggler {
    outline: none;
    border: none;
    color: black;
  }

  .collapse {
    color: white !important;

    &:not(.show) {
      display: block;
    }

    input.form-control {
      background-color: transparent;
      border-radius: 4px;
      border: 1px solid #fff;
      transition: all 0.4s ease;
      width: 200px;

      &::placeholder {
        color: black;
        font-weight: bolder;
      }

      &:active,
      &:focus {
        box-shadow: none;
      }
    }
  }
}

.modal {
  z-index: 9999999;
  top: 20%;
  .modal-header {
    .close {
      position: absolute;
      display: block;
      left: 0px;
      font-weight: bolder;
      outline: none;
    }
  }
}

.active {
  color: white !important;
}

* {
  text-align: right;
}

@media (max-width: 991px) {
  .active {
    color: black !important;
  }

  nav .collapse {
    position: fixed;
    right: -75%;
    z-index: 999999;
    display: block;
    top: 0;
    height: 100%;
    width: 75%;
    transition: all 0.4s ease;

    input.form-control {
      border: 1px solid #000;
      margin-bottom: 10px;
    }

    button {
      margin-bottom: 10px;

      &.close {
        position: absolute;
        display: block;
        top: 50px;
        right: 20px;
        font-size: 50px;
        font-weight: bolder;
        outline: none;
      }
    }

    &.show {
      right: 0;
      // background-color: #FFF;
      // color: black !important;
      transform: translate(-0%);

      ul {
        li form {
          min-width: 200px;
        }

        li a,
        a.nav-link {
          // color: black;
          font-size: 25px;
        }
      }
    }

    ul {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
  }
}
</style>
