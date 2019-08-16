<template>
    <div class="container">
        <div class="card">
            <div class="card-body">

                <div class="row">

                    <div class="col-md-6 col-sm-12">
                        <p class="h1">Footer</p>

                        <label for="text" class="my-2">Who are we</label>
                        <div class="input-group">
                            <input type="text" id="text" class="form-control" v-model="about" placeholder="Who are we">
                        </div>

                        <label for="info" class="my-2">Info</label>
                        <div class="input-group">
                            <input type="text" id="info" class="form-control" v-model="info" placeholder="Info">
                        </div>

                        <p class="h3 mt-3">Contact us</p>

                        <label for="adress" class="my-2">Adress</label>
                        <div class="input-group">
                            <input type="text" id="adress" class="form-control" v-model="adress" placeholder="Adress">
                        </div>

                        <label for="email" class="my-2">email</label>
                        <div class="input-group">
                            <input type="email" id="email" autocomplete="off" class="form-control" v-model="email"
                                placeholder="email">
                        </div>

                        <label for="number" class="my-2">Phone number</label>
                        <div class="input-group">
                            <input type="tel" id="number" class="form-control" v-model="number"
                                placeholder="Phone number">
                        </div>

                        <label for="fax" class="my-2">Fax</label>
                        <div class="input-group">
                            <input type="text" id="fax" class="form-control" v-model="fax" placeholder="Fax">
                        </div>
                    </div>
                </div>

                    <div class="col-4 my-4">
                        <button class="btn btn-primary btn-block btn-flat" @click="assign">Done</button>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                about: '',
                info: '',
                adress: '',
                email: '',
                number: '',
                fax: ''
            }
        },
        methods:{
            assign(){
                
            }
        }
    }

</script>
