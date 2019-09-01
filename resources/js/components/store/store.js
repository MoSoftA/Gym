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
                background_color: null,
                button_background: null,
                sec_background_color: null,
                sec_button_background: null,
                button_font_color: null,
                font_color: null,
                name: null,
                logo: null,
            },
            footer: {
                Phone: null,
                address: null,
                created_at: null,
                facebook:null,
                fax: null,
                google: null,
                id: null,
                info: null,
                linkedIn: null,
                twitter:null,
                we: null,
                section_one: null,
                section_two: null,
                section_three: null,
                section_four: null,
                
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
            },
            
            trainer:{
                admin: '',
                date_end: '',
                date_start: '',
                email: '',
                id: '',
                name: '',
            },
            articleEdit: {
                
            }
        },
        // Start Articles
        articles:[],
        // Start Tasks
        tasks: []
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
        Edit_Slider: (state, payload) => {
            Object.assign(state.sections.slider, payload)
        },
        Edit_Footer: (state, payload) => {
            Object.assign(state.sections.footer, payload)
        },
        got_articles: (state, payload) => {
            state.articles = payload
        },
        // Get The targeted user
        target_user(state, payload){
            Object.assign(state.AdminPanel.userEdit, payload)
        },
        // Get The targeted user
        target_trainer(state, payload){
            Object.assign(state.AdminPanel.trainer, payload)
        },
        // Get The targeted article
        target_article(state, payload){
            Object.assign(state.AdminPanel.articleEdit, payload)
        }
    },
    getters: {
        article: (state) => (id) => {
            return state.articles.filter(function(v){ return v["id"] == id })
        }
    }
});