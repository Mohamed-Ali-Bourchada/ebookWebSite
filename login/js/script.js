 function emailValidation(){
      var emailError =document.getElementById("emailError");
    var email=document.getElementById("email").value;
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/; 
   
    
     if(email==""){
        
        emailError.innerHTML="Your email please "
        return false 
    }
    
    else if (!emailPattern.test(email)) {
      emailError.innerHTML = "Invalid email format [name@example.com]";
        return false 
    } 
    
    else {
      emailError.textContent = "";
    }  
 }
/*=========================Singup validation================ */
function validateSignUp() {
  
    //<<<<<<  Name validation  >>>>>>>
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
   /*=========================email validation ================ */
  emailValidation()
   if(emailValidation()==false){
    return false
  }
    //<<<<<<  gender validation  >>>>>>>   
    var male = document.getElementById('male').checked;
    var female = document.getElementById('female').checked;
    var genderError =document.getElementById("genderError");
    var genderValue=""
    if(male==false&&female==false){
        genderError.innerHTML="Please select your Gender "
        return false
    }
    else{
        genderError.innerHTML=""

    }
    if(male==true){
      genderValue="M"
    }
    else{genderValue="F"}
    
     //<<<<<<  password validation  >>>>>>>  
    passwordValidation();
     //<<<<<<  confirm password validation  >>>>>>>  
     confrimPasswordValidation()
    if(confrimPasswordValidation()){
var formattedDate = birthDate.toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'numeric',
            day: 'numeric'});
        data="Are you sure you want to submit this form?"+"\n"+"Full name : "+name+"\n"+"Date of birth : "+formattedDate+"\n"+"Email : "+email+"\n"+"Gender : "+genderValue
        re=confirm(data)
        if(re==false){
          return false
        }
    }
   
       
   


       
}
/*=========================password validation function ================ */

function passwordValidation(){
  const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    var pass=document.getElementById("pass").value;
    var passError =document.getElementById("passError");
    
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
    }
}
/*=========================confirm password validation function ================ */
function confrimPasswordValidation(){
  var confirmPass=document.getElementById("confirmPass").value;
    var confirmPassError =document.getElementById("confirmPassError");
    if (pass!=confirmPass) {
        confirmPassError.innerHTML="Check your passwrod please"
        return false;
      
}
else{
  confirmPassError.innerHTML=""
  return true;
}
}
/*=========================Login validation================ */
function validateLogin(){
  var email=document.getElementById("loginEmail").value;
  var pass=document.getElementById("loginPass").value;
  emailError=document.getElementById("loginEmailError")
  passError=document.getElementById("loginPassError")
  if(email==""){
    emailError.innerHTML="Email is required";
    return false
  }
  else{
      emailError.innerHTML="";

  }
  if(pass==""){
    passError.innerHTML="Password is required";
  }
  else{
    passError.innerHTML="";

  }
  
} 

