

function validateAddStationeryModal(){

	console.log("In the script");

	var checked = true;

	//get item
	var item = document.getElementById('name');
	alert("the item is " + item);
	console.log(item);

    //get password input and error message
	var quantity = document.getElementById('quantity');	
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
	
    var item = document.getElementById('name');
     alert("successfully added new stationery" + item);

	var quantity = document.getElementById('quantity');	
	
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
		  xhttp.open("GET", "http://localhost:81/cambeepDashboard/classes/addStationery.php?item="+item+"&quantity="+quantity, true);	  
		  xhttp.send();


		}