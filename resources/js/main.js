(function () {
    "use strict";

    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
        el = el.trim();
        if (all) {
            return [...document.querySelectorAll(el)];
        } else {
            return document.querySelector(el);
        }
    };


    // Меню заблюрене, фіксоване зверху. Прискролі висота зменьшується
    // інтегрувала вниз до Scroll - Progress 
    // const headerEl = document.getElementById("header")

    // window.addEventListener("scroll", function () {
    //   const scrollPos = window.scrollY
    
    //   if (scrollPos > 100) {
    //     headerEl.classList.add("header_mini")
    //   } else {
    //     headerEl.classList.remove("header_mini")
    //   }
    // })
    // ==================================

    // Scroll - To - Top - With - Scroll - Progress;
    let calcScrollValue = () => {
        let scrollProgress = document.getElementById("progress");
        let progressValue = document.getElementById("progress-value");
        let pos = document.documentElement.scrollTop;
        let calcHeight =
            document.documentElement.scrollHeight -
            document.documentElement.clientHeight;
        let scrollValue = Math.round((pos * 100) / calcHeight);

        const headerEl = document.getElementById("header")

        if (pos > 100) {
            scrollProgress.style.display = "grid";
            headerEl.classList.add("header_mini")
        } else {
            scrollProgress.style.display = "none";
            headerEl.classList.remove("header_mini")
        }
        scrollProgress.addEventListener("click", () => {
            document.documentElement.scrollTop = 0;
        });
        scrollProgress.style.background = `conic-gradient( #ffd333 ${scrollValue}%, #d7d7d7 ${scrollValue}%)`;
    };

    window.onscroll = calcScrollValue;
    window.onload = calcScrollValue;
})();
