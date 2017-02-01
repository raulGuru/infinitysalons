<div aria-hidden="true" aria-labelledby="cancellationModal" class="modal slide-up in" id="newCancellationModal" role="dialog" tabindex="-1" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-center">
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">X
                        <!--<i class="pg-close fs-14"></i>-->
                    </button>
                    <h4>
                        <?php echo (!empty($cancellationReasons['id'])) ? "Edit Cancellation Reason" : "New Cancellation Reason" ?>
                    </h4>
                </div>
                <form class="simple_form new_cancellation_reason" id="new_cancellation_reason" accept-charset="UTF-8" method="post">
                    <input type="hidden" name="cancellation_id" value="<?php echo $cancellationReasons['id']; ?>"/>
                    <div class="modal-body sm-padding-10">
                        <div class="form-group">
                            <div class="form-group string required cancellation_reason_name">
                                <label class="string required control-label" for="cancellation_reason_name">
                                    <abbr title="required">*</abbr> Name
                                </label>
                                <input class="string required form-control" placeholder="e.g. Client unavailable" type="text" name="cancellation_reason[name]" id="cancellation_reason_name" value="<?php echo (!empty($cancellationReasons['cancelreason'])) ? $cancellationReasons['cancelreason'] : "" ?>" required="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="pull-left">
                        </div>
                        <button aria-hidden="true" class="btn btn-default" data-dismiss="modal" type="button">
                            Cancel
                        </button>
                        <input type="submit" name="commit" value="Save" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>

    $("#new_cancellation_reason").validator().on("submit", function (event) {
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            $.ajax({
                url: '/provider/addCancellationReasons',
                type: 'post',
                dataType: 'json',
                data: $('form#new_cancellation_reason').serialize(),
                success: function (data) {
                    if (data.success) {
                        window.location = g.base_url + 'provider/cancellation_reasons';//location.pathname;
                    } else {
                        $('.alert-danger').removeClass('hide').html(data.error)
                    }
                }
            });
        }
    });

</script>
