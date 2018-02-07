<template>
  <div>
      <div v-if="loading">
          <p>Loading...</p>
      </div>
      <div v-if="errors">
          <div class="alert alert-warning">
              <p class="text-muted">Error fetching data from server</p>
          </div>
      </div>
     
     <div>
         
         <ul class="list-group">
            <li class="list-group-item" v-for="review in reviews" :key="review.id">
               <span class="pull-right clearfix text-success"><small>
                  <strong>  {{ review.user.name }} :</strong>
                     {{ date(review.created_at) }}</small></span>
               <br>
                <p class="text-muted">
                    {{ review.review }}
                </p>

            </li>
            
        </ul>

        <div v-if="reviews.length===0">
            <div class="alert alert-warning">Currently there are no reviews for this product</div>
         </div>
     </div>

  </div>
</template>
<script>
   import moment from 'moment'
    export default {
        props:['product_id'],
        
        data(){
          return{
              loading:'',
              errors:''
          }
        },
        computed:{
           reviews(){
               return this.$store.getters.reviews;
           },
           
        },
    
        created(){
             this.fetchReviews();
        },

        methods:{
            fetchReviews(){
                this.loading = true;
                axios.get('/api/reviews/'+this.product_id)
                  .then(response=>{
                    this.loading = false;
                    this.$store.dispatch('setReviews',  response.data);
                  }).catch(err=>{
                       this.errors = err.data;
                       console.log(err)
                  })
            },
            date(dateString){
                return moment(dateString).fromNow();
            }

        }
    
    }
</script>

