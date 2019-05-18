   <?php   $cartdata = $this->cart->contents(); ?>
<!---cart view----->
<div style="width:100%;padding:10px 20px;">
  
            <div>
                <div align="center" style="width:100%;float:left;">
                    <!--header-->
                  <p style="margin-top:20px;" align="center">  <img src="<?php echo base_url();?>img/logo.png" width="50px" class="">
                    <span  style="color:#900000;font-size:25px;font-weight:bold;">MEGAL PLASTIC INDUSTRIES</span>
                  </p>
                    <p style="font-weight:bold;" align="center">
                        MANUFACTURER OF ALL KINDS OF <br/>PLASTIC PRODUCTS<br/>
                        98/3, Nazimuddin Road, Hossain Dalan, Dhaka-1100.
                        <br/><br/>
                    </p> 
                </div>
              <div align="center" style="width:100%;float:left;">
                   <!-- address-->
                   <div style="width:100%;">
                       <div style="width:60%;float:left;">
                           <table width="100%" style="">
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
                                    <td> <?php echo $query->row()->contact; ?> </td>
                               </tr>  
                                <tr>
                                    <td><h2>&nbsp;</h2></td>
                                    <td> <h2>&nbsp;</h2></td>
                               </tr>  
                           </table>
                           
                       </div>
                      <div style="width:30%;float:right;">
                           <div style="width:100%;">
                               <div style="width:40%;float:left;">Bill No: </div>
                          <div style="width:58%;float:left;"><?php echo $bill_n; ?><br/></div>
                          <div style="width:100%;float:left;"><p></p></div>
                                <div style="width:40%;float:left;">Date: </div>
                                 <div style="width:58%;float:left;"><?php echo $this->session->userdata('ddate');?></div>
                           </div>
                       </div>
                   </div>
                </div>
                    
                <div align="center" style="width:100%;float:left;">
                    <!--table-->
                     <?php if(empty($cartdata)) {
                echo '<div class="alert alert-danger" role="alert">No Item to Display !</div>';
                
            }else{
?>
                    <div style="min-height:400px;width:98%;float:left;border:1px solid #ccc;">
            <table id="example2" style="width:100%;">
                <thead>
                    <tr  style="background-color:#900000;">
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
                  $i=1;
                    foreach ($cartdata as $crt) {
                        ?>
                        <tr>
                            <td align="center"><?php echo $i; ?></td>
                            <td align="center"> 
                                 <?php
                                $this->db->where('id', $crt['name']);
                                $query = $this->db->get('product');
                                $small = substr($crt['options']['comments'], 0, 10);
                                echo $query->row()->name.'<br/>'.$small;
                                ?>
                            </td>
                            
                            <td align="center">  <?php echo $crt['options']['invoice']; ?> </td>
                            <td align="center"><?php echo $crt['qty']; ?></td>
                            <td align="center"><?php echo $crt['price']; ?></td>
                           
                            <td align="right"><?php echo $crt['subtotal'].'.00'; ?></td>
                            
                        </tr>
                    <?php $i++; } ?>
                        
            </table>
            <?php } ?>
                    </div> 
                    <div style="width:95%;float:left;">
                        <table style="width:100%;">
                            <tr>
                            
                            <td width="60%" align="right"> <p style="padding:5px;" align="right"><b>Total:</b> </p></td>
                            <td align="right"><b><?php echo $this->cart->total().'.00'; ?></b> BDT.</td>
                              
                             </tr> 
                             
                             <tr>
                            
                            <td width="60%" align="right"> <p style="padding:5px;" align="right"><b>Due/advance:</b> </p></td>
                            <td align="right"><b><?php 
                                 $this->db->where('people_id', $this->session->userdata('buyer_id'));
                                 $query = $this->db->get('account');
                                 $amount = $query->row()->amount;
                                 echo $amount.'.00';
                                ?></b> BDT.</td>
                              
                             </tr> 
                             
                             <tr>
                            
                            <td width="60%" align="right"> <p style="padding:5px;" align="right"><b>Balance:</b> </p></td>
                            <td align="right"><b>
                               <?php
                                 echo $this->cart->total() + $amount.'.00';
                                 ?>
                                
                                </b> BDT.</td>
                              
                             </tr> 
                        </table>
                    </div>
                </div>
                
               <div style="width:100%;float:left;">
                    <!--footer-->
                    <div style="width:100%;float:left;">
                       
                        <div style="width:40%;float:left;" align="center"><p><br/><br/></p><h5>Date: <?php echo date('d-m-Y');?></h5></div>
                       
                        <div style="width:50%;float:right;" align="right"><p><br/><br/></p><h5 style="margin-left:150px;">Signature </h5><p><br/><br/><br/></p></div>
                        
                    </div>
                </div>
            </div>
                
    
       
</div>  
<div style="width:90%;float:left;bottom:10px;">
    <p align="center"> ------------------***-----------------</p>
        <p align="center" style="font-size:9px;">Powered by: WWW.REFINEITBD.COM</p>
    </div>

<!-------end cart ------>
