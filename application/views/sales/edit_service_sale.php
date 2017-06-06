<div aria-hidden="false" aria-labelledby="modalSlideUpLabel" class="modal large-modal in" id="edit-service-sale-<?php echo $invoiceid; ?>" role="dialog" tabindex="-1" style="display: block;">
    <div id="loading_image" style="display: none">
        <i class="icon-refresh icon-spin"></i>
        Loading...
    </div>
   <div class="modal-dialog">
      <div class="modal-content no-border">
         <div class="modal-header clearfix text-left">
             <button type="button" class="close close-modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h3 class="text-center large-modal__title">
               Checkout
            </h3>
         </div>
         <div class="modal-body sm-padding-10 modal-body--column">
            <div class="pos-box__alerts"></div>
            <div class="alert alert-danger hide">Select staff for all services.</div>
            <form class="simple_form row pos-box" id="edit_sale">
                <input type="hidden" name="sale[appointmentid]" id="appointment_id" value="0">
                <input type="hidden" name="sale[invoiceid]" value="<?php echo $invoiceid; ?>">
                <input type="hidden" name="sale[invoicenumber]" value="<?php echo $invoicenumber; ?>">
                <input type="hidden" name="sale[type]" value="EDIT">
               <div class="col-sm-5 pos-box__item">
                  <div class="m-b-20" id="customer-search">
                     <div class="row search-container">
                        <div class="col-sm-12">
                           <div class="form-group no-margin">
                              <label for="sale_customer_id">Client</label>
                              <div class="input-group">
                                 <input placeholder="Search by name or mobile number" class="search b-r-none form-control ui-autocomplete-input" autofocus="autofocus" type="text" name="sale[customer_id]" id="sale_customer_id" autocomplete="off">
                                 <span class="input-group-addon bg-white">
                                 <i class="s-icon-search"></i>
                                 </span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row buttons-container">
                        <div class="col-sm-12">
                           <div class="btn-group">
<!--                              <a class="btn btn-default m-t-10" data-remote="true" href="/customers/new"><i class="s-icon-plus-thin fs-12"></i>
                              Add new
                              </a>-->
                               <a class="btn btn-default m-t-10 walkin walkin_a" href="javascript:void(0);">Walk-In
                              </a>
                           </div>
                           <input type="hidden" name="walkin" id="walkin" value="0">
                        </div>
                     </div>
                     <div class="row details-container" style="display: none;">
                        <div class="col-xs-8 col-sm-8 col-md-6">
                           <h5 class="walkin">Walk-In Client</h5>
                           <div class="details">
                              <strong>
                                 <h5 class="name inline no-margin bold client_label"></h5>
                                 <h5 class="link inline no-margin bold">
                                    <a data-remote="true" href="#"></a>
                                 </h5>
                              </strong>
                              <div class="contact fs-16"></div>
                              <div class="labels-container">
                                 <div class="col-sm-12 customer-labels sm-no-padding"></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-6">
                           <div class="form-group no-margin text-right js-change_client-div">
                              <a class="btn btn-default remove sm-m-t-5" href="javascript:void(0);" id="change_client"><span class="hidden-xs hidden-sm">Change Client</span>
                              <span class="visible-xs visible-sm">Change</span>
                              </a>
                           </div>
                        </div>
                     </div>
                     <div class="row m-t-20 note-container" style="display: none;">
                        <div class="col-sm-12">
                           <div class="form-group customer-note-group no-margin">
                              <div class="alert alert-warning customer-note no-margin"></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="sale-box add-sellable">
<!--                     <div class="sale-box__header visible-xs" id="sale-box-header" tabindex="-1">
                        <button aria-hidden="true" class="close js-sale-box__close" type="button">
                        <i class="pg-close"></i>
                        </button>
                        <h4 class="text-center large-modal__tile">Select items</h4>
                     </div>-->
                     <div class="search-bar">
                        <input class="search form-control search-bar__input search_service" placeholder="Search service by name" type="text">
                        <span class="bg-white search-bar__addon">
                        <i class="s-icon-search"></i>
                        </span>
                        <a class="cancel-search search-bar__remove" href="javascript:void(0);" style="display: none;">
                        <i class="s-icon-close"></i>
                        </a>
                     </div>
<!--                     <div class="search-bar-navigation">
                        <div class="sale-navigation__item sale-navigation__item--back">
                           <div class="tip-alert"></div>
                           <div class="sale-navigation__title text-center">Services</div>
                           <a href="javascript:void(0);" class="sale-navigation__link  sale-navigation__link">
                              <div class="sale-navigation__title text-center">Products</div>
                           </a>
                        </div>
                     </div>-->
                     <div class="sale-box__item">
<!--                        <div class="search-results" style="display: none;"></div>
                        -->
                        <div class="navigation-stack">
<!--                           <div class="navigation" style="display: none;">
                              <ul class="sale-navigation">
                                 <li class="sale-navigation__item">
                                    <a href="" class="sellable-group sale-navigation__link--next sale-navigation__link">
                                       <div class="name sale-navigation__title">Products</div>
                                    </a>
                                 </li>
                                 <li class="sale-navigation__item">
                                    <a href="" class="sellable-group sale-navigation__link--next sale-navigation__link">
                                       <div class="name sale-navigation__title">Vouchers</div>
                                    </a>
                                 </li>
                              </ul>
                           </div>-->
                           <div class="navigation">
                              <ul class="sale-navigation">
<!--                                 <li class="sale-navigation__item hidden"><a href="" class="sale-navigation__link--back sale-navigation__link">Products</a></li>-->
                            <?php if(!empty($services)) {
                                foreach($services as $service) { ?>
                                <li class="sale-navigation__item">
                                    <a href="javascript:void(0);" class="sellable sale-navigation__link js-add-services" data-serviceid="<?php echo $service['id'] ?>">
                                       <span class="price sale-navigation__price sale-navigation__price--special">
                                           <div class="text-danger">₹ <?php echo $service['special_price'] ?></div>
                                          <s>₹ <?php echo $service['price'] ?></s>
                                       </span>
                                       <div class="name sale-navigation__name js-full-text"><?php echo $service['name'] ?></div>
                                       <div class="sale-navigation__label">&nbsp;</div>
                                    </a>
                                 </li>        
                                    <?php  }    
                                 } ?>
                              </ul>
                           </div>
                        </div>
                        <div class="sale-box__alerts sale-box__alerts--top hidden"></div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-7 pos-box__item">
                  <div class="pos-box-table">
                     <div class="pos-box__invoice">
                        <div class="row attached-fields pos-box-table__item">
                           <div class="col-md-6 col-xs-6 no-padding">
                              <div class="form-group">
                                 <label class="date optional" for="sale_invoice_date">Invoice date</label>
                                 <div class="select-wrapper">
                                    <input class="string optional readonly date-input form-control" type="text" name="sale[invoice_date]" id="sale_invoice_date">
                                 </div>
                              </div>
                           </div>
<!--                           <div class="col-md-6 col-xs-6 no-padding">
                              <div class="form-group">
                                 <label class="date optional" for="sale_due_date">Due date</label>
                                 <div class="select-wrapper">
                                    <input class="string optional readonly date-input form-control"  type="text" name="sale[due_date]" id="sale_due_date">
                                 </div>
                              </div>
                           </div>-->
                        </div>
                        <a class="btn btn-default btn-lg bold js-sale-box__trigger visible-xs m-t-10 m-b-20">Add item</a>
                        <h4 class="text-center hidden-xs m-b-none pos-box-table__item">
                           New Invoice
                        </h4>
                        <div class="pos-box__invoices pos-box-table__item">
                           <div class="invoice-placeholder">
                              <div class="invoice-placeholder__item">
                                 <p>
                                    <i class="s-icon-tickets invoice-placeholder__icon"></i>
                                 </p>
                                 <p class="invoice-placeholder__text">
                                    No items added yet, pick items on the left.
                                 </p>
                              </div>
                           </div>
                                      
                                      <div class="row sm-no-margin">
                                            <div class="col-lg-12 sale-items">
                                                
                                                <div class="sale-app-service-container">
                                                    <?php if(!empty($appointment)) { 
                                                            foreach($appointment['services'] as $k => $service) { ?>
                                                    
                                                    <div class="full-height row sale-item sale-item-row-nil-class sale-item-row-nil-class-new sale-item-row-appservice" tabindex="-1" id="sale-service-item-<?php echo $k; ?>">
                                                            <input class="hidden" type="hidden" name="sale[service][<?php echo $k; ?>][item-id]" value="<?php echo $service['service_id'] ?>">
                                                            <input value="<?php echo $service['service'] ?>" class="hidden" type="hidden" name="sale[service][<?php echo $k; ?>][item-name]">
                                                            <div class="invoice-row row">
                                                               <div class="col-sm-12 col-md-8 invoice-row__item invoice-row__item--left">
                                                                  <span class="quantity-presenter m-r-15"><?php echo $service['quantity'] ?></span>
                                                                  <span class="item-label invoice-row__name js-full-text"><?php echo $service['service'] ?></span>
                                                               </div>
                                                               <div class="col-sm-12 col-md-4 invoice-row__item invoice-row__item--right">
                                                                  <div>
                                                                      <input type="hidden" value="<?php echo $service['special_price'] ?>" name="sale[service][<?php echo $k; ?>][og_special_price]" id="js-og-sp-service-hd-<?php echo $k; ?>">
                                                                      <input type="hidden" value="<?php echo $service['price'] ?>" name="sale[service][<?php echo $k; ?>][special_price]" id="js-sp-service-hd-<?php echo $k; ?>">
                                                                      <input type="hidden" value="<?php echo $service['special_price'] ?>" name="sale[service][<?php echo $k; ?>][full_price]">
                                                                      <span class="price-presenter"><span><span><s class="js-fp">₹ <?php echo $service['special_price'] ?></s></span><span class="text-danger m-l-10 js-sp" id="js-sp-service-<?php echo $k; ?>">₹ <?php echo $service['price'] ?></span></span></span>
                                                                      <a class="remove-attached-group remove-sale-service-item" data-serviceid="<?php echo $k; ?>" href="javscript:void(0);"><i class="s-icon-close"></i></a>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="row sale-item__inputs p-l-20 p-r-20">
                                                               <div class="col-md-2 col-sm-6 col-xs-6 sale-tax-group sm-p-r-5 md-p-r-7">
                                                                  <div class="form-group">
                                                                     <label for="">Quantity</label>
                                                                     <input min="0" class="numeric integer optional form-control quantity" pattern="\d*" type="number" step="1" readonly="readonly" name="sale[service][<?php echo $k; ?>][quantity]" value="<?php echo $service['quantity'] ?>" id="quantity-<?php echo $k; ?>">
                                                                  </div>
                                                               </div>
                                                               <div class="col-md-2 col-sm-6 col-xs-6 sm-p-l-5 md-p-l-7">
                                                                  <div class="form-group">
                                                                     <label for="">Price</label>
                                                                     <input step="0.01" min="0" class="numeric float optional form-control unit-price numeric-disabled" placeholder="0.00" type="number" disabled="disabled" value="<?php echo $service['special_price'] ?>" id="service-actual-special-price-<?php echo $k; ?>">
                                                                  </div>
                                                               </div>
                                                               <div class="col-md-4 col-sm-12 col-xs-12">
                                                                  <div class="form-group special-discount-group">
                                                                     <label class="hidden-xs hidden-sm" for="">Discount</label>
                                                                     <div class="select-wrapper">
                                                                         <input class="hidden service-row-id" type="hidden" value="<?php echo $k ?>">
                                                                         <select class="select required form-control text-left service-discount" include_blank="Select discount" name="sale[service][<?php echo $k; ?>][discount_id]" id="js-service-discount-<?php echo $k; ?>">
                                                                           <option value="">Select discount</option>
                                                                           <?php foreach($servicediscounts as $discount) {
                                                                               $sel = ($discount['id'] == $service['discountid']) ? 'selected="selected"' : '';
                                                                               $t = ($discount['discount_type'] == 'fixed') ? ' (₹ '.$discount['value'].') ' : ' ( '.$discount['value'].'%) ';
                                                                               $lbl = $discount['name'] . $t;
                                                                               echo "<option value='".$discount['id']."' data-distype='".$discount['discount_type']."' data-value='".$discount['value']."' $sel>".$lbl."</option>";
                                                                           }?>
                                                                        </select>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="col-md-4 col-sm-12 col-xs-12 sale-item-employee">
                                                                  <div class="form-group no-padding">
                                                                     <label class="hidden-xs hidden-sm" for="">Staff</label>
                                                                      <div class="select-wrapper">
                                                                          <select include_blank="Select staff" class="select optional block form-control employee_id" required="required" name="sale[service][<?php echo $k; ?>][staff-id]">
                                                                              <option value="">Select staff</option>
                                                                              <?php foreach($staffs as $staff) {
                                                                                  $sel = ($staff['id'] == $service['staff_id']) ? 'selected="selected"' : '';
                                                                                  echo "<option value='".$staff['id']."' $sel>".$staff['first_name'] .' '.$staff['last_name']."</option>";
                                                                              } ?>
                                                                          </select>
                                                                      </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                            <?php }
                                                            } ?>                                                    
                                                </div>
                                                
                                               <div class="sale-item-container"></div>
                                            </div>
                                         </div>
                                      
                        </div>
                        <div class="pos-box__btns bg-white pos-box-table__item">
                            <button name="apply_payment" type="submit" value="apply_payment" class="btn btn-success btn-lg payment-button full-width" disabled="" id="apply_payment">
                              <span class="pull-left h3 no-margin bold">Checkout</span>
                              <div class="sale-total clearfix pull-right">
                                  <input type="hidden" value="0" class="hidden sale-total-hd" name="sale[sale-total]">
                                 <span class="sale-total-price h3 no-margin bold">₹ 0.00</span>
                              </div>
                           </button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
    
<div class="hidden" id="service-checkout">
    <div class="full-height row sale-item sale-item-row-nil-class sale-item-row-nil-class-new  sale-item--editable sale-item-row-service" tabindex="-1" id="sale-item-row-service-tocopy">
            <input class="hidden item-id" type="hidden" value="">
            <input value="Service" class="hidden item-type" type="hidden">
            <input value="" class="hidden item-name" type="hidden">
            <div class="invoice-row row">
               <div class="col-sm-12 col-md-8 invoice-row__item invoice-row__item--left">
                  <span class="quantity-presenter m-r-15"></span>
                  <span class="item-label invoice-row__name js-full-text"></span>
               </div>
               <div class="col-sm-12 col-md-4 invoice-row__item invoice-row__item--right">
                  <div>
                      <input type="hidden" value="" class="hidden js-fp-hd">
                      <input type="hidden" value="" class="hidden js-sp-hd">
                      <span class="price-presenter"><span><span><input type="hidden" value="" class="hidden full-price"><s class="js-fp"></s></span><input type="hidden" value="" class="hidden special-price"><span class="text-danger m-l-10 js-sp"></span></span></span>
                      <a class="remove-item-field remove-attached-group remove_fields dynamic" data-wrapper-class="sale-item" href="javscript:void(0);"><i class="s-icon-close"></i>
                     </a>
                  </div>
               </div>
            </div>
            <div class="row sale-item__inputs p-l-20 p-r-20">
               <div class="col-md-2 col-sm-6 col-xs-6 sale-tax-group sm-p-r-5 md-p-r-7">
                  <div class="form-group">
                     <label for="">Quantity</label>
                     <input min="0" class="numeric integer optional form-control quantity" pattern="\d*" type="number" step="1" readonly="readonly">
                  </div>
               </div>
               <div class="col-md-2 col-sm-6 col-xs-6 sm-p-l-5 md-p-l-7">
                  <div class="form-group">
                     <label for="">Price</label>
                     <input step="0.01" min="0" class="numeric float optional form-control unit-price numeric-disabled" placeholder="0.00" type="number" disabled="disabled">
                  </div>
               </div>
               <div class="col-md-4 col-sm-12 col-xs-12">
                  <div class="form-group special-discount-group">
                     <label class="hidden-xs hidden-sm" for="">Discount</label>
                     <div class="select-wrapper">
                        <select class="select required form-control text-left js-select-discount special-discount" include_blank="Select discount">
                           <option value="">Select discount</option>
                           <?php foreach($discounts as $discount) {
                               $t = ($discount['discount_type'] == 'fixed') ? ' (₹ '.$discount['value'].') ' : ' ( '.$discount['value'].'%) ';
                               $lbl = $discount['name'] . $t;
                               echo "<option value='".$discount['id']."' data-value='".$discount['value']."' data-distype='".$discount['discount_type']."'>".$lbl."</option>";
                           }?>
                        </select>
                     </div>
                  </div>
               </div>
            <div class="col-md-4 col-sm-12 col-xs-12 sale-item-employee">
                <div class="form-group no-padding">
                    <label class="hidden-xs hidden-sm" for="">Staff</label>
                    <div class="select-wrapper">
                        <select include_blank="Select staff" class="select optional block form-control employee_id" required="required">
                        <option value="">Select staff</option>
                        <?php foreach($staffs as $staff) {
                            echo "<option value='".$staff['id']."'>".$staff['first_name'] .' '.$staff['last_name']."</option>";
                        } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
    
</div>

<script>
    /*
     * services search
     */
    
    $('.search_service').keyup(function() {
        if($(this).val() == '') {
            $('.cancel-search').hide();
        }else {
            $('.cancel-search').show();
        }
        filterService(this);        
    });
    
    function filterService(element) {
        
        var term = $(element).val().toLowerCase();
        
        $(".sale-navigation > li").each(function () {
            var stext = $(this).find('.js-full-text').text().toLowerCase();
            if (stext.indexOf(term) > -1) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
        
        /*
         * Same functionality a little better using filter
         */
//        var $li = $(".sale-navigation > li");
//        $li.hide();
//        $li.filter(function() {
//            var stext = $(this).find('.js-full-text').text().toLowerCase();
//            return stext.indexOf(term) > -1;
//        }).show();
    }
    
    $('.cancel-search').bind('click', function(){
       $(this).hide();
       $('.search_service').val('');
       $(".sale-navigation > li").show();
    });
    
</script>

<script>

    var services = <?php echo json_encode($services); ?>;
    
    /*
     * onclick of services
     */
    
    $('.js-add-services').click(function(){
        
        $('.invoice-placeholder').addClass('hidden');
        var s_id = $(this).data('serviceid'),
            exists = false;
            
        var $scheckout = $('#sale-item-row-service-tocopy').clone().attr('id', 'sale-item-row-service-' + s_id );
        
        $scheckout.find('.item-id').attr('name', 'sale[items_attributes]['+ s_id +'][item_id]').val(s_id);
        $scheckout.find('.item-type').attr('name', 'sale[items_attributes]['+ s_id +'][item-type]').val('Service');
        
        if(!$.trim( $(".sale-item-container").html() )) {
            $('.sale-item-container').html($scheckout);
            $('#sale-item-row-service-' + s_id).data('saleitemserviceid', s_id).addClass('sale-item-row-service-' + s_id );
        }else {
            
            if($('#sale-item-row-service-' + s_id).length == 0) {
                $(".sale-item-container").append($scheckout);
            }else {
                
                $s_id = $('#sale-item-row-service-' + s_id );
                
                var quantity = parseInt($('#quantity-' + s_id ).val());
                quantity = quantity+1;
                $('#quantity-presenter-' + s_id).html(quantity);
                $('#quantity-' + s_id ).val(quantity);
                
                var fp = parseFloat($('#js-fp-hd-' + s_id ).val()),
                    qfp = accounting.formatMoney(quantity*fp);
                $('#js-fp-' + s_id).html('₹ '+ qfp );
                $('#full-price-' + s_id).val(qfp);
                
                var sp = parseFloat($('#js-sp-hd-' + s_id ).val()),
                    qsp = accounting.formatMoney(quantity*sp);
                $('#js-sp-' + s_id).html('₹ '+ qsp );
                $('#special-price-' + s_id).val(qsp);
                
                $('#select-discount-' + s_id).trigger("change");
                
                exists = true;
            }            
        }
        if(!exists) {
            $s_id = $('#sale-item-row-service-' + s_id );
            for(var x=0; x < services.length; x++){
                if( services[x].id == s_id) {
                    $s_id.find('.quantity-presenter').attr('id', 'quantity-presenter-' + s_id ).html('1');
                    
                    $s_id.find('.item-label').attr('id', 'item-label-' + s_id ).html(services[x]['name']);
                    $scheckout.find('.item-name').attr('name', 'sale[items_attributes]['+ s_id +'][item-name]').val(services[x]['name']);
                    $s_id.find('.js-fp').attr('id', 'js-fp-' + s_id ).html('₹ '+services[x]['price']);
                    $s_id.find('.js-fp-hd').attr('id', 'js-fp-hd-' + s_id ).val(services[x]['price']);
                    $s_id.find('.full-price').attr('id', 'full-price-' + s_id ).attr('name', 'sale[items_attributes]['+ s_id +'][full_price]').val(services[x]['price']);
                    
                    $s_id.find('.js-sp').attr('id', 'js-sp-' + s_id ).html('₹ '+services[x]['special_price']);
                    $s_id.find('.js-sp-hd').attr('id', 'js-sp-hd-' + s_id ).attr('name', 'sale[items_attributes]['+ s_id +'][special_price]').val(services[x]['special_price']);
                    $s_id.find('.special-price').attr('id', 'special-price-' + s_id ).attr('name', 'sale[items_attributes]['+ s_id +'][special_price]').val(services[x]['special_price']);
                    
                    $s_id.find('.quantity').attr('id', 'quantity-' + s_id ).attr('name', 'sale[items_attributes]['+ s_id +'][quantity]').val('1').attr('max', services[x]['quantity']);
                    
                    $s_id.find('.unit-price').attr('id', 'unit-price-' + s_id ).attr('name', 'sale[items_attributes]['+ s_id +'][unit-price]').val(services[x]['special_price']);
                    
                    $s_id.find('.js-select-discount').attr('id', 'select-discount-' + s_id ).attr('name', 'sale[items_attributes]['+ s_id +'][discount_id]');
                    
                    $s_id.find('.employee_id').attr('id', 'select-employee_id-' + s_id ).attr('name', 'sale[items_attributes]['+ s_id +'][staff-id]');
                    
                    $s_id.find('.remove-item-field').attr('id', 'remove-item-field-' + s_id );
                }
            }
        }
        
        
        $(".sale-item-container").find('.sale-item-row-service').removeClass('sale-item--editable');
        $('#sale-item-row-service-' + s_id ).addClass('sale-item--editable');
        
        $('.sale-app-service-container').find('.sale-item-row-appservice').removeClass('sale-item--editable');
        
        $('#apply_payment').removeAttr('disabled');
        
        show_saletotal();
        
        $(document).on( 'change', '#select-discount-' + s_id, function(){
            //debugger;
            var quantity = parseInt($('#quantity-' + s_id ).val());
                
            var val = parseFloat($('option:selected', this).data('value')),
                type = $('option:selected', this).data('distype'),
                unitprice = parseFloat($('#unit-price-' + s_id).val());
                
            if($(this).val() == '') {

                unitprice = accounting.formatMoney(unitprice*quantity);
                $('#js-sp-' + s_id).html('₹ '+ unitprice);
                $('#js-sp-hd-' + s_id).val(unitprice);
                $('#special-price-' + s_id).val(unitprice);

            }else {                    
                if(type == 'percentage') {
                    unitprice = accounting.formatMoney((unitprice*quantity) - (((unitprice) / 100) * (val*quantity)));
                    $('#js-sp-' + s_id).html('₹ '+ unitprice);
                    $('#js-sp-hd-' + s_id).val(unitprice);
                    $('#special-price-' + s_id).val(unitprice);

                }else{
                    var vl = accounting.formatMoney((unitprice*quantity) - (val*quantity));
                    $('#js-sp-' + s_id).html('₹ '+ vl);
                    $('#js-sp-hd' + s_id).val(vl);
                    $('#special-price-' + s_id).val(vl);          
                }
            }
            
            show_saletotal();
        });
        
        $(document).on('click', '#remove-item-field-' + s_id, function(){
            $('#sale-item-row-service-' + s_id ).remove();
            
            show_saletotal();
            
            if(!$.trim( $(".sale-item-container").html() ) && !$.trim($('.sale-app-service-container').html())) {
                $('#apply_payment').attr('disabled', 'disabled');
            }
        });
        
        $(document).on('click', '#sale-item-row-service-' + s_id, function(){
            $(".sale-item-container").find('.sale-item-row-service').removeClass('sale-item--editable');
            $('#sale-item-row-service-' + s_id ).addClass('sale-item--editable');
            
            $('.sale-app-service-container').find('.sale-item-row-appservice').removeClass('sale-item--editable');
        });
        
    });
    
    function show_saletotal() {
        var saletotal = 0;
        $.each( $("input[id^='special-price-']"), function () {
            var v = accounting.unformat($(this).val());
            saletotal = parseFloat(saletotal) + v;
        });
        
        if(!$.isEmptyObject(appointment)) {
            $.each( $("input[id^='js-sp-service-hd-']"), function () {
                var v = accounting.unformat($(this).val());
                saletotal = parseFloat(saletotal) + v;
            });
        }        
        saletotal = accounting.formatMoney(saletotal);
        $('.sale-total-price').html('₹ ' + saletotal);
        $('.sale-total-hd').val(saletotal);
    }
    
    /*
     * onclick remove services 
     */
    $('.remove-sale-service-item').click(function(){
        $('#sale-service-item-' + $(this).data('serviceid') ).remove();
        
        show_saletotal();
        
        if(!$.trim( $(".sale-item-container").html() ) && !$.trim($('.sale-app-service-container').html())) {
                $('#apply_payment').attr('disabled', 'disabled');
            }
    });
    
    
    /*
     * validate service sale
     */
    
    $("#edit_sale").validator().on("submit", function (event) {
    if (!event.isDefaultPrevented()) {
            event.preventDefault();
            loadingOverlay();
            $.ajax({
                url: g.base_url + 'sales/addSale',
                type: 'post',   
                dataType: 'html',
                data: $('form#edit_sale').serialize(),
                success: function(data) {                    
                    removeLoadingOverlay();
                    if(data.length == 0){
                        $('.alert-danger').removeClass('hide');
                        setTimeout(function() { $('.alert-danger').addClass('hide'); }, 3000);
                    }else {
                        $('#edit-service-sale-').remove();
                        $('#new-payments').remove();
                        $('body').append(data);
                        $('#new-payments').modal({backdrop: 'static', keyboard: false});
                        $('#new-payments').on('hidden.bs.modal', function(){
                            $('.modal-backdrop').remove();
                        });
                    }
                }
            });
        }
    });
    
    /*
     * clients ajax search, autocomplete
     */

    $('#sale_customer_id').autocomplete({
        source: function (request, response) {
            $.ajax({
                url: g.base_url + "customers/getClients",
                dataType: "json",
                data: { term : request.term },
                success: function( data ) {
                response( $.map( data.clients, function( item ) {
                        var mobile = (item.mobile != null) ? ' (' + item.mobile+' )' : '';
                        return {
                          label: (item.firstname) + ' ' + (item.lastname) + mobile,
                          value: item.id,
                          client: item
                        }
                    }));
                }         
            });
        },
        select: function(event, ui) {
                    var client = ui.item.client;
                    $("#sale_customer_id").val(ui.item.value);
                    $('.search-container, .buttons-container, .walkin').hide();
                    $('.details-container').show();
                    $('.client_label').html(client.firstname + ' ' + client.lastname);
                    $('.contact').html(client.mobile);
                    if(client.notes) {
                        $('.note-container').show();
                        $('.customer-note').html(client.notes);
                    }
                    $('#walkin').val('0');
                },
        minLength: 2,
        delay: 100
    });
    
    $('#change_client').click(function(){
        $("#sale_customer_id").val('');
        $('.search-container, .buttons-container, .walkin').show();
        $('.details-container, .note-container').hide();
        $('.client_label, .customer-note, .contact').html('');
        $('#walkin').val('0');
    });
    
    $('.walkin_a').click(function(){
        $('.details-container').show(); 
        $('.search-container, .walkin_a').hide();
        $('#walkin').val('1');
        $("#sale_customer_id").val('0');
    });
    
    /*
     * if, checkout an appointment
     */
    
    var appointment = <?php echo json_encode($appointment); ?>;
    if(!$.isEmptyObject(appointment)) {
        
        $('#appointment_id').val(appointment.appointment_id);
        $('.invoice-placeholder').addClass('hidden');
        show_client(appointment);
        show_saletotal();
        $('#apply_payment').removeAttr('disabled');
        
        $('.sale-item-row-appservice').click(function(){
            $(".sale-item-container").find('.sale-item-row-service').removeClass('sale-item--editable');
            $(".sale-app-service-container").find('.sale-item-row-appservice').removeClass('sale-item--editable');
            $(".sale-app-service-container").find('#'+$(this).attr('id')).addClass('sale-item--editable');
        });

        $('.service-discount').change(function(){
            var $this = $(this);

            var serviceid = $this.parent('div').find('.service-row-id').val(),
                val = parseFloat($('option:selected', this).data('value')),
                type = $('option:selected', this).data('distype'),
                ogsp = accounting.unformat($('#js-og-sp-service-hd-'+serviceid).val()),
                quantity = parseInt($('#quantity-' + serviceid ).val());
                price = 0;

            if($this.val() == '') {
                ogsp = accounting.formatMoney(ogsp*quantity);
                $('#js-sp-service-'+serviceid).html('₹ '+ ogsp);
                $('#js-sp-service-hd-'+serviceid).val(ogsp);

            }else {
                if(type == 'percentage') {
                    price = accounting.formatMoney((ogsp*quantity) - ((ogsp / 100) * (val*quantity)));
                    $('#js-sp-service-'+serviceid).html('₹ '+ price);
                    $('#js-sp-service-hd-'+serviceid).val(price);

                }else{
                    price = accounting.formatMoney((ogsp*quantity) - (val*quantity));
                    $('#js-sp-service-'+serviceid).html('₹ '+ price);
                    $('#js-sp-service-hd-'+serviceid).val(price);
                }
            }
            show_saletotal();
        });
    }
    
    function show_client(appointment) {
        $('.js-change_client-div').addClass('hidden');
        if(appointment.clientid != '0') {
            $("#sale_customer_id").val(appointment.clientid);
            $('.search-container, .buttons-container, .walkin').hide();
            $('.details-container').show();
            $('.client_label').html(appointment.fname_c + ' ' + appointment.lname_c);
            $('.contact').html(appointment.mobile);
            if(appointment.notes) {
                $('.note-container').show();
                $('.customer-note').html(appointment.notes);
            }
            $('#walkin').val('0');
        
        }else{
            //$('#change_client').trigger("click");
            $('.walkin_a').trigger( "click" );            
        }   
    }
    
    /*
     * invoice date
     */

    var dateToday = moment(appointment.invoicedate).format('MM/DD/YYYY');
    $('#sale_invoice_date').datepicker( {maxDate : 0 } ).datepicker("setDate", dateToday);
    
    $('.close-modal').click(function () {
        window.location = g.base_url + 'reports/invoices';
    });

</script>



