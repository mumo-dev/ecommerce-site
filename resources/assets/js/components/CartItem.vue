<template>
  <tr>
      <td>{{ item.product_id }}</td>
      <td>{{ item.product_name}}</td>
      <td>{{ item.product_price }}</td>
      <td>{{ item.quantity }}</td>
      <td>{{ item.product_price * item.quantity }}</td>
      <td class="pad"> <button class="btn btn-sm btn-info" @click="increment">+</button></td>
      <td> <button class="btn btn-sm btn-warning" @click="decrement">-</button></td>
      <td><button class="btn btn-sm btn-danger" @click="removeFromCart">Remove</button></td>
  </tr>
</template>
<script>
    export default {
       props:['item'],

       methods:{
           removeFromCart(){
               this.$store.dispatch('removeItem',this.item.product_id);
           },
           increment(){
              this.$store.dispatch('increment',this.item.product_id);
           },
           decrement(){
              this.$store.dispatch('decrement', this.item.product_id);
           }
       }
    }
</script>
<style scoped>
   .pad{
     padding:4px
   }
</style>


