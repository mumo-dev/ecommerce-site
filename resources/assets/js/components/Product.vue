<template>
    <div class="col-md-4">
        <div class="panel panel-default">
                <div class="panel-body">
                    <p> <strong style="font-size:20px;">{{ product.name }}</strong>
                    <button class="btn  btn-default pull-right" type="button">
                            <span class="badge">${{ product.price }}</span>
                            </button>
                        </p>
                
                <img :src= "'/images/'+image" class="image"
                    width="100px" height="100px">
                {{  product.details }}
                <p>
                    <br>
                    <button class="btn btn-primary" @click="addToCart" v-if="!inCart">
                            Add to cart
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </button>
                    <button v-else class="btn btn-danger"
                     @click="removeFromCart">Remove from cart</button>
                    <a :href="'/products/'+product.id" class=" btn btn-default pull-right" >view details</a>
         
                </p>
                
                </div>
        </div>
    </div>
</template>
<script>
    export default {
        props:['product'],
        computed:{
            image(){
                if(this.product.images.length == 0)
                    return 'photo1.jpg';
                return this.product.images[0].image_url;
            },
            inCart(){
              
                const index = this.itemsInCart.findIndex(elem=> elem.product_id == this.product.id);
                return index !== -1 ? true : false;
                
            },
            itemsInCart(){
              return  this.$store.getters.cartItems;
             }
        },
        methods:{
            addToCart(){
                const data ={
                    id:this.product.id,
                    name:this.product.name,
                    price:this.product.price,
                    quantity:1
                };
                this.$store.dispatch('addItem',data);
                //add to local storage
            
                //add item to db
           
               
            },
            removeFromCart(){
                // console.log()
                this.$store.dispatch('removeItem', this.product.id);
            }
        }

    
    }
</script>

