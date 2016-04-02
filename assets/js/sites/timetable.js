function timetable() {

  var eventElements = document.querySelectorAll('.timetable .day .event');
  var hoursSpanElements = document.querySelectorAll('.timetable .hours span');

  _.each(eventElements, function(element){
    var hours = element.dataset.time.substr(0, 2);
    var minutes = element.dataset.time.substr(3);
    var top = ((hours - 15.5) + (minutes / 60)) * 4;
    var duration = element.dataset.duration;
    var height = duration * 4;
    element.style.top = 'calc(' + top + 'rem + 2px)';
    element.style.height = 'calc(' + height + 'rem - 2px)';
  });

  _.each(hoursSpanElements, function(element){
    var hours = element.innerHTML.substr(0, 2);
    if (hours === '00') {
      hours = 24;
    }
    var minutes = element.innerHTML.substr(3);
    var top = ((hours - 15.5) + (minutes / 60)) * 4;
    element.style.top = top + 'rem';
  });

}

if (document.body.classList.contains('timetable')) {
  timetable();
}
