
<div class="col-md-4">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Add Expenses</h3>
        </div><!-- /.box-header -->
        <?php echo validation_errors() ; if (isset($error)) {
    echo $error;
}; ?>

        <!-- form start -->
            <?php echo form_open('expense/add_new', array('role' => 'form', 'method' => 'post')); ?> 

        <div class="box-body">
<?php // echo validation_errors();  ?>
            <div class="input-group">
                <span class="input-group-addon">Type  </span>
                <select class="input-sm" name="expense_type" required>
                    <option value="">select</option>
                    <?php
                    $this->db->where('status', 1);
                    $query = $this->db->get('expense_type');
                    foreach ($query->result() as $row) {
                        ?>
                        <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
<?php } ?>
                </select>
            </div><br/>
            <div class="input-group">
                <span class="input-group-addon">TK</span>
                <input type="text"  name="amount" class="form-control input-mini" value="<?php echo (set_value('amount') != '') ? set_value('amount') : ''; ?>" requird>
                <span class="input-group-addon">.00</span>
            </div>
            <br/>
            <div class="form-group">
                <label>Comments </label>
                <textarea class="form-control textarea" name="comments" id="editor1" rows="1" placeholder="Enter ..."><?php echo (set_value('comments') != '') ? set_value('comments') : ''; ?></textarea>
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

<div class="col-md-8" id='print_div'>
    <div class="box box-success">
        <div class="box-header">
            <h3 class="box-title">All Expenses</h3>        
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="t_body"></tr>
<?php
if($all_expense != ''){
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

                            <td align="center">
                           <!--     <a class="marginleftright10" href="<?php// echo base_url(); ?>expense/edit_expense/<?php //echo $expense->id; ?>"><span class="glyphicon glyphicon-check"></span></a>
                                <a class="marginleftright10" onClick="return checkAction();"href="<?php //echo base_url(); ?>expense/delete_expense/<?php //echo $expense->id; ?>"> <span  class="glyphicon glyphicon-ban-circle"></span></a>
-->
                            </td>
</tr> <?php } }else{ echo 'No Data to dispaly !'; }?> 
                </tbody>
            </table> 




        </div><!-- /.box-body -->

        <div class="box-footer">
            <?php echo $links; ?>
             <p class='text-right' style='font-size:9px;'> Powered by: WWW.REFINEITBD.COM</p>
        </div>

    </div>
</div>