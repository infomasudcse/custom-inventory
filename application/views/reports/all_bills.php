
<div class="col-md-12" id='print_div'>
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">All Bills</h3>        
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">

            <table class="table table-bordered" id="data_table" >
                <thead> 
                    <tr class="bg-maroon-gradient">
                        <th align="center">ID</th>
                        <th align="center">Date</th>
                        <th align="center">Bill Number</th>
                        <th align="center">Buyer</th>
                        <th align="center">Total</th>
                        <th align="center">Download</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="t_body"></tr>
                    <?php
                    if ($all_bills != '') {
                  
                        foreach ($all_bills as $bill) {
                            ?>

                            <tr>
                                <td align="center"><?php echo $bill->id;?></td>
                                <td align="center"><?php echo $bill->bill_date; ?></td>
                                <td align="center"><?php echo $bill->bill_number; ?></td>
                                <td align="center"> 
                                    <?php  $this->db->where('id', $bill->buyer_id);
                                        $query = $this->db->get('people');
                                        echo '<span alt="'.$query->row()->address.' <br/>'.$query->row()->contact.'">'.$query->row()->full_name.'</span>'; ?> 
                                </td>
                                <td align="center"><?php echo $bill->total; ?> </td>
                                <td align="center">
                                    <a href="<?php echo base_url().$bill->link; ?>" target="_blank" alt="Download" class="btn btn-xs btn-primary">Download</a>
                                </td>
                               
                            </tr> <?php }
                            } else {
                                echo '<div class="alert alert-danger"> No Data to Diaplay !</div>';
                            } ?> 
                </tbody>
            </table> 




        </div><!-- /.box-body -->

        <div class="box-footer"><p class="text-right">
<?php echo $links; ?></p>
              <p class='text-right' style='font-size:9px;'> Powered by: WWW.REFINEITBD.COM</p>
        </div>

    </div>
</div>