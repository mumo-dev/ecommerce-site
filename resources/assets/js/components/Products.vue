<template>
          <div class="row">

            <div v-for="(product,index) in products" :key="index">              
                <app-product :product="product"></app-product>
                  
            <div class="clearfix" v-if="(index+1)%3==0">
            </div> 
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
