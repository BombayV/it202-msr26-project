const setupPreviewListener = (id) => {
  const inpEl = document.getElementById(`inp-${id}`);
  const chEl = document.getElementById(`ch-${id}`);
  const respEl = document.getElementById(`resp-msg`);
  inpEl.addEventListener('change', (e) => {
      const { value } = e.target;
      if (!value) return;
      if (id === 'category') return;
      chEl.tagName === 'IMG' ? chEl.src = value : chEl.textContent = value;
      if (respEl && respEl.textContent) respEl.textContent = '';
  });
}

const validateCode = (code) => {
  if (!code) return 'Code is required';
  if (code.length < 4) return 'Code must be at least 4 characters';
  if (code.length > 10) return 'Code must be at most 10 characters';

  return ''
}

const validateName = (name) => {
  if (!name) return 'Name is required';
  if (name.length < 10) return 'Name must be at least 10 characters';
  if (name.length > 100) return 'Name must be at most 100 characters';

  return ''
}

const validateDescription = (description) => {
  if (!description) return 'Description is required';
  if (description.length < 10) return 'Description must be at least 10 characters';
  if (description.length > 255) return 'Description must be at most 255 characters';

  return ''
}

const validatePrice = (price) => {
  if (!price) return 'Price is required';
  if (price < 0) return 'Price must be a positive number';
  if (price > 100000) return 'Price must be at most 100,000';

  return ''
}

const validateImage = (image) => {
  if (!image) return 'Image is required';
  if (!image.startsWith('https://')) return 'Image must be a valid URL';

  return ''
}

const handleFormSubmit = (e) => {
  e.preventDefault();
  const form = document.getElementById('item-form');
  const formData = new FormData(form);
  const formImage = formData.get('inp-image');
  const formCode = formData.get('inp-code');
  const formName = formData.get('inp-name');
  const formDescription = formData.get('inp-description');
  const formPrice = formData.get('inp-price');

  let error = '';
  error = validateImage(formImage);
  if (error) return alert(error);

  error = validateCode(formCode);
  if (error) return alert(error);

  error = validateName(formName);
  if (error) return alert(error);

  error = validateDescription(formDescription);
  if (error) return alert(error);

  error = validatePrice(formPrice);
  if (error) return alert(error);

  form.submit();
}

const resetInp = (id) => {
  const inpEl = document.getElementById(`inp-${id}`);
  const chEl = document.getElementById(`ch-${id}`);
  if (id === 'category') return;
  if (id === 'image') chEl.src = DEFAULT_PLACEHOLDERS[id];

  chEl.textContent = DEFAULT_PLACEHOLDERS[id];
  inpEl.value = '';
}

const DEFAULT_PLACEHOLDERS = {
  image: '../static/images/items/backpack1.png',
  code: 'ABC214',
  name: 'Deluxe Golden Binoculars',
  description: 'A beautiful design created by non other than DaVinci',
  price: '$99.99'
}

const handleFormReset = (inputs) => {
  for (const inpName of inputs) {
      resetInp(inpName);
  }
}

window.addEventListener('load', () => {
  const inputs = ['category', 'image', 'code', 'name', 'description', 'price'];
  for (const inpName of inputs) {
      setupPreviewListener(inpName);
  }

  const submitEl = document.getElementById('create-btn');
  const resetEl = document.getElementById('reset-btn');
  submitEl.addEventListener('click', handleFormSubmit);
  resetEl.addEventListener('click', () => handleFormReset(inputs));
})