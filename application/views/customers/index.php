
   <div class="content full-height">
      <div class="container-fluid full-height no-padding">
         <div id="loading_image" style="display: none">
            <i class="icon-refresh icon-spin"></i>
            Loading...
         </div>
         <div class="panel panel-transparent">
            <div class="panel-body sm-padding-15" data-update-history="true">
               <div class="row search-navs table-toolbar sm-m-t-10">
                  <div class="col-sm-6">
                  </div>
                  <div class="col-sm-6">
                     <div class="pull-right inline">
                        <!--<a class=" btn btn-default m-r-5 hidden-xs" href="/customers/import">Import Clients</a>-->
                        <a class="btn btn-success event-link" data-model="modal" data-modalid="newCustomerModal" href="/customers/newCustomer"><span class="hidden-xs">New Client</span>
                        <span class="visible-xs">+</span>
                        </a>
                     </div>
                  </div>
               </div>
               <?php if(!empty($customers)) {?>
                            <div class="row m-t-20 clearfix">
                                <div class="col-sm-12 col-md-12 col-lg-12" id="">
                                    <table class="table table-hover table-sortable"  id="customers_list">
                                        <thead class="bg-grey">
                                           <tr>
                                              <th>Name</th>
                                              <th>Mobile number</th>
                                              <th>Email</th>
                                              <th>Gender</th>
                                              <th>Edit</th>
                                           </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($customers as $customer) {  ?> 
                                               <tr class="clickable-row view_customer" data-params='{"id":"<?php echo $customer['id']; ?>"}' data-model="modal" data-modalid="newCustomerModal" href="/customers/edit">
                                                   <td><?php echo $customer['firstname'] .' '. $customer['lastname']?></td>
                                                   <td><?php echo $customer['mobile'] ?></td>
                                                   <td><?php echo $customer['email'] ?></td>
                                                   <td><?php echo ($customer['gender'] == 'f') ? 'Female' : 'Male'; ?></td>
                                                   <td></td>
                                                </tr>
                                            <?php }  ?>                                            
                                        </tbody>
                                    </table>
                                </div>
                             </div>
                                             
               <?php }  ?>
               
            </div>
         </div>
      </div>
   </div>
<script>
    
    $(document).ready(function() {
        $('#customers_list').dataTable({"bLengthChange": false});
        
//        $('.view_customer').click(function(){
//            window.location = g.base_url + 'customers/view?id='+ $(this).data('id');
//        });
    });
</script>