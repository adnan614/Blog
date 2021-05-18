<template>
    
        <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" @submit.prevent="updatecategory">
                <div class="card-body">
                  <div class="form-group">
                    <label for="categoryId">Category Name</label>
                    <input type="text" class="form-control"  id="categoryId" placeholder="Enter Category Name" v-model="form.cat_name" :class="{'is-invalid' : form.errors.has('cat_name')}" name="cat_name" @keydown="form.errors.clear('cat_name')">
                  </div>
                  <span class="text-danger pt-3 pb-3" style="font-size:20px;" v-if="form.errors.has('cat_name')" v-text="form.errors.get('cat_name')"></span>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">update</button>
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

import Form from 'vform'

export default {

    mounted() {
        axios.get(`category/edit/${this.$route.params.categoryId}`)
        .then((response)=>{
             this.form.fill(response.data.category)
        })
    },

  data(){
      return{
           form: new Form({
                    cat_name: '',
                })
      }
  },
  methods:{
      updatecategory(){
                 
                let data = new FormData();
                  data.append('cat_name', this.form.cat_name)
                  axios.post(`category/update/${this.$route.params.categoryId}`,data)
                  .then((res)=>{
                    this.$swal({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Category updated Successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    this.$router.push('/category-list')
                 
                      
                }).catch(() => {
                  
                })
      }
  }
    
}
</script>