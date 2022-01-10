// // On page load or when changing themes, best to add inline in `head` to avoid FOUC
applyTheme();

/**
 * Apply the application theme.
 * 
 * @return void
 */
function applyTheme() {

    if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark')
    } else {
        document.documentElement.classList.remove('dark')
    }
}

/**
 * Set the application theme.
 * 
 * @return void
 */
function setTheme() {

    if (localStorage.theme == 'light') {

        localStorage.theme = 'dark';
    } else if(localStorage.theme == 'dark') {

        localStorage.theme = 'light';
    }

    applyTheme();
}

