function mainnav() {

  var mainnavElement = document.querySelector('.mainnav');
  var togglenavElement = mainnavElement.querySelector('.togglenav');
  var nav1Element = mainnavElement.querySelector('.nav-1');
  var nav2Element = mainnavElement.querySelector('.nav-2');
  var nav3Element = mainnavElement.querySelector('.nav-3');
  var nav1LiElements = nav1Element.querySelectorAll('li');
  var nav2LiElements;

  if (nav2Element) {
    nav2LiElements = nav2Element.querySelectorAll('li')
  }

  function hideNav2And3() {
    if (nav2Element) {
      nav2Element.classList.add('hide');
    }
    if (nav3Element) {
      nav3Element.classList.add('hide');
    }
  }

  function hideNav3() {
    if (nav3Element) {
      nav3Element.classList.add('hide');
    }
  }

  function showNavs() {
    if (nav2Element) {
      nav2Element.classList.remove('hide');
    }
    if (nav3Element) {
      nav3Element.classList.remove('hide');
    }
  }

  togglenavElement.addEventListener('click',function(){
    if (mainnavElement.classList.contains('open')) {
      mainnavElement.classList.remove('open');
    } else {
      mainnavElement.classList.add('open');
    }
  });

  _.each(nav1LiElements, function(element) {
    if (element.querySelector('ul') && !element.classList.contains('active')) {
      element.addEventListener('mouseover', hideNav2And3);
      element.addEventListener('mouseout', showNavs);
    }
  });

  _.each(nav2LiElements, function(element) {
    if (element.querySelector('ul') && !element.classList.contains('active')) {
      element.addEventListener('mouseover', hideNav3);
      element.addEventListener('mouseout', showNavs);
    }
  });

}

mainnav();
