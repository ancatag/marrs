cdreset(questsPractDict.timeLimit);//timer reset
countdown();//timer start

for (var i=0; i<questsPractDict.length; i++){
    // console.log(questsPractDict.length);
    // console.log(path);
     console.log(questsPractDict[i].dictation_questions);
    
    //console.log(questsPractDict[i].dic_hints);
    $('#dictPractQuespap').append("\
        <div class='questsIndDiv"+i+ " questsIndDiv media text-muted pt-3 newsfeeds-div container ' style='display:none'>\
            <div class='row'>\
            "+(i+1)+" )\
                <div class='col'>\
                <audio id='audioQues' src='"+path+"assets/mp3/"+questsPractDict[i].dictation_questions+".mp3' controls controlsList='nodownload'>\
                <source type='audio/mpeg'>\
              </audio>\
                </div>\
                <div class='w-100'></div>\
                <div class='col'>\
                <input type='text' name='"+questsPractDict[i].dic_id+"' id='"+questsPractDict[i].dic_id+"' class='form-control ansInput' placeholder='text answer'/>\
                </div>\
                <div class='w-100'></div>\
                <div class='col'>\
                <p>hint: <small>"+questsPractDict[i].dic_hints+"</small></p>\
                </div>\
                <span></span>\
                </div>\
            </div>\
    ");
    // $('#audioQues').attr(src,path/assets/mp3/questsPractDict[i].dictation_questions.mp3);
    //$("#audioQues").attr('src',path+"assets/mp3/"+questsPractDict[i].dictation_questions+".mp3")
}  
$('.questsIndDiv0').css("display", "block");
$('#dictPractQuespap').append("\
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
        cdreset(questsPractDict.timeLimit);//timer reset
        countdown();//timer start
        displayNext()
    }
    var timer = setInterval(timeOut, secondToMilli(questsPractDict.timeLimit));
 // console.log(questsPractDict.timeLimit);
      function displayNext(){
             clearInterval(timer);
             cdreset(questsPractDict.timeLimit);//timer reset
             countdown();//timer start
    timer = setInterval(timeOut, secondToMilli(questsPractDict.timeLimit));
    if($('.questsIndDiv:visible:last input').val() == ''){
        $('.questsIndDiv:visible:last input').val('------');
    }
             $('.questsIndDiv:visible:last').next().css("display", "block");
            
            //  $('.questsIndDiv:visible:last').prev().show();
             if($('.questsIndDiv input:last').val() != ''){
                $('#practiceDictResult_Btn').show();
                $('#nxtBtn').hide();
                cdpause();
                clearInterval(timer);
            }else{
                $('.questsIndDiv:visible:last').prev().hide();
            }
            // if($('.questsIndDiv:visible:last input').val() == ''){
            //     $('.questsIndDiv:visible:last input').val('------');
            //     $('.questsIndDiv:visible:last').next().css("display", "block");
            //     $('.questsIndDiv:visible:last').prev().hide();
            // }
        }
       

// for (var i=0; i<questsPractDict.length; i++){
//     $('#identPractQuespap').append("\
//         <div class='questsIndDiv"+i+ " questsIndDiv media text-muted pt-3 newsfeeds-div container ' style='display:none'>\
//             <div class='row'>\
//                 <div class='col'>\
//                 <audio id='audioQues' controls controlsList='nodownload'>\
//                <source type='audio/mpeg'>\
//                </audio>\  
//                </div>\        
//             </div>\
//             </div>\
//             ");
//     // var audio = document.getElementById("player");
//     // audio.addEventListener("ended", function() {
//     //     audio.src = path+assets/mp3/questsPractDict[i].dictation_questions.mp3;
//     //     audio.play();
//     // });
//     //$('#audioQues').attr(src,path+assets/mp3/questsPractDict[i].dictation_questions.mp3);
// }  
// $('.questsIndDiv0').css("display", "block");
function openReportCard(){
    //alert();
    $('#detailReportModal').modal('show');
}

    function quitAndSubmit(event){
       //console.log(event);
        event.preventDefault();
        var url = path + "stu/dictResCheck/" + ext_id;
        data = $( "#dictPractQuespap input").filter(function () {
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
                console.log(rsp);
                if(rsp.status == true){
                   
                    $(".ansInput").attr("disabled", true);
                    var i = 0;    var sum =0; var wr =0;  var sk =0;
                    for (var key in rsp.data.resultData) {
                        console.log(rsp.data.resultData.length);
                        console.log(rsp);

                        if(rsp.data.resultData[key] == 'TRUE'){
                            sum++;
                            console.log(rsp.data.resultData[key]);
                        //alert('Correct');
                            var ht = "#"+key;
                            $(ht).siblings('span').html("<i class='fa fa-check'></i>");
                        
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
                            $(ht).siblings('span').append("<i class='fa fa-ban'></i>");
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
                            $(ht).siblings('span').append("<i class='fa fa-close'></i>");
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