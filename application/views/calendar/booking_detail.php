<div aria-hidden="false" aria-labelledby="modalSlideUpLabel" class="modal slide-up top-alignement in" id="bookingModal" role="dialog" tabindex="-1" style="display: block; padding-left: 17px;">
   <div class="modal-dialog modal-lg">
      <div class="modal-content-wrapper">
         <div class="modal-content">
            <div class="modal-header clearfix text-left sm-padding-10">
               <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
               <i class="pg-close fs-14"></i>
               </button>
               <?php if(empty($appointment['clientid'])) { ?>
                    <h5 class="no-padding">Walk-In</h5>
               <?php } else { ?>
                    <h5 class="no-margin bold"><a class="view-button" href="/customer/view/<?php echo $appointment['clientid'] ?>"><?php echo $appointment['fname_c'].' '.$appointment['lname_c']; ?></a></h5>
                    <div class="fs-16"><span><?php echo $appointment['mobile'] ?></span></div>                   
                <?php }?>
               <!--<span class="label customer-label label-unpaid">₹793 Unpaid</span>-->
            </div>
            <div class="view-form">
               <div class="modal-body sm-padding-10">
                  <?php if(!empty($appointment['clientid'])) { ?>
                  <div class="row">
                     <div class="col-sm-9">
                        <div class="row">
                           <div class="col-sm-12">
                              <div class="alert alert-warning">
                                  <?php echo $appointment['notes'] ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php } ?>
                  <div class="row">
                     <div class="col-xs-12 col-sm-9">
                        <table class="simple-rows">
                           <tbody>
                              <tr>
                                 <th>Service</th>
                                 <td><?php echo $appointment['service'] ?></td>
                              </tr>
                              <tr>
                                 <th>Date</th>
                                 <td><?php echo date("l, j F Y", strtotime($appointment['appointment_date'])) ?></td>
                              </tr>
                              <tr>
                                 <th>Time</th>
                                 <td><?php echo $appointment['app_t_format'] ?> ( <?php echo hrsmins($appointment['duration']) ?> )</td>
                              </tr>
                              <tr>
                                 <th>Staff</th>
                                 <td><?php echo $appointment['fname_s'] .' '. $appointment['lname_s'] ?>
                                 </td>
                              </tr>
                              <tr>
                                 <th>Price</th>
                                 <td>
                                     <s>₹<?php echo $appointment['price'] ?></s><span class="text-danger m-l-10"><?php echo !empty($appointment['special_price']) ? '₹'.$appointment['special_price'].'' : ''; ?> </span>
                                 </td>
                              </tr>
                              <tr>
                                 <!--<th>Booked by</th>-->
<!--                                 <td>
                                    <span class="visible-xs">rahul on 19 January 2017 at 7:56am</span>
                                    <span class="hidden-xs">rahul on Thursday, 19 Jan 2017 at 7:56am</span>
                                 </td>-->
                              </tr>
                              <tr>
                                 <th>Reference</th>
                                 <td><?php echo $appointment['reference_id'] ?></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="col-sm-3">
                        <div class="clearfix"></div>
                        <a class="visible-xs btn btn-default btn-status" data-toggle="collapse" aria-expand="false" href="#statusCollapse">Change status</a>
                        <div class="collapse sm-m-t-20" id="statusCollapse">
                           <div class="btn-group-vertical full-width">
                               <a class="btn btn-default <?php echo ($appointment['status'] == 'cnf') ? 'active' : '' ?>" href="<?php echo (($appointment['status'] == 'cnf' || $appointment['status'] == 'comp')? 'javascript:void(0);' : '/calendar/changeStatus?id='.$appointment['appointment_id'].'&status=cnf') ?>">Confirmed</a>
                              <a class="btn btn-default <?php echo ($appointment['status'] == 'strt') ? 'active' : '' ?>" href="<?php echo (($appointment['status'] == 'strt' || $appointment['status'] == 'comp') ? 'javascript:void(0);' : '/calendar/changeStatus?id='.$appointment['appointment_id'].'&status=strt') ?>">Started</a>
                              <a class="btn btn-default <?php echo ($appointment['status'] == 'arv') ? 'active' : '' ?>" href="<?php echo (($appointment['status'] == 'arv' || $appointment['status'] == 'comp') ? 'javascript:void(0);' : '/calendar/changeStatus?id='.$appointment['appointment_id'].'&status=arv') ?>">Arrived</a>
                              <a class="btn btn-default <?php echo ($appointment['status'] == 'ns') ? 'active' : '' ?>" href="<?php echo (($appointment['status'] == 'ns' || $appointment['status'] == 'comp') ? 'javascript:void(0);' : '/calendar/changeStatus?id='.$appointment['appointment_id'].'&status=ns') ?>">No show</a>
                              <a class="btn btn-default <?php echo ($appointment['status'] == 'comp') ? 'active' : '' ?>" href="<?php echo (($appointment['status'] == 'comp' || $appointment['status'] == 'comp') ? 'javascript:void(0);' : '/calendar/changeStatus?id='.$appointment['appointment_id'].'&status=comp') ?>">Completed</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                   <?php if($appointment['status'] != 'comp') { ?>
                  <div class="pull-left">
                     <span class="btn-group m-r-5 sm-no-margin">
                     <a class="btn btn-danger" data-params='{"id":"<?php echo $appointment['appointment_id'] ?>"}' data-model="modal" data-modalid="cancelModal" href="/calendar/cancelBooking" id="cancel_booking"><span>Cancel</span>
                     </a><a class="btn btn-default" data-params='{"id":"<?php echo $appointment['appointment_id'] ?>"}' data-model="modal" data-modalid="newBooking" href="/calendar/editBooking" id="edit_booking"><span>Edit</span>
                     </a>                         
                     </span>
                  </div>
                   <?php } ?>
                  <?php if($appointment['status'] == 'comp') { ?>
                   <a class="btn btn-success checkout-button" data-appid="<?php echo $appointment['appointment_id']; ?>" href="javascript:void(0);">Checkout</a>                      
                  <?php } ?>
                   <button aria-hidden="true" class="btn btn-default" data-dismiss="modal" type="button">
                        Close
                        </button>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>

    $('#cancel_booking, #edit_booking').click(function(e) {
	   e.preventDefault();
        var $this = $(this),
            url = $this.attr('href'),
            modalid = $this.data('modalid');
            
        loadingOverlay();
        $.get(url, $this.data('params'), function(data) {
            removeLoadingOverlay();
            $('#bookingModal').remove();
            $('#' + modalid).remove();
            $('body').append(data);
            $('#' + modalid).modal({backdrop: 'static', keyboard: false});
            $('#' + modalid).on('hidden.bs.modal', function(){
                $('.modal-backdrop').remove();
            });
        });
    });
    
    $('.checkout-button').click(function(){
       
       $.ajax({
            url: g.base_url + 'sales/appointmentSale',
            type: 'post',   
            dataType: 'html',
            data: $(this).data(),
            success: function(data) {

                removeLoadingOverlay();
                $('#bookingModal').remove();
                $('#new-sale').remove();
                $('body').append(data);
                $('#new-sale').modal({backdrop: 'static', keyboard: false});
                $('#new-sale').on('hidden.bs.modal', function(){
                    $('.modal-backdrop').remove();
                });

            }
        });
            
    });
    
    

</script>