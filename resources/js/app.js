import './bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css';


import '@splidejs/splide/css';


import Splide from '@splidejs/splide';



// new Splide('.splide', {
//   type: 'fade',
//   rewind: true,
// }).mount();


var splide = new Splide('#main-carousel', {

  pagination: false,
});


var thumbnails = document.getElementsByClassName('thumbnail');
var current;


for (var i = 0; i < thumbnails.length; i++) {
  initThumbnail(thumbnails[i], i);
}


function initThumbnail(thumbnail, index) {
  thumbnail.addEventListener('click', function () {
    splide.go(index);
  });
}


splide.on('mounted move', function () {
  var thumbnail = thumbnails[splide.index];


  if (thumbnail) {
    if (current) {
      current.classList.remove('is-active');
    }


    thumbnail.classList.add('is-active');
    current = thumbnail;
  }
});


splide.mount();


AOS.init({ disable: true });


document.addEventListener('livewire:load', function () {
  Livewire.hook('message.processed', (message, component) => {
    AOS.init();
    document.querySelectorAll('[data-aos]').forEach((element) => {
      element.style.opacity = 1; // Ensure opacity is set to 1
      element.style.transform = 'none'; // Reset any transformations
    });
  });
});



