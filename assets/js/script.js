const toggle_btn = document.getElementById('theme-btn');
const body = document.getElementsByTagName('body')[0];
const navbar = document.getElementsByTagName('nav');


let dark_theme_class = 'dark';


toggle_btn.addEventListener('click', function(colorScheme) {

    if (body.classList.contains(dark_theme_class)) {

        body.classList.remove(dark_theme_class);

    }

    else {

    body.classList.add(dark_theme_class);

    }

});

sessionStorage.setItem('scheme', colorScheme);

var theme_change = sessionStorage.getItem('scheme');