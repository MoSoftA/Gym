<template>
  <div class="row">
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box">
        <span class="info-box-icon bg-info elevation-1">
          <i class="fas fa-users" aria-hidden="true"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">Users</span>
          <span class="info-box-number">{{ user_no }}</span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-danger elevation-1">
          <i class="fas fa-newspaper"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">Artiles</span>
          <span class="info-box-number">{{ art_no }}</span>
        </div>
      </div>
    </div>
    <div class="clearfix hidden-md-up"></div>
    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box mb-3">
        <span class="info-box-icon bg-success elevation-1">
          <i class="fas fa-user-friends"></i>
        </span>
        <div class="info-box-content">
          <span class="info-box-text">trainers</span>
          <span class="info-box-number">{{ trainer_no }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      art_no: null,
      user_no: null,
      trainer_no: null
    };
  },
  mounted() {
    // Get all Articles
    axios
      .get("api/articles", {
        headers: {
          Accept: "application/json",
          Authorization: "Bearer " + this.$store.state.user.token
        }
      })
      .then(res => {
        this.art_no = res.data.data.length;
      });

    // Get all users
    axios
      .get("api/users", {
        headers: {
          Accept: "application/json",
          Authorization: "Bearer " + this.$store.state.user.token
        }
      })
      .then(res => {
        this.user_no = res.data.data.length;
      });

    // Get All Articles
    axios
      .get("api/getTrainers", {
        headers: {
          Accept: "application/json",
          Authorization: "Bearer " + this.$store.state.user.token
        }
      })
      .then(res => {
        this.trainer_no = res.data.data.length;
      });
  }
};
</script>