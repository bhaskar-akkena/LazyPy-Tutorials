function checkDate(){
    "use strict";
    var dateValid=true;

    var vdate = document.getElementById('visitDate').ariaValueMax;
    var today = new Date();
    console.log("Users date = " + vdate);
    var dd =today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();

    if(dd < 10){
        dd = '0' + dd;
    }
    if(mm < 10){
        mm = '0' + mm;
    }
    var td = "" + yyyy + "-" + mm + "-" + dd;
    console.log("System date = " + td);

    if(vdate == ''){
        document.getElementById('errorMessage').innerHTML = "You cannot leave date field empty";
        document.getElementById("visitDate").style.borderColor = "red";
        document.getElementById("errorMessage").style.backgroundColor = "pink";
        return(dateValid);
    }else{
        document.getElementById('errorMessage').innerHTML ="";
        document.getElementById("visitDate").style.border = null;
        document.getElementById("errorMessage").style = null;
        dateValid = true;
    }

    if(vdate >= td){
        document.getElementById('errorMessage').innerHTML= " Wanring: you entered a date in the future. Must be a previous date!";
        document.getElementById("visitDate").style.borderColor="red";
        document.getElementById("erroMessage").style.backgroundColor = 'pink';
        dateValid = false;
    }
}