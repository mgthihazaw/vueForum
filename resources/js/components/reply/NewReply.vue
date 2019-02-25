<template>
	<div class="mt-3 container">
		<markdown-editor v-model="body"></markdown-editor>
		<v-btn dark color="primary" @click="submit">Reply</v-btn>
	</div>
</template>

<script type="text/javascript">
	export default{
		props:[
            'questionSlug'
		],

		data(){
			return {
				body: null,
			}
		},

		methods:{
			submit(){
				axios.post(`/api/question/${this.questionSlug}/reply`,{body:this.body})
				.then(res=> {
					this.body='';
					EventBus.$emit('newReply',res.data.reply)
					window.scrollTo(0,0)
				})
			}
		}
	}
</script>

<style type="text/css">
	
</style>