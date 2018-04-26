$( document ).ready(function() {
	$('.subsubmit').on('click', function (e) {
      e.preventDefault();
      var modalname = $(this).attr("id");
      console.log($('#'+modalname+'form').serialize());
      // var url = "../subscribe/payments/rp_cust";
      var url = path+"payment/rp_cust";      
      $.ajax({
        url: url,
        type: "POST",
        dataType: "json",
        data: $('#'+modalname+'form').serialize(),
        beforeSend: function(XMLHttpRequest) {
        },
        complete: function(XMLHttpRequest, textStatus) {
           
        },
        success:function(response, XMLHttpRequest, textStatus) {  
          document.getElementById(modalname+"close").click();
          document.getElementById(modalname+"pay").click();

        },
        error: function  (exception) {
             alert("Sorry, something went wrong. Please start again!")
        },
     });	
  })
  $('.subpay').on('click', function (e) {
    amounttopay = $(this).attr("id");
    //console.log(amounttopay);
  });

})