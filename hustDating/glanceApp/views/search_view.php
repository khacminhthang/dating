<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>search</title>
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
        	<div class="row">
        	<div class="col-md-12">            	
        		<div class="profileWrap">
            	<h1>Search Result</h1>
                	<span class="onlinelast"><?php echo($search_row)?count($search_row):'0';?> Profiles Found</span>
                    
				<div class="searchResult">
            	<ul class="featuredListing row">
                <?php
				$this->load->model('friend_model');
				
				if($search_row) {
					foreach($search_row as $searchDetail) {
						
						if($this->session->userdata('username') == $searchDetail->username) {
							continue;
						}
				?>
                	<li class="col-md-4">
                    	<div class="profileBox">
                    	<div class="imgbox"><a href="<?php echo base_url(); ?>profile/<?php echo $searchDetail->username; ?>"><img src="<?php echo ($searchDetail->photo)?base_url().'glancePublic/uploads/member_images/thumb_'.$searchDetail->photo:base_url().'glancePublic/images/no-image.jpg';?>" alt="<?php echo $searchDetail->name?>" /></a></div>
                        
                        <div class="profileInfo">
                        	<h2><a href="<?php echo base_url(); ?>profile/<?php echo $searchDetail->username; ?>" title="<?php echo $searchDetail->name?>"><?php echo $searchDetail->name?></a></h2>
                            <p><i class="fa fa-user" aria-hidden="true"></i> <?php echo $searchDetail->gender;?></p>
                            <p><i class="fa fa-history" aria-hidden="true"></i> <?php echo $searchDetail->mAge;?> yrs</p>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $searchDetail->city;?></p>
                            <?php
							$isFriend = 0;
							if($this->session->userdata('username')) {
								$isFriend = $this->friend_model->isfriends($this->session->userdata('member_id'),$searchDetail->id);
							}
							if(!$isFriend) {
                            ?>
                            <a href="<?php echo base_url(); ?>friends/send_friend_request/<?php echo my_encrypt($searchDetail->id); ?>" class="chatbtn" title="Send Friend Request">Add Friend</a> 
                            <?php
							}
							if($this->session->userdata('username')) {
							?>
                            <?php
							}
							?>
                          <div class="clearfix"></div>
                        </div>
                        </div>
                    </li>
                <?php
					}
				}
				?>    
                </ul>
            </div>
            	
           	  <div class="clear"></div>
            
            </div>
            </div>
            </div>
    </div>
    </div>
  <?php $this->load->view('common/footer'); ?>
</div>
<?php $this->load->view('common/after_body_open'); ?>
</body>
</html>
