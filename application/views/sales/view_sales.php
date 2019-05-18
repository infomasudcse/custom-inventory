
<div class="col-md-12" id='print_div'>
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">All Sales</h3>        
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">

            <table class="table table-bordered" id="data_table" >
                <thead> 
                    <tr class="bg-maroon-gradient">
                        <th>Date</th>
                        <th>Invoice</th>
                        <th>Bill Number</th>
                        <th>Buyer</th>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>SubTotal</th>
                        <th>Comments</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <tr id="t_body"></tr>
                    <?php
                    if ($all_sales != '') {
                  
                        foreach ($all_sales as $sales) {
                            ?>

                            <tr>
                                <td align="center"><?php echo $sales->date; ?></td>
                                <td align="center"><?php echo $sales->invoice; ?></td>
                                <td align="center"><a href="<?php echo base_url().'bills/'.$sales->bill_number.'.pdf'; ?>" target="_blank" title='view bill'> <?php echo $sales->bill_number; ?></a> </td>
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
                                <td align="center"><?php echo $sales->qty . ' ' . $sales->unit; ?></td>
                                <td align="center"><?php echo $sales->sub_tot_price; ?></td>
                                <td align="center"><?php echo $sales->comment; ?></td>
                               
                            </tr> <?php }
                            } else {
                                echo '<div class="alert alert-danger"> No Data to Diaplay !</div>';
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