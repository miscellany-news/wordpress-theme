document.onload = function() {
  const frontArticles = document.getElementsByClassName("fl-article");
  const sliderDots = [];
  const articleCount = frontArticles.length;
  var currentArticle = 0;

  function switchTo(n) {
    const nextArticle = n % articleCount;
    frontArticles[currentArticle].classList.toggle("fl-article-visible");
    sliderDots[currentArticle].classList.toggle("slider-dot-active")
    frontArticles[nextArticle].classList.toggle("fl-article-visible");
    sliderDots[nextArticle].classList.toggle("slider-dot-active")
    currentArticle = nextArticle;
  }
  
  const featuredContainer = document.getElementsByClassName("section-featured")[0];
  const dotContainer = document.createElement("div");
  dotContainer.classList.add("slider-dot-container");

  for (let i = 0; i < articleCount; i++) {
    let dot = document.createElement("div");
    dot.classList.add("slider-dot");
    dot.onclick = () => switchTo(i);
    dotContainer.appendChild(dot);
    sliderDots.push(dot);
  }

  sliderDots[0].classList.toggle("slider-dot-active")
  featuredContainer.appendChild(dotContainer);

  setInterval(() => {
    switchTo(currentArticle+1);
  }, 5000);
}
