<template>
    <div class="container">

    
        <div class="row">
            
            <div class="col-xs-6">
            <p class="h1">Footer</p>

                <label for="text">Who are we</label>
                <div class="input-group">
                    <input type="text" id="text" class="form-control" v-model="about" placeholder="Who are we" >
                </div>

                <label for="info">Info</label>
                <div class="input-group">
                    <input type="text" id="info" class="form-control" v-model="info" placeholder="Info">
                </div>
            </div>

            <div class="col-xs-6">
                <p class="h2">Contact us</p>

                <div class="input-group">
                    <label for="adress">Adress</label>
                    <input type="text" id="adress" class="form-control" v-model="adress" placeholder="Adress">
                </div>

                <div class="input-group">
                    <label for="email">email</label>
                    <input type="email" id="email" autocomplete="off" class="form-control" v-model="email" placeholder="email">
                </div>

                <div class="input-group">
                    <label for="number">Phone number</label>
                    <input type="tel" id="number" class="form-control" v-model="number" placeholder="Phone number">
                </div>

                <div class="input-group">
                    <label for="fax">Fax</label>
                    <input type="text" id="fax" class="form-control" v-model="fax" placeholder="Fax">
                </div>
            </div>

            <button class="btn btn-success">Done </button>
        </div>
    </div>
</template>


<style lang='scss' scoped>
.input-group{
    margin-top: 0;
}

</style>

<script>
export default {
    data(){
        return {
            about: '',
            info: '',
            adress: '',
            email: '',
            number: '',
            fax: ''
        }
    }
}
</script>
