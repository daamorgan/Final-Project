

var httpRequest=new XMLHttpRequest();
$(window).on('load', function() {
 $('.Main').load("Loginpage.php");
 $('.sides').hide();
});

$(document).ready(function() {
  $(document).on('click', '#click',login);
  
  
  
  $("nav a").on('click', function(event) {
    event.preventDefault();
    let page = $(this).attr("href");
    let stateObj = { page: formatForUrl(page) };
    history.pushState(stateObj, null, formatForUrl(page));
    requestContent(page);
    document.title = 'BugMe Issue Tracker | ' + formatForUrl(page);
    removeActiveClass();
    $(event.target).parent().addClass('active');
  });
  

  $(window).on('popstate', function(event) {
    let page = history.state.page;
    let filename = page + '.php';
    requestContent(filename);
    document.title = 'BugMe Issue Tracker | ' + page;
    removeActiveClass();
    $('#nav-' + page).parent().addClass('active');
  });
});

function showCreateUser()
{
  $('.Main').load('CreateUserForm.php');
}

function createUser(){
  
  var Firstname=document.getElementById("Firstname").value;
        var Lastname=document.getElementById("Lastname").value;
        var Password=document.getElementById("Password").value;
        var Email=document.getElementById("Email").value;
        if(Firstname==""&& Lastname==""&& Password==""&&Email=="")
        { 
        alert("Please Fill in the fields");
        document.getElementById("Lastname").value;
        document.getElementById("Password").value;
        document.getElementById("Email").value;
        }else
        {
          var xhr=new XMLHttpRequest();
          var url = "Addtheuser.php?firstname="+Firstname+"&lastname="+Lastname+"&password="+Password+"&email="+Email;
          xhr.onreadystatechange = doSomething; 
          xhr.open('GET', url); 
          xhr.send();
        }
        
        function doSomething() { 
        if (xhr.readyState === XMLHttpRequest.DONE) { 
            if (xhr.status === 200) { 
               var response = xhr.responseText; 
               document.getElementById("content").innerHTML=response;
            }  else{
                alert('There was a problem with the request.'); 
    
            }
        }
      }
    
}

function job(){
    var content=document.getElementsByClassName("issueTitle");
    let issues=Array.from(content);
    issues.forEach(makeListeners);
        
}

function infoAction(event){
        console.log("call info");//TakeOUT
        var id=event.target.id;
        console.log(id);//TakeOUT
        var url ="ProcessHomepage.php?filter="+ id;
        httpRequest.onreadystatechange = fetching;
       httpRequest.open('GET',url);
       httpRequest.send();
}

function makeListeners(element){
    element.addEventListener("click", infoAction);
}

function fetching(){
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
        if (httpRequest.status === 200) {
          
        }else {
            alert('There was a problem with the request.');
          }
      
        }
}

function filterAction(event){
  var filteroption=event.target.id;
  $.ajax("ProcessHomepage.php",{
    method:"GET",
    data: {
        filter:filteroption 
      }
  }).done(response=>{
    $('#resultsTable').html(response);
    var selectedOption=$(".selected");
    if (selectedOption != null){
      selectedOption.className-="selected";
     }
    event.target.className+=" selected";
  }).fail(error=>{
    alert('There was a problem with the request.');
  })
    
 }/*
    var filteroption=event.target.id;
    var url ="ProcessHomepage.php?filter="+ filteroption;
    httpRequest.onreadystatechange = fetchData;
    httpRequest.open('GET',url,true);
    httpRequest.send();
    var selectedOption=document.querySelector(".selected");
    if (selectedOption != null){
      selectedOption.classList.remove("selected");
     }
    event.target.className+=" selected";
 }
 
function fetchData(){
  if (httpRequest.readyState === XMLHttpRequest.DONE) {
    if (httpRequest.status === 200) {
      document.querySelector('#resultsTable').innerHTML= httpRequest.responseText;
      job();
    }else {
      alert('There was a problem with the request.');
    }
  }
}*/

function JobDetails(event){
  event.preventDefault();
  $('.Main').load('JobDetails.php');
  $(document).ready(function() {
    infoAction(event);
    addJobDetails();
  });
}


function addEvent(){
  var status;
  if (this.id==="closed"){
      status="Closed";
  }else{
    status="Progress";
  }//end else
  var details=$('#content');
  var url='ProcessJobDetails.php?status='+status;
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
    $.ajax('ProcessJobDetails.php', {
      method: 'GET'
    }).done(function(response) {
      content.html(response);
      $("#closed").click(addEvent);
      $("#progress").click(addEvent);
    }).fail(function() {
      alert('There was a problem with the request.');
    });
}


function login()
{

  var user=document.getElementById("UserName").value;
  var pass=document.getElementById("Password").value;

  if( (user==""&&pass=="")||(user=="" || pass=="")){
    alert("Please Enter the correct information");
  }else{
    var xhr=new XMLHttpRequest();
    var url = "verification.php?user="+user+"&password="+pass;
    xhr.onreadystatechange=changes; 
    xhr.open('GET', url); 
    xhr.send();
    function changes(){ 
      if (xhr.readyState === XMLHttpRequest.DONE) { 
        var response = xhr.responseText;
        console.log(response);
        if(response == "success")
        {
          $('.sides').show();
          $('.Main').load('home.php');
          filterAction({'target':{'id':'all'}});
          
        }
      }
    }
  }
}


function formatForUrl(page) {
  var pageName = page.split('.');
  return pageName[0];
}


function requestContent(filename) {
  $('.Main').load(filename);
}

function removeActiveClass(){
  $('nav li.active').removeClass('active');
}

function ShowIssuePage(){
   $('.Main').load('CreateIssue.php');
   addIssue();
}

function addIssue(){
    document.getElementById("click").onclick=function(){
      var xhr=new XMLHttpRequest();
      var url = "IssueHandler.php"
      xhr.onreadystatechange = doSomething; 
      xhr.open('GET', url); 
      xhr.send();
      function doSomething() { 
        if (xhr.readyState === XMLHttpRequest.DONE) { 
            if (xhr.status === 200) { 
                var response = xhr.responseText; 
                document.getElementById("result").innerHTML=response.trim(); 
            }  else{
                alert('There was a problem with the request.'); 
    
            }
        }
      }
    }

}

function showMain()
{
    $('.Main').load('home.php');
    filterAction({'target':{'id':'all'}});
  var selectedOption=document.querySelector(".selected");
    /*if (selectedOption != null){
      selectedOption.classList.remove("selected");
     }
     var allOption=document.querySelector("#all");
      allOption.className+=" selected";*/
}

function Logout(){
  $('.Main').load('Loginpage.php');
  $('.sides').hide();
}
