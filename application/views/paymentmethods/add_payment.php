<?php
//echo '<pre>', print_r($paymentMethod), '</pre>';
//exit();
?><div aria-hidden="true" aria-labelledby="paymentMethodModal" class="modal slide-up in" id="newPaymentMethodModal" role="dialog" tabindex="-1" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-center">
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">X
<!--                        <i class="pg-close fs-14"></i>-->
                    </button>
                    <h4><?php echo (!empty($paymentMethod['id'])) ? "Edit Payment Method" : "New Payment Method" ?></h4>
                </div>
                <form class="simple_form new_payment" id="new_payment" method="post">
                    <input type="hidden" name="payment_id" value="<?php echo $paymentMethod['id']; ?>"/>
                    <div class="modal-body">
                        <div class="alert alert-danger hide"></div>
                        <div class="form-group">
                            <div class="form-group string required payment_method_name">
                                <label class="string required control-label" for="payment_method_type">
                                    <abbr title="required">*</abbr> Name
                                </label>
                                <input class="string required form-control" placeholder="e.g. Cash" type="text" name="paymentMethod[type]" id="referral_source_name" value="<?php echo $paymentMethod['type'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="payment_method_active">
                                <input name="paymentMethod[active]" type="hidden" value="0" />
                                <input class="ios-switch-cb" type="checkbox" value="1" <?php echo (($paymentMethod['active'] != '') ? (($paymentMethod['active'] == 1) ? 'checked="checked"' : '') : 'checked="checked"') ?> name="paymentMethod[active]" id="payment_method_active">
                                <span class="switchery m-r-10"></span>
                                <span>Active</span>
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
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
    $("#new_payment").validator().on("submit", function (event) {
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            $.ajax({
                url: '/provider/addPaymentMethod',
                type: 'post',
                dataType: 'json',
                data: $('form#new_payment').serialize(),
                success: function (data) {
                    if (data.success) {
                        window.location = g.base_url + 'provider/paymentmethods';//location.pathname;
                    } else {
                        $('.alert-danger').removeClass('hide').html(data.error)
                    }
                }
            });
        }
    });

    $('#delete-referral-source').click(function () {
        $.ajax({
            url: g.base_url + 'provider/deleteReferralSource',
            type: 'post',
            dataType: 'json',
            data: {id: $(this).data('id')},
            success: function (data) {
                window.location = g.base_url + 'provider/paymentmethods';
            }
        });
    });
</script>