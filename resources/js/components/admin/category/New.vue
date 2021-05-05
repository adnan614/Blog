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
                    <input type="text" class="form-control"  id="categoryId" placeholder="Enter Category Name" v-model="form.cat_name" :class="{'is-invalid' : form.errors.has('cat_name')}" name="cat_name" @keydown="form.errors.clear('cat_name')">
                  </div>
                  <span class="text-danger pt-3 pb-3" style="font-size:20px;" v-if="form.errors.has('cat_name')" v-text="form.errors.get('cat_name')"></span>
                 
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
                    this.$swal({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Category Added Successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.$router.push('/category-list')
                    this.form.reset() 
                      
                }).catch((error) => {
                    this.form.errors.record(error.response.data.errors)
                })
      }
  }
    
}
</script>