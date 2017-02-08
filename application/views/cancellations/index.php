<div class="full-height business-settings-container" id="settings-container">
    <div class="alert alert-settings alert-success" style="display: none">
        Business information has been successfully updated.
    </div>
    <div class="panel panel-transparent">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="no-margin hidden-xs">Cancellation Reasons</h3>
                </div>
                <div class="col-sm-4">
                    <div class="pull-right">
                        <a class="btn btn-success m-t-10 btn-plus" data-href="/provider/newcancellation" data-params='' data-model="modal" data-modalid="newCancellationModal"><span class="hidden-xs">New Cancellation Reason</span>
                            <span class="visible-xs">+</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row m-t-20">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-hover table-ui-sortable">
                            <thead class="bg-grey">
                                <tr>
                                    <th></th>
                                    <th class="p-l-none">Name</th>
                                    <th>Date Added</th>
                                    <!--<th>Status</th>-->
                                </tr>
                            </thead>
                            <tbody class="cancellation-reasons-container ui-sortable">
                                <?php
                                if (isset($cancellationReasons) && !empty($cancellationReasons)) {
                                    foreach ($cancellationReasons as $cancellation) {
                                        ?>
                                        <tr class="clickable-row" data-params='{"id":"<?php echo $cancellation['id']; ?>"}' data-model="modal" data-modalid="newCancellationModal" href="/provider/editCancellationReasons">
                                            <td class="icon-reorder ui-sortable-handle"></td>
                                            <td class="p-l-none">
                                                <?php echo $cancellation['cancelreason'] ?>
                                            </td>
                                            <td>
                                                <?php echo date("F j, Y, g:i a", strtotime($cancellation['date'])); ?>
                                            </td>
<!--                                            <td>
                                                <?php //if ($cancellation['active']) { ?>
                                                    <span class="label label-success">Active</span>
                                                <?php //} else { ?>
                                                    <span class="label label-fail">Inactive</span>
                                                <?php //} ?>
                                            </td>-->
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>