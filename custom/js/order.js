var manageOrderTable;

$(document).ready(function() {

    var divRequest = $(".div-request").text();

    

    // top nav bar 
    $("#navOrder").addClass('active');

    if (divRequest == 'add') {
        // add order	
        // top nav child bar 
        $('#topNavAddOrder').addClass('active');
        // order date picker
        $("#orderDate").datepicker();
        $("#datelivraison").datepicker();
        // create order form function
        $("#createOrderBtn").click(function(event) {
            $("#createOrderForm").unbind('submit').bind('submit', function() {


                
                /*



               
                  /*  var errors={}
                    var form_data=[]
                    const getTotal=(classe)=>{
                        let total=0;
                        form_data.map((item)=>{
                            if(item.classe===classe){
                                return total+=item.value
                            }
                        });
                        return total
                      }
                    const getErros=(item)=>{
                        
                        return getTotal(item.classe)<parseInt(item.minimum)?`La quantite minimal n'est pas respecte pour la famille de  ${item.classe} qui est de ${item.minimum}`:``
                    }

                    /*const handleChange=(classe,produit, value, minimum)=>{
                    
                        form_data=[...form_data.filter(obj=>obj.classe!==classe || obj.produit!==produit), {
                          classe:classe,
                          produit:produit,
                          value:isNaN(parseInt(value))?0:parseInt(value),
                          minimum:parseInt(minimum)
                        }]
                        //$(`#${classe}`).html(getErros({classe:classe, produit:produit, minimum:parseInt(minimum)}))
                        console.log(form_data)    
                    }*/

                event.preventDefault();
                var form = $(this);

                $('.form-group').removeClass('has-error').removeClass('has-success');
                $('.text-danger').remove();

                /*var quantite1 = Number($("#quantity33").val());
                var quantite2 = Number($("#quantity34").val());
                var quantite3 = Number($("#quantity35").val());
                var quantite4 = Number($("#quantity36").val());
                var quantite15 = Number($("#quantity37").val());
                var tables = Number(quantite4) + Number(quantite15);
                var quantite5 = Number($("#quantity38").val());
                var quantite6 = Number($("#quantity39").val());
                var quantite7 = Number($("#quantity40").val());
                var quantite16 = Number($("#quantity42").val());
                var quantite17 = Number($("#quantity43").val());
                var Chaisesckek = Number(quantite7) + Number(quantite16) + Number(quantite17);
                var quantite8 = Number($("#quantity45").val());
                var quantite9 = Number($("#quantity46").val());

                var quantite11 = Number($("#quantity49").val());
                var quantite12 = Number($("#quantity50").val());
                var quantite13 = Number($("#quantity51").val());
                var quantite14 = Number($("#quantity52").val());
                var quantite10 = Number($("#quantity47").val());
                var quantite18 = Number($("#quantity48").val());
                var refrigerateur = Number(quantite10) + Number(quantite18);
                var totals = Number(quantite1) + Number(quantite2) + Number(quantite3);*/
                var orderDate = $("#orderDate").val();
                //var clientName = $("#clientName").val();
                var datelivraison = $("#datelivraison").val();
                var NomPrenomLivraison = $("#NomPrenomLivraison").val();
                var user_input_autocomplete_address = $("#user_input_autocomplete_address").val();
                var TelephoneClient = $("#TelephoneClient").val();
                var EmailClient = $("#EmailClient").val();
                var packs = $("#packs").val();
                var Societe = $("#Societe").val();
                var AdresseSociete = $("#AdresseSociete").val();
                var TelephoneFixe = $("#TelephoneFixe").val();
                var NomPrenomAgent = $("#NomPrenomAgent").val();
                var TelephoneAgent = $("#TelephoneAgent").val();
                var EmailAgent = $("#EmailAgent").val();
                var NumeroMgAgent = $("#NumeroMgAgent").val();
                var NomPrenomSocAg = $("#NomPrenomSocAg").val();
                /*var user = $("#user").val();
                var productName = $("#productName").val();*/



                if (packs == "") {
                    $("#packs").after('<p class="text-danger"> le pack est obligatoire </p>');
                    $('#packs').closest('.form-group').addClass('has-error');
                    $("#createOrderBtn").button('reset');
                } else {
                    $('#packs').closest('.form-group').addClass('has-success');
                } // /else

                if (NumeroMgAgent == "") {
                    $("#NumeroMgAgent").after('<p class="text-danger"> Le numero mandataire obligatoire </p>');
                    $('#NumeroMgAgent').closest('.form-group').addClass('has-error');
                    $("#createOrderBtn").button('reset');
                } else {
                    $('#NumeroMgAgent').closest('.form-group').addClass('has-success');
                } // /else

                if (EmailAgent == "") {
                    $("#EmailAgent").after('<p class="text-danger"> Email agent obligatoire </p>');
                    $('#EmailAgent').closest('.form-group').addClass('has-error');
                    $("#createOrderBtn").button('reset');
                } else {
                    $('#EmailAgent').closest('.form-group').addClass('has-success');
                } // /else

                if (TelephoneAgent == "") {
                    $("#TelephoneAgent").after('<p class="text-danger"> Numero de télephone agent obligatoire </p>');
                    $('#TelephoneAgent').closest('.form-group').addClass('has-error');
                    $("#createOrderBtn").button('reset');
                } else {
                    $('#TelephoneAgent').closest('.form-group').addClass('has-success');
                } // /else

                if (NomPrenomAgent == "") {
                    $("#NomPrenomAgent").after('<p class="text-danger"> Nom & Prénom de l\'agent </p>');
                    $('#NomPrenomAgent').closest('.form-group').addClass('has-error');
                    $("#createOrderBtn").button('reset');
                } else {
                    $('#NomPrenomAgent').closest('.form-group').addClass('has-success');
                } // /else

                if (TelephoneFixe == "") {
                    $("#TelephoneFixe").after('<p class="text-danger"> Télephone obligatoire </p>');
                    $('#TelephoneFixe').closest('.form-group').addClass('has-error');
                    $("#createOrderBtn").button('reset');
                } else {
                    $('#TelephoneFixe').closest('.form-group').addClass('has-success');
                } // /else

                if (AdresseSociete == "") {
                    $("#AdresseSociete").after('<p class="text-danger"> L\'adresse obligatoire </p>');
                    $('#AdresseSociete').closest('.form-group').addClass('has-error');
                    $("#createOrderBtn").button('reset');
                } else {
                    $('#AdresseSociete').closest('.form-group').addClass('has-success');
                } // /else

                if (NomPrenomSocAg == "") {
                    $("#NomPrenomSocAg").after('<p class="text-danger text-center"> Nom & prénom obligatoire </p>');
                    $('#NomPrenomSocAg').closest('.form-group').addClass('has-error');
                    $("#createOrderBtn").button('reset');
                } else {
                    $('#NomPrenomSocAg').closest('.form-group').addClass('has-success');
                } // /else


                /*if (totals == 0 || totals <= 0) {
                    $('#quantity33').closest('.form-group').addClass('has-error');
                    $('#quantity34').closest('.form-group').addClass('has-error');
                    $('#quantity35').closest('.form-group').addClass('has-error');
                    $("#quantity35").after('<p class="text-danger text-center"> Au moins 1 produit doit être ajouté </p>');
                    $("#createOrderBtn").button('reset');
                } else {
                    $('#quantity35').closest('.form-group').addClass('has-success');
                }

                if (Chaisesckek == 1 || Chaisesckek <= 1) {
                    $('#quantity40').closest('.form-group').addClass('has-error');
                    $('#quantity42').closest('.form-group').addClass('has-error');
                    $('#quantity43').closest('.form-group').addClass('has-error');
                    $("#quantity43").after('<p class="text-danger text-center"> Au moins 2 produits doit être ajouté </p>');
                    $("#createOrderBtn").button('reset');
                } else {
                    $('#quantity40').closest('.form-group').addClass('has-success');
                    $('#quantity42').closest('.form-group').addClass('has-success');
                    $('#quantity43').closest('.form-group').addClass('has-success');
                }


                if (quantite5 == 0) {
                    $('#quantity38').closest('.form-group').addClass('has-error');
                    $("#quantity38").after('<p class="text-danger text-center"> Au moins 1 qauntité doit être ajouté au produit Etagère Tidy-L </p>');


                } else {
                    $('#quantity38').closest('.form-group').addClass('has-success');
                }

                if (quantite6 <= 0) {
                    $('#quantity39').closest('.form-group').addClass('has-error');
                    $("#quantity39").after('<p class="text-danger text-center"> Au moins 1 qauntité doit être ajouté au produit Micro-ondes-Far </p>');


                } else {
                    $('#quantity39').closest('.form-group').addClass('has-success');
                }
                if (tables <= 0) {
                    $('#row36').closest('.36').addClass('has-error');
                    $('#row37').closest('.37').addClass('has-error');
                    $('#quantity36').closest('.form-group').addClass('has-error');
                    $('#quantity37').closest('.form-group').addClass('has-error');
                    $("#quantity37").after('<p class="text-danger text-center"> Au moins 1 produit doit être ajouté (Famille Table) </p>');
                } else {
                    $('#quantity36').closest('.form-group').addClass('has-success');
                    $('#quantity37').closest('.form-group').addClass('has-success');
                }

                if (quantite8 == 0) {
                    $('#quantity45').closest('.form-group').addClass('has-error');
                    $("#quantity45").after('<p class="text-danger text-center"> Au moins 1 qauntité doit être ajouté au produit Plaque électrique 1 foyer </p>');
                } else {
                    $('#quantity45').closest('.form-group').addClass('has-success');
                }

                if (quantite9 == 0) {
                    $('#quantity46').closest('.form-group').addClass('has-error');
                    $("#quantity46").after('<p class="text-danger text-center"> Au moins 1 qauntité doit être ajouté au produit Lampadaire Vigo </p>');

                } else {
                    $('#quantity46').closest('.form-group').addClass('has-success');
                }


                if (refrigerateur <= 0) {
                    $('#quantity47').closest('.form-group').addClass('has-error');
                    $('#quantity48').closest('.form-group').addClass('has-error');
                    $("#quantity48").after('<p class="text-danger text-center"> Au moins 1 qauntité doit être ajouté (famille refrigérateur) </p>');

                } else {
                    $('#quantity47').closest('.form-group').addClass('has-success');
                    $('#quantity48').closest('.form-group').addClass('has-success');
                }

                if (quantite11 == 0) {
                    $('#quantity49').closest('.form-group').addClass('has-error');
                    $("#quantity49").after('<p class="text-danger text-center"> Au moins 1 qauntité doit être ajouté au produit (Vaisselle pack 6 personnes) </p>');
                    $("#createOrderBtn").button('reset');
                } else {
                    $('#quantity49').closest('.form-group').addClass('has-success');
                }

                if (quantite12 == 0) {
                    $('#quantity50').closest('.form-group').addClass('has-error');
                    $("#quantity50").after('<p class="text-danger text-center"> Au moins 1 qauntité doit être ajouté au produit () Casserole et ustensile 11 piéces )</p>');
                    $("#createOrderBtn").button('reset');
                } else {
                    $('#quantity50').closest('.form-group').addClass('has-success');
                }

                if (quantite13 == 0) {
                    $('#quantity51').closest('.form-group').addClass('has-error');
                    $("#quantity51").after('<p class="text-danger text-center"> Au moins 1 qauntité doit être ajouté au (produit Kit ménage)</p>');
                    $("#createOrderBtn").button('reset');
                } else {
                    $('#quantity51').closest('.form-group').addClass('has-success');
                }

                if (quantite14 == 0) {
                    $('#quantity52').closest('.form-group').addClass('has-error');
                    $("#quantity52").after('<p class="text-danger text-center"> Au moins 1 qauntité doit être ajouté au produit Meuble de cuisine Hector</p>');
                  
                    $("#createOrderBtn").button('reset');
                } else {
                    $('#quantity52').closest('.form-group').addClass('has-success');
                }*/

                if (orderDate == "") {
                    $("#orderDate").after('<p class="text-danger"> Date de facture obligatoire </p>');
                    $('#orderDate').closest('.form-group').addClass('has-error');
                    $("#createOrderBtn").button('reset');
                } else {
                    $('#orderDate').closest('.form-group').addClass('has-success');
                } // /else


                if (datelivraison == "") {
                    $("#datelivraison").after('<p class="text-danger"> la date de livraison est obligatoire </p>');
                    $('#datelivraison').closest('.form-group').addClass('has-error');
                    $("#createOrderBtn").button('reset');
                } else {
                    $('#datelivraison').closest('.form-group').addClass('has-success');
                } // /else*/

                if (NomPrenomLivraison == "") {
                    $("#NomPrenomLivraison").after('<p class="text-danger"> Le Nom et prénom du  client est obligatoire </p>');
                    $('#NomPrenomLivraison').closest('.form-group').addClass('has-error');
                    $("#createOrderBtn").button('reset');
                } else {
                    $('#NomPrenomLivraison').closest('.form-group').addClass('has-success');

                } // /else*/

                if (user_input_autocomplete_address == "") {
                    $("#user_input_autocomplete_address").after('<p class="text-danger"> Adresse de livraison est obligatoire </p>');
                    $('#user_input_autocomplete_address').closest('.form-group').addClass('has-error');
                    $("#createOrderBtn").button('reset');
                } else {
                    $('#user_input_autocomplete_address').closest('.form-group').addClass('has-success');
                } // /else*/

                if (TelephoneClient == "") {
                    $("#TelephoneClient").after('<p class="text-danger"> Le numero de télephone du client obligatoire </p>');
                    $('#TelephoneClient').closest('.form-group').addClass('has-error');
                } else {
                    $('#TelephoneClient').closest('.form-group').addClass('has-success');
                } // /else*/

                if (EmailClient == "") {
                    $("#EmailClient").after('<p class="text-danger"> Adresse e-mail du client est obligatoire </p>');
                    $('#EmailClient').closest('.form-group').addClass('has-error');
                    $("#createOrderBtn").button('reset');
                } else {
                    $('#EmailClient').closest('.form-group').addClass('has-success');
                    //$('.DernierChamp').html('<p class="text-danger"> Le dernier champ est obligatoire , Veuillez ajouter au moins  une valeur 0  ou plus </p>');

                } // /else*/

                // données classe ou fammille
                var idclasse=document.getElementsByName('idclasse[]');
                var classe=document.getElementsByName('classe[]');
                var valeurmin=document.getElementsByName('valeurmin[]');
               //données produits
               var id=document.getElementsByName('id[]');
               var name=document.getElementsByName('name[]');
               var quantity=document.getElementsByName('quantity[]');
               var data =[];
               var roduits =[];
              
               
               for (var x = 0; x<idclasse.length; x++) {
                    var idclasseID=idclasse[x].value;
                    var classeID= classe[x].value;
                    var valeurminID =valeurmin[x].value;

                    var idID =id[x].value;
                    var nameID =name[x].value;
                    var quantityID =quantity[x].value;


                    produits.push(
                        {
                            id: idID,
                            nom:nameID,
                            value:quantityID
                        }
                    )

                         data.push(
                            { id: idclasseID,
                                  classe: classeID, 
                                  minimum: valeurminID,
                                   produits:produits
                            }
                                
                             )

                             
                          }

            console.log(data);

            localStorage.setItem('data',JSON.stringify(data))

           /* data.map((item,Key)=>{
                 console.log(item.classe);
                 console.log(item.minimum);
                 console.log(item.nom);
                 /*if(item.classe==item.classe){
                   
                     total+=item.value;
                    
                }
               
            })
/*

            const data=JSON.parse(localStorage.getItem('data'));

           // console.log(datas);

           /*data.map((item)=>{
                   
                    if(item.classe===item.classe){
                        console.log(item.value);
                         total+=item.value;
                        
                    }
                });*/

            

       
           

           /* localStorage.setItem('data',JSON.stringify(data))

            data.map((item,Key)=>{
                 //console.log(item.classe)

                 
            })

           
               


            /*data.map((item,Key)=>{
                //console.log(item.classe)
                form_data=[...form_data.filter(obj=>obj.item.classe!==item.classe || obj.item.produit!==item.produit), {
                    classe:classe,
                    produit:produit,
                    value:isNaN(parseInt(value))?0:parseInt(value),
                    minimum:parseInt(minimum)
                  }]
                  //$(`#${classe}`).html(getErros({classe:classe, produit:produit, minimum:parseInt(minimum)}))
                  console.log(form_data) 
           })*/
            

             /* form_data=[...form_data.filter(obj=>obj.classe!==classe || obj.produit!==produit), {
                classe:classe,
                produit:produit,
                value:isNaN(parseInt(value))?0:parseInt(value),
                minimum:parseInt(minimum)
              }]
              //$(`#${classe}`).html(getErros({classe:classe, produit:produit, minimum:parseInt(minimum)}))
              console.log(form_data) 



            /*var errors={

            }
            //var form_data=[]

        
            /*localStorage.setItem('data',JSON.stringify(data));
            const datas=JSON.parse(localStorage.getItem('data'));
            datas.map((item)=>{
                console.log(item.classe);
                //console.log(item.minimum);
              // $(`#${item.classe}`).html(getErros(item))
               })
            

            
            const getErros=(item)=>{
    
                return getTotal(item.classe)<parseInt(item.minimum)?`La quantite minimal n'est pas respecte pour la famille de produit ${item.classe}`:``
            }

           
            //console.log(item.minimum);
            /*var value=item.qte;

            console.log(value);*/

            /*const handleChange=(item)=>{

                  form_data=[...form_data.filter(obj=>obj.classe!==classe || obj.produit!==produit), {
                  classe:classe,
                  produit:produit,
                  value:isNaN(parseInt(value))?0:parseInt(value),
                  minimum:parseInt(minimum)
                }]
                //$(`#${classe}`).html(getErros({classe:classe, produit:produit, minimum:parseInt(minimum)}))
                console.log(form_data)    
            }
            
              //$(`#${classe}`).html(getErros({classe:classe, produit:produit, minimum:parseInt(minimum)}))
              //console.log(form_data)  

            /*for (var i = 0; i < datas.length; i++) {
                console.log(datas[i]['name']);
            }

              //;


               
               // console.log(datas);
              // console.log(data);
            
               /* var validateFamily;
                for (var x = 0; x<(idfamilyproduit.length && idfamily.length && check.length && quantitys.length); x++ ) {
                    var idfamilyproduitId = idfamilyproduit[x].value;
                    var idfamilyId = idfamily[x].value;
                    var checkId = check[x].value;
                    var quantitysId = quantitys[x].value;
                    if (idfamilyproduit[x].value==idfamily[x].value) {
                        if(jQuery.inArray(idfamilyproduitId,idfamilyId)) {
                            console.log("Yes");
                            console.log(idfamilyproduitId);
                        } else {
                            console.log("is not yes");
                            console.log(idfamilyproduitId);
                        }


                        //
                     /* var pro=idfamilyproduitId;
                      var qte =quantitysId;
                      var i;
                      for (i = 0; i < pro.length &&  qte.length; i++) {
                        calpro= pro[i];
                        qte+= qte;
                       
                        
                      }
                      //console.log(total);
                      //console.log(qte);
                     
                        /* if(idfamilyId==idfamilyproduitId)
                         {
                           if(checkId>quantitysId)  
                           {
                            $('.quantity').each(function()
                            {
                             if(!isNaN(checkId+quantitysId) && idfamilyId==idfamilyproduitId)
                               {
                                sum+=parseFloat(checkId+quantitysId);
                                
                               }
                               
                                $("#" + checkId + "").after('<p class="text-danger"> Oops oklm!! </p>');
                                $("#" + checkId+ "").closest('.form-group').addClass('has-error');  
                            });

                             //console.log(sum);
                           }
                           else{
                            $("#" + checkId + "").after('<p class="text-danger"> Ops!! </p>');
                            $("#" + checkId+ "").closest('.form-group').addClass('has-error');  
                           }
                         }
                    } else {
                        validateFamily = true;
                        $("#" + checkId + "").closest('.form-group').addClass('has-success');
                    }
                }
        }*/

                
                // array validation
                var productName = document.getElementsByName('productName[]');
                var validateProduct;
                for (var x = 0; x < productName.length; x++) {
                    var productNameId = productName[x].id;
                    if (productName[x].value == '') {
                        $("#" + productNameId + "").after('<p class="text-danger"> Nom produit obligatoire!! </p>');
                        $("#" + productNameId + "").closest('.form-group').addClass('has-error');
                        
                    } else {
                        $("#" + productNameId + "").closest('.form-group').addClass('has-success');
                    }
                } // for

                for (var x = 0; x < productName.length; x++) {
                    if (productName[x].value) {
                        validateProduct = true;
                    } else {
                        validateProduct = false;
                    }
                } // for 

                var quantity = document.getElementsByName('quantity[]');
                var validateQuantity;
                for (var x = 0; x < quantity.length; x++) {
                    var quantityId = quantity[x].id;
                    if (quantity[x].value<= 0) {
                        $("#" + quantityId + "").after('<p class="text-danger"> Champ obligatoire!! </p>');
                        $("#" + quantityId + "").closest('.form-group').addClass('has-error');
                    } else {
                        $("#" + quantityId + "").closest('.form-group').addClass('has-success');
                    }
                }

                for (var x = 0; x < quantity.length; x++) {
                    if (quantity[x].value) {
                        validateQuantity = true;
                    } else {
                        validateQuantity = false;
                    }
                } //end for

               
                if (packs && EmailClient && TelephoneClient && NomPrenomLivraison && datelivraison && EmailAgent && TelephoneAgent && NomPrenomAgent && TelephoneFixe && AdresseSociete && orderDate && NomPrenomLivraison && user_input_autocomplete_address && NumeroMgAgent ) {
                     
                    if (validateProduct = true && validateQuantity == true) {
                        $("#createOrderBtn").button('loading');

                        $.ajax({
                            url: form.attr('action'),
                            type: form.attr('method'),
                            data: form.serialize(),
                            dataType: 'json',
                            success: function(response) {
                                    console.log(response);
                                    // reset button
                                    $("#createOrderBtn").button('reset');

                                    $(".text-danger").remove();
                                    $('.form-group').removeClass('has-error').removeClass('has-success');

                                    if (response.success == true) {

                                        // create order button
                                        $(".success-messages").html('<div class="alert alert-success">' +
                                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                                            ' <br /> <br /> <a type="button" href="view_order.php?pdf=1&order_id=' + response.order_id + '" target="_blank" class="btn btn-primary"> <i class="glyphicon glyphicon-print"></i> Imprimer </a>' +
                                            '<a href="?boncommande=facture&o=add" class="btn btn-default" style="margin-left:10px;"> <i class="glyphicon glyphicon-plus-sign"></i> Ajouter un nouveau bon de commande </a>' +

                                            '</div>');

                                        $("html, body, div.panel, div.pane-body").animate({ scrollTop: '0px' }, 100);

                                        // disabled te modal footer button
                                        $(".submitButtonFooter").addClass('div-hide');
                                        // remove the product row
                                        $(".removeProductRowBtn").addClass('div-hide');

                                    } else {
                                        alert(response.messages);
                                    }
                                } // /response
                        }); // /ajax
                    } // if array validate is true
                }

                return false;

            }); // /create order form function	
        }); // /create order form function	

    } else if (divRequest == 'manord') {
        // top nav child bar 
        $('#topNavManageOrder').addClass('active');

        manageOrderTable = $("#manageOrderTable").DataTable({
            'ajax': 'php_action/fetchOrder.php',
            'order': []
        });

    } else if (divRequest == 'editOrd') {
        $("#orderDate").datepicker();

        // edit order form function
        $("#editOrderForm").unbind('submit').bind('submit', function() {
            // alert('ok');
            var form = $(this);

            $('.form-group').removeClass('has-error').removeClass('has-success');
            $('.text-danger').remove();

            var orderDate = $("#orderDate").val();
            var clientName = $("#clientName").val();
            var clientContact = $("#clientContact").val();
            var paid = $("#paid").val();
            var discount = $("#discount").val();
            var paymentType = $("#paymentType").val();
            var paymentStatus = $("#paymentStatus").val();

            // form validation 
            if (orderDate == "") {
                $("#orderDate").after('<p class="text-danger"> Date de facture obligatoire </p>');
                $('#orderDate').closest('.form-group').addClass('has-error');
            } else {
                $('#orderDate').closest('.form-group').addClass('has-success');
            } // /else

            if (clientName == "") {
                $("#clientName").after('<p class="text-danger"> Nom client obligatoire </p>');
                $('#clientName').closest('.form-group').addClass('has-error');
            } else {
                $('#clientName').closest('.form-group').addClass('has-success');
            } // /else

            if (clientContact == "") {
                $("#clientContact").after('<p class="text-danger"> Contact client obligatoire </p>');
                $('#clientContact').closest('.form-group').addClass('has-error');
            } else {
                $('#clientContact').closest('.form-group').addClass('has-success');
            } // /else

            if (paid == "") {
                $("#paid").after('<p class="text-danger"> Champ obligatoire </p>');
                $('#paid').closest('.form-group').addClass('has-error');
            } else {
                $('#paid').closest('.form-group').addClass('has-success');
            } // /else

            if (discount == "") {
                $("#discount").after('<p class="text-danger"> Champ remise obligatoire </p>');
                $('#discount').closest('.form-group').addClass('has-error');
            } else {
                $('#discount').closest('.form-group').addClass('has-success');
            } // /else

            if (paymentType == "") {
                $("#paymentType").after('<p class="text-danger"> Type paiement obligatoire </p>');
                $('#paymentType').closest('.form-group').addClass('has-error');
            } else {
                $('#paymentType').closest('.form-group').addClass('has-success');
            } // /else

            if (paymentStatus == "") {
                $("#paymentStatus").after('<p class="text-danger"> Statut paiement obligatoire </p>');
                $('#paymentStatus').closest('.form-group').addClass('has-error');
            } else {
                $('#paymentStatus').closest('.form-group').addClass('has-success');
            } // /else


            // array validation
            var productName = document.getElementsByName('productName[]');
            var validateProduct;
            for (var x = 0; x < productName.length; x++) {
                var productNameId = productName[x].id;
                if (productName[x].value == '') {
                    $("#" + productNameId + "").after('<p class="text-danger"> Nom produit obligatoire!! </p>');
                    $("#" + productNameId + "").closest('.form-group').addClass('has-error');
                } else {
                    $("#" + productNameId + "").closest('.form-group').addClass('has-success');
                }
            } // for

            for (var x = 0; x < productName.length; x++) {
                if (productName[x].value) {
                    validateProduct = true;
                } else {
                    validateProduct = false;
                }
            } // for       		   	

            var quantity = document.getElementsByName('quantity[]');
            var validateQuantity;
            for (var x = 0; x < quantity.length; x++) {
                var quantityId = quantity[x].id;
                if (quantity[x].value == '') {
                    $("#" + quantityId + "").after('<p class="text-danger"> Nom produit obligatoire!! </p>');
                    $("#" + quantityId + "").closest('.form-group').addClass('has-error');
                } else {
                    $("#" + quantityId + "").closest('.form-group').addClass('has-success');
                }
            } // for

            for (var x = 0; x < quantity.length; x++) {
                if (quantity[x].value) {
                    validateQuantity = true;
                } else {
                    validateQuantity = false;
                }
            } // for       	


            if (orderDate && clientName && clientContact && paid && discount && paymentType && paymentStatus) {
                if (validateProduct == true && validateQuantity == true) {

                    // create order button
                    $("#createOrderBtn").button('loading');

                    $.ajax({
                        url: form.attr('action'),
                        type: form.attr('method'),
                        data: form.serialize(),
                        dataType: 'json',
                        success: function(response) {
                                console.log(response);
                                // reset button
                                $("#editOrderBtn").button('reset');

                                $(".text-danger").remove();
                                $('.form-group').removeClass('has-error').removeClass('has-success');
                                if (response.success == true) {

                                    // create order button
                                    $(".success-messages").html('<div class="alert alert-success">' +
                                        '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                        '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                                        '</div>');

                                    $("html, body, div.panel, div.pane-body").animate({ scrollTop: '0px' }, 100);

                                    // disabled te modal footer button
                                    $(".editButtonFooter").addClass('div-hide');
                                    // remove the product row
                                    $(".removeProductRowBtn").addClass('div-hide');

                                } else {
                                    alert(response.messages);
                                }
                            } // /response
                    }); // /ajax
                } // if array validate is true
            } // /if field validate is true


            return false;
        }); // /edit order form function	
    }

}); // /documernt


// print order function
function printOrder(orderId = null) {
    if (orderId) {

        $.ajax({
            url: 'php_action/printOrder.php',
            type: 'post',
            data: { orderId: orderId },
            dataType: 'text',
            success: function(response) {

                    var mywindow = window.open('', 'LAV', 'height=1000,width=900');
                    mywindow.document.write('<html><head><title>OK</title>');
                    mywindow.document.write('</head><body>');
                    mywindow.document.write(response);
                    mywindow.document.write('</body></html>');

                    mywindow.document.close(); // necessary for IE >= 10
                    mywindow.focus(); // necessary for IE >= 10

                    mywindow.print();
                    mywindow.close();

                } // /success function
        }); // /ajax function to fetch the printable order
    } // /if orderId
} // /print order function

function addRow() {
    $("#addRowBtn").button("loading");

    var tableLength = $("#productTable tbody tr").length;

    var tableRow;
    var arrayNumber;
    var count;

    if (tableLength > 0) {
        tableRow = $("#productTable tbody tr:last").attr('id');
        arrayNumber = $("#productTable tbody tr:last").attr('class');
        count = tableRow.substring(3);
        count = Number(count) + 1;
        arrayNumber = Number(arrayNumber) + 1;
    } else {
        // no table row
        count = 1;
        arrayNumber = 0;
    }

    $.ajax({
        url: 'php_action/fetchProductData.php',
        type: 'post',
        dataType: 'json',
        success: function(response) {
                $("#addRowBtn").button("reset");

                var tr = '<tr id="row' + count + '" class="' + arrayNumber + '">' +
                    '<td>' +
                    '<div class="form-group">' +

                    '<select class="form-control" name="productName[]" id="productName' + count + '" onchange="getProductData(' + count + ')" >' +
                    '<option value="">---- Choisir ----</option>';
                // console.log(response);
                $.each(response, function(index, value) {
                    tr += '<option value="' + value[0] + '">' + value[1] + '</option>';
                });

                tr += '</select>' +
                    '</div>' +
                    '</td>' +
                    '<td style="padding-left:20px;"">' +
                    '<input type="text" name="rate[]" id="rate' + count + '" autocomplete="off" disabled="true" class="form-control" />' +
                    '<input type="hidden" name="rateValue[]" id="rateValue' + count + '" autocomplete="off" class="form-control" />' +
                    '</td style="padding-left:20px;">' +
                    '<td style="padding-left:20px;">' +
                    '<div class="form-group">' +
                    '<input type="number" name="quantity[]" id="quantity' + count + '" onkeyup="getTotal(' + count + ')" autocomplete="off" class="form-control" min="1" />' +
                    '</div>' +
                    '</td>' +
                    '<td style="padding-left:20px;">' +
                    '<input type="text" name="total[]" id="total' + count + '" autocomplete="off" class="form-control" disabled="true" />' +
                    '<input type="hidden" name="totalValue[]" id="totalValue' + count + '" autocomplete="off" class="form-control" />' +
                    '</td>' +
                    '<td>' +
                    '<button class="btn btn-default removeProductRowBtn" type="button" onclick="removeProductRow(' + count + ')"><i class="glyphicon glyphicon-trash"></i></button>' +
                    '</td>' +
                    '</tr>';
                if (tableLength > 0) {
                    $("#productTable tbody tr:last").after(tr);
                } else {
                    $("#productTable tbody").append(tr);
                }

            } // /success
    }); // get the product data

} // /add row

function removeProductRow(row = null) {
    if (row) {
        $("#row" + row).remove();

        subAmount();
    } else {
        alert('error! Refresh the page again');
    }
}

// Controle aprés avoir cocher un champ
function getProductData(row = null) {
    if (row) {
        var productId = $("#productName" + row).val();

        if (productId == "") {
            $("#rate" + row).val("");

            $(".quantity" + row).val("");
            $("#total" + row).val("");


        } else {
            $.ajax({
                url: 'php_action/fetchSelectedProduct.php',
                type: 'post',
                data: { productId: productId },
                dataType: 'json',
                success: function(response) {
                        // setting the rate value into the rate input field

                        $("#rate" + row).val(response.rate);
                        $("#rateValue" + row).val(response.rate);

                        $(".quantity" + row).val(1);

                        var total = Number(response.rate) * 1;
                        total = total.toFixed(2);
                        $("#total" + row).val(total);
                        $("#totalValue" + row).val(total);



                        subAmount();
                    } // /success
            }); // /ajax function to fetch the product data	
        }

    } else {
        alert('no row! please refresh the page');
    }
} // /select on product data

// table total
function getTotal(row = null) {

     $cod= Number($(".quantity" + row).val());
     console.log($cod);
    if (row) {
         
        var total = Number($("#rate" + row).val()) * Number($(".quantity" + row).val());
        
        total = total.toFixed(2);
        $("#total" + row).val(total);
        $("#totalValue" + row).val(total);
        subAmount();

    } else {
        alert('Hello , j ai u, probleme');
    }
}

function subAmount() {
    var tableProductLength = $("#productTable tbody tr").length;

    var totalSubAmount = 0;
    for (x = 0; x < tableProductLength; x++) {
        var tr = $("#productTable tbody tr")[x];
        var count = $(tr).attr('id');
        count = count.substring(3);

        totalSubAmount = Number(totalSubAmount) + Number($("#total" + count).val());

    } // /for

    totalSubAmount = totalSubAmount.toFixed(2);

    // sub total
    $("#subTotal").val(totalSubAmount);
    $("#subTotalValue").val(totalSubAmount);

    // vat
    var vat = (Number($("#subTotal").val()) / 100) * 20;
    vat = vat.toFixed(2);
    $("#vat").val(vat);
    $("#vatValue").val(vat);

    // total amount
    var totalAmount = (Number($("#subTotal").val()) + Number($("#vat").val()));
    totalAmount = totalAmount.toFixed(2);
    $("#totalAmount").val(totalAmount);
    $("#totalAmountValue").val(totalAmount);

   

} // /sub total amount



function resetOrderForm() {
    // reset the input field
    $("#createOrderForm")[0].reset();
    // remove remove text danger
    $(".text-danger").remove();
    // remove form group error 
    $(".form-group").removeClass('has-success').removeClass('has-error');
} // /reset order form


// remove order from server
function removeOrder(orderId = null) {
    if (orderId) {
        $("#removeOrderBtn").unbind('click').bind('click', function() {
            $("#removeOrderBtn").button('loading');

            $.ajax({
                url: 'php_action/removeOrder.php',
                type: 'post',
                data: { orderId: orderId },
                dataType: 'json',
                success: function(response) {
                        $("#removeOrderBtn").button('reset');

                        if (response.success == true) {

                            manageOrderTable.ajax.reload(null, false);
                            // hide modal
                            $("#removeOrderModal").modal('hide');
                            // success messages
                            $("#success-messages").html('<div class="alert alert-success">' +
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
                            // error messages
                            $(".removeOrderMessages").html('<div class="alert alert-warning">' +
                                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                                '</div>');

                            // remove the mesages
                            $(".alert-success").delay(500).show(10, function() {
                                $(this).delay(3000).hide(10, function() {
                                    $(this).remove();
                                });
                            }); // /.alert	          
                        } // /else

                    } // /success
            }); // /ajax function to remove the order

        }); // /remove order button clicked


    } else {
        alert('error! refresh the page again');
    }
}
// /remove order from server

// Payment ORDER
/*function paymentOrder(orderId = null) {
    if (orderId) {

        $("#orderDate").datepicker();

        $.ajax({
            url: 'php_action/fetchOrderData.php',
            type: 'post',
            data: { orderId: orderId },
            dataType: 'json',
            success: function(response) {

                    // due 
                    $("#due").val(response.order[10]);

                    // pay amount 
                    $("#payAmount").val(response.order[10]);

                    var paidAmount = response.order[9]
                    var dueAmount = response.order[10];
                    var grandTotal = response.order[8];

                    // update payment
                    $("#updatePaymentOrderBtn").unbind('click').bind('click', function() {
                        var payAmount = $("#payAmount").val();
                        var paymentType = $("#paymentType").val();
                        var paymentStatus = $("#paymentStatus").val();

                        if (payAmount == "") {
                            $("#payAmount").after('<p class="text-danger">Champ obligatoire</p>');
                            $("#payAmount").closest('.form-group').addClass('has-error');
                        } else {
                            $("#payAmount").closest('.form-group').addClass('has-success');
                        }

                        if (paymentType == "") {
                            $("#paymentType").after('<p class="text-danger">Champ obligatoire</p>');
                            $("#paymentType").closest('.form-group').addClass('has-error');
                        } else {
                            $("#paymentType").closest('.form-group').addClass('has-success');
                        }

                        if (paymentStatus == "") {
                            $("#paymentStatus").after('<p class="text-danger">Champ obligatoire</p>');
                            $("#paymentStatus").closest('.form-group').addClass('has-error');
                        } else {
                            $("#paymentStatus").closest('.form-group').addClass('has-success');
                        }

                        if (payAmount && paymentType && paymentStatus) {
                            $("#updatePaymentOrderBtn").button('loading');
                            $.ajax({
                                url: 'php_action/editPayment.php',
                                type: 'post',
                                data: {
                                    orderId: orderId,
                                    payAmount: payAmount,
                                    paymentType: paymentType,
                                    paymentStatus: paymentStatus,
                                    paidAmount: paidAmount,
                                    grandTotal: grandTotal
                                },
                                dataType: 'json',
                                success: function(response) {
                                        $("#updatePaymentOrderBtn").button('loading');

                                        // remove error
                                        $('.text-danger').remove();
                                        $('.form-group').removeClass('has-error').removeClass('has-success');

                                        $("#paymentOrderModal").modal('hide');

                                        $("#success-messages").html('<div class="alert alert-success">' +
                                            '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                                            '</div>');

                                        // remove the mesages
                                        $(".alert-success").delay(500).show(10, function() {
                                            $(this).delay(3000).hide(10, function() {
                                                $(this).remove();
                                            });
                                        }); // /.alert	

                                        // refresh the manage order table
                                        manageOrderTable.ajax.reload(null, false);

                                    } //

                            });
                        } // /if

                        return false;
                    }); // /update payment			

                } // /success
        }); // fetch order data
    } else {
        alert('Error ! Refresh the page again');
    }
}*/