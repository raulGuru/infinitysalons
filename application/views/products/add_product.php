<div aria-hidden="true" aria-labelledby="productModal" class="modal fill-in in" role="dialog" tabindex="-1" style="display: block; padding-left: 17px;" id="newProductModal">    
   <div class="modal-dialog modal-lg">
      <div class="modal-content no-border">
         <div class="modal-header clearfix text-left">
            <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
            <i class="pg-close"></i>
            </button>
            <h4 class="text-center">
               <?php echo ((!empty($product['id'])) ? "Edit Product" : "New Product")?>
            </h4>
         </div>
         <div class="edit-form">
            <form class="simple_form new_product" id="new_product">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>"/>
               <div class="modal-body sm-padding-10 p-t-none">
                   <div class="alert alert-danger hide"></div>
                  <ul class="nav nav-tabs nav-tabs-simple" id="product-tab">
                     <li class="active">
                        <a data-toggle="tab" href="#product-details">Details</a>
                     </li>
                     <!--li>
                        <a data-toggle="tab" class="stock-history-tab" href="#stock-history">Stock History</a>
                     </li-->
                  </ul>
                  <div class="tab-content no-padding">
                     <div class="tab-pane active" id="product-details">
                        <div class="row m-t-20 first-row">
                           <div class="col-lg-6 col-md-6 left-modal-column-md">
                               <div class="form-group string optional product_name"><label class="string optional control-label" for="product_name">Product Name</label><input class="string optional form-control" autofocus="autofocus" placeholder="e.g. Large Shampoo" type="text" name="product[product_name]" id="product_name" required="required" value="<?php echo $product['product_name'] ?>"></div>
                               <div class="form-group string optional product_sku"><label class="string optional control-label" for="product_sku">SKU/Barcode</label><input class="string optional form-control" placeholder="1234567890" type="text" name="product[sku]" id="product_sku" value="<?php echo $product['sku'] ?>"></div>
                               <div class="form-group text optional product_description"><label class="text optional control-label" for="product_description">Description</label><textarea maxlength="300" class="text optional form-control" placeholder="e.g. the world's most spectacular product" name="product[description]" id="product_description"><?php echo $product['description'] ?></textarea></div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label class="decimal optional" for="product_cost_price">Cost price</label>
                                       <div class="input-group">
                                          <div class="input-group-addon">
                                             ₹
                                          </div>
                                           <input class="numeric decimal optional form-control add-decimals" placeholder="0.00" type="number" step="any" name="product[cost_price]" id="product_cost_price" value="<?php echo $product['cost_price'] ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label class="decimal required" for="product_full_price"><abbr title="required">*</abbr> Full price</label>
                                       <div class="input-group">
                                          <div class="input-group-addon">
                                             ₹
                                          </div>
                                           <input class="numeric decimal optional form-control add-decimals" placeholder="0.00" type="number" step="any" name="product[full_price]" id="product_full_price" required="required" value="<?php echo $product['full_price'] ?>">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                       <label class="decimal optional" for="product_special_price">Special price</label>
                                       <div class="input-group">
                                          <div class="input-group-addon">
                                             ₹
                                          </div>
                                           <input class="numeric decimal optional form-control add-decimals" placeholder="0.00" type="number" step="any" name="product[special_price]" id="product_special_price" value="<?php echo $product['special_price'] ?>">
                                       </div>
                                    </div>
                                 </div>
                                  <div class="col-md-4 m-t-20">
                                <div class="form-group">
                                    <label class="string optional" for="product_quantity">Product Quantity</label>
                                        <div class="input-group">
                                            <input class="string optional form-control" type="number" step="any" name="product[quantity]" id="product_quantity" value="<?php echo !empty($product['quantity']) ? $product['quantity'] : '0' ?>">
                                        </div>
                                    </div>
                                </div>
                              </div>
                               
<!--                              <div class="form-group tax-rate-field no-margin">
                                 <label for="product_tax_Rate_id">Tax</label>
                                 <span class="help">Included in prices</span>
                                 <div class="select-wrapper">
                                    <select include_blank="Not applicable" class="select optional full-width form-control" name="product[tax_rate_id]" id="product_tax_rate_id">
                                       <option value="0">Not applicable</option>
                                    </select>
                                 </div>
                              </div>-->
<!--                              <div class="form-group m-t-25">
                                 <div class="checkbox check-success m-b-none">
                                     <input name="product[commission_enabled]" type="hidden" value="0"><input class="boolean optional form-control" type="checkbox" value="<?php // echo (!empty($product['commission_enabled'])) ? $product['commission_enabled'] : 1 ?>" <?php // echo (!empty($product['commission_enabled'])) ? (($product['commission_enabled'] == 1) ? 'checked="checked"' : '') : 'checked="checked"';  ?> name="product[commission_enabled]" id="product_commission_enabled">
                                    <label for="product_commission_enabled">Enable commission
                                    <i class="icon-question-circle hint-icon" data-placement="bottom" data-toggle="tooltip" title="Calculate staff commissions when this product is sold"></i>
                                    </label>
                                    <div class="help p-l-25 visible-xs">
                                       Calculate staff commissions when this product is sold
                                    </div>
                                 </div>
                              </div>-->
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane" id="stock-history">
                        <div class="adjustments-empty-state">
                           <div class="row full-height sm-padding-10 m-t-20">
                              <div class="col-sm-8 col-sm-offset-2 full-height">
                                 <div class="text-center placeholder-text center-margin">
                                    <p>
                                       <i class="s-icon-tickets placeholder-icon hint-text"></i>
                                    </p>
                                    <h3 class="m-b-10">Stock History</h3>
                                    <p class="m-b-20">
                                       Any adjustments to this product's stock quantity will show here.
                                    </p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="clearfix"></div>
               <div class="modal-footer">
                  <button aria-hidden="" class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
                  <button class="btn btn-success">Save</button>
                  <div class="pull-left"></div>
                  <div class="clearfix"></div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<script>
    
    $("#new_product").validator().on("submit", function (event) {        
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            $.ajax({
            url: g.base_url + 'products/add',
            type: 'post',   
            dataType: 'json',
            data: $('form#new_product').serialize(),
            success: function(data) {
                if(data.success){
                    window.location = g.base_url + 'products';//location.pathname;
                }
                else{
                    $('.alert-danger').removeClass('hide').html(data.error)
                }
              }
            });
        }
    });
    
</script>