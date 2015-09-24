$(function() {
    // Side Bar Toggle
    $('.hide-sidebar').click(function() {
	  $('#sidebar').hide('fast', function() {
	  	$('#content').removeClass('span9');
	  	$('#content').addClass('span12');
	  	$('.hide-sidebar').hide();
	  	$('.show-sidebar').show();
	  });
	});

	$('.show-sidebar').click(function() {
		$('#content').removeClass('span12');
	   	$('#content').addClass('span9');
	   	$('.show-sidebar').hide();
	   	$('.hide-sidebar').show();
	  	$('#sidebar').show('fast');
	});
});

function build_url(data) {
    var sep = "?";
    var url = '';
    for(key in data) {
        url += sep + key + '=' + data[key];
        sep = "&";
    }
    return url;
}

function save_data(url, data, cb) {
    $.post(url, data , function(data) {
       cb(data); 
    });
}