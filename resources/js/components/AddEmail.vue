<template>
    <div>

        <!-- Button trigger modal -->
        <a href="#" class="btn btn-warning" @click="openModal">Insert Email</a>

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
                            <div v-if="errorMessage" class="text-danger">{{errorMessage}}</div>

                            <label>Choose User</label>    
                            <select v-model="id" class="form-control">                          
                                <option :value="user.id" v-for="user in users" :key="user.id">{{ user.name }}</option>
                            </select>

                            <div class="form-group mt-4">
                                <label for="exampleFormControlInput1">Address</label>
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
            users: {
                type: Array,
                required: true
            }
        },

        data() {
            return {               
                email: "", 
                id: "",
                errorMessage: "",              
            };
        }, 

        methods: {
            openModal(user) {
                $('#exampleModalCenter').modal('show');       
            }, 
            addEmail() {
                axios.post('/api/emails', {
                    id: this.id,
                    address: this.email
                })
                .then((response) => {
                    $('#exampleModalCenter').modal('hide');
                    this.clearEmail();  
                    this.$emit("addEmailEvent")               
                    })           
                .catch(error => {
                    const key = Object.keys(error.response.data.errors)[0]
                    this.errorMessage = error.response.data.errors[key][0]
                });                
            },
            clearEmail() {
                this.id = "";
                this.email = "";
                this.errorMessage: "",
            },
        },
    }
</script>

