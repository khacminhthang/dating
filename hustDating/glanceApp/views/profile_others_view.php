<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>view profile </title>
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
       	<div class="profilebgcol">  	
      	<div class="profileWrap">
        <h1><?php echo ($row->name=='')?$this->session->userdata('username'):$row->name;?></h1>
        <?php 
					if($this->session->userdata('is_user_login')) {
                	 	
						$data2['username'] = $row->username;
						$data2['msg_show'] = $msg_setting;
						$data2['gallery_show'] = $gallery_setting;
						$this->load->view('common/actions.php',$data2);
					}
				 ?>
        
        <!-- Chi tiet nguoi xem-->
          <div class="row">
        	<div class="col-md-6">
            <h2>Personal info</h2>
            <ul class="infoList">
              <li>
                <div class="label">Full Name:</div>
                <div class="inftxt"><?php echo $row->name;?></div>
                <div class="clear"></div>
              </li>
              <li>
                <div class="label">Relationship status:</div>
                <div class="inftxt"><?php echo $row->relationship_status;?></div>
                <div class="clear"></div>
              </li>
              <?php if($email_setting):?>
              <li>
                <div class="label">Email:</div>
                <div class="inftxt"><?php echo $row->email;?></div>
                <div class="clear"></div>
              </li>
              <?php endif;?>
              <?php if($phone_setting):?>
              <li>
                <div class="label">Phone:</div>
                <div class="inftxt"><?php echo $row->phone;?></div>
                <div class="clear"></div>
              </li>
              <?php endif;?>
              <li>
                <div class="label">Gender:</div>
                <div class="inftxt"><?php echo $row->gender;?></div>
                <div class="clear"></div>
              </li>
              <li>
                <div class="label">Marital Status:</div>
                <div class="inftxt"><?php echo $row->marital_status;?></div>
                <div class="clear"></div>
              </li>
              <?php if($dob_setting):?>
              <li>
                <div class="label">Date Of Birth:</div>
                <div class="inftxt"><?php echo date("F d, Y",strtotime($row->dob));?></div>
                <div class="clear"></div>
              </li>
              <?php endif;?>
              <li>
                <div class="label">Life Style:</div>
                <div class="inftxt"><?php echo $row->life_style;?></div>
                <div class="clear"></div>
              </li>
              <li>
                <div class="label">Smoking:</div>
                <div class="inftxt"><?php echo $row->smoking;?></div>
                <div class="clear"></div>
              </li>
              <li>
                <div class="label">Drinking:</div>
                <div class="inftxt"><?php echo $row->drinking;?></div>
                <div class="clear"></div>
              </li>
              <li>
                <div class="label">Education:</div>
                <div class="inftxt"><?php echo $row->education;?></div>
                <div class="clear"></div>
              </li>
              <?php if($location_setting):?>
              <li>
                <div class="label">Country:</div>
                <div class="inftxt"><?php echo $row->country;?></div>
                <div class="clear"></div>
              </li>
              <li>
                <div class="label">City:</div>
                <div class="inftxt"><?php echo $row->city;?></div>
                <div class="clear"></div>
              </li>
              <?php endif;?>
            </ul>
            </div>
            <div class="col-md-6">
            <h2>Looking For</h2>
            <ul class="infoList">
              <li>
                <div class="label">Looking For:</div>
                <div class="inftxt"><?php echo $row->looking_for;?></div>
                <div class="clear"></div>
              </li>
              <li>
                <div class="label">Age Between</div>
                <div class="inftxt"><?php echo $row->looking_age_from;?> to <?php echo $row->looking_age_to;?></div>
                <div class="clear"></div>
              </li>
              <li>
                <div class="label">Marital Status:</div>
                <div class="inftxt"><?php echo $row->looking_marital_status;?></div>
                <div class="clear"></div>
              </li>
              <li>
                <div class="label">Country:</div>
                <div class="inftxt"><?php echo $row->looking_country;?></div>
                <div class="clear"></div>
              </li>
              <li>
                <div class="label">City:</div>
                <div class="inftxt"><?php echo $row->looking_city;?></div>
                <div class="clear"></div>
              </li>
            </ul>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-5">
          <div class="aboutme">
            <h2>About Me</h2>
            <p><?php echo $row->about_me;?></p>
          </div>
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
