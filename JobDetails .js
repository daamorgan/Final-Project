$(document).ready(function() {
    addJobDetails();
    $("a").href+="?username"+GetParameterValues("username");
});

function addEvent(){
  var status;
  if (this.id==="closed"){
      status="Closed";
  }else{
    status="Progress";
  }//end else
  var details=$('.Main');
  var url='JobDetails.php?status='+status;
  $.ajax(url, {
      method: 'GET'
    }).done(function(response) {
      details.html(response);
    }).fail(function() {
      alert('There was a problem with the request.');
    });
}

function addJobDetails(){
   var content=$('.Main');
    $.ajax('JobDetails.php', {
      method: 'GET'
    }).done(function(response) {
      content.html(response);
      $("#closed").click(addEvent);
      $("#progress").click(addEvent);
    }).fail(function() {
      alert('There was a problem with the request.');
    });
}
        function GetParameterValues(param) {  
            var url = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');  
            for (var i = 0; i < url.length; i++) {  
                var urlparam = url[i].split('=');  
                if (urlparam[0] == param) {  
                    return urlparam[1];  
                }  
            }  
        }  
