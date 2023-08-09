const navbarHeader = document.getElementById("navbarHeader");
const navbarSettings = navbarHeader.querySelector(".settings");
const settingsBtn = navbarHeader.querySelector("#settingsBtn");

settingsBtn.addEventListener("click", ()=>{
    settingsBtn.classList.toggle("active");
    navbarSettings.classList.toggle("active");
})