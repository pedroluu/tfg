document.addEventListener('DOMContentLoaded', function () {
            var navbarToggler = document.querySelector('.navbar-toggler');
            var headerSubtitle = document.getElementById('header-subtitle');
            var headerText = document.getElementById('header-text');
            var headerButton = document.getElementById('header-button');

            navbarToggler.addEventListener('click', function () {
                var isExpanded = navbarToggler.getAttribute('aria-expanded') === 'true';
                if (isExpanded) {
                    headerSubtitle.style.display = 'none';
                    headerText.style.display = 'none';
                    headerButton.style.display = 'none';
                } else {
                    headerSubtitle.style.display = 'block';
                    headerText.style.display = 'block';
                    headerButton.style.display = 'block';
                }
            });
        });