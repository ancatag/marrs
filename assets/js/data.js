$(document).ready(function(){
    $('#practiceQuesTypeView').ready(GetPracticeQuesType);
    // $('.questsIndDiv').each(function(i, obj) {
    //     //test

    // });
    // $('.questsIndDiv:nth-child(1)').show()
    // var n = 2
    // $('.next').click(function(e){
    //     $('.questsIndDiv').hide();
    //     $('.questsIndDiv:nth-child('+n+')').show();
    // var demo_l = $('.questsIndDiv').length;
    // if(n == demo_l){
    //     $('.next').attr('disabled', 'disabled');
    // }
    // n++;
    // });

    ////////////Online Practice//////
function GetPracticeQuesType() {
    // e.preventDefault();
    var url = path + "stu/getQuesType";
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
            // console.log(rsp);
            // console.log(rsp.data[0].ext_id);
            //for(i = 0; i<rsp.data.length; i++){
                //$(".questypes").append('<div class="container"> <div class="row"><div class="col-md-4"><br><a href="'+path+'stu/jumblGet/'+rsp.data[0].ext_id+'" id="jum" class="btn btn-secondary btn-lg btn-block"  role="button" aria-pressed="true"><h6><br>JUMBLED </h6></a> </div> </div><div class="col-md-4"><br> <a href="#" id="style"class="btn btn-secondary btn-lg btn-block"  role="button" aria-pressed="true"><br><h6>DICTATION/<br>SPELL IT </h6></a> </div><div class="col-md-4"><br><a href="#" id="style" class="btn btn-secondary btn-lg btn-block"  role="button" aria-pressed="true"><br><h6>IDENTIFY CORRECT<br> SPELLING</h6></a></div></div></div>');
            for(i = 0; i<rsp.data.length; i++){  
                // alert(rsp.data[i].ext_load_img);  
                $("#practiceQuesTypes").append('\
                <div class="container">\
                <br>\
                <div class="row">\
                <div class="col-md-12">\
                <div class="card bg-dark text-white">\
                <a onclick="getOnlineExamDetailsWithId('+rsp.data[i].ext_id+')" id="jum" aria-pressed="true">\
                <img class="card-img" src="'+path+rsp.data[i].ext_load_img+'" width="500" height="300" alt="Card image">\
                <div class="card-img-overlay">\
                <h5 class="card-title">'+rsp.data[i].ext_type+'</h5>\
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>\
                <p class="card-text">Last updated 3 mins ago</p>\
                </div>\
                </a>\
                </div>\
               </div>\
                </div>\</div>\
                ');
            }	
            // window.location.href = path+'stu/index/'+ext_id;
        },
        error: function(XMLHttpRequest, err) {
        alert('Something went wrong');
        }
    });
}

    $("#stuSignupBtn").click(function(e){
        e.preventDefault();
        var url = path + "stu/createStu";
        $.ajax({
            url: url,
            type: "POST",
            data: $("#stuSignupForm").serialize(),
            dataType: "json",
            beforeSend: function(XMLHttpRequest) {
            },
            complete: function(XMLHttpRequest, textStatus) {
            },
            success: function(rsp, textStatus){
                //console.log(rsp);
                window.location.href = path+'stu/index';
            },
            error: function(XMLHttpRequest, err) {
            alert('Something went wrong');
            }
        });
    });
    $("#stuSignupForm #stuUsername").on('change', function(e){
        e.preventDefault();
        var url = path + "stu/checkStuUsername";
        $.post(url, {stuUsername: $("#stuUsername").val()}, function(rsp){
            var rsp = JSON.parse(rsp);
            if(rsp.status === true){             
                $("#stuUsername").addClass("is-invalid");
                if($("#stuUsername").hasClass("is-valid")){
                    $("#stuUsername").removeClass("is-valid"); 
                }    
                $("#stuUsername").addClass("is-invalid");
                $("#stuUsername").siblings(".invalid-feedback").show();
            }
            else{
                $("#stuUsername").addClass("is-valid");
                if($("#stuUsername").hasClass("is-invalid")){
                    $("#stuUsername").removeClass("is-invalid"); 
                }   
                $("#stuUsername").siblings(".valid-feedback").show();
            }
        });
    });
    $("#stuSigninForm #stuUsername").on('change', function(e){
        e.preventDefault();
        var url = path + "stu/checkStuUsername";
        $.post(url, {stuUsername: $("#stuUsername").val()}, function(rsp){
            var rsp = JSON.parse(rsp);
            if(rsp.status === false){             
                $("#stuUsername").addClass("is-invalid");
                if($("#stuUsername").hasClass("is-valid")){
                    $("#stuUsername").removeClass("is-valid"); 
                }    
                $("#stuUsername").addClass("is-invalid");
                $("#stuUsername").siblings(".invalid-feedback").show();
            }
            else{
                $("#stuUsername").addClass("is-valid");
                if($("#stuUsername").hasClass("is-invalid")){
                    $("#stuUsername").removeClass("is-invalid"); 
                }   
                $("#stuUsername").siblings(".valid-feedback").show();
            }
        });
    });
    $("#stuUpdateForm #stuUsername").on('change', function(e){
        e.preventDefault();
        var url = path + "stu/checkStuUsername";
        $.post(url, {stuUsername: $("#stuUsername").val()}, function(rsp){
            var rsp = JSON.parse(rsp);
            if(rsp.status === true && rsp.stuUsername == currentStuUsername){    
                $("#stuUsername").siblings(".username-valid-feedback").hide();
                $("#stuUsername").addClass("is-valid");
                if($("#stuUsername").hasClass("is-invalid")){
                    $("#stuUsername").removeClass("is-invalid"); 
                }   
                $("#stuUsername").siblings(".chosen-username-valid-feedback").show();
            }
            else if(rsp.status === true){    
                $("#stuUsername").siblings(".chosen-username-valid-feedback").hide();
                $("#stuUsername").addClass("is-invalid");
                if($("#stuUsername").hasClass("is-valid")){
                    $("#stuUsername").removeClass("is-valid"); 
                }    
                $("#stuUsername").addClass("is-invalid");
                $("#stuUsername").siblings(".username-invalid-feedback").show();
            }
            else{
                $("#stuUsername").siblings(".chosen-username-valid-feedback").hide();
                $("#stuUsername").addClass("is-valid");
                if($("#stuUsername").hasClass("is-invalid")){
                    $("#stuUsername").removeClass("is-invalid"); 
                }   
                $("#stuUsername").siblings(".username-valid-feedback").show();
            }
        });
    });
    $("#stuSigninBtn").click(function(e){
        e.preventDefault();
        var url = path + "stu/authStu";
        $.ajax({
            url: url,
            type: "POST",
            data: $("#stuSigninForm").serialize(),
            dataType: "json",
            beforeSend: function(XMLHttpRequest) {
            },
            complete: function(XMLHttpRequest, textStatus) {
            },
            success: function(rsp, textStatus){
                //console.log(rsp.statusID);
                if(rsp.statusID==010){
                    window.location.href = path+'stu/index';
                }else{
                    //$(".alert").alert();
                    $("#stuSigninForm .alert").addClass('show').show();
                }
            },
            error: function(XMLHttpRequest, err) {
            alert('Something went wrong');
            }
        });
    });
    $("#stuUpdateBtn").click(function(e){
        e.preventDefault();
        var url = path + "stu/editStu";
        $.ajax({
            url: url,
            type: "POST",
            data: $("#stuUpdateForm").serialize(),
            dataType: "json",
            beforeSend: function(XMLHttpRequest) {
            },
            complete: function(XMLHttpRequest, textStatus) {
            },
            success: function(rsp, textStatus){
                //console.log(rsp);
                // window.location.href = path+'stu/index';
            },
            error: function(XMLHttpRequest, err) {
            alert('Something went wrong');
            }
        });
    });
   
    $('body').ready(GetNewsfeeds);
});
function GetNewsfeeds() {
    // e.preventDefault();
    var url = path + "stu/getAllNews";
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
            for(i = 0; i<rsp.data.length; i++){
                console.log(rsp.data[i].stuNewsTitle);
                $(".newsfeeds").append('<div class="media text-muted pt-3 newsfeeds-div"> <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray"> <strong class="d-block text-gray-dark">'+rsp.data[i].stuNewsTitle+'</strong>'+rsp.data[i].stuNewsContent+'</p></div>');
            }	
            // window.location.href = path+'stu/index';
        },
        error: function(XMLHttpRequest, err) {
        alert('Something went wrong');
        }
    });
}
function getOnlineExamDetailsWithId(ext_id) {
    // e.preventDefault();
    var url = path+ "stu/allQuesGet/" +ext_id;
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
            $('#practiceQuesTypesModal #practiceQuesTypesModal_Title').text(rsp.data.ext_type);
            $('#practiceQuesTypesModal_Body #examDesc').html("\
                <p>"+rsp.data.ext_description+"</p>\
            ");
            $('#practiceQuesTypesModal #formContents').html("\
            <div class='alert alert-warning' role='alert'>\
            <h5>WARNING !!!!!!</h5>\
            The Question will be shown as per the timing given below,after which it moves automatically. The timing can be adjusted by changing it below.\
            </div>\
            <input type='hidden' name='ext_id' value='"+rsp.data.ext_id+"'>\
            <div class='form-group'>\
            <label for='timeLimit'>Time Need For Each Question (Seconds) :</label>\
            <input type='text' class='form-control' id='timeLimit' name='timeLimit'>\
            </div>\
            <div class='form-group'>\
            <label for='quesLimit'>Enter the total number of questions you wish to attend :</label>\
            <input type='text' class='form-control' id='quesLimit' name='quesLimit'>\
            </div>\
            </div>\
            ");
            $('#practiceQuesTypesModal #practiceQuesTypesModal_Footer').html("\
            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>\
            <button type='button' class='btn btn-primary descElem'>Next</button>\
            <button id='practiceQuesTypesModal_Btn' type='submit' class='btn btn-primary formSelElem'>Start Exam</button></form>\
            ");
            // $('#practiceQuesTypesModal #practiceQuesTypesModal_Body').text(rsp.data.ext_description);
            // $('#practiceQuesTypesModal #practiceQuesTypesModal_Btn').attr('href',path+"stu/onlineWhichQues/"+rsp.data.ext_id);
            $('#practiceQuesTypesModal').modal('show');
            // console.log(rsp.data[0].ext_id);
            //for(i = 0; i<rsp.data.length; i++){
                //$(".questypes").append('<div class="container"> <div class="row"><div class="col-md-4"><br><a href="'+path+'stu/jumblGet/'+rsp.data[0].ext_id+'" id="jum" class="btn btn-secondary btn-lg btn-block"  role="button" aria-pressed="true"><h6><br>JUMBLED </h6></a> </div> </div><div class="col-md-4"><br> <a href="#" id="style"class="btn btn-secondary btn-lg btn-block"  role="button" aria-pressed="true"><br><h6>DICTATION/<br>SPELL IT </h6></a> </div><div class="col-md-4"><br><a href="#" id="style" class="btn btn-secondary btn-lg btn-block"  role="button" aria-pressed="true"><br><h6>IDENTIFY CORRECT<br> SPELLING</h6></a></div></div></div>');
            // for(i = 0; i<rsp.data.length; i++){    
            //     $("#quesTypes").append('<div class="col-md-4"><br><a href="'+path+'stu/jumblGet/'+rsp.data[0].ext_id+'" id="jum" class="btn btn-secondary btn-lg btn-block"  role="button" aria-pressed="true"><h6><br>'+rsp.data[i].ext_type+'</h6></a> </div>');
            // }	
            // // window.location.href = path+'stu/index/'+ext_id;
        },
        error: function(XMLHttpRequest, err) {
        alert('Something went wrong');
        }
    });
}   
$( document ).ajaxComplete(function() {
    $('button.descElem').click(function(){
        $('.descElem').hide();
        $('.formSelElem').show();
    });
    $( "button:contains('Close')" ).click(function(){
        $('.descElem').show('slow');
        $('.formSelElem').hide();
    });
});
