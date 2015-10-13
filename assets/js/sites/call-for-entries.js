function callForEntries() {

  var mainElement = document.querySelector('main');
  var textElement = mainElement.querySelector('.text');
  var span1Element = mainElement.querySelector('h1 span:nth-of-type(1)');
  var span2Element = mainElement.querySelector('h1 span:nth-of-type(2)');
  var span3Element = mainElement.querySelector('h1 span:nth-of-type(3)');

  textElement.style.opacity = '0';
  textElement.offsetWidth;
  textElement.style.transition = '400ms';
  span1Element.style.opacity = '0';
  span2Element.style.opacity = '0';
  span3Element.style.opacity = '0';

  setTimeout(function(){
    span1Element.style.opacity = '1';
  },500);
  setTimeout(function(){
    span2Element.style.opacity = '1';
  },800);
  setTimeout(function(){
    span3Element.style.opacity = '1';
  },1100);

  setTimeout(function(){
    textElement.style.opacity = '1';
  },1.5*1100);

}

if (document.body.classList.contains('call-for-entries')) {
  callForEntries();
}
