<template>
	<div>
		<markdown-editor v-model="editReply.reply"></markdown-editor>
		<v-btn color="primary" @click="update">Save</v-btn>
		<v-btn color="secondary" @click="cancel">Cancel</v-btn>
	</div>
</template>

<script>
	export default {
       props:[
        'editReply'
       ],
       methods:{
       	update(){
           axios.patch(`/api/question/${this.editReply.question_slug}/reply/${this.editReply.id}`,{body :this.editReply.reply})
           .then(res=>this.cancel())
       	},
       	cancel(){
          EventBus.$emit('cancelEditing');
       	}
       }
	}
</script>

<style type="text/css">
	
</style>