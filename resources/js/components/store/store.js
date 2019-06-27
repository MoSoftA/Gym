import Vue from "vue";
import Vuex from 'vuex'

Vue.use(Vuex);

export const store = new Vuex.Store({
    state:{
        user: {
            name: '',
            email: '',
            admin: false,
            password: '',
        },
        registerState: true,
        loged: false
    },
    mutations:{
        // Check if loged
        loged: state => {
            state.loged = !state.loged;
        },
        changeRegisterState: state => {
            state.registerState = !state.registerState
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
    }
});