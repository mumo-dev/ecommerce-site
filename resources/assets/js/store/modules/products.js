const state = {
    products:[]
};

const getters ={
    products(state){
        return state.products;
    }
};

const mutations ={
    'SET_PRODUCTS'(state, payload){
        state.products = payload;
    },
    'ADD_PRODUCT'(state,payload){
        state.products.push(payload);
    },

}

const actions ={
    setProducts:({commit}, payload)=>{
        commit('SET_PRODUCTS', payload);
    },
    addProduct:({commit},payload)=>{
        commit('ADD_PRODUCT', payload);
    }
}
export default { state, getters ,mutations, actions }