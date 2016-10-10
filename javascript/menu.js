document.addEventListener("DOMContentLoaded", function(event) { 
  var items = document.getElementById("main-nav-1");
	var button = document.getElementById("sections-button");
	
	items.classList.add("hidden");
	
	button.addEventListener('click', function (event) { 	
		event.preventDefault();
		toggle(items);
	});
});

function addEvent(element, evnt, funct){
  if (element.attachEvent)
   return element.attachEvent('on'+evnt, funct);
  else
   return element.addEventListener(evnt, funct, false);
}

function toggle(items) {
	items.classList.toggle("hidden");
}