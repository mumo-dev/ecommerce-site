<template>
          <div class="row">
            <div v-if="products.length!==0">
                <div v-for="(product,index) in products" :key="index">              
                    <app-product :product="product"></app-product>
                    
                <div class="clearfix" v-if="(index+1)%3==0">
                </div> 
              </div>
            </div>
            <div v-else style="background-color:white;padding:20px;margin:20px;border-radius:4px;">
                <h3>Sorry, No items where found </h3>
            </div>
        </div>
</template>

<script>
 import Product from './Product.vue'
    export default {
       props:['products'],
       components:{
           'app-product':Product
       }
       
    }
</script>
