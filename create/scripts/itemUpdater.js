const setupPreviewListener = (id) => {
    const inpEl = document.getElementById(`inp-${id}`);
    const chEl = document.getElementById(`ch-${id}`);
    const respEl = document.getElementById(`resp-msg`);
    inpEl.addEventListener('change', (e) => {
        const { value } = e.target;
        if (!value) return;
        chEl.tagName === 'IMG' ? chEl.src = value : chEl.textContent = value;
        if (respEl) respEl.delete();
    });
}

window.addEventListener('load', () => {
    const inputs = ['category', 'image', 'code', 'name', 'description', 'price'];
    for (const inpName of inputs) {
        setupPreviewListener(inpName);
    }
})