gsap.registerPlugin(CSSRulePlugin);
/**
 * Wait for an element before resolving a promise
 * @param {String} querySelector - Selector of element to wait for
 * @param {Integer} timeout - Milliseconds to wait before timing out, or 0 for no timeout
 */
function waitForElement(querySelector, timeout) {
  return new Promise((resolve, reject) => {
    var timer = false;
    if (document.querySelectorAll(querySelector).length) return resolve();
    const observer = new MutationObserver(() => {
      if (document.querySelectorAll(querySelector).length) {
        observer.disconnect();
        if (timer !== false) clearTimeout(timer);
        return resolve();
      }
    });
    observer.observe(document.body, {
      childList: true,
      subtree: true,
    });
    if (timeout)
      timer = setTimeout(() => {
        observer.disconnect();
        reject();
      }, timeout);
  });
}

document.addEventListener("DOMContentLoaded", () => {
  const splideElement = document.querySelector(".splide__list");
  const splideChildren = splideElement.children;

  // DATA SETTER AND GETTER
  let data = {
    activeItem: null,
    get getActiveItem() {
      return this.activeItem;
    },
    /**
     * @param {any} value
     */
    set setActiveItem(value) {
      this.activeItem = value;
    },
  };
  const colors = {
    ANIMATION: {
      circle: "#ff7f00",
      background: "#ff9f1c",
      keywords: ["Motion Graphics", "Character", "Storyboards"],
    },
    ABOUT: {
      circle: "#3F0A53",
      background: "#540D6E",
    },
    DESIGN: {
      circle: "#D13333",
      background: "#E53C51",
      keywords: ["Branding", "UX/UI", "Web & Mobile"],
    },
    ILLUSTRATION: {
      circle: "#279B8D",
      background: "#2EC4B6",
      keywords: ["Digital", "Vector Graphics", "Traditional"],
    },
    CONTACT: {
      circle: "#E6E6E6",
      background: "#FDFFFC",
    },
  };

  if (splideChildren) {
    const splideArray = [...splideChildren];
    splideArray.forEach((item) => {
      item.classList.add("splide__slide");
      let text = item.querySelector("a").textContent;
    });
  }

  const splide = new Splide(".splide", {
    type: "loop",
    focus: "center",
    start: 2,
    perPage: 1,
    perMove: 1,
    // fixedWidth: 950,
    easing: "cubic-bezier(0.83, 0, 0.17, 1)",
    speed: 750,
  });
  splide.mount();

  const aOutline = CSSRulePlugin.getRule(
    ".splide .splide__track .splide__list .splide__slide a"
  );
  const aHover = CSSRulePlugin.getRule(
    ".splide .splide__track .splide__list .splide__slide a:hover"
  );
  const arrow = CSSRulePlugin.getRule(
    ".hero .splide .splide__arrows .splide__arrow"
  )
  const arrowHover = CSSRulePlugin.getRule(
    ".hero .splide .splide__arrows .splide__arrow:hover"
  )
  const burgerStyle = CSSRulePlugin.getRule("#lottie svg g path");
  function changeColors(value) {
    gsap.to(".hero", {
      backgroundColor: colors[value]?.background,
      duration: 0.6,
      ease: "easeInOut",
    });
    gsap.to(".hero svg circle", {
      fill: colors[value]?.circle,
      duration: 0.5,
      ease: "easeInOut",
    });

    if (value === "CONTACT") {
      gsap.to(aOutline, {
        duration: 0.5,
        ease: "easeInOut",
        cssRule: {
          webkitTextStrokeColor: "#011627",
        },
      });
      gsap.to(aHover, {
        duration: 0.5,
        ease: "easeInOut",
        cssRule: {
          color: "rgba(1, 22, 39, 0.314)",
          webkitTextStrokeColor: "transparent",
        },
      });
      gsap.to(arrow, {
        duration: 0.5,
        ease: "easeInOut",
        cssRule: {
          color: "transparent",
          webkitTextStrokeColor: "#011627",
        },
      });
      gsap.to(arrowHover, {
        duration: 0.5,
        ease: "easeInOut",
        cssRule: {
          color: "#011627",
          webkitTextStrokeColor: "transparent",
        },
      });
      gsap.to(burgerStyle, {
        duration: 0.5,
        ease: "easeInOut",
        cssRule: {
          stroke: "#011627",
        },
      });
      gsap.to("#navbrand", {
        color: "#011627",
        duration: 0.5,
        ease: "easeInOut",
      });
      gsap.to(".splide__pagination__page", {
        background: "#01162750",
        duration: 0.5,
        ease: "easeInOut",
      });
      gsap.to(".splide__pagination__page.is-active", {
        background: "#011627",
        duration: 0.5,
        ease: "easeInOut",
      });
    } else {
      gsap.to(aOutline, {
        duration: 0.5,
        ease: "easeInOut",
        cssRule: {
          webkitTextStrokeColor: "#fff",
        },
      });
      gsap.to(aHover, {
        duration: 0.5,
        ease: "easeInOut",
        cssRule: {
          webkitTextStrokeColor: "transparent",
          color: "rgba(255, 255, 255, 0.314)",
        },
      });
      gsap.to(arrow, {
        duration: 0.5,
        ease: "easeInOut",
        cssRule: {
          webkitTextStrokeColor: "#ffffff",
        },
      });
      gsap.to(arrowHover, {
        duration: 0.5,
        ease: "easeInOut",
        cssRule: {
          color: "rgba(255, 255, 255, 0.314)",
          webkitTextStrokeColor: "transparent",
        }
      });
      gsap.to(burgerStyle, {
        duration: 0.5,
        ease: "easeInOut",
        cssRule: {
          stroke: "#fff",
        },
      });
      gsap.to("#navbrand", {
        color: "#fff",
        duration: 0.5,
        ease: "easeInOut",
      });
      gsap.to(".splide__pagination__page", {
        background: "#ccc",
        duration: 0.5,
        ease: "easeInOut",
      });
      gsap.to(".splide__pagination__page.is-active", {
        background: "#fff",
        duration: 0.5,
        ease: "easeInOut",
      });
    }
  }

  splide.on("move", function (newIndex, prevIndex, destIndex) {
    const { Controller, Slides } = splide.Components;
    let newActive = data.getActiveItem;
    let currentSlide = Controller.getIndex();
    let nextSlide = Controller.getNext(true) - 1;
    if (nextSlide === currentSlide) {
      let nextSlideItem = Slides.getAt(currentSlide).slide;
      let text = nextSlideItem.querySelector("a").textContent;
      changeColors(text);
    }
  });

});

// Lottie setup for nav hamburger icon
document.addEventListener("DOMContentLoaded", () => {
  const burger = document.getElementById("lottie");
  const burgerStyle = CSSRulePlugin.getRule("#lottie svg g path");
  const toggler = document.querySelector(".navbar-toggler");
  const arrows = CSSRulePlugin.getRule(".hero .splide .splide__arrows");
  lottie.loadAnimation({
    container: burger, // the dom element that will contain the animation
    renderer: "svg",
    loop: false,
    autoplay: false,
    path: "https://assets2.lottiefiles.com/packages/lf20_37mrdcst.json", // the path to the animation json
  });


  

  toggler.addEventListener("click", () => {
    const state = toggler.getAttribute("aria-expanded");
    const active = document.querySelector('.splide__slide.is-active a');
    const contact = active.getAttribute('title');

    function changeBurgerColor() {
      if (state === "false") {
        gsap.to(burgerStyle, {
          duration: 1.5,
          ease: "easeInOut",
          cssRule: {
            stroke: "#011627",
          },
        });
        gsap.to(arrows, {
          duration: 0.5,
          ease: "easeInOut",
          cssRule: {
            display: "none",
          },
        });
      } else {
        gsap.to(burgerStyle, {
          duration: 1.5,
          ease: "easeInOut",
          cssRule: {
            stroke: "#fff",
          },
        });
        gsap.to(arrows, {
          duration: 1.5,
          ease: "easeInOut",
          cssRule: {
            display: 'flex',
          },
        });
      }
      
      if(contact === "CONTACT") {
        gsap.to(burgerStyle, {
          duration: 1.5,
          ease: "easeInOut",
          cssRule: {
            stroke: "#011627",
          }, 
        });
      } 
    }

    if (state === "false") {
      changeBurgerColor();
      lottie.setDirection(1);
      lottie.play();
    } else {
      changeBurgerColor();
      lottie.setDirection(-1);
      lottie.play();
    }
  });
});
