document.addEventListener("DOMContentLoaded", function(event) {
  var body = document.body;
	var searchButton = document.getElementById("hn-search");

  addEvent(searchButton, 'click', function(event) {
		event.preventDefault();
		toggle(body, 'search-active');
  });

});

function addEvent(element, evnt, funct){
  if (element.attachEvent)
   return element.attachEvent('on'+evnt, funct);
  else
   return element.addEventListener(evnt, funct, false);
}

function toggle(element, newClass) {
	element.classList.toggle(newClass);
}
