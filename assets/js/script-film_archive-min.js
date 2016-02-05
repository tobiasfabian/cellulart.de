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

  function toggleFilm() {
    if (filmElement.classList.contains('expanded')) {
      filmElement.classList.remove('expanded');
    } else {
      filmElement.classList.add('expanded');
    }
  }

  filmElement.addEventListener('click',toggleFilm);

}

var films = document.getElementById('films').children;
for(var i = 0; i < films.length; i++) {
  new Film(films[i]);
}


