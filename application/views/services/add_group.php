<div class="modal fade" id="newGroupModal" tabindex="-1" role="dialog" aria-labelledby="groupModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-center">
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button"><i class="pg-close fs-14"></i></button>
                    <h4>New Service Group</h4>
                </div>
                <div class="new-form">                
                    <form name="new_group" class="new_group" id="new_group">
                        <div class="modal-body sm-padding-10 p-t-none">
                            <div class="form-group group_name">
                            <div class="alert alert-danger hide" id="new_group_alert"></div>
                            <label class=" control-label" for="group_name"><abbr title="required">*</abbr> <span class="translation_missing" title="">Group Name</span></label>
                            <input class="form-control" autofocus="autofocus" placeholder="e.g. Hair Services" type="text" name="group_name" id="group_name" value="<?php echo $service->group_name; ?>">
                            <input type="hidden" name="group_id" value="<?php echo $service->id; ?>"/>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                    <button aria-hidden="" class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
                    <button class="btn btn-success " id="saveGroupButton">Save</button>
                    <?php
                        if(!empty($service)) { ?>
                        <div class="pull-left">
                            <div class="inline-block">
                                <button class="btn btn-danger" id="deleteGroupButton">Delete</button>
                            </div>
                        </div>                            
                        <?php } ?>                    
                    </div>                    
                </div>
        </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    
    $('#deleteGroupButton').click(function(){
        $.ajax({
            url: g.base_url + 'services/deleteGroup',
            type: 'post',   
            dataType: 'json',
            data: $('form#new_group').serialize(),
            success: function(data) {
                location.reload();
            }
        });
    });
    
    $('#saveGroupButton').click(function(){
        $.ajax({
            url: g.base_url + 'services/addGroup',
            type: 'post',   
            dataType: 'json',
            data: $('form#new_group').serialize(),
            success: function(data) {
                if(data.success){
                    /*$("#newGroupModal").find("input,textarea,select").val('').end().find('.alert').addClass('hide');
                    $("#newGroupModal").modal('hide');
                    location.reload();*/
                    //$("#newGroupModal").modal('hide').find('.alert').addClass('hide');
                    //$("#newGroupModal").find('form')[0].reset();
                    window.location = g.base_url + 'services';
                }
                else{
                    $('#new_group_alert').removeClass('hide').html(data.error)
                }
            }
        });        
    });   
});
</script>