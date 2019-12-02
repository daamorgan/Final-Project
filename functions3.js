window.onload=function(){
    document.getElementById("click").onclick=function(){
    var user=document.getElementById("UserName").value;
    var pass=document.getElementById("Password").value;
    if( (user==""&&pass=="")||(user="" || pass=="")){
        alert("Please Enter the correct information");
    }
    else{
            var xhr=new XMLHttpRequest();
            var url = "verification.php?user="+user+"&password="+pass;
            xhr.onreadystatechange = changes; 
            xhr.open('GET', url); 
            xhr.send();
            function changes() { 
                if (xhr.readyState === XMLHttpRequest.DONE) { 
                    if (xhr.status === 200) { 
                        var response = xhr.responseText; 
                        if(response==true){
                        location.href="homepage.html";
                        }
                    }  else{
                        alert('There was a problem with the request.'); 
            
                    }
        
    }

}
}
    }
}
