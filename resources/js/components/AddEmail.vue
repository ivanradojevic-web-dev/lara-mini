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
                            <div class="form-group">
                                <label for="exampleFormControlInput1"></label>
                                <input v-model="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button @click="clearEmail" type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
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

        props: {
            userId: {
                type: Number,
                required: true
            }
        },

        data() {
            return {               
                email: "", 
                id: this.userId              
            };
        }, 

        methods: {

            openModal() {
                $('#exampleModalCenter').modal('show');       
            }, 

            addEmail() {
                axios.post('/api/emails', {
                    id: this.id,
                    address: this.email
                })
                .then((response) => {
                    $('#exampleModalCenter').modal('hide');                 
                    })           
                .catch(error => {
                    console.log(error);                  
                });                
            },

            clearEmail() {
                this.email = "";
            },

        },


    }


</script>

<style>

</style>
