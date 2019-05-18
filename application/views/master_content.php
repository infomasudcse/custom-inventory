
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo base_url(); ?>sales/add_new">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3> Sales</h3>
                    <p>Product</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>                                
            </div>
        </a>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo base_url(); ?>payments/view_all_payments">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>Payment </h3>
                    <p>Items</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>                                
            </div>
        </a>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo base_url(); ?>purchase/add_new">	
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>Purchase</h3>
                    <p>entry</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
            </div>
        </a>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <a href="<?php echo base_url(); ?>reports/index">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>Report</h3>
                    <p>choose one </p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </a>
    </div><!-- ./col -->
</div><!-- /.row -->

<!-- Main row -->
<div class="row">
    <div class="col-md-9">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Latest Sales</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tr class='bg-green-gradient'>

                        <th>Date</th>
                        <th>Invoice</th>
                        <th>Bill N'</th>
                        <th>TO</th>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Sub-Tot</th>

                    </tr>
                    <?php
                    if ($all_sales != '') {

                        foreach ($all_sales as $sales) {
                            ?>

                            <tr>
                                <td align="center"><?php echo $sales->date; ?></td>
                                <td align="center"><?php echo $sales->invoice; ?></td>
                                <td align="center"> <?php echo $sales->bill_number; ?> </td>
                                <td align="center">
                                    <?php
                                    $this->db->where('id', $sales->buyer_id);
                                    $query2 = $this->db->get('people');
                                    echo $query2->row()->full_name;
                                    ?>
                                </td>
                                <td align="center">
                                    <?php
                                    $this->db->where('id', $sales->product_id);
                                    $query2 = $this->db->get('product');
                                    echo $query2->row()->name;
                                    ?>
                                </td>
                                <td align="center"><span class="label label-success"><?php echo $sales->qty . ' ' . $sales->unit; ?></span></td>
                                <td align="center" class=""><?php echo $sales->sub_tot_price; ?></td>                              

                            </tr> <?php
                        }
                    } else {
                        echo '<div class="alert alert-danger"> No Data to Diaplay !</div>';
                    }
                    ?> 
                </table>
            </div><!-- /.box-body -->                               
        </div><!-- /.box -->                           
    </div><!-- /.col -->
    <div class="col-md-3">
        <div class='row'>
            <div class="small-box bg-maroon-gradient">
                <div class="inner">
                     <h3>
                        <?php                        
                        /*$query = $this->db->get('bills');
                        if($query->num_rows())
                            echo $query->num_rows();
                        else*/
                            echo '0';
                        ?>
                    </h3>
                    <p>Tot Bills</p>
                </div>
                <div class="icon">
                    <i class="ion ion-document"></i>
                </div>                                
            </div>

            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>
                        <?php
                        $this->db->select_sum('sub_tot_price');
                        $query = $this->db->get('sales');
                        if($query->row()->sub_tot_price > 0)echo $query->row()->sub_tot_price; else echo '0';
                        ?>
                    </h3>
                    <p>Tot Sales</p>
                </div>
                <div class="icon">
                    <i class="ion ion-android-playstore"></i>
                </div>                                
            </div>


            <div class="small-box bg-purple-gradient">
                <div class="inner">
                     <h3>
                        <?php
                        $this->db->select_sum('sub_tot_price');
                        $query = $this->db->get('purchase');
                         if($query->row()->sub_tot_price > 0) echo $query->row()->sub_tot_price; else echo '0';
                        ?>
                    </h3>
                    <p>Tot Purchase</p>
                </div>
                <div class="icon">
                    <i class="ion ion-shuffle"></i>
                </div>                                
            </div>
             <div class="small-box bg-teal">
                <div class="inner">
                    <h3>
                        <?php
                        $this->db->select_sum('amount');
                        $query = $this->db->get('expense');
                       if($query->row()->amount > 0)  echo $query->row()->amount; else echo '0';
                        ?>
                    </h3>
                    <p>Tot Expense</p>
                </div>
                <div class="icon">
                    <i class="ion ion-reply-all"></i>
                </div>                                
            </div>
            <div class="small-box bg-purple">
                <div class="inner">
                     <h3>
                        <?php
                        $this->db->select_sum('amount');
                        $query = $this->db->get('revenue');
                         if($query->row()->amount > 0) echo $query->row()->amount; else echo '0';
                        ?>
                    </h3>
                    <p>Tot Revenue</p>
                </div>
                <div class="icon">
                    <i class="ion ion-record"></i>
                </div>                                
            </div>

        </div>
    </div>
    <div class="col-md-11">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Latest Purchase </h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered">
                    <tr class='bg-blue-gradient'>

                        <th>Date</th>
                        <th>Invoice</th>
                        <th>Supplier</th>
                        <th>Item</th>
                        <th>Qty</th>
                        <th>Sub-Tot</th>
                        <th>Comments</th>

                    </tr>
                    <tr id="t_body"></tr>
                    <?php
                    if ($all_purchase != '') {
                        foreach ($all_purchase as $purchase) {
                            ?>

                            <tr>
                                <td align="center"><?php echo $purchase->date; ?></td>
                                <td align="center"><?php echo $purchase->invoice; ?></td>
                                <td align="center">
                                    <?php
                                    $this->db->where('id', $purchase->supplier_id);
                                    $query2 = $this->db->get('people');
                                    echo $query2->row()->full_name;
                                    ?>
                                </td>
                                <td align="center"><?php echo $purchase->item_name; ?></td>
                                <td align="center"><span class="label label-success"><?php echo $purchase->qty . ' ' . $purchase->unit; ?></span></td>
                                <td align="center"><?php echo $purchase->sub_tot_price; ?></td>
                                <td align="center"><?php echo $purchase->comment; ?></td>

                            </tr> <?php
                        }
                    } else {
                        echo 'No Data to Diaplay !';
                    }
                    ?> 
                </table>
            </div><!-- /.box-body -->                               
        </div><!-- /.box --> 

    </div><!-- /.col -->
</div><!-- /.row -->
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Latest Expenses</h3>
                
            </div><!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                <table class="table">
                    <tr class='bg-maroon-gradient'>
                        <th>Date</th>
                        <th>Expense Type</th>
                        <th>Amount</th>
                        <th>Comments</th>

                    </tr>
<?php
if ($all_expense != '') {
    foreach ($all_expense as $expense) {
        ?>

                            <tr>
                                <td align="center"><?php echo $expense->date; ?></td>
                                <td align="center">
                                    <?php
                                    $this->db->where('id', $expense->expense_type_id);
                                    $query2 = $this->db->get('expense_type');
                                    echo $query2->row()->name;
                                    ?>
                                </td>
                                <td align="center"><span class="label label-warning"><?php echo $expense->amount . '  Tk'; ?></span></td>
                                <td><?php echo $expense->comment; ?></td>


                            </tr> <?php }
                            } else {
                                echo 'No Data to dispaly !';
                            } ?> 
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>