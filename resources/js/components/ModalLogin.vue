<template>
  <div>
    <a href="" @click.prevent="show">Show ME</a>
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
                <a href="#" class="collection-box">
                    <img src="" alt="">
                    <div class="nav-item">All</div>
                    <div class="number-of-deviations">2846 deviations</div>
                </a>
            </div>
        </div>
    </modal>
</div>
</template>

<script>
export default {
    methods: {
        show () {
            this.$modal.show('modal-login');
        },
        hide () {
            this.$modal.hide('modal-login');
        }
    },
    mount () {
        this.show()
    }
}
</script>