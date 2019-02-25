<template>
	<div class="mt-3 container">
		<v-card>
			<v-card-title>
				<div class="headline">{{data.user}}</div>
				<div class="ml-2">said {{data.created_at}}</div>
				<v-spacer></v-spacer>
				<div>
					<like :content="data"></like>
				</div>
			</v-card-title>
			<v-divider></v-divider>
			<edit-reply v-if="editing" :editReply="data"></edit-reply>
			<div v-else>
				<v-card-text v-html="reply"></v-card-text>
			<v-divider></v-divider>
			<v-card-actions v-if="own">
				<v-btn icon>
					<v-icon color="orange" small @click="edit">edit</v-icon>
				</v-btn>
				<v-btn icon>
					<v-icon color="red" small @click="destory">delete</v-icon>
				</v-btn>
			</v-card-actions>
			</div>
			
		</v-card>
	</div>
</template>

<script type="text/javascript">
	import EditReply from './EditReply';
	import Like from '../like/Like';
	export default{
		components :{
          EditReply,Like
		},
		data(){
			return {
				editing :false
			}
		},
		props:[
          'data','index',
		],
		created(){
          this.listen()
		},
		computed:{
			own(){
				 return User.own(this.data.user_id)
			},
			reply(){
             	return md.parse(this.data.reply)
             }
		},
		
		methods:{
			destory(){
				EventBus.$emit('deleteReply',this.index)
			},
			edit(){
				this.editing=true

			},
			listen(){
				EventBus.$on('cancelEditing',()=>{
					this.editing=false;
				});
			}
			
		}
	}
</script>
<style type="text/css">
	
</style>