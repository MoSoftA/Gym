<template>
  <!-- eslint-disable vue/no-use-v-if-with-v-for,vue/no-confusing-v-for-v-if -->

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">All Articles</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th :key="index" v-for="(header, index) in head" v-if="index!=4&& index!=3&& index!=5 && index!=6">{{ header }}</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody>
            <tr :key="index" v-for="(user, index) in rows">
              <td :key="index" v-for="(val, index) in user" v-if="index!=4&& index!=3&& index!=5 && index!=6">{{ val }}</td>
              <td>
                <button
                  class="btn btn-success"
                  title="Edit Article"
                  @click="change_component($event, 'articleEdit')"
                >
                  <i class="fas fa-edit"></i>
                </button>

                <button
                  class="btn btn-danger"
                  id="id"
                  title="Delete Article"
                  data-toggle="modal"
                  data-target="#exampleModalCenter"
                  @click="get_id($event)"
                >
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /.card-body -->
    <!-- Modal -->
    <div
      class="modal fade"
      id="exampleModalCenter"
      tabindex="-1"
      role="dialog"
      aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <p class="h2">Are you sure you wanna delete the article?</p>
            <button
              class="btn btn-danger btn-flat my-4 mx-auto"
              data-dismiss="modal"
              type="button"
              id="button-addon2"
              @click="deleteArticle($event)"
            >Just Do It</button>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.card -->
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      id: null,
      head: [],
      rows: []
    };
  },
  methods: {
    change_component(e, payload) {
      let id = $(e.target)
        .parents("tr")
        .first()
        .children()[0].innerText;
      let articles = this.rows;

      articles.forEach(article => {
        for (let key in article) {
          if (article[key] == id) {
            Object.assign(this.$store.state.AdminPanel.articleEdit, article);
            console.log(article);
          }
        }
      });

      this.$store.commit("change_current_page", payload);
    },
    get_id(e) {
      this.id = $(e.target)
        .parents("tr")
        .first()
        .children()[0].innerText;
    },
    deleteArticle(e) {
      axios
        .delete(`api/deleteArticle/${this.id}`, {
          headers: {
            Accept: "application/json",
            Authorization: "Bearer " + this.$store.state.user.token
          }
        })
        .then(res => {
          Swal.fire({
            title: "Deleted successfully",
            text: null,
            type: "success",
            confirmButtonText: "good"
          });

          this.rows = [];

          axios
            .get("api/articles", {
              headers: {
                Accept: "application/json",
                Authorization: "Bearer " + this.$store.state.user.token
              }
            })
            .then(res => {
              let articles = res.data.data;

              articles.forEach(article => {
                delete article.updated_at;
                delete article.image;

                this.rows.push(Object.values(article));
              });
            })
            .catch(err => err.message);
        })
        .catch(err =>
          Swal.fire({
            title: "Faild",
            text: err.message,
            type: "error",
            confirmButtonText: "ok!"
          })
        );
    }
  },
  mounted() {
    axios
      .get("api/articles", {
        headers: {
          Accept: "application/json",
          Authorization: "Bearer " + this.$store.state.user.token
        }
      })
      .then(res => {
        let articles = res.data.data;

        articles.forEach(article => {
          // delete article.created_at;
          delete article.updated_at;
          // delete article.longDescription;

          this.head = Object.keys(article);
          this.rows.push(Object.values(article));
        });
        console.log(res.data.data);
      })
      .catch(err => err.message);
  }
};
</script>
