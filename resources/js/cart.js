// корзина

window.onload = function () {
    // відслідковую подію по натисканню
    document.addEventListener("click", documentActions);
    function documentActions(e) {
        const targetElement = e.target;

        // клик на круглу кнопку покласти в пакет
        if (targetElement.classList.contains("item-device__button")) {
            // alert("item-device__button");
            const deviceId = targetElement.closest(".item-device").dataset.pid;
            addToCartFly(targetElement, deviceId);
            e.preventDefault();
        }
    }
};

// Offcanvas-Пакет: кладемо device
function addToCartFly(deviceButton, deviceId) {
    // alert(deviceId);

    // перевірка на наявність в class атрибута _hold, та додавання
    if (!deviceButton.classList.contains("_hold")) {
        deviceButton.classList.add("_hold");
        deviceButton.classList.add("_fly");

        const cart = document.querySelector(".cart-header__icon");
        const device = document.querySelector(`[data-pid="${deviceId}"]`);
        const deviceImage = device.querySelector(".item-device__image");

        // створення клона зображення пакетика
        const deviceImageFly = deviceImage.cloneNode(true);

        // визначаємо розмір та координати клона
        const deviceImageFlyWidth = deviceImage.offsetWidth;
        const deviceImageFlyHeight = deviceImage.offsetHeight;
        const deviceImageFlyLeft = deviceImage.getBoundingClientRect().left;
        // const deviceImageFlyLeft = deviceImage.getBoundingClientRect().right;
        const deviceImageFlyTop = deviceImage.getBoundingClientRect().top;
        // const deviceImageFlyTop = deviceImage.getBoundingClientRect().bottom;

        deviceImageFly.setAttribute("class", "_flyImage _ibg");
        deviceImageFly.style.cssText = `
      left: ${deviceImageFlyLeft}px;
      top: ${deviceImageFlyTop}px;
      width: ${deviceImageFlyWidth}px;
      height: ${deviceImageFlyHeight}px;
      `;

        // додаємо клон (додається в кінець body)
        document.body.append(deviceImageFly);

        const cartFlyLeft = cart.getBoundingClientRect().left;
        const cartFlyTop = cart.getBoundingClientRect().top;

        deviceImageFly.style.cssText = `
      left: ${cartFlyLeft}px;
      top: ${cartFlyTop}px;
      width: 0px;
      height: 0px;
      opacity:0;
      `;

        deviceImageFly.addEventListener("transitionend", function () {
            if (deviceButton.classList.contains("_fly")) {
                // видалення клона зображення пакетика
                deviceImageFly.remove();

                updateCart(deviceButton, deviceId);
                deviceButton.classList.remove("_fly");
            }
        });
    }
}

// Offcanvas-Пакет: оновлення кількості (меню) та додаємо device
function updateCart(deviceButton, deviceId, deviceAdd = true) {
    const cart = document.querySelector(".cart-header");
    const cartIcon = cart.querySelector(".cart-header__icon");
    const cartQuantity = cartIcon.querySelector("span");

    // додаємо device
    if (deviceAdd) {
        if (cartQuantity) {
            cartQuantity.innerHTML = ++cartQuantity.innerHTML;
        } else {
            cartIcon.insertAdjacentHTML(
                "beforeend",
                `<span class="position-absolute translate-middle badge rounded-pill bg-warning">1
                    <span class="visually-hidden">unread messages</span>
                 </span>`
            );
            // 3:48:00
        }

        // прибираємо класс _hold
        deviceButton.classList.remove("_hold");
    }
}
