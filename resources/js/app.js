import './bootstrap';

// Theme toggle function for Alpine.js
window.toggleTheme = function() {
    const html = document.documentElement;
    
    if (html.classList.contains('dark')) {
        html.classList.remove('dark');
        localStorage.setItem('theme', 'light');
        return;
    }
    
    html.classList.add('dark');
    localStorage.setItem('theme', 'dark');
};
