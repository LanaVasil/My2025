(function () {
    ("use strict");

    // ==================Header====================
    // Андрей Кудлай
    // Lock - Верстка интернет-магазина замков на Bootstrap из Figma
    // 3. Оформление шапки. Часть 1 - 9:22
    // щоб працювало треба завантажити jquery-3.7.1.min.js
    // пошук по navbar, при натисканні на іконку лупи - відкривається поле для ввода літер пошуку
    $("#search-form-btn").on("click", function (e) {
        e.preventDefault();
        let form = $(this).parent();
        let inputSearch = form.find(".form-control");
        // показати поле Пошуку та встановити на нього фокус
        inputSearch.toggleClass("show").focus();

        // перевірка - є що шукати, тоді відправити форму
        if (inputSearch.val()) {
            form.submit();
        }
    });
    // ==================/ Header====================
})();

///* .search-form розкривається пошук по route*/
// .search-form {
//     position: absolute;
//     right: 0;
//     width: 100%;
//     z-index: 1100;
// }
// .search-form .form-control {
//     position: absolute;
//     right: 0;
//     border-radius: 2.2rem;
//     width: 0;
//     opacity: 0;
//     transition: all 0.3s;
// }
// .search-form .form-control .show {
//     position: absolute;
//     width: 100%;
//     opacity: 1;
// }
// .search-form button {
//     position: absolute;
//     right: 0;
//     top: 1;
//     background-color: var(--bs-gray-500);
//     color: var(--navbar-bg-color);
//     border: 0;
//     border-radius: 50%;
//     width: 2.3rem;
//     height: 2.3rem;
// }
// /* /.search-form */
// .search-form .form-control.show {
//     width: 100%;
//     opacity: 1;
// }

//   {{-- input по сайту працює! Але для роботи вимагає JS та jquery-3.7.1.min.js --}}
//   {{-- <form action="" class="search-form">
//     <input
//         type="text"
//         class="form-control"
//         type="text"
//         name="s"
//         placeholder="Пошук ..."
//         title=""
//         required
//     />
//     <button class="search-form-btn" id="search-form-btn" type="submit">
//       <i class="bi bi-search"></i>
//     </button>
//   </form> --}}
