<template>
	<div>
		<v-btn icon @click="likeIt"  flat>
			<v-icon :color="color ">favorite</v-icon>
		</v-btn>
		{{count}}
	</div>
</template>

<script type="text/javascript">
	export default {
		props:[
            'content'
		],
		computed:{
          color(){
          	return this.liked ?'red' : 'red lighten-4'
          }
		},
		data(){
				return {
					liked : this.content.liked,
					count : this.content.like_count,
					likeStyle:{color:"red"},
				}
			},
		methods : {
			
			likeIt(){
				if(User.loggedIn()){
                   this.liked ? this.decr() : this.incr()
                   this.liked=!this.liked
				}
			},
			incr(){ 
				axios.post(`/api/like/${this.content.id}`)
				.then(res => this.count++)
                  
			},
			decr(){
				axios.delete(`/api/like/${this.content.id}`)
                 .then(res =>this.count--)
			}
		},
	}
</script>

<style type="text/css">
	
</style>