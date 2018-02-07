<template>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 class="mb-2 text-info" style="display:inline-block"> 
                <strong> {{ (product.name) }} </strong>
            </h2>
            <button class="btn btn-default btn-lg pull-right">
                <span class="badge">${{ product.price }}</span>
            </button>
        </div>

        <div class="panel-body">
            <span class="text-muted">
                <h3 class="mb-2 mt-2"><strong>Product Description:</strong></h3>
                <h4>{{ product.description }}</h4>

                </span>
            <hr class="mb-2 mt-2">
                <h3 class="mb-2"><strong>Product details:</strong></h3>
                <p>{{ product.details }}
                    <br><br>
                    
                    <button class="btn btn-primary" @click="addToCart" v-if="!inCart">
                            Add to cart
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </button>
                    <button v-else class="btn btn-danger"
                     @click="removeFromCart">Remove from cart</button>
                    
                </p>
        </div>
    </div>
</template>
<script>
    export default {
       props:['product'],
       computed:{
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
            },
            removeFromCart(){
               
                this.$store.dispatch('removeItem', this.product.id);
            }
        }
    }
</script>

