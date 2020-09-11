<template>
  <div>
    <a href="" @click.prevent="show(); getCollectionsJSON();" class="btn btn-outline-dark mr-auto" style="height: 40px;">Add Deviation</a>
    <modal name="modal-add-sketch" :height="850" :width="1120">
        <header class="modal-header d-flex">
            <h1 class="mr-auto">Add Deviations</h1>
            <button class="close ml-auto">✖</button>
        </header>

        
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Collections</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Fantasy</li> -->
            </ol>
        </nav>

        <div class="body">
            <div class="collections-select d-flex">
                <!-- ALL COLLECTION -->
                <a @click="selectAll()" class="collection-item">
                    <div class="thumbnail-image">
                        <img :src="'/cover_image/' + user + '/0'" alt="">                        
                    </div>
                    <div class="collection-name">All</div>
                </a>

                <!-- COLLECTIONS FOR EACH -->
                <a class="collection-item" 
                   v-for="collection in collections" 
                   v-bind="collection.id" 
                   @click="selectCollection(collection.id)">
                    

                    <div class="thumbnail-image">
                        <!-- <img :src="'/storage/' + collection.coverImage" alt=""> -->
                        <!-- <img :src="'/cover_image/1/' + collection.id" alt=""> -->
                        <img :src="'/cover_image/' + user + '/' + collection.id" alt="">
                    </div>
                    <div class="collection-name">{{collection.name}}</div>
                </a>

            </div>
        </div>
    </modal>

    <modal name="modal-select-sketches" :height="850" :width="1120">
       

        <div class="sketches-select d-flex flex-wrap">
            <!-- SKETCHES FOR EACH -->
            <a  v-for="sketch in sketches" 
                :value="sketch.id" 
                :class="'sketch-item ' + isSelected(sketch.id)" 
                :key="sketch.id"
                @click="addOrRemove(sketch.id);">
                <div class="thumbnail-image" style="height: 120px; width: 187px; overflow: hidden; position: relative">
                    <img :src="'/storage/' + sketch.thumbnail" alt="" width="100%" style="width: 187px; height: 120px; object-fit: cover; object-position: 50% -19.5812px;">
                </div>
            </a>

        </div>

        <button @click="addToCollection()" class="btn btn-primary ml-auto">Add</button>

        
    </modal>
 
    
</div>
</template>

<script>
import axios from 'axios';

export default {

    props: ['collection', 'user'],


    data() {
        return {
            sketches: [],
            selected: [],
            collections: [],
            collection: this.collection
            // clicked: false
            // currentCollection: 0,
        }
    },

    methods: {
        show () {
            this.$modal.show('modal-add-sketch');
        },
        hide () {
            this.$modal.hide('modal-add-sketch');
        },

        selectCollection (collection_id) {
            // this.$modal.hide('modal-select-collection');
            this.$modal.show('modal-select-sketches');
            this.getSketchesJSON(collection_id);
            // currentCollection = collection_id;
        },

        selectAll() {
            this.$modal.show('modal-select-sketches');
            this.getSketchesJSON(0);
        },
        
        getCollectionsJSON() {
            axios.get('/get_collections_json/', {
                
            })
            .then((response) => {
                this.collections = response.data;
            });  
        },

        getSketchesJSON(collection_id) {
            axios.get('/get_sketches_json/', {
                params: {
                    collection_id: collection_id
                }
            })
            .then((response) => {
                this.sketches = response.data;
            });
        },

        addToCollection() {
            // var pageURL = window.location.href;
            // var collection_id = pageURL.substr(pageURL.lastIndexOf('/') + 1);

            axios.post('/addToCollection', {
                collection: this.collection.id,
                sketches: this.selected
            })
            



        },

        addOrRemove(id) {
            var index = this.selected.indexOf(id);
            if (index === -1) {
                this.selected.push(id);
            } else {
                this.selected.splice(index, 1);
            }

            console.log(this.selected);
        },

        isSelected(id) {
            if (this.selected.includes(id)) {
                return 'selected';
            } else {
                return '';
            }
        }
        
    },
    mount () {
        this.show()
    },
    
    computed: {
        collections() {
            return this.collections;
        },
        sketches() {
            return this.sketches;
        }
    }
}
</script>