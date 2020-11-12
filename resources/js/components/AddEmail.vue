<template>
    <div>

        <!-- Button trigger modal -->
        <a href="#" class="btn btn-warning" @click="openModal">Insert</a>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Insert New Email Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                    </div>

                    <form @submit.prevent="addEmail">
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

    export default {

        methods: {

            openModal() {
                $('#exampleModalCenter').modal('show');       
            }, 

            addEmail() {
                alert("zdravo");
            },

        },


    }


</script>

<style>

</style>
