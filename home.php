<body>
 <div id="Homepage_Main">
 	<div class="Homepage-Flex">
 		<h1>Issues</h1>
 		<button class="green" id=newIssue onclick="ShowIssuePage()"> Create New Issue</button>
 		</div>
 
 		Filter by:
 		<button class= "filterbtn" id="all" onclick=filterAction(event)>All</button>
 		<button class= "filterbtn" id="open" onclick=filterAction(event)>Open</button>
 		<button class= "filterbtn" id="mytickets" onclick=filterAction(event)> My Tickets</button>
 
 	<div id="resultsTable">
 	</div> 
 	</div>
</body>
