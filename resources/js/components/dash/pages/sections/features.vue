<template>
    <div class="container">
        <div class="row" v-if="preview">
            <div class="col-md-6 col-lg-3 p-5 k" :key="index" v-for="(feat , index) in feats">
                <div class="feat">
                    <img class="mb-2" :src="feat.image" width="56" height="56" />
                    <p class="h4">{{ feat.title }}</p>
                    <hr />
                    <p>{{ feat.text }}</p>
                    <button
                        class="btn btn-warning btn-block btn-flat"
                        @click="get_Update_id(feat.id)"
                        role="button"
                    >Update this feat</button>

                    <button
                        class="btn btn-danger btn-block btn-flat"
                        data-toggle="modal"
                        data-target="#exampleModalCenter"
                        @click="get_id(feat.id)"
                        role="button"
                    >Delete this feat</button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Features</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label class="font-wieght-bold">Title</label>
                        <input
                            type="text"
                            class="form-control"
                            v-model.lazy="title"
                            placeholder="Type Title"
                        />
                    </div>

                    <div class="form-group col-md-4">
                        <label for="image">image</label>
                        <div class="input-group">
                            <input
                                type="file"
                                id="image"
                                class="form-control"
                                @change="get_image($event)"
                            />
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <label class="font-wieght-bold">Discription</label>
                        <textarea
                            v-model.lazy="text"
                            placeholder="Type Discription"
                            rows="3"
                            style="resize: none"
                        ></textarea>
                    </div>

                    <div class="col-4 mx-2 my-4">
                        <button
                            class="btn btn-primary btn-block btn-flat"
                            @click="preview = !preview"
                            role="button"
                        >preview</button>
                    </div>
                    
                    <div class="col-4 mx-2 my-4" v-if="update">
                        <button
                            class="btn btn-primary btn-block btn-flat"
                            @click="update_feat"
                            role="button"
                        >Update</button>
                    </div>

                    <div class="col-4 mx-2 my-4">
                        <button
                            class="btn btn-primary btn-block btn-flat"
                            @click="send"
                            role="button"
                        >Done</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div
            class="modal fade"
            id="exampleModalCenter"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <p class="h2">Are you sure you wanna delete this user?</p>
                        <button
                            class="btn btn-warning btn-flat my-4 mx-auto"
                            data-dismiss="modal"
                            type="button"
                            id="button-addon2"
                            @click="remove_feat"
                        >Just Do It</button>
                        <button
                            type="button"
                            class="btn btn-primary btn-flat my-4 mx-auto"
                            data-dismiss="modal"
                        >cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Axios from "axios";
import realFeat from "../../../blocks/Features";

export default {
    data() {
        return {
            preview: false,
            update: false,
            feats: [],

            id: null,
            title: null,
            image: null,
            text: null
        };
    },
    methods: {
        get_Update_id(index) {
            let element = this.feats.find(el => el.id == index);
            this.id = element.id;
            this.title = element.title;
            this.image = element.image;
            this.text = element.text;
            this.update = true;
        },
        get_id(index) {
            let element = this.feats.find(el => el.id == index);
            this.id = element.id;
            console.log(element);
        },
        get_image(e) {
          this.image = e.target.files[0];
        },
        update_feat(){         

           let feat = new FormData();
             feat.append("title", this.title);
             feat.append("image", this.image);
             feat.append("text", this.text);

             const config = {
                 headers: {
                     "content-type": "multipart/form-data",
                     Accept: "application/json",
                     Authorization: "Bearer " + this.$store.state.user.token
                 }
             };
             Axios.post(`api/updateFeatures/${this.id}`, feat, config).then(res => {
                     Axios.get("api/getFeatures")
                         .then(res => {
                             this.feats = res.data.data;

                             console.log("dasaad", res.data.data);
                         })
                         .catch(err => {
                             console.log(err);
                         });
                     Swal.fire({
                         title: "you Added Feature",
                         text: res.data.message,
                         type: "success",
                         confirmButtonText: "Cool!"
                     });
                 })
                 .catch(err => {
                     Swal.fire({
                         title: "Something wrong",
                         text: res.data.message,
                         type: "error",
                         confirmButtonText: "Cool!"
                     });
                 });
        },
        send() {
            let feat = new FormData();
            feat.append("title", this.title);
            feat.append("image", this.image);
            feat.append("text", this.text);

            const config = {
                headers: {
                    "content-type": "multipart/form-data",
                    Accept: "application/json",
                    Authorization: "Bearer " + this.$store.state.user.token
                }
            };
            Axios.post("api/addFeatures", feat, config)
                .then(res => {
                    Axios.get("api/getFeatures")
                        .then(res => {
                            this.feats = res.data.data;

                            console.log("dasaad", res.data.data);
                        })
                        .catch(err => {
                            console.log(err);
                        });
                    Swal.fire({
                        title: "you Added Feature",
                        text: res.data.message,
                        type: "success",
                        confirmButtonText: "Cool!"
                    });
                })
                .catch(err => {
                    Swal.fire({
                        title: "Something wrong",
                        text: res.data.message,
                        type: "error",
                        confirmButtonText: "Cool!"
                    });
                });
        },
        remove_feat() {
            const config = {
                headers: {
                    "content-type": "multipart/form-data",
                    Accept: "application/json",
                    Authorization: "Bearer " + this.$store.state.user.token
                }
            };
            Axios.delete(`api/deleteFeatures/${this.id}`, config)
                .then(res => {
                    Axios.get("api/getFeatures")
                        .then(res => {
                            this.feats = res.data.data;

                            console.log("dasaad", res.data.data);
                        })
                        .catch(err => {
                            console.log(err);
                        });

                    Swal.fire({
                        title: "deleted Succfully",
                        text: res.data.message,
                        type: "success",
                        confirmButtonText: "Cool!"
                    });
                })
                .catch(err => {
                    Swal.fire({
                        title: "Something wrong",
                        text: res.data.message,
                        type: "error",
                        confirmButtonText: "Cool!"
                    });
                });
        }
    },
    mounted() {
        Axios.get("api/getFeatures")
            .then(res => {
                this.feats = res.data.data;

                console.log("dasaad", res.data.data);
            })
            .catch(err => {
                console.log(err);
            });
    }
};
</script>

<style lang="scss" scoped>
.k:nth-child(even) {
    background-color: #eee !important;
}
.feat {
    text-align: right;
}
.k:nth-child(even) {
    background-color: #eee !important;
}
.feat {
    text-align: right;
}

.card label {
    display: block;
}
</style>