<div class="products-list full-height">
    <?php if(!empty($products)) { ?>
   <div class="panel panel-transparent">
      <div class="panel-body sm-padding-15">
         <div class="row table-toolbar">
            <div class="col-sm-12 col-md-12 col-lg-12">
               <form id="products-search">
                  <!--input type="hidden" name="sort" id="sort" value="updated_at">
                  <input type="hidden" name="direction" id="direction" value="desc"-->
                  <label class="sr-only" for="search">Search</label>
                  <div class="row">
                     <div class="col-md-3 text-left">
                        <h3 class="no-margin hidden-xs">Product Management</h3>
                     </div>
                     <div class="col-md-9">
                        <div class="pull-right inline product-buttons">
                           <!--div class="btn-group hidden-xs m-r-15">
                              <a class="btn btn-default event-link" target="_blank" href="/products/export.xlsx">Excel</a>
                              <a class="btn btn-default event-link" target="_blank" href="/products/export.csv">CSV</a>
                           </div-->
                           <a class="btn btn-success event-link" href="/products/newProduct" data-model="modal" data-modalid="newProductModal"><span class="hidden-xs">New Product</span>
                           <span class="visible-xs">+</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
          <div class="row m-t-20">
            <div class="col-sm-12 col-md-12 col-lg-12">
               <div class="/*products table-responsive*/">
                   <table class="table table-hover " id="product_list">
                     <thead>
                        <tr class="bg-grey">
                           <th>Product Name
                           </th>
                           <th>
                              SKU/Barcode
                           </th>
                           <th class="text-right">Retail Price
                           </th>
                           <th>Quantity
                           </th>
                           <th>Updated
                           </th>
                        </tr>
                     </thead>
                     <tbody>
                             <?php 
                             foreach($products as $product) { ?>
                         
                                <tr data-href="/products/edit" data-params='{"id":"<?php echo $product['id'] ?>"}' data-model="modal" data-modalid="newProductModal" class="clickable-row view_product" id="product_<?php echo $product['id'] ?>">
                                    <td><?php echo $product['product_name']; ?></td>
                                    <td><?php echo $product['sku'] ?></td>
                                  <td class="text-right p-r-50">
                                      <s>₹<?php echo $product['full_price'] ?></s><span class="text-danger m-l-10">₹<?php echo $product['special_price'] ?></span>
                                  </td>
                                  <td><?php echo $product['quantity'] ?></td>
                                  <td><?php echo date("F j, Y, g:i a", strtotime($product['timestamp'])) ?></td>
                               </tr>          
                                 
                            <?php } ?>
                        
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
    <?php } else { ?>
    
    <div class="row full-height sm-padding-10">
    <div class="col-sm-8 col-sm-offset-2 full-height">
       <div class="text-center v-align-center placeholder-text center-margin top-alignement">
          <p>
             <i class="s-icon-tickets placeholder-icon hint-text"></i>
          </p>
          <h3 class="m-b-10">Add New Products</h3>
          <p class="m-b-20">
             Have you got stuff you want to sell? No sweat - you can add your retail products here and sell them with an existing appointment or as one-off items. Too easy!
          </p>
          <p>
              <a class="btn btn-success" href="/products/newProduct" data-model="modal" data-modalid="newProductModal">New Product</a>
          </p>
       </div>
    </div>
 </div>
        
    <?php }  ?> 
</div>

<script>
    
    $(document).ready(function() {
        $('#product_list').dataTable({"bLengthChange": false});
    });
</script>