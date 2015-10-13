function Event(element) {

  var articleElements = element.querySelectorAll('article');

  function Article(element) {

    var headerElement = element.querySelector('header');
    var moreElement = element.querySelector('.more');

    moreElement.hidden = true;

    function click() {
      if (moreElement.hidden) {
        moreElement.hidden = false;
        var height = moreElement.offsetHeight;
        moreElement.style.height = 0;
        moreElement.offsetHeight;
        moreElement.style.height = height+'px';
      } else {
        moreElement.style.height = 0;
        setTimeout(function(){
          moreElement.hidden = true;
          moreElement.style.height = null;
        },150);
      }
    }

    headerElement.addEventListener('click',click);

  }

  _.each(articleElements,function(element){
    new Article(element);
  });

}

_.each(document.querySelectorAll('.events'),function(e){
  new Event(e);
});
