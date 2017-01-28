<div class="">
   <!-- START PAGE CONTENT -->
   <div class="content full-height">
      <div class="container-fluid full-height">
         <div id="loading_image" style="display: none;">
            <i class="icon-refresh icon-spin"></i>
            Loading...
         </div>
         <div id="calendar">
            <div class="toolbar">
               <form >
                  <div class="left-controls">
                     <div data-href="/calendar/newBooking" data-model="modal" data-modalid="newBooking" class="btn btn-success navigate hidden-xs" title="Create appointment" data-original-title="Create appointment" data-toggle="tooltip" data-placement="bottom">
                        <i class="icon-plus"></i>
                        <span>Create appointment</span>
                     </div>
                     <div data-href="/sales/newSale" data-model="modal" data-modalid="new-sale" class="btn btn-success navigate hidden-xs js-create-sale-action" data-placement="bottom" data-toggle="tooltip" title="Create product sale" data-original-title="Create sale">
                        <i class="icon-tag"></i>
                        <span>Create product sale</span>
                     </div>
                     <div class="select-location dropdown">
                        <div class="btn btn-default toggle-button visible-xs visible-sm" title="Select Location">
                           <i class="left s-icon-home"></i>
                        </div>
                     </div>
<!--                     <div class="select-resource dropdown">
                        <div class="btn btn-default toggle-button visible-xs visible-sm" title="Select Employee">
                           <i class="left s-icon-user"></i>
                        </div>
                        <div class="select-wrapper">
                           <select class="form-control" data-selected="employee-0">
                              <option value="employee-0" selected="">All staff</option>
                              <option value="employee-122704">dd</option>
                              <option value="employee-121193">raa gg</option>
                              <option value="employee-121109">rahul g</option>
                              <option value="employee-121110">Wendy Smith</option>
                           </select>
                        </div>
                     </div>-->
                  </div>
<!--                  <div class="btn-group">
                     <div class="btn btn-default navigate" data-action="previous" title="Previous">
                        <i class="s-icon-left-arrow"></i>
                        <span>Previous</span>
                     </div>
                     <div class="btn btn-default navigate hidden-xs active" data-action="today">
                        Today
                     </div>
                     <div class="btn btn-default select-date toggle-button select-wrapper" title="Change Date">
                        <i class="left s-icon-calendar hidden-xs hidden-sm"></i>
                        <span class="display-date">Friday 20 Jan, 2017</span>
                        <input type="text" name="date" id="date" value="2017-01-20" class="hasDatepicker">
                     </div>
                     <div class="btn btn-default navigate" data-action="next" title="Next">
                        <i class="s-icon-right-arrow"></i>
                        <span>Next</span>
                     </div>
                  </div>-->
<!--                  <div class="right-controls hidden-xs">
                     <div class="select-view">
                        <div class="btn-group" data-toggle="buttons-radio">
                           <div class="btn btn-default" data-value="week">
                              Week
                           </div>
                           <div class="btn btn-default active" data-value="day">
                              Day
                           </div>
                        </div>
                        <input type="hidden" name="view" id="view" value="day">
                     </div>
                  </div>-->
               </form>
            </div>
            <div class="grid loaded fc">
                <div id="appointment_calender"></div>
            
               <div class="loading">
                  <i class="icon-refresh icon-spin"></i>
                  Loading appointments…
               </div>
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
    
    var appointmentdetails = <?php echo json_encode($appointmentdetails); ?>;
    var calEvent = <?php echo json_encode($events); ?>
    
        /*var calEvent = [];
        $.each(appointmentdetails, function(key, val){
            var appts = {};
            appts= {'title' : val['appointment_id'], 'start' : val['app_start'], 'end' : val['app_end'], 'color' : '#339966'};
            calEvent.push(appts);
        });*/
    
    var date = new Date(),
        d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear(),
        h = date.getHours(),
        m = date.getMinutes();
        
    $(document).ready(function() {
        
        var calendar =  $('#appointment_calender').fullCalendar({
            
                header: {
			left: 'prev,next today',
			center: 'title',
			right: 'agendaWeek,agendaDay'
		},
                defaultView:'agendaWeek',
		events: calEvent,
		//editable: false,
                selectable: true,
		selectHelper: true,
                slotDuration: '00:05:00',
                allDaySlot:false,
                scrollTime : h+':'+m,
		select: function(start, end, allDay) {
                    var st = moment(start).format('HH:mm'),
                        sd = moment(start).format('YYYY-MM-DD');
                    loadNewBookingModal(sd, st);
                    /*load_modal(function() {
                        $('.schedule-modal').modal('show');
                    });*/
                    
		},
//                eventRender: function (event, element) {
////        $(element).tooltip({title:event.title, container: "body"});
////        $(element).tooltip('toggle');
//var tooltip = event.title;
//            //$(element).attr("data-original-title", tooltip)
//            //$(element).tooltip({ container: "body"})
//            
//            
//            $(element).popover({html:true,title:event.title,placement:'top',container:'body'}).popover('show');
//},
//                eventRender: function (event, element) {
//                    var tooltip = event.description;
////                    console.log($(element));
////                    $(element).attr("data-original-title", tooltip);
////                    $(element).tooltip({ container: "body"});
//$(element).tooltip({title:'dddd', container: "body"});
//                   },
                /*eventRender: function(event, element) {
                    element.find('.fc-event-title').append("<br/>" + event.description);              
                },
                eventMouseover: function(calEvent, jsEvent) {
                    var tooltip = '<div class="tooltipevent" style="width:100px;height:100px;background:#ccc;position:absolute;z-index:10001;">' + calEvent.title + '</div>';
                    var $tooltip = $(tooltip).appendTo('body');

                    $(this).mouseover(function(e) {
                        $(this).css('z-index', 10000);
                        $tooltip.fadeIn('500');
                        $tooltip.fadeTo('10', 1.9);
                    }).mousemove(function(e) {
                        $tooltip.css('top', e.pageY + 10);
                        $tooltip.css('left', e.pageX + 20);
                    });
                },
                eventMouseout: function(calEvent, jsEvent) {
                    $(this).css('z-index', 8);
                    $('.tooltipevent').remove();
                },*/
                eventMouseover: function(calEvent, jsEvent) {
                    $(this).popover({
                        html: true,
                        placement: 'auto right',
            //            placement: function (context, source) {
            //                var position = $(source).position();
            //                if (position.left > 515) {
            //                    return "left";
            //                }
            //                if (position.left < 515) {
            //                    return "right";
            //                }
            //                if (position.top < 110){
            //                    return "bottom";
            //                }
            //                return "top";
            //            },
//                        title: function() {
//                            return $("#popover-head").html();
//                        },
                        content: function() {
                            
                            var app_detail = calEvent.app_detail;
                            if(typeof app_detail !== 'undefined') {
                                $("#status_lbl, #client_lbl, #service_lbl, #tofrom_lbl, #staff_lbl, #price_lbl, #sp_lbl").html();
                                
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
                    $(this).popover('hide');
                },
                eventClick: function(calEvent, jsEvent, view) {

                    // change the border color just for fun
                    //$(this).css('border-color', 'red');
                    var appointment_id = calEvent.appointment_id;
                    loadBookingModal(appointment_id);

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
        
        function loadBookingModal(app_id) {
            
            $.get('/calendar/bookingDetail', {id : app_id}, function(data) {
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
            
            $.get('/calendar/newBooking', {sd : sd, st : st}, function(data) {
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