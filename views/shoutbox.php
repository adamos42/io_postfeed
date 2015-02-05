<ion:lang key="shoutbox" tag="h3" />

<script>
    var Shoutbox = new (function()
    {
        var $this = {}; 
        
        var $this.messages_container = $("#shoutbox_messages");
        
        var $this.lattest_time = 0;
        var $this.refresh_timeout = null;
        
        
        
        
        
        
        
        
        $this.refresh_timeout = setTimeout(function()
        {
            if(Shoutbox.messages_container.lenght > 0)
            {
                Shoutbox.refresh();
            }
        },
        2000);
        
        console.log("Shoutbox")
        return $this;
    });
</script>

<ion:user:logged is="true">

    <textarea id="shoutbox_panel_message" rows="3" placeholder='<ion:lang key="shoutbox_placeholder" />...'></textarea>
    <button id="shoutbox_panel_send" class="tiny corner" onclick="Shoutbox.send_message();"> <ion:lang key="send_message" /> </button>

    <script>    
	  			
	  			 $("#shoutbox_panel_send").click(function() {

                  send_message_panel();

               });

               $("#shoutbox_panel_message").keydown(function(key) {

                  if (key.keyCode == 13) {

                     send_message_panel();

                  }

               });
	  			
	  			function send_message_panel() {

                  var user_id = "<ion:user:id />";
                  var message = $("#shoutbox_panel_message").val();
                  
                  $("#shoutbox_panel_send").hide();

                  if (message != "") {

                     $.post('/ajax_shoutbox', {'ajax': 'post', 'user_id': user_id, 'message': message},
                     function(response) {

                        if (response == "true") {

                           $("#shoutbox_panel_message").val(null);
                           $("#shoutbox_panel_send").show();
                           update_messages_panel();

                        }

                     });

                  }
               }
	  			
	  			
	  			</script>
	  			
	  			
	  			</ion:user:logged>
               
            <ion:user:logged is="false">
                  
                  <div data-alert class="alert-box warning radius">
     	
				 		<ion:lang key="shoutbox_need_to_registered" />
				 		
				 		<ion:page id="register">
				 			>> <a href="<ion:url />"> <ion:title /> </a> <<
				 		</ion:page>
				 	
				  </div>

            </ion:user:logged>
               
   			<div id="shoutbox_panel" class='loading'> </div>
   			
   			
   			
   			<script type="text/javascript">
   $(function() {

      console.log("shoutbox panel initialize...");

      var lattest_time_panel = 0;

      update_messages_panel();

      var shoutbox_panel = setInterval(function() {

         update_messages_panel();

      }, 1500);

      function update_messages_panel() {

         $.post("/ajax_shoutbox", {'ajax': 'status'}, function(response) {

	             console.log("update_messages_panel :: "+response+" ? "+lattest_time_panel);

                     if(parseInt(response) != lattest_time_panel) {
                        
                        $("#shoutbox").addClass('loading');
                        
                        $.post("/ajax_shoutbox", {'ajax': 'get', 'limit':'10'}, function(response) {

			   console.log("update_messages_panel :: update shoutbox messages");

                           $("#shoutbox_panel").html(response).removeClass('loading');

                        });
                        
                        lattest_time_panel = parseInt(response);
                     }

                  });

      }      

   });
</script>
