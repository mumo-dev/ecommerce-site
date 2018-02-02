

import './bootstrap';
import Vue from 'vue';
window.Vue = Vue;

import Products from './components/Products.vue';
import Paginate from './components/Paginate.vue';

Vue.component('app-products',Products);
Vue.component('app-paginate',Paginate);
const app = new Vue({
    el: '#app',
   
    data:{
      products:[],
      searchItem:'',
      pagination:{},
      
    },
    created(){
         this.fetchProducts();
         console.log("created");
    },
    methods:{
        fetchProducts(url){
            url = url || '/api/products';
            axios.get(url).then(({data})=>{
                console.log(data);
                this.products = data.data;
                this.makePagination(data);
            }).catch(err=>{
                console.log(err);
            })
        },
        makePagination(data){
            const pages={
                previous_url:data.prev_page_url,
                next_url: data.next_page_url,
                current_page: data.current_page,
                last_page : data.last_page
            };
            this.pagination = pages;
        }
    },
    computed:{
        categories(){
            
        }
    }
});
