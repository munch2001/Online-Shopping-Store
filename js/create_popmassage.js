 
  function validateItemID() {
  var itemID = document.getElementById("itemID").value;
  
  if ( itemID.charAt(0) !== "D") {
    alert("First character must letter 'D'");
	return false;
  }
}
