$(function() {
    $('#login-form-link').click(function(e) {
		$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
});
$(document).ready(function(){
    $('#useEmail').click(function(){
        $(this).closest('div').hide(); 
        $('#emailIp').show(); 
    });
    $('#useUsername').click(function(){
        $(this).closest('div').hide(); 
        $('#usernameIp').show(); 
	});
});
function dismissAlert(){
	$("#notiProfile").hide();   
}
clearTimeout(alertTim);
var alertTim = setInterval(showAlert, 600000);
// var alertTim = setInterval(showAlert, 3000);
function showAlert(){
	var url = path + "stu/profileComplete";
	if(session_id != false){
		$.ajax({
			url: url,
			type: "POST",
			data: null,
			dataType: "json",
			beforeSend: function(XMLHttpRequest) {
			},
			complete: function(XMLHttpRequest, textStatus) {
			},
			success: function(rsp, textStatus){
				console.log(rsp);
				if(rsp != 100){
					$("#notiProfile").show();   
				}else{
					$("#notiProfile").hide();  
				}
			},
			error: function(XMLHttpRequest, err) {
			alert('Something went wrong');
			}
		});
	}
	if(session_id != false){
		$.ajax({
			url: url,
			type: "POST",
			data: null,
			dataType: "json",
			beforeSend: function(XMLHttpRequest) {
			},
			complete: function(XMLHttpRequest, textStatus) {
			},
			success: function(rsp, textStatus){
				console.log(rsp);
				if(rsp != 100){
					$("#notiProfile").show();   
				}else{
					$("#notiProfile").hide();  
				}
			},
			error: function(XMLHttpRequest, err) {
			alert('Something went wrong');
			}
		});
	}
}
function showNotice(){
	$('#noticeBoard').show();
}
$('#notiProfile').ready(function(){
	var alertTim = 0;
	var url = path + "stu/profileComplete";
	if(session_id != false){
		$.ajax({
			url: url,
			type: "POST",
			data: null,
			dataType: "json",
			beforeSend: function(XMLHttpRequest) {
			},
			complete: function(XMLHttpRequest, textStatus) {

			},
			success: function(rsp, textStatus){
				if(rsp != 100){
					$('#notiProfile span#notiPerc').text(rsp);
				}else{
					$("#notiProfile").hide();  
				}
			},
			error: function(XMLHttpRequest, err) {
			alert('Something went wrong');
			}
		});
	}
});