<template>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
      
        <li data-target="#carousel-example-generic" 
          v-for="(image,index) in images" :key="index"
           :class="{active: index == 0}"
           :data-slide-to="index">
         </li>
      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item"  v-for="(image,index) in images" :key="index"  :class="{active: index == 0}">
          <img :src="'/images/'+ image.image_url" alt="Product image" 
          width ="100%" height="300px" class="img-rounded">
        </div>
        
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
</template>
<script>
  export default {
    props:['images']
    
  }
</script>

