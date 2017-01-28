<div class="modal slide-up in" id="newDiscountModal" tabindex="-1" role="dialog" aria-labelledby="discountModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-center">
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        <i class="pg-close"></i>
                    </button>
                    <h4>
                        <?php echo ((!empty($discount['id'])) ? "Edit Discount" : "New Discount") ?>
                    </h4>
                </div>
                <div class="new-form">
                    <form class="simple_form new_discount" id="new_discount">
                        <input type="hidden" name="discount_id" value="<?php echo $discount['id']; ?>"/>
                        <div class="modal-body sm-padding-10 p-t-none">
                            <div class="alert alert-danger hide"></div>
                            <div class="form-group string required discount_name">
                                <label class="string required control-label" for="discount_name"><abbr title="required">*</abbr> Discount Name</label>
                                <input class="string required form-control" autofocus="autofocus" placeholder="e.g. Senior Citizens" type="text" name="discount[name]" id="discount_name" required="required">
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group full-width">
                                        <label for="value">Discount Value</label>
                                        <div class="input-group">
                                            <div class="input-group-addon discount-type-label">
                                                <div class="discount-percentage">%</div>
                                                <div class="discount-fixed hidden">₹</div>
                                            </div>
                                            <input class="numeric decimal required form-control" step="0.01" type="number" name="discount[value]" id="discount_value" required="required">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="radio radio-success m-t-35 m-b-none">
                                        <span><input type="radio" value="percentage" checked="checked" name="discount[discount_type]" id="discount_discount_type_percentage"><label class="collection_radio_buttons" for="discount_discount_type_percentage">% percentage</label></span><span><input type="radio" value="fixed" name="discount[discount_type]" id="discount_discount_type_fixed"><label class="collection_radio_buttons" for="discount_discount_type_fixed">INR amount</label></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-10">
                                <div class="col-sm-12">
                                    <div class="form-group boolean optional discount_enabled_for_services">
                                        <div class="checkbox check-success"><input name="discount[enabled_for_services]" type="hidden" value="0"><input class="boolean optional" type="checkbox" value="1" checked="checked" name="discount[enabled_for_services]" id="discount_enabled_for_services"><label class="boolean optional" for="discount_enabled_for_services">Enable for service sales</label></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group boolean optional discount_enabled_for_products">
                                        <div class="checkbox check-success"><input name="discount[enabled_for_products]" type="hidden" value="0"><input class="boolean optional" type="checkbox" value="1" checked="checked" name="discount[enabled_for_products]" id="discount_enabled_for_products"><label class="boolean optional" for="discount_enabled_for_products">Enable for product sales</label></div>
                                    </div>
                                </div>
                            </div>
                            <!--                            <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group boolean optional discount_enabled_for_vouchers">
                                                                    <div class="checkbox check-success"><input name="discount[enabled_for_vouchers]" type="hidden" value="0"><input class="boolean optional" type="checkbox" value="1" checked="checked" name="discount[enabled_for_vouchers]" id="discount_enabled_for_vouchers"><label class="boolean optional" for="discount_enabled_for_vouchers">Enable for voucher sales</label></div>
                                                                </div>
                                                            </div>
                                                        </div>-->
                        </div>
                        <div class="modal-footer">
                            <button aria-hidden="" class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
                            <button class="btn btn-success">Save</button>
                            <?php if (!empty($discount)) { ?>
                                <div class="pull-left">
                                    <a class="btn btn-danger" id="deleteBtn" href="javascript:void(0);" data-id="<?php echo $discount['id']; ?>">Delete</a>
                                </div>
                            <?php } ?>
                        </div>
                    </form>                
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#discount_discount_type_percentage').click(function () {
        $('.discount-percentage').show();
        $('.discount-fixed').addClass("hidden");
        $('.discount-fixed').hide();
    });
    $('#discount_discount_type_fixed').click(function () {
        $('.discount-percentage').hide();
        $('.discount-fixed').removeClass("hidden");
        $('.discount-fixed').show();
    });
    $("#new_discount").validator().on("submit", function (event) {
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            $.ajax({
                url: g.base_url + 'discounts/addDiscount',
                type: 'post',
                dataType: 'json',
                data: $('form#new_discount').serialize(),
                success: function (data) {
                    if (data.success) {
                        //location.reload();
                        window.location = g.base_url + 'discounts';
                    } else {
                        $('.alert-danger').removeClass('hide').html(data.error)
                    }
                }
            });
        }
    });

    load_edit();
    function load_edit() {
        if ('<?php echo $mode; ?>' == 'edit') {
            var discount = <?php echo json_encode($discount); ?>;
            $('#discount_name').val(discount['name']);
            $('#discount_value').val(discount['value']);
            if (discount['discount_type'] == 'percentage') {
                $('#discount_discount_type_percentage').trigger('click');
            } else {
                $('#discount_discount_type_fixed').trigger('click');
            }
            $('input:radio[name="discount[discount_type]"]').filter('[value="' + discount.discount_type + '"]').attr('checked', true);
            $("#discount_enabled_for_services").prop("checked", discount['enabled_for_services'] == "0" ? 0 : 1);
            $("#discount_enabled_for_products").prop("checked", discount['enabled_for_products'] == "0" ? 0 : 1);
            $("#discount_enabled_for_vouchers").prop("checked", discount['enabled_for_vouchers'] == "0" ? 0 : 1);

        }
    }

    $('#deleteBtn').click(function () {
        $.ajax({
            url: g.base_url + 'discounts/delete',
            type: 'post',
            dataType: 'json',
            data: {id: $(this).data('id')},
            success: function (data) {
                //location.reload();
                window.location = g.base_url + 'discounts';
            }
        });
    });

</script>