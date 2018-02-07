const state = {
    cartItems:[]
};

const getters ={
    cartItems(state){
        return state.cartItems;
    },
    itemsInCart(state){
        return state.cartItems.length;
    }
};

const mutations ={
    'SET_CART_ITEMS'(state, payload){
       state.cartItems = payload;
    },
    'ADD_TO_CART'(state,payload){
        const data = {
            product_id:payload.id,
            product_name:payload.name,
            product_price: payload.price,
            quantity:1
        };
        state.cartItems.push(data);
        window.localStorage.setItem('cartItems',JSON.stringify(state.cartItems));
    },
    'INC'(state,id){
        const index = state.cartItems.findIndex(elem => elem.product_id == id);
        if(index !== -1){
            state.cartItems[index].quantity++;

        }
        window.localStorage.setItem('cartItems',JSON.stringify(state.cartItems));
    },
    'DEC'(state,id){
        const index = state.cartItems.findIndex(elem => elem.product_id == id);
        if(index !== -1){
            
            if(state.cartItems[index].quantity == 1){
               state.cartItems.splice(index,1); 
            }else{
                state.cartItems[index].quantity--;
            }
        }
        window.localStorage.setItem('cartItems',JSON.stringify(state.cartItems));
    },
    'EMPTY_CART'(state){
        state.cartItems = [];
        window.localStorage.removeItem('cartItems');
    },
    'REMOVE_ITEM'(state,id){
       const index = state.cartItems.findIndex(elem => elem.product_id == id);
       if(index !== -1){
         state.cartItems.splice(index,1); 
       }
      window.localStorage.setItem('cartItems',JSON.stringify(state.cartItems));
    }

}

const actions ={
    setCartItems:({commit}, payload)=>{
        commit('SET_CART_ITEMS', payload);
    },
    addItem:({commit},payload)=>{
        commit('ADD_TO_CART', payload);
    },
    removeItem:({commit}, payload)=>{
        commit('REMOVE_ITEM',payload);
    },
    emptyCart:({commit})=>{
        commit('EMPTY_CART');
    },
    increment:({commit},payload)=>{
        commit('INC',payload);
    },
    decrement:({commit},payload)=>{
        commit('DEC',payload);
    }

}
export default { state, getters ,mutations, actions }