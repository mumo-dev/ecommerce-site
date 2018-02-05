import Vuex from 'vuex'
import Vue from 'vue'
import reviews from './modules/reviews'

Vue.use(Vuex);

export const store = new Vuex.Store({
    modules:{
        reviews
    }
});