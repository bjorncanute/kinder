<template>
  <div>
    <a href="" @click.prevent="show(); getSketches();">Show ME</a>
    <modal name="modal-login" :height="850" :width="1120">
        <header class="modal-header d-flex">
            <h1 class="mr-auto">Add Deviation</h1>
            <button class="close ml-auto">✖</button>
        </header>

        
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Collections</a></li>
                <!-- <li class="breadcrumb-item active" aria-current="page">Fantasy</li> -->
            </ol>
        </nav>

        <div class="body">
            <div class="collections-select">


                <!-- <button class="btn btn-primary" @click="getSketches()" v-text="dynamic"></button> -->
                <!-- <div class="hello-wordl" v-text="dynamic"></div> -->

                <!-- <a v-for="sketch in sketches" v-bind="sketch" class="results" class="collections-select">
                    <img src="" alt="">
                    <div class="nav-item"></div>
                    <div class="number-of-deviations"> deviations</div>
                </a> -->

                <!-- COLECTIONS FOR EACH -->
                <!-- <div class="test" v-for="data in dynamic">
                    {{data}}
                    <div class="id">{{data.id}}</div>
                    <div class="name">{{data.name}}</div>
                    <div class="order">{{data.order}}</div>
                </div> -->

                <div class="sketches-select d-flex">
                    <!-- SKETCHES FOR EACH -->
                    <!-- <a :value="data.id" class="sketch-item" v-for="(data, index) in dynamic" @click="addToSelected(index)"> -->
                        <!-- <div class="id">{{data.id}}</div> -->
                    <a  :value="data.id" 
                        :class="'sketch-item ' + isSelected(data.id)" 
                        v-for="data in dynamic" 
                        :key="data.id"
                        @click="addOrRemove(data.id);">
                        <div class="thumbnail-image" style="height: 120px; width: 187px; overflow: hidden; position: relative">
                            <img :src="'/storage/' + data.thumbnail" alt="" width="100%" style="width: 187px; height: 120px; object-fit: cover; object-position: 50% -19.5812px;">
                        </div>
                    </a>

                </div>

                <button @click="addToCollection()" class="btn btn-primary ml-auto">Add</button>


            </div>
        </div>
    </modal>
</div>
</template>

<script>
import axios from 'axios';

export default {

    data() {
        return {
            sketches: [],
            selected: []
            // clicked: false
        }
    },

    methods: {
        show () {
            this.$modal.show('modal-login');
        },
        hide () {
            this.$modal.hide('modal-login');
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
        },
        addToCollection() {
            axios.post('/addToCollection', {
                collection: 1,
                sketches: this.selected
            })
        },

        getSketches () {
            axios.get('/sketches_json/', {
                params: {
                    collection_id: 2
                }
            })
            .then((response) => {
                console.log(response.data);
                console.log(response.status);
                this.sketches = response.data;
            });

            


            
        }
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