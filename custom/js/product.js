var manageProductTable;

$(document).ready(function() {
    // top nav bar 
    $('#navProduct').addClass('active');
    // manage product data table
    manageProductTable = $('#manageProductTable').DataTable({
        'ajax': 'php_action/fetchProduct.php',
        'order': []
    });

    // add product modal btn clicked
    $("#addProductModalBtn").unbind('click').bind('click', function() {
        // // product form reset
        $("#submitProductForm")[0].reset();

        // remove text-error 
        $(".text-danger").remove();
        // remove from-group error
        $(".form-group").removeClass('has-error').removeClass('has-success');



        // submit product form
        $("#submitProductForm").unbind('submit').bind('submit', function() {

            // form validation

            var productName = $("#productName").val();
            var rate = $("#rate").val();
            var categoryName = $("#categoryName").val();
            var brandName = $("#brandName").val();
            var productStatus = $("#productStatus").val();
            var quantity = $("#quantity").val();


            if (quantity == "") {
                $("#quantity").after('<p class="text-danger">La quantité par default est obligatoire</p>');
                $('#quantity').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#quantity").find('.text-danger').remove();
                // success out for form 
                $("#quantity").closest('.form-group').addClass('has-success');
            } // /else

            if (productName == "") {
                $("#productName").after('<p class="text-danger">Nom produit obligatoire</p>');
                $('#productName').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#productName").find('.text-danger').remove();
                // success out for form 
                $("#productName").closest('.form-group').addClass('has-success');
            } // /else
            if (rate == "") {
                $("#rate").after('<p class="text-danger">Le champ prix location est obligatoire</p>');
                $('#rate').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#rate").find('.text-danger').remove();
                // success out for form 
                $("#rate").closest('.form-group').addClass('has-success');
            } // /else

            if (brandName == "") {
                $("#brandName").after('<p class="text-danger">Le champ offre pack est obligatoire</p>');
                $('#brandName').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#brandName").find('.text-danger').remove();
                // success out for form 
                $("#brandName").closest('.form-group').addClass('has-success');
            } // /else*/

            if (categoryName == "") {
                $("#categoryName").after('<p class="text-danger">Le champ famille est obligatoire</p>');
                $('#categoryName').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#categoryName").find('.text-danger').remove();
                // success out for form 
                $("#categoryName").closest('.form-group').addClass('has-success');
            } // /else

            if (productStatus == "") {
                $("#productStatus").after('<p class="text-danger">Le champ statut est obligatoire</p>');
                $('#productStatus').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#productStatus").find('.text-danger').remove();
                // success out for form 
                $("#productStatus").closest('.form-group').addClass('has-success');
            } // /else

            // array validation
            var brandName = document.getElementsByName('brandName[]');

         

            /*var validatebrandName;
            for (var x = 0; x < brandName.length; x++) {
                var brandNameId = brandName[x].id;
                alert(brandNameId)
                if (brandName[x].value == '') {
                    $("#" + brandNameId + "").after('<p class="text-danger"> Nom produit obligatoire!! </p>');
                    $("#" + brandNameId + "").closest('.form-group').addClass('has-error');
                } else {
                    $("#" + brandNameId + "").closest('.form-group').addClass('has-success');
                }
            } // for

            for (var x = 0; x < brandName.length; x++) {
                if (brandName[x].value) {
                    validatebrandName = true;
                } else {
                    validatebrandName = false;
                }
            }  for */

            if (productName && brandName && rate && categoryName && productStatus) {

                // submit loading button
                $("#createProductBtn").button('loading');

                var form = $(this);
                var formData = new FormData(this);
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: formData,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {


                            if (response.success == true) {
                                // submit loading button
                                $("#createProductBtn").button('reset');

                                $("#submitProductForm")[0].reset();

                                $("html, body, div.modal, div.modal-content, div.modal-body").animate({ scrollTop: '0' }, 100);

                                // shows a successful message after operation
                                $('#add-product-messages').html('<div class="alert alert-success">' +
                                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                    '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                                    '</div>');

                                // remove the mesages
                                $(".alert-success").delay(500).show(10, function() {
                                    $(this).delay(3000).hide(10, function() {
                                        $(this).remove();
                                    });
                                }); // /.alert

                                // reload the manage student table
                                manageProductTable.ajax.reload(null, true);

                                // remove text-error 
                                $(".text-danger").remove();
                                // remove from-group error
                                $(".form-group").removeClass('has-error').removeClass('has-success');

                            } // /if response.success

                        } // /success function
                }); // /ajax function

            } // /if validation is ok 					

            return false;
        }); // /submit product form

    }); // /add product modal btn clicked


    // remove product 	

}); // document.ready fucntion

function editProduct(productId = null) {

    if (productId) {
        $("#productId").remove();
        // remove text-error 
        $(".text-danger").remove();
        // remove from-group error
        $(".form-group").removeClass('has-error').removeClass('has-success');
        // modal spinner
        $('.div-loading').removeClass('div-hide');
        // modal div
        $('.div-result').addClass('div-hide');

        $.ajax({
            url: 'php_action/fetchSelectedProduct.php',
            type: 'post',
            data: { productId: productId },
            dataType: 'json',
            success: function(response) {
                    // alert(response.product_image);
                    // modal spinner
                    $('.div-loading').addClass('div-hide');
                    // modal div
                    $('.div-result').removeClass('div-hide');

                    //$("#getProductImage").attr('src', 'stock/' + response.product_image);

                    //$("#editProductImage").fileinput({});

                    // $("#editProductImage").fileinput({
                    //     overwriteInitial: true,
                    //    maxFileSize: 2500,
                    //    showClose: false,
                    //    showCaption: false,
                    //    browseLabel: '',
                    //    removeLabel: '',
                    //    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
                    //    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
                    //    removeTitle: 'Cancel or reset changes',
                    //    elErrorContainer: '#kv-avatar-errors-1',
                    //    msgErrorClass: 'alert alert-block alert-danger',
                    //    defaultPreviewContent: '<img src="stock/'+response.product_image+'" alt="Profile Image" style="width:100%;">',
                    //    layoutTemplates: {main2: '{preview} {remove} {browse}'},								    
                    // 		allowedFileExtensions: ["jpg", "png", "gif", "JPG", "PNG", "GIF"]
                    // });  

                    // product id 
                    $(".editProductFooter").append('<input type="hidden" name="productId" id="productId" value="' + response.product_id + '" />');
                    $(".editProductPhotoFooter").append('<input type="hidden" name="productId" id="productId" value="' + response.product_id + '" />');

                    // product name
                    $("#editProductName").val(response.product_name);
                    $("#editquantity").val(response.quantity);
                    // quantity
                    ///$("#editQuantity").val(response.quantity);
                    // buy
                    //$("#editBuy").val(response.buy);
                    // rate
                    $("#editRate").val(response.rate);
                    // brand name
                    $("#editBrandName").val(response.brand_id);
                    // category name
                    $("#editCategoryName").val(response.categories_id);
                    // status
                    $("#editProductStatus").val(response.active);


                    // update the product data function
                    $("#editProductForm").unbind('submit').bind('submit', function() {

                        // form validation
                        //var productImage = $("#editProductImage").val();
                        var productName = $("#editProductName").val();
                        //var quantity = $("#editQuantity").val();
                        //var buy = $("#editBuy").val();
                        var rate = $("#editRate").val();
                        var brandName = $("#editBrandName").val();
                        var categoryName = $("#editCategoryName").val();
                        var productStatus = $("#editProductStatus").val();
                        var quantity = $("#editquantity").val();


                        if (quantity == "" || quantity<0 ) {
                            $("#editquantity").after('<p class="text-danger">La quantité par default est obligatoire</p>');
                            $('#editquantity').closest('.form-group').addClass('has-error');
                        } else {
                            // remov error text field
                            $("#editquantity").find('.text-danger').remove();
                            // success out for form 
                            $("#editquantity").closest('.form-group').addClass('has-success');
                        } // /else




                        if (productName == "") {
                            $("#editProductName").after('<p class="text-danger">Nom produit obligatoire</p>');
                            $('#editProductName').closest('.form-group').addClass('has-error');
                        } else {
                            // remov error text field
                            $("#editProductName").find('.text-danger').remove();
                            // success out for form 
                            $("#editProductName").closest('.form-group').addClass('has-success');
                        } // /else




                        if (rate == "") {
                            $("#editRate").after('<p class="text-danger">Prix location obligatoire</p>');
                            $('#editRate').closest('.form-group').addClass('has-error');
                        } else {
                            // remov error text field
                            $("#editRate").find('.text-danger').remove();
                            // success out for form 
                            $("#editRate").closest('.form-group').addClass('has-success');
                        } // /else

                        if (brandName == "") {
                            $("#editBrandName").after('<p class="text-danger">Offre pack obligatoire</p>');
                            $('#editBrandName').closest('.form-group').addClass('has-error');
                        } else {
                            // remov error text field
                            $("#editBrandName").find('.text-danger').remove();
                            // success out for form 
                            $("#editBrandName").closest('.form-group').addClass('has-success');
                        } // /else

                        if (categoryName == "") {
                            $("#editCategoryName").after('<p class="text-danger">Famille produit obligatoire</p>');
                            $('#editCategoryName').closest('.form-group').addClass('has-error');
                        } else {
                            // remov error text field
                            $("#editCategoryName").find('.text-danger').remove();
                            // success out for form 
                            $("#editCategoryName").closest('.form-group').addClass('has-success');
                        } // /else

                        if (productStatus == "") {
                            $("#editProductStatus").after('<p class="text-danger">Statut produit obligatoire</p>');
                            $('#editProductStatus').closest('.form-group').addClass('has-error');
                        } else {
                            // remov error text field
                            $("#editProductStatus").find('.text-danger').remove();
                            // success out for form 
                            $("#editProductStatus").closest('.form-group').addClass('has-success');
                        } // /else					



                        if (productName && rate && quantity && brandName && categoryName && productStatus) {
                            // submit loading button
                            $("#editProductBtn").button('loading');

                            var form = $(this);
                            var formData = new FormData(this);

                            $.ajax({
                                url: form.attr('action'),
                                type: form.attr('method'),
                                data: formData,
                                dataType: 'json',
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                        console.log(response);
                                        if (response.success == true) {
                                            // submit loading button
                                            $("#editProductBtn").button('reset');

                                            $("html, body, div.modal, div.modal-content, div.modal-body").animate({ scrollTop: '0' }, 100);

                                            // shows a successful message after operation
                                            $('#edit-product-messages').html('<div class="alert alert-success">' +
                                                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                                                '</div>');

                                            // remove the mesages
                                            $(".alert-success").delay(500).show(10, function() {
                                                $(this).delay(3000).hide(10, function() {
                                                    $(this).remove();
                                                });
                                            }); // /.alert

                                            // reload the manage student table
                                            manageProductTable.ajax.reload(null, true);

                                            // remove text-error 
                                            $(".text-danger").remove();
                                            // remove from-group error
                                            $(".form-group").removeClass('has-error').removeClass('has-success');

                                        } // /if response.success

                                    } // /success function
                            }); // /ajax function
                        } // /if validation is ok 					

                        return false;
                    }); // update the product data function

                    // update the product image				
                    $("#updateProductImageForm").unbind('submit').bind('submit', function() {
                        // form validation
                        var productImage = $("#editProductImage").val();

                        if (productImage == "") {
                            $("#editProductImage").closest('.center-block').after('<p class="text-danger">Image produit obligatoire</p>');
                            $('#editProductImage').closest('.form-group').addClass('has-error');
                        } else {
                            // remov error text field
                            $("#editProductImage").find('.text-danger').remove();
                            // success out for form 
                            $("#editProductImage").closest('.form-group').addClass('has-success');
                        } // /else

                        if (productImage) {
                            // submit loading button
                            $("#editProductImageBtn").button('loading');

                            var form = $(this);
                            var formData = new FormData(this);

                            $.ajax({
                                url: form.attr('action'),
                                type: form.attr('method'),
                                data: formData,
                                dataType: 'json',
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function(response) {

                                        if (response.success == true) {
                                            // submit loading button
                                            $("#editProductImageBtn").button('reset');

                                            $("html, body, div.modal, div.modal-content, div.modal-body").animate({ scrollTop: '0' }, 100);

                                            // shows a successful message after operation
                                            $('#edit-productPhoto-messages').html('<div class="alert alert-success">' +
                                                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                                                '</div>');

                                            // remove the mesages
                                            $(".alert-success").delay(500).show(10, function() {
                                                $(this).delay(3000).hide(10, function() {
                                                    $(this).remove();
                                                });
                                            }); // /.alert

                                            // reload the manage student table
                                            manageProductTable.ajax.reload(null, true);

                                            $(".fileinput-remove-button").click();

                                            $.ajax({
                                                url: 'php_action/fetchProductImageUrl.php?i=' + productId,
                                                type: 'post',
                                                success: function(response) {
                                                    $("#getProductImage").attr('src', response);
                                                }
                                            });

                                            // remove text-error 
                                            $(".text-danger").remove();
                                            // remove from-group error
                                            $(".form-group").removeClass('has-error').removeClass('has-success');

                                        } // /if response.success

                                    } // /success function
                            }); // /ajax function
                        } // /if validation is ok 					

                        return false;
                    }); // /update the product image

                } // /success function
        }); // /ajax to fetch product image


    } else {
        alert('error please refresh the page');
    }
} // /edit product function

// remove product 
function removeProduct(productId = null) {
    if (productId) {
        // remove product button clicked
        $("#removeProductBtn").unbind('click').bind('click', function() {
            // loading remove button
            $("#removeProductBtn").button('loading');
            $.ajax({
                url: 'php_action/removeProduct.php',
                type: 'post',
                data: { productId: productId },
                dataType: 'json',
                success: function(response) {
                        // loading remove button
                        $("#removeProductBtn").button('reset');
                        if (response.success == true) {
                            // remove product modal
                            $("#removeProductModal").modal('hide');

                            // update the product table
                            manageProductTable.ajax.reload(null, false);

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

function clearForm(oForm) {
    // var frm_elements = oForm.elements;									
    // console.log(frm_elements);
    // 	for(i=0;i<frm_elements.length;i++) {
    // 		field_type = frm_elements[i].type.toLowerCase();									
    // 		switch (field_type) {
    // 	    case "text":
    // 	    case "password":
    // 	    case "textarea":
    // 	    case "hidden":
    // 	    case "select-one":	    
    // 	      frm_elements[i].value = "";
    // 	      break;
    // 	    case "radio":
    // 	    case "checkbox":	    
    // 	      if (frm_elements[i].checked)
    // 	      {
    // 	          frm_elements[i].checked = false;
    // 	      }
    // 	      break;
    // 	    case "file": 
    // 	    	if(frm_elements[i].options) {
    // 	    		frm_elements[i].options= false;
    // 	    	}
    // 	    default:
    // 	        break;
    //     } // /switch
    // 	} // for
}