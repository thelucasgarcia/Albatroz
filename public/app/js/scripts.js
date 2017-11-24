/*
 * Title:   Travelo - Travel, Tour Booking HTML5 Template - Contact Javascript file
 * Author:  http://themeforest.net/user/soaptheme
 */

tjq(document).ready(function($) {
    $("form.comment-form").submit(function(e) {
        e.preventDefault();
        var obj = $(this);
        if (obj.hasClass("disabled")) {
            return false;
        }
        obj.addClass("disabled");
        $.ajax({
            url: obj.attr("action"),
            type: 'post',
            dataType: 'html',
            data: obj.serialize(),
            success: function(r) {

				// console.log(r);
				// var msgobj = obj.find(".alert");
				// if (r.indexOf("Success") >= 0) {
				//     msgobj.removeClass("alert-error");
				//     msgobj.addClass("alert-success");
				// } else {
				//     msgobj.removeClass("alert-success");
				//     msgobj.addClass("alert-error");
				// }
				// msgobj.text(r);
				// msgobj.fadeIn();
				
            	$('div.comments-container').empty();
            	$('div.comments-container').html(r);
                obj.removeClass("disabled");
                obj[0].reset();
            }
        });
    });

    $('#city').on('change', function(e){
        
        var city_id = e.target.value;

        if (!city_id) {
            return ;
        }

        $.ajax({
            url: '/schools',
            type: 'get',
            dataType: 'html',
            data: {city_id: city_id},
            success: function(html){
                console.log(html);
            }
        });
    });
});