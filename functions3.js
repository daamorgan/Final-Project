window.onload=function(){
    document.querySelectorAll("a").href+=location.search;
    var user=this.document.getElementById("UserName").value;
    var pass=this.document.getElementById("Password").value;
    this.document.getElementById("click").onclick=function(){
    if( (user==""&&pass=="")||(user="" || pass=="")){
        this.alert("Please Enter the correct information");
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
                        console.log(response);
                    }  else{
                        alert('There was a problem with the request.'); 
            
                    }
        
    }

}
}
    }
}
