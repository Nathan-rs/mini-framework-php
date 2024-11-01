let isCheck = document.querySelectorAll('.check')
let text = document.getElementsByClassName('footer')[0].children[0].textContent
let elemenSpan = document.getElementsByClassName('footer')[0].children[0]
let count = 0

isCheck.forEach((el) => {
    el.addEventListener('click', () => {
        el.classList.toggle('active')
        el.parentNode.children[1].classList.toggle('name-riscado')

        count = el.classList.contains('active') ? count + 1 : count - 1

        elemenSpan.textContent = `${count} ${text}`
    })
})