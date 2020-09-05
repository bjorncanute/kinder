<template>
    <div>
    
        <div class="collection-sketches-block" style="background:white;height:400px;">

            <draggable :list="sketchesMutable" :options="{animation:200}" :element="'div'">
            
                <div v-for="(sketch, index) in sketchesMutable"  class="sketch-item" style="margin:10px;float:left;">
                    <div class="thumbnail-image" style="height: 120px; width: 180px; overflow: hidden; position: relative">
                        <img :src="'/storage/' + sketch.thumbnail" alt="" width="100%">


                        <div class="corner-order-number" style="position: absolute;top:0;left:0;width:40px;height:40px;background:white;text-align:center;line-height:40px;">1</div>
                    </div>

                    <form :action="'/sketches/' + sketch.id" method="POST">
                        <input type="hidden" name="_token" :value="csrf">
                        <input type="hidden" name="_method" value="delete">

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </draggable>


        </div>      
    </div>

    

</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        components: {
            draggable
        },

        props: ['sketches'],

        data() {
            return {
                sketchesMutable: this.sketches,
                csrf: document.head.querySelector('meta[name="csrf-token"]').content
            }
        },
        
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
