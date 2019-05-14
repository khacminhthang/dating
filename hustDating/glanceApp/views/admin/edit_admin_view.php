<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manganer admin</title>
<?php $this->load->view('admin/common/meta_tags'); ?>
<?php $this->load->view('admin/common/before_head_close'); ?>
<script src="<?php echo base_url(); ?>glancePublic/ckeditor/ckeditor.js"></script>
</head>
<body class="skin-blue">
<?php $this->load->view('admin/common/after_body_open'); ?>
<?php $this->load->view('admin/common/header'); ?>
<div class="wrapper row-offcanvas row-offcanvas-left">
  <?php $this->load->view('admin/common/left_side'); ?>
  <!-- Cột bên phải là thanh điều hướng -->
  <aside class="right-side"> 
    <section class="content-header">
      <h1> Manage Admin </h1>
    </section>
    
    <!-- Nội dung chính -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <div style="font-size:11px; color:#F00;"><?php echo validation_errors(); ?></div>
              <div style="font-size:11px; color:#060;">
              
                <?php
            	if($this->session->flashdata('msg')):
				?>
                <?php 
					echo $this->session->flashdata('msg');
				endif;	
			  ?>
              </div>
            </div>
            <form action="<?php echo base_url()."admin/home/update_pass"; ?>" method="post">
              <table width="100%" border="0">
                <tr>
                  <td width="19%" align="right" valign="top"><strong>New Password:</strong>&nbsp;</td>
                  <td width="81%">
                  <input type="password" name="change_password" id="change_password" autocomplete="off" />
                  </td>
                </tr>
                
                <tr>
                  <td width="19%" align="right" valign="top"><strong>Confirm Password:</strong>&nbsp;</td>
                  <td width="81%">
                  <input type="password" name="confirm_password" id="confirm_password" autocomplete="off" />
                  </td>
                </tr>
                
                <tr>
                  <td align="right" valign="top">&nbsp;</td>
                  <td><input type="submit" value="Submit" /></td>
                </tr>
              </table>
            </form>
          </div>
        </div>
      </div>
    </section>
  </aside>
</div>
</body>
</html>
