// console.log('Hello')
document.addEventListener("DOMContentLoaded", () => {
    const searchInput = document.querySelector(".inputSearch");
    const products = document.querySelectorAll(".product");

    searchInput.addEventListener('input',() => {
            const filter = searchInput.value.toLowerCase();

            // console.log("Texto de búsqueda:", filter)

            products.forEach((product) => {
                const productName =
                    product.querySelector("h3").textContent.toLowerCase();
                    // console.log("Producto:", productName)

                if (productName.includes(filter)) {
                    product.style.display = '';
                } else {
                    product.style.display = 'none';
                }
            });
        });
    });

