<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>dashboard</title>
<?php $this->load->view('admin/common/meta_tags'); ?>
<?php $this->load->view('admin/common/before_head_close'); ?>
</head>
<body class="skin-blue">
<?php $this->load->view('admin/common/after_body_open'); ?>
<?php $this->load->view('admin/common/header'); ?>
<div class="wrapper row-offcanvas row-offcanvas-left"> 
	<?php $this->load->view('admin/common/left_side'); ?>
  <!--cột bên phải chứa nội dung của trang-->
  <aside class="right-side"> 
    <section class="content-header">
      <h1> Dashboard</h1></section>
    
    <!-- Nội dung chính -->
    <section class="content">
     <table width="700" border="0" align="center">
              <tr>
                <td width="210">&nbsp;</td>
                <td width="205">&nbsp;</td>
                <td width="197">&nbsp;</td>
              </tr>
              <tr>
                <td align="center">
                <img src="<?php echo base_url();?>glancePublic/images/admin_images/view_profile.png" /><br />
                <a href="<?php echo base_url().'admin/profiles_lists';?>">View All Profiles</a></td>
                <td align="center"><img src="<?php echo base_url();?>glancePublic/images/admin_images/search.png" alt="" /><br />
                <a href="<?php echo base_url().'admin/search_profile_name';?>">Search Profiles</a></td>
                <td align="center"><img src="<?php echo base_url();?>glancePublic/images/admin_images/logout.png" alt="" /><br />
                <a href="<?php echo base_url().'admin/home/logout';?>">Logout</a></td>
              </tr>
            </table>
    </section>
  </aside>
</div>
</body>
</html>