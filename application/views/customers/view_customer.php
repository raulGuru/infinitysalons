
<div class="content full-height">
   <div class="container-fluid full-height no-padding">
      <div id="loading_image" style="display: none">
         <i class="icon-refresh icon-spin"></i>
         Loading...
      </div>
      <!--<div class="row fixed-toolbar" >-->
         <div class="col-xs-5">
            <h5 class="no-margin p-t-5">
               <a href="/customers"><i class="s-icon-left-arrow m-r-10"></i>
               Back
               </a>
            </h5>
         </div>
         <div class="col-xs-7">
            <div class="text-right">
               <a class="btn btn-default event-link m-r-10" data-params='{"id":"<?php echo $customer['id']; ?>"}' data-model="modal" data-modalid="newCustomerModal" href="/customers/edit">Edit</a>
               <!--<a id="delete-customer" class="btn btn-danger" href="/customers/2961321">Delete</a>-->
            </div>
         </div>
      <!--</div>-->
      <div class="row">
         <div class="col-sm-12 m-b-40 m-t-60" id="customer_container">
            <div class="panel padding-10 sm-no-padding">
               <div class="panel-body sm-m-t-10">
                  <h3 class="m-t-none">
                     test 
                  </h3>
                  <ul class="nav nav-tabs nav-tabs-simple">
                     <li class="active">
                        <a data-toggle="tab" href="#summary">Summary
                        </a>
                     </li>
                     <li>
                        <a data-toggle="tab" href="#appointments"><span class="hidden-xs">Appointments History</span>
                        <span class="visible-xs">History</span>
                        </a>
                     </li>
                     <li>
                        <a data-toggle="tab" data-customer="2961321" href="#sales">Invoices
                        </a>
                     </li>
                  </ul>
                  <div class="tab-content p-l-none p-r-none">
                     <div class="tab-pane active" id="summary">
                        <div class="row">
                           <div class="col-xs-6 col-sm-3 p-r-5 sm-p-l-15">
                              <div class="panel panel-default m-b-10 b-regular sm-m-">
                                 <div class="panel-body p-b-10 p-t-10 bg-complete">
                                    <div class="text-center">
                                       <h3 class="bold text-white no-margin">7</h3>
                                       <div class="m-t-10 text-white sm-m-b-5">
                                          Appointments
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xs-6 col-sm-3 p-l-5 p-r-5 sm-p-r-15">
                              <div class="panel panel-default m-b-10 b-regular">
                                 <div class="panel-body p-b-10 p-t-10 bg-danger">
                                    <div class="text-center">
                                       <h3 class="bold text-white no-margin">0</h3>
                                       <div class="m-t-10 text-white sm-m-b-5">
                                          No-shows
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xs-6 col-sm-3 p-r-5 p-l-5 sm-p-l-15">
                              <div class="panel panel-default m-b-10 b-regular">
                                 <div class="panel-body p-b-10 p-t-10 bg-success">
                                    <div class="text-center">
                                       <h3 class="bold text-white no-margin">₹924</h3>
                                       <div class="m-t-10 text-white">
                                          Total Sales
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-xs-6 col-sm-3 p-l-5 sm-p-r-15">
                              <div class="panel panel-default m-b-10 b-regular">
                                 <div class="panel-body p-b-10 p-t-10 bg-warning">
                                    <div class="text-center">
                                       <h3 class="bold text-white no-margin">₹793</h3>
                                       <div class="m-t-10 text-white">
                                          Outstanding
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-6 sm-p-r-15 sm-p-l-15 p-r-5">
                              <table class="table table-condensed bg-white no-margin">
                                 <tbody>
                                    <tr>
                                       <td class="hint-text col-xs-5 col-sm-4">
                                          Mobile
                                       </td>
                                       <td class="font-bold">
                                           <?php echo $customer['mobile'] ?>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="hint-text col-xs-5 col-sm-4">
                                          Telephone
                                       </td>
                                       <td class="font-bold">
                                           <?php echo $customer['telephone'] ?>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="hint-text col-xs-5 col-sm-4">
                                          Email
                                       </td>
                                       <td class="font-bold">
                                           <?php echo $customer['email'] ?>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <div class="col-sm-6 sm-p-r-15 sm-p-l-15 p-l-5">
                              <table class="table table-condensed bg-white no-margin">
                                 <tbody>
                                    <tr>
                                       <td class="hint-text col-xs-5 col-sm-4">
                                          Birthday
                                       </td>
                                       <td class="font-bold">
                                           <?php echo !empty($customer['birthday']) ? date('d-m-Y', strtotime($customer['birthday'])) : '' ?>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td class="hint-text col-xs-5 col-sm-4">
                                          Gender
                                       </td>
                                       <td class="font-bold">
                                           <?php echo (!empty($customer['gender']) ? ($customer['gender'] == 'f' ? 'Female' : 'Male') : '') ?>
                                       </td>
                                    </tr>
<!--                                    <tr>
                                       <td class="hint-text col-xs-5 col-sm-4">
                                          Notifications
                                       </td>
                                       <td class="font-bold">
                                          Email and SMS
                                       </td>
                                    </tr>-->
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12">
                              <table class="table table-condensed bg-white no-margin">
                                 <tbody>
                                     <tr>
                                        <td class="no-border col-sm-2 col-xs-5 hint-text">Notes</td>
                                        <td class="no-border p-l-15">
                                        <div class="text-italic"><p><?php echo $customer['notes'] ?></p></div>
                                        </td>
                                      </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <div class="row upcoming-appointments m-t-20">
                           <div class="text-uppercase font-montserrat p-l-20">
                              Upcoming Appointments
                           </div>
                           <hr class="b-dark-grey m-b-10">
                           <div class="col-sm-12">
                              There are no upcoming appointments for this client
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane" id="appointments">
                        <div class="row clickable-row customer-booking" data-booking-id="9300373" data-href="/calendar/booking_modal?booking_id=9300373&amp;source=customer" data-remote="true">
                           <div class="b-b b-grey col-md-12 p-b-10 p-t-10">
                              <div class="p-l-10">
                                 <span class="label label-info appointment-status">Confirmed</span>
                                 <span class="event-link m-l-10 text-complete">Gadfdsfa</span>
                                 <div class="meta m-t-5 m-b-5">
                                    <span class="m-r-10">Thursday, 19 Jan 2017 at 8:00am</span>
                                    <span class="m-r-10">1h 5min</span>
                                    <span class="m-r-10">raa gg</span>
                                    <span class="m-r-10">₹20</span>
                                    <span class="m-r-10">B37CD2BF</span>
                                 </div>
                                 <div class="note"></div>
                              </div>
                           </div>
                        </div>
                        <div class="row clickable-row customer-booking" data-booking-id="9283234" data-href="/calendar/booking_modal?booking_id=9283234&amp;source=customer" data-remote="true">
                           <div class="b-b b-grey col-md-12 p-b-10 p-t-10">
                              <div class="p-l-10">
                                 <span class="label  appointment-status">Completed</span>
                                 <span class="event-link m-l-10 text-complete">Reafds</span>
                                 <div class="meta m-t-5 m-b-5">
                                    <span class="m-r-10">Thursday, 19 Jan 2017 at 2:10am</span>
                                    <span class="m-r-10">1h</span>
                                    <span class="m-r-10">raa gg</span>
                                    <span class="m-r-10">₹43</span>
                                    <span class="m-r-10">894D4084</span>
                                 </div>
                                 <div class="note"></div>
                              </div>
                           </div>
                        </div>
                        <div class="row clickable-row customer-booking" data-booking-id="9282296" data-href="/calendar/booking_modal?booking_id=9282296&amp;source=customer" data-remote="true">
                           <div class="b-b b-grey col-md-12 p-b-10 p-t-10">
                              <div class="p-l-10">
                                 <span class="label  appointment-status">Completed</span>
                                 <span class="event-link m-l-10 text-complete">Reafds</span>
                                 <div class="meta m-t-5 m-b-5">
                                    <span class="m-r-10">Thursday, 19 Jan 2017 at 1:20am</span>
                                    <span class="m-r-10">1h</span>
                                    <span class="m-r-10">dd</span>
                                    <span class="m-r-10">₹43</span>
                                    <span class="m-r-10">F3E80B22</span>
                                 </div>
                                 <div class="note"></div>
                              </div>
                           </div>
                        </div>
                        <div class="row clickable-row customer-booking" data-booking-id="9282295" data-href="/calendar/booking_modal?booking_id=9282295&amp;source=customer" data-remote="true">
                           <div class="b-b b-grey col-md-12 p-b-10 p-t-10">
                              <div class="p-l-10">
                                 <span class="label  appointment-status">Completed</span>
                                 <span class="event-link m-l-10 text-complete">Reafds</span>
                                 <div class="meta m-t-5 m-b-5">
                                    <span class="m-r-10">Thursday, 19 Jan 2017 at 1:15am</span>
                                    <span class="m-r-10">10min</span>
                                    <span class="m-r-10">dd</span>
                                    <span class="m-r-10">₹21</span>
                                    <span class="m-r-10">F07F85A2</span>
                                 </div>
                                 <div class="note"></div>
                              </div>
                           </div>
                        </div>
                        <div class="row clickable-row customer-booking" data-booking-id="9282478" data-href="/calendar/booking_modal?booking_id=9282478&amp;source=customer" data-remote="true">
                           <div class="b-b b-grey col-md-12 p-b-10 p-t-10">
                              <div class="p-l-10">
                                 <span class="label label-info appointment-status">New</span>
                                 <span class="event-link m-l-10 text-complete">Reafds</span>
                                 <div class="meta m-t-5 m-b-5">
                                    <span class="m-r-10">Thursday, 19 Jan 2017 at 12:30am</span>
                                    <span class="m-r-10">1h</span>
                                    <span class="m-r-10">raa gg</span>
                                    <span class="m-r-10">₹43</span>
                                    <span class="m-r-10">BF0E9D57</span>
                                 </div>
                                 <div class="note"></div>
                              </div>
                           </div>
                        </div>
                        <div class="row clickable-row customer-booking" data-booking-id="9282071" data-href="/calendar/booking_modal?booking_id=9282071&amp;source=customer" data-remote="true">
                           <div class="b-b b-grey col-md-12 p-b-10 p-t-10">
                              <div class="p-l-10">
                                 <span class="label  appointment-status">Completed</span>
                                 <span class="event-link m-l-10 text-complete">Reafds</span>
                                 <div class="meta m-t-5 m-b-5">
                                    <span class="m-r-10">Thursday, 19 Jan 2017 at 12:25am</span>
                                    <span class="m-r-10">1h</span>
                                    <span class="m-r-10">dd</span>
                                    <span class="m-r-10">₹43</span>
                                    <span class="m-r-10">F3E80B22</span>
                                 </div>
                                 <div class="note"></div>
                              </div>
                           </div>
                        </div>
                        <div class="row clickable-row customer-booking" data-booking-id="9282070" data-href="/calendar/booking_modal?booking_id=9282070&amp;source=customer" data-remote="true">
                           <div class="b-b b-grey col-md-12 p-b-10 p-t-10">
                              <div class="p-l-10">
                                 <span class="label  appointment-status">Completed</span>
                                 <span class="event-link m-l-10 text-complete">Reafds</span>
                                 <div class="meta m-t-5 m-b-5">
                                    <span class="m-r-10">Thursday, 19 Jan 2017 at 12:20am</span>
                                    <span class="m-r-10">10min</span>
                                    <span class="m-r-10">dd</span>
                                    <span class="m-r-10">₹21</span>
                                    <span class="m-r-10">D78C6772</span>
                                 </div>
                                 <div class="note"></div>
                              </div>
                           </div>
                        </div>
                        <table class="table table-hover">
                        </table>
                     </div>
                     <div class="tab-pane" id="sales">
                        <div class="table-responsive">
                           <table class="table table-hover">
                              <thead>
                                 <tr class="bg-grey">
                                    <th>
                                       Invoice #
                                    </th>
                                    <th>
                                       Status
                                    </th>
                                    <th>
                                       Invoice Date
                                    </th>
                                    <th>
                                       Due Date
                                    </th>
                                    <th>
                                       Location
                                    </th>
                                    <th>
                                       Staff
                                    </th>
                                    <th class="text-right">
                                       Amount
                                    </th>
                                 </tr>
                              </thead>
                              <tbody></tbody>
                           </table>
                           <div class="text-center">
                              <div class="loading">
                                 <i class="icon-refresh icon-spin"></i>
                                 Loading sales history…
                              </div>
                              <div class="paging"></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <footer></footer>
   </div>
</div>