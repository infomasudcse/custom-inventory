
<div class="col-md-12">
    <p class="text-right">
        <button class="btn btn-primary btn-lg right" data-toggle="modal" data-target="#myModal">
            NEW
        </button></p>
</div>
<div class="col-md-11">
    <div class="box box-success" id="list">
        <div class="box-header">
            <h3 class="box-title">Revenue Type  List</h3>
        </div><!-- /.box-header -->
        <div class="box-body">       
                <table class="table table-bordered" id="data_table" >
                    <thead> 
                    <tr class="bg-maroon-gradient">
                        <th>#</th>
                        <th>Task</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr id="t_body"></tr>
                    <?php foreach ($all_revenue_type as $type) { ?>

                        <tr>
                            <td align="center">#</td>
                            <td align="center"><?php echo $type->name; ?></td>
                            <td align="center">
                                <a class="marginleftright10" href="<?php echo base_url(); ?>settings/edit_revenue_type/<?php echo $type->id; ?>"><span class="glyphicon glyphicon-check"></span></a>
                                <a class="marginleftright10" onClick="return checkAction();"href="<?php echo base_url(); ?>settings/delete_revenue_type/<?php echo $type->id; ?>"> <span  class="glyphicon glyphicon-ban-circle"></span></a>

                            </td>
                        </tr> <?php } ?> 
                    </tbody>
                </table>           
        </div><!-- /.box-body -->                               
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
                        <h3 class="box-title">Add Revenue Type</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="<?php echo base_url(); ?>settings/add_revenue_type">
                        <div class="box-body">
                            <div class="input-group input-group-sm">
                                <input type="text" id="ex_type" name="ex_name" class="form-control" required autofocus>
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