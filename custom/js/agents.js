var mmanageAgentTable;

$(document).ready(function() {
	// top bar active
	$('#navBrand').addClass('active');
	
	// manage brand table
	manageAgentTable = $("#manageAgentTable").DataTable({
		'ajax': 'php_action/fetchAgents.php',
		'order': []		
	});

	

});



// desactivation agent
function DesactiverRemenber(userId = null) {
    if (userId) {
        // remove product button clicked
        $("#removeAgentBtn").unbind('click').bind('click', function() {
            // loading remove button
            $("#removeAgentBtn").button('loading');
            $.ajax({
                url: 'php_action/desacviveragents.php',
                type: 'post',
                data: { userId: userId },
                dataType: 'json',
                success: function(response) {
                        // loading remove button
                        $("#removeAgentBtn").button('reset');
                        if (response.success == true) {
                            // remove product modal
                            $("#DesactiverMemberModal").modal('hide');
                            // update the product table
                            manageAgentTable.ajax.reload(null, false);

                            // remove success messages
                            $(".remove-messages").html('<div class="alert alert-success">' +
                                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                                '</div>');

                            // remove the mesages
                            $(".alert-success").delay(500).show(10, function() {
                                $(this).delay(3000).hide(10, function() {
                                    $(this).remove();
                                });
                            }); // /.alert
                        } else {

                            // remove success messages
                            $(".removeProductMessages").html('<div class="alert alert-success">' +
                                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                                '</div>');

                            // remove the mesages
                            $(".alert-success").delay(500).show(10, function() {
                                $(this).delay(3000).hide(10, function() {
                                    $(this).remove();
                                });
                            }); // /.alert

                        } // /error
                    } // /success function
            }); // /ajax fucntion to remove the product
            return false;
        }); // /remove product btn clicked
    } // /if productid
} // /remove product function



// activation agent
function ActiverAgent(userId = null) {
    if (userId) {
        // remove product button clicked
        $("#ActiverAgentBtn").unbind('click').bind('click', function() {
            // loading remove button
            $("#ActiverAgentBtnn").button('loading');
            $.ajax({
                url: 'php_action/activerAgent.php',
                type: 'post',
                data: { userId: userId },
                dataType: 'json',
                success: function(response) {
                        // loading remove button
                        $("#ActiverAgentBtn").button('reset');
                        if (response.success == true) {
                            // remove product modal
                            $("#ActivationAgentModal").modal('hide');
                            // update the product table
                            manageAgentTable.ajax.reload(null, false);

                            // remove success messages
                            $(".remove-messages").html('<div class="alert alert-success">' +
                                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                                '</div>');

                            // remove the mesages
                            $(".alert-success").delay(500).show(10, function() {
                                $(this).delay(3000).hide(10, function() {
                                    $(this).remove();
                                });
                            }); // /.alert
                        } else {

                            // remove success messages
                            $(".removeProductMessages").html('<div class="alert alert-success">' +
                                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                                '</div>');

                            // remove the mesages
                            $(".alert-success").delay(500).show(10, function() {
                                $(this).delay(3000).hide(10, function() {
                                    $(this).remove();
                                });
                            }); // /.alert

                        } // /error
                    } // /success function
            }); // /ajax fucntion to remove the product
            return false;
        }); // /remove product btn clicked
    } // /if productid
} // /remove product function