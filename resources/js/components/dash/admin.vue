<template>
  <div>
    <div class="wrapper">
      <loginPage v-if="!admin"></loginPage>

      <Header v-if="admin"></Header>
      <!-- Main Sidebar Container -->
      <Sidebar v-if="admin"></Sidebar>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper" style="background: white" v-if="admin">
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <section class="content">
              <transition name="fade" mode="out-in">
                <component :is="currentPage"></component>
              </transition>
            </section>
          </div>
          <!--/. container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
  </div>
</template>

<style lang="scss" scoped>
.wrapper {
  padding-top: 33px;
}

* {
  direction: ltr;
}
</style>


<script>
import Header from "./blocks/Header";
import Sidebar from "./blocks/Sidebar";

import loginPage from "./pages/login";
import dashboard from "./pages/dashboard";

import userAdd from "./pages/users/user-add";
import userAll from "./pages/users/user-all";
import userEdit from "./pages/users/user-edit";
import tasks from "./pages/users/Tasks";

import trainerAdd from "./pages/trainer/trainer-add";
import trainerAll from "./pages/trainer/trainer-all";
import trainerEdit from "./pages/trainer/trainer-edit";

import articleAll from "./pages/articles/article-all";
import articleAdd from "./pages/articles/article-add";
import articleEdit from "./pages/articles/article-edit";

import features from "./pages/sections/features";
import NavEdit from "./pages/sections/Navbar_Edit";
import FooterEdit from "./pages/sections/Footer_Edit";
import SlidersEdit from "./pages/sections/Sliders_Edit";
import TrainersEdit from "./pages/sections/Trainers_Edit";
import AboutusEdit from "./pages/sections/Aboutus_Edit";

export default {
  components: {
    dashboard,
    Header,
    Sidebar,

    loginPage,

    userAdd,
    userAll,
    userEdit,
    tasks,

    trainerAdd,
    trainerAll,
    trainerEdit,

    articleAdd,
    articleAll,
    articleEdit,

    features,
    NavEdit,
    FooterEdit,
    SlidersEdit,
    TrainersEdit,
    AboutusEdit
  },
  computed: {
    admin() {
      return this.$store.state.user.loged;
    },
    currentPage() {
      return this.$store.state.currentPage;
    }
  }
};
</script>
