<template>
	<div>
      <v-card color="#EFEDF7" class="mt-2">
        
    
       <v-card-title primary-title>
        <div>
          <div class="headline">
         
           <h3 class="headline mb-0">
            {{data.title}}
           </h3>
         </div>
         
         <span class="grey--text">{{ data.user}} said {{data.created_at}}</span>
        </div>
          
        <v-spacer></v-spacer>
        <router-link :to="data.path">	
        <v-btn color="blue" flat>Details</v-btn>
        </router-link>
     
       </v-card-title>

       <v-card-text v-html="body">
          
       </v-card-text>
      </v-card>

  <br><br>
 </div>
</template>

<script>
	
  export default {
  	props:[
        'data'
  	],
    computed:{
      body(){
       return md.parse(this.data.body)

      }
    },
  }
</script>

<style>

</style>


