$(function () {
    if (typeof localStorage['adetech_user'] !== 'undefined') {
        alert("You are already logged-in");
        window.location = 'home.php';

    } else {
        $(".cb").on('click', function () {
            var x = $('input#pass');
            var y = $('input#pass2');
            if (x.attr('type') == "password") {
                x.attr('type', 'text');
            } else {
                x.attr('type', 'password');
            }
            if (y.attr('type') == "password") {
                y.attr('type', 'text');
            } else {
                y.attr('type', 'password');
            }
        });

        $('#save').on("click", function (e) {
            e.preventDefault();

            let fname = $('input#fname').val();
            let lname = $('input#lname').val();
            let uname = $('input#uname').val();
            let pass = $('input#pass').val();
            let pass2 = $('input#pass2').val();
            let acct_type = $('select#acct_type').val();
            let hasError = false;

            if (fname == "") {
                $('span#fname').html('First name is required.');
            } else {
                $('span#fname').html("");
            }
            if (lname == "") {
                $('span#lname').html('Last name is required.');
            } else {
                $('span#lname').html("");
            }
            if (uname == "") {
                $('span#uname').html('Username is required.');
            } else {
                $('span#uname').html("");
            }
            if (acct_type == "0") {
                $('span#acct_type').html('Account Type is required.');
            } else {
                $('span#acct_type').html("");
            }
            let password_validation = validatePasswords(pass)
            if (!password_validation.success) {
                $('span#pass').html(password_validation.errorMsg);
            } else {
                $('span#pass').html("");
            }

            if (pass2 !== pass || !password_validation.success) {
                $('span#pass2').html("Passwords did not match");
            } else {
                $('span#pass2').html("");
            }

            $.each($('span.errormsg'), function (i, d) {
                if ($(d).html() !== "") {
                    hasError = true;
                    return false;
                }
            });

            if (!hasError) {
                $.post('api/register.php', { fname, lname, uname, pass, acct_type }, function (res) {
                    let data = JSON.parse(res)
                    if (typeof data.error === "undefined") {
                        alert('Accounted created successfully! You may now log-in.');
                        window.location = 'login.php';
                    } else {
                        alert(data.error);
                    }
                });
            }
        });
    }

    var validatePasswords = function (pass1) {
        var minNumberofChars = 8;
        var regularExpression = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

        // If less than 8 characters
        if (pass1.length < minNumberofChars) {
            return { "success": false, "errorMsg": "Password should be 8 characters or longer" };
        }

        // if has atleast 1 number and special character
        if (!regularExpression.test(pass1)) {
            return { "success": false, "errorMsg": "Password should contain at least 1 special character, 1 uppercase letter, and 1 number" };
        }

        return { "success": true };
    }
});