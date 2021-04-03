function LoadHistory(){
var sessionId = $('#sessionId').val();  
    
$.ajax({
		async: false,			
		type: "POST",
		url: "dwnldHistory.php",
		dataType:"text",
		data: 'id=' + sessionId,
		error: function () {	
			alert( "Не смог" );
		},
		success: function (response) {
			$('#modal-body1').html(response);
		}
	});

}
function DownLoadHistory(){
var sessionName = $('#sessionName').val();  
$.ajax({
		async: false,			
		type: "POST",
		url: "ldHistory.php",
		dataType:"text",
		data: 'login=' + sessionName,
		error: function (response) {
			alert("Не смог");
			console.log(response);
		},
		success: function (response) {
			$('#modal-body2').html(response);
		}
	});
}

function wishlist(){
var sessionId = $('#sessionId').val();  
$.ajax({
		async: false,			
		type: "POST",
		url: "wishlist.php",
		dataType:"text",
		data: 'id=' + sessionId,
		error: function () {	
			alert( "Не смог" );
		},
		success: function (response) {
			$('#modal-body3').html(response);
		}
	});
}

function changePass() {
	var oldPwd = $('#oldPwd').val();
	var newPwd = $('#newPwd').val();

	$.ajax({
		async: false,
		type: "POST",
		url: "changePassword.php",
		datatype: "text",
		data: 'oldPwd=' + oldPwd + '&newPwd=' + newPwd,
		error: function (response) {
			alert(response);
		},
		success: function (response) {
			alert(response);
        }
	});
}

function keys() {
        var content = $("#i").val();
        var arr = content.split('');
        var result = '';
        
        for (var i = 0; i < arr.length; i++) {
          console.log(arr[i]);
          if(arr[i].match(/^\d+$/)){
            $("#alert").html('');
            result += arr[i];
		    }
		  else{
		    $("#alert").html('Вводить можно только цифры');
		    $("#alert").css('color', 'red');
		  }  
        }
        
        $("#i").val(result);
    
   /*
    $("#i").on("input", function () {
        var content = $("#i").val();
		if(content.match(/^\d+$/)){
            $("#alert").html('');
			return true;
		}
		else{
		    console.log( $("#i").val().length);
		    var myval = $("#i").val().substring(0, $("#i").val().length - 1);
		    console.log(myval);
		    $("#alert").html('Вводить можно только цифры');
			$("#alert").css('color', 'red');
			$("#i").val(myval);
		}
    });
    */
}





function delFromWish(id) {
	var sessionId = $("#sessionId").val();
    $.ajax({
        async: false,
        type: "POST",
        url: "delFromWish.php",
        datatype: "text",
        data: 'usr=' + sessionId + '&id=' + id,
        error: function (response) {
            alert(response);
        },
        success: function (response) {
           console.log('успешно удалили из списка избранных');
           wishlist();
        }
    });
}

function payoutToDb() {
    
    var summ = $("#summ").val();
    var number = $('#number').val();
    
    $.ajax({
        async: false,
        type: "POST",
        url: "payoutToUser.php",
        datatype: "text",
        data: 'summ=' + summ + '&number=' + number,
        error: function (response) {
            alert('Ошибка')
        },
        success: function (response) {
            if(response == '1'){
                $("#summ").val(' ');
                swal("Произошла ошибка во время выплаты. Попробуйте снова позже.")
                    .then((value) => {
                    window.location.reload();
            });
            }
            if(response == '2'){
                $("#summ").val(' ');
                swal("Ошибка счета. Такой счет не найден")
                    .then((value) => {
                    window.location.reload();
            });
            }
            else{
                $("#summ").val(' ');
                swal("Заявка на вывод денег успешно подана", "Запрос на вывод денежных средств отправлен. Срок обрабоки от 1 минуты до 3 суток", "success")
                    .then((value) => {
                    window.location.reload();
            });
            }
        }
    });
}

function balanceChecker(){
    var balance = +$("#forvideo").text();
    var summ = $("#summ").val();
    console.log(balance);
    var result = summ > balance;
    
    if(result){
      $("#paybutton").removeClass();
      $("#paybutton").addClass("btn btn-danger");
      $("#paybutton").attr("disabled", "disabled");
      $("#summ-error").text('Сумма для вывода не может превышать Ваш текущий баланс: ' + balance).css("background", "red");
     // alert('Сумма для вывода не может превышать Ваш текущий баланс');
    }
    else{
      $("#paybutton").removeClass();
      $("#paybutton").addClass("btn btn-success");
      $("#paybutton").removeAttr("disabled", "disabled");
      $("#summ-error").text("");
    }
    
    
    

}

function mouseovertest() {
    $("userEmail").mouseenter(function(){
    $("userEmail").css('backbround', 'red');
});
}

/*function forvideo(){
    setInterval(function(){
        var balance = +$("#forvideo").text();
        $("#forvideo").text(balance + 1000000);
    }, 500)
}*/


function suptextareacleaner(){
    $("#textToSup").val("");
}


function sendTextToSup() {
    
    var text = $("#textToSup").val();
    var header = $("#ticketHeader").val();
    
    $.ajax({
        async: false,
        type: "POST",
        url: "sendTextToSup.php",
        datatype: "text",
        data: 'textToSup=' + text + '&ticketHeader=' + header,
        error: function (response) {
            alert('OIIIubka')
        },
        success: function (response) {
            $("#textToSup").val(" ");
            $("#supportModalButton").click();
            $("#ticketHeader").val(' ');
            swal("Вы успешно отправили тикет", "В ближайшее время Вам ответят", "success");
        }
    });
}

function loadUserTickets(){
    
     $.ajax({
        async: false,
        type: "POST",
        url: "showUserTickets.php",
        error: function (response) {
            alert('OIIIubka')
        },
        success: function (response) {
           $("#modal-body7").html(response);
        }
    });
}





