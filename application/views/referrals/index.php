<div class="full-height business-settings-container" id="settings-container">
    <div class="alert alert-settings alert-success" style="display: none">
        Business information has been successfully updated.
    </div>
    <div class="panel panel-transparent">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="no-margin hidden-xs">Referral Sources</h3>
                </div>
                <div class="col-sm-4">
                    <div class="pull-right">
                        <a class="btn btn-success m-t-10 btn-plus" data-href="/provider/newReferral" data-params='' data-model="modal" data-modalid="newReferralModal"><span class="hidden-xs">New Referral Source</span>
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
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="referral-sources-container ui-sortable">
                                <?php
//                                echo '<pre>', print_r($referralSources), '</pre>';
//                                exit();
                                if (isset($referralSources) && !empty($referralSources)) {
                                    foreach ($referralSources as $referral) {
                                        ?>
                                        <tr class="clickable-row" data-params='{"id":"<?php echo $referral['id']; ?>"}' data-model="modal" data-modalid="newReferralModal" href="/provider/editReferralSources" id="<?php echo $referral['id']; ?>">
                                            <td class="icon-reorder ui-sortable-handle"></td>
                                            <td class="p-l-none">
                                                <?php echo $referral['referralname']; ?>
                                            </td>
                                            <td>
                                                <?php echo date("F j, Y, g:i a", strtotime($referral['date'])); ?>
                                            </td> 
                                            <td>
                                                <?php if ($referral['active']) { ?>
                                                    <span class="label label-success">Active</span>
                                                <?php } else { ?>
                                                    <span class="label label-fail">Inactive</span>
                                                <?php } ?>

                                            </td>
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