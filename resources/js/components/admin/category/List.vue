<template>
    
         <section class="content">
      <div class="row justify-content-center">
        <div class="col-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Category List</h3>
              <div class="card-tools">
                  <button class="btn btn-primary">
                      <router-link to="/add" style="color: #fff; text-decoration: none;">Add Category</router-link>
                  </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Category Name</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(category,index) in getAllCategory" :key="category.id">
                  <td>{{index + 1}}</td>
                  <td>{{category.cat_name}}
                  </td>
                  <td>{{category.created_at | timeformat}}</td>
                  <td>
                      <a href="" class="btn btn-success">Edit</a>
                      <a href="" class="btn btn-danger">Delete</a>
                  </td>
                 
                </tr>
               
                </tbody>
               
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

 
</template>

<script>
export default {
    name: "list",
    mounted(){
       this.$store.dispatch("allCategory")
    },
    computed:{
        getAllCategory(){
            return this.$store.getters.getCategory
        }
    },
    methods:{

    }
}
</script>