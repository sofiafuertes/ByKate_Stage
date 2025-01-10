document.addEventListener('DOMContentLoaded',() => {
    const showForm = document.getElementById('btnNewProduct');
    const addProductForm = document.getElementById('addProductForm');

    showForm.addEventListener('click', (e) => {
        e.preventDefault();

        if(addProductForm.style.display === 'none' || addProductForm.style.display === ''){
            addProductForm.style.display = 'block';
        }else{
            addProductForm.style.display = 'none';
        }
    })
    
    const showListProducts = document.getElementById('btnProductList');
    const listProducts = document.getElementById('productsList');

    showListProducts.addEventListener('click', (e) => {
        e.preventDefault();

        if(listProducts.style.display === 'none' || listProducts.style.display === ''){
            listProducts.style.display = 'block';
        }else{
            listProducts.style.display = 'none';
        }
    })
})

// document.addEventListener('DOMContentLoaded',() => {
//     const hideProduct = document.getElementById('btnHideProduct');
//     const productCard = document.getElementById('productCard');

//     hideProduct.addEventListener('click', () => {

//         if(productCard.style.display === 'none' || productCard.style.display === ''){
//             productCard.style.display = 'none';
//         }else{
//             productCard.style.display = '';
//         }
//     })
// })

