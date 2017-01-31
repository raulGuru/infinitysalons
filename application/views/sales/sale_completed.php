<div aria-hidden="false" aria-labelledby="modalSlideUpLabel" class="modal large-modal in" id="sale-completed" role="dialog" tabindex="-1" style="display: block; padding-left: 17px;">
   <div class="modal-dialog">
      <div class="modal-content no-border">
         <div class="modal-header clearfix text-left">
            <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
            <i class="pg-close"></i>
            </button>
            <h3 class="text-center large-modal__title">
               Sale Completed
            </h3>
         </div>
         <div class="modal-body sm-padding-10 modal-body--column">
            <div class="pos-box__alerts"></div>
            <div class="row pos-box">
               <div class="col-sm-5 col-xs-12 pos-box__item">
                  <div class="pos-box__item payment-box payment-box--bordered">
<!--                     <form class="simple_form one-line-form" novalidate="novalidate" id="new_email_receipt_form" action="/sales/42397-2943889/email_receipt" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="✓"><input class="string email required form-control one-line-form__item one-line-form__input" placeholder="Email address" type="email" name="email_receipt_form[email]" id="email_receipt_form_email">
                        <button class="btn btn-success btn-lg one-line-form__item bold">Email Invoice</button>
                     </form>-->
                     <div class="payment-box__btns">
<!--                        <a class="btn btn-lg btn-default download-receipt payment-box-btn bold" href="/sales/42397-2943889/pdf_receipt">Download PDF Invoice</a>-->
<a class="btn btn-lg btn-default print-receipt payment-box-btn bold" data-checkoutid="<?php echo $checkoutid ?>" href="javascript:void(0);">Print Invoice</a>
                     </div>
                     <div class="checkmark">
                        <svg version="1.1" id="checkAnimation" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 161.2 161.2" enable-background="new 0 0 161.2 161.2" xml:space="preserve">
                           <path class="path" fill="none" stroke="#10cfbd" stroke-miterlimit="10" d="M425.9,52.1L425.9,52.1c-2.2-2.6-6-2.6-8.3-0.1l-42.7,46.2l-14.3-16.4
                              c-2.3-2.7-6.2-2.7-8.6-0.1c-1.9,2.1-2,5.6-0.1,7.7l17.6,20.3c0.2,0.3,0.4,0.6,0.6,0.9c1.8,2,4.4,2.5,6.6,1.4c0.7-0.3,1.4-0.8,2-1.5
                              c0.3-0.3,0.5-0.6,0.7-0.9l46.3-50.1C427.7,57.5,427.7,54.2,425.9,52.1z"></path>
                           <circle class="circle-path" fill="none" stroke="#10cfbd" stroke-width="6" stroke-miterlimit="10" cx="80.6" cy="80.6" r="62.1"></circle>
                           <polyline class="path" fill="none" stroke="#10cfbd" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="48.2,86.4
                              74.1,108.4  113,52.8"></polyline>
                        </svg>
                     </div>
                  </div>
                  <div class="pos-box__btns pos-box-table__item visible-xs">
                     <button class="btn btn-block btn-lg btn-success bold fs-16" data-dismiss="modal">
                     Done
                     </button>
                  </div>
               </div>
               <div class="col-sm-7 pos-box__item hidden-xs">
                  <div class="pos-box-table">
                     <div class="pos-box__invoice">
                        <h4 class="text-center hidden-xs pos-box-table__item">Invoice 42397-2943889</h4>
                        <div class="pos-box__invoices pos-box-table__item">
                           <div class="invoice-row hidden-xs">
                              <div class="invoice-row__item invoice-row__item--left">
                                 <span class="m-r-15">1</span>
                                 <span class="invoice-row__name js-full-text">
                                 shaamk
                                 </span>
                              </div>
                              <div class="invoice-row__item invoice-row__item--right">
                                 <s>₹543.00</s><span class="text-danger m-l-10">₹534.00</span>
                              </div>
                           </div>
                           <hr class="m-t-5 m-b-5 hidden-xs">
                           <div class="row hidden-xs">
                              <div class="col-md-12">
                                 <div class="invoice-row">
                                    <div class="invoice-row__item invoice-row__item--big invoice-row__item--left text-uppercase"><span class="translation_missing" title="translation missing: en.sales.sale_completed.receipt.total_due">Total Due</span></div>
                                    <div class="invoice-row__item invoice-row__item--big invoice-row__item--right">
                                       <span>₹534.00</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <hr class="m-t-5 m-b-5 hidden-xs">
                           <div class="invoice-row payment-row text-muted hidden-xs">
                              <div class="invoice-row__item invoice-row__payment invoice-row__item--left">Cash</div>
                              <div class="invoice-row__item invoice-row__payment invoice-row__item--right">
                                 <span>₹534.00</span>
                              </div>
                           </div>
                           <div class="hidden invoice-row payment-tip-row">
                              <div class="col-xs-8 invoice-row__item invoice-row__item--left invoice-row__payment">Tip</div>
                              <div class="col-xs-4 invoice-row__item invoice-row__item--right invoice-row__payment">
                                 <span class="payment-tip">₹0.00</span>
                              </div>
                           </div>
                           <hr class="m-t-5 m-b-5 invoice-sum hidden-xs">
                           <div class="invoice-row hidden-xs">
                              <div class="invoice-row__item invoice-row__item--big invoice-row__item--left text-uppercase">Change</div>
                              <div class="invoice-row__item invoice-row__item--big invoice-row__item--right">
                                 <span>₹0.00</span>
                              </div>
                           </div>
                        </div>
                        <div class="pos-box__btns pos-box-table__item">
                           <button class="btn btn-block btn-lg btn-success bold fs-16" data-dismiss="modal">
                           Done
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
    $('.print-receipt').click(function(){
        
       $.ajax({
            url: g.base_url + 'invoice/printinvoice',
            type: 'post',   
            //dataType: 'html',
            data: $(this).data('checkoutid'),
            success: function(data) {
console.log(data);
return false;
            }
        });
        
    });
</script>