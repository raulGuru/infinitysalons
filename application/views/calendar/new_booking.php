<div aria-hidden="false" aria-labelledby="modalSlideUpLabel" class="modal fill-in in" id="newBooking" role="dialog" tabindex="-1" style="display: block; padding-left: 17px;">
   <div class="modal-dialog modal-lg">
      <div class="modal-content no-border">
         <div class="modal-header clearfix text-left">
            <button aria-hidden="true" class="close" data-dismiss="modal">
            <i class="pg-close"></i>
            </button>
            <h4 class="text-center">
               New Booking
            </h4>
         </div>
         <ul class="nav nav-tabs nav-tabs-simple p-l-25 p-r-25 sm-p-l-10 sm-p-r-10" id="serviceAppointmentTab">
            <li class="active">
               <a data-toggle="tab" href="#details">Appointment
               </a>
            </li>
<!--            <li>
               <a data-toggle="tab" href="#block-time">Block time
               </a>
            </li>-->
         </ul>
         <div class="tab-content no-padding">
            <div class="tab-pane active" id="details">
               <div class="new-form sm-no-margin m-t-20">
                  <form class="simple_form new_booking" id="new_booking">
                      <input type="hidden" name="appointment_id" value="<?php echo $appointment['appointment_id'] ?>">
                     <div class="modal-body sm-padding-10 sm-no-margin appointment-modal">
                         <div class="alert alert-danger hide"></div>
<!--                        <div class="notice">
                           <div class="alert alert-info sm-no-margin"><a class="close" data-dismiss="alert">×</a><b>dd</b> isn’t working at <b>2:30am</b>, but you can still book them.</div>
                        </div>-->
                        <div class="row">
                           <div class="col-lg-5 col-md-5 sm-p-t-10 left-modal-column-md">
                              <div class="m-b-20" id="customer-search">
                                 <div class="row search-container">
                                    <div class="col-sm-12">
                                       <div class="form-group no-margin">
                                          <label for="booking_customer_id">Client</label>
                                          <div class="input-group">
                                             <input placeholder="Search by name or mobile number" class="search b-r-none form-control ui-autocomplete-input" autofocus="autofocus" type="text" name="booking[customer_id]" id="booking_customer_id" autocomplete="off">
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
<!--                                          <a class="btn btn-default m-t-10" data-remote="true" href="/customers/new"><i class="s-icon-plus-thin fs-12"></i>Add new</a>-->
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
<!--                                             <h5 class="link inline no-margin bold">
                                                <a data-remote="true" href="#"></a>
                                             </h5>-->
                                          </strong>
                                          <div class="contact fs-16"></div>
                                          <div class="labels-container">
                                             <div class="col-sm-12 customer-labels sm-no-padding"></div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-6">
                                       <div class="form-group no-margin text-right">
                                          <a class="btn btn-default remove sm-m-t-5" href="javascript:void(0);"><span class="hidden-xs hidden-sm" id="change_client">Change Client</span>
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
                              <div class="row">
                                 <div class="col-sm-12">
                                    <div class="form-group text optional booking_notes"><label class="text optional control-label" for="booking_notes">Booking note</label><textarea rows="3" class="text optional form-control" placeholder="Add notes viewable by staff only (optional)" name="booking[notes]" id="booking_notes"></textarea></div>
                                 </div>
                              </div>
<!--                              <div class="other-appointments-container row hidden" id="other-appointments">
                                 <div class="col-sm-12">
                                    <span class="form-label">Other appointments</span>
                                    <ul class="scroll-box-body scrollable"></ul>
                                 </div>
                              </div>-->
                              <input class="hidden" type="hidden" value="calendar" name="booking[booking_type]" id="booking_booking_type">
                           </div>
                           <div class="col-lg-7 col-md-7 right-modal-column-md">
                              <div class="js-date-sequence-row m-b-5">
                                 <div class="form-group hidden booking_booking_sequence_interval_base"><input class="hidden form-control" type="hidden" name="booking[booking_sequence_attributes][interval_base]" id="booking_booking_sequence_attributes_interval_base"></div>
                                 <div class="form-group hidden booking_booking_sequence_interval_multiplier"><input class="hidden form-control" type="hidden" name="booking[booking_sequence_attributes][interval_multiplier]" id="booking_booking_sequence_attributes_interval_multiplier"></div>
                                 <div class="form-group hidden booking_booking_sequence_end_type"><input class="hidden form-control" type="hidden" name="booking[booking_sequence_attributes][end_type]" id="booking_booking_sequence_attributes_end_type"></div>
                                 <div class="form-group hidden booking_booking_sequence_occurrences"><input class="hidden form-control" type="hidden" name="booking[booking_sequence_attributes][occurrences]" id="booking_booking_sequence_attributes_occurrences"></div>
                                 <div class="row">
                                    <div class="col-xs-6">
                                       <span class="form-label visible-xs">Booking date</span>
                                    </div>
                                 </div>
                                 <div class="row attached-fields">
                                    <div class="col-xs-6 col-sm-8 date-column no-padding">
                                       <div class="form-group">
                                          <label class="date optional hidden-xs" for="booking_date">Date</label>
                                          <div class="">
                                             <input class="string optional readonly date-input form-control" value="" placeholder="Select date" type="text" name="booking[date]" id="booking_date">
                                          </div>
                                       </div>
                                    </div>
<!--                                    <div class="col-xs-6 col-sm-4 repeats-column no-padding">
                                       <div class="form-group no-padding select no-margin">
                                          <label class="hidden-xs" for="repeats">Repeats</label>
                                          <div class="select-wrapper">
                                             <select name="repeats" id="repeats" class="form-control js-repeats">
                                                <option value="">Don't repeat</option>
                                                <option value="daily_1">Daily</option>
                                                <option value="daily_2">Every 2 days</option>
                                                <option value="daily_3">Every 3 days</option>
                                                <option value="daily_4">Every 4 days</option>
                                                <option value="daily_5">Every 5 days</option>
                                                <option value="daily_6">Every 6 days</option>
                                                <option value="weekly_1">Weekly</option>
                                                <option value="weekly_2">Every 2 weeks</option>
                                                <option value="weekly_3">Every 3 weeks</option>
                                                <option value="weekly_4">Every 4 weeks</option>
                                                <option value="weekly_5">Every 5 weeks</option>
                                                <option value="weekly_6">Every 6 weeks</option>
                                                <option value="monthly_1">Monthly</option>
                                                <option value="monthly_2">Every 2 months</option>
                                                <option value="monthly_3">Every 3 months</option>
                                                <option value="monthly_4">Every 4 months</option>
                                                <option value="monthly_5">Every 5 months</option>
                                                <option value="monthly_6">Every 6 months</option>
                                                <option value="monthly_7">Every 7 months</option>
                                                <option value="monthly_8">Every 8 months</option>
                                                <option value="monthly_9">Every 9 months</option>
                                                <option value="monthly_10">Every 10 months</option>
                                                <option value="monthly_11">Every 11 months</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>-->
<!--                                    <div class="col-xs-12 col-sm-4 hidden ends-column no-padding">
                                       <div class="form-group no-padding select no-margin">
                                          <label class="hidden-xs" for="ends">Ends</label>
                                          <div class="select-wrapper">
                                             <select name="ends" id="ends" class="form-control js-ends">
                                                <option value="by_occurrences_2">After 2 times</option>
                                                <option value="by_occurrences_3">After 3 times</option>
                                                <option value="by_occurrences_4">After 4 times</option>
                                                <option value="by_occurrences_5">After 5 times</option>
                                                <option value="by_occurrences_6">After 6 times</option>
                                                <option value="by_occurrences_7">After 7 times</option>
                                                <option value="by_occurrences_8">After 8 times</option>
                                                <option value="by_occurrences_9">After 9 times</option>
                                                <option value="by_occurrences_10">After 10 times</option>
                                                <option value="by_occurrences_11">After 11 times</option>
                                                <option value="by_occurrences_12">After 12 times</option>
                                                <option value="by_occurrences_13">After 13 times</option>
                                                <option value="by_occurrences_14">After 14 times</option>
                                                <option value="by_occurrences_15">After 15 times</option>
                                                <option value="by_occurrences_20">After 20 times</option>
                                                <option value="by_occurrences_25">After 25 times</option>
                                                <option value="by_occurrences_30">After 30 times</option>
                                                <option value="by_date">Specific date</option>
                                                <option value="ongoing">Ongoing</option>
                                             </select>
                                          </div>
                                       </div>
                                    </div>-->
<!--                                    <div class="col-xs-12 col-sm-4 hidden ends-at-column no-padding">
                                       <div class="form-group no-padding no-margin">
                                          <label class="hidden-xs" for="booking_booking_sequence_attributes_ends_at">Ends on</label>
                                          <input class="string required readonly date-input form-control hasDatepicker" readonly="readonly" placeholder="Select date" type="text" name="booking[booking_sequence_attributes][ends_at]" id="booking_booking_sequence_attributes_ends_at">
                                          <span class="remove-group-addon">
                                          <a class="text-muted js-reset-ends" href="#"><i class="s-icon-close"></i>
                                          </a></span>
                                       </div>
                                    </div>-->
                                 </div>
                              </div>
                              <div class="repeat-hint hint-text text-center"></div>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <h5 class="m-t-none fs-13 font-montserrat text-uppercase m-b-5 hidden-xs hidden-sm text-master">Services</h5>
                                    <div class="booking-services clearfix">
                                       <div>
                                          <h5 class="form-label visible-xs visible-sm">
                                             Service 1
                                          </h5>
                                          <div class="primary-booking js-booking-row attached-form-group">
                                             <div class="row">
                                                <div class="col-sm-12 no-padding">
                                                   <div class="form-group no-padding service-booking-select select">
                                                      <div class="form-control no-padding attached-field-last selectizer-container-parent">
                                                         <div class="selectizer-container">
                                                            <select class="form-control selectizer" placeholder="Select service" required="required" name="booking[service_pricing_level_id]" id="booking_service_pricing_level_id">
                                                               <option value="" selected="selected">Select service</option>
                                                               <?php
                                                               foreach($services as $service){
                                                                   echo "<option data-duration='".$service['duration']."' value='".$service['id']."'>".$service['name']."  ( ".hrsmins($service['duration']).", ₹".$service['special_price']." )</option>";
                                                               } ?>
                                                            </select>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row primary-booking-main room-selector-row">
                                                <div class="col-xs-12 no-padding col-sm-4">
                                                   <div class="form-group no-padding select employee-selector">
                                                      <div class="input-group">
                                                         <div class="input-group-addon relative">
                                                            <input name="booking[employee_is_requested]" type="hidden" value="0"><input class="boolean optional requested-checkbox" type="checkbox" value="1" name="booking[employee_is_requested]" id="booking_employee_is_requested">
                                                            <label for="booking_employee_is_requested">&nbsp;</label>
                                                         </div>
                                                         <div class="">
                                                            <select class="js-select-employee form-control employee-selector__input" placeholder="Select staff" required="required" name="booking[employee_id]" id="booking_employee_id">
                                                               <option value="" selected="selected">Select staff</option>
                                                               <?php foreach($staffs as $staff) {
                                                                   echo "<option value='".$staff['id']."' >".$staff['first_name']."</option>";
                                                               } ?>
                                                            </select>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
<!--                                                <div class="col-xs-12 no-padding room-selector-column hide col-sm-4">
                                                   <div class="form-group no-padding select">
                                                      <div class="select-wrapper">
                                                         <select class="js-select-room form-control" placeholder="Select resource" required="required" name="booking[room_id]" id="booking_room_id" disabled="">
                                                            <option value="" selected="selected">Select resource</option>
                                                         </select>
                                                      </div>
                                                   </div>
                                                </div>-->
                                                <div class="col-xs-6 no-padding col-sm-4">
                                                   <div class="form-group no-padding select">
                                                      <div class="select-wrapper">
                                                         <select label="false" class="select optional form-control js-select-time" selected="selected" name="booking[time_start_field]" id="booking_time_start_field">
                                                            <option value="00:00">12:00am</option>
                                                            <option value="00:05">12:05am</option>
                                                            <option value="00:10">12:10am</option>
                                                            <option value="00:15">12:15am</option>
                                                            <option value="00:20">12:20am</option>
                                                            <option value="00:25">12:25am</option>
                                                            <option value="00:30">12:30am</option>
                                                            <option value="00:35">12:35am</option>
                                                            <option value="00:40">12:40am</option>
                                                            <option value="00:45">12:45am</option>
                                                            <option value="00:50">12:50am</option>
                                                            <option value="00:55">12:55am</option>
                                                            <option value="01:00">1:00am</option>
                                                            <option value="01:05">1:05am</option>
                                                            <option value="01:10">1:10am</option>
                                                            <option value="01:15">1:15am</option>
                                                            <option value="01:20">1:20am</option>
                                                            <option value="01:25">1:25am</option>
                                                            <option value="01:30">1:30am</option>
                                                            <option value="01:35">1:35am</option>
                                                            <option value="01:40">1:40am</option>
                                                            <option value="01:45">1:45am</option>
                                                            <option value="01:50">1:50am</option>
                                                            <option value="01:55">1:55am</option>
                                                            <option value="02:00">2:00am</option>
                                                            <option value="02:05">2:05am</option>
                                                            <option value="02:10">2:10am</option>
                                                            <option value="02:15">2:15am</option>
                                                            <option value="02:20">2:20am</option>
                                                            <option value="02:25">2:25am</option>
                                                            <option value="02:30">2:30am</option>
                                                            <option value="02:35">2:35am</option>
                                                            <option value="02:40">2:40am</option>
                                                            <option value="02:45">2:45am</option>
                                                            <option value="02:50">2:50am</option>
                                                            <option value="02:55">2:55am</option>
                                                            <option value="03:00">3:00am</option>
                                                            <option value="03:05">3:05am</option>
                                                            <option value="03:10">3:10am</option>
                                                            <option value="03:15">3:15am</option>
                                                            <option value="03:20">3:20am</option>
                                                            <option value="03:25">3:25am</option>
                                                            <option value="03:30">3:30am</option>
                                                            <option value="03:35">3:35am</option>
                                                            <option value="03:40">3:40am</option>
                                                            <option value="03:45">3:45am</option>
                                                            <option value="03:50">3:50am</option>
                                                            <option value="03:55">3:55am</option>
                                                            <option value="04:00">4:00am</option>
                                                            <option value="04:05">4:05am</option>
                                                            <option value="04:10">4:10am</option>
                                                            <option value="04:15">4:15am</option>
                                                            <option value="04:20">4:20am</option>
                                                            <option value="04:25">4:25am</option>
                                                            <option value="04:30">4:30am</option>
                                                            <option value="04:35">4:35am</option>
                                                            <option value="04:40">4:40am</option>
                                                            <option value="04:45">4:45am</option>
                                                            <option value="04:50">4:50am</option>
                                                            <option value="04:55">4:55am</option>
                                                            <option value="05:00">5:00am</option>
                                                            <option value="05:05">5:05am</option>
                                                            <option value="05:10">5:10am</option>
                                                            <option value="05:15">5:15am</option>
                                                            <option value="05:20">5:20am</option>
                                                            <option value="05:25">5:25am</option>
                                                            <option value="05:30">5:30am</option>
                                                            <option value="05:35">5:35am</option>
                                                            <option value="05:40">5:40am</option>
                                                            <option value="05:45">5:45am</option>
                                                            <option value="05:50">5:50am</option>
                                                            <option value="05:55">5:55am</option>
                                                            <option value="06:00">6:00am</option>
                                                            <option value="06:05">6:05am</option>
                                                            <option value="06:10">6:10am</option>
                                                            <option value="06:15">6:15am</option>
                                                            <option value="06:20">6:20am</option>
                                                            <option value="06:25">6:25am</option>
                                                            <option value="06:30">6:30am</option>
                                                            <option value="06:35">6:35am</option>
                                                            <option value="06:40">6:40am</option>
                                                            <option value="06:45">6:45am</option>
                                                            <option value="06:50">6:50am</option>
                                                            <option value="06:55">6:55am</option>
                                                            <option value="07:00">7:00am</option>
                                                            <option value="07:05">7:05am</option>
                                                            <option value="07:10">7:10am</option>
                                                            <option value="07:15">7:15am</option>
                                                            <option value="07:20">7:20am</option>
                                                            <option value="07:25">7:25am</option>
                                                            <option value="07:30">7:30am</option>
                                                            <option value="07:35">7:35am</option>
                                                            <option value="07:40">7:40am</option>
                                                            <option value="07:45">7:45am</option>
                                                            <option value="07:50">7:50am</option>
                                                            <option value="07:55">7:55am</option>
                                                            <option value="08:00">8:00am</option>
                                                            <option value="08:05">8:05am</option>
                                                            <option value="08:10">8:10am</option>
                                                            <option value="08:15">8:15am</option>
                                                            <option value="08:20">8:20am</option>
                                                            <option value="08:25">8:25am</option>
                                                            <option value="08:30">8:30am</option>
                                                            <option value="08:35">8:35am</option>
                                                            <option value="08:40">8:40am</option>
                                                            <option value="08:45">8:45am</option>
                                                            <option value="08:50">8:50am</option>
                                                            <option value="08:55">8:55am</option>
                                                            <option value="09:00">9:00am</option>
                                                            <option value="09:05">9:05am</option>
                                                            <option value="09:10">9:10am</option>
                                                            <option value="09:15">9:15am</option>
                                                            <option value="09:20">9:20am</option>
                                                            <option value="09:25">9:25am</option>
                                                            <option value="09:30">9:30am</option>
                                                            <option value="09:35">9:35am</option>
                                                            <option value="09:40">9:40am</option>
                                                            <option value="09:45">9:45am</option>
                                                            <option value="09:50">9:50am</option>
                                                            <option value="09:55">9:55am</option>
                                                            <option value="10:00">10:00am</option>
                                                            <option value="10:05">10:05am</option>
                                                            <option value="10:10">10:10am</option>
                                                            <option value="10:15">10:15am</option>
                                                            <option value="10:20">10:20am</option>
                                                            <option value="10:25">10:25am</option>
                                                            <option value="10:30">10:30am</option>
                                                            <option value="10:35">10:35am</option>
                                                            <option value="10:40">10:40am</option>
                                                            <option value="10:45">10:45am</option>
                                                            <option value="10:50">10:50am</option>
                                                            <option value="10:55">10:55am</option>
                                                            <option value="11:00">11:00am</option>
                                                            <option value="11:05">11:05am</option>
                                                            <option value="11:10">11:10am</option>
                                                            <option value="11:15">11:15am</option>
                                                            <option value="11:20">11:20am</option>
                                                            <option value="11:25">11:25am</option>
                                                            <option value="11:30">11:30am</option>
                                                            <option value="11:35">11:35am</option>
                                                            <option value="11:40">11:40am</option>
                                                            <option value="11:45">11:45am</option>
                                                            <option value="11:50">11:50am</option>
                                                            <option value="11:55">11:55am</option>
                                                            <option value="12:00">12:00pm</option>
                                                            <option value="12:05">12:05pm</option>
                                                            <option value="12:10">12:10pm</option>
                                                            <option value="12:15">12:15pm</option>
                                                            <option value="12:20">12:20pm</option>
                                                            <option value="12:25">12:25pm</option>
                                                            <option value="12:30">12:30pm</option>
                                                            <option value="12:35">12:35pm</option>
                                                            <option value="12:40">12:40pm</option>
                                                            <option value="12:45">12:45pm</option>
                                                            <option value="12:50">12:50pm</option>
                                                            <option value="12:55">12:55pm</option>
                                                            <option value="13:00">1:00pm</option>
                                                            <option value="13:05">1:05pm</option>
                                                            <option value="13:10">1:10pm</option>
                                                            <option value="13:15">1:15pm</option>
                                                            <option value="13:20">1:20pm</option>
                                                            <option value="13:25">1:25pm</option>
                                                            <option value="13:30">1:30pm</option>
                                                            <option value="13:35">1:35pm</option>
                                                            <option value="13:40">1:40pm</option>
                                                            <option value="13:45">1:45pm</option>
                                                            <option value="13:50">1:50pm</option>
                                                            <option value="13:55">1:55pm</option>
                                                            <option value="14:00">2:00pm</option>
                                                            <option value="14:05">2:05pm</option>
                                                            <option value="14:10">2:10pm</option>
                                                            <option value="14:15">2:15pm</option>
                                                            <option value="14:20">2:20pm</option>
                                                            <option value="14:25">2:25pm</option>
                                                            <option value="14:30">2:30pm</option>
                                                            <option value="14:35">2:35pm</option>
                                                            <option value="14:40">2:40pm</option>
                                                            <option value="14:45">2:45pm</option>
                                                            <option value="14:50">2:50pm</option>
                                                            <option value="14:55">2:55pm</option>
                                                            <option value="15:00">3:00pm</option>
                                                            <option value="15:05">3:05pm</option>
                                                            <option value="15:10">3:10pm</option>
                                                            <option value="15:15">3:15pm</option>
                                                            <option value="15:20">3:20pm</option>
                                                            <option value="15:25">3:25pm</option>
                                                            <option value="15:30">3:30pm</option>
                                                            <option value="15:35">3:35pm</option>
                                                            <option value="15:40">3:40pm</option>
                                                            <option value="15:45">3:45pm</option>
                                                            <option value="15:50">3:50pm</option>
                                                            <option value="15:55">3:55pm</option>
                                                            <option value="16:00">4:00pm</option>
                                                            <option value="16:05">4:05pm</option>
                                                            <option value="16:10">4:10pm</option>
                                                            <option value="16:15">4:15pm</option>
                                                            <option value="16:20">4:20pm</option>
                                                            <option value="16:25">4:25pm</option>
                                                            <option value="16:30">4:30pm</option>
                                                            <option value="16:35">4:35pm</option>
                                                            <option value="16:40">4:40pm</option>
                                                            <option value="16:45">4:45pm</option>
                                                            <option value="16:50">4:50pm</option>
                                                            <option value="16:55">4:55pm</option>
                                                            <option value="17:00">5:00pm</option>
                                                            <option value="17:05">5:05pm</option>
                                                            <option value="17:10">5:10pm</option>
                                                            <option value="17:15">5:15pm</option>
                                                            <option value="17:20">5:20pm</option>
                                                            <option value="17:25">5:25pm</option>
                                                            <option value="17:30">5:30pm</option>
                                                            <option value="17:35">5:35pm</option>
                                                            <option value="17:40">5:40pm</option>
                                                            <option value="17:45">5:45pm</option>
                                                            <option value="17:50">5:50pm</option>
                                                            <option value="17:55">5:55pm</option>
                                                            <option value="18:00">6:00pm</option>
                                                            <option value="18:05">6:05pm</option>
                                                            <option value="18:10">6:10pm</option>
                                                            <option value="18:15">6:15pm</option>
                                                            <option value="18:20">6:20pm</option>
                                                            <option value="18:25">6:25pm</option>
                                                            <option value="18:30">6:30pm</option>
                                                            <option value="18:35">6:35pm</option>
                                                            <option value="18:40">6:40pm</option>
                                                            <option value="18:45">6:45pm</option>
                                                            <option value="18:50">6:50pm</option>
                                                            <option value="18:55">6:55pm</option>
                                                            <option value="19:00">7:00pm</option>
                                                            <option value="19:05">7:05pm</option>
                                                            <option value="19:10">7:10pm</option>
                                                            <option value="19:15">7:15pm</option>
                                                            <option value="19:20">7:20pm</option>
                                                            <option value="19:25">7:25pm</option>
                                                            <option value="19:30">7:30pm</option>
                                                            <option value="19:35">7:35pm</option>
                                                            <option value="19:40">7:40pm</option>
                                                            <option value="19:45">7:45pm</option>
                                                            <option value="19:50">7:50pm</option>
                                                            <option value="19:55">7:55pm</option>
                                                            <option value="20:00">8:00pm</option>
                                                            <option value="20:05">8:05pm</option>
                                                            <option value="20:10">8:10pm</option>
                                                            <option value="20:15">8:15pm</option>
                                                            <option value="20:20">8:20pm</option>
                                                            <option value="20:25">8:25pm</option>
                                                            <option value="20:30">8:30pm</option>
                                                            <option value="20:35">8:35pm</option>
                                                            <option value="20:40">8:40pm</option>
                                                            <option value="20:45">8:45pm</option>
                                                            <option value="20:50">8:50pm</option>
                                                            <option value="20:55">8:55pm</option>
                                                            <option value="21:00">9:00pm</option>
                                                            <option value="21:05">9:05pm</option>
                                                            <option value="21:10">9:10pm</option>
                                                            <option value="21:15">9:15pm</option>
                                                            <option value="21:20">9:20pm</option>
                                                            <option value="21:25">9:25pm</option>
                                                            <option value="21:30">9:30pm</option>
                                                            <option value="21:35">9:35pm</option>
                                                            <option value="21:40">9:40pm</option>
                                                            <option value="21:45">9:45pm</option>
                                                            <option value="21:50">9:50pm</option>
                                                            <option value="21:55">9:55pm</option>
                                                            <option value="22:00">10:00pm</option>
                                                            <option value="22:05">10:05pm</option>
                                                            <option value="22:10">10:10pm</option>
                                                            <option value="22:15">10:15pm</option>
                                                            <option value="22:20">10:20pm</option>
                                                            <option value="22:25">10:25pm</option>
                                                            <option value="22:30">10:30pm</option>
                                                            <option value="22:35">10:35pm</option>
                                                            <option value="22:40">10:40pm</option>
                                                            <option value="22:45">10:45pm</option>
                                                            <option value="22:50">10:50pm</option>
                                                            <option value="22:55">10:55pm</option>
                                                            <option value="23:00">11:00pm</option>
                                                            <option value="23:05">11:05pm</option>
                                                            <option value="23:10">11:10pm</option>
                                                            <option value="23:15">11:15pm</option>
                                                            <option value="23:20">11:20pm</option>
                                                            <option value="23:25">11:25pm</option>
                                                            <option value="23:30">11:30pm</option>
                                                            <option value="23:35">11:35pm</option>
                                                            <option value="23:40">11:40pm</option>
                                                            <option value="23:45">11:45pm</option>
                                                            <option value="23:50">11:50pm</option>
                                                            <option value="23:55">11:55pm</option>
                                                         </select>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-xs-6 no-padding col-sm-4">
                                                   <div class="disabled form-group service-booking-start-time">
                                                      <div class="select-wrapper with-remove-group">
                                                          <select label="false" class="select optional disabled form-control js-select-duration attached-field-last" selected="selected" include_blank="false" disabled="disabled" name="booking[duration_value]" id="booking_duration_value" required="required">
                                                            <option value="5">5min</option>
                                                            <option value="10">10min</option>
                                                            <option value="15">15min</option>
                                                            <option value="20">20min</option>
                                                            <option value="25">25min</option>
                                                            <option value="30">30min</option>
                                                            <option value="35">35min</option>
                                                            <option value="40">40min</option>
                                                            <option value="45">45min</option>
                                                            <option value="50">50min</option>
                                                            <option value="55">55min</option>
                                                            <option value="60">1h</option>
                                                            <option value="65">1h 5min</option>
                                                            <option value="70">1h 10min</option>
                                                            <option value="75">1h 15min</option>
                                                            <option value="80">1h 20min</option>
                                                            <option value="85">1h 25min</option>
                                                            <option value="90">1h 30min</option>
                                                            <option value="95">1h 35min</option>
                                                            <option value="100">1h 40min</option>
                                                            <option value="105">1h 45min</option>
                                                            <option value="110">1h 50min</option>
                                                            <option value="115">1h 55min</option>
                                                            <option value="120">2h</option>
                                                            <option value="135">2h 15min</option>
                                                            <option value="150">2h 30min</option>
                                                            <option value="165">2h 45min</option>
                                                            <option value="180">3h</option>
                                                            <option value="195">3h 15min</option>
                                                            <option value="210">3h 30min</option>
                                                            <option value="225">3h 45min</option>
                                                            <option value="240">4h</option>
                                                            <option value="270">4h 30min</option>
                                                            <option value="300">5h</option>
                                                            <option value="330">5h 30min</option>
                                                            <option value="360">6h</option>
                                                            <option value="390">6h 30min</option>
                                                            <option value="420">7h</option>
                                                            <option value="450">7h 30min</option>
                                                            <option value="480">8h</option>
                                                            <option value="540">9h</option>
                                                            <option value="600">10h</option>
                                                            <option value="660">11h</option>
                                                            <option value="720">12h</option>
                                                         </select>
                                                      </div>
                                                      <i class="icon-trash remove-attached-group"></i>
                                                   </div>
                                                </div>
                                             </div>
<!--                                             <div class="row extra-time m-b-20" style="display: none;">
                                                <div class="col-sm-8 col-xs-6 no-padding">
                                                   <div class="js-extra-time-type-text form-control"></div>
                                                   <div class="form-group hidden booking_extra_time_type"><input class="hidden js-extra-time-type form-control" type="hidden" name="booking[extra_time_type]" id="booking_extra_time_type" value=""></div>
                                                </div>
                                                <div class="col-sm-4 col-xs-6 no-padding">
                                                   <div class="form-group service-booking-duration attached-field-last">
                                                      <div class="select-wrapper with-remove-group">
                                                         <select label="Duration" include_blank="false" class="select optional form-control js-extra-time-duration attached-field-last" name="booking[extra_time_in_seconds]" id="booking_extra_time_in_seconds">
                                                            <option value="300">5min</option>
                                                            <option value="600">10min</option>
                                                            <option value="900">15min</option>
                                                            <option value="1200">20min</option>
                                                            <option value="1500">25min</option>
                                                            <option value="1800">30min</option>
                                                            <option value="2100">35min</option>
                                                            <option value="2400">40min</option>
                                                            <option value="2700">45min</option>
                                                            <option value="3000">50min</option>
                                                            <option value="3300">55min</option>
                                                            <option value="3600">1h</option>
                                                            <option value="3900">1h 5min</option>
                                                            <option value="4200">1h 10min</option>
                                                            <option value="4500">1h 15min</option>
                                                            <option value="4800">1h 20min</option>
                                                            <option value="5100">1h 25min</option>
                                                            <option value="5400">1h 30min</option>
                                                            <option value="5700">1h 35min</option>
                                                            <option value="6000">1h 40min</option>
                                                            <option value="6300">1h 45min</option>
                                                            <option value="6600">1h 50min</option>
                                                            <option value="6900">1h 55min</option>
                                                            <option value="7200">2h</option>
                                                            <option value="8100">2h 15min</option>
                                                            <option value="9000">2h 30min</option>
                                                            <option value="9900">2h 45min</option>
                                                            <option value="10800">3h</option>
                                                            <option value="11700">3h 15min</option>
                                                            <option value="12600">3h 30min</option>
                                                            <option value="13500">3h 45min</option>
                                                            <option value="14400">4h</option>
                                                            <option value="16200">4h 30min</option>
                                                            <option value="18000">5h</option>
                                                            <option value="19800">5h 30min</option>
                                                            <option value="21600">6h</option>
                                                            <option value="23400">6h 30min</option>
                                                            <option value="25200">7h</option>
                                                            <option value="27000">7h 30min</option>
                                                            <option value="28800">8h</option>
                                                            <option value="32400">9h</option>
                                                            <option value="36000">10h</option>
                                                            <option value="39600">11h</option>
                                                            <option value="43200">12h</option>
                                                         </select>
                                                      </div>
                                                      <a wrapper_class="related-booking" class="text-muted js-remove-extra-time remove-attached-group" href="#"><i class="s-icon-close"></i>
                                                      </a>
                                                   </div>
                                                </div>
                                             </div>-->
                                          </div>
                                       </div>
<!--                                       <a class="js-add-related-booking btn btn-default sm-m-t-20" href="#"><i class="s-icon-plus-thin fs-12"></i> Add more services </a>-->
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <span class="totals-container js-totals-container m-r-10 sm-m-b-10" style="display: none;">
                        Total:
                        <span class="js-total-time">-</span><span>,</span><span></span>
                        <span class="js-total-price">-</span>
                        </span>
                        <button aria-hidden="true" class="btn btn-default" data-dismiss="modal" type="button">
                        Close
                        </button>
                        <button class="btn btn-success" data-submit-booking="">
                        Save
                        </button>
                     </div>
                  </form>
               </div>
            </div>
<!--            <div class="tab-pane" id="block-time">
               <div class="m-t-20 sm-no-margin">
                  <form novalidate="novalidate" class="simple_form new_employee_blocked_time" id="new_employee_blocked_time" action="/employee_blocked_times" accept-charset="UTF-8" data-remote="true" method="post">
                     <input name="utf8" type="hidden" value="✓">
                     <div class="modal-body sm-padding-10 sm-no-margin">
                        <div class="row">
                           <div class="col-lg-6 col-md-6 sm-p-t-10 left-modal-column-md">
                              <input class="hidden" type="hidden" value="2017-01-20" name="calendar[date]" id="calendar_date"><input class="hidden" type="hidden" value="week" name="calendar[view]" id="calendar_view"><input class="hidden" type="hidden" value="employee" name="calendar[resource]" id="calendar_resource"><input class="hidden" type="hidden" value="45628" name="calendar[location_id]" id="calendar_location_id"><input class="hidden" type="hidden" value="122704" name="calendar[employee_id]" id="calendar_employee_id"><input class="hidden" type="hidden" name="calendar[room_id]" id="calendar_room_id">
                              <div class="form-group">
                                 <label class="date required" for="employee_blocked_time_date"><abbr title="required">*</abbr> Date</label>
                                 <div class="select-wrapper">
                                    <input value="Friday, 20 Jan 2017" class="string optional readonly form-control date-input hasDatepicker" readonly="readonly" type="text" name="employee_blocked_time[date]" id="employee_blocked_time_date">
                                 </div>
                              </div>
                              <div class="form-group hidden employee_blocked_time_location_id"><input class="hidden form-control" type="hidden" value="45628" name="employee_blocked_time[location_id]" id="employee_blocked_time_location_id"></div>
                              <div class="form-group">
                                 <label class="integer required" for="employee_blocked_time_employee_id"><abbr title="required">*</abbr> Staff</label>
                                 <div class="select-wrapper">
                                    <select include_blank="Select Staff" class="select required full-width form-control" required="required" name="employee_blocked_time[employee_id]" id="employee_blocked_time_employee_id">
                                       <option value="">Select Staff</option>
                                       <option selected="selected" value="122704">dd</option>
                                       <option value="121193">raa gg</option>
                                       <option value="121109">rahul g</option>
                                       <option value="121110">Wendy Smith</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="string optional" for="employee_blocked_time_time_start_field">Start time</label>
                                       <div class="select-wrapper">
                                          <select selected="selected" class="select optional form-control" name="employee_blocked_time[time_start_field]" id="employee_blocked_time_time_start_field">
                                             <option value="12:00am">12:00am</option>
                                             <option value="12:05am">12:05am</option>
                                             <option value="12:10am">12:10am</option>
                                             <option value="12:15am">12:15am</option>
                                             <option value="12:20am">12:20am</option>
                                             <option value="12:25am">12:25am</option>
                                             <option value="12:30am">12:30am</option>
                                             <option value="12:35am">12:35am</option>
                                             <option value="12:40am">12:40am</option>
                                             <option value="12:45am">12:45am</option>
                                             <option value="12:50am">12:50am</option>
                                             <option value="12:55am">12:55am</option>
                                             <option value="1:00am">1:00am</option>
                                             <option value="1:05am">1:05am</option>
                                             <option value="1:10am">1:10am</option>
                                             <option value="1:15am">1:15am</option>
                                             <option value="1:20am">1:20am</option>
                                             <option value="1:25am">1:25am</option>
                                             <option value="1:30am">1:30am</option>
                                             <option value="1:35am">1:35am</option>
                                             <option value="1:40am">1:40am</option>
                                             <option value="1:45am">1:45am</option>
                                             <option value="1:50am">1:50am</option>
                                             <option value="1:55am">1:55am</option>
                                             <option value="2:00am">2:00am</option>
                                             <option value="2:05am">2:05am</option>
                                             <option value="2:10am">2:10am</option>
                                             <option value="2:15am">2:15am</option>
                                             <option value="2:20am">2:20am</option>
                                             <option value="2:25am">2:25am</option>
                                             <option selected="selected" value="2:30am">2:30am</option>
                                             <option value="2:35am">2:35am</option>
                                             <option value="2:40am">2:40am</option>
                                             <option value="2:45am">2:45am</option>
                                             <option value="2:50am">2:50am</option>
                                             <option value="2:55am">2:55am</option>
                                             <option value="3:00am">3:00am</option>
                                             <option value="3:05am">3:05am</option>
                                             <option value="3:10am">3:10am</option>
                                             <option value="3:15am">3:15am</option>
                                             <option value="3:20am">3:20am</option>
                                             <option value="3:25am">3:25am</option>
                                             <option value="3:30am">3:30am</option>
                                             <option value="3:35am">3:35am</option>
                                             <option value="3:40am">3:40am</option>
                                             <option value="3:45am">3:45am</option>
                                             <option value="3:50am">3:50am</option>
                                             <option value="3:55am">3:55am</option>
                                             <option value="4:00am">4:00am</option>
                                             <option value="4:05am">4:05am</option>
                                             <option value="4:10am">4:10am</option>
                                             <option value="4:15am">4:15am</option>
                                             <option value="4:20am">4:20am</option>
                                             <option value="4:25am">4:25am</option>
                                             <option value="4:30am">4:30am</option>
                                             <option value="4:35am">4:35am</option>
                                             <option value="4:40am">4:40am</option>
                                             <option value="4:45am">4:45am</option>
                                             <option value="4:50am">4:50am</option>
                                             <option value="4:55am">4:55am</option>
                                             <option value="5:00am">5:00am</option>
                                             <option value="5:05am">5:05am</option>
                                             <option value="5:10am">5:10am</option>
                                             <option value="5:15am">5:15am</option>
                                             <option value="5:20am">5:20am</option>
                                             <option value="5:25am">5:25am</option>
                                             <option value="5:30am">5:30am</option>
                                             <option value="5:35am">5:35am</option>
                                             <option value="5:40am">5:40am</option>
                                             <option value="5:45am">5:45am</option>
                                             <option value="5:50am">5:50am</option>
                                             <option value="5:55am">5:55am</option>
                                             <option value="6:00am">6:00am</option>
                                             <option value="6:05am">6:05am</option>
                                             <option value="6:10am">6:10am</option>
                                             <option value="6:15am">6:15am</option>
                                             <option value="6:20am">6:20am</option>
                                             <option value="6:25am">6:25am</option>
                                             <option value="6:30am">6:30am</option>
                                             <option value="6:35am">6:35am</option>
                                             <option value="6:40am">6:40am</option>
                                             <option value="6:45am">6:45am</option>
                                             <option value="6:50am">6:50am</option>
                                             <option value="6:55am">6:55am</option>
                                             <option value="7:00am">7:00am</option>
                                             <option value="7:05am">7:05am</option>
                                             <option value="7:10am">7:10am</option>
                                             <option value="7:15am">7:15am</option>
                                             <option value="7:20am">7:20am</option>
                                             <option value="7:25am">7:25am</option>
                                             <option value="7:30am">7:30am</option>
                                             <option value="7:35am">7:35am</option>
                                             <option value="7:40am">7:40am</option>
                                             <option value="7:45am">7:45am</option>
                                             <option value="7:50am">7:50am</option>
                                             <option value="7:55am">7:55am</option>
                                             <option value="8:00am">8:00am</option>
                                             <option value="8:05am">8:05am</option>
                                             <option value="8:10am">8:10am</option>
                                             <option value="8:15am">8:15am</option>
                                             <option value="8:20am">8:20am</option>
                                             <option value="8:25am">8:25am</option>
                                             <option value="8:30am">8:30am</option>
                                             <option value="8:35am">8:35am</option>
                                             <option value="8:40am">8:40am</option>
                                             <option value="8:45am">8:45am</option>
                                             <option value="8:50am">8:50am</option>
                                             <option value="8:55am">8:55am</option>
                                             <option value="9:00am">9:00am</option>
                                             <option value="9:05am">9:05am</option>
                                             <option value="9:10am">9:10am</option>
                                             <option value="9:15am">9:15am</option>
                                             <option value="9:20am">9:20am</option>
                                             <option value="9:25am">9:25am</option>
                                             <option value="9:30am">9:30am</option>
                                             <option value="9:35am">9:35am</option>
                                             <option value="9:40am">9:40am</option>
                                             <option value="9:45am">9:45am</option>
                                             <option value="9:50am">9:50am</option>
                                             <option value="9:55am">9:55am</option>
                                             <option value="10:00am">10:00am</option>
                                             <option value="10:05am">10:05am</option>
                                             <option value="10:10am">10:10am</option>
                                             <option value="10:15am">10:15am</option>
                                             <option value="10:20am">10:20am</option>
                                             <option value="10:25am">10:25am</option>
                                             <option value="10:30am">10:30am</option>
                                             <option value="10:35am">10:35am</option>
                                             <option value="10:40am">10:40am</option>
                                             <option value="10:45am">10:45am</option>
                                             <option value="10:50am">10:50am</option>
                                             <option value="10:55am">10:55am</option>
                                             <option value="11:00am">11:00am</option>
                                             <option value="11:05am">11:05am</option>
                                             <option value="11:10am">11:10am</option>
                                             <option value="11:15am">11:15am</option>
                                             <option value="11:20am">11:20am</option>
                                             <option value="11:25am">11:25am</option>
                                             <option value="11:30am">11:30am</option>
                                             <option value="11:35am">11:35am</option>
                                             <option value="11:40am">11:40am</option>
                                             <option value="11:45am">11:45am</option>
                                             <option value="11:50am">11:50am</option>
                                             <option value="11:55am">11:55am</option>
                                             <option value="12:00pm">12:00pm</option>
                                             <option value="12:05pm">12:05pm</option>
                                             <option value="12:10pm">12:10pm</option>
                                             <option value="12:15pm">12:15pm</option>
                                             <option value="12:20pm">12:20pm</option>
                                             <option value="12:25pm">12:25pm</option>
                                             <option value="12:30pm">12:30pm</option>
                                             <option value="12:35pm">12:35pm</option>
                                             <option value="12:40pm">12:40pm</option>
                                             <option value="12:45pm">12:45pm</option>
                                             <option value="12:50pm">12:50pm</option>
                                             <option value="12:55pm">12:55pm</option>
                                             <option value="1:00pm">1:00pm</option>
                                             <option value="1:05pm">1:05pm</option>
                                             <option value="1:10pm">1:10pm</option>
                                             <option value="1:15pm">1:15pm</option>
                                             <option value="1:20pm">1:20pm</option>
                                             <option value="1:25pm">1:25pm</option>
                                             <option value="1:30pm">1:30pm</option>
                                             <option value="1:35pm">1:35pm</option>
                                             <option value="1:40pm">1:40pm</option>
                                             <option value="1:45pm">1:45pm</option>
                                             <option value="1:50pm">1:50pm</option>
                                             <option value="1:55pm">1:55pm</option>
                                             <option value="2:00pm">2:00pm</option>
                                             <option value="2:05pm">2:05pm</option>
                                             <option value="2:10pm">2:10pm</option>
                                             <option value="2:15pm">2:15pm</option>
                                             <option value="2:20pm">2:20pm</option>
                                             <option value="2:25pm">2:25pm</option>
                                             <option value="2:30pm">2:30pm</option>
                                             <option value="2:35pm">2:35pm</option>
                                             <option value="2:40pm">2:40pm</option>
                                             <option value="2:45pm">2:45pm</option>
                                             <option value="2:50pm">2:50pm</option>
                                             <option value="2:55pm">2:55pm</option>
                                             <option value="3:00pm">3:00pm</option>
                                             <option value="3:05pm">3:05pm</option>
                                             <option value="3:10pm">3:10pm</option>
                                             <option value="3:15pm">3:15pm</option>
                                             <option value="3:20pm">3:20pm</option>
                                             <option value="3:25pm">3:25pm</option>
                                             <option value="3:30pm">3:30pm</option>
                                             <option value="3:35pm">3:35pm</option>
                                             <option value="3:40pm">3:40pm</option>
                                             <option value="3:45pm">3:45pm</option>
                                             <option value="3:50pm">3:50pm</option>
                                             <option value="3:55pm">3:55pm</option>
                                             <option value="4:00pm">4:00pm</option>
                                             <option value="4:05pm">4:05pm</option>
                                             <option value="4:10pm">4:10pm</option>
                                             <option value="4:15pm">4:15pm</option>
                                             <option value="4:20pm">4:20pm</option>
                                             <option value="4:25pm">4:25pm</option>
                                             <option value="4:30pm">4:30pm</option>
                                             <option value="4:35pm">4:35pm</option>
                                             <option value="4:40pm">4:40pm</option>
                                             <option value="4:45pm">4:45pm</option>
                                             <option value="4:50pm">4:50pm</option>
                                             <option value="4:55pm">4:55pm</option>
                                             <option value="5:00pm">5:00pm</option>
                                             <option value="5:05pm">5:05pm</option>
                                             <option value="5:10pm">5:10pm</option>
                                             <option value="5:15pm">5:15pm</option>
                                             <option value="5:20pm">5:20pm</option>
                                             <option value="5:25pm">5:25pm</option>
                                             <option value="5:30pm">5:30pm</option>
                                             <option value="5:35pm">5:35pm</option>
                                             <option value="5:40pm">5:40pm</option>
                                             <option value="5:45pm">5:45pm</option>
                                             <option value="5:50pm">5:50pm</option>
                                             <option value="5:55pm">5:55pm</option>
                                             <option value="6:00pm">6:00pm</option>
                                             <option value="6:05pm">6:05pm</option>
                                             <option value="6:10pm">6:10pm</option>
                                             <option value="6:15pm">6:15pm</option>
                                             <option value="6:20pm">6:20pm</option>
                                             <option value="6:25pm">6:25pm</option>
                                             <option value="6:30pm">6:30pm</option>
                                             <option value="6:35pm">6:35pm</option>
                                             <option value="6:40pm">6:40pm</option>
                                             <option value="6:45pm">6:45pm</option>
                                             <option value="6:50pm">6:50pm</option>
                                             <option value="6:55pm">6:55pm</option>
                                             <option value="7:00pm">7:00pm</option>
                                             <option value="7:05pm">7:05pm</option>
                                             <option value="7:10pm">7:10pm</option>
                                             <option value="7:15pm">7:15pm</option>
                                             <option value="7:20pm">7:20pm</option>
                                             <option value="7:25pm">7:25pm</option>
                                             <option value="7:30pm">7:30pm</option>
                                             <option value="7:35pm">7:35pm</option>
                                             <option value="7:40pm">7:40pm</option>
                                             <option value="7:45pm">7:45pm</option>
                                             <option value="7:50pm">7:50pm</option>
                                             <option value="7:55pm">7:55pm</option>
                                             <option value="8:00pm">8:00pm</option>
                                             <option value="8:05pm">8:05pm</option>
                                             <option value="8:10pm">8:10pm</option>
                                             <option value="8:15pm">8:15pm</option>
                                             <option value="8:20pm">8:20pm</option>
                                             <option value="8:25pm">8:25pm</option>
                                             <option value="8:30pm">8:30pm</option>
                                             <option value="8:35pm">8:35pm</option>
                                             <option value="8:40pm">8:40pm</option>
                                             <option value="8:45pm">8:45pm</option>
                                             <option value="8:50pm">8:50pm</option>
                                             <option value="8:55pm">8:55pm</option>
                                             <option value="9:00pm">9:00pm</option>
                                             <option value="9:05pm">9:05pm</option>
                                             <option value="9:10pm">9:10pm</option>
                                             <option value="9:15pm">9:15pm</option>
                                             <option value="9:20pm">9:20pm</option>
                                             <option value="9:25pm">9:25pm</option>
                                             <option value="9:30pm">9:30pm</option>
                                             <option value="9:35pm">9:35pm</option>
                                             <option value="9:40pm">9:40pm</option>
                                             <option value="9:45pm">9:45pm</option>
                                             <option value="9:50pm">9:50pm</option>
                                             <option value="9:55pm">9:55pm</option>
                                             <option value="10:00pm">10:00pm</option>
                                             <option value="10:05pm">10:05pm</option>
                                             <option value="10:10pm">10:10pm</option>
                                             <option value="10:15pm">10:15pm</option>
                                             <option value="10:20pm">10:20pm</option>
                                             <option value="10:25pm">10:25pm</option>
                                             <option value="10:30pm">10:30pm</option>
                                             <option value="10:35pm">10:35pm</option>
                                             <option value="10:40pm">10:40pm</option>
                                             <option value="10:45pm">10:45pm</option>
                                             <option value="10:50pm">10:50pm</option>
                                             <option value="10:55pm">10:55pm</option>
                                             <option value="11:00pm">11:00pm</option>
                                             <option value="11:05pm">11:05pm</option>
                                             <option value="11:10pm">11:10pm</option>
                                             <option value="11:15pm">11:15pm</option>
                                             <option value="11:20pm">11:20pm</option>
                                             <option value="11:25pm">11:25pm</option>
                                             <option value="11:30pm">11:30pm</option>
                                             <option value="11:35pm">11:35pm</option>
                                             <option value="11:40pm">11:40pm</option>
                                             <option value="11:45pm">11:45pm</option>
                                             <option value="11:50pm">11:50pm</option>
                                             <option value="11:55pm">11:55pm</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="string optional" for="employee_blocked_time_time_end_field">End time</label>
                                       <div class="select-wrapper">
                                          <select selected="selected" class="select optional form-control" name="employee_blocked_time[time_end_field]" id="employee_blocked_time_time_end_field">
                                             <option value="12:00am">12:00am</option>
                                             <option value="12:05am">12:05am</option>
                                             <option value="12:10am">12:10am</option>
                                             <option value="12:15am">12:15am</option>
                                             <option value="12:20am">12:20am</option>
                                             <option value="12:25am">12:25am</option>
                                             <option value="12:30am">12:30am</option>
                                             <option value="12:35am">12:35am</option>
                                             <option value="12:40am">12:40am</option>
                                             <option value="12:45am">12:45am</option>
                                             <option value="12:50am">12:50am</option>
                                             <option value="12:55am">12:55am</option>
                                             <option value="1:00am">1:00am</option>
                                             <option value="1:05am">1:05am</option>
                                             <option value="1:10am">1:10am</option>
                                             <option value="1:15am">1:15am</option>
                                             <option value="1:20am">1:20am</option>
                                             <option value="1:25am">1:25am</option>
                                             <option value="1:30am">1:30am</option>
                                             <option value="1:35am">1:35am</option>
                                             <option value="1:40am">1:40am</option>
                                             <option value="1:45am">1:45am</option>
                                             <option value="1:50am">1:50am</option>
                                             <option value="1:55am">1:55am</option>
                                             <option value="2:00am">2:00am</option>
                                             <option value="2:05am">2:05am</option>
                                             <option value="2:10am">2:10am</option>
                                             <option value="2:15am">2:15am</option>
                                             <option value="2:20am">2:20am</option>
                                             <option value="2:25am">2:25am</option>
                                             <option value="2:30am">2:30am</option>
                                             <option selected="selected" value="2:35am">2:35am</option>
                                             <option value="2:40am">2:40am</option>
                                             <option value="2:45am">2:45am</option>
                                             <option value="2:50am">2:50am</option>
                                             <option value="2:55am">2:55am</option>
                                             <option value="3:00am">3:00am</option>
                                             <option value="3:05am">3:05am</option>
                                             <option value="3:10am">3:10am</option>
                                             <option value="3:15am">3:15am</option>
                                             <option value="3:20am">3:20am</option>
                                             <option value="3:25am">3:25am</option>
                                             <option value="3:30am">3:30am</option>
                                             <option value="3:35am">3:35am</option>
                                             <option value="3:40am">3:40am</option>
                                             <option value="3:45am">3:45am</option>
                                             <option value="3:50am">3:50am</option>
                                             <option value="3:55am">3:55am</option>
                                             <option value="4:00am">4:00am</option>
                                             <option value="4:05am">4:05am</option>
                                             <option value="4:10am">4:10am</option>
                                             <option value="4:15am">4:15am</option>
                                             <option value="4:20am">4:20am</option>
                                             <option value="4:25am">4:25am</option>
                                             <option value="4:30am">4:30am</option>
                                             <option value="4:35am">4:35am</option>
                                             <option value="4:40am">4:40am</option>
                                             <option value="4:45am">4:45am</option>
                                             <option value="4:50am">4:50am</option>
                                             <option value="4:55am">4:55am</option>
                                             <option value="5:00am">5:00am</option>
                                             <option value="5:05am">5:05am</option>
                                             <option value="5:10am">5:10am</option>
                                             <option value="5:15am">5:15am</option>
                                             <option value="5:20am">5:20am</option>
                                             <option value="5:25am">5:25am</option>
                                             <option value="5:30am">5:30am</option>
                                             <option value="5:35am">5:35am</option>
                                             <option value="5:40am">5:40am</option>
                                             <option value="5:45am">5:45am</option>
                                             <option value="5:50am">5:50am</option>
                                             <option value="5:55am">5:55am</option>
                                             <option value="6:00am">6:00am</option>
                                             <option value="6:05am">6:05am</option>
                                             <option value="6:10am">6:10am</option>
                                             <option value="6:15am">6:15am</option>
                                             <option value="6:20am">6:20am</option>
                                             <option value="6:25am">6:25am</option>
                                             <option value="6:30am">6:30am</option>
                                             <option value="6:35am">6:35am</option>
                                             <option value="6:40am">6:40am</option>
                                             <option value="6:45am">6:45am</option>
                                             <option value="6:50am">6:50am</option>
                                             <option value="6:55am">6:55am</option>
                                             <option value="7:00am">7:00am</option>
                                             <option value="7:05am">7:05am</option>
                                             <option value="7:10am">7:10am</option>
                                             <option value="7:15am">7:15am</option>
                                             <option value="7:20am">7:20am</option>
                                             <option value="7:25am">7:25am</option>
                                             <option value="7:30am">7:30am</option>
                                             <option value="7:35am">7:35am</option>
                                             <option value="7:40am">7:40am</option>
                                             <option value="7:45am">7:45am</option>
                                             <option value="7:50am">7:50am</option>
                                             <option value="7:55am">7:55am</option>
                                             <option value="8:00am">8:00am</option>
                                             <option value="8:05am">8:05am</option>
                                             <option value="8:10am">8:10am</option>
                                             <option value="8:15am">8:15am</option>
                                             <option value="8:20am">8:20am</option>
                                             <option value="8:25am">8:25am</option>
                                             <option value="8:30am">8:30am</option>
                                             <option value="8:35am">8:35am</option>
                                             <option value="8:40am">8:40am</option>
                                             <option value="8:45am">8:45am</option>
                                             <option value="8:50am">8:50am</option>
                                             <option value="8:55am">8:55am</option>
                                             <option value="9:00am">9:00am</option>
                                             <option value="9:05am">9:05am</option>
                                             <option value="9:10am">9:10am</option>
                                             <option value="9:15am">9:15am</option>
                                             <option value="9:20am">9:20am</option>
                                             <option value="9:25am">9:25am</option>
                                             <option value="9:30am">9:30am</option>
                                             <option value="9:35am">9:35am</option>
                                             <option value="9:40am">9:40am</option>
                                             <option value="9:45am">9:45am</option>
                                             <option value="9:50am">9:50am</option>
                                             <option value="9:55am">9:55am</option>
                                             <option value="10:00am">10:00am</option>
                                             <option value="10:05am">10:05am</option>
                                             <option value="10:10am">10:10am</option>
                                             <option value="10:15am">10:15am</option>
                                             <option value="10:20am">10:20am</option>
                                             <option value="10:25am">10:25am</option>
                                             <option value="10:30am">10:30am</option>
                                             <option value="10:35am">10:35am</option>
                                             <option value="10:40am">10:40am</option>
                                             <option value="10:45am">10:45am</option>
                                             <option value="10:50am">10:50am</option>
                                             <option value="10:55am">10:55am</option>
                                             <option value="11:00am">11:00am</option>
                                             <option value="11:05am">11:05am</option>
                                             <option value="11:10am">11:10am</option>
                                             <option value="11:15am">11:15am</option>
                                             <option value="11:20am">11:20am</option>
                                             <option value="11:25am">11:25am</option>
                                             <option value="11:30am">11:30am</option>
                                             <option value="11:35am">11:35am</option>
                                             <option value="11:40am">11:40am</option>
                                             <option value="11:45am">11:45am</option>
                                             <option value="11:50am">11:50am</option>
                                             <option value="11:55am">11:55am</option>
                                             <option value="12:00pm">12:00pm</option>
                                             <option value="12:05pm">12:05pm</option>
                                             <option value="12:10pm">12:10pm</option>
                                             <option value="12:15pm">12:15pm</option>
                                             <option value="12:20pm">12:20pm</option>
                                             <option value="12:25pm">12:25pm</option>
                                             <option value="12:30pm">12:30pm</option>
                                             <option value="12:35pm">12:35pm</option>
                                             <option value="12:40pm">12:40pm</option>
                                             <option value="12:45pm">12:45pm</option>
                                             <option value="12:50pm">12:50pm</option>
                                             <option value="12:55pm">12:55pm</option>
                                             <option value="1:00pm">1:00pm</option>
                                             <option value="1:05pm">1:05pm</option>
                                             <option value="1:10pm">1:10pm</option>
                                             <option value="1:15pm">1:15pm</option>
                                             <option value="1:20pm">1:20pm</option>
                                             <option value="1:25pm">1:25pm</option>
                                             <option value="1:30pm">1:30pm</option>
                                             <option value="1:35pm">1:35pm</option>
                                             <option value="1:40pm">1:40pm</option>
                                             <option value="1:45pm">1:45pm</option>
                                             <option value="1:50pm">1:50pm</option>
                                             <option value="1:55pm">1:55pm</option>
                                             <option value="2:00pm">2:00pm</option>
                                             <option value="2:05pm">2:05pm</option>
                                             <option value="2:10pm">2:10pm</option>
                                             <option value="2:15pm">2:15pm</option>
                                             <option value="2:20pm">2:20pm</option>
                                             <option value="2:25pm">2:25pm</option>
                                             <option value="2:30pm">2:30pm</option>
                                             <option value="2:35pm">2:35pm</option>
                                             <option value="2:40pm">2:40pm</option>
                                             <option value="2:45pm">2:45pm</option>
                                             <option value="2:50pm">2:50pm</option>
                                             <option value="2:55pm">2:55pm</option>
                                             <option value="3:00pm">3:00pm</option>
                                             <option value="3:05pm">3:05pm</option>
                                             <option value="3:10pm">3:10pm</option>
                                             <option value="3:15pm">3:15pm</option>
                                             <option value="3:20pm">3:20pm</option>
                                             <option value="3:25pm">3:25pm</option>
                                             <option value="3:30pm">3:30pm</option>
                                             <option value="3:35pm">3:35pm</option>
                                             <option value="3:40pm">3:40pm</option>
                                             <option value="3:45pm">3:45pm</option>
                                             <option value="3:50pm">3:50pm</option>
                                             <option value="3:55pm">3:55pm</option>
                                             <option value="4:00pm">4:00pm</option>
                                             <option value="4:05pm">4:05pm</option>
                                             <option value="4:10pm">4:10pm</option>
                                             <option value="4:15pm">4:15pm</option>
                                             <option value="4:20pm">4:20pm</option>
                                             <option value="4:25pm">4:25pm</option>
                                             <option value="4:30pm">4:30pm</option>
                                             <option value="4:35pm">4:35pm</option>
                                             <option value="4:40pm">4:40pm</option>
                                             <option value="4:45pm">4:45pm</option>
                                             <option value="4:50pm">4:50pm</option>
                                             <option value="4:55pm">4:55pm</option>
                                             <option value="5:00pm">5:00pm</option>
                                             <option value="5:05pm">5:05pm</option>
                                             <option value="5:10pm">5:10pm</option>
                                             <option value="5:15pm">5:15pm</option>
                                             <option value="5:20pm">5:20pm</option>
                                             <option value="5:25pm">5:25pm</option>
                                             <option value="5:30pm">5:30pm</option>
                                             <option value="5:35pm">5:35pm</option>
                                             <option value="5:40pm">5:40pm</option>
                                             <option value="5:45pm">5:45pm</option>
                                             <option value="5:50pm">5:50pm</option>
                                             <option value="5:55pm">5:55pm</option>
                                             <option value="6:00pm">6:00pm</option>
                                             <option value="6:05pm">6:05pm</option>
                                             <option value="6:10pm">6:10pm</option>
                                             <option value="6:15pm">6:15pm</option>
                                             <option value="6:20pm">6:20pm</option>
                                             <option value="6:25pm">6:25pm</option>
                                             <option value="6:30pm">6:30pm</option>
                                             <option value="6:35pm">6:35pm</option>
                                             <option value="6:40pm">6:40pm</option>
                                             <option value="6:45pm">6:45pm</option>
                                             <option value="6:50pm">6:50pm</option>
                                             <option value="6:55pm">6:55pm</option>
                                             <option value="7:00pm">7:00pm</option>
                                             <option value="7:05pm">7:05pm</option>
                                             <option value="7:10pm">7:10pm</option>
                                             <option value="7:15pm">7:15pm</option>
                                             <option value="7:20pm">7:20pm</option>
                                             <option value="7:25pm">7:25pm</option>
                                             <option value="7:30pm">7:30pm</option>
                                             <option value="7:35pm">7:35pm</option>
                                             <option value="7:40pm">7:40pm</option>
                                             <option value="7:45pm">7:45pm</option>
                                             <option value="7:50pm">7:50pm</option>
                                             <option value="7:55pm">7:55pm</option>
                                             <option value="8:00pm">8:00pm</option>
                                             <option value="8:05pm">8:05pm</option>
                                             <option value="8:10pm">8:10pm</option>
                                             <option value="8:15pm">8:15pm</option>
                                             <option value="8:20pm">8:20pm</option>
                                             <option value="8:25pm">8:25pm</option>
                                             <option value="8:30pm">8:30pm</option>
                                             <option value="8:35pm">8:35pm</option>
                                             <option value="8:40pm">8:40pm</option>
                                             <option value="8:45pm">8:45pm</option>
                                             <option value="8:50pm">8:50pm</option>
                                             <option value="8:55pm">8:55pm</option>
                                             <option value="9:00pm">9:00pm</option>
                                             <option value="9:05pm">9:05pm</option>
                                             <option value="9:10pm">9:10pm</option>
                                             <option value="9:15pm">9:15pm</option>
                                             <option value="9:20pm">9:20pm</option>
                                             <option value="9:25pm">9:25pm</option>
                                             <option value="9:30pm">9:30pm</option>
                                             <option value="9:35pm">9:35pm</option>
                                             <option value="9:40pm">9:40pm</option>
                                             <option value="9:45pm">9:45pm</option>
                                             <option value="9:50pm">9:50pm</option>
                                             <option value="9:55pm">9:55pm</option>
                                             <option value="10:00pm">10:00pm</option>
                                             <option value="10:05pm">10:05pm</option>
                                             <option value="10:10pm">10:10pm</option>
                                             <option value="10:15pm">10:15pm</option>
                                             <option value="10:20pm">10:20pm</option>
                                             <option value="10:25pm">10:25pm</option>
                                             <option value="10:30pm">10:30pm</option>
                                             <option value="10:35pm">10:35pm</option>
                                             <option value="10:40pm">10:40pm</option>
                                             <option value="10:45pm">10:45pm</option>
                                             <option value="10:50pm">10:50pm</option>
                                             <option value="10:55pm">10:55pm</option>
                                             <option value="11:00pm">11:00pm</option>
                                             <option value="11:05pm">11:05pm</option>
                                             <option value="11:10pm">11:10pm</option>
                                             <option value="11:15pm">11:15pm</option>
                                             <option value="11:20pm">11:20pm</option>
                                             <option value="11:25pm">11:25pm</option>
                                             <option value="11:30pm">11:30pm</option>
                                             <option value="11:35pm">11:35pm</option>
                                             <option value="11:40pm">11:40pm</option>
                                             <option value="11:45pm">11:45pm</option>
                                             <option value="11:50pm">11:50pm</option>
                                             <option value="11:55pm">11:55pm</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6 right-modal-column-md">
                              <div class="form-group text optional employee_blocked_time_note"><label class="text optional control-label" for="employee_blocked_time_note">Description</label><textarea rows="5" class="text optional form-control" placeholder="e.g. lunch meeting" name="employee_blocked_time[note]" id="employee_blocked_time_note"></textarea></div>
                           </div>
                        </div>
                     </div>
                     <div class="modal-footer">
                        <button aria-hidden="true" class="btn btn-default" data-dismiss="modal" type="button">
                        Cancel
                        </button>
                        <button class="btn btn-success">
                        Save
                        </button>
                        <div class="pull-left"></div>
                     </div>
                  </form>
                  <script>
                     $('#employee_blocked_time_date').datepicker({
                       dateFormat: 'DD, d MM yy',
                       beforeShowDay: Shared.DateSelector.Utils.getBeforeShowDayFunction({
                         minDate: '0d',
                         timezone: app.vars.timezone
                       })
                     });
                  </script>
               </div>
            </div>-->
         </div>
      </div>
   </div>
</div>

<script>
    
    var now_time = format24with5(new Date());
    $('#booking_time_start_field').val(now_time);
    $('#booking_date').datepicker().datepicker("setDate", new Date());
    
$('#booking_customer_id').autocomplete({
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
              $("#booking_customer_id").val(ui.item.value);
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
    $("#booking_customer_id").val('');
    $('.search-container, .buttons-container, .walkin').show();
    $('.details-container, .note-container').hide();
    $('.client_label, .customer-note, .contact').html('');
    $('#walkin').val('0');
});

$('.walkin_a').click(function(){
   $('.details-container').show(); 
   $('.search-container, .walkin_a').hide();
   $('#walkin').val('1');
   $("#booking_customer_id").val('0');
});

$('#booking_service_pricing_level_id').change(function(){
    var duration = $('#booking_service_pricing_level_id option:selected').data('duration');
    $('#booking_duration_value').removeClass('disabled').prop("disabled", false).val(duration);
});

$("#new_booking").validator().on("submit", function (event) { 
    if (!event.isDefaultPrevented()) {
            event.preventDefault();
            $.ajax({
            url: g.base_url + 'calendar/addBooking',
            type: 'post',   
            dataType: 'json',
            data: $('form#new_booking').serialize(),
            success: function(data) {
                if(data.success){
                    //location.reload();
                    window.location = g.base_url + 'calendar';
                }
                else{
                    $('.alert-danger').removeClass('hide').html(data.error);
                }
              }
            });
        }
    });
    
   var appointment = <?php echo json_encode($appointment); ?>;
   if(appointment !== null) {
       
       if(appointment.clientid != '0') {
            $("#booking_customer_id").val(appointment.clientid);
            $('.search-container, .buttons-container, .walkin').hide();
            $('.details-container').show();
            $('.client_label').html(appointment.fname_c + ' ' + appointment.lname_c);
            $('.contact').html(appointment.mobile);
            if(appointment.notes) {
                $('.note-container').show();
                $('.customer-note').html(appointment.notes);
            }
            $('#walkin').val('0');       
        }
        else {
            $('#change_client').trigger("click");
            $('.walkin_a').trigger( "click" );
        }
        $('#booking_notes').val(appointment.booking_notes);
        $("#booking_date").datepicker("setDate", new Date(appointment.appointment_date));
        $('#booking_employee_id option[value="'+appointment.staff_id+'"]').attr('selected','selected');
        var appointment_time_f = getTimeinFormat(appointment.appointment_time);
        $('#booking_time_start_field option[value="'+ appointment_time_f +'"]').attr('selected','selected');
        $('#booking_service_pricing_level_id option[value="'+ appointment.service_id +'"]').attr('selected','selected');
        $('#booking_duration_value').removeClass('disabled').prop("disabled", false).val(appointment.duration);
   }
   
   var sd = <?php echo json_encode($sd); ?>;
   var st = <?php echo json_encode($st); ?>;
   if(sd !== null) {
       $('#booking_date').datepicker().datepicker("setDate", new Date(sd));
       $('#booking_time_start_field option[value="'+ st +'"]').attr('selected','selected');
   }
   
</script>