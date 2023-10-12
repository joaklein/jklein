document.addEventListener("DOMContentLoaded", () => {

    projectItems = document.querySelectorAll('.project-item')

    for (let projectItem of projectItems) {
        projectItem.addEventListener('click', () => {
            if (projectItem.classList.contains('project-item-open')) {
                projectItem.classList.remove('project-item-open')
                projectItem.children[0].children[0].classList.replace('fa-folder-open', 'fa-folder')
            } else {
                projectItem.classList.add('project-item-open')
                projectItem.children[0].children[0].classList.replace('fa-folder', 'fa-folder-open')

            }
        })
    }  
})