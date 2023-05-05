function validateForm() {
    const username = document.getElementById("username");
    const password = document.getElementById("password");
  
    if (username.value.trim() === "") {
      alert("Please enter a username.");
      return false;
    }
  
    if (password.value.trim() === "") {
      alert("Please enter a password.");
      return false;
    }
  
  
    return true;
  }
  

const openRegister = document.querySelector(".open-register");
const openLogin = document.querySelector(".open-login");
const loginWrapper = document.querySelector(".login-wrapper");
const registerWrapper = document.querySelector(".register-wrapper");

openRegister.addEventListener('click',()=>{
    loginWrapper.classList.add("hide");
    registerWrapper.classList.remove("hide");
})

openLogin.addEventListener('click',()=>{
    loginWrapper.classList.remove("hide");
    registerWrapper.classList.add("hide");
})
