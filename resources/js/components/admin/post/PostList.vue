<template>
     <section class="content">
      <div class="row justify-content-center">
        <div class="col-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Post List</h3>
              <div class="card-tools">
                  <button class="btn btn-primary">
                      <router-link to="/add-post" style="color: #fff; text-decoration: none;">Add New Post</router-link>
                  </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>User</th>
                  <th>Category</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Photo</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr  v-for="(post,index) in allPost" :key="post.id">
                  <td>{{index +1}}</td>
                  <td v-if="post.user" > {{post.user.name}}</td>
                  <td v-else="" > </td>
                  <td v-if="post.category">{{post.category.cat_name}}</td>
                  <td>{{post.title}}</td>
                  <td>{{post.description | sortLength(30,"...")}}</td>
                  <td><img :src="post.image" width="40" height="50"></td>
                  <td>
                      <router-link  to="" class="btn btn-success">Edit</router-link>
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
    mounted(){
       this.$store.dispatch('getallpost')
    },
    computed:{
       allPost(){
         return this.$store.getters.getAllPost
       }
    },
    methods:{

    }
}
</script>

<style>

</style>