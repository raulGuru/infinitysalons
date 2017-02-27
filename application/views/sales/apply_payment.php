<div aria-hidden="false" aria-labelledby="modalSlideUpLabel" class="modal large-modal in" id="new-payments" role="dialog" tabindex="-1" style="display: block;">
    <div id="loading_image" style="display: none">
        <i class="icon-refresh icon-spin"></i>
        Loading...
    </div>
   <div class="modal-dialog">
      <div class="modal-content no-border">
         <div class="modal-header clearfix text-left">
<!--             <button aria-hidden="true" class="close" data-dismiss="modal" type="button" id="close-payment">
                <i class="pg-close"></i><span>X</span>
            </button>-->
             <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close-payment"><span aria-hidden="true">&times;</span></button>
            <h3 class="text-center large-modal__title">
               Apply Payment
            </h3>
         </div>
         <div class="modal-body sm-padding-10 modal-body--column">
            <div class="row pos-box">
               <div class="col-sm-5 pos-box__item">
                  <div class="row">
                     <div class="col-xs-12">
                        <div class="payment-box__input--focus hidden"></div>
                        <label class="font-montserrat text-uppercase" for="payment_amount">Payment</label>
                     </div>
                  </div>
                  <div class="pos-box__item pos-box__item--thin payment-box">
                     <div class="payment-forms" id="voucher-redeem-forms" style="display: flex;">
                        <div class="payment-forms__item">
                           <div class="pos-box__item pos-box__item--thin">
                              <div class="pos-box__item pos-box__item--thin" id="payment-methods-forms">
                                 <div class="payment-type-form pos-box__item pos-box__item--thin">
                                    <div class="payment-forms__scrollable m-t-10">
                                       <div class="payment-methods payment-box__btns">
                                          <button class="btn btn-lg btn-success js-payment-method paymentmethod-btn" data-payment-method-id="1" data-payment-method-name="Cash">Cash</button>
                                          <button class="btn btn-lg btn-success js-payment-method paymentmethod-btn" data-payment-method-id="3" data-payment-method-name="Card">Card</button>
                                          <button class="btn btn-lg btn-success js-payment-method paymentmethod-btn" data-payment-method-id="2" data-payment-method-name="Other">Other</button>                                          
                                       </div>
                                    </div>
                                 </div>
                                  
                              </div>
                               
                               
                           </div>
                            
                        </div>
                        
                     </div>
                      
                      <div class="add-tip-container">
                                 <div class="padding-20">
                                    <div class="row">
                                       <div class="col-xs-6">
                                          <label class="form-label" for="payment_tip">Tip Amount</label>
                                       </div>
                                       <div class="col-xs-6 no-padding">
                                          <label class="form-label" for="payment_tipped_employee_ids">Staff tipped</label>
                                       </div>
                                    </div>
                                    <div class="attached-form-group">
                                       <div class="row no-margin">
                                          <div class="col-xs-6">
                                             <div class="form-group form-group-addon no-padding no-margin">
                                                <input type="number" name="payment_tip" id="payment_tip" value="" class="form-control add-decimals" step="0.01" placeholder="0.00">
                                                <div class="attached-group-addon tip-percentage"></div>
                                             </div>
                                          </div>
                                          <div class="col-xs-6 tipped-employees-row">
                                             <div class="form-group no-padding select-wrapper">
                                                <select name="payment_tipped_employee_id" id="payment_tipped_employee_id" class="form-control attached-field-last" required="required">
                                                    <option value="">Select staff</option>
                                                <?php foreach($staffs as $staff) {
                                                    echo "<option value='".$staff['id']."'>".$staff['first_name'] .' '.$staff['last_name']."</option>";
                                                } ?>
                                             </select>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row m-t-20">
                                       <div class="col-sm-12">
                                          <div class="btn btn-default btn-lg pull-right add-tip-btn bold full-width">Add Tip</div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                  </div>
               </div>
               <div class="col-sm-7 pos-box__item">
                  <div class="pos-box-table">
                      <form class="simple_form pos-box__invoice" id="new_payment">
                        <div class="row sm-m-t-20 attached-fields pos-box-table__item">
<!--                           <div class="col-md-6 col-xs-6 no-padding">
                              <div class="form-group middle-item">
                                 <label for="payments_employee_id">Received by</label>
                                 <div class="select-wrapper">
                                    <select class="full-width form-control" name="received_by" id="payments_employee_id">
                                       <option selected="selected" value="0">Admin</option>
                                    </select>
                                 </div>
                              </div>
                           </div>-->
                           <div class="col-md-6 col-xs-6 no-padding">
                              <div class="form-group">
                                 <label for="payments_date">Payment date</label>
                                 <div class="select-wrapper">
                                    <input placeholder="Select date" class="date-input form-control" type="text" name="payment_date" id="payments_date">
                                 </div>
                              </div>
                           </div>
                        </div>
                         <h4 class="text-center hidden-xs m-b-none pos-box-table__item">Invoice</h4>
                        <div class="invoices pos-box-table__item">
                            <?php
                                $fmt = Common::formatMoney();
                                $services = $sale['service'];
                                if(!empty($services)) { 
                                    foreach($services as $service) { ?>
                                <div class="invoice-row invoice-row-product row">
                                  <div class="col-sm-8 invoice-row__item invoice-row__item--left">
                                      <span class="m-r-15"><?php echo $service['quantity'] ?></span>
                                      <span class="invoice-row__name js-full-text"><?php echo $service['item-name'] ?></span>
                                  </div>
                                  <div class="col-sm-4 invoice-row__item invoice-row__item--right">
                                      <s>₹ <?php echo $service['full_price'] ?></s><span class="text-danger m-l-10">₹ <?php echo $service['special_price'] ?></span>
                                  </div>
                               </div>
                            <?php   } 
                                } 
                            
                                $items = $sale['items_attributes'];
                                foreach($items as $item) { ?>
                            
                                <div class="invoice-row invoice-row-product row">
                                  <div class="col-sm-8 invoice-row__item invoice-row__item--left">
                                      <span class="m-r-15"><?php echo $item['quantity'] ?></span>
                                      <span class="invoice-row__name js-full-text"><?php echo $item['item-name'] ?></span>
                                  </div>
                                  <div class="col-sm-4 invoice-row__item invoice-row__item--right">
                                      <s>₹ <?php echo $item['full_price'] ?></s><span class="text-danger m-l-10">₹ <?php echo $item['special_price'] ?></span>
                                  </div>
                               </div>
                                    
                            <?php     } ?>
                            
                            <hr class="m-t-5 m-b-5 invoice-sum">
                            <div class="row js-sale-total" >
                               <div class="col-md-12">
                                  <div class="invoice-row">
                                     <div class="invoice-row__item invoice-row__item--big invoice-row__item--left text-uppercase"><span class="translation_missing" title="">Sale Total</span></div>
                                     <div class="invoice-row__item invoice-row__item--big invoice-row__item--right text-danger">
                                         <input name="sale-total" id="sale-total-hd" type="hidden" value="<?php echo $sale['sale-total']; ?>" class="hidden">
                                         <span id="sale-total" class="m-l-5"><?php echo $fmt->format(Common::parseMoney($sale['sale-total'])); ?></span>
                                     </div>
                                  </div>
                               </div>
                            </div> 
                            
                            <div class="hidden js-tip">
                                <hr class="m-t-5 m-b-5">
                                <div class="row">

                                     <div class="col-xs-8 invoice-row__item invoice-row__item--left invoice-row__payment">Tip</div>
                                     <div class="col-xs-4 invoice-row__item invoice-row__item--right invoice-row__payment">
                                     <span class="js-tip-amount m-l-5"></span>
                                     <input type="hidden" name="tip-amount" id="tip-amount" value="0">
                                     <input type="hidden" name="tip-staff-id" id="tip-staff-id-hd" value="0">
                                     <a class="remove-payment invoice-row__remove">
                                     <i class="s-icon-close"></i>
                                     </a>
                                     </div>
                                 </div>                                
                            </div >
                           
                            <div class="js-sale-tax">
                                <hr class="m-t-5 m-b-5">
                                <div class="row">
                                    <?php 
                                    $totaltax = 0;
                                    foreach($taxes as $tax) {  ?>
                                    <div class="col-xs-8 invoice-row__item invoice-row__item--left invoice-row__payment"><?php echo 'Tax ( '.$tax['taxname'] .'  '.$tax['rate'].'% )'; ?></div>
                                     <div class="col-xs-4 invoice-row__item invoice-row__item--right invoice-row__payment">
                                         <?php 
                                            $salet = Common::parseMoney($sale['sale-total']);
                                            $taxcost = round((( $salet/ 100) * $tax['rate']), 2);
                                            $totaltax = ($totaltax + $taxcost);
                                            echo '₹ '.$taxcost;
                                         ?>
                                     </div>
                                    <?php } 
                                             echo "<input type='hidden' class='hidden totaltax' name='total-tax' value='".$totaltax."'>";
                                             $grand_total = round($salet + $totaltax, 2);
                                    ?>

                                 </div>
                            </div>
                            
                            <hr class="m-t-5 m-b-5 invoice-sum">
                           <div class="row">
                              <div class="col-md-12">
                                 <div class="invoice-row">
                                    <div class="invoice-row__item invoice-row__item--big invoice-row__item--left text-uppercase"><span class="translation_missing" title="">Grand Total</span></div>
                                    <div class="invoice-row__item invoice-row__item--big invoice-row__item--right text-danger">
                                        <input type="hidden" class="hidden paymentMethodName" name="payment-method-name" value="">
                                        <span id="paymentMethodName"></span>
                                        <input name="grand-total" id="grand-total-hd" type="hidden" value="<?php echo $grand_total; ?>" class="hidden">
                                        <span id="grand-total" class="m-l-5"><?php echo $fmt->format($grand_total); ?></span>
                                    </div>
                                 </div>
                              </div>
                           </div>     
                           
                        </div>
                         
                         <div class="pos-box__btns bg-white pos-box-table__item">
                             <div class=""><input type="checkbox" value="1" checked="checked" name="include_tax" id="include_tax"><label class="no-margin">Include Tax</label></div>
                             <input type="submit" name="pay" value="Paid" class="btn btn-lg full-width payment-button btn-success js-submit" disabled="disabled">
                             <a class="btn btn-lg btn-default view-receipt payment-box-btn bold hidden" data-checkoutid="" href="javascript:void(0);">View Invoice</a>
                        </div>
                    </form>
                </div> 
                   
                </div>
               </div>
            </div>
         </div>
      </div>
   </div>

<script>

    $('#payments_date').datepicker().datepicker("setDate", new Date());
    
    $('.js-payment-method').click(function(){
        var paymentMethodId = $(this).data('paymentMethodId'),
            paymentMethodName = $(this).data('paymentMethodName');
            
        $('.paymentMethodName').val(paymentMethodName);
        $('#paymentMethodName').html(paymentMethodName);
        $('.js-submit').removeAttr('disabled');
        
        $('.js-payment-method').removeClass('btn-warning');
        $(this).addClass('btn-warning');
    });
    
    $('.add-tip-btn').click(function(){        
            
        if($('#payment_tip').val() == '') {
            alert('Enter tip amount'); 
            return false;
        }
            
        if(payment_tipped_employee_id == '') {
            alert('Select Staff to tip'); 
            return false;
        }
        
        var payment_tip = parseFloat($('#payment_tip').val()).toFixed(2),
            payment_tipped_employee_id = $('#payment_tipped_employee_id').val();

        $('.js-tip').removeClass('hidden');
        $('.js-tip-amount').html('₹ ' + payment_tip);
        $('#tip-amount').val(payment_tip);
        $('#tip-staff-id-hd').val(payment_tipped_employee_id);
        
        var totalamount = parseFloat(parseFloat($('#grand-total-hd').val()) + parseFloat(payment_tip)).toFixed(2);
        $('#grand-total-hd').val(totalamount);
        $('#grand-total').html('₹ ' + totalamount);
        
        $('#payment_tip, #payment_tipped_employee_id').val('');
        $('.add-tip-container').addClass('hidden');
    });
    
    $('.remove-payment').click(function(){
        $('.js-tip').addClass('hidden');
        $('.add-tip-container').removeClass('hidden');
        
        var totalamount = parseFloat(parseFloat($('#grand-total-hd').val()) - parseFloat($('#tip-amount').val())).toFixed(2);
        $('#grand-total-hd').val(totalamount);
        $('#grand-total').html('₹ ' + totalamount);
        
        $('.js-tip-amount').html('');
        $('#tip-amount').val(0);
        
    });
    
    $('#include_tax').change(function(){
        var totaltax = parseFloat($('.totaltax').val()),
            grandtotal = parseFloat($('#grand-total-hd').val());
            
        if($(this).is(":checked")) {
            
            $('.js-sale-tax').removeClass('hidden');
            var gt = parseFloat(grandtotal + totaltax).toFixed(2);
            $('#grand-total-hd').val(gt);
            $('#grand-total').html('₹ '+gt);
            
        }else {
            
            $('.js-sale-tax').addClass('hidden');
            var gt = parseFloat(grandtotal - totaltax).toFixed(2);
            $('#grand-total-hd').val(gt);
            $('#grand-total').html('₹ '+gt);
        }
    });
    
    $("#new_payment").validator().on("submit", function (event) { 
    if (!event.isDefaultPrevented()) {
            event.preventDefault();
            
            loadingOverlay();
            $.ajax({
                url: g.base_url + 'sales/addPayment',
                type: 'post',   
                dataType: 'html',
                data: $('form#new_payment').serialize(),
                success: function(data) {
                    removeLoadingOverlay();
                    
                    var json = $.parseJSON(data);
                    $('.payment-button').addClass('hidden');
                    $('.payment-box').addClass('hidden');
                    $('.view-receipt').removeClass('hidden').data('checkoutid', json.checkoutid);
                    //window.open(g.base_url + 'invoice/printinvoice?id='+json.checkoutid, '_blank');
                    
//                    $('#sale-completed').remove();
//                    $('#new-payments').remove();
//                    $('body').append(data);
//                    $('#sale-completed').modal({backdrop: 'static', keyboard: false});
//                    $('#sale-completed').on('hidden.bs.modal', function(){
//                        $('.modal-backdrop').remove();
//                    });
                }
            });
        
        }
    });
    
    $('.view-receipt').click(function(){
        var checkoutid = $(this).data('checkoutid');
        window.open(g.base_url + 'invoice/printinvoice?id='+checkoutid, '_blank');
    });
    
    $('#close-payment').click(function(){
        window.location = g.base_url + 'calendar';
    });
    
</script>