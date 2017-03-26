<template>
   <div id="app">
      <div class="row">
        <div class="col-lg-12 margin-tb">
         <div class="pull-left">
           <h2>Customers</h2>
         </div>
         <div class="pull-right">
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create-customers">
             Create Customer
           </button>  
         </div>  
        </div>
      </div>
      <table class="table table-striped">
        <thead>
        	<th>Id</th>
        	<th>Name</th>
        	<th>Email</th>
        	<th>Action</th>
        </thead>
        <tbody>
        	<tr v-for="customer in customers.data">
        		<td>{{customer.id}}</td>
        		<td>{{customer.name}}</td>
        		<td>{{customer.email}}</td>
        		<td>
                   <button type="submit" class="btn btn-success" @click.prevent="editCustomer(customer)">Edit</button>
                   <button type="submit" class="btn btn-danger" @click.prevent="deleteCustomer(customer)">Delete</button> 
        		</td>
        	</tr>
        </tbody>
      </table>

      <!--pagination-->
      <nav class="text-center">
        <ul class="pagination">
          <li v-if="pagination.current_page > 1">
             <a class="page-link" href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page - 1)">
                <span aria-hidden="true">Previous</span>
             </a>
         </li>
         <li v-for="page in pageNumber" v-bind:class="[ page = isActived ? 'active' : '']">
            <a href="#" @click.prevent="changePage(page)">{{ page }}</a>
         </li>
         <li v-if="pagination.current_page < pagination.last_page">
             <a class="page-link" href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)">
               <span aria-hidden="true">Next</span>
             </a>
         </li>
        </ul>
      </nav>

      <!--Create Customer-->
      <div class="modal fade" id="create-customers" >
         <div class="modal-dialog" role="document">
         <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" v-on:submit.prevent="createCustomer">
          <div class="form-group">
             <span for="name">Name</span>
             <input type="text" name="name" id="name" placeholder="Name ..." v-model="newCustomer.name">
             <span v-if="formError['name']" class="error text-danger">{{formError['name']}}</span>
          </div>
          <div class="form-group">
             <span for="email">Email</span>
             <input type="email" name="email" id="email" placeholder="Email ..." v-model="newCustomer.email">
             <span v-if="formError['email']" class="error text-danger">{{formError['email']}}</span>
          </div>
          <div class="form-group">
             <span for="password">Password</span>
             <input type="password" name="password" id="password" placeholder="Name ..." v-model="newCustomer.password">
             <span v-if="formError['password']" class="error text-danger">{{formError['password']}}</span>
          </div>
          <div class="form-group">
             <span for="confirm_password">Confirm Password</span>
             <input type="password" name="confirm_password" id="confirm_password" placeholder="Password Confirm ...">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
   </div>
  </div>  

    <!--Create Customer-->
      <div class="modal fade" id="edit-customers" >
         <div class="modal-dialog" role="document">
         <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" v-on:submit.prevent="updateCustomer(fillCustomer.id)">
          <div class="form-group">
             <span for="name">Name</span>
             <input type="text" name="name" id="name" placeholder="Name ..." v-model="updateCustomer.name">
             <span v-if="formErrorUpdate['name']" class="error text-danger">{{formErrorUpdate['name']}}</span>
          </div>
          <div class="form-group">
             <span for="email">Email</span>
             <input type="email" name="email" id="email" placeholder="Email ..." v-model="updateCustomer.email">
             <span v-if="formErrorUpdate['email']" class="error text-danger">{{formErrorUpdate['email']}}</span>
          </div>
          <div class="form-group">
             <span for="password">Password</span>
             <input type="password" name="password" id="password" placeholder="Name ..." v-model="updateCustomer.password">
             <span v-if="formErrorUpdate['password']" class="error text-danger">{{formErrorUpdate['password']}}</span>
          </div>
          <div class="form-group">
             <span for="confirm_password">Confirm Password</span>
             <input type="password" name="confirm_password" id="confirm_password" placeholder="Password Confirm ...">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

   </div>
</template>

<script>
   export default {
       data() {
         return {
           customers: [],
           pagination: {},
           offset: 4,
           formError: {},
           formErrorUpdate: {},
           newCustomer: {'name': '', 'email': '', 'password': ''},
           fillCustomer: {'name': '', 'email': '', 'password': '', 'id': ''}
         }
       },

       computed: {
           isActived: function() {
              return this.pagination.current_page;
           },
           pageNumber: function() {
              if(!this.pagination.to) {
                 return [];
              }

              var from = this.pagination.current_page - this.offset;
              if(from < 1) {
                 from =1;
              }           

              var to = from + (this.offset*2);
              if(to >= this.pagination.last_page) {
                 to = this.pagination.last_page;
              }

              var pagesArray = [];
              while(from <= to) {
                 pagesArray.push(from);
                 from++;
              }

              return pagesArray;
           }
       },

       created() {
          this.fetchCustomers(this.pagination.current_page);
       },

       methods: {
          fetchCustomers(page) {
             this.$http.get('/customer?page='+page).then(function(response) {
                 this.customers = response.data;
                 this.pagination = response.data;
             });
          },

          changePage(page) {
             this.pagination.current_page = page;
             this.fetchCustomers(page);
          },

          createCustomer() {
             var input = this.newCustomer;
             this.$http.post('/customer', input).then(function(response) {
                 this.changePage(this.pagination.current_page);
                 this.newCustomer = {'name': '', 'email': '', 'password': ''};
                 $('#create-customer').modal('hide');
                 toastr.success('Created Customer Successfully', 'Alert Success', {timeOut:5000});
             }, function(response) {
                  this.formError = response.data;
             });
          },

          deleteCustomer(customer) {
             this.$http.delete('/customer' + customer.id).then(function(response) {
                 this.changePage(this.pagination.current_page);
                 toastr.success('Deleted Customer Successfully', 'Alert Success', {timeOut:5000});
             });
          },

          editCustomer(customer) {
             this.fillCustomer.name = customer.name;
             this.fillCustomer.email = customer.email;
             this.fillCustomer.password = customer.password;
             $('#edit-customers').modal('show');
          },

          updateCustomer(id) {
            var input = this.fillCustomer;
            this.$http.put('/customer' + id, input).then(function(response) {
                this.changePage(this.pagination.current_page);
                this.updateCustomer = {'name':'', 'email': '', 'password': '', 'id': ''};
                $('#edit-customers').modal('hide');
                toastr.success('Updated Customer Successfully', 'Alert Success', {timeOut:5000});
            }, function(response) {
                 this.formErrorUpdate = response.data;
            });
          }
       }
   }
</script>

<style>
   padding-top: 20px;
</style>