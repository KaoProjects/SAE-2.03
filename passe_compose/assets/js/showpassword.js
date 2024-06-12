window.addEventListener("DOMContentLoaded",function(){
    const eye = this.document.getElementById("eye");
    const showPass = this.document.getElementById("showPass");

    let PasswordVisible = false

    showPass.addEventListener('click',function(){
        if(PasswordVisible){
            eye.innerHTML="visibility"
            document.getElementById("zt_mp").type = "password"
            PasswordVisible = false
        }else{
            eye.innerHTML+="_off"
            document.getElementById("zt_mp").type = "text"
            PasswordVisible = true
        }
    })

    
})