// let isCheck = document.querySelectorAll('.check')
// let text = document.getElementsByClassName('footer')[0].children[0].textContent
// let elemenSpan = document.getElementsByClassName('footer')[0].children[0]
// let count = 0

// isCheck.forEach((el) => {
//     el.addEventListener('click', () => {
//         el.classList.toggle('active')
//         el.parentNode.children[1].classList.toggle('name-riscado')

//         count = el.classList.contains('active') ? count + 1 : count - 1

//         elemenSpan.textContent = `${count} ${text}`
//     })
// })

function applyFilter(filterValue) {
    const filter = document.getElementById('filter')
}


function todoApp() {
    return {
        newTask: '',
        addTask() {
            if(this.newTask.trim() === '') return

            fetch('/create', {
                method: 'POST',
                headers: {
                    'Content-Type': 'Text/Html'
                },
            })
        }
    }
}