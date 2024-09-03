import './bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css';


import '@splidejs/splide/css';
import Splide from '@splidejs/splide';



// Define styles for each part of the table
const style = {
  title: 'color: white; background: blue; padding: 4px; font-weight: bold;',
  key: 'color: black; background: yellow; padding: 4px;',
  value: 'color: white; background: green; padding: 4px;',
  link: 'color: white; background: green; padding: 4px; text-decoration: underline;', // Style for the link
};

// Define the data to be displayed
const data = [
  { key: 'Made by:', value: 'WindDevKit' },
  { key: 'Phone:', value: '+9893020325' },
  { key: 'website:', value: 'winddevkit.ir' },
  { key: 'Telegram:', value: '@winddevkit' }
];

// Log the title
console.log('%c Developer Info Table ', style.title);

// Log each row of the table
data.forEach(row => {
  if (row.key === 'website:') {
    console.log(`%c${row.key}%c%s`, style.key, style.link, `https://${row.value}`);
  } else {
    console.log(`%c${row.key}%c${row.value}`, style.key, style.value);
  }
});

console.log(`%cIran-Sans Font License: %cvdsavsavds`, style.key, style.value);



// new Splide('.splide', {
//   type: 'fade',
//   rewind: true,
// }).mount();




document.addEventListener('DOMContentLoaded', function () {
  const sections = document.querySelectorAll('.scroll-section');

  const options = {
    root: null,
    threshold: 0.1,
  };

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.remove('opacity-0', 'translate-y-10');
        entry.target.classList.add('opacity-100', 'translate-y-0');
        observer.unobserve(entry.target);
      }
    });
  }, options);

  sections.forEach(section => {
    observer.observe(section);
  });
});


document.addEventListener('DOMContentLoaded', function () {
  const items = document.querySelectorAll('.list_item');

  items.forEach((item, index) => {
    setTimeout(() => {
      item.classList.add('visible');
    }, index * 300); // 300ms delay for each item
  });
});




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









