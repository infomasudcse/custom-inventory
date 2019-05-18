
<div class="col-md-8">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Edit Supplier</h3>
             
        </div><!-- /.box-header -->
        <!-- form start -->
       <?php echo form_open('settings/edit_supplier', array('role'=>'form', 'method' =>'post')); ?> 
        <input type="hidden" name="id" value="<?php echo $row->id; ?>" />
            <div class="box-body">
                 <?php echo validation_errors(); ?>
                <div class="input-group input-group-sm">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="full_name" class="form-control" value="<?php echo $row->full_name; ?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="address" rows="3" placeholder="Enter Address..."><?php echo $row->address; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Contact No.</label>
                        <input type="text" name="contact" class="form-control" value="<?php echo $row->contact; ?>" required/>
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