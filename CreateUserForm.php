
  <h1>NEW USER</h1>
  <div id="content"></div>
    <div class="Area1">
     <label for="Firstname">Firstname</label>
     <input type="text" id="Firstname" required oninvalid="this.setCustomValidity('User ID is a must')">
     <br>
     <label for="Lastname">Lastname </label>
     <input type="text" id="Lastname" required></div>
     <br>
      <label for="Password">Password</label>
     <input type="password" id="Password"  minlength="8" required>
     <br>
     <label for="Email">Email</label>
     <input type="email" id="Email" required>
     <br>
    <button onclick="createUser()" id="clicking">Submit</button>
   </div>
 </div>
