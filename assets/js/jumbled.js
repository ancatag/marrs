$(document).ready(function(){

    $('#jumbleQuestionsView ').ready(GetJumblQuesType);
     $('#questPaperView').ready(GetJumblQues);


    $("#jumQuespapBtn").click(function(e){
        e.preventDefault();
        //console.log($("#jumQuespap").serializeAssoc());
        var url = path + "stu/jumblResCheck/" + ext_id;
        $.ajax({
            url: url,
            type: "POST",
            data: $("#jumQuespap").serializeAssoc(),
            dataType: "json",
            beforeSend: function(XMLHttpRequest) {
            },
            complete: function(XMLHttpRequest, textStatus) {
            },
            success: function(rsp, textStatus){
                //  console.log(rsp);
                //  console.log(rsp.data);
                //  console.log(rsp.data.length);
                for(i = 0; i<rsp.data.length; i++){
                    $(".jumblQuesRes").append("<div class='media text-muted pt-3 newsfeeds-div'> <p class='media-body pb-3 mb-0 small lh-125 border-bottom border-gray'> <strong class='d-block text-gray-dark'>"+(i+1)+'.'+rsp.data[i].jum_id+"</p></div>");
                }	
            
                //window.location.href = path+'stu/index';
            },
            error: function(XMLHttpRequest, err) {
            alert('Something went wrong');
            }
        });
    });
});
function GetJumblQues() {
    // e.preventDefault();
    var url = path + "stu/jumblQues";
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
        //createInstance();
        for(i = 0; i<rsp.data.length; i++){
          
        $(".jumlQuestions").append("<div class='media text-muted pt-3 newsfeeds-div'> <p class='media-body pb-3 mb-0 small lh-125 border-bottom border-gray'> <strong class='d-block text-gray-dark'>"+(i+1)+'.'+rsp.data[i].jumbled_questions+"</p><input type='text' style='width:120px;' class='form-control' id='"+rsp.data[i].jum_id+"' name='"+rsp.data[i].jum_id+"' placeholder='text answer'></div>");
        }
            // window.location.href = path+'stu/index';
        },
        error: function(XMLHttpRequest, err) {["0"].jumbled_questions
        alert('Something went wrong');
        }
    });
}


function getExamDetailsWithId(ext_id) {
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
            // console.log(rsp);
            $('#quesTypesModal #quesTypesModal_Title').text(rsp.data.ext_type);
            $('#quesTypesModal #quesTypesModal_Body').text(rsp.data.ext_description);
            $('#quesTypesModal #quesTypesModal_Button').attr('href',path+"stu/createInstance/"+rsp.data.ext_id);
            $('#quesTypesModal').modal('show');
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

function GetJumblQuesType() {
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
                $("#quesTypes").append('<div class="col-md-4"><br><a onclick="getExamDetailsWithId('+rsp.data[i].ext_id+')" id="jum" class="btn btn-secondary btn-lg btn-block"  role="button" aria-pressed="true"><h6><br>'+rsp.data[i].ext_type+'</h6></a> </div>');
            }	
            // window.location.href = path+'stu/index/'+ext_id;
        },
        error: function(XMLHttpRequest, err) {
        alert('Something went wrong');
        }
    });
}


//here//
//console.log(questsPractJumb.timeLimit);
//$('#jumPractQuespap').html("\<div class='container'>\\
cdreset(questsPractJumb.timeLimit);//timer reset
countdown();//timer start
for (var i=0; i<questsPractJumb.length; i++){
    $('#jumPractQuespap').append("\
        <div class='questsIndDiv"+i+ " questsIndDiv media text-muted pt-3 newsfeeds-div container ' style='display:none'>\
            <div class='row'>\
                <div class='col-sm-4'>\
                    <p class='media-body pb-3 mb-0 lh-225'> \
                    <strong class='d-block text-gray-dark jumques'>" +(i+1)+ ")" +questsPractJumb[i].jumbled_questions+"</strong></p>\
                </div>\
                <div class='col-sm-3'>\
                    <input type='text' name='"+questsPractJumb[i].jum_id+"' id='"+questsPractJumb[i].jum_id+"'  class='form-control ansInput' placeholder='text answer'>\
                <span></span>\
                </div>\
            </div><br>\
            <div class='row'>\
                <div class='hintDiv col-sm-10'>\
                    <p>hint: <small>"+questsPractJumb[i].jum_hints+"</small></p>\
                </div>\
            </div>\
        </div>\
    ");
    
} 

$('.questsIndDiv0').css("display", "block");

$('#jumPractQuespap').append("\
<div class='button_class'>\
    <div class='row'>\
        <div class='col-sm-10'>\
        <a id='quitBtn' class='btn btn-danger quitAndSubmitBtn' onclick='quitAndSubmit(event)'>Quit Exam</a>\
        <a id='goHome_Btn' class='btn btn-danger quitAndSubmitBtn' style='display:none'>Quit Exam</a>\
        <a id='nxtBtn' class='btn btn-info' id='nxtBtn' onclick='displayNext()'>Next</a>\
        <button id='practiceJumbResult_Btn' type='submit' class='btn btn-primary quitAndSubmitBtn' onclick='quitAndSubmit(event)' style='display:none'>Submit Answer</button>\
        <a id='detailReport_Btn' class='btn btn-warning' onclick='openReportCard();' style='display:none'>Detail Report</a>\
        </div>\
    </div>\
    </div>\
      "); 

      $('#quitBtn').hide();
     // for (var i=0; i<questsPractJumb.length; i++){
function timeOut() {
    cdreset(questsPractJumb.timeLimit);//timer reset
    countdown();//timer start 
    displayNext();
}
var timer = setInterval(timeOut, secondToMilli(questsPractJumb.timeLimit));
// Then, later at some future time, 
// to restart a new 4 second interval starting at this exact moment in time
   
function displayNext(){
    clearInterval(timer);
    cdreset(questsPractJumb.timeLimit);//timer reset
    countdown();//timer start
    timer = setInterval(timeOut, secondToMilli(questsPractJumb.timeLimit));

        
        if($('.questsIndDiv:visible:last input').val() == ''){
            $('.questsIndDiv:visible:last input').val('------');
        }
       // $('.questsIndDiv:visible:last').next().css("display", "block");
        
            $('.questsIndDiv:visible:last').next().css("display","block");
            $('.questsIndDiv:visible:last').prev().hide();
            $('#quitBtn').show();
 
    
    var lastID =  $('.questsIndDiv:visible:last input').attr('id');
        // console.log($('.questsIndDiv:nth-last-child(2)'));
        var id = questsPractJumb[(questsPractJumb.length-1)].jum_id;
        // console.log(lastID);
        // console.log(id);
        if(lastID == id){
          
            // Lstime = secondToMilli(questsPractJumb.timeLimit);
            // var timeoutHandle = setTimeout(function() {
            $('#practiceJumbResult_Btn').show();
            $('#nxtBtn').hide();
            
            clearInterval(timer);
            Lstime = secondToMilli(questsPractJumb.timeLimit);
            var timeoutHandle = setTimeout(function() {
                if($('.questsIndDiv:visible:last input').val() == ''){
                    $('.questsIndDiv:visible:last input').val('------');
                }
                clearTimeout(timeoutHandle);
                $("#practiceJumbResult_Btn").trigger('click');
                $('#practiceJumbResult_Btn').hide();
                //console.log(Lstime);
            },Lstime);

            $("#practiceJumbResult_Btn").click(function(){ 
               clearTimeout(timeoutHandle);
            //    event.stopPropagation();
                // var timeoutHandle = setTimeout(function() {
                if($('.questsIndDiv:last input').val() == ''){

                    $('.questsIndDiv:last input').val('------');
                    
                    // console.log($('.questsIndDiv span'));
                    // $(ht).siblings('span').append("<i class='fa fa-ban'></i>").prev().hide();
                    $("#practiceJumbResult_Btn").trigger('click');
                    $('#practiceJumbResult_Btn').hide();
                    cdpause();
                    

                }        
            // },Lstime);  
            clearTimeout(timeoutHandle);
              });
              
        }
        $("#quitBtn").click(function(){ 
            // event.stopPropagation();
            
            $('#practiceJumbResult_Btn').hide();
            clearTimeout(timeoutHandle);
            clearInterval(timer);
            cdpause();
                   
           // console.log($('#jumPractQuespap .questsIndDiv:visible:last'));
           $('#nxtBtn').hide();
            if($('.questsIndDiv:visible:last input').val() == ''){

                $('.questsIndDiv:visible:last input').val('------');
                // if($('.questsIndDiv:visible:last').next().val()==''){
    
                    
                    
                //    var check = $('.questsIndDiv input').attr('name');
                //    console.log(check);
                  
                    $("#quitBtn").trigger('click');
                   
                    
                    clearTimeout(timeoutHandle);
                    $('#nxtBtn').hide();
                    $('#practiceJumbResult_Btn').hide();
                    $('#quitBtn').hide();
                    $('#goHome_Btn').show();
                    clearInterval(timer);
                    cdpause();
                   
                   
                    // var check = $('.questsIndDiv input').attr('name');
                    //    console.log(check);
                    
                //    console.log(check); $('.questsIndDiv').slideUp();
              
               
              
              
                // $('div.questsIndDiv:visible:last').next().hide();
            }
          
             // $('.questsIndDiv:visible:last').next().detach(); 
            
            
            // $("#quitBtn").show();
            // $("#detailReport_Btn").show();
      
     
        
    });  
  
    
    
}
// $(document).ready(function(){
//     $(".questsIndDiv > div").each(function(e) {
//         if (e != 0)
//             $(this).hide();
//     });
// });

$("#goHome_Btn").click(function(){ 
    
    if (confirm("You have no answered anything, do you want to redirect it to the home page?")) {
        window.location.href = path+'stu'; 
    }
});
// $("#quitBtn").click(function(){ 
//     // if($('.questsIndDiv:visible:last input').val() == ''){
//         $('.questsIndDiv').next().slideUp();
//     // }
//     });
// $(document).ajaxComplete(function(){
//     $("#practiceQuesTypesModal_Btn").click(function(e){
//         e.preventDefault();
//         var url = path + "stu/whichPractQues";
//         $.post(url,$("#practiceQuesTypesModal_Form").serialize());
//       // window.location.href = path+'stu/whichPractQues';
 //  });
//});
    //   }

function openReportCard(){
    //alert();
    $('#detailReportModal').modal('show');
}

    function quitAndSubmit(event){
        console.log(event);
        event.preventDefault();
        var url = path + "stu/jumblResCheck/" + ext_id;
        data = $( "#jumPractQuespap input").filter(function () {
            return !!this.value;
        }).serializeAssoc();
       console.log(data);
        $.ajax({
            url: url,
            type: "POST",
            data: data,
            dataType: "json",
            beforeSend: function(XMLHttpRequest) {
            },
            complete: function(XMLHttpRequest, textStatus) {
            },
            success: function(rsp, textStatus){
               // console.log(rsp);
                if(rsp.status == true){
                    $(".ansInput").attr("disabled", true);
                    var i = 0;    var sum =0; var wr =0;  var sk =0;
                    for (var key in rsp.data.resultData) {
                        // console.log(rsp.data.resultData.length);
                        // console.log(rsp);

                        if(rsp.data.resultData[key] == 'TRUE'){
                            sum++;
                            //console.log(rsp.data.resultData[key]);
                        //alert('Correct');
                            var ht = "#"+key;
                            $(ht).siblings('span').html("<i class='fa fa-check'></i>");
                           // console.log($('.questsIndDiv').siblings('span')); 
                            // $('.questsIndDiv').prev().hide();
                            $("#detailReportModal_Body table").append("\<table>\
                    <tr><td>Total No.Of.Questions:</td><td>"+(sum+wr+sk)+"</td></tr>\
                    <tr><td>No.Of.Correct Answer:</td><td>"+sum+"</td></tr>\
                    <tr><td>No.Of.Wrong Answer:</td><td>"+wr+"</td></tr>\
                    <tr><td>No.Of.Skipped Questions:</td><td>"+sk+"</td></tr>\
                    <tr><td>Final Result:</td></tr>\
                        ");
                            i++;
                            
                        }else if(rsp.data.resultData[key] == '------'){
                            sk++;
                            var ht = "#"+key;
                           // console.log($('.questsIndDiv').parent('.col-sm-3'));
                            $(ht).siblings('span').html("<i class='fa fa-ban'></i>");
                            $("#detailReportModal_Body table").html("\<table>\
                    <tr><td>Total No.Of.Questions:</td><td>"+(sum+wr+sk)+"</td></tr>\
                    <tr><td>No.Of.Correct Answer:</td><td>"+sum+"</td></tr>\
                    <tr><td>No.Of.Wrong Answer:</td><td>"+wr+"</td></tr>\
                    <tr><td>No.Of.Skipped Questions:</td><td>"+sk+"</td></tr>\
                    <tr><td>Final Result:</td></tr>\
                ");
                
                    i++;
                        }else{
                            wr++;
                            //alert('Wrong');
                            var ht = "#"+key;
                            $(ht).siblings('span').html("<i class='fa fa-close'></i>");
                            $("#detailReportModal_Body table").html("\<table>\
                    <tr><td>Total No.Of.Questions:</td><td>"+(sum+wr+sk)+"</td></tr>\
                    <tr><td>No.Of.Correct Answer:</td><td>"+sum+"</td></tr>\
                    <tr><td>No.Of.Wrong Answer:</td><td>"+wr+"</td></tr>\
                    <tr><td>No.Of.Skipped Questions:</td><td>"+sk+"</td></tr>\
                    <tr><td>Final Result:</td></tr>\
                ");
                            i++;
                            
                        }
                        // alert("User " + rsp.data.resultData[key] + " is #" + key); // "User john is #234"
                    }
                //     $("#detailReportModal_Body table").html("\<table>\
                //     <tr><td>Total No.Of.Questions:</td><td>"+(sum+wr)+"</td></tr>\
                //     <tr><td>No.Of.Correct Answer:</td><td>"+sum+"</td></tr>\
                //     <tr><td>No.Of.Wrong Answer:</td><td>"+wr+"</td></tr>\
                //     <tr><td>No.Of.Skipped Questions:</td><td>"+sk+"</td></tr>\
                //     <tr><td>Final Result:</td></tr>\
                //    ");
                    $("#detailReportModal_Body #totalMarksObt").val(rsp.data.jumbTotalMark);
                    $("#detailReportModal_Body table").addClass('table-striped');
                    $('#detailReport_Btn').show();
                    $('#detailReportModal').modal('show');
                    $('.questsIndDiv').show();
                    //  console.log(rsp.data);
                    //  console.log(rsp.data.length);
                    // for(i = 0; i<rsp.data.length; i++){
                    //     $(".jumblQuesRes").append("<div class='media text-muted pt-3 newsfeeds-div'> <p class='media-body pb-3 mb-0 small lh-225 border-bottom border-gray'> <strong class='d-block text-gray-dark'>"+(i+1)+'.'+rsp.data[i].jum_id+"</p></div>");
                    // }	
                
                    //window.location.href = path+'stu/index';  
                }else if(rsp.status == false){
                    if (confirm("You have no answered anything, do you want to redirect it to the home page?")) {
                        window.location.href = path+'stu';
                    }
                } 

            },
            error: function(XMLHttpRequest, err) {
            alert('Something went wrong');
            }
        });
       
    }
    $("#quitBtn").click(function(){ 
        // if ($(".questsIndDiv:visible:last").length !=0){
         
        console.log($(".questsIndDiv:visible:last").nextAll());
            
           $(".questsIndDiv:visible:last").nextAll().css("visibility", "hidden");
           $("#jumPractQuespap .button_class").css('visibility','visible');
           console.log($("#jumPractQuespap .button_class"));
        // }
        });
// $(document).ready(createQuestionPaper);
//  function createQuestionPaper(){
//     var indQuestsPractJumb = 0;
//      do {
//          console.log(questsPractJumb.jumbled_questions);
//          $('#jumPractQuespap').html("\
//              <div class='questsIndDiv media text-muted pt-3 newsfeeds-div'>\
//              <p class='media-body pb-3 mb-0 small lh-125 border-bottom border-gray'> \
//              <strong class='d-block text-gray-dark'>"+questsPractJumb.jumbled_questions+"</strong></p>\
//              <input type='text' name='"+questsPractJumb.jum_id+"' id='"+questsPractJumb.jum_id+"' style='width:120px;' class='form-control ansInput' placeholder='text answer'><span></span>\
//              </div>\
//          ");
//          // $('#jumPractQuespap .questsIndDiv p').text(questsPractJumb.jumbled_questions); 
//           // $('#jumPractQuespap .questsIndDiv input').attr({name:questsPractJumb.jum_id, id:questsPractJumb.jum_id})
//      }while(indQuestsPractJumb === 'undefined'){
//          indQuestsPractJumb = questsPractJumb.shift();
//          $('#jumPractQuespap').append("\
//          <div class='questsIndDiv media text-muted pt-3 newsfeeds-div'>\
//          <p class='media-body pb-3 mb-0 small lh-125 border-bottom border-gray'> \
//          <strong class='d-block text-gray-dark'>"+indQuestsPractJumb.jumbled_questions+"</strong></p>\
//          <input type='text' name='"+indQuestsPractJumb.jum_id+"' id='"+indQuestsPractJumb.jum_id+"' style='width:120px;' class='form-control ansInput' placeholder='text answer'><span></span>\
//          </div>\
//          ");
//          // $('#jumPractQuespap .questsIndDiv p').text(indQuestsPractJumb.jumbled_questions); 
//          // $('#jumPractQuespap .questsIndDiv input').attr({name:indQuestsPractJumb.jum_id, id:indQuestsPractJumb.jum_id})
//      }
//      $('#jumPractQuespap').html("\
//      <a class='btn btn-warning next' onclick='createQuestionPaper()'>Next</a>\
//      <button id='practiceJumbResult_Btn' type='submit' class='btn btn-primary'>Submit Answer</button>\
//      <a id='detailReport_Btn' class='btn btn-warning' onclick='openReportCard();' style='display:none'>Detail Report</a>\
//    ");
//  }
// function createQuestionPaper(){
//     

//     var i = 0;
// do {
//     alert(questsPractJumb[i].jumbled_questions);
//     $('#jumPractQuespap .questsIndDiv p').text(questsPractJumb[i].jumbled_questions);
//     i++;
// }
// while (i < questsPractJumb.length);
// console.log(questsPractJumb{);
// setInterval(function(){console.log(questsPractJumb.shift())},5000);

// console.log(questsPractJumb);
// $(document).ready(firstQues);
// function firstQues(){
//     $('#jumPractQuespap .questsIndDiv p').text(questsPractJumb[0].jumbled_questions);
// }
// function createQuestionPaper(){
//     indQuestsPractJumb = questsPractJumb.shift();
//     $('#jumPractQuespap .questsIndDiv p').text(indQuestsPractJumb.jumbled_questions);  
// }
// while (i < questsPractJumb.length);
//  console.log(questsPractJumb);
//      setInterval(function(){console.log(questsPractJumb.shift())},5000);
 ///////////////////////////////////////////////////////////////////////////////////////////
 
//console.log(questsPractJumb);
// $(document).ready(createQuestionPaper);
// function createQuestionPaper(){
// if(questsPractJumb.jum_id === "TRUE")
// {
//     $('#jumPractQuespap').html("\
//     <div class='questsIndDiv media text-muted pt-3 newsfeeds-div'>\
//     <p class='media-body pb-3 mb-0 small lh-125 border-bottom border-gray'> \
//     <strong class='d-block text-gray-dark'>"+questsPractJumb[0].jumbled_questions+"</strong></p>\
//     <input type='text' name='"+questsPractJumb.jum_id+"' id='"+questsPractJumb.jum_id+"' style='width:120px;' class='form-control ansInput' placeholder='text answer'><span></span>\
//     </div>\ ");
// }
// }
