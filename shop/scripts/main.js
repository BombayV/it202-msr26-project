/*Mauricio Rivera
// IT 202 - 002
// 2/21/2024
// Phase 1
// msr26@njit.edu
 */

const filterItems = (category) => {
    console.log(category);
    const items = document.querySelectorAll('.shop-item');
    for (let i = 0; i < items.length; i++) {
        if (category === '0') {
            items[i].style.display = 'flex';
            continue;
        }

        items[i].dataset.category === category ? items[i].style.display = 'flex' : items[i].style.display = 'none';
    }
}

const addSelectListener = () => {
    const select = document.getElementById('category-select');
    select.addEventListener('change', (e) => {
        filterItems(e.target.value);
    })
}

const addShopItemListener = () => {
    const shopItemsBtns = document.querySelectorAll('.item__submit');
    for (let i = 0; i < shopItemsBtns.length; i++) {
        shopItemsBtns[i].addEventListener('click', (e) => {
            e.preventDefault();
            // Add to local storage
            const target = e.target;
            console.log(target.dataset.code);
        })
    }
}

window.addEventListener('load', () => {
    addShopItemListener();
    addSelectListener();
})