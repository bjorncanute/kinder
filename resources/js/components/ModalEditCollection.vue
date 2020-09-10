<template>
  <div>
    <a @click.prevent="show();"
       class="btn btn-outline-dark edit-button d-flex" 
       style="height:32px;">
                    <span class="icon edit-icon" style="height: 24px; width: 24px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20.389 6.4503l-3-3-1.46-1.45-1.41 1.42-11.52 11.58-1 .97v6.03h5.987l1.013-1 11.41-11.76 1.39-1.41-1.41-1.38zm-4.45-1.62l3 3-.88.87-3-3 .88-.87zm.74 5.33l-8.21 8.2-2.801-3.0118 8.0028-8.099 3.0083 2.9108zm-12.68 9.84v-3.17l3.0433 3.17H3.9991z"></path></svg></span><span>Edit</span></a>

    <modal name="modal-edit-collection" :height="850" :width="1120">
        <header class="modal-header d-flex">
            <h1 class="mr-auto">Gallery</h1>
            <!-- <button class="close ml-auto">✖</button> -->
            <div class="ml-auto">
                <!-- <modal-add-sketch></modal-add-sketch> -->
                <modal-select-collection :collection="collection"></modal-select-collection>
            </div>
        </header>


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Collections</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{collection.name}}</li>
            </ol>
        </nav>
        <div class="subheader">
            <p>Add new deviations and drag to reorder them. You can also edit your Collection info.</p>
        </div>

        <div class="body">
            <div class="collection-sketches">
                <draggable :list="sketches" :options="{animation:200}" :element="'div'" @change="update">
            
                    <div v-for="(sketch) in sketches" v-bind="sketch"  class="sketch-item" style="margin:10px;float:left;">
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
                                        <li  v-for="(collection_item, index) in collections_list" v-bind="index">

                                            <a @click="moveSketchToCollection(sketch.id, collection_item.id)"
                                                class="dropdown-item" 
                                                tabindex="-1" 
                                                href="#">{{collection_item.name}}</a></li>

                                    </ul>
                                </li>

                                <li class="dropdown-submenu">
                                    <a class="dropdown-item" tabindex="-1" href="#">Copy Deviation to</a>
                                    <ul class="dropdown-menu">
                                        <li  v-for="collection_item in collections_list" v-bind="collection">

                                            <a @click="copySketchToCollection(sketch.id, collection_item.id,)"
                                                class="dropdown-item" 
                                                tabindex="-1" 
                                                href="#">{{collection_item.name}}</a></li>
                                    </ul>
                                </li>

                                <li class="dropdown-divider"></li>

                                <li><a @click="removeSketchFromCollection(sketch.id)"
                                        class="dropdown-item" 
                                        href="#">Remove from Collection</a></li>

                            </ul>
                        </div>
                    </div>
                </draggable>

            </div>
        </div>
    </modal>
</div>
</template>

<script>
import axios from 'axios';
import draggable from 'vuedraggable';


export default {

    components: {
        draggable
    },

    props: ['collection', 'sketches', 'collections_list'],

    data() {
        return {
            collection: this.collection,
            sketches: this.sketches,
            collections_list: this.collections_list,
        }
    },

    methods: {
        update() {
            this.sketches.map((sketch, index) => {
                sketch.pivot.order = index + 1;
            });

            axios.patch('/updateAllSketches', {
                sketches: this.sketches,
                collection_id: this.collection.id
            });
        },

        removeSketchFromCollection(sketch_id) {
            axios.post('/removeSketchFromCollection/', {
                sketch_id: sketch_id,
                collection_id: this.collection.id
            })
        },

        moveSketchToCollection(sketch_id, dst_id) {
            axios.post('/moveSketchToCollection', {
                sketch_id: sketch_id,
                src_id: this.collection.id,
                dst_id: dst_id

            })
        },

        copySketchToCollection(sketch_id, collection_id) {
            axios.post('/copySketchToCollection/', {
                sketch_id: sketch_id,
                collection_id: collection_id
            })
        },

        show () {
            this.$modal.show('modal-edit-collection');
        },
        hide () {
            this.$modal.hide('modal-edit-collection');
        },

    },
    mount () {
        this.show()
    },
    
    computed: {
        dynamic() {
            return this.sketches;
        }
    }
}
</script>