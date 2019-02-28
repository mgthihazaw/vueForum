<template>
	<div class="container" fluid grid-list-md>
		<v-layout row wrap>
			<v-flex xs8>
                 <question
                 v-for="question in questiondata.data" 
                 :key="question.path"
                 :data="question"
                 ></question>
                 
               <pagination :data="questiondata" @pagination-change-page="getResults" :show-disabled="true">
                 <span slot="prev-nav">&lt; Prev</span>
  <span slot="next-nav">Next &gt;</span>
               </pagination>
			</v-flex>
      <v-flex xs4>
			<app-sidebar></app-sidebar>
    </v-flex>

		</v-layout>
    

                 
	</div>

</template>

<script>
	import question from './Question.vue';
  import AppSidebar from './AppSidebar'
 
  export default {
  	data(){
  		return {
  			questions:{},
        questiondata:{}

  		}
  	},
  	components:{
  		question,
      AppSidebar,
      
     
  	},
  	// created(){
  	// 	axios.get('/api/question')
  	// 	.then(res => this.questions=res.data.data)
  	// 	.catch(error => console.log(error.response.data))

        
  	// },
    mounted() {
    // Fetch initial results
    this.getResults();
  },

  methods: {
    // Our method to GET results from a Laravel endpoint
    getResults(page = 1) {
      axios.get('/api/question?page=' + page)
        .then(response => {
          this.questiondata = response.data;
        });
    }
  }

  }

</script>

<style>
    
</style>
