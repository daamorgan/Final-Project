document.addEventListener('DOMContentLoaded', function(){
   windowAction();
   document.getElementById("open").addEventListener('click',filterAction);
   document.getElementById("all").addEventListener('click',filterAction);
   document.getElementById("mytickets").addEventListener('click',filterAction);
   document.getElementById("newIssue").addEventListener('click',()=>{
   window.location.href="CreateIssue.php";
	});
	
}
);

var httpRequest=new XMLHttpRequest();
function filterAction(event){
       event.preventDefault();
       var filteroption=this.id;
       var url ="homepage.php?filter="+ filteroption;
       httpRequest.onreadystatechange = fetchData();
       httpRequest.open('GET',url,true);
       httpRequest.send();
       var selectedOption=document.querySelector(".selected");
       if (selectedOption != null){
           selectedOption.classList.remove("selected");
       }
       this.classList.add("selected");
       
       
 }
function windowAction(){
       var url ="homepage.php?filter="+ "startup";
       httpRequest.onreadystatechange = fetchData;
       httpRequest.open('GET',url,true);
       httpRequest.send();
       var selectedOption=document.querySelector(".selected");
       if (selectedOption != null){
           selectedOption.classList.remove("selected");
       }
       document.getElementById("all").classList.add("selected");
    
}

 function fetchData(){
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
        if (httpRequest.status === 200) {
              document.getElementById('resultsTable').innerHTML= httpRequest.responseText;
              job();
        }else {
            alert('There was a problem with the request.');
}}}

 
function job(){
    var content=document.getElementsByClassName("issueTitle");
    let issues=Array.from(content);
    issues.forEach(makeListeners);
        
}

function makeListeners(element){
    element.addEventListener("click", infoAction);
}



function fetching(){
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
        if (httpRequest.status === 200) {
          
   }else {
     alert('There was a problem with the request.');
}}}

function infoAction(event){
        var id=this.id;
        var url ="homepage.php?filter="+ id;
        httpRequest.onreadystatechange = fetching;
       httpRequest.open('GET',url);
       httpRequest.send();
}
