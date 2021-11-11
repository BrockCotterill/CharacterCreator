
var img = [
    '../assets/img/1.jpg',
    '../assets/img/2.jpg',
    '../assets/img/3.jpg',
    '../assets/img/4.jpg',
    '../assets/img/5.jpg'
    ];
document.getElementById("character").style.backgroundImage = 'url('+img[Math.floor(Math.random()*img.length)]+')';
