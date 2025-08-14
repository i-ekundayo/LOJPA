// NAVBAR TOGGLER
const navbarToggler = document.getElementById("navbarToggler");
navbarToggler.addEventListener('click', () => {
  document.getElementById("navMenu").style.display = 'flex';
  document.getElementById("navBackdrop").style.display = 'flex';
  document.body.classList.add('no-scroll');
  document.documentElement.classList.add('no-scroll');
})

document.getElementById("navBackdrop").addEventListener('click', () => {
  document.getElementById("navMenu").style.display = 'none';
  document.getElementById("navBackdrop").style.display = 'none';
  document.body.classList.remove('no-scroll');
  document.documentElement.classList.remove('no-scroll');
})


// NEXT UPCOMING EVENT TIMER
var nextUpcomingEvent = new Date(eventDateTime).getTime();
var x = setInterval(function() {
    var now = new Date().getTime();
    var distance = nextUpcomingEvent - now;
    
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("days").innerHTML = "00";
        document.getElementById("hrs").innerHTML = "00";
        document.getElementById("mins").innerHTML = "00";
        document.getElementById("secs").innerHTML = "00";

        return;
    }

    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    document.getElementById("days").innerHTML = days;
    document.getElementById("hrs").innerHTML = hours;
    document.getElementById("mins").innerHTML = minutes;
    document.getElementById("secs").innerHTML = seconds;
    

}, 1000);


// SWIPER
const swiper = new Swiper('.swiper', {
  slidesPerView: 'auto',
  spaceBetween: 20,
  direction: 'horizontal',
  loop: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  scrollbar: {
    el: '.swiper-scrollbar',
    draggable: true,
  },
  grabCursor: true,
  simulateTouch: true,
});


// MODAL
const modal = document.getElementById("imageModal");
const modalImg = document.getElementById("modalImage");
const closeBtn = document.getElementById("closeModal");
const nextBtn = document.getElementById("nextModal");
const prevBtn = document.getElementById("prevModal");

const images = Array.from(document.querySelectorAll('.card img'));
let currentIndex = 0;

// Open modal and track current image
images.forEach((img, index) => {
  img.addEventListener('click', () => {
    modalImg.src = img.src;
    modal.style.display = 'flex';
    currentIndex = index;
  });
})

// Close modal using the close button
closeBtn.addEventListener('click', () => {
  modal.style.display = 'none';
});

// Close modal when clicking outside image
modal.addEventListener('click', (e) => {
  if (e.target === modal) {
    modal.style.display = "none";    
  }
});

// Navigate to previous image
prevBtn.addEventListener('click', (e) => {
  currentIndex = (currentIndex - 1 + images.length) % images.length;
  modalImg.src = images[currentIndex].src;
});

// Navigate to next image
nextBtn.addEventListener('click', (e) => {
  currentIndex = (currentIndex + 1 + images.length) % images.length;
  modalImg.src = images[currentIndex].src;
});