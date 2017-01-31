<div class="row full-height no-margin table-like business-settings-container" id="settings-container" style="">
   <div class="col-md-9 no-padding b-r b-dark-grey sm-b-b full-height table-cell overflow-hidden">
      <div class="bg-white full-height">
         <div class="alert alert-settings alert-success" style="display: none">Roster information has been successfully updated.</div>
         <div class="panel panel-transparent">
            <div class="panel-body">
               <div class="row m-t-10">
                  <div class="col-md-3">
                   
                  </div>
                  <div class="col-md-9">
                     <div class="tab-content">
                        <div class="tab-pane active" id="permissions">
                           <div class="row m-b-20 permissions-list">
                              <div class="col-sm-12">
                                 <form novalidate="novalidate" class="simple_form new_permissions" id="new_permissions" action="/roster/add" method="post">
                                    <div class="row m-b-20">
                                       <div class="col-sm-12">
                                          <h3 class="m-t-none">Roster</h3>
                                          <p>Setup which sections are accessible to each user permission level. All logged in staff can access the calendar, and owner accounts have full system access.</p>
                                       </div>
                                    </div>
                                    <div class="row">
                                       <div class="col-xs-4">
                                          <span class="form-label no-margin hidden-xs">Select Staff</span>
                                          <span class="form-label no-margin visible-xs">staff</span>
                                       </div>
                                       <div class="col-xs-2 sm-p-l-10">
                                          <span class="form-label no-margin">Week</span>
                                       </div>
                                    </div>
                                    <div class="attached-form-group permissions-table">
                                       <div class="row clearfix">
                                          <div class="col-xs-4 no-padding">
                                              <div class="form-group">
                                                <div class="select-wrapper">
                                                   <select name="employee_id" id="employee_id" class="form-control js-schedule-employee">
                                                      <option value="">All staff</option>
                                                      <option value="122704">dd</option>
                                                      <option value="121193">raa gg</option>
                                                      <option value="121109">rahul G</option>
                                                      <option value="121110">Wendy Smith</option>
                                                   </select>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-xs-2 text-center no-padding">
                                             <div class="form-group">
                                                <div class="attached-field-last check-success form-control no-margin">
                                                   <label for="permissions_owner_business_settings">&nbsp;</label>
                                                </div>
                                             </div>
                                          </div>
                                          
                                          
                                       </div>
                                       <div class="row clearfix">
                                          <div class="col-xs-4 no-padding">
                                             <div class="form-group no-padding no-margin">
                                                <div class="fs-14 permission-type form-control">Sunday</div>
                                             </div>
                                          </div>
                                          <div class="col-xs-2 text-center no-padding">
                                             <div class="form-group">
                                                <div class="attached-field-last check-success checkbox form-control no-margin">
                                                    <input class="boolean optional " type="checkbox" value="1" checked="checked" name="roster[sunday]" id="ss">
                                                   <label for="ss">&nbsp;</label>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row clearfix">
                                          <div class="col-xs-4 no-padding">
                                             <div class="form-group no-padding no-margin">
                                                <div class="fs-14 permission-type form-control">Monday</div>
                                             </div>
                                          </div>
                                          <div class="col-xs-2 text-center no-padding">
                                             <div class="form-group">
                                                <div class="attached-field-last check-success checkbox form-control no-margin">
                                                    <input class="boolean optional " type="checkbox" value="1" checked="checked" name="roster[monday]" id="">
                                                   <label for="">&nbsp;</label>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row clearfix">
                                          <div class="col-xs-4 no-padding">
                                             <div class="form-group no-padding no-margin">
                                                <div class="fs-14 permission-type form-control">Tuesday</div>
                                             </div>
                                          </div>
                                          <div class="col-xs-2 text-center no-padding">
                                             <div class="form-group">
                                                <div class="attached-field-last check-success checkbox form-control no-margin">
                                                    <input class="boolean optional " type="checkbox" value="1" checked="checked" name="roster[tuesday]" id="">
                                                   <label for="">&nbsp;</label>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row clearfix">
                                          <div class="col-xs-4 no-padding">
                                             <div class="form-group no-padding no-margin">
                                                <div class="fs-14 permission-type form-control">Wednesday</div>
                                             </div>
                                          </div>
                                          <div class="col-xs-2 text-center no-padding">
                                             <div class="form-group">
                                                <div class="attached-field-last check-success checkbox form-control no-margin">
                                                    <input class="boolean optional " type="checkbox" value="1" checked="checked" name="roster[wednesday]" id="">
                                                   <label for="">&nbsp;</label>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row clearfix">
                                          <div class="col-xs-4 no-padding">
                                             <div class="form-group no-padding no-margin">
                                                <div class="fs-14 permission-type form-control">Thursday</div>
                                             </div>
                                          </div>
                                          <div class="col-xs-2 text-center no-padding">
                                             <div class="form-group">
                                                <div class="attached-field-last check-success checkbox form-control no-margin">
                                                    <input class="boolean optional " type="checkbox" value="1" checked="checked" name="roster[thursday]" id="">
                                                   <label for="">&nbsp;</label>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row clearfix">
                                          <div class="col-xs-4 no-padding">
                                             <div class="form-group no-padding no-margin">
                                                <div class="fs-14 permission-type form-control">Friday</div>
                                             </div>
                                          </div>
                                          <div class="col-xs-2 text-center no-padding">
                                             <div class="form-group">
                                                <div class="attached-field-last check-success checkbox form-control no-margin">
                                                    <input class="boolean optional " type="checkbox" value="1" checked="checked" name="roster[friday]" id="">
                                                   <label for="">&nbsp;</label>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="row clearfix">
                                          <div class="col-xs-4 no-padding">
                                             <div class="form-group no-padding no-margin">
                                                <div class="fs-14 permission-type form-control">Saturday</div>
                                             </div>
                                          </div>
                                          <div class="col-xs-2 text-center no-padding">
                                             <div class="form-group">
                                                <div class="attached-field-last check-success checkbox form-control no-margin">
                                                    <input class="boolean optional " type="checkbox" value="1" checked="checked" name="roster[saturday]" id="">
                                                   <label for="">&nbsp;</label>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="row m-b-20 m-t-20">
                                       <div class="col-sm-12">
                                          <input type="submit" name="commit" value="Save Changes" class="btn btn-success" id="submit-button">
                                       </div>
                                    </div>
                                 </form>
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
   <div class="col-md-3 no-padding full-height table-cell hidden-xs hidden-sm">
   </div>
</div>