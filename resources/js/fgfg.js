// відкриття та закриття вікна приймання картриджів
// 13:55 Адаптивная верстка интернет-магазина на Bootstrap 5. Урок 9.mp4
const offcanvasCartEl = document.getElementById("offcanvasCart");
const offcanvasCart = new bootstrap.Offcanvas(offcanvasCartEl);

document.getElementById("package-open").addEventListener("click", (e) => {
    e.preventDefault();
    offcanvasCart.toggle();
});

document.querySelectorAll(".closecart").forEach((item) => {
    item.addEventListener("click", (e) => {
        e.preventDefault();
        offcanvasCart.hide();
        let href = item.dataset.href;
        document.getElementById(href).scrollIntoView();
    });
});
// ./відкриття та закриття вікна приймання картриджів
