// NAVBAR //
const nav = document.getElementById("navbar");
let lastScrollTop = 0;

function handleHeaderSwipe() {
    const scrollTop = document.documentElement.scrollTop;

    if (scrollTop > lastScrollTop) {
        nav.style.top = "-90px";
    } else {
        nav.style.top = "0";
    }
    lastScrollTop = scrollTop;
}

window.addEventListener("scroll", handleHeaderSwipe);
// NAVBAR //