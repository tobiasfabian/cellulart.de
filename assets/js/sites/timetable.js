function timetable() {

  var eventElements = document.querySelectorAll('.timetable .day .event');

  _.each(eventElements, function(element){
    var hours = element.dataset.time.substr(0, 2);
    var minutes = element.dataset.time.substr(3);
    var top = ((hours - 17) + (minutes / 60)) * 4;
    var duration = element.dataset.duration;
    var height = duration * 4;
    element.style.top = top + 'em';
    element.style.height = height + 'em';
  });

}

if (document.body.classList.contains('timetable')) {
  timetable();
}
