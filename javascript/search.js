//Search for products

document.addEventListener("DOMContentLoaded", () => {
    // Remove accents
    function removeAccents(str) {
        return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "");
    }


    const searchInput = document.querySelector(".inputSearchProduct");
    const products = document.querySelectorAll(".product");

    if (searchInput) {
        searchInput.addEventListener("input", () => {
            const filter = removeAccents(searchInput.value.toLowerCase());

            // console.log("Texto de búsqueda:", filter)

            products.forEach((product) => {
                const productName = product
                    .querySelector("h3")
                    .textContent.toLowerCase();
                // console.log("Producto:", productName)

                if (productName.includes(filter)) {
                    product.style.display = "";
                } else {
                    product.style.display = "none";
                }
            });
        });
    }


    // Search for recipes
    const searchInputRecipe = document.querySelector(".inputSearchRecipe");
    const recipes = document.querySelectorAll(".recipe");


    if (searchInputRecipe) {
        searchInputRecipe.addEventListener("input", () => {
            const filter =removeAccents(searchInputRecipe.value.toLowerCase());

            recipes.forEach((recipe) => {
                const recipeTitle = recipe.querySelector("h3")
                    ? removeAccents(recipe.querySelector("h3").textContent.toLowerCase())
                    : "";
                const recipeCategory = recipe.dataset.category
                    ? removeAccents(recipe.dataset.category.toLowerCase())
                    : "";
                const recipeLevel = recipe.dataset.level
                    ? removeAccents(recipe.dataset.level.toLowerCase())
                    : "";

                if (
                    recipeTitle.includes(filter) || 
                    recipeCategory.includes(filter) || 
                    recipeLevel.includes(filter)
                ) {
                    recipe.style.display = "";
                } else {
                    recipe.style.display = "none";
                }
            });
        });
    }
});