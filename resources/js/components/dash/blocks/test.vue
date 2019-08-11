<template>
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                    sections
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item"><a role="button" class="nav-link" @click="change_page('NavEdit')"><i
                            class="far fa-circle nav-icon"></i>
                        Navbar</a>
                </li>
                <li class="nav-item"><a role="button" class="nav-link" @click="change_page('SlidersEdit')"><i
                            class="far fa-circle nav-icon"></i>
                        Slieders</a>
                </li>
                <li class="nav-item"><a role="button" class="nav-link" @click="change_page('AboutusEdit')"><i
                            class="far fa-circle nav-icon"></i>
                        About us</a>
                </li>
                <li class="nav-item"><a role="button" class="nav-link" @click="change_page('TrainersEdit')"><i
                            class="far fa-circle nav-icon"></i>
                        Our trainers</a>
                </li>
                <li class="nav-item"><a role="button" class="nav-link" @click="change_page('FooterEdit')"><i
                            class="far fa-circle nav-icon"></i>
                        Footer</a>
                </li>

            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Users
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item"><a role="button" class="nav-link" @click="change_page('userAll')"><i
                            class="far fa-circle nav-icon"></i> all users</a>
                </li>
                <li class="nav-item"><a role="button" class="nav-link" @click="change_page('userAdd')"><i
                            class="far fa-circle nav-icon"></i> add user</a>
                </li>

            </ul>
        </li>

        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                    Article
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item"><a role="button" class="nav-link" @click="change_page('articleAll')"><i
                            class="far fa-circle nav-icon"></i> all articles</a>
                </li>
                <li class="nav-item"><a role="button" class="nav-link" @click="change_page('articleAdd')"><i
                            class="far fa-circle nav-icon"></i> add articles</a>
                </li>

            </ul>
        </li>
    </ul>
</template>

<script>
    export default {
        methods: {
            change_page(payload) {
                this.$store.commit('change_current_page', payload)
            }
        },
        computed: {
            admin() {
                return this.$store.state.AdminPanel.loged
            },
        }

    }

</script>

<style>

</style>
