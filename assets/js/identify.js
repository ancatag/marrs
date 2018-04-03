cdreset(questsPractIdent.timeLimit);//timer reset
countdown();//timer start 
for (var i=0; i<questsPractIdent.length; i++){
    $('#identPractQuespap').append("\
        <div class='questsIndDiv"+i+ " questsIndDiv media text-muted pt-3 newsfeeds-div container ' style='display:none'>\
            <div class='row'>\
            <span></span>\
                <p>"+(i+1)+")</p>\
                    <div class='col'>\
                    <input type='radio'  name='"+questsPractIdent[i].idn_id+"' value='"+questsPractIdent[i].option1+"' id='"+questsPractIdent[i].idn_id+"' class='ansInput' /><label for='1'>"+questsPractIdent[i].option1+"</label>\
                    </div>\
                    <div class='w-100'></div>\
                    <div class='col'>&nbsp;&nbsp;&nbsp\
                    <input type='radio'  name='"+questsPractIdent[i].idn_id+"' value='"+questsPractIdent[i].option2+"' id='"+questsPractIdent[i].idn_id+"'  class='ansInput'/><label for='1'>"+questsPractIdent[i].option2+"</label>\
                    </div>\
                    <div class='w-100'></div>\
                    <div class='col'>&nbsp;&nbsp;&nbsp\
                    <input type='radio' name='"+questsPractIdent[i].idn_id+"' value='"+questsPractIdent[i].option3+"' id='"+questsPractIdent[i].idn_id+"' class='ansInput' /><label for='1'>"+questsPractIdent[i].option3+"</label>\
                    </div>\
                    <div class='w-100'></div>\
                    <div class='col' id='skipped' style='visibility: hidden'>\
                    <input type='radio' name='"+questsPractIdent[i].idn_id+"'  value='------' checked>\
                    </div>\
                    <div class='w-100'></div>\
            </div>\
        </div>\
            ");
}  
$('.questsIndDiv0').css("display", "block");
$('#identPractQuespap').append("\
    <div class='row'>\
        <div class='col-sm-10'>\
        <a id='quitBtn' class='btn btn-danger quitAndSubmitBtn' onclick='quitAndSubmit(event)'>Quit Exam</a>\
        <a class='btn btn-info' id='nxtBtn' onclick='displayNext()'>Next</a>\
        <button id='practiceDictResult_Btn' type='submit' class='btn btn-primary quitAndSubmitBtn' onclick='quitAndSubmit(event)' style='display:none'>Submit Answer</button>\
        <a id='detailReport_Btn' class='btn btn-warning' onclick='openReportCard();' style='display:none'>Detail Report</a>\
        </div>\
    </div>\
      "); 
      function timeOut() {
        cdreset(questsPractIdent.timeLimit);//timer reset
        countdown();//timer start 
        displayNext()
    }
    var timer = setInterval(timeOut, secondToMilli(questsPractIdent.timeLimit));
 // console.log(questsPractDict.timeLimit);
      function displayNext(){
             clearInterval(timer);
             cdreset(questsPractIdent.timeLimit);//timer reset
             countdown();//timer start 
    timer = setInterval(timeOut, secondToMilli(questsPractIdent.timeLimit));

    if($('.questsIndDiv:visible:last input').val() == ''){
        $('.questsIndDiv:visible:last input').val('------');
        //$('.questsIndDiv:visible:last input').val('');
     }  
      $('.questsIndDiv:visible:last').next().css("display", "block");
      $('.questsIndDiv:visible:last').prev().hide();
 
     //  if($('.inputDiv:visible:last')){
     //     console.log('hello'); 
     //     $('#nxtBtn').hide();
     //     $('#practiceIdntResult_Btn').show();
     // }
    //console.log($('.questsIndDiv'+(questsPractIdent.length-1)+':visible'));
    var lastDiv = $('.questsIndDiv:last');
    //$('.questsIndDiv:visible:last').parent('.toCheck').siblings('.col').prev().hide();
    //console.log( $('.questsIndDiv:visible:last').parent('.toCheck').siblings('.col').prev().hide());
  console.log(lastDiv);
     if(lastDiv.is(':visible')){
  //// test///       
         //if($('.questsIndDiv'+(questsPractIdent.length-1)+':visible:input:last').val() != ''){
         //if($('.questsIndDiv'+(questsPractIdent.length-1)+':visible:input:last').val() != ''){
         // console.log(lastDiv); 
        //  $('.questsIndDiv:visible:last').prev().hide();
       
         $('#practiceDictResult_Btn').show();
         $('#nxtBtn').hide();
         cdpause();
        // if($('.questsIndDiv:visible:last').parent('.row').children('.col:last input').val('------')){
        clearInterval(timer);
        // }
        // console.log($('.questsIndDiv:visible:last').parent('.row').children('.col')); 
         //$('.questsIndDiv:visible:last').prev().show();
         //$('.questsIndDiv:visible:last').find('.col').show();
         // $('#identPractQuespap #skipped').css('visibility','visible');
     }
     else{ 
        $('.questsIndDiv:last').hide();
         
     }
    

}
       


function openReportCard(){
    //alert();
    $('#detailReportModal').modal('show');
}

    function quitAndSubmit(event){
       //console.log(event);
        event.preventDefault();
        var url = path + "stu/idnResCheck/" + ext_id;
        data = $( "#identPractQuespap input").filter(function () {
            return !!this.value; 
        }).serializeAssoc();
        //console.log(data);
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
                console.log(rsp);
                if(rsp.status == true){
                   
                    $(".ansInput").attr("disabled", true);
                    var i = 0;    var sum =0; var wr =0;  var sk =0;
                    for (var key in rsp.data.resultData) {
                        // console.log(rsp.data.resultData.length);
                        // console.log(rsp);

                        if(rsp.data.resultData[key] == 'TRUE'){
                            sum++;
                            console.log(rsp.data.resultData[key]);
                        //alert('Correct');
                            var ht = "#"+key;
                        //    $(ht).siblings('.toCheck').find('span').html("<i class='fa fa-check'></i>");
                           $(ht).parent().siblings('span').html("<i class='fa fa-check' ></i>");
                          
                          
                            $("#detailReportModal_Body table").append("\<table>\
                    <tr><td>Total No.Of.Questions:</td><td>"+(sum+wr+sk)+"</td></tr>\
                    <tr><td>No.Of.Correct Answer:</td><td>"+sum+"</td></tr>\
                    <tr><td>No.Of.Wrong Answer:</td><td>"+wr+"</td></tr>\
                    <tr><td>No.Of.Skipped Questions:</td><td>"+sk+"</td></tr>\
                    <tr><td>Final Result:</td></tr>\
                    </table>\
                        ");
                            i++;
                            
                        }else if(rsp.data.resultData[key] == '------'){
                            sk++;
                            var ht = "#"+key;
                            // $(ht).siblings('.toCheck').find('span').html("<i class='fa fa-check'></i>");
                            $(ht).parent().siblings('span').html("<i class='fa fa-ban'></i>");
                           // console.log($(ht).parent());
                            // $(ht).siblings('span').append("<i class='fa fa-ban'></i>");
                            $("#detailReportModal_Body table").html("\<table>\
                    <tr><td>Total No.Of.Questions:</td><td>"+(sum+wr+sk)+"</td></tr>\
                    <tr><td>No.Of.Correct Answer:</td><td>"+sum+"</td></tr>\
                    <tr><td>No.Of.Wrong Answer:</td><td>"+wr+"</td></tr>\
                    <tr><td>No.Of.Skipped Questions:</td><td>"+sk+"</td></tr>\
                    <tr><td>Final Result:</td></tr>\
                    </table>\
                ");
                    i++;
                        }else{
                            wr++;
                            //alert('Wrong');
                            var ht = "#"+key;
                            $(ht).parent().siblings('span').append("<i class='fa fa-close'></i>");
                          // console.log($(ht).parent().siblings('span').append("<i class='fa fa-close'></i>"));
                            $("#detailReportModal_Body table").html("\<table>\
                    <tr><td>Total No.Of.Questions:</td><td>"+(sum+wr+sk)+"</td></tr>\
                    <tr><td>No.Of.Correct Answer:</td><td>"+sum+"</td></tr>\
                    <tr><td>No.Of.Wrong Answer:</td><td>"+wr+"</td></tr>\
                    <tr><td>No.Of.Skipped Questions:</td><td>"+sk+"</td></tr>\
                    <tr><td>Final Result:</td></tr>\
                    </table>\
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
                    $("#detailReportModal_Body #totalMarksObt").val(rsp.data.idnTotalMark);
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
                }else if(rsp.status === false){
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