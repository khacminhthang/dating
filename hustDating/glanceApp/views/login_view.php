<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>login</title>
<?php $this->load->view('common/meta_tags'); ?>
<?php $this->load->view('common/before_head_close'); ?>
</head>
<body>
<?php $this->load->view('common/after_body_open'); ?>
<!--Bắt đầu trang web-->
<div class="siteWraper">
  <?php $this->load->view('common/header');?>
  
  <div class="innerPageswrap">
  <div class="container">
		<div class="row">
  		<div class="col-md-6 col-md-offset-3">
        <div class="userccount">
        <div class="err"><?php echo $msg;?></div>
        	<h1>User login</h1>
            <form name="login_form" id="login_form" method="post" action="<?php echo base_url().'user/login';?>">
        	<div class="formpanel">
            <div class="formrow">
            <label>Username</label>
        	<input type="text" name="username" id="username" class="form-control" value="<?php echo set_value('username');?>"  />
            <?php echo form_error('username', '<div class="error"><span>', '</span></div>'); ?>
            </div>
            <div class="formrow">
            <label>Password</label>
        	<input type="password" name="password" id="password" class="form-control" value="<?php echo set_value('password');?>"  />
            <?php echo form_error('password', '<div class="error"><span>', '</span></div>'); ?>
            </div>
            <input type="submit" name="" value="Login" class="btn" />
			</div>
            </form>
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
