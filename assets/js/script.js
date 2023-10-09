document.addEventListener("DOMContentLoaded", () => {

    // NAV STUFF - START
    const mobileLinks = document.querySelectorAll('.links a')

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

    mobileLinks.forEach((el, index) => {
        el.addEventListener('click', () => {
            document.querySelector('body').classList.remove('hide-overflow')
            document.querySelector('#navbar').classList.remove('blur')
            document.querySelector('.side-menu').classList.remove('side-menu-slide')
            flipBox(index)
        })
    }); // NAV STUFF - END

    // PARALLAX STUFF - START
    const headerBG = document.querySelector('#header-bg')
    const headerText = document.querySelector('.header-text')
    const sectionOne = document.querySelector('#section-one-bg')

    window.addEventListener('scroll', () => {

        let value = window.scrollY

        headerBG.style.top = `${value * .8}px`
        headerText.style.top = `${value * .6}px`
        headerBG.style.filter = `blur(${value * .01}px)`
        headerText.style.filter = `blur(${value * .01}px)`
        sectionOne.style.top = `-${value * .15}px`
    }) // PARALLAX STUFF - END
})

window.addEventListener('load', () => {
        // HEADER ANIMATIONS - START
        document.querySelector('#header-bg').classList.add('fade-in')
        document.querySelector('.header-text').classList.add('slide-in__from-right')
        // HEADER ANIMATIONS - END    
})