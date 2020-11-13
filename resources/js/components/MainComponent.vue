<template>
    <div>
        <div class="container" style="width: 480px;">
        <h6>Select Department</h6>
        <select v-model="queryslug" class="form-control">
                <option class="font-weight-bold" value="">All Users</option>
                <option :value="department.slug" v-for="department in departments" :key="department.id">{{ department.name }}</option>
        </select>
        </div>

        <add-email @addEmailEvent="loadUsers" :users=users></add-email>

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
                    <td>
                        <span v-for="email in user.emails" :key="email.id">   
                            / {{ email.address }}
                        </span>
                    </td>
                    <td>
                        <span v-for="department in user.departments" :key="department.id">   
                            / {{ department.name }}
                        </span>
                    </td>
                </tr>                   
            </tbody>
        </table>
    </div>
</template>

<script>
import AddEmail from "../components/AddEmail";
    export default {
        components: {
            AddEmail,  
        },

        data() {
            return {
                loading: false,
                users: [], 
                departments: [],
                queryslug: "",  
            };
        }, 

        created() {
            this.loadUsers();
            this.loadDepartments();
        },

        methods: {
            loadUsers: function () {
                this.loading = true;
                axios.get(`/api/users?department=${this.queryslug}`)
                    .then((response) => {
                        this.users = response.data.data;                 
                        this.loading = false;
                    })
                    .catch(error => {
                        console.log(error);
                        this.loading = false;
                    });
            },
            loadDepartments: function () {           
                axios.get(`/api/departments`)
                    .then((response) => {
                        this.departments = response.data.data;                                     
                    })
                    .catch(error => {
                        console.log(error);                  
                    });
            },
        },
        
        watch: {
            queryslug: {
            handler: 'loadUsers',
            deep: true          
            }
        },    
    }
</script>

