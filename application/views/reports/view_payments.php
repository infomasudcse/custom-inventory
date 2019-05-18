
<div class="col-md-12" id='print_div'>
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">All Payments</h3>  
            <button class="btn btn-tumblr btn-sm pull-right"  data-toggle="modal" data-target="#myModal" >add buyer payments</button>
            <button style="margin-right:15px;" class="btn btn-default btn-sm pull-right"  data-toggle="modal" data-target="#yourModal" >admin payments</button>
        </div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body">

            <table class="table table-bordered" id="data_table" >
                <thead> 
                    <tr class="bg-maroon-gradient">
                        <th>Date</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Amount</th>
                                             
                    </tr>
                </thead>
                <tbody>
                    <tr id="t_body"></tr>
                    <?php
                    if ($all_payments != '') {
                  
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
                                <td align="center"> <?php echo $pay->amount; ?> </td>
                               
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
<!--modal start ---->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3>Megal</h3>
            </div>
            <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Add Buyer Payment</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="<?php echo base_url(); ?>payments/add_payments">
                        <div class="box-body">
                            <div class="input-group input-group-sm">
                                <div class="form-group">
                                    <label>To: </label>
                                    <input type="text" class="form-control" disabled="diabled" value="Me"/>
                                </div>
                                <div class="form-group">
                                    <label>From :</label>
                                  <select  name="from" class="form-control" required>
                                      <?php 
                                      $this->db->where('role', 'b');
                                          $this->db->where('status', 1);
                                      $query = $this->db->get('people');
                                      foreach ($query->result() as $buyer){
                                       echo '<option value="'.$buyer->id.'">'.$buyer->full_name.'</option>';   
                                      }
                                      ?>
                                      
                                  </select>
                                </div>
                                <div class="form-group">
                                    <label>Amount: </label>
                                    
                                        <input type="text"  name="amount" class="form-control input-mini" id="price"  required />
                
                                </div>              
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">

                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>


<!---admin paumeents --->


<div class="modal fade" id="yourModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3>Megal</h3>
            </div>
            <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Add Admin Payment</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="<?php echo base_url(); ?>payments/add_admin_payments">
                        <div class="box-body">
                            <div class="input-group input-group-sm">
                                <div class="form-group">
                                    <label>To: </label>
                                  <select  name="to" class="form-control" required>
                                      <?php 
                                      $this->db->where('role', 's');
                                          $this->db->where('status', 1);
                                      $query = $this->db->get('people');
                                      foreach ($query->result() as $buyer){
                                       echo '<option value="'.$buyer->id.'">'.$buyer->full_name.'</option>';   
                                      }
                                      ?>
                                      
                                  </select>
                                </div>
                                <div class="form-group">
                                    <label>From :</label>
                                     <input type="text" class="form-control" disabled="diabled" value="Me"/>
                                
                                </div>
                                <div class="form-group">
                                    <label>Amount: </label>
                                    
                                        <input type="text"  name="amount" class="form-control input-mini" id="price"  required />
                
                                </div>              
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div><!-- /.box-body -->

                        <div class="box-footer">

                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!---modal end-->