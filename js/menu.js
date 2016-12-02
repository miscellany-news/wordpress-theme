document.addEventListener("DOMContentLoaded", function(event) {
  var body = document.body;
	var button = document.getElementById("hamburger-main");
  var background = document.getElementById("hamburger-page-background");

  addEvent(button, 'click', function(event) {
		event.preventDefault();
		toggle(body);
  });

  addEvent(background, 'click', function(event) {
		event.preventDefault();
		toggle(body);
  });
});

function addEvent(element, evnt, funct){
  if (element.attachEvent)
   return element.attachEvent('on'+evnt, funct);
  else
   return element.addEventListener(evnt, funct, false);
}

function toggle(element) {
	element.classList.toggle("navigation-active");
}
