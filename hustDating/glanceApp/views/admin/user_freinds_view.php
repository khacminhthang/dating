<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>friends of user</title>
<?php $this->load->view('admin/common/meta_tags'); ?>
<?php $this->load->view('admin/common/before_head_close'); ?>
</head>
<body class="skin-blue">
<?php $this->load->view('admin/common/after_body_open'); ?>
<?php $this->load->view('admin/common/header'); ?>
<div class="wrapper row-offcanvas row-offcanvas-left"> 
	<?php $this->load->view('admin/common/left_side'); ?>
  <aside class="right-side"> 
    <section class="content-header">
      <h1> User's Friend List 
      </h1>
    </section>
    
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Friend List of <?php echo $real_name;?></h3>
            </div>
            <?php
            if($this->session->flashdata('msg')):
			?>
              <div style="color:#009933;font-size:12px;"><?php echo $this->session->flashdata('msg');?></div><br />
            <?php
			endif;
			?>  
            
            <div class="box-body table-responsive">

            <table id="example2" class="table table-bordered table-hover">
            
              <thead>
                <tr>
                    <th width="84"><strong>Date Added</strong></th>
                    <th width="44"><strong>Name</strong></th>
                    <th width="72"><strong>Username</strong></th>
                    <th width="32">Age </th>                 
                  <th width="61"><strong>Location</strong></th>                    
               </tr>
              </thead>
              <?php
              if($friend_row):
			  	foreach($friend_row as $friend) {
					
			  ?>
              <tr>
                <td><?php echo date('d-m-Y',strtotime($friend->dated));?></td>
                <td><a href="<?php echo base_url().'profile/'.$friend->username;?>" target="_blank"><?php echo $friend->name;?></a></td>
                <td><?php echo $friend->username;?></td>
                <td><?php echo $friend->mAge;?></td>
                <td><?php echo $friend->city;?></td>
                </tr>
              <?php
          }
              endif;
              ?>

                <tfoot>
                </tfoot>
              </table>
            </div>
            </div>
        </div>
      </div>
    </section>
  </aside>
</div>
</body>
</html>