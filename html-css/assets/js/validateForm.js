//  function to validate visitor's date to current date
function checkDate(){
    "use strict";
    var dateValid=true;
    var vdate = document.getElementById('visitDate').value;
    var today = new Date();
    console.log("Users date  = " + vdate);
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();

    if (dd < 10) {
     dd = '0' + dd;
    }  // need this in case day number is one digit like 6
    if (mm < 10) {
     mm = '0' + mm;
    }  // need this is month number is 1 digit like 4

    var td = "" + yyyy + "-" + mm + "-" + dd;
    console.log("System date = " + td);

    if(vdate >= td){
       document.getElementById('errorMessage').innerHTML="  ** Warning:You cannot select today or the days after. **  ";
       document.getElementById("visitDate").style.borderColor="red";
       document.getElementById("errorMessage").style.backgroundColor = 'pink';
       dateValid = false;
       }
    else  {
       document.getElementById('errorMessage').innerHTML="";
       document.getElementById("visitDate").style.border = null;
       document.getElementById("errorMessage").style = null;
       dateValid = true;
       }// end of else path

    console.log("In function to check date - dateValid is --->" + dateValid);
    return (dateValid);
}//end of function validate visitor's date to present date


function validateForm(){
    "use strict";

    var is_date_ok = checkDate();

    return(is_date_ok);
}// end of validateForm