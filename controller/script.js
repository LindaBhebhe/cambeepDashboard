

function validateAddStationeryModal(){

	console.log("In the script");

	var checked = true;

	//get item
	var item = document.getElementById('name').value;
	alert("the item is " + item.value);
	console.log(item);

    //get password input and error message
	var quantity = document.getElementById('quantity').value;	
	alert("the quantity is " + quantity);

	//check if the item input is empty
	if(item.value === "")
	{    
		checked = false;
	    //item_error.innerHTML = "select Item";
	}

	
	if (quantity.value === "")
	{
		 checked = false;
        // request_error.innerHTML = "Enter quantity";
	}

	if (checked ==true){
	   addStationery();
		//return true;
	}else{
		return false;
	}
}


function addStationery(){
	
    var item = document.getElementById('name').value;
     alert("successfully added new stationery" + item);

	var quantity = document.getElementById('quantity').value;	
	
	if (window.XMLHttpRequest) {
		alert("in the if");
				xhttp = new XMLHttpRequest();
				} else {
			
				xhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xhttp.onreadystatechange = function() {
                 console.log("in the on readyState");
				if (this.readyState == 4 && this.status == 200) {				
					if (this.responseText == "successful"){
						 window.location.href = "../classes/stationeryOperations.php";
						alert("successful");
                       
                     }
                    
                }
        };
          

          //call the send to the php file on the server 
		 // xhttp.open("GET", "https://watchmeorg.000webhostapp.com/cambeeplogin.php?username="+usern+"&password="+pass, true);		  
		  xhttp.open("GET", "http://localhost:81/cambeepDashboard/classes/stationeryFunctions.php?item="+item+"&quantity="+quantity, true);	  
		  xhttp.send();


		}


function deleteStationery(clicked_id){

  alert("The clicked id is" + clicked_id);

  if (window.XMLHttpRequest) {
		alert("in the if");
				xhttp = new XMLHttpRequest();
				} else {
			
				xhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xhttp.onreadystatechange = function() {
                 console.log("in the on readyState");
				if (this.readyState == 4 && this.status == 200) {				
					if (this.responseText == "successful"){
						 window.location.href = "../classes/stationeryOperations.php";
						alert("successful");
                       
                     }
                    
                }
        };
          

          //call the send to the php file on the server 
		 // xhttp.open("GET", "https://watchmeorg.000webhostapp.com/cambeeplogin.php?username="+usern+"&password="+pass, true);		  
		  xhttp.open("GET", "http://localhost:81/cambeepDashboard/classes/deleteStationery.php?id="+clicked_id, true);	  
		  xhttp.send();

          }


   function updateStationery(clicked_id){

  alert("The clicked id is" + clicked_id);
  var item = document.getElementById('updateName').value;
     alert("updating" + item);

  var quantity = document.getElementById('updateQuantity').value;	
	

  if (window.XMLHttpRequest) {
		alert("in the if");
				xhttp = new XMLHttpRequest();
				} else {
			
				xhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xhttp.onreadystatechange = function() {
                 console.log("in the on readyState");
				if (this.readyState == 4 && this.status == 200) {				
					if (this.responseText == "successful"){
						 window.location.href = "../classes/stationeryOperations.php";
						alert("successful");
                       
                     }
                    
                }
        };
          

          //call the send to the php file on the server 
		 // xhttp.open("GET", "https://watchmeorg.000webhostapp.com/cambeeplogin.php?username="+usern+"&password="+pass, true);		  
		  xhttp.open("GET", "http://localhost:81/cambeepDashboard/classes/updateStationery.php?id="+clicked_id+"&quantity="+quantity, true);	  
		  xhttp.send();

          }

          function getId(clicked){
          	alert("get id");

          	document.getElementById("deleteRow").value = clicked;

          	 $('#deleteModal').modal('show');
          }


          function getUpdateId(clicked){
          	alert("get update id 2");
          	document.getElementById("updateRow").value = clicked;


          	 $('#updateModal').modal('show');

          }

         



         function  getdisId(clicked){
             alert("The id of the clicked value is" + clicked);
             document.getElementById("checkoutRow").value = clicked;
              $('#checkOutStationeryModal').modal('show');

         }




         function  checkOutStationery(clicked){

         	alert("The id of the clicked value is" + clicked);

         	if (window.XMLHttpRequest) {
		      alert("in the if");
				xhttp = new XMLHttpRequest();
				} else {
			
				xhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xhttp.onreadystatechange = function() {
                 console.log("in the on readyState");
				if (this.readyState == 4 && this.status == 200) {				
					if (this.responseText == "successful"){
						 window.location.href = "../classes/stationeryOperations.php";
						alert("successful");
                       
                     }
                    
                }
        };
          

          //call the send to the php file on the server 
		 // xhttp.open("GET", "https://watchmeorg.000webhostapp.com/cambeeplogin.php?username="+usern+"&password="+pass, true);		  
		  xhttp.open("GET", "http://localhost:81/cambeepDashboard/classes/checkOutStationery.php?id="+clicked, true);	  
		  xhttp.send();



         }

         function getApproveId(clicked){

         	alert("The id of the clicked value is" + clicked);
            document.getElementById("approveRow").value = clicked;
             $('#approveModal').modal('show');

         }

         function approveStationery(clicked){

         	alert("The id of the clicked value is" + clicked);

         	if (window.XMLHttpRequest) {
		      alert("in the if");
				xhttp = new XMLHttpRequest();
				} else {
			
				xhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xhttp.onreadystatechange = function() {
                 console.log("in the on readyState");
				if (this.readyState == 4 && this.status == 200) {				
					if (this.responseText == "successful"){
						 window.location.href = "../classes/stationeryOperations.php";
						alert("successful");
                       
                     }
                    
                }
        };
          

          //call the send to the php file on the server 
		 // xhttp.open("GET", "https://watchmeorg.000webhostapp.com/cambeeplogin.php?username="+usern+"&password="+pass, true);		  
		  xhttp.open("GET", "http://localhost:81/cambeepDashboard/classes/approveStatus.php?id="+clicked, true);	  
		  xhttp.send();

         }


