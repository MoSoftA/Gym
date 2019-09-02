<template>
    <div class="row" @click="get_body">
        <div class="card">
            <div class="card-body">

                <label for="articleName">Article title</label>
                <div class="input-group">
                    <input v-model="title" type="text" class="form-control" placeholder="Article title">
                </div>

                <label for="articleimage">Article image</label>
                <div class="input-group">
                    <img :src="img" alt="صورة" class="img-fluid" width="200px">
                    <input type="file" id="img" accept="image/*" name="img" @change="get_image($event)">
                </div>

                <label for="articleinfo">Article Info</label>
                <div class="form-group">
                    <textarea v-model="info" class="form-control" placeholder="Article info" id="articleinfo"
                        rows="2" style="resize: none"></textarea>
                </div>

                <label for="some-textarea">Article Body</label>
                <textarea class="textarea" id='some-textarea' placeholder="Place some text here"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                <div class="col-4 mt-5">
                    <button type="submit" class="btn btn-primary btn-block btn-flat" @click="update">Submit</button>
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
                img: '',
                id: this.$store.state.AdminPanel.articleEdit[0],
                title: '',
                body: '',
                info: '',
            }
        },
        methods: {
            get_body() {
                console.log($('#some-textarea').val());
                this.body = String($('#some-textarea').val())
            },
            get_image(e) {
                this.img = e.target.files[0]
            },
            update() {
                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        Accept: 'application/json',
                        Authorization: 'Bearer ' + this.$store.state.user.token     
                    }
                };

            let data = new FormData();
                 data.append('title', this.title);
                 data.append('body', this.body);
                 data.append('info', this.info);
                 data.append('img', this.img) 


                Axios.post(`api/editArticle/${this.id}`, data , config).then(res => {
                     Swal.fire({
                        title: 'Done',
                        text: err.data,
                        type: 'success',
                        confirmButtonText: 'ok'
                    })
                    console.log(res)
                }).catch(err => {
                     Swal.fire({
                            title: 'فشلت العملية',
                            text: err.data,
                            type: 'error',
                            confirmButtonText: 'حسناً'
                        })
                })
            },

        },
        mounted() {
            console.log('ok', this.$store.state.AdminPanel.articleEdit);

            this.title = this.$store.state.AdminPanel.articleEdit[1];
            this.info = this.$store.state.AdminPanel.articleEdit[2];
            this.img = this.$store.state.AdminPanel.articleEdit[5];

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
