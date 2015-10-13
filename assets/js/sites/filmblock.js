// function Film(filmElement) {
//
//   var videoElement = filmElement.querySelector('video');
//
//   filmElement.addEventListener('mouseenter',function(){
//     console.log('over');
//     videoElement.play();
//   });
//   filmElement.addEventListener('mouseleave',function(){
//     console.log('out');
//     videoElement.pause();
//   });
//
// }

function filmblock() {

  var videoElement = document.querySelector('main .video');
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

  // var filmElements = document.querySelectorAll('.films article');
  // _.each(filmElements,function(filmElement){
  //   new Film(filmElement)
  // });

}

if (document.body.classList.contains('filmblock')) {
  filmblock();
}
