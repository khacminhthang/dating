<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>gallery</title>
<?php $this->load->view('common/meta_tags'); ?>
<?php $this->load->view('common/before_head_close'); ?>
<script type="text/javascript" src="<?php echo base_url();?>glancePublic/js/jquery.fancybox.js?v=2.0.6"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>glancePublic/css/jquery.fancybox.css?v=2.0.6" media="screen" />
<script type="text/javascript" src="<?php echo base_url();?>glancePublic/js/fancybox-min.js"></script>
</head>
<body>
<?php $this->load->view('common/after_body_open'); ?>
<!--Trang web bắt đầu-->
<div class="siteWraper">
  <?php $this->load->view('common/header'); ?>
  
  <div class="innerPageswrap">
  <div class="container"> 
    	<div class="row">
        	<div class="col-md-12 col-sm-11"><div class="profileWrap">
        <h1>Gallery</h1>

        <?php if($album_name==''): ?> 
        <div class="albumBox">
          <div class="toheading">
            <h5>Albums</h5>
            <span>(<?php echo ($album_row == 0)?'0':count($album_row);?> Albums)</span>
            <div class="albumLinks"> 
            <?php 
			  if($row->username == $this->session->userdata('username')) {
			  ?>
            <a href="javascript:;" onclick="addAlbumForm('<?php echo $this->session->userdata('username');?>')" class="viewlinks">Add New Album</a> 
            <?php
			  }
			?>
            <a href="" class="viewlinks">View All Ablums</a> </div>
            <div class="clear"></div>
          </div>
          <?php
						if($album_row):
					?>
          <ul class="albumList">
            <?php 
						
						foreach($album_row as $albumDetail):
						$albumNameFinal = str_replace(' ','_',$albumDetail->album_name);
						?>
            <li>
              <div class="inneralbum">
                <div class="albumimage"><img src="<?php echo base_url();?>glancePublic/images/gallery-icon_2.jpg" /></div>
                <a href="<?php echo base_url().'gallery/photos/'.$row->username.'/'.$albumNameFinal;?>"><?php echo $albumDetail->album_name;?></a>
                <div class="picount"><?php echo $albumDetail->total; echo ($albumDetail->total > 1)?' photos':' photo'?></div>
              </div>
            </li>
            <?php 
							endforeach;
						?>
          </ul>
          <?php endif;?>
          <div class="clear"></div>
        </div>
        <?php endif;?>
        <div class="albumBox">
          <div class="toheading">
            <h5><?php echo ($album_name=='')?'Photo':$album_name;?></h5>
            <span>(<?php echo ($gallery_row == 0)?'0':count($gallery_row);?> Photos)</span>
            <div class="albumLinks"> 
            <?php 
			  if($row->username == $this->session->userdata('username')) {
			  ?>
            <a href="javascript:" onclick="addNewPhoto('<?php echo $album_name;?>')" class="viewlinks">Add New Photo</a> 
            <?php
			  }
			?>
            <a href="" class="viewlinks">View All Photos</a> </div>
            <div class="clear"></div>
          </div>
          <ul class="photoList">
            <?php
				if($gallery_row):
				 foreach($gallery_row as $galleryDetail) {
				 
				 if($album_name != '') {
					 
					 $thumbNail = base_url().'glancePublic/uploads/member_gallery/'.$row->username.'/'.$album_name.'/thumb_'.$galleryDetail->org_photo;
					 
					 $bigImage = base_url().'glancePublic/uploads/member_gallery/'.$row->username.'/'.$album_name.'/'.$galleryDetail->org_photo;
					
				 } else {
					 
					 $thumbNail = base_url().'glancePublic/uploads/member_gallery/'.$row->username.'/thumb_'.$galleryDetail->org_photo;
					 
					$bigImage = base_url().'glancePublic/uploads/member_gallery/'.$row->username.'/'.$galleryDetail->org_photo;

				 }
				 
				 $image_id = base64_encode(base64_encode(time())."_".base64_encode($galleryDetail->image_id)."_".base64_encode(time()));
				 
                 ?>
            <li id="<?php echo $galleryDetail->image_id;?>">
              <div class="imgbox"> 
                  <a href="<?php echo $thumbNail;?>"><img src="<?php echo $thumbNail;?>" /></a> 
              </div>
              <?php 
			  if($row->username == $this->session->userdata('username')) {
			  ?>
              <a class="remove" title="Delete this Picture" onclick="deleteImage('<?php echo $galleryDetail->image_id;?>')"><img src="<?php echo base_url();?>/glancePublic/images/remove.png" alt="Remove Picture" /></a> 
              <?php
			  }
			  ?>
           </li>
            <?php
				 }
			endif;	 
				 ?>
          </ul>
          <div class="clear"></div>
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
