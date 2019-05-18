
<div class="col-md-12" id='print_div'>
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">All Purchase</h3>        
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
                        <th>Actions</th>
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
                                <td align="center">
                                <!--    <a class="marginleftright10" href="<?php //echo base_url();  ?>purchase/edit_purchase/<?php //echo $purchase->id;  ?>"><span class="glyphicon glyphicon-check"></span></a>
                                    <a class="marginleftright10" onClick="return checkAction();"href="<?php // echo base_url();  ?>purchase/delete_purchase/<?php // echo $purchase->id;  ?>"> <span  class="glyphicon glyphicon-ban-circle"></span></a>
                                    -->
                                </td>
                            </tr> <?php }
                    } else {
                        echo 'No Data to Diaplay !';
                    } ?> 
                </tbody>
            </table> 




        </div><!-- /.box-body -->

        <div class="box-footer">
<?php echo $links; ?>
              <p class='text-right' style='font-size:9px;'> Powered by: WWW.REFINEITBD.COM</p>
        </div>

    </div>
</div>