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
                        if ($param['expense_type_id'] != '') {
                            $this->db->where('id', $param['expense_type_id']);
                            $query = $this->db->get('expense_type');
                            echo 'Expense :: ' . ($query->row()->name != '' ? $query->row()->name : '');
                        } else {
                            echo 'Expense';
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
                                <th>Expense Type</th>
                                <th>Amount</th>
                                <th>Comment</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr id="t_body"></tr>
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
                                        <td align="center"><?php echo $expense->amount; ?></td>
                                        <td align="center"><?php echo $expense->comment; ?></td>


                                    </tr> <?php }
                                    } else {
                                        echo 'No Data to dispaly !';
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