function homepage() {

  var overlayElement = document.querySelector('.overlay');
  var celluElement = overlayElement.querySelector('.cellu');
  var lartElement = overlayElement.querySelector('.lart');
  var dateElement = overlayElement.querySelector('.date');
  var venueElement = overlayElement.querySelector('.venue');
  var logoElement = document.querySelector('.mainfooter .logo');
  var videoElement = document.querySelector('.teaser video');
  var imgElement = document.querySelector('.teaser img');

  function showElementsWithTimeouts() {
    videoElement.style.display = 'none';
    imgElement.style.display = 'block';
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

  var videoTimeout = setTimeout(showElementsWithTimeouts,2*1000);

  if (videoElement.offsetWidth !== 0) {
    videoElement.addEventListener('canplaythrough',function(){
      this.play();
    });
    videoElement.addEventListener('timeupdate',function(){
      clearTimeout(videoTimeout);
      if (this.currentTime > 1.4) {
        dateElement.style.opacity = '1';
      }
      if (this.currentTime > 2) {
        venueElement.style.opacity = '1';
      }
      if (this.currentTime > 4.8) {
        celluElement.style.opacity = '1';
        lartElement.style.opacity = '1';
      }
      if (this.currentTime > 6.8) {
        logoElement.style.transition = '1s';
        logoElement.offsetWidth;
        logoElement.style.opacity = '1';
      }
    });
    videoElement.addEventListener('ended',function(){
      setTimeout(function(){
        videoElement.currentTime = 0;
        videoElement.play();
        dateElement.style.opacity = null;
        venueElement.style.opacity = null;
        celluElement.style.opacity = null;
        lartElement.style.opacity = null;
        logoElement.style.transitionDuration = '150ms';
        logoElement.style.opacity = null;
        logoElement.offsetWidth;
        logoElement.style.transitionDuration = null;
      },4000);
    });
  } else {
    showElementsWithTimeouts();
  }




}

if (document.body.classList.contains('homepage')) {
  homepage();
}
