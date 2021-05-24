<template>
  <div class="row justify-content-center">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add New Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data" @submit.prevent="addnewPost">
                <div class="card-body">
                  <div class="form-group">
                    <label for="postId">Post Name</label>
                    <input type="text" class="form-control"  id="postId" placeholder="Enter Post Name" v-model="form.title"   name="title" :class="{'is_invalid': form.errors.has('title')}" >
                    <HasError :form="form" field="title" />
                  </div>
                  <div class="form-group">
                    <label>Select Category</label>
                    <select class="form-control" :class="{'is_invalid': form.errors.has('cat_id')}" v-model="form.cat_id" name="cat_id">
                      <option disabled value="">select one</option>
                      <option :value="category.id" v-for="category in getAllCategory" :key="category.cat_name">{{category.cat_name}}</option>
                    
                    </select>
                    <HasError :form="form" field="cat_id" />
                  </div>

                   <div class="form-group" >
                                    <input @change = "changePhoto($event)" name="image" type="file" :class="{ 'is-invalid': form.errors.has('image') }">
                                    <img :src="form.image"  style="width: 75px; height: 75px;">
                                    
                                </div>
                  
                  <div class="form-group">
                    <label for="descriptionId">Description</label>
                   
                    <input type="text" class="form-control"  id="descriptionId" placeholder="Enter description" v-model="form.description"   name="description" :class="{'is_invalid': form.errors.has('description')}" >
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
import Form from 'vform'
import HasError from 'vform/src/components/bootstrap5'


export default {
     data(){
       return{
                form: new Form({
                    title:'',
                    description:'',
                    cat_id:'',
                    image:'',
                })
            }
     },
     mounted(){
         this.$store.dispatch("allCategory")
     },
     computed:{
          getAllCategory(){
            return this.$store.getters.getCategory
        }
     },
     methods:{
              changePhoto(event){
                let file = event.target.files[0];

                 if(file.size>1048576){
                     this.$swal({
                         type: 'error',
                         title: 'Oops...',
                         text: 'Something went wrong!',
                         footer: '<a href>Why do I have this issue?</a>'
                     })
                 }else{
                     let reader = new FileReader();
                     reader.onload = event => {
                         this.form.photo = event.target.result
                        
                        
                     };
                     reader.readAsDataURL(file);
                 }
               
             },
             addnewPost(){
                 
                 
                 this.form.post('save')
               .then((res)=>{
                 this.$router.push('/post-list')
                  this.$swal({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Category Added Successfully',
                        showConfirmButton: false,
                        timer: 1500
                    })
                     
               })
               .catch(()=>{

               })
             }

     }
}
</script>

<style>

</style>