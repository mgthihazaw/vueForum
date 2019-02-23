<template>
	<v-container>
		<v-form @submit.prevent="submit">
			<v-text-field
		      label="Category Name"
		      v-model="form.name"
		      type="text"
		      required
		    ></v-text-field>

		   
		    <v-btn type="submit" color="warning" v-if="editSlug">Update</v-btn>
		     <v-btn type="submit" color="primary" v-else>Create</v-btn>
		</v-form>
		<v-card>
			<v-toolbar color="#395177" dark>
         
	          <v-toolbar-title>Categories</v-toolbar-title>
	          <v-spacer></v-spacer>
	          <v-btn icon>
	           
	          </v-btn>
	        </v-toolbar>
	        <v-list>
	        	<div v-for="(category,index) in categories"
            :key="category.name" >
	        	<v-list-tile >
	        		
	        		
	        		<v-list-tile-content>

	        			<v-list-tile-title v-text="category.name">
	        				
	        			</v-list-tile-title>
	        		</v-list-tile-content>
	        		<v-list-tile-action>
	        			<v-btn icon small @click="edit(index)">
	        				<v-icon color="orange">edit</v-icon>
	        			</v-btn>
	        		</v-list-tile-action>
	        		<v-list-tile-action>
	        			<v-btn icon small @click="destory(category.slug,index)">
	        				<v-icon color="red">delete</v-icon>
	        			</v-btn>
	        		</v-list-tile-action>
	        	</v-list-tile>
	        	<v-divider></v-divider>
	        	</div>
	        </v-list>
		</v-card>
	</v-container>

	
</template>

<script type="text/javascript">
export default{
	created(){
		if(!User.admin()){
           this.$router.push('/forum')
		}
    	axios.get('/api/category')
    	.then(res=>{this.categories=res.data})
    },
	data(){
		return {
			form:{
			name:null,
		},
		categories:null,
		editSlug:null,
		}
	},
	
		methods:{
			submit(){
				this.editSlug ? this.update() :this.create();
			},
			update(){
                axios.patch(`/api/category/${this.editSlug}`,this.form)
				.then(res=> {
					this.categories.unshift(res.data)
				    this.form.name=null
			})
			},

			create(){
				axios.post('api/category',this.form)
				.then(res=> {
					this.categories.unshift(res.data)
                  
				this.form.name=null})
			},
			destory(slug,index){
				axios.delete(`/api/category/${slug}`)
				.then(res=> this.categories.splice(index,1))
			},
			edit(index){
				this.form.name=this.categories[index].name;
				 this.editSlug=this.categories[index].slug;
				 this.categories.splice(index,1)
				
			}
		},
		
	}

</script>

<style type="text/css">
	
</style>