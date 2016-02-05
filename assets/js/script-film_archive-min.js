function Selection(selectElement) {

  function checkStatus(){
    if (selectElement.selectedIndex === 0) {
      selectElement.classList.remove('selected');
    } else {
      selectElement.classList.add('selected');
    }
  }
  checkStatus();

  selectElement.addEventListener('change',checkStatus);

}

var selectElements = document.getElementById('header').querySelectorAll('select');
for(var i = 0; i < selectElements.length; i++) {
  new Selection(selectElements[i]);
}


function Header() {
  var headerElement = document.getElementById('header');
  var filmsElement = document.getElementById('films');
  var toggleHeaderElement = headerElement.querySelector('.toggle-header');

  function toggleHeader(e) {
    e.preventDefault();
    if (headerElement.classList.contains('expanded')) {
      this.classList.remove('collapse');
      headerElement.classList.remove('expanded');
      filmsElement.classList.remove('header-expanded');
    } else {
      this.classList.add('collapse');
      headerElement.classList.add('expanded')
      filmsElement.classList.add('header-expanded');
    }
  }

  toggleHeaderElement.addEventListener('click',toggleHeader);

}

new Header();



function Film(filmElement) {

  var images;

  function toggleFilm() {
    if (filmElement.classList.contains('expanded')) {
      filmElement.classList.remove('expanded');
    } else {
      filmElement.classList.add('expanded');
      if (typeof images === 'undefined') {
        SearchImages();
      }
    }
  }

  function SearchImages() {
    var request = new XMLHttpRequest();
    var url = location.protocol+'//'+location.host+location.pathname+'/'+filmElement.dataset.uri;
    request.onreadystatechange = function() {
      if (request.readyState === 4 && request.status === 200) {
        try {
          images = JSON.parse(request.responseText);
          var imagesElement = document.createElement('div');
          imagesElement.className = 'images';
          var imagesContainerElement = document.createElement('div');
          imagesContainerElement.className = 'images-container';
          for(var i = 0; i < images.length; i++) {
            var imgElement = document.createElement('img');
            imgElement.src = images[i];
            imagesContainerElement.appendChild(imgElement);
          }
          imagesElement.appendChild(imagesContainerElement);
          filmElement.appendChild(imagesElement);
        } catch(e) {
          images = null;
        }
      }
    };
    request.open('GET',url,true);
    request.send();
  }

  filmElement.addEventListener('click',toggleFilm);

}

var films = document.getElementById('films').children;
for(var i = 0; i < films.length; i++) {
  new Film(films[i]);
}


