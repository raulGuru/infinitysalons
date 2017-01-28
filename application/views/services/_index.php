<div class="container">
<div id='loading_image' style='display: none'>
<i class='icon-refresh icon-spin'></i>
Loading...</div>
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
                    <div>
                        <?php
                        $div = '';
                        	foreach($groups as $group) {
                        	   $div = "<div class='tset'>";
                               $div .= '<table class="table table-hover table-responsive">';
                               $div .= '<thead><tr><th><a class="name font-montserrat text-uppercase p-l-10 bold" href="/services/editGroup" data-model="modal" data-modalid="newGroupModal" href="/services/editGroup/" data-dataid='.$group['id'].'>'.$group['group_name'].'</a></th><th><a class="btn btn-xs btn-success pull-right" href="/services/newService" data-model="modal" data-modalid="newServiceModal" data-dataid='.$group['id'].'><span class="hidden-sm hidden-xs">New Service</span>
<span class="hidden-md hidden-lg">+</span>
</a></th></tr></thead>';
                               $div .= '<tbody><tr><td>Mark</td><td>Mark</td></tr></tbody>';
                               $div .= "</div><div></div>";
                               echo $div;
                        	}
                        ?>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>



