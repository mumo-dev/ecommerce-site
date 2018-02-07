const state = {
    reviews:[]
};

const getters ={
    reviews(state){
        return state.reviews;
    }
};

const mutations ={
    'SET_REVIEWS'(state, payload){
        state.reviews = payload;
    },
    'ADD_REVIEW'(state,payload){
        state.reviews.push(payload);
    },

}

const actions ={
    setReviews:({commit}, payload)=>{
        commit('SET_REVIEWS', payload);
    },
    addReview:({commit},payload)=>{
        commit('ADD_REVIEW', payload);
    }
}
export default { state, getters ,mutations, actions }