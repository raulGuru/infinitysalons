<div aria-hidden="false" aria-labelledby="modalSlideUpLabel" class="modal fill-in in" id="newEmployeesModal" role="dialog" tabindex="-1" style="display: block; padding-left: 17px;">
   <div class="modal-dialog modal-lg">
      <div class="modal-content no-border">
         <div class="modal-header clearfix text-left">
            <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
            <i class="pg-close"></i>
            </button>
            <h4 class="text-center">
               New Staff
            </h4>
         </div>
         <div class="employee_form">
            <form class="simple_form new_employee" id="new_employee">
                <input type="hidden" name="staff_id" value="<?php echo $staff['id'] ?>">
               <div class="modal-body sm-padding-10 p-t-none">
                   <div class="alert alert-danger hide"></div>
                  <ul class="nav nav-tabs nav-tabs-simple" id="employeeTab">
                     <li class="active">
                        <a data-toggle="tab" href="#general">Details</a>
                     </li>
                     <!--li class="js-when-providing-services">
                        <a data-toggle="tab" href="#locations">Locations</a>
                     </li-->
                     <li class="js-when-providing-services">
                        <a data-toggle="tab" href="#services">Services</a>
                     </li>
                     <li>
                        <a data-toggle="tab" href="#commission">Commission</a>
                     </li>
                  </ul>
                  <div class="row m-t-20">
                     <div class="col-lg-12">
                        <div class="tab-content">
                           <div class="notice"></div>
                           <div class="tab-pane active" id="general">
                              <div class="row">
                                 <div class="left-modal-column-md col-md-6" id="employee-data">
                                    <div class="row">
                                       <div class="col-sm-6">
                                           <div class="form-group string required employee_first_name"><label class="string required control-label" for="employee_first_name"><abbr title="required">*</abbr> First Name</label><input class="string required form-control" autofocus="autofocus" placeholder="e.g. Jane" type="text" name="employee[first_name]" id="employee_first_name" required="required" value="<?php echo $staff['first_name'] ?>"></div>
                                       </div>
                                       <div class="col-sm-6">
                                           <div class="form-group string required employee_last_name"><label class="string required control-label" for="employee_last_name"><abbr title="required">*</abbr> Last Name</label><input class="string required form-control" placeholder="e.g. Doe" type="text" name="employee[last_name]" id="employee_last_name" value="<?php echo $staff['last_name'] ?>"></div>
                                       </div>
                                    </div>
                                    <div class="form-group string optional employee_mobile_number">
                                       <label class="string optional control-label" for="employee_mobile_number">Mobile Number</label>
                                       <div class="intl-tel-input">
                                           <input class="string optional tel-input form-control" data-default-country="in" pattern="\d*" type="text" name="employee[mobile_number]" id="employee_mobile_number" placeholder="9123456789" value="<?php echo $staff['mobile_number'] ?>" maxlength="15">
                                       </div>
                                    </div>
                                     <div class="form-group email required employee_email"><label class="email required control-label" for="employee_email"><abbr title="required">*</abbr> Email</label><input class="string email required form-control" placeholder="mail@example.com" type="email" name="employee[email]" id="employee_email" value="<?php echo $staff['email'] ?>"></div>
                                    <!--div class="m-t-20 form-group">
                                       <label for="employee_role">User Permission
                                       <i class="icon-question-circle hint-icon" data-placement="bottom" data-toggle="tooltip" title="When saved, this staff member will receive email instructions to setup their own login password"></i>
                                       </label>
                                       <div class="select-wrapper">
                                          <select inline_label="true" class="select optional form-control" default="default" name="employee[role]" id="employee_role">
                                             <option selected="selected" value="none">No Access</option>
                                             <option value="low">Low</option>
                                             <option value="medium">Medium</option>
                                             <option value="high">High</option>
                                          </select>
                                       </div>
                                       <div class="help m-t-5 visible-xs">
                                          When saved, this staff member will receive email instructions to setup their own login password
                                       </div>
                                    </div-->
                                    <!--div class="m-t-20 form-group">
                                       <label for="employee_provides_services">
                                          <div class="media switchery-wrapper">
                                             <div class="media-left">
                                                <input name="employee[provides_services]" type="hidden" value="0"><input inline_label="true" class="boolean optional ios-switch-cb" type="checkbox" value="1" checked="checked" name="employee[provides_services]" id="employee_provides_services">
                                                <span class="switchery"></span>
                                             </div>
                                             <div class="media-body media-middle">
                                                Enable Appointment Bookings
                                                <i class="icon-question-circle hint-icon" data-placement="bottom" data-toggle="tooltip" title="Allows this staff member to perform client bookings on the calendar, switch off for admin staff such as receptionist"></i>
                                                <div class="visible-xs switchery__help">
                                                   Allows this staff member to perform client bookings on the calendar, switch off for admin staff such as receptionist
                                                </div>
                                             </div>
                                          </div>
                                       </label>
                                    </div-->
                                 </div>
                                 <div class="col-md-6 right-modal-column-md employee-modal-notes" id="employee-notes">
                                    <div class="form-group text optional employee_notes"><label class="text optional control-label" for="employee_notes">Notes</label><textarea rows="12" class="text optional employee-modal-note form-control" placeholder="Add private notes viewable in staff settings only (optional)" name="employee[notes]" id="employee_notes"></textarea></div>
                                    <div class="row">
                                       <div class="col-sm-6 sm-m-b-20">
                                          <div class="form-group no-padding select no-margin middle-item">
                                             <label class="date optional" for="employee_employment_start_date">Employment start date</label>
                                             <div class="select-wrapper">
                                                 <input class="string optional date-input form-control js-employment-start-date isDatepicker" value="" placeholder="Select date" type="text" name="employee[employment_start_date]" id="employee_employment_start_date">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-6">
                                          <div class="form-group no-padding select no-margin middle-item">
                                             <label class="date optional" for="employee_employment_end_date">Employment end date</label>
                                             <div class="select-wrapper relative">
                                                 <input class="string optional date-input form-control js-employment-end-date isDatepicker" placeholder="Select date" type="text" name="employee[employment_end_date]" id="employee_employment_end_date" value="<?php //echo $staff['end_date'] ?>">
                                                <!--div class="reset-addon js-reset-datepicker">
                                                   <a href="#">
                                                   <i class="s-icon-close"></i>
                                                   </a>
                                                </div-->
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!--div class="tab-pane" id="locations">
                              <div class="select-all-items m-b-20">
                                 <div class="form-group">
                                    <div class="m-b-20 help">
                                       Assign locations where this staff member can be booked.
                                    </div>
                                 </div>
                                 <div class="checkbox check-success m-l-15 m-b-15">
                                    <input type="checkbox" name="all-schedulable-location-ids" id="all-schedulable-location-ids" value="1" checked="checked">
                                    <label for="all-schedulable-location-ids">Select All</label>
                                 </div>
                              </div>
                              <ul class="selection-list row">
                                 <div class="col-md-6">
                                    <li>
                                       <div class="check-this checkbox check-success">
                                          <input value="45628" class="hidden" type="hidden" name="employee[employee_location_assignments_attributes][0][location_id]" id="employee_employee_location_assignments_attributes_0_location_id">
                                          <input name="employee[employee_location_assignments_attributes][0][_destroy]" type="hidden" value="1"><input unchecked_value="1" checked_value="0" data-option-for="all-schedulable-location-ids" class="boolean optional" type="checkbox" value="0" checked="checked" name="employee[employee_location_assignments_attributes][0][_destroy]" id="employee_employee_location_assignments_attributes_0__destroy">
                                          <label for="employee_employee_location_assignments_attributes_0__destroy">ddr</label>
                                       </div>
                                    </li>
                                 </div>
                                 <div class="col-md-6">
                                    <li>
                                       <div class="check-this checkbox check-success">
                                          <input value="45593" class="hidden" type="hidden" name="employee[employee_location_assignments_attributes][1][location_id]" id="employee_employee_location_assignments_attributes_1_location_id">
                                          <input name="employee[employee_location_assignments_attributes][1][_destroy]" type="hidden" value="1"><input unchecked_value="1" checked_value="0" data-option-for="all-schedulable-location-ids" class="boolean optional" type="checkbox" value="0" checked="checked" name="employee[employee_location_assignments_attributes][1][_destroy]" id="employee_employee_location_assignments_attributes_1__destroy">
                                          <label for="employee_employee_location_assignments_attributes_1__destroy">g'ha</label>
                                       </div>
                                    </li>
                                 </div>
                              </ul>
                           </div-->
                           <div class="tab-pane" id="services">
                              <!--input type="hidden" name="employee[service_ids][]" id="employee_service_ids_" value=""-->
                              <div class="select-all-items m-b-20">
                                 <div class="form-group">
                                    <div class="m-b-20 help">
                                       Assign services this staff member can perform.
                                    </div>
                                 </div>
<!--                                 <div class="checkbox check-success m-l-15 m-b-15">
                                     <input type="checkbox" name="all-service-ids" id="all-service-ids" value="1" checked="checked" class="select-all-items">
                                    <label for="all-service-ids">Select All</label>
                                 </div>-->
                              </div>
                              <ul class="selection-list row">
                                 <div class="col-md-6">
                                     <?php
                                        if(!empty($services)) {
                                            foreach($services as $service) { ?>
                                     
                                     <li>
                                       <div class="check-this checkbox check-success">
                                           <input type="checkbox" name="employee[service_ids][]" id="employee-selection-list-<?php echo $service['service_id'] ?>" value="<?php echo $service['service_id'] ?>" <?php echo (isset($service['allowed'])) ? ($service['allowed'] == 1 ? 'checked="checked"' : '') : 'checked="checked"' ?> class="selection-list">
                                           <label for="employee-selection-list-<?php echo $service['id'] ?>"><?php echo $service['name'] ?></label>
                                       </div>
                                    </li>
                                            <?php }
                                        }
                                     ?>
                                 </div>
                              </ul>
                           </div>
                           <div class="tab-pane" id="commission">
                              <div class="row">
                                 <div class="col-md-6 left-modal-column-md">
                                    <div class="row attached-fields-md">
                                       <div class="col-md-6 col-xs-12 no-padding">
                                          <div class="form-group middle-item">
                                             <label class="decimal optional" for="employee_service_commission">Service commission</label>
                                             <div class="input-group">
                                                <span class="input-group-addon">%</span>
                                                <input step="0.01" class="numeric decimal optional form-control" placeholder="0.0" type="number" name="employee[service_commission]" id="employee_service_commission" value="<?php echo $staffservicecommision['service_commision'] ?>">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-md-6 col-xs-12 no-padding">
                                          <div class="form-group">
                                             <label class="decimal optional" for="employee_product_commission">Product commission</label>
                                             <div class="input-group">
                                                <span class="input-group-addon">%</span>
                                                <input step="0.01" class="numeric decimal optional form-control" placeholder="0.0" type="number" name="employee[product_commission]" id="employee_product_commission" value="<?php echo $staffservicecommision['product_commision'] ?>">
                                             </div>
                                          </div>
                                       </div>                                       
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button aria-hidden="" class="btn btn-default" data-dismiss="modal" type="button">Cancel</button>
                  <button class="btn btn-success">Save</button>
                  <div class="pull-left"></div>
               </div>
            </form>
         </div>
        </div>
       </div>
    </div>
</div>

<script>
    
    var staff = <?php echo json_encode($staff) ?>;
    var start_date = '';
    $( ".isDatepicker" ).datepicker();    
    if(!$.isEmptyObject(staff)) {
        start_date = staff.start_date;
        if(staff.end_date) {
            $("#employee_employment_end_date").datepicker("setDate", new Date(staff.end_date));
        }
    }
    $("#employee_employment_start_date").datepicker("setDate", new Date(start_date));
    
    
    $("#new_employee").validator().on("submit", function (event) {        
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            $.ajax({
            url: g.base_url + 'employees/add',
            type: 'post',   
            dataType: 'json',
            data: $('form#new_employee').serialize(),
            success: function(data) {
                if(data.success){
                    //location.reload();
                    window.location = g.base_url + 'employees';
                }
                else{
                    $('.alert-danger').removeClass('hide').html(data.error)
                }
              }
            });
        }
    });
                                
</script>

