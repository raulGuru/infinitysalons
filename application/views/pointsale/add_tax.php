<div aria-hidden="true" aria-labelledby="taxModal" class="modal slide-up " id="newTaxModal" role="dialog" tabindex="-1" style="display: block; padding-left: 17px;">
    <div class="modal-dialog">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button aria-hidden="true" class="close" data-dismiss="modal">
                        <i class="pg-close fs-14"></i>
                    </button>
                    <h4 class="text-center">New Tax Rate</h4>
                </div>
                <div class="new-form">
                    <form novalidate="novalidate" class="simple_form new_tax_rate" id="new_tax_rate">
                        <input type="hidden" value="<?php echo $tax['id']; ?>" name="tax_id"/>
                        <div class="modal-body tax-rate-form sm-padding-10">
                            <div class="alert alert-danger hide"> </div>
                            <div class="row">
                                <div class="col-sm-6 left-modal-column-md sm-m-b-20">
                                    <div class="form-group">
                                        <label for="tax_rate_name">Tax Name</label>
                                        <input class="string required form-control full-width input-sm" autofocus="autofocus" placeholder="e.g. VAT" type="text" name="name" id="tax_rate_name" required="required" value="<?php echo $tax['taxname'] ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6 right-modal-column-md">
                                    <div class="form-group">
                                        <label for="tax_rate_rate">Rate</label>
                                        <div class="input-group">
                                            <input class="numeric float optional form-control full-width input-sm numeric-disabled" min="0.1" max="100" step="0.1" placeholder="0.0" type="number" name="rate" id="tax_rate_rate" required="required" value="<?php echo $tax['rate'] ?>">
                                            <span class="input-group-addon">
                                                %
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 right-modal-column-md">
                                    <div class="form-group">
                                        <label for="tax_rate_validf">Valid From</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="valid_from" id="tax_rate_validf" required="required" value="<?php echo $tax['validfrom'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 right-modal-column-md">
                                    <div class="form-group">
                                        <label for="tax_rate_validt">Valid Till</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="valid_till" id="tax_rate_validt" required="required" value="<?php echo $tax['validtill'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button aria-hidden="" class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
                            <button class="btn btn-success">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#new_tax_rate").validator().on("submit", function (event) {
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            $.ajax({
                url: g.base_url + 'provider/addTax',
                type: 'post',   
                dataType: 'json',
                data: $('form#new_tax_rate').serialize(),
                success: function(data) {
                    if(data.success){
                        //location.reload();
                        window.location = g.base_url + 'provider/taxes';
                    }
                    else{
                        $('.alert-danger').removeClass('hide').html(data.error)
                    }
                }
            });
        }
    });

    $('#tax_rate_validf, #tax_rate_validt').datepicker();
    /*$("#new_tax_rate").on('submit', function () {
        var tax_rate_name = $('#tax_rate_name').val();
        var tax_rate_rate = $('#tax_rate_rate').val();

        if (tax_rate_name == "") {
            alert('Name is required.');
            $('#tax_rate_name').focus();
            return false;
        }

        if (tax_rate_rate == "") {
            alert('Rate is required.');
            $('#tax_rate_rate').focus();
            return false;
        } else if (tax_rate_rate != '' && isNaN(tax_rate_rate)) {
            alert('Enter number value for Rate.');
            $('#tax_rate_rate').focus();
            return false;

        }
    })*/
</script>