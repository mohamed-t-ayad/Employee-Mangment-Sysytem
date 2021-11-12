<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-5 w-100">
            <h1 class="h3 mb-0 text-gray-800">Employees</h1>
        </div>

        <div class="container m-auto text-center py-4 m-auto justify-content-center align-items-center">
                <div v-if="showMessage" class="alert alert-info mt-3 w-75 mx-auto mb-2">
                    {{ message }}
                </div>

            <!--  Employees Search Form   -->
            <div class="row w-75 m-auto mt-2">
                <div class="col">
                    <form>
                        <div class="input-group mb-1">
                            <input v-model="search" type="search" class="form-control mr-1 rounded" placeholder="search employees" >
                            <select v-model="selectedDeprtment" name="department" class="form-control mr-1 rounded" aria-label="Default select example">
                                <option v-for="department in departments" :key="department.id" :value="department.id">{{department.name}}</option>
                            </select>
                            <button type="submit" class="input-group-text btn btn-success">search</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- {{-- Start Countries Table --}} -->
            <div class="row w-75 m-auto">
                <div class="col">
                    <table class="table table-responsive-sm">
                        <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col"> Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Department</th>
                            <th scope="col">Manage</th>
                        </tr>
                        </thead>
                        <tbody class="">
                            <tr v-for="employee in employees" :key="employee.id">
                                <th scope="row">{{ employee.id }}</th>
                                <td>{{ employee.first_name }} {{ employee.last_name }}</td>
                                <td>{{ employee.address}}</td>
                                <td>{{ employee.department.name }}</td>
                                <td>
                                    <router-link :to="{name:'EmployeesEdit' , params: {id: employee.id}}" class="btn btn-sm btn-info">
                                        <i class="far fa-edit"></i>
                                    </router-link>
                                    <button class="btn btn-sm btn-danger" @click="deleteEmployee(employee.id)">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <router-link :to="{name:'EmployeesCreate'}" class="btn btn-sm btn-primary float-left">
                        <i class="fas fa-plus"></i>
                            Add Employee
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {

            employees: [],
            showMessage: false,
            message: "",
            search: null,
            selectedDeprtment: null,
            departments: []
        };
    },
    watch: {
        search() {
            this.getEmployees();
        },
        selectedDeprtment() {
            this.getEmployees();
        }
    },
    created() {
        this.getEmployees();
        this.getDepartments();
    },
    methods: {
        getEmployees() {
            axios
                .get("/api/employees", {
                    params: {
                        search: this.search,
                        department_id: this.selectedDeprtment
                    }
                })
                .then(res => {
                    this.employees = res.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getDepartments() {
            axios
                .get("/api/employees/departments")
                .then(res => {
                    this.departments = res.data;
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
        deleteEmployee(id) {
            axios.delete("api/employees/" + id).then(res => {
                this.showMessage = true;
                this.message = res.data;
                this.getEmployees();
            });
        }
    }
};
</script>
