/*Mauricio Rivera
// IT 202 - 002
// 4/09/2024
// Phase 5
// msr26@njit.edu
 */

const imageMouseOver = (e) => {
    const img = e.target;
    img.style.filter = 'grayscale(100%)';
}

const imageMouseOut = (e) => {
    const img = e.target;
    img.style.filter = 'grayscale(0%)';
}

window.addEventListener('load', () => {
    const img = document.querySelector('.image');
    img.addEventListener('mouseover', imageMouseOver);
    img.addEventListener('mouseout', imageMouseOut);
})