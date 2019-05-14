<div class="actionBox">
                    <?php
						if(!$is_already_friend):
					?>
                    <a href="<?php echo base_url(); ?>friends/send_friend_request/<?php echo my_encrypt($row->id); ?>" title="Send a Friend Request">Add Friend</a>
                   <?php endif; ?>
                   
				   <?php
                   	if($msg_show):
				   ?>
                    <a href="javascript:;" title="Send Message to this person" onclick="setRecieverSession('<?php echo $username;?>')">Send message</a>
                    
                    <?php
						endif;
						if(!$is_already_favourite):
					?>
                    <a href="<?php echo base_url(); ?>friends/add_to_favourite/<?php echo my_encrypt($row->id); ?>" title="Add to Favourite">Add to Favourite</a>
                    <?php 
						endif; 
                   		if($gallery_show):
					?>
                    
                    <a href="<?php echo base_url(); ?>gallery/photos/<?php echo $row->username; ?>" title="See more photo of this user">Gallery</a>
                    
                    <?php
						endif;
					?>
                    
                    <a href="<?php echo base_url(); ?>friends/block_friend/<?php echo my_encrypt($row->id); ?>" title="Block this Person">Unfriend</a>
                <div class="clear"></div>
                
                	<!--Popup-->
                	<div class="confirmpopup" id="addFriend">
                    	<div class="contentpoup">
                        <h6>Friend Request</h6>
                        <p>Your friend request has been sent.</p>
                        <div class="linksbox"><a href="#" onclick = "document.getElementById('addFriend').style.display='none';document.getElementById('fade').style.display='none'">Close</a> </div>
                        </div>
                    </div>
                    <div class="darkwindow" id="fade">&nbsp;</div>
                
                </div>