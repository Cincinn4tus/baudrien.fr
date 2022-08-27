var body = document.getElementsByTagName('body')[0];
var btn = document.getElementById('theme-btn');
var dark_theme_class = 'dark';
var theme = getCookie('theme');

if(theme != '') {
    body.classList.add(theme);
}

document.addEventListener('DOMContentLoaded', function () {
    btn.addEventListener('click', function () {

        if (body.classList.contains(dark_theme_class)) {
            body.classList.remove(dark_theme_class);
            setCookie('theme', 'light');
        }
        else {
            body.classList.add(dark_theme_class);
            setCookie('theme', 'dark');
        }

    });
});

// enregistrement du theme dans le cookie

function setCookie(name, value) {
    var d = new Date();
    d.setTime(d.getTime() + (365*24*60*60*1000));
    var expires = "expires=" + d.toUTCString();
    console.log(expires)
    document.cookie = name + "=" + value + ";" + expires + ";path=/";
    console.log(document.cookie)
}

// methode de recuperation du theme dans le cookie

function getCookie(cname) {
    var theme = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(theme) == 0) {
            return c.substring(theme.length, c.length);
        }
    }
    return "";
}





/* BARRE RECHERCHE */

function getdata() {
    let pseudo = document.getElementById("pseudo");
    let arrayBtn = document.getElementById("all-users");


    if(pseudo){
        
        if (pseudo.value) {
            let req = new XMLHttpRequest();
            req.addEventListener('loadend', (e) => {    
                resultDiv = document.getElementById('results');
                resultDiv.innerHTML = e.target.response;
            });
            req.open("GET", '/getdata.php?pseudo=' + pseudo.value);
            req.send(); 
        } 
        
        } else {
            console.error("ERROR: missing input pseudo");
        }
}

