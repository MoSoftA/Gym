<template>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Sidebar -->
            <div class="sidebar">

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <list v-if='admin'></list>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
</template>

<style lang="scss" scoped>
.brand-link{
    padding: 10px;
    color: white !important;
}
.layout-navbar-fixed.layout-fixed .wrapper .sidebar {
    margin-top: calc(3.5rem + 50px) ;
}
a{
    cursor: pointer;
}
</style>


<script>
import list from './test'
    export default {
        components:{
            list
        },computed: {
            admin() {
                return this.$store.state.AdminPanel.loged
            },
        }
    }

</script>
