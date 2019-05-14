<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <title>friends</title>
  <?php $this->load->view('common/meta_tags'); ?>
  <?php $this->load->view('common/before_head_close'); ?>
  </head>
  <body>
<?php $this->load->view('common/after_body_open'); ?>
<!--Trang web bắt đầu-->
<div class="siteWraper">
    <?php $this->load->view('common/header'); ?>
    <div class="innerPageswrap">
    <!--Hồ sơ gần đây -->
    <div class="container">
      	<div class="row">
        	<div class="col-md-12 col-sm-11">
                <div class="profileWrap">
            	<h1>Friends</h1>
			  <div class="requestrecieve">
            	<ul class="featuredListing row">
                <?php
				if($record_set):
					foreach($record_set as $row ):
						if($row->photo)
	  						$image_thumb = base_url().'glancePublic/uploads/member_images/thumb_'.$row->photo;
	  					else
	  						$image_thumb = base_url().'glancePublic/images/no-image.jpg';
				?>
                	<li class="col-md-6">
                    	<div class="profileBox">
                    	<div class="imgbox"><img src="<?php echo $image_thumb;?>" alt="" /></div>
                        <div class="profileInfo">
                        	<h2><a href="<?php echo base_url(); ?>profile/<?php echo $row->username; ?>" title="<?php echo $row->name;?>"><?php echo $row->name;?></a></h2>
                            <p><?php echo $row->gender;?></p>
                            <p><?php echo $row->city;?>, <?php echo $row->country;?></p>
                        </div> 
                        </div>
                    </li>
                <?php endforeach; else:?> 
            <div class="clear">&nbsp;</div>
				<div class="err">No Record found</div>
			<?php endif;?>
                </ul>
            </div>
           	  <div class="clear"></div>
            </div></div>
        </div>
        
  </div>
    </div>  
    <?php $this->load->view('common/footer'); ?>
  </div>
<?php $this->load->view('common/before_body_close'); ?>
</body>
</html>
