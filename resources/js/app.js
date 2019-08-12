import Vue from 'vue';
import VueRouter from 'vue-router';

import axios from 'axios';
import { store } from './components/store/store';

import App from './components/App.vue';
import Home from "./components/pages/Home.vue";
import Profile from "./components/pages/Profile.vue";
import News from "./components/pages/News.vue";
import articles from "./components/pages/articles.vue";

import Admin from "./components/dash/admin.vue";

Vue.use(axios);
Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/",
            name: "Home",
            component: Home
        },
        {
            path: "/profile",
            name: "profile",
            component: Profile
        },
        {
            path: "/news",
            name: "news",
            component: News
        },
        {
            path: '/articles/:id',
            name: 'articles',
            component: articles
        }
        ,
        {
            path: '/adminpanel',
            name: 'Admin',
            component: Admin
        }
    ]
})

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {App}
});
