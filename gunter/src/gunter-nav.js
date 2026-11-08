/* Shared navigation, independent of jQuery and Bootstrap. */
(function () {
    'use strict';

    var navbar = document.getElementById('gunter-navbar');
    var toggle = document.querySelector('.navbar-toggle[aria-controls="gunter-navbar"]');
    if (!navbar || !toggle) return;

    var navigation = navbar.closest('nav');
    var dropdown = navbar.querySelector('.dropdown');
    var dropdownToggle = navbar.querySelector('.dropdown-toggle');
    if (!navigation || !dropdown || !dropdownToggle) return;

    function setDropdown(open) {
        dropdown.classList.toggle('open', open);
        dropdownToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    }

    function setNavbar(open) {
        navbar.classList.toggle('in', open);
        toggle.classList.toggle('collapsed', !open);
        toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        if (!open) setDropdown(false);
    }

    toggle.addEventListener('click', function () {
        setNavbar(!navbar.classList.contains('in'));
    });

    dropdownToggle.addEventListener('click', function (event) {
        event.preventDefault();
        setDropdown(!dropdown.classList.contains('open'));
    });

    dropdownToggle.addEventListener('keydown', function (event) {
        if (event.key === ' ' || event.key === 'Spacebar') {
            event.preventDefault();
            setDropdown(!dropdown.classList.contains('open'));
        }
    });

    navigation.addEventListener('keydown', function (event) {
        if (event.key !== 'Escape') return;
        if (dropdown.classList.contains('open')) {
            event.preventDefault();
            setDropdown(false);
            dropdownToggle.focus();
        } else if (navbar.classList.contains('in')) {
            event.preventDefault();
            setNavbar(false);
            toggle.focus();
        }
    });

    navbar.addEventListener('click', function (event) {
        var link = event.target.closest('a');
        if (link && link !== dropdownToggle) setNavbar(false);
    });

    document.addEventListener('click', function (event) {
        if (!navigation.contains(event.target)) setNavbar(false);
    });
})();
