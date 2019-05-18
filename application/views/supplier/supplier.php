
<div class="col-md-12">
    <p class="text-right">
        <button class="btn btn-primary btn-lg right" data-toggle="modal" data-target="#myModal">
            NEW
        </button></p>
</div>
<div class="col-md-11" id='print_div'>
    <div class="box box-success" id="list">
        <div class="box-header">
            <h3 class="box-title">Supplier Name List</h3>
            <p class="pull-right text-danger"> negative account means you paid advance</p>
        </div><!-- /.box-header -->
        <div class="box-body">       
                <table class="table table-bordered" id="data_table" >
                    <thead> 
                    <tr class="bg-navy">
                        <th>#</th>
                        <th>Name</th>
                        <th>address</th>
                        <th>Contact</th>
                        <th>Role</th>
                        <th>account</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id="t_body"></tr>
                    <?php foreach ($all_supplier as $v_supplier) { ?>

                        <tr>
                            <td align="center">#</td>
                            <td align="center"><?php echo $v_supplier->full_name; ?></td>
                            <td align="center"><address><?php echo $v_supplier->address; ?></address></td>
                            
                            <td align="center"><?php echo $v_supplier->contact; ?></td>
                            <td align="center"><img src="<?php echo base_url();?>img/supp-icon.png" alt='supplier' width='40'></td>
                            <td align="center">
                               <?php 
                                $this->db->where('people_id', $v_supplier->id);
                                $query = $this->db->get('account');
                                echo $query->row()->amount;
                               ?>
                               
                           </td> 
                            <td align="center">
                                <a class="marginleftright10" href="<?php echo base_url(); ?>settings/edit_supplier/<?php echo $v_supplier->id; ?>"><span class="glyphicon glyphicon-check"></span></a>
                                <a class="marginleftright10" onClick="return checkAction();"href="<?php echo base_url(); ?>settings/delete_supplier/<?php echo $v_supplier->id; ?>"> <span  class="glyphicon glyphicon-ban-circle"></span></a>

                            </td>
                        </tr> <?php } ?> 
                    </tbody>
                </table>           
        </div><!-- /.box-body --> 
        <div class="box-footer">

            <p class='text-right' style='font-size:9px;'> Powered by: WWW.REFINEITBD.COM</p>
        </div>
    </div><!-- /.box -->  
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h3>Megal</h3>
            </div>
            <div class="modal-body">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Add Supplier Info</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="<?php echo base_url(); ?>settings/add_supplier">
                        <div class="box-body">
                            <div class="input-group input-group-sm">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="full_name" class="form-control" placeholder="Enter Full Name ..." required/>
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" name="address" rows="3" placeholder="Enter Address..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Contact No.</label>
                                    <input type="text" name="contact" class="form-control" placeholder="Enter Contact Number..." required/>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function() {


    });

</script>   