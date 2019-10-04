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
        saveExchangeRate($('#save-exchange-rate').val(), $('#save-exchange-rate').attr('data-rid'));
        $(this).attr('disabled',true);
    });

    $('.edit-exchange-rate').click(function () {
        console.log('here');
        clearForm();
        setEditForm($(this));
        $('#frm-exchange').dialog();
    });


    $('#select_base_currency').change(function () {
        window.location.href = $(this).find('option:selected').attr("data-attr-href");
    });
});

/**
 * Function to create/update destnation
 */
function saveExchangeRate(action, id) {
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
        'data': 'base_currency=' + $("#default_currency").val() + '&currency=' + currency + '&exchangeRate=' + exchangeRate + '&id=' + id,
        'success': function () {
            alert('Exchange rate data saved successfully!');
            $('#frm-exchange').dialog('close');
            window.location.reload();
        },
        'error': function () {
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
