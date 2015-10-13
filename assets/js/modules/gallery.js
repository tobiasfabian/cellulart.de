function Gallery(element) {

  var ulElement = element.querySelector('ul');
  var liElements = ulElement.children;
  var previousElement = element.querySelector('nav a.previous');
  var nextElement = element.querySelector('nav a.next');

  var currentActive = 0;
  var length = ulElement.childElementCount;


  function previous() {
    if (currentActive > 0) {
      var figcaption = liElements[currentActive].querySelector('figcaption');
      if (figcaption) {
        figcaption.classList.remove('show');
      }
      currentActive = currentActive-1;
      ulElement.style.transform = 'translateX(-'+currentActive+'00%)';
      var figcaption = liElements[currentActive].querySelector('figcaption');
      if (figcaption) {
        figcaption.classList.add('show');
      }
      checkNavButtons();
    }
  }

  function next() {
    if (currentActive < length-1) {
      var figcaption = liElements[currentActive].querySelector('figcaption');
      if (figcaption) {
        figcaption.classList.remove('show');
      }
      currentActive = currentActive+1;
      ulElement.style.transform = 'translateX(-'+currentActive+'00%)';
      var figcaption = liElements[currentActive].querySelector('figcaption');
      if (figcaption) {
        figcaption.classList.add('show');
      }
      checkNavButtons();
    }
  }

  function checkNavButtons() {
    if (length === 1) {
      previousElement.hidden = true;
      nextElement.hidden = true;
    } else {
      if (currentActive === 0) {
        previousElement.classList.add('inactive');
      } else {
        previousElement.classList.remove('inactive');
      }
      if (currentActive === length-1) {
        nextElement.classList.add('inactive');
      } else {
        nextElement.classList.remove('inactive');
      }
    }
  }

  checkNavButtons();

  var figcaption = liElements[0].querySelector('figcaption');
  if (figcaption) {
    figcaption.classList.add('show');
  }

  previousElement.addEventListener('click',function(){
    previous();
  });
  nextElement.addEventListener('click',function(){
    next();
  });


  // touch
  var start = 0;
  var x = 0;
  element.addEventListener('touchstart',function(e){
    start = e.layerX;
  });
  element.addEventListener('touchmove',function(e){
    x = e.layerX-start;
    if (currentActive === 0 && x > 0) {
      x = Math.sqrt(x*2);
    } else if (currentActive === length-1 && x < 0) {
      x = -Math.sqrt(Math.abs(x)*2);
    }
    ulElement.style.transform = 'translateX(calc(-'+currentActive+'00% + '+x+'px))';
  });
  element.addEventListener('touchend',function(){
    if (x < -50) {
      next();
    } else if (x > 50) {
      previous();
    } else {
      ulElement.style.transform = 'translateX(-'+currentActive+'00%)';
    }
  });

}

var galleryElements = document.querySelectorAll('.gallery');
_.each(galleryElements,function(e){
  new Gallery(e);
});
