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
         var passwordInput=document.getElementById('delete_password2').value;
    var textError=document.getElementById("delete_password_error2")
    if(passwordInput==""){
        textError.innerHTML="Write your password please.";
        return false
    }
    }
}


function deletePassword(){
    var passwordInput=document.getElementById('delete_password').value;
    var textError=document.getElementById("delete_password_error")
    if(passwordInput==""){
        textError.innerHTML="Write your password please.";
        return false
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
         var passwordInput=document.getElementById('delete_password3').value;
    var textError=document.getElementById("delete_password_error3")
    if(passwordInput==""){
        textError.innerHTML="Write your password please.";
        return false
    }

      }
}
 function emailValidation(email,emailError){
      
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
function validateContactForm(){
    var name=document.getElementById("fullName").value
    var nameError=document.getElementById("nameError")
    var email=document.getElementById("email").value
    var emailError=document.getElementById("emailError")
    var subject=document.getElementById("subject").value
    var subjectError=document.getElementById("subjectError")
     var message=document.getElementById("message").value
    var messageError=document.getElementById("messageError")
    // name test
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
        nameError.innerHTML=""}
    // email test
   emailValidation(email,emailError)
    if (emailValidation(email,emailError)==false){
        return false 
    }
    // subject Test
    if(subject==""){
        subjectError.innerHTML="Subject is required"
        return false
    }
    else{
        subjectError.innerHTML=""
    }
    // message Test
    if(message==""){
        messageError.innerHTML="Message is required"
        return false
    }
    else{
        messageError.innerHTML=""
    }
    
}