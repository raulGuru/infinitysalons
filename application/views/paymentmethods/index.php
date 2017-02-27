<?php
//echo '<pre>', print_r($paymentMethods), '</pre>';
//exit();
?>
<div class="full-height business-settings-container" id="settings-container">
    <div class="alert alert-settings alert-success" style="display: none">
        Payment method has been successfully updated.
    </div>
    <div class="panel panel-transparent">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="no-margin hidden-xs">Payment Methods</h3>
                </div>
                <div class="col-sm-4">
                    <div class="pull-right">
                        <a class="btn btn-success m-t-10 btn-plus" data-href="/provider/newPayment" data-params='' data-model="modal" data-modalid="newPaymentMethodModal"><span class="hidden-xs">New Payment Method</span>
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
<!--                                    <th>Date Added</th>-->
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody class="payment-methods-container ui-sortable">
                                <?php
                                if (isset($paymentMethods) && !empty($paymentMethods)) {
                                    foreach ($paymentMethods as $paymentMethod) {
                                        ?>
                                        <tr class="clickable-row" data-params='{"id":"<?php echo $paymentMethod['id']; ?>"}' data-model="modal" data-modalid="newPaymentMethodModal" href="/provider/editPaymentMethod" id="<?php echo $paymentMethod['id']; ?>">
                                            <td class="icon-reorder ui-sortable-handle"></td>
                                            <td class="p-l-none">
                                                <?php echo $paymentMethod['type']; ?>
                                            </td>
<!--                                            <td>
                                                <?php // echo date("F j, Y, g:i a", strtotime($referral['date'])); ?>
                                            </td> -->
                                            <td>
                                                <?php if ($paymentMethod['active']) { ?>
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