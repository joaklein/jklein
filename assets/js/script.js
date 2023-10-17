document.addEventListener("DOMContentLoaded", () => {

    projectItems = document.querySelectorAll('.project-title')

    for (let projectItem of projectItems) {
        projectItem.addEventListener('click', () => {
            if (projectItem.parentElement.classList.contains('project-item-open')) {
                projectItem.parentElement.classList.remove('project-item-open')
                projectItem.children[0].classList.replace('fa-folder-open', 'fa-folder')
            } else {
                projectItem.parentElement.classList.add('project-item-open')
                projectItem.children[0].classList.replace('fa-folder', 'fa-folder-open')

            }
        })
    }  
})