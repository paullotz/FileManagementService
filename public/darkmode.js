a = 0;
styleLink = document.getElementById("pagestyle");
btnChangeTheme = document.getElementById("changeTheme");

// 0 = Darkmode
function changeTheme() {
    if (a == 0) {
        styleLink.setAttribute("href", 'css/app.css');
        btnChangeTheme.innerText = "Dark Mode";
        a++;
    } else {
        styleLink.setAttribute("href", 'css/darkApp.css');
        btnChangeTheme.innerText = "Light Mode";
        a--;
    }
}

