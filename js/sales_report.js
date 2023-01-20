$(function () {
    const generateTable = function (tbl_name, param) {
        $.get('api/generate_report.php', param, function (res) {
            let data = JSON.parse(res);
            let tbl_contents = "";
            let total_net = 0;
            let total_gross = 0;
            let ovr_total_disc = 0;
            let ovr_total_tax = 0;
            const formatter = new Intl.NumberFormat();

            $.each(data, function (i, d) {
                total_net = total_net + parseFloat(d.net_sales);
                total_gross = total_gross + parseFloat(d.gross_sales_total);
                ovr_total_disc = ovr_total_disc + parseFloat(d.total_discount);
                ovr_total_tax = ovr_total_tax + parseFloat(d.total_tax);

                let itemList = ""
                let items = d.item_name.split(',');
                for (const item in items) {
                    itemList += items[item] + "<br>"
                }

                let priceList = ""
                let prices = d.price.split(',');
                for (const p in prices) {
                    priceList += formatter.format(prices[p]) + "<br>"
                }

                let qtyList = ""
                let qtys = d.items_sold.split(',');
                for (const p in qtys) {
                    qtyList += formatter.format(qtys[p]) + "<br>"
                }

                let dcList = ""
                let dcs = d.total_discount.split(',');
                let total_disc = 0
                for (const p in dcs) {
                    total_disc += parseFloat(dcs[p])
                    dcList += formatter.format(dcs[p]) + "<br>"
                }

                let discountedList = ""
                let gross = d.gross_sales_total.split(',');
                let gross_total = 0
                for (const p in gross) {
                    gross_total += parseFloat(gross[p])
                    discountedList += formatter.format(gross[p] - dcs[p]) + "<br>"
                }

                tbl_contents += "<tr>";
                tbl_contents += "<td>" + d.order_id + "</td>";
                tbl_contents += "<td>" + itemList + "</td>";
                tbl_contents += "<td style='text-align:right;'>" + priceList + "</td>";
                tbl_contents += "<td style='text-align:right;'>" + qtyList + "</td>";
                tbl_contents += "<td style='text-align:right;'>" + dcList + "</td>";
                tbl_contents += "<td style='text-align:right;'>" + discountedList + "</td>";
                // tbl_contents += "<td style='text-align:right;'>" + formatter.format(d.gross_sales_total - d.total_discount) + "</td>";
                tbl_contents += "<td style='text-align:right;'>" + formatter.format(d.paid_amt) + "</td>";
                tbl_contents += "<td style='text-align:right;'>" + formatter.format(d.paid_amt - (gross_total - total_disc)) + "</td>";
                tbl_contents += "</tr>";
            });

            // let footer_contents = "<tr>" +
            //     "<th colspan=6 style='text-align:right;'> TOTALS</th >" +
            //     "<th style='text-align:right;'>" + formatter.format(total_gross) + "</th>" +
            //     "<th style='text-align:right;'>" + formatter.format(ovr_total_disc) + "</th>" +
            //     "<th style='text-align:right;'>" + formatter.format(ovr_total_tax) + "</th>" +
            //     "<th style='text-align:right;'>" + formatter.format(total_net) + "</th>" +
            //     "</tr>";

            $('#' + tbl_name + ' tbody').html(tbl_contents);
            // $('#' + tbl_name + ' tfoot').html(footer_contents);


            // $('#daily_datepicker')
            $('#' + tbl_name + '').DataTable({
                "paging": false,
                "info": false,
            });
            $('#' + tbl_name + '').show();
        });
    }
    $("#tabs").tabs();

    $('input#weekly_datepicker').datepicker({
        changeMonth: true,
        changeYear: true,
        showOtherMonths: true,
        selectOtherMonths: true,
        showWeek: true,
        onSelect: function (dateText, inst) {
            var date = $(this).datepicker('getDate');
            let startDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay());
            let endDate = new Date(date.getFullYear(), date.getMonth(), date.getDate() - date.getDay() + 6);
            var dateFormat = inst.settings.dateFormat || $.datepicker._defaults.dateFormat;
            $(this).val($.datepicker.formatDate(dateFormat, startDate, inst.settings) + " - " + $.datepicker.formatDate(dateFormat, endDate, inst.settings));
        }
    });

    $('#single_sr_filter').unbind('click').on('click', function () {
        $('#single_report_tbl').hide();
        $('#single_report_tbl').DataTable().clear().destroy();
        generateTable("single_report_tbl", { mode: 'pos', sales_number: $('#single_sr_sales_number_filter').val() });
    });
    $('#bundle1_sr_filter').unbind('click').on('click', function () {
        $('#bundle1_report_tbl').hide();
        $('#bundle1_report_tbl').DataTable().clear().destroy();
        generateTable("bundle1_report_tbl", { mode: 'bundle1', sales_number: $('#bundle1_sr_sales_number_filter').val() });
    });
    $('#bundle2_sr_filter').unbind('click').on('click', function () {
        $('#bundle2_report_tbl').hide();
        $('#bundle2_report_tbl').DataTable().clear().destroy();
        generateTable("bundle2_report_tbl", { mode: 'bundle2', sales_number: $('#bundle2_sr_sales_number_filter').val() });
    });
    $('#bundle3_sr_filter').unbind('click').on('click', function () {
        $('#bundle3_report_tbl').hide();
        $('#bundle3_report_tbl').DataTable().clear().destroy();
        generateTable("bundle3_report_tbl", { mode: 'bundle3', sales_number: $('#bundle3_sr_sales_number_filter').val() });
    });


    $('#single_sr_filter').trigger('click');
    $('#bundle1_sr_filter').trigger('click');
    $('#bundle2_sr_filter').trigger('click');
    $('#bundle3_sr_filter').trigger('click');
});
