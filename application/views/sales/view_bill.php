<?php
$cartdata = $this->cart->contents();
if (empty($cartdata)) {
    echo '<div class="alert alert-danger" role="alert">No Item to make bill ! <br> </div>';
    echo "<p class='text-center'><a href ='" . base_url() . "sales/add_new' class='btn btn-primary' >Make New Bill</a></p>";
} else {
    ?>
    <!---cart view----->
    <div class="col-sm-12">

        <div class="row" >
            <div class="col-sm-10 col-sm-offset-1 bg-gray">
                <!--header-->
                <p class="text-center"  style="margin-top:20px;">  <img src="<?php echo base_url(); ?>img/logo.png" width="50px" class="">
                    <span class="text-maroon" style="font-size:25px;font-weight:bold;">MEGAL PLASTIC INDUSTRIES</span><p>
                <p class="text-center" style="font-weight:bold;">
                    MANUFACTURER OF ALL KINDS OF <br/>PLASTIC PRODUCTS<br/>
                    98/3, Nazimuddin Road, Hossain Dalan, Dhaka-1100.
                    <br/><br/>
                </p> 
            </div>
            <div class="col-sm-10 col-sm-offset-1 bg-gray">
                <!-- address-->
                <div class="row">
                    <div class="col-sm-7">
                        <table class="table">
                            <tr>
                                <td>Name:  </td>
                                <td> 
                                    <?php
                                    $this->db->where('id', $this->session->userdata('buyer_id'));
                                    $query = $this->db->get('people');
                                    echo $query->row()->full_name;
                                    ?> 
                                </td>

                            </tr>    
                            <tr>
                                <td>Address: </td>
                                <td> <?php echo $query->row()->address; ?></td>
                            </tr>  
                            <tr>
                                <td>Mobile/Phone: </td>
                                <td> <?php echo $query->row()->contact; ?></td>
                            </tr>    
                        </table>

                    </div>
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="row">
                            <div class="col-sm-4">Bill No: </div>
                            <div class="col-sm-8"><?php $bill_n = time();
                                    echo $bill_n; ?></div>
                            <div class="col-sm-4">Date: </div>
                            <div class="col-sm-8"><?php echo $this->session->userdata('ddate'); ?></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-sm-offset-1 bg-gray">
                <!--table-->
                <?php
                if (empty($cartdata)) {
                    echo '<div class="alert alert-danger" role="alert">No Item to Display !</div>';
                } else {
                    ?>
                    <div style="min-height:550px;width:95%;float:left;border:1px solid #ccc;">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead class="bg-maroon-gradient">
                                <tr>
                                    <th>No.</th>
                                    <th>Details</th>
                                    <th>invoice</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>                      
                                    <th>Subtotal</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($cartdata as $crt) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td> 
                                            <?php
                                            $this->db->where('id', $crt['id']);
                                            $query = $this->db->get('product');
                                            $small = substr($crt['options']['comments'], 0, 10);
                                            echo $query->row()->name . '<br/>' . $small;
                                            ?>
                                        </td>

                                        <td>  <?php echo $crt['options']['invoice']; ?> </td>
                                        <td><?php echo $crt['qty']; ?></td>
                                        <td><?php echo $crt['price']; ?></td>

                                        <td align="right"><?php echo $crt['subtotal'] . '.00'; ?></td>

                                    </tr>
            <?php $i++;
        } ?>

                        </table>
    <?php } ?>
                </div> 
                <div style="width:95%;float:left;">
                    <table class="table table-bordered table-hover">
                        <tr>

                            <td class="bg-maroon" width="80%"> <span class="pull-right">Total: </span></td>
                            <td class="bg-aqua" align="right"><b><?php echo $this->cart->total() . '.00'; ?></b></td>

                        </tr> 
                        <tr>
                            <td class="" width="80%"> <span class="pull-right">Due/advance: </span></td>
                            <td class="" align="right"><b>
                                <?php
                                 $this->db->where('people_id', $this->session->userdata('buyer_id'));
                                 $query = $this->db->get('account');
                                 $amount = $query->row()->amount;
                                 echo $amount.'.00';
                                ?>
                                </b></td>
                        </tr> 
                         
                        <tr>

                            <td class="" width="80%"> <span class="pull-right">Balance: </span></td>
                            <td class="" align="right"><b>
                                <?php
                                $payment =$this->session->userdata('payment');                                 
                                 if($payment != ''){
                                    $sub = $this->cart->total() + $amount; 
                                     $tot =  $sub - $payment.'.00';
                                    echo $tot;
                                 }else{
                                 echo $this->cart->total() + $amount.'.00';}
                                ?>
                                </b></td>

                        </tr> 
                    </table>
                </div>
            </div>

            <div class="col-sm-10 col-sm-offset-1 bg-gray">
                <!--footer-->
                <div class="row">
                    <div class="col-sm-5 col-sm-offset-1"><p><br/><br/></p><h5>Date: <?php echo date('d-m-Y'); ?></h5></div>
                    <div class="col-sm-3 col-sm-offset-3"><p><br/><br/></p><h5>Signature </h5><p><br/><br/><br/></p></div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2 col-sm-offset-4">
                <br/><br/>
                <a href="<?php echo base_url(); ?>sales/output_bill/<?php echo $bill_n; ?>"  onClick="return checkActionbill();" target="_blank" class="btn btn-block btn-foursquare">Bill Out</a>
            </div>
            <div class="col-sm-2 col-sm-offset-2">
                <br/><br/>
                <a href="<?php echo base_url(); ?>sales/add_new"  onClick="return checkAction();"  class="btn btn-block btn-default">Modify Bill</a>
            </div>
        </div>


    </div>  
<?php } ?>

<!-------end cart ------>
