<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>profile detail</title>
<?php $this->load->view('admin/common/meta_tags'); ?>
<?php $this->load->view('admin/common/before_head_close'); ?>
</head>
<body class="skin-blue">
<?php $this->load->view('admin/common/after_body_open'); ?>
<?php $this->load->view('admin/common/header'); ?>
<div class="wrapper row-offcanvas row-offcanvas-left"> 
	<?php $this->load->view('admin/common/left_side'); ?>
  <!-- Cột bên phải là thanh điều hướng -->
  <aside class="right-side"> 
    <!-- Nội dung header -->
    <section class="content-header">
      <h1> Profile Management 
      </h1>
    </section>
    
    <!-- Nội dung chính -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
          <table width="835" border="0">
  <tr>
    <td width="325" align="center" valign="top"><img src="<?php echo ($row->photo)?base_url().'glancePublic/uploads/member_images/'.$row->photo:base_url().'glancePublic/images/no-image.jpg';?>" width="300" style=" border:2px solid #666; border-radius:5px; margin:4px;" /></td>
    <td width="500" valign="top"><table width="500" border="0">
      
      <tr>
        <td colspan="2"><strong>Personal Info:</strong></td>
      </tr>
      <tr>
        <td width="140">Full Name:</td>
        <td width="350"><?php echo $row->name;?></td>
      </tr>
      <tr>
        <td>Username:</td>
        <td><?php echo $row->username;?></td>
      </tr>
      <tr>
        <td>Relationship status:</td>
        <td><span class="inftxt"><?php echo $row->relationship_status;?></span></td>
      </tr>
      <tr>
        <td>Email:</td>
        <td><span class="inftxt"><?php echo $row->email;?></span></td>
        </tr>
      <tr>
        <td>Phone:</td>
        <td><span class="inftxt"><?php echo $row->phone;?></span></td>
        </tr>
      <tr>
        <td>Gender:</td>
        <td><span class="inftxt"><?php echo $row->gender;?></span></td>
        </tr>
      <tr>
        <td>Marital Status:</td>
        <td><span class="inftxt"><?php echo $row->marital_status;?></span></td>
        </tr>
      <tr>
        <td>Date Of Birth:</td>
        <td><span class="inftxt"><?php echo date("F d, Y",strtotime($row->dob));?></span></td>
        </tr>
      <tr>
        <td>Life Style:</td>
        <td><span class="inftxt"><?php echo $row->life_style;?></span></td>
        </tr>
      <tr>
        <td>Smoking:</td>
        <td><span class="inftxt"><?php echo $row->smoking;?></span></td>
        </tr>
      <tr>
        <td>Drinking:</td>
        <td><span class="inftxt"><?php echo $row->drinking;?></span></td>
        </tr>
      <tr>
        <td>Education:</td>
        <td><span class="inftxt"><?php echo $row->education;?></span></td>
        </tr>
      <tr>
        <td>Country:</td>
        <td><span class="inftxt"><?php echo $row->country;?></span></td>
        </tr>
      <tr>
        <td>City:</td>
        <td><span class="inftxt"><?php echo $row->city;?></span></td>
        </tr>
      <tr>
        <td>About Me:</td>
        <td><?php echo $row->about_me;?></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td><strong>Lookin For:</strong></td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>Looking For:</td>
        <td><span class="inftxt"><?php echo $row->looking_for;?></span></td>
        </tr>
      <tr>
        <td>Age Between:</td>
        <td><span class="inftxt"><?php echo $row->looking_age_from;?> to <?php echo $row->looking_age_to;?></span></td>
        </tr>
      <tr>
        <td>Marital Status:</td>
        <td><span class="inftxt"><?php echo $row->looking_marital_status;?></span></td>
        </tr>
      <tr>
        <td>Country:</td>
        <td><span class="inftxt"><?php echo $row->looking_country;?></span></td>
        </tr>
      <tr>
        <td>City:</td>
        <td><span class="inftxt"><?php echo $row->looking_city;?></span></td>
        </tr>
      <tr>
      </table></td>
  </tr>
  <tr>
    </table></td>
  </tr>
</table>
</div>
  </div>
      </div>
    </section>
  </aside>
</div>
</body>
</html>
