window.onload=function(){
    var user=this.document.getElementById("UserName").Value;
    var pass=this.document.getElementById("Pasword").value;
    this.document.getElementById("click").onclick=function(){
    if( (user==""&&pass=="")||(user="" || pass=="")){
        this.alert("Please Enter the correct information");
    }
    else{
            var xhr=new XMLHttpRequest();
            var url = "http://localhost:8080/verification.php?user="+user+"&password="+pass;
            xhr.onreadystatechange = changes; 
            xhr.open('GET', url); 
            xhr.send();
            function changes() { 
                if (xhr.readyState === XMLHttpRequest.DONE) { 
                    if (xhr.status === 200) { 
                        var response = xhr.responseText; 
                        console.log(response);
                    }  else{
                        alert('There was a problem with the request.'); 
            
                    }
        
    }

}
}
    }
}