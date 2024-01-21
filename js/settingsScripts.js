function newPasswordValidation(){
    var current_password = document.getElementById("current_password").value;
    var current_passError =document.getElementById("current_passError");

    if(current_password==""){
        current_passError.innerHTML="Enter your current Password please";
        return false;
    }
    else{
    current_passError.innerHTML="";
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    var pass=document.getElementById("pass").value;
    var passError =document.getElementById("newPassError");
   
    if(pass==""){
        passError.innerHTML="Enter a Password"
        
        return false
    }
    else if(!passwordPattern.test(pass)){
        passError.innerHTML="Week password"
       
        return false
    }
    else{
        passError.innerHTML=""
        var confirmPass=document.getElementById("confirmPass").value;
        var confirmPassError =document.getElementById("newConfirmPassError");
        if (pass!=confirmPass) {
        confirmPassError.innerHTML="Check your passwrod please"
        return false;
      
        }
        else{
            confirmPassError.innerHTML=""
            }
        }
    }
     
}
function nameValidation(){
   var name=document.getElementById("fullName").value;
    var nameError =document.getElementById("nameError");
    if(name==""){
        nameError.innerHTML="Your full name please "
        return false 
    }
    else if (name.length<5){
        nameError.innerHTML="Your full name must containt atleast 5 letters"
        return false
    }

    else if (/^[a-zA-Z ]+$/.test(name)==false){
       
       document.getElementById("nameError").innerHTML="Your name can only contain letters. "
        return false
    }
     else{
        nameError.innerHTML=""
    }
}

function dateValidation(){
    //<<<<<<  age validation  >>>>>>>
    ageError=document.getElementById("ageError");
    var birthDateValue=document.getElementById("dateBirth").value;
    var  birthDate= new Date(birthDateValue);
    var today = new Date();
    var age=today.getFullYear()-birthDate.getFullYear()
   const hasBirthdayOccurred =
    today.getMonth() > birthDate.getMonth() ||
    (today.getMonth() === birthDate.getMonth() &&
      today.getDate() >= birthDate.getDate());
      if(hasBirthdayOccurred){
        age =age -1
      }
      if (birthDateValue==""){
        ageError.innerHTML='Please enter your date of Birth';
        return false;
      }
      else if(age<12){
        ageError.innerHTML='Sorry,your age must be 12+ years old';
        return false
        }
      else{
        ageError.innerHTML='';

      }
}