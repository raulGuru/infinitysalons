<div class="discounts-list full-height">
   <div class="panel panel-transparent">
      <div class="panel-body sm-padding-15">
         <div class="row">
            <div class="col-sm-8">
               <h3 class="no-margin hidden-xs">Discount Types</h3>
            </div>
            <div class="col-sm-4">
               <div class="pull-right">
                  <a class="btn btn-success" data-model="modal" data-modalid="newDiscountModal" href="/discounts/newDiscount"><span class="hidden-xs">New Discount</span>
                  <span class="visible-xs">+</span>
                  </a>
               </div>
            </div>
         </div>
          <?php 
            if(!empty($discounts)) { ?>
          
            <div class="row m-t-20">
              <div class="col-sm-12 col-md-12 col-lg-12">
                 <div class="/*discounts table-responsive*/">
                     <table class="table table-hover" id="discount-list">
                       <thead>
                          <tr class="bg-grey">
                             <th>Discount Type</th>
                             <th>Value</th>
                             <th>Date Added</th>
                          </tr>
                       </thead>
                       <tbody>
                           <?php 
                           $v = '';
                            foreach ($discounts as $discount) {
                                $value = ($discount['discount_type'] == 'percentage') ? ($discount['value'].'% off') : ('₹'.$discount['value'].' off');
                                $v = '<tr data-params=\'{"id":"'.$discount['id'].'"}\' data-model="modal" data-modalid="newDiscountModal" data-href="/discounts/edit" class="clickable-row">';
                                $v .= '<td>'.$discount['name'].'</td><td>'.$value.'</td><td>'.date('l, j M Y', strtotime($discount['timestamp'])).'</td></tr>';
                                echo $v;
                            }

                           ?>                          
                       </tbody>
                    </table>
                 </div>
              </div>
           </div>
                
            <?php }  ?>
         
      </div>
   </div>
</div>

<script>    
    $(document).ready(function() {
        $('#discount-list').dataTable({"bLengthChange": false});
    });
</script>