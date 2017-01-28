<div class="services-list">
   <div class="panel panel-transparent">
      <div class="panel-body">
         <div class="row sm-m-t-20">
            <div class="col-md-12">
               <div class="row">
                  <div class="col-xs-6">
                     <h3 class="no-margin hidden-xs">Staff</h3>
                  </div>
                  <div class="col-xs-6 text-right">
                     <a class="btn btn-success event-link" href="/employees/newEmp" data-model="modal" data-modalid="newEmployeesModal" >New Staff</a>
                  </div>
               </div>
              <?php if(!empty($staffs)) { ?>
                
                <div class="row m-t-20">
                  <div class="col-sm-12">
                     <div class="/*table-responsive*/">
                         <table class="table table-hover table-ui-sortable" id="employess_list">
                           <thead class="bg-grey">
                              <tr>
                                 <th></th>
                                 <th class="p-l-none">Name</th>
                                 <th>Mobile Number</th>
                                 <th>Email</th>
                              </tr>
                           </thead>
                           <tbody class="employees ui-sortable">
                               <?php 
                                foreach($staffs as $staff) { ?>
                               
                               <tr class="clickable-row employee" data-href="/employees/edit" data-params='{"id":"<?php echo $staff['id']; ?>"}' data-model="modal" data-modalid="newEmployeesModal" id="employee_<?php echo $staff['id'] ?>">
                                   <td class="icon-reorder ui-sortable-handle" style="width: 70px;"></td>
                                   <td class="p-l-none" style="width: 154px;">
                                    <?php echo $staff['first_name'] .' '. $staff['last_name']; ?>
                                 </td>
                                 <td style="width: 217px;">
                                    <?php echo $staff['mobile_number']; ?>
                                 </td>
                                 <td style="width: 342px;">
                                    <?php echo $staff['email']; ?>
                                 </td>
                              </tr>
                                <?php }
                               ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
                  
              <?php }?>
               
            </div>
         </div>
      </div>
   </div>
</div>

<script>    
    $(document).ready(function() {
        $('#employess_list').dataTable({"bLengthChange": false});
    });
</script>

