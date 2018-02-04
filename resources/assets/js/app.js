

import './bootstrap';
import Vue from 'vue';
window.Vue = Vue;

import Products from './components/Products.vue';
import Slider from './components/ImageSlider.vue';
import Reviews from './components/Reviews.vue';

Vue.component('app-products',Products);
Vue.component('app-image-slider',Slider);
Vue.component('app-reviews',Reviews);
const app = new Vue({
    el: '#app',
   
    data:{
      products:[],
      searchItem:'',
      pagination:{},
      category:'',
      review:''
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
                this.searchItem ='';
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
        },
        submitReview(id,user){
            axios.post('/api/reviews/'+id,{
                'review':this.review,
                'user_id': user
            })
              .then(response=>{
                  this.review =''
              })
        }
    },
    computed:{
        categories(){
            
        }
    }
});
