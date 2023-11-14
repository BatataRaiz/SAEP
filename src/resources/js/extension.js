/* Remove a extensão .html da URL
if (window.location.pathname.endsWith('.html')) {
    var newPath = window.location.pathname.slice(0, -5);
    window.history.pushState('', '', newPath);
}
*/

