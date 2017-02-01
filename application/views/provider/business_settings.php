<div id="loading_image" style="display: none">
    <i class="icon-refresh icon-spin"></i>
    Loading...
</div>
<div class="row full-height no-margin table-like business-settings-container" id="settings-container" style="">
    <!--<div class="col-md-9 no-padding b-r b-dark-grey sm-b-b full-height table-cell overflow-hidden">-->
    <div class="bg-white full-height">
        <div class="alert alert-settings alert-success" style="display: none">
            Business information has been successfully updated.
        </div>
        <div class="panel panel-transparent">
            <div class="panel-body">
                <form>
                <div class="row m-t-10">
                    <div class="col-md-3">
                        <ul class="nav tabs-navigation" id="settings">
                            <li class="active sales_products"><a data-toggle="tab" href="#sales_products">Point of Sale</a></li>
<!--                            <li class="referral_sources"><a data-toggle="tab" href="#referral-sources">Referral Sources</a></li>
                            <li class="cancellation_reasons"><a data-toggle="tab" href="#cancellation-reasons">Cancellation Reasons</a></li>-->
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane active" id="sales_products">
                           
                                <div class="row" id="sales-settings">
   <div class="col-sm-12 col-md-12 col-lg-12">
      <div class="row">
         <div class="col-sm-12">
            <h3>
               General POS Settings
            </h3>
         </div>
      </div>
<!--      <div class="row">
         <div class="col-sm-12">
            <h5>
               Payment Types
            </h5>
         </div>
      </div>
      <div class="row" id="payment-methods">
         <div class="col-sm-12">
            <div class="inputs">
               <div class="form-group">
                  <div class="row">
                     <div class="col-xs-7 col-sm-9">
                        <input name="provider[payment_methods_attributes][0][custom]" type="hidden" value="0"><input class="boolean optional readonly hidden" readonly="readonly" type="checkbox" value="1" name="provider[payment_methods_attributes][0][custom]" id="provider_payment_methods_attributes_0_custom">
                        <input label="false" class="string required readonly form-control" readonly="readonly" placeholder="e.g. Mastercard" type="text" value="Cash" name="provider[payment_methods_attributes][0][name]" id="provider_payment_methods_attributes_0_name">
                     </div>
                     
                  </div>
               </div>
               <div class="form-group">
                  <div class="row">
                     <div class="col-xs-7 col-sm-9">
                        <input name="provider[payment_methods_attributes][2][custom]" type="hidden" value="0"><input class="boolean optional readonly hidden" readonly="readonly" type="checkbox" value="1" checked="checked" name="provider[payment_methods_attributes][2][custom]" id="provider_payment_methods_attributes_2_custom">
                        <input label="false" class="string required form-control" placeholder="e.g. Mastercard" type="text" value="Card" name="provider[payment_methods_attributes][2][name]" id="provider_payment_methods_attributes_2_name">
                     </div>
                  </div>
               </div>
            </div>
            <div class="clearfix"></div>
         </div>
      </div>-->
     
      <div class="row">
         <div class="col-sm-12">
            <hr>
            <h5>
               Taxes
            </h5>
<!--            <div class="row">
               <div class="col-sm-12">
                  <div class="inputs">
                     <div class="form-group">
                        <div class="controls form-inline">
                           <label id="tax-included">
                              Prices entered for Services and Products
                              <div class="inline m-l-10 form-group">
                                 <div class="select-wrapper inline">
                                    <select label="false" include_blank="false" class="select optional full-width form-control" name="provider[prices_include_tax]" id="provider_prices_include_tax">
                                       <option value="true">include tax</option>
                                       <option selected="selected" value="false">exclude tax</option>
                                    </select>
                                 </div>
                              </div>
                           </label>
                        </div>
                     </div>
                  </div>
               </div>
            </div>-->
            <div class="clearfix"></div>
            <div class="row">
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
                            <?php foreach($taxes['data'] as $tax){ ?>
                                <tr data-href="/provider/newTax" data-params='{"id":"<?php echo $tax['id'] ?>"}' data-model="modal" data-modalid="newTaxModal" class="clickable-row tax_rate" id="tax_<?php echo $tax['id'] ?>">
                                <td><?php echo $tax['taxname']; ?></td>
                                <td><?php echo $tax['rate'] ?></td>
                            </tr>
                            <?php } ?>
                            
                        </tbody>
                     </table>
                  </div>
                  <a class="btn btn-default m-t-10" data-href="/provider/newTax" data-params='' data-model="modal" data-modalid="newTaxModal" ><i class="s-icon-plus-thin fs-12"></i>
                  New Tax Rate
                  </a>
               </div>
            </div>
            <div class="clearfix"></div>
<!--            <hr>
            <h5>
               Staff Commissions
               <i class="icon-question-circle hint-icon v-align-middle" data-placement="bottom" data-toggle="tooltip" title="Changes to commission and tax settings will only apply to new invoices, existing invoices are not impacted"></i>
            </h5>-->
<!--            <div class="inputs">
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
   </div>
                                    
<!--<div class="row m-t-40">
   <div class="col-lg-12">
      <div class="text-right">
         <input type="submit" name="commit" value="Save Changes" class="btn btn-success" id="submit-button">
      </div>
   </div>
</div>-->
</div>
                                

                            </div>
                            <div class="tab-pane" id="referral-sources">
                                <div class="referral-sources-list">
                                    <div class="panel panel-transparent">
                                        <div class="panel-body">
                                            <div class="row sm-m-t-20">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-xs-6">
                                                            <h3 class="no-margin hidden-xs">Referral Sources</h3>
                                                        </div>
                                                        <div class="col-xs-6 text-right">
                                                            <a class="btn btn-success event-link" data-remote="true" href="/referrals/add"><span class="translation_missing" title="New ">New Referral Source</span></a>
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
                                                                        if (isset($referralSources) && !empty($referralSources)) {
                                                                            foreach ($referralSources['data'] as $referral) {
                                                                                ?>
                                                                                <tr class="clickable-row" data-href="/referral_sources/132690/edit" data-id="132690" data-remote="true" id="referral_source_132690">
                                                                                    <td class=" ui-sortable-handle"></td>
                                                                                    <td class="p-l-none"><a class=" " data-params='{"id":"<?php echo $res['id']; ?>"}' data-model="modal" data-modalid="newReferrals" href="/referrals/edit"><?php echo $referral['referralname']; ?></a>
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
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="cancellation-reasons">
                                <div class="cancellation-reasons-list">
                                    <div class="panel panel-transparent">
                                        <div class="panel-body">
                                            <div class="row sm-m-t-20">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-xs-4 col-sm-6">
                                                            <h3 class="no-margin hidden-xs">Cancellation Reasons</h3>
                                                        </div>
                                                        <div class="col-xs-8 col-sm-6 text-right">
                                                            <a class="btn btn-success event-link" data-remote="true" href="/cancellation_reasons/new"><span class="translation_missing" title="translation missing: en.providers.cancellation_reasons.new_cancellation_reason">New Cancellation Reason</span></a>
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
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody class="cancellation-reasons-container ui-sortable">
                                                                        <?php
                                                                        if (isset($cancellationReasons) && !empty($cancellationReasons)) {
                                                                            foreach ($cancellationReasons['data'] as $cancellation) {
                                                                                ?>
                                                                                <tr>
                                                                                    <td class="ui-sortable-handle"></td>
                                                                                    <td class="p-l-none">
                                                                                        <a class=" " data-params='{"id":"<?php echo $cancellation['id']; ?>"}' data-model="modal" data-modalid="newCancelReasonModal" href="/provider/editCancellationReasons"><?php echo $cancellation['cancelreason'] ?></a>
                                                                                    </td>
                                                                                    <td>
                                                                                <?php echo date("F j, Y, g:i a", strtotime($cancellation['date'])); ?>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                    
                    </form>
            </div>
        </div>
    </div>
</div>