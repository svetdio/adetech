$(function () {
    $('#add_emp').on('click', function (e) {
        e.preventDefault();
        let emp_name = $('#add_emp_form input#emp_name').val();
        let gender = $('#add_emp_form select#gender').val();
        let bday = $('#add_emp_form input#bday').val();
        let natl = $('#add_emp_form select#natl').val();
        let c_status = $('#add_emp_form select#c_status').val();
        let dept = $('#add_emp_form input#dept').val();
        let desg = $('#add_emp_form input#desg').val();
        let emp_status = $('#add_emp_form input#emp_status').val();
        let emp_image = $('#add_emp_form input#emp_image')[0].files[0];
        let tax_status = $('#add_emp_form select#tax_status').val();

        let hasError = false;

        if (emp_name == "") {
            $('#add_emp_form span#emp_name').html('Employee Name is required.');
        } else {
            $('#add_emp_form span#emp_name').html("");
        }
        if (gender == 0) {
            $('#add_emp_form div#gender').html('Gender is required.');
        } else {
            $('#add_emp_form div#gender').html("");
        }
        if (bday == "") {
            $('#add_emp_form span#bday').html('Date of Birth is required.');
        } else {
            $('#add_emp_form span#bday').html("");
        }
        if (natl == 0) {
            $('#add_emp_form div#natl').html('Nationality is required.');
        } else {
            $('#add_emp_form div#natl').html("");
        }
        if (c_status == 0) {
            $('#add_emp_form div#c_status').html('Civil Status is required.');
        } else {
            $('#add_emp_form div#c_status').html("");
        }
        if (dept == "") {
            $('#add_emp_form span#dept').html('Department is required.');
        } else {
            $('#add_emp_form span#dept').html("");
        }
        if (desg == "") {
            $('#add_emp_form span#desg').html('Designation is required.');
        } else {
            $('#add_emp_form span#desg').html("");
        }
        if (emp_status == "") {
            $('#add_emp_form span#emp_status').html('Employee Status is required.');
        } else {
            $('#add_emp_form span#emp_status').html("");
        }
        if (tax_status == "") {
            $('#add_emp_form span#tax_status').html('Tax Status is required.');
        } else {
            $('#add_emp_form span#tax_status').html("");
        }

        if (typeof emp_image == 'undefined') {
            $('#add_emp_form span#emp_image').html('Employee Image is required.');
        } else {
            $('#add_emp_form span#emp_image').html("");
        }

        $.each($('span.errormsg'), function (i, d) {
            if ($(d).html() !== "") {
                hasError = true;
                return false;
            }
        });

        if (!hasError) {
            var frm = new FormData();
            frm.append('emp_name', emp_name);
            frm.append('gender', gender);
            frm.append('bday', bday);
            frm.append('natl', natl);
            frm.append('c_status', c_status);
            frm.append('dept', dept);
            frm.append('desg', desg);
            frm.append('emp_status', emp_status);
            frm.append('emp_image', emp_image);
            frm.append('tax_status', tax_status);

            $.ajax({
                method: 'POST',
                url: 'api/add_emp.php',
                data: frm,
                contentType: false,
                processData: false,
                cache: false,
                success: function (res) {
                    let data = JSON.parse(res)
                    if (typeof data.error === "undefined" && data.result) {
                        alert('New employee has been successfully added.');
                        window.location = 'employee_listview.php';
                    } else {
                        alert(data.error);
                    }
                }
            });

        }
    });

    $.get('api/get_emp.php', function (res) {
        let data = JSON.parse(res);
        $('.btn-edit-item').unbind('click').on('click', function () {
            let emp_id = $(this).data('emp_id');
            let emp_details = data.find((f) => f.id == emp_id);
            let img_name = emp_details.emp_img.substring(emp_details.emp_img.indexOf('/') + 1);

            $('#upd_emp_form input#emp_name').val(emp_details.emp_name);
            $('#upd_emp_form select#gender').val(emp_details.gender);
            $('#upd_emp_form input#bday').val(emp_details.bday);
            $('#upd_emp_form select#natl').val(emp_details.natl);
            $('#upd_emp_form select#c_status').val(emp_details.c_status);
            $('#upd_emp_form input#dept').val(emp_details.dept);
            $('#upd_emp_form input#desg').val(emp_details.desg);
            $('#upd_emp_form input#emp_status').val(emp_details.emp_status);
            $('#upd_emp_form #file-js-example span.file-name').html(img_name);
            $('#upd_emp_form img#upd-img-viewer').attr("src", emp_details.emp_img);
            $('#upd_emp_form select#tax_status').val(emp_details.tax_status);

            $('#upd_emp').on('click', function (e) {
                e.preventDefault();
                let emp_name = $('#upd_emp_form input#emp_name').val();
                let gender = $('#upd_emp_form select#gender').val();
                let bday = $('#upd_emp_form input#bday').val();
                let natl = $('#upd_emp_form select#natl').val();
                let c_status = $('#upd_emp_form select#c_status').val();
                let dept = $('#upd_emp_form input#dept').val();
                let desg = $('#upd_emp_form input#desg').val();
                let emp_status = $('#upd_emp_form input#emp_status').val();
                let emp_image = $('#upd_emp_form input#emp_image')[0].files[0];
                let tax_status = $('#upd_emp_form select#tax_status').val();

                let hasError = false;

                if (emp_name == "") {
                    $('#upd_emp_form span#emp_name').html('Employee Name is required.');
                } else {
                    $('#upd_emp_form span#emp_name').html("");
                }
                if (gender == 0) {
                    $('#upd_emp_form div#gender').html('Gender is required.');
                } else {
                    $('#upd_emp_form div#gender').html("");
                }
                if (bday == "") {
                    $('#upd_emp_form span#bday').html('Date of Birth is required.');
                } else {
                    $('#upd_emp_form span#bday').html("");
                }
                if (natl == 0) {
                    $('#upd_emp_form div#natl').html('Nationality is required.');
                } else {
                    $('#upd_emp_form div#natl').html("");
                }
                if (c_status == 0) {
                    $('#upd_emp_form div#c_status').html('Civil Status is required.');
                } else {
                    $('#upd_emp_form div#c_status').html("");
                }
                if (dept == "") {
                    $('#upd_emp_form span#dept').html('Department is required.');
                } else {
                    $('#upd_emp_form span#dept').html("");
                }
                if (desg == "") {
                    $('#upd_emp_form span#desg').html('Designation is required.');
                } else {
                    $('#upd_emp_form span#desg').html("");
                }
                if (emp_status == "") {
                    $('#upd_emp_form span#emp_status').html('Employee Status is required.');
                } else {
                    $('#upd_emp_form span#emp_status').html("");
                }
                if (tax_status == "") {
                    $('#upd_emp_form span#tax_status').html('Tax Status is required.');
                } else {
                    $('#upd_emp_form span#tax_status').html("");
                }

                if (
                    typeof img_name == 'undefined'
                    && img_name == "No file uploaded"
                ) {
                    $('#upd_emp_form span#emp_image').html('Employee Image is required.');
                } else {
                    $('#upd_emp_form span#emp_image').html("");
                }

                $.each($('span.errormsg'), function (i, d) {
                    if ($(d).html() !== "") {
                        hasError = true;
                        return false;
                    }
                });

                if (!hasError) {
                    var frm = new FormData();

                    if (emp_name !== emp_details.emp_name) {
                        frm.append('emp_name', emp_name);
                    }
                    if (gender !== emp_details.gender) {
                        frm.append('gender', gender);
                    }
                    if (bday !== emp_details.bday) {
                        frm.append('bday', bday);
                    }
                    if (natl !== emp_details.natl) {
                        frm.append('natl', natl);
                    }
                    if (c_status !== emp_details.c_status) {
                        frm.append('c_status', c_status);
                    }
                    if (dept !== emp_details.dept) {
                        frm.append('dept', dept);
                    }
                    if (desg !== emp_details.desg) {
                        frm.append('desg', desg);
                    }
                    if (emp_status !== emp_details.emp_status) {
                        frm.append('emp_status', emp_status);
                    }
                    if (emp_image !== emp_details.emp_image) {
                        frm.append('emp_image', emp_image);
                    }
                    if (tax_status !== emp_details.tax_status) {
                        frm.append('tax_status', tax_status);
                    }

                    let itr = 0;
                    for (const pair of frm.entries()) {
                        itr++;
                    }
                    if (itr > 0) {
                        frm.append('emp_id', emp_id);
                        $.ajax({
                            method: 'POST',
                            url: 'api/update_emp.php',
                            data: frm,
                            contentType: false,
                            processData: false,
                            cache: false,
                            success: function (res) {
                                let data = JSON.parse(res)
                                if (typeof data.error === "undefined" && data.result) {
                                    alert('Employee details has been successfully updated.');
                                    window.location = 'employee_listview.php';
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
            let choice = confirm("Are you sure you want to remove this employee in the list?");
            if (choice) {
                $.post('api/remove_emp.php', { emp_id }, function (res) {
                    let data = JSON.parse(res)
                    if (typeof data.error === "undefined") {
                        alert('Employee successfully removed!');
                        window.location = 'employee_listview.php';
                    } else {
                        alert(data.error);
                    }
                });
            }
        });

        $('#employee_table').DataTable();
    });
});