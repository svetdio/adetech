const calcGI = function () {
    let bi_rate = (document.getElementById('bi_rate').value !== "") ? parseFloat(document.getElementById('bi_rate').value) : 0;
    let bi_hrpercutoff = (document.getElementById('bi_hrpercutoff').value !== "") ? parseFloat(document.getElementById('bi_hrpercutoff').value) : 0;
    let bi_income = document.getElementById('bi_income');

    let hi_rate = (document.getElementById('hi_rate').value !== "") ? parseFloat(document.getElementById('hi_rate').value) : 0;
    let hi_hrpercutoff = (document.getElementById('hi_hrpercutoff').value !== "") ? parseFloat(document.getElementById('hi_hrpercutoff').value) : 0;
    let hi_income = document.getElementById('hi_income');

    let oi_rate = (document.getElementById('oi_rate').value !== "") ? parseFloat(document.getElementById('oi_rate').value) : 0;
    let oi_hrpercutoff = (document.getElementById('oi_hrpercutoff').value !== "") ? parseFloat(document.getElementById('oi_hrpercutoff').value) : 0;
    let oi_income = document.getElementById('oi_income');

    let bi_total = bi_rate * bi_hrpercutoff;
    let hi_total = hi_rate * hi_hrpercutoff;
    let oi_total = oi_rate * oi_hrpercutoff;
    bi_income.value = (bi_total).toLocaleString();
    hi_income.value = (hi_total).toLocaleString();
    oi_income.value = (oi_total).toLocaleString();
    let gross = bi_total + hi_total + oi_total;

    // regular deductions
    let rd_sss = (document.getElementById('rd_sss').value !== "") ? parseFloat(document.getElementById('rd_sss').value) : 0;
    let rd_philhealth = (document.getElementById('rd_philhealth').value !== "") ? parseFloat(document.getElementById('rd_philhealth').value) : 0;
    let rd_pagibig = (document.getElementById('rd_pagibig').value !== "") ? parseFloat(document.getElementById('rd_pagibig').value) : 0;
    let inc_tax = (document.getElementById('inc_tax').value !== "") ? parseFloat(document.getElementById('inc_tax').value) / 100 : 0;
    let inc_tax_val = gross * inc_tax;
    let regular_deduction = rd_sss + rd_philhealth + rd_pagibig + inc_tax_val;

    // other deductions
    let od_sssloan = (document.getElementById('od_sssloan').value !== "") ? parseFloat(document.getElementById('od_sssloan').value) : 0;
    let od_pagibigloan = (document.getElementById('od_pagibigloan').value !== "") ? parseFloat(document.getElementById('od_pagibigloan').value) : 0;
    let od_fsd = (document.getElementById('od_fsd').value !== "") ? parseFloat(document.getElementById('od_fsd').value) : 0;
    let od_fsloan = (document.getElementById('od_fsloan').value !== "") ? parseFloat(document.getElementById('od_fsloan').value) : 0;
    let od_salaryloan = (document.getElementById('od_salaryloan').value !== "") ? parseFloat(document.getElementById('od_salaryloan').value) : 0;
    let od_otherloans = (document.getElementById('od_otherloans').value !== "") ? parseFloat(document.getElementById('od_otherloans').value) : 0;
    let other_deduction = od_sssloan + od_pagibigloan + od_fsd + od_fsloan + od_salaryloan + od_otherloans;

    // Setting the values in the form
    let total_deduction = regular_deduction + other_deduction;

    document.getElementById('gross_income').value = gross.toLocaleString();
    document.getElementById('gross_income').dataset.gross = gross;
    document.getElementById('total_deduction').value = total_deduction.toLocaleString();
    document.getElementById('gross_income').dataset.total_deduction = total_deduction;
}

const calcNI = function () {
    let gross = parseFloat(document.getElementById('gross_income').dataset.gross);
    let total_deduction = parseFloat(document.getElementById('gross_income').dataset.total_deduction);

    document.getElementById('net_income').value = (gross - total_deduction).toLocaleString();
}

const savePayroll = function () {
    let pay_date = $('input#pay_date').val();
    let emp_id = $('select#emp_id').val();

    let bi_rate = $('input#bi_rate').val() == "" ? 0 : $('input#bi_rate').val();
    let bi_hrpercutoff = $('input#bi_hrpercutoff').val() == "" ? 0 : $('input#bi_hrpercutoff').val();
    let hi_rate = $('input#hi_rate').val() == "" ? 0 : $('input#hi_rate').val();
    let hi_hrpercutoff = $('input#hi_hrpercutoff').val() == "" ? 0 : $('input#hi_hrpercutoff').val();
    let oi_rate = $('input#oi_rate').val() == "" ? 0 : $('input#oi_rate').val();
    let oi_hrpercutoff = $('input#oi_hrpercutoff').val() == "" ? 0 : $('input#oi_hrpercutoff').val();
    let sss_contrib = $('input#rd_sss').val() == "" ? 0 : $('input#rd_sss').val();
    let philhealth_contrib = $('input#rd_philhealth').val() == "" ? 0 : $('input#rd_philhealth').val();
    let pagibig_contrib = $('input#rd_pagibig').val() == "" ? 0 : $('input#rd_pagibig').val();
    let income_tax = $('input#inc_tax').val() == "" ? 0 : $('input#inc_tax').val();
    let sss_loan = $('input#od_sssloan').val() == "" ? 0 : $('input#od_sssloan').val();
    let pagibig_loan = $('input#od_pagibigloan').val() == "" ? 0 : $('input#od_pagibigloan').val();
    let fsd = $('input#od_fsd').val() == "" ? 0 : $('input#od_fsd').val();
    let fsl = $('input#od_fsloan').val() == "" ? 0 : $('input#od_fsloan').val();
    let salary_loan = $('input#od_salaryloan').val() == "" ? 0 : $('input#od_salaryloan').val();
    let other_loans = $('input#od_otherloans').val() == "" ? 0 : $('input#od_otherloans').val();

    let params = {
        bi_rate,
        bi_hrpercutoff,
        hi_rate,
        hi_hrpercutoff,
        oi_rate,
        oi_hrpercutoff,
        sss_contrib,
        philhealth_contrib,
        pagibig_contrib,
        income_tax,
        sss_loan,
        pagibig_loan,
        fsd,
        fsl,
        salary_loan,
        other_loans
    }

    $.post('api/update_payroll.php', { params, pay_date, emp_id }, function (res) {
        let resp = JSON.parse(res);
        if (resp.result) {
            if (resp.affected_rows > 0) {
                alert("Payroll successfully saved!");
                location.reload();
            } else {
                alert("No changes detected. ");
            }
        } else {
            alert(resp.error);
        }
    });
}

$(function () {
    $('select#emp_id').on('change', function () {
        let emp_id = $(this).val();
        $.get('api/get_emp.php', { emp_id }, function (r) {
            let emps = JSON.parse(r);
            if (emps.length > 0) {
                let data = emps[0];
                $('input#emp_name').val(data.emp_name)
                $('input#c_status').val(data.c_status)
                $('input#tax_status').val(data.tax_status)
                $('input#emp_status').val(data.emp_status)
                $('input#dept').val(data.dept)
                $('input#designation').val(data.desg)
                $('img#emp-img-viewer').prop('src', data.emp_img)
            } else {
                $('input#emp_name').val('');
                $('input#c_status').val('');
                $('input#tax_status').val('');
                $('input#emp_status').val('');
                $('input#dept').val('');
                $('input#designation').val('');
                $('img#emp-img-viewer').prop('src', 'img/default-img.png')

            }

            $('input#pay_date').trigger('change');
        })
    });

    $('input#pay_date').on('change', function () {
        let emp_id = $('select#emp_id').val();
        let pay_date = $(this).val();
        $.get('api/get_payroll.php', { emp_id, pay_date }, function (r) {
            let payroll = JSON.parse(r);

            if (payroll.length > 0) {
                let data = payroll[0];
                $('input#bi_rate').val(data.bi_rate)
                $('input#bi_hrpercutoff').val(data.bi_hrpercutoff)
                $('input#hi_rate').val(data.hi_rate)
                $('input#hi_hrpercutoff').val(data.hi_hrpercutoff)
                $('input#oi_rate').val(data.oi_rate)
                $('input#oi_hrpercutoff').val(data.oi_hrpercutoff)

                $('input#rd_sss').val(data.sss_contrib)
                $('input#rd_philhealth').val(data.philhealth_contrib)
                $('input#rd_pagibig').val(data.pagibig_contrib)
                $('input#inc_tax').val(data.income_tax)

                $('input#od_sssloan').val(data.sss_loan)
                $('input#od_pagibigloan').val(data.pagibig_loan)
                $('input#od_fsd').val(data.fsd)
                $('input#od_fsloan').val(data.fsl)
                $('input#od_salaryloan').val(data.salary_loan)
                $('input#od_otherloans').val(data.other_loans)

            } else {
                $('input#bi_rate').val('')
                $('input#bi_hrpercutoff').val('')
                $('input#hi_rate').val('')
                $('input#hi_hrpercutoff').val('')
                $('input#oi_rate').val('')
                $('input#oi_hrpercutoff').val('')

                $('input#rd_sss').val('200')
                $('input#rd_philhealth').val('100')
                $('input#rd_pagibig').val('100')
                $('input#inc_tax').val('10')

                $('input#od_sssloan').val('')
                $('input#od_pagibigloan').val('')
                $('input#od_fsd').val('')
                $('input#od_fsloan').val('')
                $('input#od_salaryloan').val('')
                $('input#od_otherloans').val('')
            }

            calcGI();
            // calcNI();
        })
    });

    $('input#pay_date').trigger('change');
});