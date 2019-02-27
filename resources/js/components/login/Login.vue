<template>
  

   <v-parallax
    dark
    src="https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg"
    height="780"
  >
    <v-container class="container animated zoomInDown ">
    <v-layout row class="justify-center " style="position: relative;top: 10%;"
      xs6>
      
      <v-flex xs7 class="grey lighten-4">
        <v-container style="position: relative;top: 5%;" class="text-xs-center">
          <v-card flat>
            <v-card-title primary-title class="text-xs-center">
              <h3 >LOGIN</h3>
            </v-card-title>
            <v-divider></v-divider>
              <v-form
              @submit.prevent="login"
              
              >  
                <v-text-field
                prepend-icon="person"
                  label="E-mail"
                  v-model="form.email"
                  type="email"
                  required

                ></v-text-field>

                <v-text-field
                prepend-icon="lock"
                  label="Password"
                  v-model="form.password"
                  type="password"
                  required
                ></v-text-field>

                
               
                <v-btn
                  type="submit"
                  color="success"
                   large block
                >
                  Login
                </v-btn>
                
                <router-link to="/signup">
                  <v-btn 
                    color="primary"
                    large block
                   >
                    Signup
                   </v-btn>
                </router-link>
              

                
              </v-form>
          </v-card>
        </v-container>
      </v-flex>
    </v-layout>
  </v-container>
</div>
</v-parallax>
  
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