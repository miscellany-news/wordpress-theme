SASS = sass --style compact

css: style.scss
	$(SASS) style.scss:style.css