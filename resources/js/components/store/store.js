import Vue from "vue";
import Vuex from 'vuex'

Vue.use(Vuex);

export const store = new Vuex.Store({
    state:{
        user: {
            id: 0,
            name: '',
            email: '',
            admin: false,
            subscription: {
                start: 0 ,
                end: 0,
            },
            loged: false,
            token: ''
        },
        sections:{
            navbar: {
                logo: {
                    text: '',
                    img: ''
                },
                color: {
                    bg: '',
                    bf: '',
                    font: '',
                    active: ''
                }
            }
        },
        
        currentPage: 'dashboard',
        // Start Admin Panel
        AdminPanel: {
            userEdit: {
                name: '',
                email: '',
                password: '',
                date_start: '',
                date_end: '',
            }
        },
        // Start Articles
        articles:[],
        // Start Tasks
        tasks: [
            
            {day: "Saturday", lists: ['Some thing98','Some thing15','Some thing1']},
            {day: "Sunday", lists: ['Some thing98','Some thing15','Some thing2']},
            {day: "Monday", lists: ['Some thing98','Some thing15','Some thing3']},
            {day: "Tuesday", lists: ['Some thing98','Some thing15','Some thing4']},
            {day: "Wednesday", lists: ['Some thing98','Some thing15','Some thing5']},
            {day: "Thursday", lists: ['Some thing98','Some thing15','Some thing6']},
     
        ]
    },
    mutations:{
        // Check if loged
        loged: state => {
            state.loged = !state.loged;
        },
        user(state, payload){
            Object.assign(state.user, payload)
        },
        change_current_page: (state, payload) => {
            state.currentPage = payload
         },
        Edit_Navbar: (state, payload) => {
            Object.assign(state.sections.navbar, payload)
        },
        got_articles: (state, payload) => {
            state.articles = payload
        }
    },
    getters: {
        article: (state) => (id) => {
            return state.articles.filter(function(v){ return v["id"] == id })
        }
    }
});