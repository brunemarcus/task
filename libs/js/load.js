function load_menu(){
	$('.menu').load("includes/menu.php");
}

function consulting_clients() {
	$.ajax({
		url: 'api/consulting_clients.php',
		type: 'GET',
		contentType: 'application/json; charset=utf-8',
		dataType: 'json',
		success: function(data) {
			if(data.length > 0) {
				$(data).each(function(index,key){
					var html = "<div class='card'>";
						html += "<div class='card-header'>";
						html += "<b>"+key['customer_name']+"</b>";
						html += "</div>";
						html += "<div class='card-body'>";
						html += "<h5 class='card-title'>Customer Information</h5>";
						html += "<p><b>Customer Name: </b>"+key['customer_name']+"</p>";
						html += "<p><b>Customer Last Name: </b>"+key['customer_last_name']+"</p>";
						html += "<span class='badge badge-danger'>Country: "+key['country']+"</span>";
						html += "   <span class='badge badge-warning'>Published by: "+key['username']+"</span>";
						html += "   <span class='badge badge-info'>Data Register: "+key['date_register']+"</span></br></br>";
						html += "<a href='view.php?id="+key['id_user']+"' class='btn btn-primary'>View customer</a>";
						html += "</div>";
						html += "</div></br>";
					$('.content-clients').append(html);
				})
			} else {
				$('.content-clients').html("<h5>There are no registered customers</h5>");
			}
		}, 
		error: function(e) {
			console.log(e);
		}
	})
}

$(document).ready(function(){
	load_menu(); //Load menu
	consulting_clients(); //Consulting clients
})