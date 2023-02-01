$(function () {
    $('span.show-hide-pword').on('click', function () {
        let eyeicon = $('span.show-hide-pword').children();
        var x = $('input#emp_password');
        var y = $('input#password2');
        if (x.attr('type') == "password") {
            eyeicon.removeClass('fa-eye').addClass('fa-eye-slash')
            x.attr('type', 'text');
        } else {
            eyeicon.removeClass('fa-eye-slash').addClass('fa-eye')
            x.attr('type', 'password');
        }
        if (y.attr('type') == "password") {
            eyeicon.removeClass('fa-eye').addClass('fa-eye-slash')
            y.attr('type', 'text');
        } else {
            eyeicon.removeClass('fa-eye-slash').addClass('fa-eye')
            y.attr('type', 'password');
        }
    });

    $('#add_emp').on('click', function (e) {
        e.preventDefault();
        let emp_fname = $('#add_emp_form input#emp_fname').val();
        let emp_lname = $('#add_emp_form input#emp_lname').val();
        let app_role = $('#add_emp_form select#app_role').val();
        let emp_username = $('#add_emp_form input#emp_username').val();
        let emp_password = $('#add_emp_form input#emp_password').val();
        let password2 = $('#add_emp_form input#password2').val();

        let hasError = false;

        if (emp_fname == "") {
            $('#add_emp_form span#emp_fname').html('First Name is required.');
        } else {
            $('#add_emp_form span#emp_fname').html("");
        }
        if (emp_lname == "") {
            $('#add_emp_form span#emp_lname').html('Last Name is required.');
        } else {
            $('#add_emp_form span#emp_lname').html("");
        }
        if (app_role == 0) {
            $('#add_emp_form div#app_role').html('App Role is required.');
        } else {
            $('#add_emp_form div#app_role').html("");
        }
        if (emp_username == "") {
            $('#add_emp_form span#emp_username').html('Username is required.');
        } else {
            $('#add_emp_form span#emp_username').html("");
        }

        let password_validation = validatePasswords(emp_password)
        if (!password_validation.success) {
            $('span#emp_password').html(password_validation.errorMsg);
        } else {
            $('span#emp_password').html("");
        }

        if (password2 !== emp_password || !password_validation.success) {
            $('span#password2').html("Passwords did not match");
        } else {
            $('span#password2').html("");
        }


        $.each($('span.errormsg'), function (i, d) {
            if ($(d).html() !== "") {
                hasError = true;
                return false;
            }
        });

        if (!hasError) {
            var frm = new FormData();
            frm.append('fname', emp_fname);
            frm.append('lname', emp_lname);
            frm.append('uname', emp_username);
            frm.append('pass', emp_password);
            frm.append('acct_type', app_role);

            $.ajax({
                method: 'POST',
                url: 'api/register.php',
                data: frm,
                contentType: false,
                processData: false,
                cache: false,
                success: function (res) {
                    let data = JSON.parse(res)
                    if (typeof data.error === "undefined" && data.result) {
                        alert('New user has been successfully added.');
                        window.location = 'users.php';
                    } else {
                        alert(data.error);
                    }
                }
            });

        }
    });

    $.get('api/get_user.php', function (res) {
        let data = JSON.parse(res);
        $('.btn-edit-item').unbind('click').on('click', function () {
            let emp_id = $(this).data('emp_id');
            let user_details = data.find((f) => f.emp_id == emp_id);

            $('#upd_emp_form input#emp_fname').val(user_details.emp_fname);
            $('#upd_emp_form input#emp_lname').val(user_details.emp_lname);
            $('#upd_emp_form select#app_role').val(user_details.app_role_id);
            $('#upd_emp_form input#emp_username').val(user_details.emp_username);
            $('#upd_emp_form input#emp_password').val(user_details.emp_password);
            $('#upd_emp_form input#password2').val(user_details.emp_password);

            $('#upd_emp').on('click', function (e) {
                e.preventDefault();
                let emp_fname = $('#upd_emp_form input#emp_fname').val();
                let emp_lname = $('#upd_emp_form input#emp_lname').val();
                let app_role = $('#upd_emp_form select#app_role').val();
                let emp_username = $('#upd_emp_form input#emp_username').val();
                let emp_password = $('#upd_emp_form input#emp_password').val();
                let password2 = $('#upd_emp_form input#password2').val();

                let hasError = false;

                if (emp_fname == "") {
                    $('#add_emp_form span#emp_fname').html('First Name is required.');
                } else {
                    $('#add_emp_form span#emp_fname').html("");
                }
                if (emp_lname == "") {
                    $('#add_emp_form span#emp_lname').html('Last Name is required.');
                } else {
                    $('#add_emp_form span#emp_lname').html("");
                }
                if (app_role == 0) {
                    $('#add_emp_form div#app_role').html('App Role is required.');
                } else {
                    $('#add_emp_form div#app_role').html("");
                }
                if (emp_username == "") {
                    $('#add_emp_form span#emp_username').html('Username is required.');
                } else {
                    $('#add_emp_form span#emp_username').html("");
                }

                let password_validation = validatePasswords(emp_password)
                if (!password_validation.success) {
                    $('span#emp_password').html(password_validation.errorMsg);
                } else {
                    $('span#emp_password').html("");
                }

                if (password2 !== emp_password || !password_validation.success) {
                    $('span#password2').html("Passwords did not match");
                } else {
                    $('span#password2').html("");
                }

                $.each($('span.errormsg'), function (i, d) {
                    if ($(d).html() !== "") {
                        hasError = true;
                        return false;
                    }
                });

                if (!hasError) {
                    var frm = new FormData();

                    if (emp_fname !== user_details.emp_fname) {
                        frm.append('emp_fname', emp_fname);
                    }
                    if (emp_lname !== user_details.emp_lname) {
                        frm.append('emp_lname', emp_lname);
                    }
                    if (app_role !== user_details.app_role_id) {
                        frm.append('app_role', app_role);
                    }
                    if (emp_username !== user_details.emp_username) {
                        frm.append('emp_username', emp_username);
                    }
                    if (emp_password !== user_details.emp_password) {
                        frm.append('emp_password', emp_password);
                    }

                    let itr = 0;
                    for (const pair of frm.entries()) {
                        itr++;
                    }
                    if (itr > 0) {
                        frm.append('emp_id', emp_id);
                        $.ajax({
                            method: 'POST',
                            url: 'api/update_user.php',
                            data: frm,
                            contentType: false,
                            processData: false,
                            cache: false,
                            success: function (res) {
                                let data = JSON.parse(res)
                                if (typeof data.error === "undefined" && data.result) {
                                    alert('User details has been successfully updated.');
                                    window.location = 'users.php';
                                } else {
                                    alert(data.error);
                                }
                            }
                        });
                    } else {
                        alert('No changes detected.');
                    }

                }
            });
        });

        $('.btn-delete-item').unbind('click').on('click', function () {
            let emp_id = $(this).data('emp_id');
            let choice = confirm("Are you sure you want to remove this user in the list?");
            if (choice) {
                $.post('api/remove_user.php', { emp_id }, function (res) {
                    let data = JSON.parse(res)
                    if (typeof data.error === "undefined") {
                        alert('Employee successfully removed!');
                        window.location = 'users.php';
                    } else {
                        alert(data.error);
                    }
                });
            }
        });

        $('#employee_table').DataTable();
    });

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