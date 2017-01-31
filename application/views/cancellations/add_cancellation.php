<div aria-hidden="true" aria-labelledby="cancellationModal" class="modal slide-up in" id="newCancellationModal" role="dialog" tabindex="-1" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-center">
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        <i class="pg-close fs-14"></i>
                    </button>
                    <h4>
                        <?php echo (!empty($cancellationReasons['id'])) ? "Edit Cancellation Reason" : "New Cancellation Reason" ?>
                    </h4>
                </div>
                <form novalidate="novalidate" class="simple_form new_cancellation_reason" id="new_cancellation_reason" action="/cancellation_reasons" accept-charset="UTF-8" data-remote="true" method="post">
                    <div class="modal-body sm-padding-10">
                        <div class="form-group">
                            <div class="form-group string required cancellation_reason_name">
                                <label class="string required control-label" for="cancellation_reason_name">
                                    <abbr title="required">*</abbr> Name
                                </label>
                                <input class="string required form-control" placeholder="e.g. Client unavailable" type="text" name="cancellation_reason[name]" id="cancellation_reason_name" value="<?php echo (!empty($cancellationReasons['cancelreason'])) ? $cancellationReasons['cancelreason'] : "" ?>">
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
