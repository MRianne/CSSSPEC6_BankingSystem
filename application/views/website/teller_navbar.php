
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- userChoice -->
  <nav class="main-header userChoice userChoice-expand bg-white userChoice-light border-bottom">
    <!-- Left userChoice links -->
    <ul class="userChoice-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" ><i class="fa fa-bars"></i></a>
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
          <?php $url = $_SESSION['user']->user_type == 'user' ? 'user/profile' : 'teller/profile'; ?>
          <a href="<?php echo site_url().$url; ?>" class="d-block">  <?= $_SESSION['user']->person['first_name'] ?> , <?= $_SESSION['user']->person['last_name'] ?>
           <br> <?= $_SESSION['user']->user_type ?> </a>
          
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item has-treeview menu-open">
            <a class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                Account Transactions
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>customer/create" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Create Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>customer/search" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Search Customer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>account/type/view" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>View Account Types</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>account/search" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Search Account</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>user/create" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Create User</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a class="nav-link active">
              <i class="nav-icon fa fa-dashboard"></i>
              <p>
                General Transactions
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>teller/checkAccountBalance" class="nav-link ">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Check Account Balance</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>teller/withdrawFromAccount" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Withdraw from Account</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>teller/depositToAccount" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Deposit to Account</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url(); ?>teller/transferFunds" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Transfer Funds</p>
                </a>
              </li>
            </ul>
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