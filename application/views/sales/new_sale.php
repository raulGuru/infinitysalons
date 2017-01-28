<div aria-hidden="false" aria-labelledby="modalSlideUpLabel" class="modal large-modal in" id="new-sale" role="dialog" tabindex="-1" style="display: block;">
   <div class="modal-dialog">
      <div class="modal-content no-border">
         <div class="modal-header clearfix text-left">
            <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                <i class="pg-close"></i><span>X</span>
            </button>
            <h3 class="text-center large-modal__title">
               Checkout
            </h3>
         </div>
         <div class="modal-body sm-padding-10 modal-body--column">
            <div class="pos-box__alerts"></div>
            <form class="simple_form row pos-box" id="new_sale">
                <input type="hidden" name="sale[appointmentid]" id="appointment_id" value="0">
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
                           <div class="form-group no-margin text-right">
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
<!--                     <div class="search-bar">
                        <input class="search form-control search-bar__input" placeholder="Scan barcode or search any item" type="text">
                        <span class="bg-white search-bar__addon">
                        <i class="s-icon-search"></i>
                        </span>
                        <a class="cancel-search search-bar__remove" href="" style="display: none;">
                        <i class="s-icon-close"></i>
                        </a>
                     </div>-->
                     <div class="search-bar-navigation">
                        <div class="sale-navigation__item sale-navigation__item--back">
                           <div class="tip-alert"></div>
                           <div class="sale-navigation__title text-center">Products</div>
<!--                           <a href="javascript:void(0);" class="sale-navigation__link  sale-navigation__link">
                              <div class="sale-navigation__title text-center">Products</div>
                           </a>-->
                        </div>
                     </div>
                     <div class="sale-box__item">
<!--                        <div class="search-results" style="display: none;"></div>
                        <div class="loading-screen sale-box__loading" style="display: none;">
                           <span class="sale-box__loading-text">
                           <img src="<?php echo base_url('assets/pages/progress/progress-circle-success-8af1b228d8a0c5203b02eca464533f0765a0a290b4f44ae8b12cb45b5efe1427.svg') ?>" alt="Progress circle success">
                           </span>
                        </div>-->
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
                            <?php if(!empty($products)) {
                                foreach($products as $product) { ?>
                                <li class="sale-navigation__item">
                                    <a href="javascript:void(0);" class="sellable sale-navigation__link js-add-products" data-productid="<?php echo $product['id'] ?>">
                                       <span class="price sale-navigation__price sale-navigation__price--special">
                                           <div class="text-danger">₹<?php echo $product['special_price'] ?></div>
                                          <s>₹<?php echo $product['full_price'] ?></s>
                                       </span>
                                       <div class="name sale-navigation__name js-full-text"><?php echo $product['product_name'] ?></div>
                                       <div class="sale-navigation__label"><?php echo $product['quantity'] ?> in stock</div>
                                    </a>
                                 </li>        
                                    <?php  }    
                                 } ?>
                              </ul>
                           </div>
                        </div>
                        <div class="sale-box__alerts sale-box__alerts--top hidden" style="display: block;"></div>
                     </div>
                  </div>
               </div>
               <div class="col-sm-7 pos-box__item">
                  <div class="pos-box-table">
                     <div class="pos-box__invoice">
                        <div class="row attached-fields pos-box-table__item">
                           <div class="col-md-6 col-xs-6 no-padding">
                              <div class="form-group middle-item">
                                 <label class="date optional" for="sale_invoice_date">Invoice date</label>
                                 <div class="select-wrapper">
                                    <input class="string optional readonly date-input form-control" type="text" name="sale[invoice_date]" id="sale_invoice_date">
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 col-xs-6 no-padding">
                              <div class="form-group">
                                 <label class="date optional" for="sale_due_date">Due date</label>
                                 <div class="select-wrapper">
                                    <input class="string optional readonly date-input form-control"  type="text" name="sale[due_date]" id="sale_due_date">
                                 </div>
                              </div>
                           </div>
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
                                                <div class="sale-service-container">
                                                    <?php if(!empty($appointmentdetails)) { ?>
                                                    <div class="full-height row sale-item sale-item-row-nil-class sale-item-row-nil-class-new  sale-item--editable sale-item-row-service" tabindex="-1" id="sale-service-item">
                                                        <input class="hidden" type="hidden" name="sale[service][item-id]" value="<?php echo $appointmentdetails['service_id'] ?>">
                                                            <input value="Service" class="hidden" name="sale[service][item-type]" type="hidden">
                                                            <input value="<?php echo $appointmentdetails['service'] ?>" class="hidden" type="hidden" name="sale[service][item-name]">
                                                            <div class="invoice-row row">
                                                               <div class="col-sm-12 col-md-8 invoice-row__item invoice-row__item--left">
                                                                  <span class="quantity-presenter m-r-15">1</span>
                                                                  <span class="item-label invoice-row__name js-full-text"><?php echo $appointmentdetails['service'] ?></span>
                                                               </div>
                                                               <div class="col-sm-12 col-md-4 invoice-row__item invoice-row__item--right">
                                                                  <div>
                                                                      <input type="hidden" value="<?php echo $appointmentdetails['special_price'] ?>" name="sale[service][special_price]" id="service-special-price">
                                                                      <input type="hidden" value="<?php echo $appointmentdetails['price'] ?>" name="sale[service][full_price]">
                                                                      <span class="price-presenter"><span><span><s class="js-fp"><?php echo $appointmentdetails['price'] ?></s></span><span class="text-danger m-l-10 js-sp" id="js-sp-service"><?php echo $appointmentdetails['special_price'] ?></span></span></span>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                            <div class="row sale-item__inputs p-l-20 p-r-20">
                                                               <div class="col-md-2 col-sm-6 col-xs-6 sale-tax-group sm-p-r-5 md-p-r-7">
                                                                  <div class="form-group">
                                                                     <label for="">Quantity</label>
                                                                     <input min="0" class="numeric integer optional form-control quantity" pattern="\d*" type="number" step="1" readonly="readonly" name="sale[service][quantity]" value="1">
                                                                  </div>
                                                               </div>
                                                               <div class="col-md-2 col-sm-6 col-xs-6 sm-p-l-5 md-p-l-7">
                                                                  <div class="form-group">
                                                                     <label for="">Price</label>
                                                                     <input step="0.01" min="0" class="numeric float optional form-control unit-price numeric-disabled" placeholder="0.00" type="number" disabled="disabled" value="<?php echo $appointmentdetails['special_price'] ?>" id="service-actual-special-price">
                                                                  </div>
                                                               </div>
                                                               <div class="col-md-4 col-sm-12 col-xs-12">
                                                                  <div class="form-group special-discount-group">
                                                                     <label class="hidden-xs hidden-sm" for="">Discount</label>
                                                                     <div class="select-wrapper">
                                                                         <select class="select required form-control text-left" include_blank="Select discount" name="sale[service][discount_id]" id="js-service-discount">
                                                                           <option value="">Select discount</option>
                                                                           <?php foreach($discounts as $discount) {
                                                                               $t = ($discount['discount_type'] == 'fixed') ? ' (₹'.$discount['value'].') ' : ' ( '.$discount['value'].'%) ';
                                                                               $lbl = $discount['name'] . $t;
                                                                               echo "<option value='".$discount['id']."' data-distype='".$discount['discount_type']."' data-value='".$discount['value']."'>".$lbl."</option>";
                                                                           }?>
                                                                        </select>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <div class="col-md-4 col-sm-12 col-xs-12 sale-item-employee">
                                                                  <div class="form-group no-padding">
                                                                     <label class="hidden-xs hidden-sm" for="">Staff</label>
                                                                     <div class="select-wrapper">
                                                                         <select include_blank="Select staff" class="select optional block form-control" readonly="readonly" name="sale[service][staff-id]">
                                                                           <option value="">Select staff</option>
                                                                           <?php foreach($staffs as $staff) {
                                                                               $selected = ($staff['id'] == $appointmentdetails['staff_id']) ? "selected=selected" : '';
                                                                               echo "<option $selected value='".$staff['id']."'>".$staff['first_name'] .' '.$staff['last_name']."</option>";
                                                                           } ?>
                                                                        </select>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                            </div>
                                                         </div>
                                                        
                                                    <?php } ?>                                                    
                                                </div>
                                                
                                               <div class="sale-item-container">
                                                
                                                    
                                                  
                                               </div>
                                            </div>
                                         </div>
                                      
                                                                    
                           <div class="hidden totals">
                              <div class="tax-totals"></div>
                           </div>
                        </div>
                        <div class="pos-box__btns bg-white pos-box-table__item">
                            <button name="apply_payment" type="submit" value="apply_payment" class="btn btn-success btn-lg payment-button full-width" disabled="" id="apply_payment">
                              <span class="pull-left h3 no-margin bold">Checkout</span>
                              <div class="sale-total clearfix pull-right">
                                  <input type="hidden" value="0" class="hidden sale-total-hd" name="sale[sale-total]">
                                 <span class="sale-total-price h3 no-margin bold">₹0.00</span>
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
    
    <div class="hidden" id="product-checkout">
     <div class="full-height row sale-item sale-item-row-nil-class sale-item-row-nil-class-new  sale-item--editable sale-item-row-product" tabindex="-1" id="sale-item-row-product-tocopy">
            <input class="hidden item-id" type="hidden" value="">
            <input value="Product" class="hidden item-type" type="hidden">
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
                               $t = ($discount['discount_type'] == 'fixed') ? ' (₹'.$discount['value'].') ' : ' ( '.$discount['value'].'%) ';
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
    
    
    var products = <?php echo json_encode($products); ?>;
    
    $('.js-add-products').click(function(){
        //debugger;
        $('.invoice-placeholder').addClass('hidden');
        var p_id = $(this).data('productid'),
            exists = false,
            saletotal = parseInt($('.sale-total-hd').val());
            
        var $pcheckout = $('#sale-item-row-product-tocopy').clone().attr('id', 'sale-item-row-product-' + p_id );
        
        $pcheckout.find('.item-id').attr('name', 'sale[items_attributes]['+ p_id +'][item_id]').val(p_id);
        $pcheckout.find('.item-type').attr('name', 'sale[items_attributes]['+ p_id +'][item-type]').val('Product');
        
        if(!$.trim( $(".sale-item-container").html() )) {
            $('.sale-item-container').html($pcheckout);
            $('#sale-item-row-product-' + p_id).data('saleitemproductid', p_id).addClass('sale-item-row-product-' + p_id );
        }else {
            
            if($('#sale-item-row-product-' + p_id).length == 0) {
                $(".sale-item-container").append($pcheckout);
            }else {
                $p_id = $('#sale-item-row-product-' + p_id );
                
                var quantity = parseInt($('#quantity-' + p_id ).val());
                quantity = quantity+1;
                $('#quantity-presenter-' + p_id).html(quantity);
                $('#quantity-' + p_id ).val(quantity);
                
                var fp = parseInt($('#js-fp-hd-' + p_id ).val());
                $('#js-fp-' + p_id).html('₹'+(quantity*fp));
                $('#full-price-' + p_id).val(quantity*fp);
                
                var sp = parseInt($('#js-sp-hd-' + p_id ).val());
                $('#js-sp-' + p_id).html('₹'+(quantity*sp));
                $('#special-price-' + p_id).val(quantity*sp);
                
                saletotal = (saletotal + sp);
                
                $('#select-discount-' + p_id).trigger("change");
                
                exists = true;
            }
        }
        if(!exists) {
            $p_id = $('#sale-item-row-product-' + p_id );
            for(var x=0; x < products.length; x++){
                if( products[x].id == p_id) {
                    $p_id.find('.quantity-presenter').attr('id', 'quantity-presenter-' + p_id ).html('1');
                    
                    $p_id.find('.item-label').attr('id', 'item-label-' + p_id ).html(products[x]['product_name']);
                    $pcheckout.find('.item-name').attr('name', 'sale[items_attributes]['+ p_id +'][item-name]').val(products[x]['product_name']);
                    $p_id.find('.js-fp').attr('id', 'js-fp-' + p_id ).html('₹'+products[x]['full_price']);
                    $p_id.find('.js-fp-hd').attr('id', 'js-fp-hd-' + p_id ).val(products[x]['full_price']);
                    $p_id.find('.full-price').attr('id', 'full-price-' + p_id ).attr('name', 'sale[items_attributes]['+ p_id +'][full_price]').val(products[x]['full_price'])
                    
                    $p_id.find('.js-sp').attr('id', 'js-sp-' + p_id ).html('₹'+products[x]['special_price']);
                    $p_id.find('.js-sp-hd').attr('id', 'js-sp-hd-' + p_id ).attr('name', 'sale[items_attributes]['+ p_id +'][special_price]').val(products[x]['special_price']);
                    $p_id.find('.special-price').attr('id', 'special-price-' + p_id ).attr('name', 'sale[items_attributes]['+ p_id +'][special_price]').val(products[x]['special_price']);
                    
                    $p_id.find('.quantity').attr('id', 'quantity-' + p_id ).attr('name', 'sale[items_attributes]['+ p_id +'][quantity]').val('1').attr('max', products[x]['quantity']);
                    
                    $p_id.find('.unit-price').attr('id', 'unit-price-' + p_id ).attr('name', 'sale[items_attributes]['+ p_id +'][unit-price]').val(products[x]['special_price']);
                    
                    $p_id.find('.js-select-discount').attr('id', 'select-discount-' + p_id ).attr('name', 'sale[items_attributes]['+ p_id +'][discount_id]');
                    
                    $p_id.find('.employee_id').attr('id', 'select-employee_id-' + p_id ).attr('name', 'sale[items_attributes]['+ p_id +'][staff-id]');
                    
                    $p_id.find('.remove-item-field').attr('id', 'remove-item-field-' + p_id );
                    
                    saletotal = (saletotal + parseInt(products[x]['special_price']));
                }
            }
        }
                
        $(".sale-item-container").find('.sale-item-row-product').removeClass('sale-item--editable');
        $('#sale-item-row-product-' + p_id ).addClass('sale-item--editable');
        
        $('.sale-service-container').find('.sale-item-row-service').removeClass('sale-item--editable');
        
        show_saletotal();
        $('#apply_payment').removeAttr('disabled');
                
        $(document).on( 'change', '#select-discount-' + p_id, function(){
            //debugger;
            var quantity = parseInt($('#quantity-' + p_id ).val()),
                saletotal = parseInt($('.sale-total-hd').val());
                
            var val = parseInt($('option:selected', this).data('value')),
                type = $('option:selected', this).data('distype'),
                unitprice = parseInt($('#unit-price-' + p_id).val());
                
            if($(this).val() == '') {

                unitprice = (unitprice*quantity);
                $('#js-sp-' + p_id).html(unitprice);
                $('#js-sp-hd-' + p_id).val(unitprice);
                $('#special-price-' + p_id).val(unitprice);

            }else {                    
                if(type == 'percentage') {
                    unitprice = ((unitprice*quantity) - (((unitprice) / 100) * (val*quantity)));
                    $('#js-sp-' + p_id).html(unitprice);
                    $('#js-sp-hd-' + p_id).val(unitprice);
                    $('#special-price-' + p_id).val(unitprice);

                }else{
                    var vl = ((unitprice*quantity) - (val*quantity));
                    $('#js-sp-' + p_id).html(vl);
                    $('#js-sp-hd' + p_id).val(vl);
                    $('#special-price-' + p_id).val(vl);          
                }                    
            }                
            
            show_saletotal();
        });
        
        $(document).on('click', '#remove-item-field-' + p_id, function(){
            $('#sale-item-row-product-' + p_id ).remove();
            var sp = parseInt($('#special-price-' + p_id ).val()),
                saletotal = parseInt($('.sale-total-hd').val());
            
            //saletotal = saletotal - sp;
            show_saletotal();
            
            if(!$.trim( $(".sale-item-container").html() )) {
                $('#apply_payment').attr('disabled', 'disabled');
            }
        });
        
        $(document).on('click', '#sale-item-row-product-' + p_id, function(){
            $(".sale-item-container").find('.sale-item-row-product').removeClass('sale-item--editable');
            $('#sale-item-row-product-' + p_id ).addClass('sale-item--editable');
            
            $('.sale-service-container').find('.sale-item-row-service').removeClass('sale-item--editable');
        });
        
    });
    
    function show_saletotal() {
        var saletotal = 0;
        $.each( $("input[id^='special-price-']"), function () {
            saletotal = saletotal + parseInt($(this).val());
        });
        
        if(!$.isEmptyObject(appointment)) {
            var servicespecialprice = parseInt($('#service-special-price').val());
            saletotal = saletotal + servicespecialprice;
        }        
        
        $('.sale-total-price').html('₹' + saletotal);
        $('.sale-total-hd').val(saletotal);
    }
    
    $('.sale-item-row-service').click(function(){
        $(".sale-item-container").find('.sale-item-row-product').removeClass('sale-item--editable');
        $('.sale-item-row-service').addClass('sale-item--editable');
    });
    
    $('#js-service-discount').change(function(){
            //debugger;
        var val = parseInt($('option:selected', this).data('value')),
            type = $('option:selected', this).data('distype'),
            unitprice = parseInt($('#service-actual-special-price').val()),
            quantity = 1;

        if($(this).val() == '') {

            unitprice = (unitprice*quantity);
            $('#js-sp-service').html(unitprice);
            $('#service-special-price').val(unitprice);

        }else {                    
            if(type == 'percentage') {
                unitprice = ((unitprice*quantity) - (((unitprice) / 100) * (val*quantity)));
                $('#js-sp-service').html(unitprice);
                $('#service-special-price').val(unitprice);

            }else{
                var vl = ((unitprice*quantity) - (val*quantity));
                $('#js-sp-service').html(vl);
                $('#service-special-price').val(vl);
            }                    
        }
        show_saletotal();
    });
    
    $("#new_sale").validator().on("submit", function (event) { 
    if (!event.isDefaultPrevented()) {
            event.preventDefault();
            loadingOverlay();
            $.ajax({
                url: g.base_url + 'sales/addSale',
                type: 'post',   
                dataType: 'html',
                data: $('form#new_sale').serialize(),
                success: function(data) {
                    
                    removeLoadingOverlay();
                    $('#new-sale').remove();
                    $('#new-payments').remove();
                    $('body').append(data);
                    $('#new-payments').modal({backdrop: 'static', keyboard: false});
                    $('#new-payments').on('hidden.bs.modal', function(){
                        $('.modal-backdrop').remove();
                    });
                    
                }
            });
        }
    });

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
        select: function(event, ui){
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
     
     var dateToday = new Date();
     $('#sale_invoice_date').datepicker( {maxDate : 0 } ).datepicker("setDate", dateToday);
     $('#sale_due_date').datepicker( {minDate : 0 } ).datepicker("setDate", dateToday);
     
    var appointment = <?php echo json_encode($appointmentdetails); ?>;
    if(!$.isEmptyObject(appointment)) {
        
        $('#appointment_id').val(appointment.appointment_id);
        
        $('.invoice-placeholder').addClass('hidden');

        $('.sale-total-price').html('₹' + appointment.special_price);
        $('.sale-total-hd').val(appointment.special_price);

        $('#apply_payment').removeAttr('disabled');

        show_client(appointment);
    }
     
     function show_client(appointment) {
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
            $('#change_client').trigger("click");
            $('.walkin_a').trigger( "click" );            
        }   
    }

</script>