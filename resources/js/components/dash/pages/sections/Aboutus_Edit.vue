<template>
    <div class="container">
        <realAboutus v-if="preview"></realAboutus>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <label for="image">Image</label>
                    <div class="input-group">
                        <input
                            type="file"
                            id="image"
                            class="form-control"
                            @change="get_image($event)"
                        />
                    </div>
                    <br />
                    <div class="col-md-12 mt-5">
                        <label for="some-textarea">Article Body</label>
                        <textarea
                            class="textarea"
                            id="some-textarea"
                            placeholder="Place some text here"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                        ></textarea>
                    </div>

                    <div class="col-4 mx-2 my-4">
                        <button
                            class="btn btn-primary btn-block btn-flat"
                            @click="preview = !preview"
                            role="button"
                        >preview</button>
                    </div>
                    <div class="col-4 my-4">
                        <button
                            class="btn btn-primary btn-block btn-flat"
                            @click="send"
                            role="button"
                        >Done</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import realAboutus from "../../../blocks/About";
import Axios from "axios";
export default {
    data() {
        return {
            preview: false,
            about: {
                body: '',
                image: ''

            },
            body: "",
            image: ""
        };
    },
    components: {
        realAboutus
    },
    methods: {
        get_image(e) {
            this.image = e.target.files[0];
        },
        send() {
            let about = new FormData();
            about.append("body", String($("#some-textarea").val()));
            about.append("image", this.image);

            const config = {
                headers: {
                    "content-type": "multipart/form-data",
                    Accept: "application/json",
                    Authorization: "Bearer " + this.$store.state.user.token
                }
            };
            Axios.post("api/storerAboutUs", about, config)
                .then(res => {
                    Axios.get("api/getAboutUsr").then(res => {
                    Object.assign(this.about, res.data.data[0]);
                    $(".about-body").append(res.data.data[0].body);
                });

                    Swal.fire({
                        title: "you Edited About",
                        text: res.data.message,
                        type: "success",
                        confirmButtonText: "Cool!"
                    });
                })
                .catch(err => console.log(err));
        }
    },
    mounted() {
        // Summernote
        $(".textarea").summernote({
            popover: {
                image: [],
                link: [],
                air: []
            }
        });

        Axios.get("api/getAboutUsr").then(res => {
            Object.assign(this.about, res.data.data[0]);
            $(".about-body").append(res.data.data[0].body);
            console.log(this.image);
        });
    }
};
</script>

<style>
</style>
