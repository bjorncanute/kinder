<template>
    <div>
    
        <div class="collection-sketches-block update-collection" style="background:white;height:400px;">

            <!-- <div v-for="collection_item in collectionsList" v-bind="collection">
                <h2>hello world</h2>
                <div>{{collection_item.name}}</div>
            </div> -->
            

            <draggable :list="sketchesMutable" :options="{animation:200}" :element="'div'" @change="update">
            
                <div v-for="(sketch, index) in sketchesMutable" v-bind="sketch"  class="sketch-item" style="margin:10px;float:left;">
                    <div class="thumbnail-image" style="height: 120px; width: 187px; overflow: hidden; position: relative">
                        <img :src="'/storage/' + sketch.thumbnail" alt="" width="100%" style="width: 187px; height: 120px; object-fit: cover; object-position: 50% -19.5812px;">

                        
                        <div class="corner-order-number" style="position: absolute;top:0;left:0;width:40px;height:40px;background:white;text-align:center;line-height:40px;"> {{sketch.pivot.order}} </div>
                    </div>

                    <!-- fade block -->
                    <div class="fade-block"></div>
                    
                    <!-- corner dropdown -->

                    <div class="dropdown corner-dropdown">
                        <a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary" data-target="#" href="#">
                            ... <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
                            <li><a class="dropdown-item" href="#">Use as Cover Image</a></li>
                            
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" tabindex="-1" href="#">Move Deviation to</a>
                                <ul class="dropdown-menu">
                                    <li  v-for="collection_item in collections_list" v-bind="collection">

                                        <a @click="move(collection.id, collections_item.id, sketch.id)"
                                            class="dropdown-item" 
                                            tabindex="-1" 
                                            href="#">{{collection_item.name}}</a></li>

                                </ul>
                            </li>

                            <li class="dropdown-submenu">
                                <a class="dropdown-item" tabindex="-1" href="#">Copy Deviation to</a>
                                <ul class="dropdown-menu">
                                    <li  v-for="collection_item in collections_list" v-bind="collection">

                                        <a @click="move(collection.id, collections_item.id, sketch.id)"
                                            class="dropdown-item" 
                                            tabindex="-1" 
                                            href="#">{{collection_item.name}}</a></li>
                                </ul>
                            </li>

                            <li class="dropdown-divider"></li>

                            <li><a @click="remove(sketch.id)"
                                    class="dropdown-item" 
                                    href="#">Remove from Collection</a></li>

                        </ul>
                    </div>
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

        props: ['sketches', 'collection', 'collections_list'],

        data() {
            return {
                sketchesMutable: this.sketches,
                collectionsList: this.collections_list,
                csrf: document.head.querySelector('meta[name="csrf-token"]').content
            }
        },

        methods: {
            update() {
                this.sketchesMutable.map((sketch, index) => {
                    sketch.pivot.order = index + 1;
                });

                console.log(this.collection.id);

                axios.patch('/collections/updateAll', {
                    sketches: this.sketchesMutable,
                    collection_id: this.collection.id
                });
            },

            remove(sketch_id) {
                axios.post('/collections/removeSketch', {
                    sketch_id: sketch_id,
                    collection_id: this.collection.id
                })
            },

            move(src, dst, sketch) {
                // console.log("{src}");
                axios.post('/collections/' + src + '/' + dst + '/moveSketch', {
                    sketch: sketch

                })
            },

            copy: function (collection, sketch) {
                console.log(sketch);
                axios.patch('/collections/copySketch/' + collection + '/' + sketch, {

                })
            }
            
        },
        
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
