<template>
   <div class="container">
        <div class="card">
            <div class="card-body">

                <p class="h1 mt-5">SLider Edit</p>
            </div>
        </div>
   </div>
</template>

<style lang='scss' scoped>
.input-group{
    margin-top: 0;
}

.inline{
    div{
        margin-right: 10px;
        display: inline-block
    }
}
</style>

<script>
export default {
    data(){
        return {
            image: '' ,
            text: ''
        }
    },
    methods:{
            get_image(e){

                let fileReader = new FileReader();

                fileReader.readAsDataURL(e.target.files[0]);

                fileReader.onload = (e) => {
                this.image = e.target.result;
            }
        }
    }
}
</script>
