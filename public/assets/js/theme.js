window.addEventListener('DOMContentLoaded', () => {
    const theme = localStorage.getItem("theme");
    top.document.body.classList.remove('dark', 'light');
    top.document.body.classList.add(`${theme}`);
});