<template>
	<v-container>
    <span class="red--text" v-if="errors.title">
      {{errors.title[0]}}
    </span>
   <v-form
  @submit.prevent="create"
  >
    

    <v-text-field
      label="Title"
      v-model="form.title"
      type="text"
      required
    ></v-text-field>
   <span class="red--text" v-if="errors.category_id">
      {{errors.category_id[0]}}
    </span>
     <v-autocomplete
        v-model="form.category_id"
          
          :items="categories"
          item-text="name"
          item-value="id"
          label="Category"
        hide-actions
        color="white"
      
       
       
      ></v-autocomplete>
   
       <span class="red--text" v-if="errors.body">
      {{errors.body[0]}}
    </span>
    
     <markdown-editor v-model="form.body" ref="markdownEditor"></markdown-editor>
    
    

    <v-btn
      type="submit"
      color="success"
      :disabled="disabled"
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
        body:null
      },
      categories:[],
      errors:{},
   
    }
   
  },
  created(){
    axios.get('/api/category')
    .then(res => this.categories=res.data)
    // .catch(error=>console.log(error.response.data.errors))


  },
  methods:{
    create(){
      axios.post('/api/question',this.form)
      .then(res => this.$router.push(res.data.path))
      .catch( error =>this.errors=error.response.data.errors)
    }
  },
  computed:{
    disabled(){
      return !( this.form.title&& this.form.body&& this.form.category_id);
    }
  }
  }
</script>

<style>

</style>
