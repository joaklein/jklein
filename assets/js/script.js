document.addEventListener('DOMContentLoaded', () => {

    const contactBtn = document.querySelector('#contact');
    const contactBox = document.querySelector('.contact');
    const contactClose = document.querySelector('#contact-close');

    contactBtn.addEventListener('click', () => contactBox.style.display = 'flex');

    contactClose.addEventListener('click', () => contactBox.style.display = 'none');
});