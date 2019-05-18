<div class="row">
    <hr/>
    <span  data-toggle="modal" data-target="#saleModal" class="btn btn-facebook btn-lg col-sm-2 col-sm-offset-1"><i class="fa fa-bar-chart-o"> </i> Sales</span>
    <span  data-toggle="modal" data-target="#revenueModal" class="btn btn-success btn-lg col-sm-2 col-sm-offset-1"><i class="fa fa-inbox"> </i> Revenue</span>
    <span data-toggle="modal" data-target="#paymentModal" class="btn btn-instagram btn-lg col-sm-2 col-sm-offset-1"><i class="fa fa-money"> </i> Payments</span>
     <div class="col-sm-12">        <hr/><br/>    </div>
     <span data-toggle="modal" data-target="#purchaseModal" class="btn btn-warning btn-lg col-sm-2 col-sm-offset-1"><i class="fa fa-shopping-cart"> </i> Purchase</span>
     <span  data-toggle="modal" data-target="#expenseModal" class="btn btn-github btn-lg col-sm-2 col-sm-offset-1"><i class="fa fa-expand"> </i> Expense</span>

</div>

<!-- payments modal-->
<div class="modal fade" id="saleModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Megal Report</h4>
      </div>
      <div class="modal-body">
       
<div class="row">

    <div class="col-md-12">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Sales Report Input</h3>
            </div>
            <div class="box-body">
            
                <form action="<?php echo base_url(); ?>reports/sales_report" method="post" role="form" class="form-horizontal" >

                    <div class="form-group">
                        <label class="col-sm-2 control-label">buyer </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="buyer">

                                <option value="">Select</option>                        
                                <?php
                                   $this->db->where('role', 'b');
                               $query = $this->db->get('people');
                               foreach ($query->result() as $sale) {
                                    ?>
                                    <option value="<?php echo $sale->id; ?>"><?php echo $sale->full_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Product </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="product">

                                <option value="">Select</option>                        
                                <?php
                                $this->db->order_by('id', 'desc');
                               $queryppp = $this->db->get('product');
                              
                             foreach ($queryppp->result() as $pdt) {
                                    ?>
                                    <option value="<?php echo $pdt->id; ?>"><?php echo $pdt->name; ?></option>
                              <?php } ?>
                            </select>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-2 control-label">Invoice </label>
                        <div class="col-sm-10">
                            <input type="text" name="invoice">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Bill N" </label>
                        <div class="col-sm-10">
                            <input type="text" name="bill">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">

                            <label class="radio-inline">
                                <input type="radio" name="type" id="inlineRadio2" value="sp" > Specific
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="type" id="inlineRadio3" value="all"> All
                            </label>

                        </div>
                    </div>

                    <div class="form-group">
                          <label  class="col-sm-2 control-label">Date Range</label>
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
                            <button type="submit" class=" submit btn btn-facebook">Submit</button>
                        </div>
                    </div>
                </form>

            </div><!-- /.input group -->
        </div><!-- /.form group -->

    </div>


</div> 

      </div>
      <div class="modal-footer">
          <p class="text-danger pull-left">Date style: <strong>DAY-MONTH-YEAR</strong></p>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!-- sales modal end--->


<!-- revenue  modal-->
<div class="modal fade" id="revenueModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Megal Report</h4>
      </div>
      <div class="modal-body">
       
<div class="row">

    <div class="col-md-12">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Revenue Report Input</h3>
            </div>
            <div class="box-body">
            
                <form action="<?php echo base_url(); ?>reports/revenue_report" method="post" role="form" class="form-horizontal" >

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Revenue Type</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="rev_type_id">

                                <option value="">Select</option>                        
                                <?php
                                $queryrev = $this->db->get('revenue_type');
                                foreach ($queryrev->result() as $rev) {
                                    ?>
                                    <option value="<?php echo $rev->id; ?>"><?php echo $rev->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">

                            <label class="radio-inline">
                                <input type="radio" name="type" id="inlineRadio2" value="sp" > Specific
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
                            <button type="submit" class=" submit btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>

            </div><!-- /.input group -->
        </div><!-- /.form group -->

    </div>


</div> 

      </div>
      <div class="modal-footer">
           <p class="text-danger pull-left">Date style: <strong>DAY-MONTH-YEAR</strong></p>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!--Revenue modal end--->



<!-- payments modal-->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Megal Report</h4>
      </div>
      <div class="modal-body">
       
<div class="row">

    <div class="col-md-12">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Payment Report Input</h3>
            </div>
            <div class="box-body">
            
                <form action="<?php echo base_url(); ?>reports/payments_report" method="post" role="form" class="form-horizontal" >

                    <div class="form-group">
                        <label class="col-sm-2 control-label">From </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="from">

                                <option value="">Select</option>                        
                                <?php
                                
                                $querypayment = $this->db->get('people');
                                foreach ($querypayment->result() as $paym) {
                                    ?>
                                    <option value="<?php echo $paym->id; ?>"><?php echo $paym->full_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">To </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="to">

                                <option value="">Select</option>                        
                                <?php
                          
                              
                                foreach ($querypayment->result() as $pppaym) {
                                    ?>
                                    <option value="<?php echo $pppaym->id; ?>"><?php echo $pppaym->full_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">

                            <label class="radio-inline">
                                <input type="radio" name="type" id="inlineRadio2" value="sp" > Specific
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="type" id="inlineRadio3" value="all"> All
                            </label>

                        </div>
                    </div>

                    <div class="form-group">
                          <label  class="col-sm-2 control-label">Date Range</label>
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
                            <button type="submit" class="submit btn btn-instagram">Submit</button>
                        </div>
                    </div>
                </form>

            </div><!-- /.input group -->
        </div><!-- /.form group -->

    </div>


</div> 

      </div>
      <div class="modal-footer">
           <p class="text-danger pull-left">Date style: <strong>DAY-MONTH-YEAR</strong></p>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!-- payments modal end--->


<!-- purchase modal-->
<div class="modal fade" id="purchaseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Megal Report</h4>
      </div>
      <div class="modal-body">
       
<div class="row">

    <div class="col-md-12">

        <div class="box box-danger">
            <div class="box-header">
                <h3 class="box-title">Purchase Report Input</h3>
            </div>
            <div class="box-body">
            
                <form action="<?php echo base_url(); ?>reports/purchase_report" method="post" role="form" class="form-horizontal" >

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Supplier </label>
                        <div class="col-sm-10">
                            <select class="form-control" name="supplier_id">

                                <option value="">Select</option>                        
                                <?php
                                $this->db->where('role', 's');
                                $querypurch = $this->db->get('people');
                                foreach ($querypurch->result() as $purch) {
                                    ?>
                                    <option value="<?php echo $purch->id; ?>"><?php echo $purch->full_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="inputEma" class="col-sm-2 control-label">Invoice </label>
                        <div class="col-sm-10">
                           <input type="text" id="inputEma" name="invoice" >
                        </div>
                    </div>
                  
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">

                            <label class="radio-inline">
                                <input type="radio" name="type" id="inlineRadio2" value="sp" > Specific
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="type" id="inlineRadio3" value="all"> All
                            </label>

                        </div>
                    </div>

                    <div class="form-group">
                          <label  class="col-sm-2 control-label">Date Range</label>
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
                             <p class="text-danger pull-left">Date style: <strong>DAY-MONTH-YEAR</strong></p>
                            <button type="submit"  class=" submit btn btn-warning">Submit</button>
                        </div>
                    </div>
                </form>

            </div><!-- /.input group -->
        </div><!-- /.form group -->

    </div>


</div> 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!-- purchase modal end--->

<!-- expense modal-->
<div class="modal fade" id="expenseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Megal Report</h4>
      </div>
      <div class="modal-body">
       
<div class="row">

    <div class="col-md-12">

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
                                <input type="radio" name="type" id="inlineRadio2" value="sp" > Specific
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
                            <button type="submit"  class=" submit btn btn-github">Submit</button>
                        </div>
                    </div>
                </form>

            </div><!-- /.input group -->
        </div><!-- /.form group -->

    </div>


</div> 

      </div>
      <div class="modal-footer">
           <p class="text-danger pull-left">Date style: <strong>DAY-MONTH-YEAR</strong></p>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>

<!--modal end--->

<script type='text/javascript'>
    $(document).ready(function()
    {
        $('.submit').hide();
        $('.radio-inline').click(function(){
          $('.submit').show();  
        });
    });
</script>        