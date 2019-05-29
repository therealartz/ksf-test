import IMask from 'imask';

const phoneInput = document.getElementById('phone');
if (phoneInput !== null) {
  const maskOptions = {
    mask: '+{1}(000)000-00-00'
  };
  IMask(phoneInput, maskOptions);
}
