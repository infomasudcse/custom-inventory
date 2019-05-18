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
                        Payment::
                        <?php
                        if ($param['from_people_id'] != '') {
                            $this->db->where('id', $param['from_people_id']);
                            $query = $this->db->get('people');
                            echo ' From : ' . ($query->row()->full_name != '' ? $query->row()->full_name : '');
                        } 
                        if ($param['to_people_id'] != '') {
                            $this->db->where('id', $param['to_people_id']);
                            $query = $this->db->get('people');
                            echo ' To : ' . ($query->row()->full_name != '' ? $query->row()->full_name : '');
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
                        <th>From</th>
                        <th>To</th>
                        <th>Amount (BDT)</th>
                                             
                    </tr>
                </thead>
                <tbody>
                    <tr id="t_body"></tr>
                    <?php
                    if ($all_payments != '') {
                  $sum =0;
                        foreach ($all_payments as $pay) {
                            ?>

                            <tr>
                                <td><?php echo $pay->date; ?></td>
                                <td align="center">
                                    <?php
                                    $this->db->where('id', $pay->from_people_id);
                                    $query2 = $this->db->get('people');
                                    echo $query2->row()->full_name;
                                    ?>
                                </td>
                                <td align="center">
                                     <?php
                                    $this->db->where('id', $pay->to_people_id);
                                    $query2 = $this->db->get('people');
                                    echo $query2->row()->full_name;
                                    ?>
                                </td>
                                <td align="center"> <?php echo $pay->amount.'.00'; ?> </td>
                               
                            </tr>
                            
 <?php  $sum = $sum+ $pay->amount;  }
 ?>
                            <tr>
                                <td colspan="3" align="right">Total:</td>
                                <td align="center"><strong> <?php echo $sum.'.00'; ?></strong></td>
                            </tr>


                        <?php    } else {
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