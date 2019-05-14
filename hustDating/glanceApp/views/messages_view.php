<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>message</title>
<?php $this->load->view('common/meta_tags'); ?>
<?php $this->load->view('common/before_head_close'); ?>
</head>
<body>
<?php $this->load->view('common/after_body_open'); ?>
<!--Trang web bắt đầu-->
<div class="siteWraper">
  <?php $this->load->view('common/header'); ?>
  <div class="innerPageswrap">
  <div class="container">
	 
       <h1 class="titleheading">Messages</h1>
       <div class="messageWrap">
        <div class="row">
        	<div class="col-md-3 col-sm-5 col-xs-3">
       			<div class="usercol">
        <div class="userlist">
                <!-- Danh sách người dùng bên trái-->
                <div class="userwrp">
                <ul class="userallList">
                <?php
                if($conatacted_memebers) {
					foreach($conatacted_memebers as $ContactedMemberDetail) {
						if($ContactedMemberDetail->photo == "") {
							$photo = 'images/no-image.jpg';
						} else {
							$photo = 'uploads/member_images/thumb_'.$ContactedMemberDetail->photo;	
						}
		
						if($ContactedMemberDetail->username == $this->session->userdata('user_rec')) {
							
							$class = 'class="active"';
							
						} else {
							
							$class = '';
						}
						
				?>
                    <li><a href="javascript:;" <?php echo $class; ?> onclick="setRecieverSession('<?php echo $ContactedMemberDetail->username;?>')">
                        
                        <div class="imgbox"><img src="<?php echo base_url(); ?>glancePublic/<?php echo $photo;?>" width="40" height="39" /></div>
                        <div class="userinfo">
                            <div class="name"><?php echo $ContactedMemberDetail->name;?></div>
                            <p><?php echo $ContactedMemberDetail->gender." ".$ContactedMemberDetail->mAge." yrs, ".$ContactedMemberDetail->city;?></p>
                        </div>
                    <div class="clear"></div>
                    </a>
                    </li>
               <?php
					}
				}
               ?>  
                </ul>
                </div>
            </div>
        </div>
            </div>
            <div class="col-md-9 col-sm-7 col-xs-9">
            	<!--Cột trò chuyện bên phải-->
                <div class="chatCol">
                    <div class="chatserinfo">
                    <?php if($rec_row):?>
                        <div class="chatuserWrp">
                        <?php
                        if($rec_row->photo)
                                    $image_thumb = base_url().'glancePublic/uploads/member_images/thumb_'.$rec_row->photo;
                                else
                                    $image_thumb = base_url().'glancePublic/images/no-image.jpg';
                        ?>
                        <div class="row">
                        <div class="col-md-8 col-sm-8">
                        <div class="userpic"><a href="<?php echo base_url(); ?>profile/<?php echo $rec_row->username; ?>" target="_blank"><img src="<?php echo $image_thumb; ?>" alt="" width="40" height="40" /></a></div>
                        <div class="usercontent">
                        <div class="left">
                        <h2><?php echo $rec_row->name;?></h2>
                        <p><?php echo $rec_row->gender.", ".$rec_row->mAge." yrs, ".$rec_row->city;?></p>
                        </div>
                        <div class="clear"></div>   
                        </div>
                        </div>
                        </div>        
                    </div>
                    
                    <?php endif;?>
                    <div class="chatListBox">
                        <ul class="chatList" id="messages_all">
                            <?php
                            if($messages_row) {
                                foreach($messages_row as $messageDetail) {
                                    if($messageDetail->photo == "") {
                                        $photo = 'images/no-image.jpg';
                                    } else {
                                        $photo = 'uploads/member_images/thumb_'.$messageDetail->photo;
                                        
                                    }
                                    
                            ?>
                                <li>
                                	<div class="row">
                                    	<div class="col-md-1 col-sm-2 col-xs-2"><img src="<?php echo base_url(); ?>glancePublic/<?php echo $photo; ?>" alt="" /></div>
                                        <div class="col-md-11 col-sm-10 col-xs-10">
                                        <div class="chattxt">
                                        <div class="chatcont">
                                            <p><?php echo $messageDetail->message; ?></p>
                                        </div>
                                    </div></div>
                                    </div>
                                    
                                    
                                
                                </li>
                          <?php
                                }
                            }
                          ?> 
                            
                        </ul>
                    </div>
                    
                    <div class="chatForm">
                                       
                        <div class="writeBox">
                        <textarea id="message" name="message" class="form-control"></textarea> <input type="button" value="Send" class="btn" onclick="sendMessages()" />
                        <div class="clear"></div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
       </div>             
    </div>
  </div>
  <?php $this->load->view('common/footer'); ?>
</div>
<?php $this->load->view('common/before_body_close'); ?>
</body>
</html>
