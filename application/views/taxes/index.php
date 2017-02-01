<div class=" full-height business-settings-container" id="settings-container">
    <div class="alert alert-settings alert-success" style="display: none">
        Business information has been successfully updated.
    </div>
    <div class="panel panel-transparent">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-8">
                    <h3 class="no-margin hidden-xs">Taxes</h3>
                </div>
                <div class="col-sm-4">
                    <div class="pull-right">
                        <a class="btn btn-success m-t-10 btn-plus" data-href="/provider/newTax" data-params='' data-model="modal" data-modalid="newTaxModal" ><span class="hidden-xs">New Tax Rate</span>
                            <span class="visible-xs">+</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row m-t-20">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="/*discounts table-responsive*/">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-12" id="tax-rates-container">
                                    <div class="table-responsive" id="tax-rates">
                                        <table class="table table-condensed tax-rates table-tax-rates">
                                            <thead>
                                                <tr class="bg-grey">
                                                    <th>Tax name</th>
                                                    <th>Rate</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($taxes as $tax) { ?>
                                                    <tr data-href="/provider/newTax" data-params='{"id":"<?php echo $tax['id'] ?>"}' data-model="modal" data-modalid="newTaxModal" class="clickable-row tax_rate" id="tax_<?php echo $tax['id'] ?>">
                                                        <td><?php echo $tax['taxname']; ?></td>
                                                        <td><?php echo $tax['rate'] ?></td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
<!--                                                            <a class="btn btn-default m-t-10" data-href="/provider/newTax" data-params='' data-model="modal" data-modalid="newTaxModal" ><i class="s-icon-plus-thin fs-12"></i>
                                        New Tax Rate
                                    </a>-->
                                </div>
                                <div class="clearfix"></div>
                                <!--                                <hr>
                                                                <h5>
                                                                    Staff Commissions
                                                                    <i class="icon-question-circle hint-icon v-align-middle" data-placement="bottom" data-toggle="tooltip" title="Changes to commission and tax settings will only apply to new invoices, existing invoices are not impacted"></i>
                                                                </h5>-->
                                <!--                                <div class="inputs">
                                                                    <div class="form-group">
                                                                        <div class="controls form-inline">
                                                                            <div class="form-group boolean optional provider_commission_before_discount">
                                                                                <div class="checkbox check-success"><input name="provider[commission_before_discount]" type="hidden" value="0"><input class="boolean optional" type="checkbox" value="1" name="provider[commission_before_discount]" id="provider_commission_before_discount"><label class="boolean optional" for="provider_commission_before_discount">Calculate by item sale price before discount</label></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group" id="commission-after-tax">
                                                                        <div class="controls form-inline">
                                                                            <div class="form-group boolean optional provider_commission_after_tax">
                                                                                <div class="checkbox check-success"><input name="provider[commission_after_tax]" type="hidden" value="0"><input class="boolean optional" type="checkbox" value="1" name="provider[commission_after_tax]" id="provider_commission_after_tax"><label class="boolean optional" for="provider_commission_after_tax">Calculate by item sale price including tax</label></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="help help-block visible-xs">Changes to commission and tax settings will only apply to new invoices, existing invoices are not impacted</div>
                                                                    </div>
                                                                </div>-->
                            </div>
                        </div>

                        <!--                        <div class="row m-t-40">
                                                    <div class="col-lg-12">
                                                        <div class="text-right">
                                                            <input type="submit" name="commit" value="Save Changes" class="btn btn-success" id="submit-button">
                                                        </div>
                                                    </div>
                                                </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>