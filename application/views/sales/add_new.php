
<div class="col-md-3 col-md-offset-1">
    <div class="box box-primary">
        <div class="box-header"><h3 class="box-title">Add Purchase</h3></div><!-- /.box-header -->
        <!-- form start -->
        <div class="box-body" align="center">
            <button class="btn btn-info btn-lg " data-toggle="modal" data-target="#myModal"> <i class="fa fa-download"></i>   Add Item</button>
        </div><!-- /.box-body -->
        <div class="box-footer">  </div>
    </div>
</div>

<div class="col-md-3 col-md-offset-1">
    <div class="box box-danger">
        <div class="box-header"> <h3 class="box-title">Bill View</h3> </div><!-- /.box-header -->
        <!-- form start -->
        <div class="box-body" align="center">
            <?php   $cartdata = $this->cart->contents(); ?>
            <a href="<?php echo base_url(); ?>sales/view_bill" <?php if(empty($cartdata)) echo 'disabled="disabled"' ;?> class="btn btn-danger btn-lg" onClick="return checkAction();">  <i class="fa fa-dollar"></i>   Make Bill</a>
        
        </div><!-- /.box-body -->
        <div class="box-footer">  </div>
    </div>
</div>
<div class="col-md-3">
    <div class="callout callout-info">
        <h4>Follow ! </h4>
        <p>Select Buyer .<br/> Select Item <br/> Select unit <br/> Enter Unit Price <br/> Date will be added by system.</p>
    </div>

</div>
<!--payment view--->
<div class="col-md-12">
    <h2 class='text-danger'>DATE:  <?php echo $this->session->userdata('ddate'); ?></h2>
    <span data-toggle="modal" data-target="#ddateModal"  class='btn btn-warning btn-sm'>Add date</span>
    <a href='<?php echo base_url();?>cart/delete_date' class='btn btn-default'>Delete date</a>
</div>

<!---cart view----->
<div class="col-md-12">
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">Item already added to bill</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div class="box-body table-responsive">
            <?php if(empty($cartdata)) {
                echo '<div class="alert alert-danger" role="alert">No Item to Display !</div>';
                
            }else{
?>
            
            <table id="example2" class="table table-bordered table-hover">
                <thead class="bg-olive">
                    <tr>
                        <th>invoice</th>
                        <th>Items</th>
                        <th>Buyer</th>
                        <th>Unit Price</th>
                        <th>Qty</th>
                        <th>Subtotal</th>
                        <th>Action</th>
                        <th>Comment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                  
                    foreach ($cartdata as $crt) {
                        ?>
                        <tr>
                            <td>  <?php echo $crt['options']['invoice']; ?> </td>
                            <td>
                                <?php
                                $this->db->where('id', $crt['id']);
                                $query = $this->db->get('product');
                                echo $query->row()->name;
                                ?>
                            </td>
                            <td>
                                <?php
                                $this->db->where('id', $crt['name']);
                                $query = $this->db->get('people');
                                echo $query->row()->full_name;
                                ?>
                            </td>

                            <td><?php echo $crt['price']; ?></td>

                            <td>
                                <form action="<?php echo base_url(); ?>cart/update_cart/<?php echo $crt['rowid']; ?>" method="post">
                                    <?php echo $crt['options']['unit'] . ' : '; ?> 
                                    <input type="text" class="input-sx" name="qty" value="<?php echo $crt['qty']; ?>" /> 
                                    <input type="submit" class="btn btn-xs btn-warning" name="btn" value="Update">
                                </form>
                            </td>                             
                            <td><?php echo $crt['subtotal']; ?></td>
                            <td> <a class="btn btn-danger btn-xs" href="<?php echo base_url();?>cart/remove_tocart/<?php echo $crt['rowid'] ?>">Delete</a></td>
                            <td><?php echo $crt['options']['comments']; ?></td>
                        </tr>
                    <?php } ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="2" class="bg-maroon"> <span class="pull-right">Total: </span></td>
                              <td class="bg-aqua"><b><?php echo $this->cart->total(); ?></b></td>
                               <td></td>
                        </tr> 
            </table>
            <?php } ?>
        </div>

        <div class="box-footer">

        </div>

    </div>
</div>  


<!-------end cart ------>
<!---modal--->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open('cart/add_to_cart', array('role' => 'form', 'class' => 'form-horizontal', 'method' => 'post')); ?> 
                <div class="form-group">
                    <label class="col-sm-4 control-label" >Select Buyer</label>
                    <div class="col-sm-5 col-sm-offset-1">
                        <select class="form-control input-sm" name="buyer_id" required>
                            <option>select...</option>
                            <?php
                            $this->db->where('role', 'b');
                            $this->db->where('status', 1);
                            $query = $this->db->get('people');
                            foreach ($query->result() as $row) {
                                echo '<option value="' . $row->id . '">' . $row->full_name . ' </option>';
                            }
                            ?>

                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" >Select Item</label>
                    <div class="col-sm-5 col-sm-offset-1">
                        <select class="form-control input-sm" name="product_name" required>
                            <option>select...</option>
                            <?php
                            $this->db->where('status', 1);
                            $query = $this->db->get('product');
                            foreach ($query->result() as $row) {
                                echo '<option value="' . $row->id . '">' . $row->name . ' </option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" >Unit</label>
                    <div class="col-sm-5 col-sm-offset-1">
                        <select class="form-control input-sm" name="unit" required>
                            <option value="pack">Pack</option>
                            <option value="kg">KG</option>
                            <option value="pz">PZ</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label" for="qty" >Quantity </label>
                    <div class=" col-sm-5 col-sm-offset-1">
                        <input type="text"  name="quantity" class="form-control input-sm" id="qty" value="<?php echo (set_value('quantity') != '') ? set_value('quantity') : ''; ?>" >
                    </div>  
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Unit Price </label>

                    <div class="col-sm-5 col-sm-offset-1">
                        <input type="text"  name="uprice" class="form-control input-sm" id="price" value="<?php echo (set_value('uprice') != '') ? set_value('uprice') : ''; ?>" >
                    </div>

                </div>
                 <div class="form-group">
                    <label class="col-sm-4 control-label" for="qty" >Invoice </label>
                    <div class=" col-sm-5 col-sm-offset-1">
                        <input type="text"  name="invoice" class="form-control input-sm" id="invoice" value="<?php echo (set_value('invoice') != '') ? set_value('invoice') : ''; ?>" >
                    </div>  
                </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label">Comments </label>
                    <div class="col-sm-5 col-sm-offset-1">
                        <textarea class="form-control textarea" name="comments" id="" rows="2" placeholder="Enter ..."><?php echo (set_value('comments') != '') ? set_value('comments') : ''; ?></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-5">
                        <input type="submit" class="btn btn-success  btn-lg btn-block" value="Save">
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!---date modal--------->
<div class="modal fade" id="ddateModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <p class='text-danger'>Example ( year-month-day): 2014-05-20 </p>
                <?php echo form_open('cart/add_date', array('role' => 'form', 'class' => 'form-horizontal', 'method' => 'post')); ?> 
                
                 <div class="form-group">
                    <label class="col-sm-4 control-label" for="ddate" >Date:  </label>
                    <div class=" col-sm-5 col-sm-offset-1">
                        <input type="text"  name="ddate" class="form-control input-sm" id="invoice" value="" >
                    </div>  
                </div>
               
                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-5">
                        <input type="submit" class="btn btn-success  btn-lg btn-block" value="Save">
                    </div>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>

<!-----end date modal----->
<script type="text/javascript">
                $(document).ready(function() {

              
                });

</script>