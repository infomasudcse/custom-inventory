<style>
    .linostyle ul{list-style: none;}
    
</style>
<section class="sidebar linostyle" style="">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo base_url(); ?>img/avatar5.png" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
            <p>Hello, Masud</p>

            <a href="<?php echo base_url(); ?>main_section/logout"><i class="fa fa-circle text-success"></i> <span class="text-error">LogOut</span></a>
        </div>
    </div>
    <ul class="sidebar-menu ">
    <li class="active">
            <a href="<?php echo base_url(); ?>main_section">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>
    </ul>
    <!-- search form -->
  <!--  <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..."/>
            <span class="input-group-btn">
                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>
  -->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    
    <div class=" col-sm-12 ">
        <div class="bg-maroon-gradient" align="center">Admin</div>
        <div class="bg-gray">
            <ul class="bg-green">
                <li><a href="<?php echo base_url(); ?>reports/index"><i class="fa fa-file-text-o"></i>  All Report</a></li>
               
                <li><a href="<?php echo base_url(); ?>reports/all_bill"><i class="fa fa-file-text-o"></i>  Bills Download</a></li>
               
            </ul>
        </div>
    </div>
  
    <div class=" col-sm-12 ">
        <div class="bg-maroon-gradient" align="center">Sales</div>
        <div class="bg-gray">
            <ul class="bg-green">
                 <li><a href="<?php echo base_url(); ?>sales/add_new"><i class="fa fa-shopping-cart"></i>  Add New</a></li>
                <li><a href="<?php echo base_url(); ?>sales/view_sales"><i class="fa fa-shopping-cart"></i>  View all</a></li>               
                <li><a href="<?php echo base_url(); ?>settings/product_to_sell"><i class="fa fa-shopping-cart"></i>  Product to Sell</a></li>
               <li><a href="<?php echo base_url(); ?>settings/buyer"><i class="fa fa-shopping-cart"></i>  Buyer</a></li>
               
            </ul>
        </div>
    </div>
    <div class=" col-sm-12 ">
        <div class="bg-maroon-gradient" align="center">Purchase</div>
        <div class="bg-gray">
            <ul class="bg-green">
                <li><a href="<?php echo base_url(); ?>purchase/add_new"><i class="fa fa-bitbucket"></i>  Add New</a></li>
                <li><a href="<?php echo base_url(); ?>purchase/view_purchase"><i class="fa fa-bitbucket"></i>  View all</a></li>               
                 <li><a href="<?php echo base_url(); ?>settings/supplier"><i class="fa fa-bitbucket"></i>  Supplier</a></li>
               
            </ul>
        </div>
    </div>
    <div class=" col-sm-12 ">
        <div class="bg-maroon-gradient" align="center">Payments</div>
        <div class="bg-gray">
            <ul class="bg-green">
               <li><a href="<?php echo base_url(); ?>payments/view_all_payments"><i class="fa fa-dollar"></i> Entity / View all</a></li>               
            </ul>
        </div>
    </div>
    <div class=" col-sm-12 ">
        <div class="bg-maroon-gradient"align="center">Revenue</div>
        <div class="bg-gray">
            <ul class="bg-green">
                <li><a href="<?php echo base_url(); ?>revenue/add_new"><i class="fa fa-inbox"></i> View / Add New</a></li>               
                 <li><a href="<?php echo base_url(); ?>settings/revenue_type"><i class="fa fa-inbox"></i>  Revenue Type</a></li>
               
            </ul>
        </div>
    </div>
    <div class=" col-sm-12 ">
        <div class="bg-maroon-gradient" align="center">Expense</div>
        <div class="bg-gray">
            <ul class="bg-green">
              <li><a href="<?php echo base_url(); ?>expense/add_new"><i class="fa fa-share-square"></i>  View / Add New</a></li>
                   
              <li><a href="<?php echo base_url(); ?>settings/expense_type"><i class="fa fa-share-square-o"></i>  Expense Type</a></li>
                
            
            </ul>
        </div>
        
    </div>
    
    <ul class="sidebar-menu ">
       <!-- <li class="active">
            <a href="<?php echo base_url(); ?>main_section">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
        </li>-->
     <!--   <li class="treeview">
            <a href="#">
                <i class="fa fa-th"></i>
                <span>Reports</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>reports/index"><i class="fa fa-angle-double-right"></i> All Report</a></li>
               
                <li><a href="<?php echo base_url(); ?>reports/all_bill"><i class="fa fa-angle-double-right"></i>Bills Download</a></li>
               
            </ul>
        </li>-->
    <!--    <li class="treeview">
            <a href="#">
               <i class="fa fa-bar-chart-o "></i>
                <span>Sales</span>
                 <i class="fa fa-angle-left pull-right"></i>
            </a>
             <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>sales/add_new"><i class="fa fa-angle-double-right"></i>Add New</a></li>
                <li><a href="<?php echo base_url(); ?>sales/view_sales"><i class="fa fa-angle-double-right"></i> View all</a></li>               
                
             </ul>
        </li>-->
      <!--  <li class="treeview">
            <a href="#">
                <i class="fa fa-shopping-cart"></i> <span>Purchase</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>purchase/add_new"><i class="fa fa-angle-double-right"></i>Add New</a></li>
                <li><a href="<?php echo base_url(); ?>purchase/view_purchase"><i class="fa fa-angle-double-right"></i> View all</a></li>               
            </ul>
        </li>-->
     <!--    <li class="treeview">
            <a href="#">
                <i class="fa fa-money"></i> <span>Payments</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
               
                <li><a href="<?php echo base_url(); ?>payments/view_all_payments"><i class="fa fa-angle-double-right"></i> View all</a></li>               
            </ul>
        </li>-->
     <!--   <li class="treeview">
            <a href="">
                <i class="fa fa-expand"></i> <span>Expenses</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a> 
             <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>expense/add_new"><i class="fa fa-angle-double-right"></i>View / Add New</a></li>
                        
            </ul>
        </li>-->
     <!--   <li class="treeview">
            <a href="#">
                <i class="fa fa-inbox"></i> <span>Revenue</span>
            <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>revenue/add_new"><i class="fa fa-angle-double-right"></i>View / Add New</a></li>
                         
            </ul>
        </li>-->
        <li>
            <a href="javascript:void(0);">
                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                <small class="badge pull-right bg-yellow">new</small>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-folder"></i> <span>Settings</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                
                <li><a href="<?php echo base_url(); ?>settings/product_to_sell"><i class="fa fa-angle-double-right"></i> Product to Sell</a></li>
                <li><a href="<?php echo base_url(); ?>settings/supplier"><i class="fa fa-angle-double-right"></i> Supplier</a></li>
                <li><a href="<?php echo base_url(); ?>settings/buyer"><i class="fa fa-angle-double-right"></i> Buyer</a></li>
                <li><a href="<?php echo base_url(); ?>settings/expense_type"><i class="fa fa-angle-double-right"></i> Expense Type</a></li>
                <li><a href="<?php echo base_url(); ?>settings/revenue_type"><i class="fa fa-angle-double-right"></i> Revenue Type</a></li>
               
            </ul>
        </li>
        <li></li>
        <li></li>
        <li></li>
        <li>
            <a href="http://refineitbd.com" target="_blank">Development : </i><img src="<?php echo base_url(); ?>refine_logo5.png" width="20px"></a>
        </li>
    </ul>
    
    
    
    
    
    
    
</section>