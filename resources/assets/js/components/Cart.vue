<template>
  <div>
      <div class="alert alert-info" v-if="cartItems.length === 0">
          <h4>Your cart is empty</h4>
      </div>
      <table class="table table-hover" v-else>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Add</th>
            <th>Deduct</th>
            <th>Remove</th>
        </tr>
        <tbody>
        <tr v-for="item in cartItems" :key="item.id"
          is="item-row" :item ="item"></tr>
        </tbody>
         <tr><td colspan="8"><hr style="margin:0"></td></tr>
          <tr><td colspan="4"><strong>Total cost</strong></td> <td colspan="4"> <b> $ {{ totalCost }}.00</b></td></tr>
      </table>
      <button  class="btn btn-danger">Empty Cart</button>
      <button class="btn btn-success pull-right">Make Your Order</button>
  </div>
</template>
<script>
    import CartItem from './CartItem.vue'
    export default {
        computed:{
            cartItems(){
                return this.$store.getters.cartItems;
            },
            totalCost(){
               let total =0;
               this.cartItems.forEach(element => {
                   total+= element.product_price * element.quantity;
               });
               return total
            }
        },
        components:{
            'item-row':CartItem
        },
        methods:{
            postOrder(){
                // axios.post('/api/')
            }
        }
    
    }
</script>

