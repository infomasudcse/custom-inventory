
<div class="col-md-7">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Update Revenue</h3>
        </div><!-- /.box-header -->
        <?php echo validation_errors() ; if (isset($error)) {
    echo $error;
}; ?>

        <!-- form start -->
            <?php echo form_open('revenue/edit_revenue', array('role' => 'form', 'method' => 'post')); ?> 

        <div class="box-body">
<?php // echo validation_errors();  ?>
            <div class="input-group">
                <span class="input-group-addon">Type  </span>
                <select class="input-sm" name="revenue_type" required>
                    <option value="">select</option>
                    <?php
                    $this->db->where('status', 1);
                    $query = $this->db->get('revenue_type');
                    foreach ($query->result() as $row) {
                        ?>
                        <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
<?php } ?>
                </select>
            </div><br/>
            <div class="input-group">
                <span class="input-group-addon">TK</span>
                <input type="text"  name="amount" class="form-control input-mini" value="<?php echo (set_value('amount') != '') ? set_value('amount') : $revenue->amount; ?>" requird>
                <span class="input-group-addon">.00</span>
            </div>
            <br/>
            <div class="form-group">
                <label>Comments </label>
                <textarea class="form-control textarea" name="comments" id="editor1" rows="1" placeholder="Enter ..."><?php echo (set_value('comments') != '') ? set_value('comments') : $revenue->comment; ?></textarea>
            </div>
            <br/>
            <div class="form-group">
                <input type="submit" class="btn btn-success right-side" value="Save">
            </div>

        </div><!-- /.box-body -->

        <div class="box-footer">

        </div>
        </form>
    </div>
</div>
