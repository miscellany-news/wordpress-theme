document.addEventListener("DOMContentLoaded", function(event) {
  var body = document.body;
	var menuButton = document.getElementById("hn-mobile-show");
  var searchButton = document.getElementById("header-search-show");
  var pageOverlay = document.getElementById("page-overlay");

  addEvent(menuButton, 'click', function(event) {
		event.preventDefault();
		toggle(body, 'menu-active');
  });

  addEvent(searchButton, 'click', function(event) {
    event.preventDefault();
    toggle(body, 'search-active');
  });

  addEvent(pageOverlay, 'click', function(event) {
    event.preventDefault();
    body.classList.remove('menu-active');
    body.classList.remove('search-active');
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
