<template>
	<v-container>
		<reply
		 v-for="reply in replies" 
		:data="reply"
        :key="reply.id"
        v-if="replies"
		>
			
		</reply>
	</v-container>
</template>

<script type="text/javascript">
import Reply from './Reply';
	export default{
		components:{
			Reply
		},
		props: ['replies']
	}
</script>

<style type="text/css">
	
</style>