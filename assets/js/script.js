document.addEventListener("DOMContentLoaded", () => {

    let links = document.querySelectorAll('.links > a')

    document.querySelector('#side-menu-open').addEventListener('click', () => {
        document.querySelector('body').classList.add('hide-overflow')
        document.querySelector('#navbar').classList.add('blur')
        document.querySelector('.side-menu').classList.add('side-menu-slide')
    })

    document.querySelector('#side-menu-close').addEventListener('click', () => {
        document.querySelector('body').classList.remove('hide-overflow')
        document.querySelector('#navbar').classList.remove('blur')
        document.querySelector('.side-menu').classList.remove('side-menu-slide')
    })

    links.forEach(el => {
        el.addEventListener('click', () => {
            document.querySelector('body').classList.remove('hide-overflow')
            document.querySelector('#navbar').classList.remove('blur')
            document.querySelector('.side-menu').classList.remove('side-menu-slide')
        })
    });

})