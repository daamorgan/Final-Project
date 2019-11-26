document.addEventListener('DOMContentLoaded', function(){
	document.getElementById("open").addEventListener('click',filterAction);
	document.getElementById("all").addEventListener('click',filterAction);
	document.getElementById("mytickets").addEventListener('click',filterAction);
}
);

var httpRequest;
function filterAction(event){
       event.preventDefault();
       httpRequest = new XMLHttpRequest();
       var filteroption= this.id;
       var url ="homepage.php?filter="+ filteroption;
       httpRequest.onreadystatechange = fetchData;
       httpRequest.open('GET',url,true);
       httpRequest.send();
       var selectedOption=document.querySelector(".selected");
       if (selectedOption != null){
           selectedOption.classList.remove("selected");
       }
       this.classList.add("selected");
       
       
 }

 function fetchData(){
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
        if (httpRequest.status === 200) {
            document.getElementById('resultsTable').innerHTML= httpRequest.responseText;
   }else {
     alert('There was a problem with the request.');
}}}