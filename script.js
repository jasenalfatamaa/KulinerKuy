//membuat event scroll
const nav = document.querySelectorAll('.navbar ul li a');
const sections = document.querySelectorAll('section');

window.addEventListener('scroll', ()=> {
    let current = '';
    
    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeigth = section.clientHeight;
        if (pageYOffset >= (sectionTop - sectionHeigth /3)) {
            current = section.getAttribute('id');
        }
    })
    nav.forEach(li => {
        li.classList.remove('active');
        if (li.classList.contains(current)) {
            li.classList.add('active');
        }
    })
})
//Akhir


