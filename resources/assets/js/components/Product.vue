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
                    <button class="btn btn-primary">
                            Add to cart
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </button>
                    <a href="#" class=" btn btn-default pull-right" >view details</a>

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
            }
        }

    
    }
</script>

