<template>
  <div class="container">
  <v-form
  @submit.prevent="login"
  >
    

    <v-text-field
      label="E-mail"
      v-model="form.email"
      type="email"
      required
    ></v-text-field>

    <v-text-field
      label="Password"
      v-model="form.password"
      type="password"
      required
    ></v-text-field>

    

    <v-btn
      type="submit"
      color="success"
      
    >
      Login
    </v-btn>

    <router-link to="/signup">
      <v-btn 
        color="primary"
       >
        Signup
       </v-btn>
    </router-link>

    
  </v-form>
  </div>
</template>

<script>
	
  export default {
    data(){
      return {
        form :{
          email :null,
          password:null,
        }
      }
    },
    created(){
         if(User.loggedIn()){
          this.$router.push({name: 'forum'});
         }
    },
    methods:{
      login(){
         User.login(this.form);
         // this.$router.push({name : 'forum'});
        }
    }
  
  }
</script>

<style>

</style>