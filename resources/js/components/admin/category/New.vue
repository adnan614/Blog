<template>
    
        <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @submit.prevent="addcategory">
                <div class="card-body">
                  <div class="form-group">
                    <label for="categoryId">Category Name</label>
                    <input type="text" class="form-control" id="categoryId" placeholder="Enter Category Name" v-model="form.cat_name" name="cat_name">
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          

            

          </div>
          <!--/.col (left) -->
         
        </div>
        <!-- /.row -->

</template>

<script>

export default {

  data(){
      return{
           form: new Form({
                    cat_name: '',
                })
      }
  },
  methods:{
      addcategory(){
               let data = new FormData();
                data.append('cat_name', this.form.cat_name)
             axios.post('add',data).then((res)=>{
                    this.form.reset()
                })
      }
  }
    
}
</script>