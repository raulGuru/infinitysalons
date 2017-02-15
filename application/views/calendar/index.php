<div class="">
   <!-- START PAGE CONTENT -->
   <div class="content full-height">
      <div class="container-fluid full-height">
          <div id="loading_image" style="display: none">
            <i class="icon-refresh icon-spin"></i>
            Loading...
         </div>
         <div id="calendar">
            <div class="toolbar">
                  <div class="left-controls">
                     <div data-href="/calendar/newBooking" data-model="modal" data-modalid="newBooking" class="btn btn-success navigate hidden-xs" title="Create appointment" data-original-title="Create appointment" data-toggle="tooltip" data-placement="bottom">
                        <i class="icon-plus"></i>
                        <span>Create appointment</span>
                     </div>
<!--                     <div data-href="/sales/newSale" data-model="modal" data-modalid="new-sale" class="btn btn-success navigate hidden-xs js-create-sale-action" data-placement="bottom" data-toggle="tooltip" title="Create product sale" data-original-title="Create sale">
                        <i class="icon-tag"></i>
                        <span>Create product sale</span>
                     </div>-->
                      <div data-href="/sales/newServiceSale" data-model="modal" data-modalid="new-service-sale" class="btn btn-success navigate hidden-xs js-create-servicesale-action" data-placement="bottom" data-toggle="tooltip" title="Create service sale" data-original-title="Create sale">
                        <i class="icon-tag"></i>
                        <span>Create service sale</span>
                     </div>
                     <div class="select-location dropdown">
                         <form id="form-staff" method="POST" action="">
                             <input type="hidden" name="calview" id="calview" value="<?php echo $calview; ?>">
                         <div class="select-wrapper">
                             <select class="form-control select-staff" name="staffid" <?php  echo ($sesStaffid != 0) ? 'disabled="disabled"' : ''; ?>>
                                    <option value="">All staff</option>
                                <?php foreach($staffs as $staff) {
                                    $name = $staff['first_name'] .' '.$staff['last_name'];
                                    $sel = ($staff['id'] == $selstaffid) ? 'selected="selected"' : '';
                                    echo "<option value='".$staff['id']."' $sel>".$name."</option>";
                                }?>
                            </select>
                        </div>
                        </form>
                     </div>
                  </div>
               </form>
            </div>
            <div class="grid loaded fc">
                <div id="appointment_calender"></div>
            </div>
         </div>
         <footer></footer>
      </div>
   </div>
   <!-- END PAGE CONTENT -->
</div>

    <div id="popover-head" class="hide"></div>
    <div id="popover-content" class="hide">
        <table class="">
        <tbody>
        <tr>
        <td class="" id="status_lbl">ss</td>
        </tr>
        <tr>
        <td class="" id="client_lbl">ss</td>
        </tr>
        <tr>
        <td class="" id="service_lbl">ss</td>
        </tr>
        <tr>
        <td class="" id="tofrom_lbl">ss</td>
        </tr>
        <tr>
        <td class="" id="staff_lbl">ss</td>
        </tr>
        <tr>
        <td class=""><s id="price_lbl">₹1000</s><span class="text-danger m-l-10" id="sp_lbl">₹900 </span></td>
        </tr>
        </tbody>
        </table>
    </div>



<script>
    
    $('.select-staff').change(function(){
         this.form.submit();
    });
    
    var appointmentdetails = <?php echo json_encode($appointmentdetails); ?>;
    var calEvent = <?php echo json_encode($events); ?>
    
    var date = new Date(),
        d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear(),
        h = date.getHours(),
        m = date.getMinutes(),
        defview = '<?php echo ($calview == 'd') ? 'agendaDay' : 'agendaWeek'; ?>';
        
    $(document).ready(function() {

        var calendar =  $('#appointment_calender').fullCalendar({
            
                header: {
			left: 'prev,next today',
			center: 'title',
			right: 'agendaWeek,agendaDay'
		},
                defaultView: defview,
		events: calEvent,
		//editable: false,
                selectable: true,
		selectHelper: true,
                slotDuration: '00:05:00',
                allDaySlot:false,
                scrollTime : h+':'+m,
                minTime: "09:45:00",
                maxTime: "22:45:00",
		select: function(start, end, allDay) {
                    var st = moment(start).format('HH:mm'),
                        sd = moment(start).format('YYYY-MM-DD');
                    loadNewBookingModal(sd, st);                    
		},
                eventMouseover: function(calEvent, jsEvent) {
                    $(this).popover({
                        html: true,
                        //placement: 'auto right',
                        placement: function () {
                            if($('#calview').val() == 'd') {
                                return "bottom";
                            }
                            return "auto right";
                        },
                        content: function() {
                            
                            var app_detail = calEvent.app_detail;
                            if(typeof app_detail !== 'undefined') {
                                $("#status_lbl").html(app_detail.status_lbl);
                                $("#client_lbl").html(app_detail.client_lbl);
                                $("#service_lbl").html(app_detail.service_lbl);
                                $("#tofrom_lbl").html(app_detail.tofrom_lbl);
                                $("#staff_lbl").html(app_detail.staff_lbl);
                                $("#price_lbl").html('₹' + app_detail.price_lbl);
                                $("#sp_lbl").html('₹' + app_detail.sp_lbl);

                                return $("#popover-content").html();
                            }                            
                        }
                    });
                    $(this).popover('show');
                },
                eventMouseout: function(calEvent, jsEvent) {
                    $("#status_lbl, #client_lbl, #service_lbl, #tofrom_lbl, #staff_lbl, #price_lbl, #sp_lbl").html('');
                    $(this).popover('hide');
                },
                eventClick: function(calEvent, jsEvent, view) {
                    var appointment_id = calEvent.appointment_id,
                            service_id = calEvent.service_id;
                    loadBookingModal(appointment_id, service_id);
                }                
        }).on('click', '.fc-agendaWeek-button', function() {
            $('#calview').val('w');
        }).on('click', '.fc-agendaDay-button', function() {
            $('#calview').val('d');
        });
        
        function loadBookingModal(a_id, s_id) {
            
            $.get('/calendar/bookingDetail', {aid : a_id, sid : s_id}, function(data) {
                $('#bookingModal').remove();
                $('body').append(data);
                $('#bookingModal').modal({backdrop: 'static', keyboard: false});
                $('#bookingModal').on('hidden.bs.modal', function(){
                    $('.modal-backdrop').remove();
                });
            });
            return false;
        }
        
        function loadNewBookingModal(sd, st) {
            
            $.get('/calendar/newBooking', { sd : sd, st : st, selstaffid : $('.select-staff').val() }, function(data) {
                $('#newBooking').remove();
                $('body').append(data);
                $('#newBooking').modal({backdrop: 'static', keyboard: false});
                $('#newBooking').on('hidden.bs.modal', function(){
                    $('.modal-backdrop').remove();
                });
            });
            return false;            
        }
        
    });
</script>