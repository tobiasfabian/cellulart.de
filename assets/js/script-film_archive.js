function Header() {
  var headerElement = document.getElementById('header');
  var mainElement = document.querySelector('main');
  var toggleHeaderElement = headerElement.querySelector('.toggle-header');

  function toggleHeader(e) {
    e.preventDefault();
    if (headerElement.classList.contains('expanded')) {
      this.classList.remove('collapse');
      headerElement.classList.remove('expanded');
      mainElement.classList.remove('header-expanded');
    } else {
      this.classList.add('collapse');
      headerElement.classList.add('expanded')
      mainElement.classList.add('header-expanded');
    }
  }

  toggleHeaderElement.addEventListener('click',toggleHeader);

}

new Header();
