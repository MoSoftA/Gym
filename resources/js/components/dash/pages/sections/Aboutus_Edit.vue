<template>
    <div class="container">
 <div class="card">
            <div class="card-body">
        <div class="row">
            <label for="image">Image</label>
            <div class="input-group">
                <input type="file" id="image" class="form-control" @change="get_image($event)">
            </div>
            <br>
            <div class="col-md-12 mt-5">
                <label for="some-textarea">Article Body</label>
                <textarea class="textarea" id='some-textarea' placeholder="Place some text here"
                    style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>

            <div class="col-4 my-4">
                        <button class="btn btn-primary btn-block btn-flat" @click="assign">Done</button>
                </div>
        </div>
    </div>
 </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                body: '',
                image: ''
            }
        },
        methods: {
            get_image(e) {

                let fileReader = new FileReader();

                fileReader.readAsDataURL(e.target.files[0]);

                fileReader.onload = (e) => {
                    this.image = e.target.result;
                }

            },
            get_body() {
                console.log($('#some-textarea').val());
                this.body = String($('#some-textarea').val())
            }
        },
        mounted() {
            // Summernote
            $('.textarea').summernote({
                popover: {
                    image: [],
                    link: [],
                    air: []
                }
            })
        }
    }

</script>

<style>

</style>
