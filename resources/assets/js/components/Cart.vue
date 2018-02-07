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
      <button  class="btn btn-danger" @click="emptyCart" v-if="cartItems.length !== 0">Empty Cart</button>
      <button class="btn btn-success pull-right" @click="postOrder" v-if="cartItems.length !== 0">Make Your Order</button>
  </div>
</template>
<script>
    import swal from 'sweetalert'
    import CartItem from './CartItem.vue'
    export default {
        props:['id'],
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
                swal({
                    title:'Confirmation',
                    text:'Are you really sure you want to make this order?',
                    icon:'warning',
                    buttons:true
                }).then((willbook)=>{
                      if(willbook){
                        const  data ={
                            orders: this.cartItems,
                            userId: this.id
                        };
                        axios.post('/api/orders',data)
                        .then(response=>{
                            if(response.status == 200){
                            swal('ORDER','The Order has successfully  been recieved','success');
                            this.$store.dispatch('emptyCart');
                            }
                        }).catch(err=> console.log(err));

                      }else{
                          swal('Order  cancelled');
                      }
                    
                });
                
            },
            emptyCart(){
                this.$store.dispatch('emptyCart');
            }
        }
    
    }
</script>

