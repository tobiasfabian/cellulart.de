function mainnav() {

  var mainnavElement = document.querySelector('.mainnav');
  var togglenavElement = mainnavElement.querySelector('.togglenav');

  togglenavElement.addEventListener('click',function(){
    if (mainnavElement.classList.contains('open')) {
      mainnavElement.classList.remove('open');
    } else {
      mainnavElement.classList.add('open');
    }
  });

}

mainnav();
