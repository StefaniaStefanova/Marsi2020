window.addEventListener('DOMContentLoaded', () => {
    const hamburgerBtns = document.querySelectorAll('.gkit-nav-menu-hamburger');
    const closeBtns = document.querySelectorAll('.gkit-menu-close');
    const overlays = document.querySelectorAll('.gkit-nav-menu-overlay');

    hamburgerBtns.forEach(hamburgerBtn => {
        hamburgerBtn.addEventListener('click', function () {
            this.parentElement.classList.toggle('active');
            if (this.parentElement.classList.contains('lock-scroll-for-offcanvas')) {
                document.body.classList.add('lock-scroll');
            }
        })
    })

    closeBtns.forEach(closeBtn => {
        closeBtn.addEventListener('click', function () {
            this.closest('.gkit-nav-menu-wrapper').parentElement.classList.remove('active');
            document.body.classList.remove('lock-scroll');
        })
    })

    overlays.forEach(overlay => {
        overlay.addEventListener('click', function () {
            this.parentElement.classList.remove('active');
            document.body.classList.remove('lock-scroll');
        })
    })

    document.onclick = function (e) {
        if (e.target.classList.contains('gkit-nav-menu-submenu-arrow')) {
            const link = e.target.closest('.gkit-nav-menu-link');
            link?.parentElement.classList.toggle('show-submenu');
        }

        if (e.target.parentElement.classList.contains('gkit-nav-menu-submenu-arrow')) {
            const link = e.target.closest('.gkit-nav-menu-link');
            link?.parentElement.classList.toggle('show-submenu');
        }

        if (e.target.parentElement.parentElement.classList.contains('gkit-nav-menu-submenu-arrow')) {
            const link = e.target.closest('.gkit-nav-menu-link');
            link?.parentElement.classList.toggle('show-submenu');
        }
    }
})