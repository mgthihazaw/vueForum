<template>
	<div v-if="question">
    <edit-question
     v-if="editing"
     :data="question"
 
    ></edit-question>
  
     <show-question
     v-else
     :data="question" 
   
  ></show-question> 
  <v-container>
    <replies :question="question"></replies>
    <new-reply v-if="loggedIn" :questionSlug="question.slug"></new-reply>
  
    <router-link v-else to="/login" class="container mt-3">
      <v-btn color="warning">
        Login to Reply
      </v-btn>
    </router-link>
  
  </v-container>
 
  </div>
</template>

<script>
  import ShowQuestion from './ShowQuestion';
	import EditQuestion from './EditQuestion'
  import Replies from '../reply/Replies';
  import NewReply from '../reply/NewReply'
  export default {
    components:{
      ShowQuestion,
      EditQuestion,
      Replies,
      NewReply,
    },
    data(){
      return {
        question:null,
        editing: false
      }
    },
    computed:{
      loggedIn(){
        return User.loggedIn();
      }
    },
  	created(){
     this.listen()
     this.getQuestion()
     
    },
    methods:{
      listen(){
        EventBus.$on('startEditing',()=>{
          this.editing =true
        })
        EventBus.$on('cancelEditing',()=>{
          this.editing=false})
        
      },
      getQuestion(){
         axios.get(`/api/question/${this.$route.params.slug}`)
      .then(res => this.question =res.data.data)
      .catch(error => console.log(error.response.data))
      }
    },
  }
</script>

<style>

</style>
