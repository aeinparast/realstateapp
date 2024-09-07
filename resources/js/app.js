import './bootstrap';
import 'bootstrap-icons/font/bootstrap-icons.css';


import '@splidejs/splide/css';
import Splide from '@splidejs/splide';


import EditorJS from '@editorjs/editorjs';
import Header from '@editorjs/header';
import List from '@editorjs/list';
import Quote from '@editorjs/quote';
import SimpleImage from "@editorjs/simple-image";



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

// main search-nav


document.addEventListener('DOMContentLoaded', function () {
  const settingsSection = document.getElementById('main');
  const settingsNavbar = document.getElementById('search-nav');
  const navBtn = document.getElementById('nav');


  window.addEventListener('scroll', function () {
    const sectionTop = settingsSection.getBoundingClientRect().top;
    const sectionBottom = settingsSection.getBoundingClientRect().bottom;

    if (sectionTop <= 0 && sectionBottom > 0) {
      settingsNavbar.classList.add('fade-in');
      settingsNavbar.classList.remove('fade-out');
      navBtn.classList.add('fade-out');
      navBtn.classList.remove('fade-in');
      navBtn.classList.add('hidden');
    } else {
      settingsNavbar.classList.add('fade-out');
      settingsNavbar.classList.remove('fade-in');
      navBtn.classList.remove('hidden');
      navBtn.classList.add('fade-in');
      navBtn.classList.remove('fade-out');


    }
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


function initEditor(savedData = null) {
  const editor = new EditorJS({
    holder: 'editorjs',
    data: savedData ? savedData : {},
    tools: {
      header: {
        class: Header,
        shortcut: 'CMD+SHIFT+H',
      },
      image: SimpleImage
      ,
      list: {
        class: List,
        inlineToolbar: true,
        config: {
          defaultStyle: 'unordered'
        }
      },
      quote: {
        class: Quote,
        inlineToolbar: true,
        shortcut: 'CMD+SHIFT+O',
        config: {
          quotePlaceholder: 'Enter a quote',
          captionPlaceholder: 'Quote\'s author',
        },
      },
    },


    i18n: {
      direction: 'rtl',
      messages: {

        ui: {
          "blockTunes": {
            "toggler": {
              "Click to tune": "برای تنظیم کلیک کنید",
              "or drag to move": "یا برای جابجایی بکشید"
            },
          },
          "inlineToolbar": {
            "converter": {
              "Convert to": "تبدیل به"
            }
          },
          "toolbar": {
            "toolbox": {
              "Add": "افزودن"
            }
          }
        },

        toolNames: {
          "Text": "متن",
          "Heading": "هدر",
          "List": 'لیست',
          "Quote": "نقل قول"
        },

        blockTunes: {
          'Convert To': 'تبدیل به',
          "delete": {
            "Delete": "حذف"
          },
          "moveUp": {
            "Move up": "انتقال به بالا"
          },
          "moveDown": {
            "Move down": "انتقال به پایین"
          }
        }

      }

    },
  });

  document.getElementById('save-button').addEventListener('click', () => {

    editor.save().then((outputData) => {
      document.getElementById('blogpost').value = JSON.stringify(outputData);
      const form = document.getElementById('blog-submit');
      form.submit();

    }).catch((error) => {
      console.error('Saving failed: ', error);

      // Hide loading indicator even on failure
      document.getElementById('loading-indicator').style.display = 'none';
    });
  });

};

function fetchEditorData(postId) {
  // Fetch the editor data for the given blog post ID
  fetch(`/get-editor-data/${postId}`)
    .then(response => response.json())
    .then(data => {
      initEditor(data); // Initialize Editor.js with the fetched data
    })
    .catch(error => {
      console.error('Error fetching editor data:', error);
      initEditor(); // Initialize without data in case of an error
    });
}

// Function to extract the blog post ID from the current URL
function getBlogIdFromUrl() {
  const pathParts = window.location.pathname.split('/');
  return pathParts[pathParts.length - 2]; // Extract the second-to-last part (ID)
}

// Check if the user is on an edit page (e.g., /blog/{id}/edit)
if (window.location.pathname.includes('/edit') && window.location.pathname.includes('/blog')) {
  const postId = getBlogIdFromUrl(); // Extract the post ID from the URL
  fetchEditorData(postId); // Fetch the editor data for this post
}


document.getElementById('save-button').addEventListener('click', () => {
  // Save the Editor.js data and transform it into JSON
  editor.save().then((outputData) => {
    // Transform the data into a JSON string
    const blogPostInput = document.getElementById('blogpost');

    // Insert the JSON data into the hidden input field
    blogPostInput.value = JSON.stringify(outputData);

    // Once the data is set, submit the form
    const form = document.getElementById('blog-submit');
    form.submit();

  }).catch((error) => {
    // Handle any errors in saving the data
    console.error('Saving failed:', error);
  });
});



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

// main search-nav


document.addEventListener('DOMContentLoaded', function () {
  const settingsSection = document.getElementById('main');
  const settingsNavbar = document.getElementById('search-nav');
  const navBtn = document.getElementById('nav');


  window.addEventListener('scroll', function () {
    const sectionTop = settingsSection.getBoundingClientRect().top;
    const sectionBottom = settingsSection.getBoundingClientRect().bottom;

    if (sectionTop <= 0 && sectionBottom > 0) {
      settingsNavbar.classList.add('fade-in');
      settingsNavbar.classList.remove('fade-out');
      navBtn.classList.add('fade-out');
      navBtn.classList.remove('fade-in');
      navBtn.classList.add('hidden');
    } else {
      settingsNavbar.classList.add('fade-out');
      settingsNavbar.classList.remove('fade-in');
      navBtn.classList.remove('hidden');
      navBtn.classList.add('fade-in');
      navBtn.classList.remove('fade-out');


    }
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

document.addEventListener('DOMContentLoaded', function () {
  var searchBtn = document.getElementById('search-btn');
  var searchModal = document.getElementById('search-modal');
  var searchModalClose = document.getElementById('searchModalClose');

  searchBtn.addEventListener('click', function () {
    searchModal.classList.remove('translate-x-full');
  });

  searchModalClose.addEventListener('click', function () {

    searchModal.classList.add('translate-x-full');
  });
});




document.addEventListener('DOMContentLoaded', function () {
  // Initialize Splide carousel
  var splide = new Splide('#main-carousel').mount();

  // Thumbnail click to navigate to the corresponding slide
  var thumbnails = document.querySelectorAll('#thumbnails .thumbnail');

  // Function to update the active thumbnail
  function updateActiveThumbnail(index) {
    thumbnails.forEach(function (thumbnail, i) {
      if (i === index) {
        thumbnail.classList.add('active');
      } else {
        thumbnail.classList.remove('active');
      }
    });
  }

  // Initialize the first thumbnail as active
  updateActiveThumbnail(0);

  // Update thumbnail when a thumbnail is clicked
  thumbnails.forEach(function (thumbnail, index) {
    thumbnail.addEventListener('click', function () {
      splide.go(index); // Navigate to the corresponding slide
      updateActiveThumbnail(index); // Update active thumbnail
    });
  });

  // Update thumbnail when the main slide changes
  splide.on('moved', function (newIndex) {
    updateActiveThumbnail(newIndex); // Update active thumbnail
  });

  // Fullscreen modal functionality
  var modal = document.getElementById('fullscreen-modal');
  var fullscreenImage = document.getElementById('fullscreen-image');
  var closeModalButton = document.getElementById('close-modal');
  var prevSlideButton = document.getElementById('prev-slide');
  var nextSlideButton = document.getElementById('next-slide');

  var slides = document.querySelectorAll('.splide__slide img');
  var currentIndex = 0;

  function showModal(index) {
    currentIndex = index;
    fullscreenImage.src = slides[currentIndex].src;
    modal.classList.remove('hidden');
  }

  slides.forEach(function (slide, index) {
    slide.addEventListener('click', function () {
      showModal(index);
    });
  });

  closeModalButton.addEventListener('click', function () {
    modal.classList.add('hidden');
  });

  prevSlideButton.addEventListener('click', function () {
    currentIndex = (currentIndex > 0) ? currentIndex - 1 : slides.length - 1;
    fullscreenImage.src = slides[currentIndex].src;
    updateActiveThumbnail(currentIndex); // Update active thumbnail when navigating
  });

  nextSlideButton.addEventListener('click', function () {
    currentIndex = (currentIndex < slides.length - 1) ? currentIndex + 1 : 0;
    fullscreenImage.src = slides[currentIndex].src;
    updateActiveThumbnail(currentIndex); // Update active thumbnail when navigating
  });

  modal.addEventListener('click', function (event) {
    if (event.target === modal) {
      modal.classList.add('hidden');
    }
  });
});



