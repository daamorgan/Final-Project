$(document).ready(function() {
    addJobDetails();
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