<!DOCTYPE html>
<html>
    <div id="Content">
    <head>
        <link rel="stylesheet"type="text/css" href="styling.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    </head>
    <!--<header id="loginPage">
    </header>-->
            <div class="Area1">
                
                <h1 class="Center" id="LoginTitle">Login</h1>
                <div id="message"></div>
                <div>
                    <label class="loginLabel" for="UserName">Username:</label>
                    <input class="loginInput" type="email" id="UserName">
                </div>
                <br>
                <div>
                    <label class="loginLabel" for="Password">Password:</label>
                    <input class="loginInput" type="text" id="Password" minlength="8">
                </div>
                 <br>
                 <br>
                <button class="loginbtn" id="click" type="submit">Submit</button>
            </div>
            <div id=result></div>
        </div>   
</html>
