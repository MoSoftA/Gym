<template>
    <transition name="fade" mode="out-in">
      <router-view style="padding-top: 70px;"></router-view>
    </transition>
</template>

<style lang="scss">
$main-red: rgb(242, 58, 46);

hr{
    width: 25%;
    background-color: $main-red;
    height: 2px;
    position: relative;
    left: 37%;
}
.fade-enter-active,
.fade-leave-active {
  transition-duration: 0.3s;
  transition-property: opacity;
  transition-timing-function: ease;
}

.fade-enter,
.fade-leave-active {
  opacity: 0
}
</style>


<script>
import Axios from 'axios';
export default {
  mounted() {
        Axios.get("api/getFeatures")
            .then(res => {
                this.$store.commit("got_feats", res.data.data)
            })
            .catch(err => {
                console.log(err);
            });
    }
}
</script>