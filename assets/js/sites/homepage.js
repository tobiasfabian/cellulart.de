function homepage() {

  var overlayElement = document.querySelector('.overlay');
  var celluElement = overlayElement.querySelector('.cellu');
  var lartElement = overlayElement.querySelector('.lart');
  var dateElement = overlayElement.querySelector('.date');
  var venueElement = overlayElement.querySelector('.venue');
  var logoElement = document.querySelector('.mainfooter .logo');

  setTimeout(function(){
    celluElement.style.opacity = '1';
    lartElement.style.opacity = '1';
  },1*1000);
  setTimeout(function(){
    dateElement.style.opacity = '1';
  },2.5*1000);
  setTimeout(function(){
    venueElement.style.opacity = '1';
  },2.7*1000);
  setTimeout(function(){
    logoElement.style.transition = '1s';
    logoElement.offsetWidth;
    logoElement.style.opacity = '1';
  },2.9*1000);

}

if (document.body.classList.contains('homepage')) {
  homepage();
}
