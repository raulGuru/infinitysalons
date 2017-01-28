<div class="panel panel-transparent">
   <div class="panel-body sm-padding-15">
      <div id="schedule-container">
         <div class="row schedule-filters">
            <!--div class="col-sm-5">
               <div class="form-inline">
                  <div class="form-group">
                     <div class="select-wrapper">
                        <select name="employee_id" id="employee_id" class="form-control js-schedule-employee">
                           <option value="">All staff</option>
                           <option value="122704">dd</option>
                           <option value="121193">raa gg</option>
                           <option value="121109">rahul g</option>
                           <option value="121110">Wendy Smith</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div-->
            <!--div class="col-sm-7">
               <div class="pull-right schedule-date-toolbar">
                  <div class="btn-group js-date-toolbar">
                     <div class="btn btn-default navigate" data-action="previous" title="Previous">
                        <i class="s-icon-left-arrow"></i>
                     </div>
                     <div class="btn btn-default hidden-xs navigate active" data-action="today">
                        Today
                     </div>
                     <div class="btn btn-default select-date select-wrapper" style="padding-right: 35px;" title="Change Date">
                        <i class="left s-icon-calendar hidden-xs hidden-sm"></i>
                        <span class="display-date">15 - 21 Jan, 2017</span>
                        <input type="text" name="date_from" id="date_from" value="Wednesday, 18 Jan 2017" class="datepicker-input hasDatepicker" readonly="readonly">
                     </div>
                     <div class="btn btn-default navigate" data-action="next" title="Next">
                        <i class="s-icon-right-arrow"></i>
                     </div>
                  </div>
               </div>
            </div-->
         </div>
         <div class="schedule-wrapper">
             <div class="js-schedule-table schedule-scrollable" id="schedule-calendar">
            </div>
            <div class="schedule-loading-overlay js-loading-overlay hidden">
               <i class="icon-refresh icon-spin"></i>
               Loading roster
            </div>
         </div>
      </div>
   </div>
</div>
  


<script>
    
    $(document).ready(function() {
        
        function load_modal() {
            
            $.get('schedule/newSchedule', function(data) {
                //removeLoadingOverlay();
                $('.schedule-modal').remove();
                $('body').append(data);
                $('.schedule-modal').modal({backdrop: 'static', keyboard: false});
                $('.schedule-modal').on('hidden.bs.modal', function(){
                  $('.modal-backdrop').remove();
                });
            }).success(function() { $('input:text:visible:first').focus(); });
                  
        }
        
        var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
		
        var calendar =  $('#schedule-calendar').fullCalendar({
            
            header: {
			left: 'prev,next today',
			center: 'title',
			right: 'basicWeek,basicDay'
		},
                defaultView:'basicWeek',
		events: [
//		  {
//			title: 'All Day Event',
//			start: new Date(y, m, 1)
//		  },
//		  {
//			title: 'Long Event',
//			start: moment().subtract(5, 'days').format('YYYY-MM-DD'),
//			end: moment().subtract(1, 'days').format('YYYY-MM-DD')
//		  },
//		  {
//			title: 'Some Event',
//			start: new Date(y, m, d-3, 16, 0),
//			allDay: false
//		  }
		]
		,
		editable: true,
		droppable: true,
                selectable: true,
		selectHelper: true,
		select: function(start, end, allDay) {
                    
                    
                    load_modal(function() {
                        $('.schedule-modal').modal('show');
                    });
                    
                    
		}
		,
                eventClick: function(calEvent, jsEvent, view) {

        alert('Event: ' + calEvent.title);
        alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
        alert('View: ' + view.name);

        // change the border color just for fun
        $(this).css('border-color', 'red');

    }
                /*eventClick: function(calEvent, jsEvent, view) {

			//display a modal
			var modal = 
			'<div class="modal fade">\
			  <div class="modal-dialog">\
			   <div class="modal-content">\
				 <div class="modal-body">\
				   <button type="button" class="close" data-dismiss="modal" style="margin-top:-10px;">&times;</button>\
				   <form class="no-margin">\
					  <label>Change event name &nbsp;</label>\
					  <input class="middle" autocomplete="off" type="text" value="' + calEvent.title + '" />\
					 <button type="submit" class="btn btn-sm btn-success"><i class="ace-icon fa fa-check"></i> Save</button>\
				   </form>\
				 </div>\
				 <div class="modal-footer">\
					<button type="button" class="btn btn-sm btn-danger" data-action="delete"><i class="ace-icon fa fa-trash-o"></i> Delete Event</button>\
					<button type="button" class="btn btn-sm" data-dismiss="modal"><i class="ace-icon fa fa-times"></i> Cancel</button>\
				 </div>\
			  </div>\
			 </div>\
			</div>';
		
		
			var modal = $(modal).appendTo('body');
			modal.find('form').on('submit', function(ev){
				ev.preventDefault();

				calEvent.title = $(this).find("input[type=text]").val();
				calendar.fullCalendar('updateEvent', calEvent);
				modal.modal("hide");
			});
			modal.find('button[data-action=delete]').on('click', function() {
				calendar.fullCalendar('removeEvents' , function(ev){
					return (ev._id == calEvent._id);
				})
				modal.modal("hide");
			});
			
			modal.modal('show').on('hidden', function(){
				modal.remove();
			});


			//console.log(calEvent.id);
			//console.log(jsEvent);
			//console.log(view);

			// change the border color just for fun
			//$(this).css('border-color', 'red');

		}*/
                
        });
		
    });
    
    function submitmod() {
    
    $.ajax({
            url: g.base_url + 'services/addGroup',
            type: 'post',   
            dataType: 'json',
            data: $('form#new_group').serialize(),
            success: function(data) {
                if(data.success){
                    $("#newGroupModal").find("input,textarea,select").val('').end().find('.alert').addClass('hide');
                    $("#newGroupModal").modal('hide');
                    location.reload();
                    //$("#newGroupModal").modal('hide').find('.alert').addClass('hide');
                    //$("#newGroupModal").find('form')[0].reset();
                }
                else{
                    $('#new_group_alert').removeClass('hide').html(data.error)
                }
            }
        });
    }
        
</script>



