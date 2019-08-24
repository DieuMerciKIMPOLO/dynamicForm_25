var manageOrderTable;

$(document).ready(function() {
    ///$('#topNavManageOrder').addClass('active');

    manageOrderTable = $("#manageOrderTable").DataTable({
        'ajax': 'php_action/FetchBonCommande.php',
        'order': []

    });

    manageProductTable = $('#manageProductTable').DataTable({
        'ajax': 'php_action/fetchProduct.php',
        'order': []
    });
});
/*$(document).ready(function() {
    $('#manageOrderTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "php_action/fetchOrder.php",
        'order': []
    });
});*/