window.onload=function(){
    document.querySelectorAll("a").href+=location.search;
    this.document.getElementById("click").onclick=function(){
    var xhr=new XMLHttpRequest();
    var url = "http://localhost:8080/IssueHandler.php"
    xhr.onreadystatechange = doSomething; 
    xhr.open('GET', url); 
    xhr.send();
    function doSomething() { 
        if (xhr.readyState === XMLHttpRequest.DONE) { 
            if (xhr.status === 200) { 
                var response = xhr.responseText;
            }  else{
                alert('There was a problem with the request.'); 
    
            }
        }
    }
    }
    }
    
