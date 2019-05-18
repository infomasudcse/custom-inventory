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
                        Sales::
                        <?php
                        if ($param['buyer_id'] != '') {
                            $this->db->where('id', $param['buyer_id']);
                            $query = $this->db->get('people');
                            echo '->buyer:' . ($query->row()->full_name != '' ? $query->row()->full_name : '');
                        } 
                        if ($param['product_id'] != '') {
                            $this->db->where('id', $param['product_id']);
                            $query = $this->db->get('product');
                            echo '->product:' . ($query->row()->name != '' ? $query->row()->name : '');
                        } 
                         if ($param['invoice'] != '') {                            
                            echo '->invoice:' . $param['invoice'];
                        } 
                         if ($param['bill_number'] != '') {                            
                            echo '->bill:' . $param['bill_number'];
                        }
                        ?>

                    </h3>            
                    <p class="text-right">
                        <?php if ($param['type'] == 'sp')
                            echo $param['start'] . ' - -  ' . $param['end'];
                        else
                            echo 'All :';
                        ?>
                    </p>
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
                  
                        $ttqty=0;
                        $tot=0;
                        foreach ($all_sales as $sales) {
                            ?>

                            <tr>
                                <td align="center"><?php echo $sales->date; ?></td>
                                <td align="center"><?php echo $sales->invoice; ?></td>
                                <td align="center"><a href="<?php echo base_url().'bills/'.$sales->bill_number.'.pdf'; ?>" target="_blank" title='view bill'>  <?php echo $sales->bill_number; ?></a> </td>
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
                               
                            </tr> 
                                <?php 
                            $ttqty = $ttqty + $sales->qty;
                            $tot = $tot+$sales->sub_tot_price;
                        }?>
                            <tr  class='bg-gray'>
                                <td colspan='5' align='right'><strong>Total: </strong></td>
                                <td align='center'><strong><?php  echo $ttqty;  ?></strong></td>
                                <td align='center'><strong><?php echo $tot; ?></strong></td>
                                <td></td>
                            </tr>
                        
                          <?php  } else {
                                echo '<div class="alert alert-danger"> No Data to Diaplay !</div>';
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