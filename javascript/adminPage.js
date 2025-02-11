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


    const showPswForm = document.getElementById("btnPassword");
    const pswForm = document.getElementById("changePwd");


    // Show/hide "Change Password" form
    showPswForm.addEventListener("click", (e) => {
        e.preventDefault();

        if (
            pswForm.style.display === "none" ||
            pswForm.style.display === ""
        ) {
            pswForm.style.display = "block";
        } else {
            pswForm.style.display = "none";
        }
    });



    // Show/hide "Change Textes" form

    const showTextForm = document.getElementById("btnText");
    const textForm = document.getElementById("gestionTextes");


    showTextForm.addEventListener("click", (e) => {
        e.preventDefault();

        if (
            textForm.style.display === "none" ||
            textForm.style.display === ""
        ) {
            textForm.style.display = "block";
        } else {
            textForm.style.display = "none";
        }
    });
});





//Recipe
 // Mostrar el formulario cuando se haga clic en el botón
// document.getElementById('btnAddNewRecipe').addEventListener('click', function() {
//     document.getElementById('addRecipeForm').style.display = 'block';
// });

// Añadir un ingrediente dinámicamente
document.getElementById('addIngredientBtn').addEventListener('click', function() {
    const ingredientsDiv = document.getElementById('ingredients');
    const ingredientField = document.createElement('div');
    ingredientField.innerHTML = `
        <input type="text" name="ingredient_name[]" placeholder="Nombre del ingrediente" required>
        <input type="text" name="ingredient_quantity[]" placeholder="Cantidad" required>
    `;
    ingredientsDiv.appendChild(ingredientField);
});

// Añadir un paso dinámicamente
document.getElementById('addStepBtn').addEventListener('click', function() {
    const stepsDiv = document.getElementById('steps');
    const stepField = document.createElement('div');
    stepField.innerHTML = `
        <textarea name="step_description[]" placeholder="Descripción del paso" required></textarea>
    `;
    stepsDiv.appendChild(stepField);
});
