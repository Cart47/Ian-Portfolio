if(!modal)
{
    basket.require(
                { url: 'JS/main.js', skipCache: true },
                { url: 'JS/FlickrAPI.js', skipCache: true }
            );
}
else 
{
    $('#modal-form').parsley();
    $('.dark-screen').fadeOut(1000);
    
    $(document).ready(function() {
       $( "#place" ).autocomplete({
      source: function (request, response) {
		 jQuery.getJSON(
			"http://gd.geobytes.com/AutoCompleteCity?callback=?&q="+request.term,
			function (data) {
			 response(data);
			}
		 );
		},
		minLength: 3,
		select: function (event, ui) {
		 var selectedObj = ui.item;
		 $("#place").val(selectedObj.value);
		 return false;
		},
		open: function () {
		 jQuery(this).removeClass("ui-corner-all").addClass("ui-corner-top");
		},
		close: function () {
		 jQuery(this).removeClass("ui-corner-top").addClass("ui-corner-all");
		}
	 });
    $("#place").autocomplete("option", "delay", 100);
     
    });
}

