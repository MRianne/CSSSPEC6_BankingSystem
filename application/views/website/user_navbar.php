
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- userChoice -->
  <nav class="main-header userChoice userChoice-expand bg-white userChoice-light border-bottom">
    <!-- Left userChoice links -->
    <ul class="userChoice-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      
    </ul>


   
  </nav>
  <!-- /.userChoice -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url();?>resources/img/website/logo.png" class="brand-image"
           style="opacity: .8">
      <span class="brand-text font-weight-light">BankSys</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url();?>resources/img/website/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url(); ?>profile" class="d-block">First, Last</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <!-- <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Starter Pages
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li>-->

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>balanceInquiry" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Balance Inquiry
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>transferFunds" class="nav-link">
              <i class="nav-icon fas fa-hand-holding-usd"></i>
              <p>
                Fund Transfer
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url(); ?>transactionList" class="nav-link">
              <i class="nav-icon fa fa-list-ol"></i>
              <p>
                List of Transactions
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="<?php echo base_url(); ?>websitecontroller/userChoice/logout" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>