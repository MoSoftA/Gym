<template>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                    <li class="nav-item has-treeview" @click="drop($event)">
                        <a href="#" class="nav-link" data-drop='1'>
                            <i class="nav-icon fas fa-edit" data-drop='1'></i>
                            <p data-drop='1'>
                                sections
                                <i class="fas fa-angle-left right" data-drop='1'></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" data-drop='1'>

                            <li class="nav-item"><a role="button" class="nav-link" @click="change_page('NavEdit')"><i
                                        class="far fa-circle nav-icon"></i>
                                    Navbar</a>
                            </li>

                            <li class="nav-item"><a role="button" class="nav-link" @click="change_page('features')"><i
                                        class="far fa-circle nav-icon"></i>
                                    Features</a>
                            </li>
                            <li class="nav-item"><a role="button" class="nav-link"
                                    @click="change_page('SlidersEdit')"><i class="far fa-circle nav-icon"></i>
                                    Slieders</a>
                            </li>
                            <li class="nav-item"><a role="button" class="nav-link"
                                    @click="change_page('AboutusEdit')"><i class="far fa-circle nav-icon"></i>
                                    About us</a>
                            </li>
                            <li class="nav-item"><a role="button" class="nav-link"
                                    @click="change_page('TrainersEdit')"><i class="far fa-circle nav-icon"></i>
                                    Our trainers</a>
                            </li>
                            <li class="nav-item"><a role="button" class="nav-link" @click="change_page('FooterEdit')"><i
                                        class="far fa-circle nav-icon"></i>
                                    Footer</a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview" data-drop='2' @click="drop($event)">
                        <a href="#" class="nav-link" data-drop='2'>
                            <i class="nav-icon fas fa-users" data-drop='2'></i>
                            <p data-drop='2'>
                                Users
                                <i class="fas fa-angle-left right" data-drop='2'></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" data-drop='2'>

                            <li class="nav-item"><a role="button" class="nav-link" @click="change_page('userAll')"><i
                                        class="far fa-circle nav-icon"></i> all users</a>
                            </li>
                            <li class="nav-item"><a role="button" class="nav-link" @click="change_page('userAdd')"><i
                                        class="far fa-circle nav-icon"></i> add user</a>
                            </li>

                        </ul>
                    </li>
                    
                    <li class="nav-item has-treeview" data-drop='4' @click="drop($event)">
                        <a href="#" class="nav-link" data-drop='4'>
                            <i class="nav-icon fas fa-users" data-drop='4'></i>
                            <p data-drop='4'>
                                Trainers
                                <i class="fas fa-angle-left right" data-drop='4'></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" data-drop='4'>

                            <li class="nav-item"><a role="button" class="nav-link" @click="change_page('trainerAll')"><i
                                        class="far fa-circle nav-icon"></i> all Trainers</a>
                            </li>
                            <li class="nav-item"><a role="button" class="nav-link" @click="change_page('trainerAdd')"><i
                                        class="far fa-circle nav-icon"></i> add trainer</a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item has-treeview" data-drop='3' @click="drop($event)">
                        <a href="#" class="nav-link" data-drop='3'>
                            <i class="nav-icon fas fa-newspaper" data-drop='3'></i>
                            <p data-drop='3'>
                                Article
                                <i class="fas fa-angle-left right" data-drop='3'></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" data-drop='3'>

                            <li class="nav-item"><a role="button" class="nav-link" @click="change_page('articleAll')"><i
                                        class="far fa-circle nav-icon"></i> all articles</a>
                            </li>
                            <li class="nav-item"><a role="button" class="nav-link" @click="change_page('articleAdd')"><i
                                        class="far fa-circle nav-icon"></i> add articles</a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
</template>

<style lang="scss" scoped>
    .brand-link {
        padding: 10px;
        color: white !important;
    }

    .layout-navbar-fixed.layout-fixed .wrapper .sidebar {
        margin-top: calc(3.5rem + 50px);
    }

    a {
        cursor: pointer;
    }

</style>


<script>
    export default {
        computed: {
            admin() {
                return this.$store.state.user.loged
            },
        },
        methods: {
            change_page(payload) {
                this.$store.commit('change_current_page', payload)
            },
            drop(e) {
                if ($(`ul[data-drop="${e.target.getAttribute('data-drop')}"]`).css('display') == 'block') {
                    $(`i.right[data-drop="${e.target.getAttribute('data-drop')}"]`).css({
                        'transition': 'all 0.4s ease',
                        'transform': 'rotate(0)'
                    });
                    $(`ul[data-drop="${e.target.getAttribute('data-drop')}"]`).slideUp(400);
                } else {
                    $('ul[data-drop]').slideUp(400);
                    $(`i.right[data-drop="${e.target.getAttribute('data-drop')}"]`).css({
                        'transition': 'all 0.4s ease',
                        'transform': 'rotate(-90deg)'
                    })
                    $(`ul[data-drop="${e.target.getAttribute('data-drop')}"]`).slideDown(400);
                }
            }
        }
    }

</script>
