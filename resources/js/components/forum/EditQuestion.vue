 <template>
 	<v-container fluid>
 		<v-card>
	 <v-form
  @submit.prevent="update"
  >
    

    <v-text-field

      label="Title"
      v-model="form.title"
      type="text"
      required
    ></v-text-field>
    
     
   
      
    
     <markdown-editor v-model="form.body" ref="markdownEditor"></markdown-editor>

    

    <v-btn
      type="submit"
      color="warning"
      
    >
     Save
    </v-btn>
    <v-btn
      type="button"
      color="grey"
      @click="cancel"
    >
     Cancel
    </v-btn>

    

    
  </v-form> 
</v-card>
</v-container>
</template>

<script>
  
	
 export default {
      data(){
      	return {
      		form :{
      			title :null,
      			body : null 
      		}
      	}
      },
      props:[
      'data'
      ],
      methods:{
      	cancel(){
           EventBus.$emit('cancelEditing');
      	},
      	update(){
      		axios.patch(`/api/question/${this.form.slug}`,this.form)
            .then(this.cancel)
            .catch( error =>this.errors=error.response.data.error)
   

      	}
      },
      mounted(){
      	this.form=this.data
      }
  }
</script>

<style>

</style>
