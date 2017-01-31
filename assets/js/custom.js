$(document).ready(function() {
    
    $('[data-toggle="tooltip"]').tooltip();
    
    $('[data-model="modal"]').click(function(e) {
	   e.preventDefault();
        var $this = $(this),
            url = typeof $this.attr('href') == 'undefined' ? $this.data('href') : $this.attr('href'),
            modalid = $this.data('modalid');
            
        if (url.indexOf('#') == 0) {
		  $(url).modal('open');
        } else {            
            loadingOverlay();
            $.get(url, $this.data('params'), function(data) {
                removeLoadingOverlay();
                $('#' + modalid).remove();
                $('body').append(data);
                $('#' + modalid).modal({backdrop: 'static', keyboard: false});
                $('#' + modalid).on('hidden.bs.modal', function(){
                    $('.modal-backdrop').remove();
                });
            }).success(function() { $('input:text:visible:first').focus(); });          
    	}
    });
    
    $(document).on("click", '.select-all-items', function(event) {
        $(".selection-list :checkbox").prop('checked', this.checked);
    });
});

function loadingOverlay(){
    $('<div class="modal-backdrop loading"></div>').appendTo(document.body),$("#loading_image").show()
}
function removeLoadingOverlay(){
    $(".modal-backdrop.loading").remove(),$("#loading_image").hide(),$(".blockUI").remove()
}

function formatAMPM(date, add5 = false) {
    var newDate = new Date(date);
    var hours = newDate.getHours();
    var minutes = newDate.getMinutes();
    if(add5) {
        minutes = round5(minutes);
    }    
    var ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + '' + ampm;
    return strTime;
}

function round5(x)
{
    return Math.ceil(x/5)*5;
}

function format24with5(date){
    var newDate = new Date(date);
    var hours = newDate.getHours();
    hours = hours < 10 ? '0'+hours : hours;
    var minutes = newDate.getMinutes();
    minutes = round5(minutes);
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes;
    return strTime;
}

function getTimeinFormat(date) {
    var newDate = new Date(date);
    var hours = newDate.getHours();
    hours = hours < 10 ? '0'+hours : hours;
    var minutes = newDate.getMinutes();
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes;
    return strTime;
}

var myDecimal = {};
myDecimal.round = function(number, precision) {
    var factor = Math.pow(10, precision);
    var tempNumber = number * factor;
    var roundedTempNumber = Math.round(tempNumber);
    return roundedTempNumber / factor;
};
