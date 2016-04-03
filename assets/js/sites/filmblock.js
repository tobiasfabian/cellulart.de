function filmblock() {

  var videoElement = document.querySelector('main .video');

  if (videoElement) {

    var playElement = videoElement.querySelector('.play');
    var video = videoElement.querySelector('video');

    playElement.classList.add('hidden');

    videoElement.addEventListener('click',function(){
      if (video.paused === true) {
        video.play();
      } else {
        video.pause();
      }
    });

    video.addEventListener('canplay',function(){
      playElement.classList.remove('hidden');
    });

    video.addEventListener('play',function(){
      playElement.classList.add('hidden');
      video.controls = true;
    });

    video.addEventListener('pause',function(){
      playElement.classList.remove('hidden');
      video.controls = false;
    });

    video.addEventListener('ended',function(){
      playElement.classList.remove('hidden');
      video.controls = false;
    });

  }

}

if (document.body.classList.contains('filmblock')) {
  filmblock();
}
