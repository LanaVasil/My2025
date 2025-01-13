(function () {
    ("use strict");

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

    // відкриття та закриття вікна приймання пристроїв/картриджів
    // [Андрей Кудлай] 13:55 Адаптивная верстка интернет-магазина на Bootstrap 5. Урок 9.mp4
    const offcanvasCartEl = document.getElementById("offcanvasCart");
    const offcanvasCart = new bootstrap.Offcanvas(offcanvasCartEl);

    document.getElementById("cart-open").addEventListener("click", (e) => {
        e.preventDefault();
        offcanvasCart.toggle();
    });

    // закривання при переході на посилання
    document.querySelectorAll(".closecart").forEach((item) => {
        item.addEventListener("click", (e) => {
            e.preventDefault();
            offcanvasCart.hide();
            let href = item.dataset.href;
            document.getElementById(href).scrollIntoView();
        });
    });
    // ./відкриття та закриття вікна приймання пристроїв/картриджів

    // id="progress" моя кнопка скрола вверх
    // id="top" [Андрей Кудлай] 19:40 Адаптивная верстка интернет-магазина на Bootstrap 5. Урок 8.mp4

    // Scroll - To - Top - With - Scroll - Progress;
    let calcScrollValue = () => {
        let scrollProgress = document.getElementById("progress");
        let progressValue = document.getElementById("progress-value");
        let pos = document.documentElement.scrollTop;
        let calcHeight =
            document.documentElement.scrollHeight -
            document.documentElement.clientHeight;
        let scrollValue = Math.round((pos * 100) / calcHeight);

        if (pos > 100) {
            scrollProgress.style.display = "grid";
        } else {
            scrollProgress.style.display = "none";
        }
        scrollProgress.addEventListener("click", () => {
            document.documentElement.scrollTop = 0;
        });
        scrollProgress.style.background = `conic-gradient( #ffd333 ${scrollValue}%, #d7d7d7 ${scrollValue}%)`;
    };

    window.onscroll = calcScrollValue;
    window.onload = calcScrollValue;

    // Offcanvas-Пакет: кладемо device
    function addToCart(deviceButton, deviceId) {
        // alert(deviceId);
    }
})();
