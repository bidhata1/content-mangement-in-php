
(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	$('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
  });

})(jQuery);


document.addEventListener('DOMContentLoaded', function() {
    const homeLink = document.getElementById('homeLink');
    const homeSubmenu = document.getElementById('homeSubmenu');

    // Initially hide the submenu
    homeSubmenu.style.display = 'none';

    // Toggle submenu when Home link is clicked
    homeLink.addEventListener('click', function(event) {
        event.preventDefault();
        if (homeSubmenu.style.display === 'none') {
            homeSubmenu.style.display = 'block';
        } else {
            homeSubmenu.style.display = 'none';
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const aboutLink = document.getElementById('aboutLink');
    const pageSubmenu = document.getElementById('pageSubmenu');

    // Initially hide the submenu
    pageSubmenu.style.display = 'none';

    // Toggle submenu when About link is clicked
    aboutLink.addEventListener('click', function(event) {
        event.preventDefault();
        if (pageSubmenu.style.display === 'none') {
            pageSubmenu.style.display = 'block';
        } else {
            pageSubmenu.style.display = 'none';
        }
    });
});