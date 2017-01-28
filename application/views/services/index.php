
   
      <div class="bg-white full-height">
         <div class="panel panel-transparent">
            <div class="panel-body">
               <div class="services-list">
                  <div class="row m-b-20">
                     <div class="col-xs-6">
                        <h3 class="no-margin hidden-xs">Service Menu</h3>
                     </div>
                     <div class="col-xs-6">
                        <div class="text-right sm-padding-10">
                           <a href="/services/newGroup" data-model="modal" data-modalid="newGroupModal" class="btn btn-success m-t-10">New Group</a>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="col-sm-4 col-md-4 col-lg-4 hide" id="filter-message">
                           <div class="label label-info"></div>
                        </div>
                     </div>
                  </div>
                  
                  <div class="row">
                                <div class="col-lg-12">
                  
                         <?php
                         if(!empty($groups)) { 
                             foreach($groups as $group) { ?>                                                     
                            
                            <div class="group" id="<?php echo $group['id']; ?>">
                              <div class="row">
                                 <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="group-header b-rad-sm">
                                       <i class="icon-reorder icon fs-16  "></i>
                                       <a class="name font-montserrat text-uppercase p-l-10 bold" data-model="modal" data-modalid="newGroupModal" data-params='{"id":"<?php echo $group['id']; ?>"}' href="/services/editGroup"><?php echo $group['group_name']; ?></a>
                                       <a class="btn btn-xs btn-success pull-right event-link" data-model="modal" data-modalid="newServiceModal" data-params='{"id":"<?php echo $group['id']; ?>"}' href="/services/newService"><span class="hidden-sm hidden-xs">New Service</span>
                                       <span class="hidden-md hidden-lg">+</span>
                                       </a>
                                       <div class="clearfix"></div>
                                    </div>
                                 </div>
                              </div>
                              <ul class="services connectedSortable no-padding collapse in sortable-ready">
                              <?php
                              if(!empty($group['services'])) {
                                foreach($group['services'] as $service) { ?>                                
                                <li class="b-b b-grey bg-white service">
                                    <div class="row item  ">
                                       <div class="media">
                                          <div class="media-left media-middle  ">
                                             <i class="icon-reorder icon fs-12"></i>
                                          </div>
                                          <div class="media-body media-middle">
                                             <div class="col-sm-7 col-md-7 col-lg-7">
                                                <a class="name event-link" data-model="modal" data-modalid="newServiceModal" data-params='{"id":"<?php echo $service['id']; ?>"}' href="/services/editService"><?php echo $service['name']; ?></a>
                                             </div>
                                             <div class="col-sm-3 col-md-3 col-lg-3 pull-right text-right">
                                                <?php if($service['price'])
                                                        echo '<span>'.$service['price'].'</span>';
                                                      if($service['special_price'])
                                                        echo '<span class="text-danger m-l-10">'.$service['special_price'].'</span>';
                                                        
                                                ?>                                             
                                             </div>
                                             <?php
                                             if($service['price'])
                                                //echo '<div class="col-sm-2 col-md-2 col-lg-2 pull-right text-right">1h 30min</div>';                                                 
                                             ?>                                             
                                          </div>
                                       </div>
                                    </div>
                                 </li>
                                    
                                <?php }
                              } 
                              ?>
                              </ul>
                           </div>
                               
                         <?php } } ?>
                           </div>
                     </div> 
                        
                  </div>
               </div>
            </div>
         </div>
      </div>

