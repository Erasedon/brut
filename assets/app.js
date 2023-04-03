/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

// Get the carousel elements
class Carousel {
    constructor(carouselEl) {
      this.carousel = carouselEl;
      this.items = this.carousel.querySelector('.carousel__items');
      this.prevButton = this.carousel.querySelector('.carousel__arrow--prev');
      this.nextButton = this.carousel.querySelector('.carousel__arrow--next');
      this.currentItem = 0;
      this.totalItems = this.items.children.length;
      this.itemWidth = this.items.offsetWidth / this.totalItems;
      this.move = this.move.bind(this);
      this.next = this.next.bind(this);
      this.prev = this.prev.bind(this);
      this.prevButton.addEventListener('click', this.prev);
      this.nextButton.addEventListener('click', this.next);
    }
  
    move() {
      this.items.style.transform = `translateX(-${this.currentItem * this.itemWidth}px)`;
    }
  
    next() {
      this.currentItem = (this.currentItem + 1) % this.totalItems;
      this.move();
    }
  
    prev() {
      this.currentItem = (this.currentItem - 1 + this.totalItems) % this.totalItems;
      this.move();
    }
  }
  
  // Créer une instance de la classe Carousel pour chaque carousel présent sur la page
  const carousels = document.querySelectorAll('.carousel');
  carousels.forEach(carousel => new Carousel(carousel));

  let lastKnownScrollPosition = 0;
  let nav = document.querySelector('.text-black');
  let navHeight = nav.offsetHeight;
  
  function NavbarSticky(scrollPosition) {
    if (scrollPosition >= navHeight) {
      nav.classList.add('fixed');
    } else {
      nav.classList.remove('fixed');
    }
  }
  
  addEventListener("scroll", () => {
    lastKnownScrollPosition = window.scrollY;
    NavbarSticky(lastKnownScrollPosition);
  });
  
// onscroll = (event) => {};


