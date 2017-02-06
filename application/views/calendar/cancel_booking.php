<div aria-hidden="false" aria-labelledby="modalSlideUpLabel" class="modal slide-up in" id="cancelModal" role="dialog" tabindex="-1" style="display: block; padding-left: 17px;">
   <div class="modal-dialog">
      <div class="modal-content-wrapper">
         <div class="modal-content">
            <div class="modal-header clearfix text-center">
               <button class="close" data-dismiss="modal" type="button">
               <i class="pg-close fs-14"></i>
               </button>
               <h4>Cancel Appointment</h4>
            </div>
            <div class="new-form">
               <form novalidate="novalidate" class="simple_form new_cancel_booking" id="new_cancel_booking">
                   <input type="hidden" name="appointment_id" id="appointment_id" value="<?php echo $appointment['appointment_id'] ?>">
                  <div class="modal-body sm-padding-10">
                     <div class="notice"></div>
                     <p>The following services will be cancelled</p>
                     <?php foreach($appointment['services'] as $service) {
                         echo "<p>".$service['service'] .' with '. $service['fname_s'] .' '. $service['lname_s'] .' on '.date("l, F j Y, g:ia", strtotime($service['appointment_time']))."</p>";
                     } ?>
                     <div class="form-group">
                        <label class="string optional" for="cancel_booking_cancellation_reason_id">Cancellation reason</label>
                        <div class="select-wrapper">
                            <select class="select optional full-width form-control" name="cancellation_reason_id" id="cancel_booking_cancellation_reason_id" required="required">
                               <?php foreach($cancelreasons as $reason) {
                                   echo "<option value='".$reason['id']."'>".$reason['cancelreason']."</option>";
                               } ?>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <input type="submit" name="cancel_booking[confirmation]" value="Cancel Appointment" class="btn btn-danger">
                     <div class="pull-left">
                        <button aria-hidden="true" class="btn btn-default" data-dismiss="modal">Close</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

<script>
    
    $("#new_cancel_booking").validator().on("submit", function (event) {        
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            $.ajax({
            url: g.base_url + 'calendar/cancelReason',
            type: 'post',   
            dataType: 'json',
            data: $('form#new_cancel_booking').serialize(),
            success: function(data) {
                if(data.success){
                    window.location = g.base_url + 'calendar';//location.pathname;
                }
                else{
                    $('.alert-danger').removeClass('hide').html(data.error)
                }
              }
            });
        }
    });
    
</script>