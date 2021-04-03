function sendAnswer(){
    var answer = $("#answer").val();
    var id = $("#id").val();
    
    
    $.ajax({
		async: false,			
		type: "POST",
		url: "sendTicket.php",
		dataType:"text",
		data: 'id=' + id + '&answer=' + answer,
		error: function () {	
			alert( "Не смог" );
		},
		success: function (response) {
			console.log(id);
		}
	});
}

function delTicket(id){
    
    $.ajax({
		async: false,			
		type: "POST",
		url: "del.php",
		dataType:"text",
		data: 'id=' + id,
		error: function () {	
			alert( "Не смог" );
		},
		success: function (response) {
			
		}
	});
}