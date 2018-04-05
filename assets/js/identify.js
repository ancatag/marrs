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
                    <div class='col' id='skipped'>\
                    <input type='radio' name='"+questsPractIdent[i].idn_id+"'>\
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
        displayNext();
    }
    var timer = setInterval(timeOut, secondToMilli(questsPractIdent.timeLimit));
 // console.log(questsPractDict.timeLimit);
      function displayNext(){
             clearInterval(timer);
             cdreset(questsPractIdent.timeLimit);//timer reset
             countdown();//timer start 
            
    timer = setInterval(timeOut, secondToMilli(questsPractIdent.timeLimit));
    // if($('.questsIndDiv:visible:last input').val() != '' && $('.questsIndDiv:visible:last input').val() != '------'){
        
    //     console.log($('.questsIndDiv:visible input').val());
    //     $('.questsIndDiv:visible:last input').attr('checked','checked').val('------');
    // }
    //console.log($('.questsIndDiv:visible input').attr('name'));

      
         
          
         
         // cdpause();

        
          // setTimeout(function() {
          //  console.log(questsPractIdent.timeLimit);
      
          //   },questsPractIdent.timeLimit)



    var selName = $('.questsIndDiv:visible input').attr('name');
    var selectorName= "input[name='"+selName+"']:checked";
    if (!$(selectorName).val()) {
        $('.questsIndDiv:visible:last input').attr('checked','checked').val('------');
    }
    // if($('.questsIndDiv:visible:last input').val() == ''){
    //     $('.questsIndDiv:visible:last input').val('------');
    //     //$('.questsIndDiv:visible:last input').val('');
    //  }  
    // $('#quitBtn').click(function(){
    
      $('.questsIndDiv:visible:last').next().css("display", "block");
        $('.questsIndDiv:visible:last').prev().hide();


    //});
    // $('#quitBtn').click(function(){
    //     $('.questsIndDiv:visible:last').show();
    //     $('.questsIndDiv:visible:last').next().hide();
    // });
 
     //  if($('.inputDiv:visible:last')){
     //     console.log('hello'); 
     //     $('#nxtBtn').hide();
     //     $('#practiceIdntResult_Btn').show();
     // }
    //console.log($('.questsIndDiv'+(questsPractIdent.length-1)+':visible'));

    //$('.questsIndDiv:visible:last').parent('.toCheck').siblings('.col').prev().hide();
    //console.log( $('.questsIndDiv:visible:last').parent('.toCheck').siblings('.col').prev().hide());
 // console.log(lastDiv);
//  cdpause();



var lastDiv = $('.questsIndDiv:last');
if(lastDiv.is(':visible')){
    // alert('last visible');
           $('#practiceDictResult_Btn').show();
           $('#nxtBtn').hide();
          
    
         
//clearInterval(timer);
        
          
           
            //  console.log( delay(time));
            //  $('.questsIndDiv:last').show().delay(time);
            // $('#practiceDictResult_Btn').delay(time).trigger('click');   //.queue(function() {
                // var time =secondToMilli(questsPractIdent.timeLimit);
                //your code to be executed after 1 second
                // clearInterval(timer);
                
                //$(this).trigger('click');
            // });
            
     
           
          // $("#practiceDictResult_Btn").delay(time).trigger('click');
         
                //console.log(time);
            // }, time);
          // if($('.questsIndDiv:visible:last input').attr('checked','checked').val()=='------')
          // {
          //     $('.questsIndDiv:visible:last input').attr('checked','checked').val('------');
          // }
       
          //$('.questsIndDiv:visible:last').show(questsPractIdent.timeLimit);
     
        //  timeOut();
         
         
        // console.log(questsPractIdent.timeLimit);
        // if(jQuery('#practiceDictResult_Btn').click) {
        //     //do-some-stuff
        //     var selName = $('.questsIndDiv:visible input').attr('name');
        //     var selectorName= "input[name='"+selName+"']:checked";
            
        //     if (!$(selectorName).val()) {
        //          alert();
        //         $('.questsIndDiv:visible input').attr('checked','checked').val('------');
        //     }
        // } else {
            //run function2 var flag = 0;

            // var selName = $('.questsIndDiv:visible input').attr('name');
            // var selectorName= "input[name='"+selName+"']:checked";
            
            // if (!$(selectorName).val()) {
            //     //  alert();
            //     $('.questsIndDiv:visible input').attr('checked','checked').val('------');
            // }
           
            
           
       
                Lstime = secondToMilli(questsPractIdent.timeLimit);
                var timeoutHandle = window.setTimeout(function() {
                    var selName = $('.questsIndDiv:visible input').attr('name');
                    var selectorName= "input[name='"+selName+"']:checked";
                    
                    if (!$(selectorName).val()) {
                        //  alert();
                        $('.questsIndDiv:visible input').attr('checked','checked').val('------');
                    }
                    $("#practiceDictResult_Btn").trigger('click');
                    console.log(Lstime);
                    
                  },Lstime);
                 
                 $("#practiceDictResult_Btn").click(function(){ 
                    
                      window.clearTimeout(timeoutHandle);
                 });
                //  var selName = $('.questsIndDiv:visible input').attr('name');
                //  var selectorName= "input[name='"+selName+"']:checked";
                 
                //  if (!$(selectorName).val()) {
                //      //  alert();
                //      $('.questsIndDiv:visible input').attr('checked','checked').val('------');
                //  }
                //   window.clearTimeout();
                  
                 
                //   cache_clear();
                  
                 
            // }
                //run function2
             
        
        
           
        
        //   clearTimeout(tt);
          //cdpause();
            
          clearInterval(timer);
        
      //setTimeout(quitAndSubmit,3000);
         
      

    }

        
         
    
        //  setTimeout(function() {
        //     alert("Hello");
        //    }, questsPractIdent.timeLimit);
        //   cdpause();
    //     // if($('.questsIndDiv:visible:last').parent('.row').children('.col:last input').val('------')){
    //    clearInterval(timer);
    //     // }
        // console.log($('.questsIndDiv:visible:last').parent('.row').children('.col')); 
         //$('.questsIndDiv:visible:last').prev().show();
         //$('.questsIndDiv:visible:last').find('.col').show();
         // $('#identPractQuespap #skipped').css('visibility','visible');
   
  
    //  else{ 
    //     $('.questsIndDiv:last').hide();
    //setTimeout(function(){window.location.href='form2.html'},questsPractIdent.timeLimit);
    //  }
    

}

//console.log($('.questsIndDiv0').find('input[type=radio],radio,select').filter(':visible:first input'));



//console.log($('.questsIndDiv:visible:first input').val('------'));
function openReportCard(){
    //alert(); 
    $('#detailReportModal').modal('show');
}
    function quitAndSubmit(event){ 
        event.preventDefault();
        // $("#quitBtn").click(function(){
        //     // $("p").hide("slow", function(){
        //        if($('.questsIndDiv:visible:first input').val('------')){
        //         alert("The paragraph is now hidden");
        //         console.log($('.questsIndDiv:visible:first input').val('------'));
        //        }
        //     });
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
                //console.log(rsp);
                //console.log($( ".questsIndDiv:first").find('input[type=radio],radio,select').filter(':visible:first input').val()== rsp.data.resultData[key]);
                if(rsp.status == true){
                //    if($( ".questsIndDiv0:first").find('input[type=radio],radio,select').filter(':visible:first input').val()== rsp.data.resultData[key]){ 
                   
                //     if (confirm("You have no answered anything, do you want to redirect it to the home page?")) {
                //         window.location.href = path+'stu'; 
                     
                //    }}
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
                            // if($( ".questsIndDiv0").find('input[type=radio],radio,select').filter(':visible:first input')){
                    
                            //     if (confirm("You have no answered anything, do you want to redirect it to the home page?")) {
                            //         window.location.href = path+'stu'; 
                            //     }
                            //  }
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