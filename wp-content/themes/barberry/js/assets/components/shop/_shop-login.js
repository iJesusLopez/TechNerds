
	// =============================================================================
	// Shop Login/Register
	// =============================================================================

	barberry.shopLogin = function() {

        var animTimeout = 350;

        /* Show register form */
        function showRegisterForm() {
            // Form wrapper elements
            var $loginWrap = $('#bb-login-wrap'),
                $registerWrap = $('#bb-register-wrap');
            
            // Login/register form
            $loginWrap.removeClass('fade-in');
            setTimeout(function() {
                $registerWrap.addClass('inline fade-in slide-up');
                $loginWrap.removeClass('inline slide-up');
            }, animTimeout);
        }; 

        /* Show login form */
        function showLoginForm() {
            // Form wrapper elements
            var $loginWrap = $('#bb-login-wrap'),
                $registerWrap = $('#bb-register-wrap');
            
            // Login/register form
            $registerWrap.removeClass('fade-in');
            setTimeout(function() {
                $loginWrap.addClass('inline fade-in slide-up');
                $registerWrap.removeClass('inline slide-up');
            }, animTimeout);
        }; 

        /* Bind: Show register form button */
        $('#bb-show-register-button').bind('click', function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop : 0},animTimeout);
            showRegisterForm();
        });
        
        /* Bind: Show login form button */
        $('#bb-show-login-button').bind('click', function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop : 0},animTimeout);
            showLoginForm();
        });
        
        // Show register form if "#register" is added to URL
        if (window.location.hash && window.location.hash == '#register') {
            showRegisterForm();
        }              

	}