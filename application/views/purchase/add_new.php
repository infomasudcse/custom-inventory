
<div class="col-md-6">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Add Purchase</h3>
        </div><!-- /.box-header -->


        <!-- form start -->
        <?php echo form_open('purchase/add_new', array('role' => 'form', 'method' => 'post')); ?> 

        <div class="box-body">


            <div class="form-group">
                <label>Select Supplier</label>
                <select class="form-control" name="supplier_id" required>
                    <option></option>
                    <?php 
                        $this->db->where('role', 's');
                        $this->db->where('status', 1);
                       $query = $this->db->get('people');
                       foreach($query->result() as $row){
                           echo '<option value="'.$row->id.'">'.$row->full_name.' </option>';
                       }
                    ?>
                   
                </select>
            </div><br/>
            <div class="form-group">
                <label>Select Item</label>
                <select class="form-control" name="item_name" required>
                    <option value="powder">Powder</option>
                   
                </select>
            </div><br/>
            <div class="form-group">
                <label>Unit</label>
                <select class="form-control" name="unit" required>
                    <option value="pack">Pack</option>
                    <option value="kg">KG</option>
                </select>
            </div><br/>
            <div class="input-group">
                <label>Quantity </label>
                <span class="input-group-addon"></span>
                <input type="text"  name="quantity" class="form-control input-mini" id="qty" value="<?php echo (set_value('quantity') != '') ? set_value('quantity') : ''; ?>" >
                <span class="input-group-addon"></span>
            </div>
            <br/>

            <div class="input-group">
                <label>Unit Price </label>
                <span class="input-group-addon">TK</span>
                <input type="text"  name="uprice" class="form-control input-mini" id="price" value="<?php echo (set_value('uprice') != '') ? set_value('uprice') : ''; ?>" >
                <span class="input-group-addon">.00</span>
            </div>
            <br/>
            <div class="input-group">
                <label>Sub Total </label>
                <span class="input-group-addon">TK</span>
                <input type="text"  name="subtotal" class="form-control input-mini" id="subtot" disabled="disabled">
                <span class="input-group-addon">.00</span>
            </div><br/>
             <div class="input-group">
                <label>Invoice </label>
                <span class="input-group-addon">number</span>
                <input type="text"  name="invoice" class="form-control input-mini" value="<?php echo (set_value('invoice') != '') ? set_value('invoice') : ''; ?>" >
                <span class="input-group-addon"></span>
            </div>
            <br/>
            <div class="form-group">
                <label>Comments </label>
                <textarea class="form-control textarea" name="comments" id="editor1" rows="1" placeholder="Enter ..."><?php echo (set_value('comments') != '') ? set_value('comments') : ''; ?></textarea>
            </div>
            <br/>
            <div class="form-group">
                <input type="submit" class="btn btn-success  btn-block" value="Save">
            </div>

        </div><!-- /.box-body -->

        <div class="box-footer">

        </div>
        </form>
    </div>
</div>
<div class="col-md-4 col-md-offset-1">
    <div class="box box-info">
        <div class="box-header">
            <i class="fa fa-bullhorn"></i>
            <h3 class="box-title">Purchase Option Info: </h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="callout callout-danger">
                <?php
                echo validation_errors();
                if (isset($error)) {
                    echo $error;
                };
                ?>   

            </div>
            <div class="callout callout-info">
                <h4>Follow ! </h4>
                <p>Select Supplier .<br/> Select Item <br/> Select unit <br/> Enter Unit Price <br/> Date will be added by system.</p>
            </div>

        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div><!-- /.col -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#price').blur(function(){
     
        var qty = $('#qty').val();
       var price = $('#price').val();
       var tot = qty * price;
       
       $('#subtot').val(tot);
        
        
            
            
        });
      
        
    });
    
    </script>