 $(document).ready(function(){
   $("a.lightbox").nivoLightbox();
 });

// function check(){
//     if($('#check').prop('checked')){
//     $('#sendbtn').removeAttr('disabled');
// 	}
// 	else{
//     $('#sendbtn').attr('disabled', 'true');
// 	}
// }

 function paidCheck(){
     if($('#check').prop('checked')){
         $('#price').css('display', 'block');
     }
     else{
         $('#price').css('display', 'none');
     }
 }

function doAuth() {
    var login = $("#login").val();
    var password = $("#pwd").val();

    $.ajax({
        async: false,
        type: "POST",
        url: "https://kod1197.ru/lp/doAuth.php",
        datatype: "text",
        data: 'login=' + login + '&password=' + password,
        error: function (response) {
            alert(response);
        },
        success: function (response) {
            $("#aerrors").html(response);
            $("#pwd").val('');
            $("#login").val('');
            setTimeout(function () {
                if($("#aerrors").text() === ""){
                    // window.location.replace("kod1197.ru/lp");
                    window.location.reload();
                }
            }, 250);
        }
    });
}

function doReset() {
    var secretword = $("#secret_word").val();
    var resetemail = $("#reset_email").val();

    $.ajax({
        async: false,
        type: "POST",
        url: "https://kod1197.ru/lp/reseter.php",
        datatype: "text",
        data: 'Email=' + resetemail + '&secret=' + secretword,
        error: function (response) {
            alert(response);
        },
        success: function (response) {
            $("#errors").html(response);
            $("#pwd").val('');
            $("#login").val('');
            setTimeout(function () {
                if($("#errors").text() === ""){
                    // window.location.replace("https://kod1197.ru/lp");
                    window.location.reload();
                }
            }, 250);
        }
    });
}

function doSignup() {
    var login = $("#rlogin").val();
    var password = $("#rpassword").val();
    var password_2 = $("#rpassword_2").val();
    var email = $("#remail").val();
    var secret = $("#rsecret").val();
    if($("#check").prop('checked')){
        var rules = 'agreed';
    }
    else{
        var rules = '';
    }

    $.ajax({
        async: false,
        type: "POST",
        url: "https://kod1197.ru/lp/doSignup.php",
        datatype: "text",
        data: 'login=' + login + '&password=' + password + '&password_2=' + password_2 + '&email=' + email + '&secret=' + secret + '&rules=' + rules,
        error: function (response) {
            alert(response);
        },
        success: function (response) {
            $("#rerrors").html(response);
            setTimeout(function () {
                if($("#rerrors").text() === ""){
                   // window.location.replace("https://kod1197.ru/lp");
                    window.location.reload();
                }
            }, 250);
        }
    });
}


function toWishlist(){
 
 var id = $(".favorites").attr('id');
 
 
 $.ajax({
        async: false,
        type: "POST",
        url: "https://kod1197.ru/lp/upload/toWishlist.php",
        datatype: "text",
        data: 'id=' + id,
        error: function (response) {
            alert(response);
        },
        success: function (response) {
            $('#error').html('<div class="alert alert-warning alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Добавленно в избранное</div>');
        }
    });
 
}  

function edit() {
   var editname = $("#edit-name").val();
   var editauthor = $("#edit-author").val();
   var editdate = $("#edit-date").val();
   var editprice = $("#edit-price").val();
   var editpaid = $("#edit-paid").val();
   var id = $("#idImg").val();
   

    $.ajax({
        async: false,
        type: "POST",
        url: "https://kod1197.ru/lp/upload/edit.php",
        datatype: "text",
        data: 'editname=' + editname + '&editauthor=' + editauthor + '&editdate=' + editdate + '&editprice=' + editprice + '&editpaid=' + editpaid + "&id=" + id,
        error: function (response) {
            alert(response);
        },
        success: function (response) {
            window.location.reload();
        }
    });
}


