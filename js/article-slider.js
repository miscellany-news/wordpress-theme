document.addEventListener("DOMContentLoaded", function() {
  const featuredContainer = document.getElementsByClassName("section-featured")[0];
  if (!featuredContainer) return;

  const frontArticles = document.getElementsByClassName("fl-article");
  const dotContainer = document.createElement("div");
  dotContainer.classList.add("slider-dot-container");

  let mouseIn = false;
  let currentArticle = 0;

  featuredContainer.onmouseover = () => mouseIn = true;
  featuredContainer.onmouseleave = () => mouseIn = false;

  for (let i = 0; i < frontArticles.length; i++) {
    let dot = document.createElement("div");
    dot.classList.add("slider-dot");
    dot.onclick = () => switchTo(i);
    dotContainer.appendChild(dot);
  }
  toggle(sliderDots[0], "slider-dot-active");
  featuredContainer.appendChild(dotContainer);

  setInterval(() => {
    if (!mouseIn) switchTo(currentArticle+1);
  }, 5000);

  function toggle(el, className) {
    return el.classList.toggle(className);
  }

  function switchTo(n) {
    const nextArticle = n % articleCount;
    toggle(frontArticles[currentArticle], "fl-article-visible");
    toggle(dotContainer.children[currentArticle], "slider-dot-active");
    toggle(frontArticles[nextArticle], "fl-article-visible");
    toggle(sliderDots.children[nextArticle], "slider-dot-active")

    currentArticle = nextArticle;
  }

});
