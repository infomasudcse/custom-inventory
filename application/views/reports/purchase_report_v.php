<div class="col-md-12">

    <div class="row" id="print_div">
        <div class="col-sm-10 col-sm-offset-1">
            <!--header-->
            <p class="text-center"  style="margin-top:20px;">  <img src="<?php echo base_url(); ?>img/logo.png" width="50px" class="">
                <span class="text-maroon" style="font-size:25px;font-weight:bold;">MEGAL PLASTIC INDUSTRIES</span><p>
            <p class="text-center" style="font-weight:bold;">
                MANUFACTURER OF ALL KINDS OF <br/>PLASTIC PRODUCTS<br/>
                98/3, Nazimuddin Road, Hossain Dalan, Dhaka-1100.
                <br/><br/>
            </p> 
        </div>
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">
                        <?php
                        if ($param['supplier'] != '') {
                            $this->db->where('id', $param['supplier']);
                            $query = $this->db->get('people');
                            echo 'Purchase :: ' . ($query->row()->full_name != '' ? $query->row()->full_name : '');
                        } else {
                            echo 'Purchase';
                        }
                        ?>

                    </h3>            
                    <p class="text-center">
                        <?php if ($param['type'] == 'sp') echo $param['start'] . ' - -  ' . $param['end'];
                        else echo 'All'; ?>
                    </p>
                </div><!-- /.box-header -->
                <!-- form start -->

                <div class="box-body">

                    <table class="table table-bordered" id="data_table" >
                <thead> 
                    <tr class="bg-maroon-gradient">
                        <th>Date</th>
                        <th>Invoice</th>
                        <th>Supplier</th>
                        <th>Item</th>
                        <th>Qty</th>

                        <th>SubTotal</th>
                        <th>Comments</th>
                       
                    </tr>
                </thead>
                <tbody>
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
                                <td align="center"><?php echo $purchase->qty . ' ' . $purchase->unit; ?></td>
                                <td align="center"><?php echo $purchase->sub_tot_price; ?></td>
                                <td align="center"><?php echo $purchase->comment; ?></td>
                               
                            </tr> <?php }
                    } else {
                        echo '<tr><td colspan="7"><span class="alert alert-danger">No Data to Diaplay !</span></td></td>';
                    } ?> 
                </tbody>
            </table> 




                </div><!-- /.box-body -->

                <div class="box-footer">
                
                    
                    <p class="text-right"> Powered by: WWW.REFINEITBD.COM</p>
                </div>

            </div>
        </div>
    </div>
</div>