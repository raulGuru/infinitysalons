<div aria-hidden="true" aria-labelledby="modalSlideUpLabel" class="modal fill-in in" id="newCustomerModal" role="dialog" tabindex="-1" style="display: block; padding-left: 17px;">
   <div class="modal-dialog modal-lg">
      <div class="modal-content no-border">
         <div class="modal-header clearfix text-left">
            <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
            <i class="pg-close"></i>
            </button>
            <h4 class="text-center">
               New
               Client
            </h4>
         </div>
         <div class="new-form">
            <form id="new_customer_new" class="simple_form new_customer">
                <input type="hidden" name="customer_id" value="<?php echo $customer['id'] ?>">
               <div class="modal-body sm-padding-10 p-t-none">
                   <div class="alert alert-danger hide"></div>
                  <ul class="nav nav-tabs nav-tabs-simple" id="customerTab">
                     <li class="active">
                        <a data-toggle="tab" href="#customerDetails">Details</a>
                     </li>
                     <li>
                        <a data-toggle="tab" href="#address">Address</a>
                     </li>
                  </ul>
                  <div class="tab-content no-padding" style="overflow: visible;">
                     <div class="alert alert-error customer-form-alerts hide"></div>
                     <div class="tab-pane active" id="customerDetails">
                        <div class="row m-t-20">
                           <div class="col-lg-6 col-md-6 left-modal-column-md">
                              <div class="row">
                                 <div class="col-sm-6">
                                     <div class="form-group string required customer_first_name"><label class="string required control-label" for="customer_first_name"><abbr title="required">*</abbr> First name</label><input class="string required form-control" autofocus="autofocus" placeholder="e.g. John" type="text" name="customer[first_name]" id="customer_first_name" required="required" value="<?php echo $customer['firstname'] ?>"></div>
                                 </div>
                                 <div class="col-sm-6">
                                    <div class="form-group string optional customer_last_name"><label class="string optional control-label" for="customer_last_name">Last name</label><input class="string optional form-control" placeholder="e.g. Doe" type="text" name="customer[last_name]" id="customer_last_name" value="<?php echo $customer['lastname'] ?>"></div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-6">
                                    <div class="form-group string optional customer_contact_numbers">
                                       <label class="string optional control-label" for="customer_contact_numbers">Mobile Number</label>
                                       <div class="intl-tel-input" style="z-index: 1000;">
                                           <input class="string optional tel-input form-control" data-default-country="in" pattern="\d*" type="text" name="customer[mobile]" id="customer_contact_numbers" placeholder="+91 91234 56789" maxlength="10" value="<?php echo $customer['mobile'] ?>">
                                          
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-sm-6">
                                    <div class="form-group tel optional customer_telephone">
                                       <label class="tel optional control-label" for="customer_telephone">Telephone</label>
                                       <div class="intl-tel-input" style="z-index: 999;">
                                           <input class="string tel optional tel-input form-control" data-default-country="in" type="tel" name="customer[telephone]" id="customer_telephone" placeholder="+91 91234 56789" maxlength="15" value="<?php echo $customer['telephone'] ?>">
                                        
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-6">
                                    <div class="form-group email optional customer_email"><label class="email optional control-label" for="customer_email">Email</label><input class="string email optional form-control" placeholder="mail@example.com" type="email" name="customer[email]" id="customer_email" value="<?php echo $customer['email'] ?>"></div>
                                 </div>
<!--                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label for="customer_notification_settings">Send notifications by</label>
                                       <div class="select-wrapper">
                                          <select include_blank="false" class="select optional full-width form-control" name="customer[notification_settings]" id="customer_notification_settings">
                                             <option value="none">Don't send notifications</option>
                                             <option value="email">Email</option>
                                             <option value="sms">SMS</option>
                                             <option selected="selected" value="both">Email and SMS</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>-->
                              </div>
                              <div class="form-group">
                                 <label class="string optional" for="customer_referral_source">Referral source</label>
                                 <div class="select-wrapper">
                                    <select class="select required full-width form-control" include_blank="Select source" name="customer[referral_id]" id="customer_referral_source_id">
                                       <option value="">Select source</option>
                                       <option value="1" selected="selected">Walk-In</option>
                                    </select>
                                 </div>
                              </div>
                              <div id="serviceGender">
                                 <div class="form-group no-margin">
                                     <span class="radio radio-success inline no-margin md-m-b-10"><input type="radio" value="m" name="customer[gender]" id="customer_gender_male" <?php echo ($customer['gender'] == 'm') ? "checked='checked'" : '' ?>><label class="collection_radio_buttons" for="customer_gender_male">Male</label></span><span class="radio radio-success inline no-margin md-m-b-10"><input type="radio" <?php echo ($customer['gender'] == 'f') ? "checked='checked'" : '' ?> value="f" name="customer[gender]" id="customer_gender_female"><label class="collection_radio_buttons" for="customer_gender_female" >Female</label></span>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-6 col-md-6 right-modal-column-md">
                              <div class="form-group text optional customer_text m-b-none"><label class="text optional control-label" for="customer_text">Client Notes</label><textarea rows="10" class="text optional form-control" placeholder="Add notes viewable by staff only (optional)" name="customer[notes]" id="customer_text"><?php echo $customer['notes'] ?></textarea></div>
<!--                              <div class="form-group boolean optional customer_display_on_all">
                                 <div class="checkbox check-success"><input name="customer[display_on_all]" type="hidden" value="0"><input class="boolean optional" type="checkbox" value="1" name="customer[display_on_all]" id="customer_display_on_all" disabled=""><label class="boolean optional" for="customer_display_on_all">Display on all bookings</label></div>
                              </div>-->
                              <div class="birthday customer_birthday form-group">
                                 <label class="block">
                                 <span class="translation_missing" title="translation missing: en.customers.form.lables.birthday">Birthday</span>
                                 </label>
                                 <div class="row attached-fields">
                                    <div class="col-xs-4 no-padding">
                                        <div class="select-wrapper">
                                            <input class="string optional date-input form-control" value="" placeholder="Select date" type="text" name="customer[birthday]" id="customer_birthday">
                                        </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane" id="address">
                        <div class="row m-t-20">
                           <div class="col-lg-6">
                               <div class="form-group text optional customer_address"><label class="text optional control-label" for="customer_address">Address</label><textarea rows="1" class="text optional form-control" placeholder="e.g. 12 Main Street" name="customer[address]" id="customer_address"><?php echo $customer['address'] ?></textarea></div>
                              <div class="form-group string optional customer_area"><label class="string optional control-label" for="customer_area">Suburb</label><input class="string optional form-control" type="text" name="customer[area]" id="customer_area" value="<?php echo $customer['area'] ?>"></div>
                              <div class="form-group string optional customer_city"><label class="string optional control-label" for="customer_city">City</label><input class="string optional form-control" type="text" name="customer[city]" id="customer_city" value="<?php echo $customer['city'] ?>"></div>
                              <div class="form-group string optional customer_state"><label class="string optional control-label" for="customer_state">State</label><input class="string optional form-control" type="text" name="customer[state]" id="customer_state" value="<?php echo $customer['state'] ?>"></div>
                              <div class="m-b-none form-group string optional customer_post_code"><label class="string optional control-label" for="customer_post_code">ZIP / Post Code</label><input class="string optional form-control" type="text" name="customer[post_code]" id="customer_post_code" pattern="\d*" value="<?php echo $customer['postcode'] ?>"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button aria-hidden="" class="btn btn-default" data-dismiss="modal" type="button">
                  Cancel
                  </button>
                  <button class="btn btn-success save-button">
                  Save
                  </button>
                  <?php if(!empty($customer['id'])) { ?>
                        <div class="pull-left">
                            <a id="delete-customer" class="btn btn-danger" href="javascript:void(0);" data-id="<?php echo $customer['id']; ?>">Delete</a>
                        </div>
                  <?php } ?>
                  
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<script>
    
    $( "#customer_birthday" ).datepicker({ maxDate: new Date() });
    var customer = <?php echo json_encode($customer) ?>;
    if(!$.isEmptyObject(customer)) {
        if(customer.birthday != null)
            $("#customer_birthday").datepicker("setDate", new Date(customer.birthday));
    }    

    $("#new_customer_new").validator().on("submit", function (event) {
        if (!event.isDefaultPrevented()) {
            event.preventDefault();
            $.ajax({
                url: g.base_url + 'customers/add',
                type: 'post',   
                dataType: 'json',
                data: $('form#new_customer_new').serialize(),
                success: function(data) {
                    if(data.success){
                        window.location = g.base_url + 'customers';//location.pathname;
                    }
                    else{
                        $('.alert-danger').removeClass('hide').html(data.error)
                    }
                  }
            });
        }
    });
    
    $('#delete-customer').click(function(){
        $.ajax({
            url: g.base_url + 'customers/delete',
            type: 'post',   
            dataType: 'json',
            data: { id : $(this).data('id') },
            success: function(data) {
                window.location = g.base_url + 'customers';
            }
        });
    });

</script>