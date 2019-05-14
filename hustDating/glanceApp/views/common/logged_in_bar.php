
<div class="userInfoBar">
      <div class="container">
      	<div class="row">
        	<div class="col-md-3"><div class="userPicbox">
          <div class="userimage">
            <div class="imgint"><img src="<?php echo ($this->session->userdata('photo'))?base_url().'glancePublic/uploads/member_images/thumb_'.$this->session->userdata('photo'):base_url().'glancePublic/images/no-image.jpg';?>" /></div>
          </div>
          <div class="userName">
            <h4><a href="<?php echo base_url(); ?>profile/<?php echo $this->session->userdata('username'); ?>"><?php echo ($this->session->userdata('name')=='')?$this->session->userdata('username'):$this->session->userdata('name');?></a></h4>
            <a href="<?php echo base_url().'edit_profile';?>">Edit Profile</a></div>
        </div></div>
            <div class="col-md-4">
            
            <div class="searchFriendBox">
        <form name="search_frm" id="search_frm" action="<?php echo base_url();?>search" method="post">
          
          
          <div class="input-group">
          <input type="text" name="search" value="" class="form-control" placeholder="Search Friends" />
          <span class="input-group-btn">
            <button class="btn btn-danger" type="submit">Search</button>
          </span>
        </div>
          
          
        </form>
        </div>
        
        
        
        </div>
            <div class="col-md-5"><div class="userquickLinks">
          <ul class="usernav">
            <li><a href="<?php echo base_url(); ?>friends" title="Friend List">Friends</a> </li>
            <li><a href="<?php echo base_url();?>messages" title="Messages Conversation">Messages</a></li>
            <li><a href="<?php echo base_url();?>gallery/photos/<?php echo $this->session->userdata('username'); ?>" title="My Picture Gallery">My Gallery</a></li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" title="Settings" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Setting</a>
              <ul class="subnav dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a href="<?php echo base_url(); ?>profile/<?php echo $this->session->userdata('username'); ?>" title="Goto your profile"><?php echo $this->session->userdata('name');?></a></li>
                <li><a href="<?php echo base_url(); ?>edit_profile" title="Edit Profile">Edit Profile</a></li>
                <li><a href="<?php echo base_url(); ?>friends/request_received" title="Blcok List"> Friends Request Received</a></li>
                <li><a href="<?php echo base_url(); ?>friends/request_sent" title="Blcok List"> Friends Request Sent</a></li>
                <li><a href="<?php echo base_url(); ?>friends/blocked_friends" title="Blcok List">Unfriend List</a></li>
                <li><a href="<?php echo base_url(); ?>friends/favourite_friends" title="Favourities List"> Favourities</a></li>
                <li><a href="<?php echo base_url(); ?>account_setting" title="Account Setting"> Account Setting</a></li>
                <li><a href="<?php echo base_url(); ?>user/logout" title="Logout">Logout</a></li>
              </ul>
            </li>
          </ul>
          <div class="clear"></div>
        </div></div>
        </div>
      
        
        
        
      </div>
    </div>
