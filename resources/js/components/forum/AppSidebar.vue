<template>
  
      <v-card>
        <v-toolbar color="#395177" dark>
          

          <v-toolbar-title>Categories</v-toolbar-title>

          <v-spacer></v-spacer>

         
        </v-toolbar>
        <v-list >
          <v-list-tile v-for="category in categories"
            :key="category.name" color="blue"
          >

           

            <v-list-tile-content >
              <v-list-tile-title v-text="category.name"></v-list-tile-title>

            </v-list-tile-content>
       

            
          </v-list-tile>
           
        </v-list>
      </v-card>



   
</template>


<script>
  export default {
    data () {
      return {
        categories:null,
      }
    },
    created(){
    	axios.get('/api/category')
    	.then(res=>{this.categories=res.data})
    }
  }
</script>
	<style></style>