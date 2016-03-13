(function() {

  var shareAElements = document.querySelectorAll('.share a');

  _.each(shareAElements, function(element) {
    element.addEventListener('click', function(e) {
      e.preventDefault();
      var url = this.href;
      var width = 640;
      var height = 400;
      var left = (screen.width / 2) - (width / 2);
      var top = (screen.height / 2) - (height / 2);
      window.open(url, '', 'width=' + width + ', height=' + height + ', top=' + top + ', left=' + left);
    });
  });

})();
