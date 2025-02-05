document.addEventListener("DOMContentLoaded", () => {
    const showForm = document.getElementById("btnNewProduct");
    const addProductForm = document.getElementById("addProductForm");

    // Show/hide "Add Product" form
    showForm.addEventListener("click", (e) => {
        e.preventDefault();

        if (
            addProductForm.style.display === "none" ||
            addProductForm.style.display === ""
        ) {
            addProductForm.style.display = "block";
        } else {
            addProductForm.style.display = "none";
        }
    });

    const showListProducts = document.getElementById("btnProductList");
    const listProducts = document.getElementById("productsList");

    // Show/hide product list
    showListProducts.addEventListener("click", (e) => {
        e.preventDefault();

        if (
            listProducts.style.display === "none" ||
            listProducts.style.display === ""
        ) {
            listProducts.style.display = "block";
        } else {
            listProducts.style.display = "none";
        }
    });

    const modifyLinks = document.querySelectorAll(".modify-link");
    const cancelButtons = document.querySelectorAll(".cancel-button");

    // Show form to modify product
    modifyLinks.forEach((link) => {
        link.addEventListener("click", (event) => {
            event.preventDefault();
            const id = link.getAttribute("data-id");
            const formRow = document.getElementById(`edit-form-${id}`);
            formRow.style.display =
                formRow.style.display === "none" ? "table-row" : "none";
        });
    });

    // Hide the edit form
    cancelButtons.forEach((button) => {
        button.addEventListener("click", () => {
            const id = button.getAttribute("data-id");
            const formRow = document.getElementById(`edit-form-${id}`);
            formRow.style.display = "none";
        });
    });
});
