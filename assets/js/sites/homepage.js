function homepage() {

  var videoElement = document.querySelector('.teaser video');

  if (videoElement.offsetWidth !== 0) {
    videoElement.addEventListener('canplaythrough',function(){
      this.play();
    });
  }

}

if (document.body.classList.contains('homepage')) {
  homepage();
}
