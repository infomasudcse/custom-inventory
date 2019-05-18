
<div class="col-md-8">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Edit Expense Type</h3>
             
        </div><!-- /.box-header -->
        <!-- form start -->
       <?php echo form_open('settings/edit_expense_type', array('role'=>'form', 'method' =>'post')); ?> 
        <input type="hidden" name="id" value="<?php echo $row->id; ?>" />
            <div class="box-body">
                 <?php echo validation_errors(); ?>
                <div class="input-group input-group-sm">
                    <input type="text" id="ex_type" name="ex_name" class="form-control" value="<?php echo $row->name; ?>" >
                    <span class="input-group-btn">
                        <button id="save" class="btn btn-info btn-flat" type="submit">Go!</button>
                    </span>
                </div>
            </div><!-- /.box-body -->

            <div class="box-footer">
              
            </div>
        </form>
    </div>
</div>