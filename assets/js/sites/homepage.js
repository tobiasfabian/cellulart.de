function homepage() {

  var overlayElement = document.querySelector('.overlay');
  var celluElement = overlayElement.querySelector('.cellu');
  var lartElement = overlayElement.querySelector('.lart');
  var dateElement = overlayElement.querySelector('.date');
  var venueElement = overlayElement.querySelector('.venue');
  var logoElement = document.querySelector('.mainfooter .logo');
  var videoElement = document.querySelector('.teaser video');

  videoElement.addEventListener('canplaythrough',function(){
    this.play();
    console.log('canplaythrough');
  });
  videoElement.addEventListener('timeupdate',function(){
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
    console.log(this.currentTime);
  });

}

if (document.body.classList.contains('homepage')) {
  homepage();
}
