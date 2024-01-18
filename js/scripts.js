function validate() {
    //   var gender = document.getElementById('gender');
    //   var genderText=document.getElementById("genderText").textContent;
    //   if (gender.selectedIndex ==0) {
        
    //     return false
    //   }
    
    var name=document.getElementById("fullName").value;
    var age=document.getElementById("age").value;
    var gender=document.getElementById("gender").selectedIndex;
    var email=document.getElementById("email").value;
    var pass=document.getElementById("pass").value;
    var confirmPass=document.getElementById("confirmPass").value;
    var signupCheck=document.getElementById("signupCheck").checked;
    
        if(name&&age&&gender&&email&&pass&&confirmPass!=""){
            if(pass!=confirmPass){
                
            alert("check your password")
            
        }
        else if(signupCheck==false){
            alert("You need to check the terms & conditions checkbox ")
        }
        else{
            alert("done !")
        }
        
        }
       
    }