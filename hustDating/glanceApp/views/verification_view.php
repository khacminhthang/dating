<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>verification</title>
<?php $this->load->view('common/meta_tags'); ?>
<?php $this->load->view('common/before_head_close'); ?>
</head>
<body>
<?php $this->load->view('common/after_body_open'); ?>
<div class="siteWraper">
  <?php $this->load->view('common/header'); ?>
  <div class="inner para">
  	<div class="innerWraper">
    <h2>Welcome you</h2>
    <div class="successmsg"><?php echo 'Sign Up Success';?></div>
    </div>
  </div>
  <?php $this->load->view('common/footer'); ?>
</div>
<?php $this->load->view('common/before_body_close'); ?>
</body>
</html>
