const toggle_btn = document.getElementById('theme-btn');
const body = document.getElementsByTagName('body')[0];
const navbar = document.getElementsByTagName('nav');
const addImg = document.getElementById('add-btn');
const form = document.getElementById('location-form');


let dark_theme_class = 'dark';


toggle_btn.addEventListener('click', function() {

    if (body.classList.contains(dark_theme_class)) {

        body.classList.remove(dark_theme_class);

    }

    else {

    body.classList.add(dark_theme_class);

    }

});


