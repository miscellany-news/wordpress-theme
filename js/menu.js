document.addEventListener("DOMContentLoaded", function(event) {
  var body = document.body;
	var menuButton = document.getElementById("hn-mobile-show");

  addEvent(menuButton, 'click', function(event) {
		event.preventDefault();
		toggle(body, 'menu-active');
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
