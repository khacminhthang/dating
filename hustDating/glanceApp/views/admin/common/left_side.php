<aside class="left-side sidebar-offcanvas"> 
  <!-- sidebar: style có thể được tìm thấy trong sidebar.less -->
  <section class="sidebar"> 
    <!-- Bảng điều khiển người dùng -->
    <ul class="sidebar-menu">
      <li> <a href="<?php echo base_url();?>admin/dashboard">Dashboard</a> </li>
      <li> <a href="<?php echo base_url().'admin/profiles_lists';?>"> <span>Manage User Profiles</span> </a> </li>
      <li> <a href="<?php echo base_url().'admin/search_profile_name';?>"> <span>Search Profile By Name</span> </a> </li>
      <li> <a href="<?php echo base_url().'admin/search_profile_email';?>"> <span>Search Profile By Email</span> </a> </li>
      <li> <a href="<?php echo base_url().'admin/home/update_pass';?>"> <span>Change Password</span> </a> </li>
      <li> <a href="<?php echo base_url().'admin/home/logout';?>"> <span>Logout</span> </a> </li>
    </ul>
  </section>
</aside>