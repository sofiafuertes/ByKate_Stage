document.addEventListener("DOMContentLoaded", () => {

    // document.addEventListener("DOMContentLoaded", () => {
    //     $('#uploadForm').submit(function(e) {
    //         e.preventDefault();  
    
    //         let formData = new FormData(this);
    
    //         $.ajax({
    //             url: '/ByKate_Stage/gestion/upload_photo',
    //             type: 'POST',
    //             data: formData,
    //             contentType: false,
    //             processData: false,
    //             dataType: 'json', // Especificamos que esperamos JSON
    //             success: function(response) {
    //                 if (response.status === "success") {
    //                     $('#responseMessage').html(`<p style="color:green;">${response.message}</p>`);
    //                     $('#uploadForm')[0].reset(); // Limpiar el formulario tras éxito
    //                 } else {
    //                     $('#responseMessage').html(`<p style="color:red;">${response.message}</p>`);
    //                 }
    //             },
    //             error: function() {
    //                 $('#responseMessage').html('<p style="color:red;">Hubo un error en la conexión.</p>');
    //             }
    //         });
    //     });
    // });
    






    const showForm = document.getElementById("btnNewProduct");
    const addProductForm = document.getElementById("addProductForm");

    if (showForm && addProductForm) {
        // Show/hide "Add Product" form
        showForm.addEventListener("click", (e) => {
            e.preventDefault();
            addProductForm.style.display = addProductForm.style.display === "none" || addProductForm.style.display === "" ? "block" : "none";
        });
    }

    const showListProducts = document.getElementById("btnProductList");
    const listProducts = document.getElementById("productsList");

    if (showListProducts && listProducts) {
        // Show/hide product list
        showListProducts.addEventListener("click", (e) => {
            e.preventDefault();
            listProducts.style.display = listProducts.style.display === "none" || listProducts.style.display === "" ? "block" : "none";
        });
    }

    const modifyLinks = document.querySelectorAll(".modify-link");
    const cancelButtons = document.querySelectorAll(".cancel-button");

    if (modifyLinks.length > 0) {
        // Show form to modify product
        modifyLinks.forEach((link) => {
            link.addEventListener("click", (event) => {
                event.preventDefault();
                const id = link.getAttribute("data-id");
                const formRow = document.getElementById(`edit-form-${id}`);
                if (formRow) {
                    formRow.style.display = formRow.style.display === "none" ? "table-row" : "none";
                }
            });
        });
    }

    if (cancelButtons.length > 0) {
        // Hide the edit form
        cancelButtons.forEach((button) => {
            button.addEventListener("click", () => {
                const id = button.getAttribute("data-id");
                const formRow = document.getElementById(`edit-form-${id}`);
                if (formRow) {
                    formRow.style.display = "none";
                }
            });
        });
    }

    // Show/hide "Change Password" form
    const showPswForm = document.getElementById("btnPassword");
    const pswForm = document.getElementById("changePwd");

    if (showPswForm && pswForm) {
        showPswForm.addEventListener("click", (e) => {
            e.preventDefault();
            pswForm.style.display = pswForm.style.display === "none" || pswForm.style.display === "" ? "block" : "none";
        });
    }


//Show/hide "Add Recipe" form
    const showRecipeForm = document.getElementById("btnNewRecipe");
    const recipeForm = document.getElementById("addRecipeForm");

    if (showRecipeForm && recipeForm) {
        showRecipeForm.addEventListener("click", (e) => {
            e.preventDefault();
            recipeForm.style.display = recipeForm.style.display === "none" || recipeForm.style.display === "" ? "block" : "none";
        });
    }




    const showTextForm = document.getElementById("btnText");
    const textForm = document.getElementById("gestionTextes");

    if (showTextForm && textForm) {
        // Show/hide "Change Textes" form
        showTextForm.addEventListener("click", (e) => {
            e.preventDefault();
            textForm.style.display = textForm.style.display === "none" || textForm.style.display === "" ? "block" : "none";
        });
    }

    // Adding a new ingredient
    const addIngredientBtn = document.getElementById('addIngredientBtn');
    if (addIngredientBtn) {
        addIngredientBtn.addEventListener('click', function() {
            const ingredientsDiv = document.getElementById('ingredients');
            const ingredientField = document.createElement('div');
            ingredientField.innerHTML = `
                <input type="text" name="ingredient_name[]" placeholder="Nombre del ingrediente" required>
                <input type="text" name="ingredient_quantity[]" placeholder="Cantidad" required>
            `;
            ingredientsDiv.appendChild(ingredientField);
        });
    }

    // Adding a new step
    const addStepBtn = document.getElementById('addStepBtn');
    if (addStepBtn) {
        addStepBtn.addEventListener('click', function() {
            const stepsDiv = document.getElementById('steps');
            const stepField = document.createElement('div');
            stepField.innerHTML = `
                <textarea name="step_description[]" placeholder="Descripción del paso" required></textarea>
            `;
            stepsDiv.appendChild(stepField);
        });
    }

    // Adding a new tip
    const addTipBtn = document.getElementById('addTipBtn');
    if (addTipBtn) {
        addTipBtn.addEventListener('click', function () {
            const tipsContainer = document.getElementById('tips');
            const newTip = document.createElement('div');
            newTip.className = 'tip';
            newTip.innerHTML = '<textarea name="tips[]" placeholder="Nuevo consejo"></textarea>';
            tipsContainer.appendChild(newTip);
        });
    }
});
