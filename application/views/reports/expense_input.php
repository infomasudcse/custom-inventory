
<div class="row">

    <div class="col-md-10">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Expense Report Input</h3>
            </div>
            <div class="box-body">
            
                <form action="<?php echo base_url(); ?>reports/expense_report" method="post" role="form" class="form-horizontal" >

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Expense Type</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="exp_type_id">

                                <option value="">Select</option>                        
                                <?php
                                $queryexp = $this->db->get('expense_type');
                                foreach ($queryexp->result() as $expt) {
                                    ?>
                                    <option value="<?php echo $expt->id; ?>"><?php echo $expt->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">

                            <label class="radio-inline">
                                <input type="radio" name="type" id="inlineRadio2" value="sp" checked> Specific
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="type" id="inlineRadio3" value="all"> All
                            </label>

                        </div>
                    </div>

                    <div class="form-group">
                          <label for="inputPassword3" class="col-sm-2 control-label">Date Range</label>
                        <div class="col-sm-10">
                          
                            <select name="from_day">
                                <?php
                                $y = Date('Y');
                                $old = $y - 6;
                                for ($i = 1; $i < 32; $i++) {
                                    ?>    
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                            <select name="from_month">
                                <?php for ($i = 1; $i < 13; $i++) { ?>    
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                            <select name="from_year">
                                <?php for ($i = $y; $i > $old; $i--) { ?>    
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php } ?>
                            </select>
                            -----to-------
                            <select name="to_day">
                                <?php for ($i = 1; $i < 32; $i++) { ?>    
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                            <select name="to_month">
                                <?php for ($i = 1; $i < 13; $i++) { ?>    
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                            <select name="to_year">
                                <?php for ($i = $y; $i > $old; $i--) { ?>    
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php } ?>
                            </select>       
                        </div><!-- /.input group -->
                    </div><!-- /.form group -->



                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </div>
                </form>

            </div><!-- /.input group -->
        </div><!-- /.form group -->

    </div>


</div> 


<script type='text/javascript'>
    $(document).ready(function()
    {

    });
</script>        
