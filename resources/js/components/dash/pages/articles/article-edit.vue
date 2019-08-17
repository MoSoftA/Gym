<template>
    <div class="row" @click="get_body">
        <div class="card">
            <div class="card-body">
                
                <label for="articleName">Article title</label>
                <div class="input-group">
                    <input v-model="article.title" type="text" class="form-control" placeholder="Article title">
                </div>

                <label for="articleimage">Article image</label>
                <div class="input-group">
                    <input type="file" id="img" accept="image/*" name="img" @change="get_image($event)">
                </div>

                <label for="articleinfo">Article Info</label>
                <div class="form-group">
                    <textarea v-model="article.info" class="form-control" placeholder="Article info" id="articleinfo"
                        rows="2" style="resize: none"></textarea>
                </div>


                <label for="some-textarea">Article Body</label>
                <textarea class="textarea" id='some-textarea' placeholder="Place some text here"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                <div class="col-4 mt-5">
                    <button type="submit" class="btn btn-primary btn-block btn-flat"
                        @click="update">Submit</button>
                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss">
    .card {
        min-width: 100%;
    }

    textarea {
        direction: rtl;
        text-align: left
    }

</style>


<script>
    import Axios from 'axios';
    export default {
        data() {
            return {
                article: {
                    id: this.$store.state.AdminPanel.articleEdit[0],
                    img: '',
                    title: this.$store.state.AdminPanel.articleEdit[1],
                    body: this.$store.state.AdminPanel.articleEdit[3],
                    info: this.$store.state.AdminPanel.articleEdit[2],
                }
            }
        },
        methods: {
            get_body() {
                console.log($('#some-textarea').val());
                this.article.body = String($('#some-textarea').val())
            },
            get_image(e) {

                let fileReader = new FileReader();

                fileReader.readAsDataURL(e.target.files[0]);

                fileReader.onload = (e) => {
                    this.article.img = e.target.result;
                }

            },
            update() {


                Axios.put(`api/editArticle/${this.id}`, this.article , {
                        headers: {
                            Accept: 'application/json',
                            Authorization: 'Bearer ' + this.$store.state.user.token
                        },

                    })
                    .then(res => Swal.fire({
                                title: 'you add user',
                                text: res.data,
                                type: 'success',
                                confirmButtonText: 'Cool!'
                            })
                            ).catch(err => err.message);
            },

        },
        mounted() {
            console.log('ok', this.$store.state.AdminPanel.articleEdit);

            $('.textarea').summernote('code', this.$store.state.AdminPanel.articleEdit[3], {
                popover: {
                    image: [],
                    link: [],
                    air: []
                }
            });

        }
    }

</script>
