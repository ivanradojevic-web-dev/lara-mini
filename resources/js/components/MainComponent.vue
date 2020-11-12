<template>
    <div>
        
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email Addresses</th>
                        <th scope="col">Departments</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id">
                        <th scope="row">{{ user.id }}</th>
                        <td>{{ user.name }}</td>
                        <td>{{ user.emails }}</td>
                        <td>{{ user.departments }}</td>
                    </tr>                   
                </tbody>
        </table>
    </div>
</template>

<script>
    export default {

        data() {
            return {
                loading: false,
                users: null,                
            };
        }, 

        created() {
            this.loadUsers();
        },

        methods: {

            loadUsers: function () {
                this.loading = true;
                axios.get(`/api/users`)
                    .then((response) => {
                        this.users = response.data.data;                 
                        this.loading = false;
                    })
                    .catch(error => {
                        console.log(error);
                        this.loading = false;
                    });
            },


        },


    }
</script>
