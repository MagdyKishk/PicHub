const editProfilePicBtn = document.getElementById("editProfilePicBtn");
const profilePicForm = document.getElementById("profilePicForm");
const editProfilebannerBtn = document.getElementById("editProfileBannerBtn");
const profileBannerForm = document.getElementById("profileBannerForm");


editProfilebannerBtn.addEventListener("click", ()=>{
    profileBannerForm.classList.toggle("active");
    if (profileBannerForm.classList.contains("active")) {
        document.body.style.overflow = "hidden"
    } else {
        document.body.style.overflow = "auto"
    }
})
editProfilePicBtn.addEventListener("click", ()=>{
    profilePicForm.classList.toggle("active");
    if (profilePicForm.classList.contains("active")) {
        document.body.style.overflow = "hidden"
    } else {
        document.body.style.overflow = "auto"
    }
})

document.addEventListener("click", (event) => {
    let [mouse_x, mouse_y] = [event.clientX, event.clientY]
    if (profileBannerForm.classList.contains("active") &&
        !is_instersecting(mouse_x, mouse_y, editProfilebannerBtn) &&
        !is_instersecting(mouse_x, mouse_y, profileBannerForm)) {
        profileBannerForm.classList.remove("active");
    }
    if (profilePicForm.classList.contains("active") &&
        !is_instersecting(mouse_x, mouse_y, editProfilePicBtn) &&
        !is_instersecting(mouse_x, mouse_y, profilePicForm)) {
        profilePicForm.classList.remove("active");
    }
})

function is_instersecting(x, y, target) {
    let [target_x , target_y] = [target.getBoundingClientRect().x, target.getBoundingClientRect().y]
    return ((x > target_x && x < target_x + target.clientWidth &&
              y > target_y && y < target_x + target.clientHeight))
}