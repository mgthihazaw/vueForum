<template>
	<div class="text-xs-center">
    <v-menu offset-y>
      <v-btn icon slot="activator">
		<v-icon :color="color">add_alert</v-icon>{{unreadCount}}
	</v-btn>
      <v-list 
             style="max-height: 300px"
             class="scroll-y">
        <v-list-tile
        v-if="unread" 
        v-for="item in unread"
        :key="item.id"
        
        >
        <div :v-if="item.id">
        <router-link :to="item.path">
        	<v-list-tile-title @click="readIt(item)"  class="red--text">
          {{ item.question }} replied by {{item.replyBy}}

          </v-list-tile-title>

          
        </router-link>
        </div>
          
        </v-list-tile>


        <v-list-tile
          v-if="read"
        v-for="item in read"
        :key="item.id"
       
        >
        <router-link :to="item.path">
        	<v-list-tile-title >
          {{ item.question }} replied by {{item.replyBy}}

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
			Echo.private('App.User.' + User.id())
			    .notification((notification) => {
			        this.unread.unshift(notification)
			        this.unreadCount++
			    });
			    
		},
		methods : {
			getNotifications(){
				axios.post('/api/notifications')
				.then(res=> {
                    
					this.read=res.data.read;
					this.unread=res.data.unread;
					this.unreadCount=res.data.unread.length;
					
					
				})
				.catch(error =>{
					Exception.handle(error)
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
