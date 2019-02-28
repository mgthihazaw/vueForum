<template>
  <v-parallax
    dark
    src="https://cdn.vuetifyjs.com/images/backgrounds/vbanner.jpg"
    height="780"
  >
  <v-container class="container animated zoomInDown ">
    <v-layout row class="justify-center " style="position: relative;top: 10%;"
      xs7>
      
      <v-flex class="grey lighten-4" xs6>

        <v-container style="position: relative;top: 5%;" class="text-xs-center">

          <v-card flat>
            <v-card-title primary-title >
              <h3>SIGN UP</h3>
            </v-card-title>
            <v-divider></v-divider>
              <v-form
              @submit.prevent="signup"
              >
                <v-text-field
                  label="Name"
                  v-model="form.name"
                  type="text"
                  required
                  prepend-icon="person"
                ></v-text-field>
                <span class="red--text" v-if="errors.name">{{errors.name[0]}}</span>

                <v-text-field
                  label="E-mail"
                  v-model="form.email"
                  type="email"
                  required
                  prepend-icon="mail"
                ></v-text-field>
            <span class="red--text" v-if="errors.email">{{errors.email[0]}}</span>
                <v-text-field
                  label="Password"
                  v-model="form.password"
                  type="password"
                  required
                  prepend-icon="lock"
                ></v-text-field>
            <span class="red--text" v-if="errors.password">{{errors.password[0]}}</span>
                <v-text-field
                  label="Confirm Password"
                  v-model="form.password_confirmation"
                  type="password"
                  required
                  prepend-icon="lock"
                ></v-text-field>
                

                <v-btn
                  type="submit"
                  color="success"
                  large block
                  :disabled="disabled"
                >
                  SingUp
                </v-btn>

                <router-link to="/login">
                  <v-btn 
                    color="primary"
                    large block
                   >
                    Login
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
          name:null,
          email :null,
          password:null,
          password_confirmation:null,
        },
        errors:{},
      }
    },
    created(){
         if(User.loggedIn()){
          this.$router.push({name: 'forum'});
         }
    },
    methods:{
      signup(){
         axios.post('http://localhost:8000/api/auth/signup',this.form)
         .then(res => {User.responseAfterLogin(res)
           this.$router.push({name : 'forum'});
         }
           )
         .catch(error => {this.errors=error.response.data.errors})
        }
    },
    computed:{
      disabled(){
        return !(this.form.name && this.form.email && this.form.password && this.form.password_confirmation)
      }
    }
  
  }
</script>

<style>

</style>