window.onload=function(){

    this.document.getElementById("clicking").onclick=function(){
        var Firstname=document.getElementById("Firstname").value;
        var Lastname=document.getElementById("Lastname").value;
        var Password=document.getElementById("Password").value;
        var Email=document.getElementById("Email").value;
        if(Firstname==""&& Lastname==""&& Password==""&&Email==""){ 
            alert("Please Fill in the fields")
        }
        else{
    var xhr=new XMLHttpRequest();
    var url = "http://localhost:8080/Login.php?firstname="+Firstname+"&lastname="+Lastname+"&password="+Password+"&email="+Email;
    xhr.onreadystatechange = doSomething; 
    xhr.open('GET', url); 
    xhr.send();
    function doSomething() { 
        if (xhr.readyState === XMLHttpRequest.DONE) { 
            if (xhr.status === 200) { 
                var response = xhr.responseText; 
                 console.log(response.trim()); 
            }  else{
                alert('There was a problem with the request.'); 
    
            }
        }
    }
    }

}
}
    
    