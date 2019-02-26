<template>
	<div class="text-xs-center">
    <v-menu offset-y>
      <v-btn icon slot="activator">
		<v-icon :color="color">add_alert</v-icon>{{unreadCount}}
	</v-btn>
      <v-list >
        <v-list-tile
        v-for="item in unread"
        :key="item.id"
        
        >
        <router-link :to="item.path">
        	<v-list-tile-title @click="readIt(item)">
          {{ item.question }} replied {{item.replyBy}}
          </v-list-tile-title>
        </router-link>
          
        </v-list-tile>
      </v-list>
    </v-menu>
  </div>
	
</template>

<script type="text/javascript">
	 export default {
		data(){
			return {
				read : {},
				unread :{},
				unreadCount : 0,
				
			}
		},
		created(){
			if(User.loggedIn()){
				this.getNotifications()
				
			}
		},
		methods : {
			getNotifications(){
				axios.post('/api/notifications')
				.then(res=> {
                    
					this.read=res.data.read;
					this.unread=res.data.unread;
					this.unreadCount=res.data.unread.length;
					console.log(res.data.unread)
					
					
				})
			},
			readIt(notification){
				axios.post('/api/markAsRead',{id: notification.id})
				.then(res=>{
                          this.unread.splice(notification,1);
                          this.read.push(notification);
                          this.unreadCount--;
				})
			}
		},
		computed:{
			color(){
				return this.unreadCount >0 ?'red' : 'green';
			}
		}
		
	}
</script>
