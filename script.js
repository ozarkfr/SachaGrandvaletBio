// Gestion du menu hamburger pour mobile
document.getElementById('hamburger').addEventListener('click', function () {
    const navLinks = document.getElementById('nav-links');
    navLinks.classList.toggle('show'); // Ajoute ou retire la classe 'show' pour afficher/masquer le menu
});
