<template>
	<v-container>
   <v-form
  @submit.prevent="create"
  >
    

    <v-text-field
      label="Title"
      v-model="form.title"
      type="text"
      required
    ></v-text-field>
    

   
      <v-select
         v-model="form.category_id"
          
          :items="categories"
          item-text="name"
          item-value="id"
          label="Category"
        
        
       
        autocomplete
      ></v-select>
    

    

    <v-btn
      type="submit"
      color="success"
      
    >
     Create
    </v-btn>

    

    
  </v-form> 
  </v-container>
</template>

<script>
  
	
 export default {
  data(){
    return {
      form:{
        title:null,
        category_id:null,
      },
      categories:{},
   
    }
   
  },
  created(){
    axios.get('/api/category')
    .then(res => this.categories=res.data.data)
    .catch(error=>console.log(error.response.data))

  },
  methods:{
    create(){
      
    }
  },
  }
</script>

<style>

</style>
