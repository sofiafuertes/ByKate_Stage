document.addEventListener("DOMContentLoaded", () => {
    // Show/hide "gestion photo gallery"
    const showGallery = document.getElementById("btnPhotoGallery");
    const galleryPhotos = document.getElementById("gestionImages");

    if (showGallery && galleryPhotos) {
        showGallery.addEventListener("click", (e) => {
            e.preventDefault();
            galleryPhotos.style.display =
                galleryPhotos.style.display === "none" ||
                galleryPhotos.style.display === ""
                    ? "block"
                    : "none";
        });
    }

    // // Show/hide "Add Product" form
    // const showForm = document.getElementById("btnNewProduct");
    // const addProductForm = document.getElementById("addProductForm");

    // if (showForm && addProductForm) {
    //     showForm.addEventListener("click", (e) => {
    //         e.preventDefault();
    //         addProductForm.style.display =
    //             addProductForm.style.display === "none" ||
    //             addProductForm.style.display === ""
    //                 ? "block"
    //                 : "none";
    //     });
    // }

    // // Show/hide product list
    // const showListProducts = document.getElementById("btnProductList");
    // const listProducts = document.getElementById("productsList");

    // if (showListProducts && listProducts) {
    //     showListProducts.addEventListener("click", (e) => {
    //         e.preventDefault();
    //         listProducts.style.display =
    //             listProducts.style.display === "none" ||
    //             listProducts.style.display === ""
    //                 ? "block"
    //                 : "none";
    //     });
    // }

    // // Show form to modify product
    // const modifyLinks = document.querySelectorAll(".modify-link");
    // const cancelButtons = document.querySelectorAll(".cancel-button");

    // if (modifyLinks.length > 0) {
    //     modifyLinks.forEach((link) => {
    //         link.addEventListener("click", (event) => {
    //             event.preventDefault();
    //             const id = link.getAttribute("data-id");
    //             const formRow = document.getElementById(`edit-form-${id}`);
    //             if (formRow) {
    //                 formRow.style.display =
    //                     formRow.style.display === "none" ? "table-row" : "none";
    //             }
    //         });
    //     });
    // }

    // // Hide the edit form
    // if (cancelButtons.length > 0) {
    //     cancelButtons.forEach((button) => {
    //         button.addEventListener("click", () => {
    //             const id = button.getAttribute("data-id");
    //             const formRow = document.getElementById(`edit-form-${id}`);
    //             if (formRow) {
    //                 formRow.style.display = "none";
    //             }
    //         });
    //     });
    // }

    // Show/hide "Change Password" form
    const showPswForm = document.getElementById("btnPassword");
    const pswForm = document.getElementById("changePwd");

    if (showPswForm && pswForm) {
        showPswForm.addEventListener("click", (e) => {
            e.preventDefault();
            pswForm.style.display =
                pswForm.style.display === "none" || pswForm.style.display === ""
                    ? "block"
                    : "none";
        });
    }

    //Show/hide "Add Recipe" form
    const showRecipeForm = document.getElementById("btnNewRecipe");
    const recipeForm = document.getElementById("addRecipeForm");

    if (showRecipeForm && recipeForm) {
        showRecipeForm.addEventListener("click", (e) => {
            e.preventDefault();
            recipeForm.style.display =
                recipeForm.style.display === "none" ||
                recipeForm.style.display === ""
                    ? "block"
                    : "none";
        });
    }

    const showTextForm = document.getElementById("btnText");
    const textForm = document.getElementById("gestionTextes");

    if (showTextForm && textForm) {
        // Show/hide "Change Textes" form
        showTextForm.addEventListener("click", (e) => {
            e.preventDefault();
            textForm.style.display =
                textForm.style.display === "none" ||
                textForm.style.display === ""
                    ? "block"
                    : "none";
        });
    }

    // Adding a new ingredient
    const addIngredientBtn = document.getElementById("addIngredientBtn");
    if (addIngredientBtn) {
        addIngredientBtn.addEventListener("click", function () {
            const ingredientsDiv = document.getElementById("ingredients");
            const ingredientField = document.createElement("div");
            ingredientField.innerHTML = `
                <input type="text" name="ingredient_name[]" placeholder="Nombre del ingrediente" required>
                <input type="text" name="ingredient_quantity[]" placeholder="Cantidad" required>
            `;
            ingredientsDiv.appendChild(ingredientField);
        });
    }

    // Adding a new step
    const addStepBtn = document.getElementById("addStepBtn");
    if (addStepBtn) {
        addStepBtn.addEventListener("click", function () {
            const stepsDiv = document.getElementById("steps");
            const stepField = document.createElement("div");
            stepField.innerHTML = `
                <textarea name="step_description[]" placeholder="Descripción del paso" required></textarea>
            `;
            stepsDiv.appendChild(stepField);
        });
    }

    // Adding a new tip
    const addTipBtn = document.getElementById("addTipBtn");
    if (addTipBtn) {
        addTipBtn.addEventListener("click", function () {
            const tipsContainer = document.getElementById("tips");
            const newTip = document.createElement("div");
            newTip.className = "tip";
            newTip.innerHTML =
                '<textarea name="tips[]" placeholder="Nuevo consejo"></textarea>';
            tipsContainer.appendChild(newTip);
        });
    }
});
