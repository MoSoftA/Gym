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
            password: '',
            subscription: {
                start: 0,
                end: 0,
                remain: 0
            },
        },
        inp: false,
        loged: false,
    },
    mutations:{
        // Check if loged
        loged: state => {
            state.loged = !state.loged;
        },
        changeRegisterState: (state, payload) => {
            state.inp = (payload=='l') ? false : true
        },
        // Get User
        get_user_name: (state, value) => {
            state.user.name = value;
        },
        get_user_email: (state, value) => {
            state.user.email = value;
        },
        get_user_password: (state, value) => {
            state.user.password = value;
        },
    },
    getters:{
        subscriptionDateStart: state => {
            return state.user.subscription.start.split(' ')[0];
        },
        subscriptionDateEnd: state => {
            return state.user.subscription.end.split(' ')[0];
        }
    }
});