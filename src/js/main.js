document.addEventListener("DOMContentLoaded", function(){

    let changeDisplay = (function(){
        let formLogin = document.querySelector(".login-form");
        let btnLogin = document.querySelector("#btn-to-login");
        let crossLogin = document.querySelector("#login__cross");
        btnLogin.addEventListener("click", ()=>{
            formLogin.style.display="flex";
        });
        crossLogin.addEventListener("click", ()=>{
            formLogin.style.display="none";
        });
    })();
    // export{changeDisplay};
})