$(document).ready(function () {
    $('#tbl-exchange-rate').DataTable({
        "paging": false,
        "ordering": true,
        "searching": false,
        "info": false
    });

    $('#add-exchange-rate').click(function () {
        clearForm();
        $('#frm-exchange').dialog();
    });

    $('#save-exchange-rate').click(function () {
        saveExchangeRate();
    });

    $('.edit-exchange-rate').click(function () {
        clearForm();
        setEditForm($(this));
        $('#frm-exchange').dialog();
    });

    $('#select-base-currency').change(function () {
        window.location.href = $(this).find('option:selected').attr("data-attr-href");
    });
});

/**
 * Function to create/update destnation
 */
function saveExchangeRate(action, id) {
    var action = $('#save-exchange-rate').val();
    var id = $('#save-exchange-rate').attr('data-rid');
    var currency = $('#currency').val();
    var exchangeRate = $('#input-exchange-rate').val();
    var reqType = 'POST';
    var url = '/exchange/add';

    if (currency === '') {
        alert('Please select currency');
        return false;
    }

    if (exchangeRate === '' || !$.isNumeric(exchangeRate)) {
        alert('Invalid exchange rate value');
        return false;
    }

    if (action === 'Update') {
        url = '/exchange/update';
        reqType = 'PUT';
    }

    $.ajax({
        'type': reqType,
        'url': url,
        'beforeSend': function () {
            $(this).attr('disabled', true);
        },
        'data': 'base_currency=' + $("#default-currency").val() + '&currency=' + currency + '&exchangeRate=' + exchangeRate + '&id=' + id,
        'dataType': 'json',
        'success': function (resp) {
            if (resp.status == 'done') {
                $('#frm-exchange').dialog('close');
                alert('Exchange rate data saved successfully!');
                window.location.reload();
            } else {
                alert('Please provide valid data');
            }
            $('#save-exchange-rate').attr('disabled', false);
        },
        'error': function () {
            $('#save-exchange-rate').attr('disabled', false);
            alert('An error occured, please try again!');
        }
    });
}

/**
 * Function to clear form 
 */
function clearForm() {
    $('#currency').val('');
    $('#input-exchange-rate').val('');
    $('#save-exchange-rate').removeAttr('data-rid');
    $('#frm-exchange').attr('title', 'Add exchange rate');
    $('#save-exchange-rate').val('Save');
}

/**
 * Function to set value for editing exchange rate 
 */
function setEditForm(that) {
    $('#currency').val(that.attr('data-currency'));
    $('#input-exchange-rate').val(that.attr('data-value'));
    $('#save-exchange-rate').attr('data-rid', that.attr('data-rid'));
    $('#frm-exchange').attr('title', 'Update exchange rate');
    $('#save-exchange-rate').val('Update');
}
