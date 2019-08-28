<template>
    <div class="jumbotron mt-5 pb0" :style="{ backgroundColor: color.background_color, color: color.font_color }">
        <div class="container">

        <h1 class="display-4">أهلاً {{ end.name }}</h1>
        <p class="lead">ينتهي اشتراكك يوم : {{ end.end }} </p>
        </div>
    </div>
</template>

<script>

export default {
    computed: {
        end(){
            return this.$store.state.user
        },
        color(){
            return this.$store.state.sections.navbar
        }
    }
}
</script>

<style lang="scss" scoped>
$main-red: rgb(242, 58, 46);
.jumbotron{
    border-radius: 0;
    text-align: right;
    background-color: $main-red;
    color: white
}
</style>
