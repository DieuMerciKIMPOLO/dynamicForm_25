var errors = {

}
var form_data = []
const getTotals = (classe) => {
    let total = 0;
    form_data.map((item) => {
        if (item.classe === classe) {
            return total += item.value
        }
    });
    return total
}
const getErros = (item) => {

    return getTotals(item.classe) < parseInt(item.minimum) ? `La quantite minimal n'est pas respecte pour la famille de  ${item.classe} qui est de ${item.minimum}` : ``
}
const handleChange = (classe, produit, value, minimum) => {

    form_data = [...form_data.filter(obj => obj.classe !== classe || obj.produit !== produit), {
            classe: classe,
            produit: produit,
            value: isNaN(parseInt(value)) ? 0 : parseInt(value),
            minimum: parseInt(minimum)
        }]
        //$(`#${classe}`).html(getErros({classe:classe, produit:produit, minimum:parseInt(minimum)}))
        //console.log(value)
        //console.log(form_data)    
}

const handleSubmit = () => {
    const datas = JSON.parse(localStorage.getItem('dataz'));
    // console.log(datas);
    datas.map((item) => {
        $(`#${item.classe}`).html(getErros(item))
    })
}

$(document).ready(function() {

    var datas = [];
    $(function() { // ready
        $("#packs").change(function() {
            var sVal = $(this).val();

            if (sVal !== "NA") {
                $.getJSON('dada.php', { catid: $(this).val() }, function(data) {
                    //console.log(data);
                    let is_selected = []
                    $.each(data, function(key, val) { // pour chaque entrée du tableau
                        if (is_selected.filter(obj => obj === val.categories_id).length === 0) {
                            var produits = [];
                            data.filter(obj => obj.categories_id === val.categories_id).map((item) => {
                                produits.push({
                                    id: item.product_id,
                                    nom: item.product_name,
                                    prix: item.rate,
                                    value: item.quantity
                                })
                            });

                            datas.push({
                                id: val.categories_id,
                                classe: val.categories_name,
                                minimum: val.QteCheck,
                                produits: produits
                            });
                            is_selected.push(val.categories_id)
                        }
                    });



                });
            }
        });
    });

    //console.log(datas);

    var dataz = [{
            id: 1,
            classe: "LITTERIE",
            minimum: 2,
            produits: [{
                    id: 1,
                    nom: "S1",
                    prix: "12",
                    value: 0
                },
                {
                    id: 2,
                    nom: "S2",
                    prix: "12",
                    value: 0
                },
                {
                    id: 3,
                    nom: "S3",
                    prix: "12",
                    value: 0
                }
            ]
        },
        {
            id: 2,
            classe: "REFRIGERATEUR",
            minimum: 1,
            produits: [{
                    id: 4,
                    nom: "S1",
                    prix: "12",
                    value: 0
                },
                {
                    id: 5,
                    nom: "S2",
                    prix: "12",
                    value: 0
                },
                {
                    id: 6,
                    nom: "S3",
                    prix: "12",
                    value: 0
                }
            ]
        },
        {
            id: 3,
            classe: "MICRO-ONDES",
            minimum: 3,
            produits: [{
                    id: 7,
                    nom: "S1",
                    prix: "12",
                    value: 0
                },
                {
                    id: 8,
                    nom: "S2",
                    prix: "12",
                    value: 0
                },
                {
                    id: 9,
                    nom: "S3",
                    prix: "12",
                    value: 0
                }
            ]
        }
    ]

    localStorage.setItem('dataz', JSON.stringify(dataz))

    var section = "" // Permet de generer une section, une classe
        // cette boucle permet de parcourir toutes les classes




    JSON.parse(localStorage.getItem('dataz')).map((item, Key) => {


        var sect_1 = `
        <table class="table table-striped table-bordered table-hover dataTables-example" id="productTable">
		<thead>
			<tr>			  			
				<th >Produit</th>
				<th >Prix HT</th>
				<th >Quantité</th>			  			
				<th>Total</th>			  			
			</tr>
		</thead>
		<tbody>
        <div class='row section'> 
                        <b class='col-lg-12'>  ${item.classe}</b>
                        <div class="col-md-12">
						
	
                   `;
        //Cette boucle permet de parcourir les produit de la classe courante
        item.produits.map((elt, key) => {
            //Ici nous construisons pour chaque produit un champs et la fonction handleChange nous permet 
            //de detecter la saisie dans les champs
            sect_1 += `
            <tr  id="row${elt.id}" class="${elt.id}">
            <td> ${elt.nom} <input type="hidden" name="productName[]" value=${elt.id} id="productName${elt.id}"  class="form-control"/> </td>			
            
            <td style="padding-left:20px;">			  					
			  				 <input type="text" name="rate[]"  id="rate${elt.id}" value="${elt.prix}" autocomplete="off" disabled="true" class="form-control"/>			  								  					
							 <input type="hidden" name="rateValue[]" id="rateValue${elt.id}" autocomplete="off" class="form-control" />	  
			</td>
            
            <td style="padding-left:20px;"> 
            <div class="form-group">
            <input type=${item.minimum} name=${item.classe} name="quantity[]" id=${elt.nom}   onkeydown="handleChange(this.name,this.id,this.value,this.type)"  onkeyup ="getTotal(${elt.id})"  class="form-control quantity${elt.id}"  aria-describedby="helpId">
            </div>
            </td>
            <td>			  					
				<input type="text" name="total[]" id="total${elt.id}" autocomplete="off" class="form-control" disabled="true" />			  					
			  	<input type="hidden" name="totalValue[]" id="totalValue${elt.id}" autocomplete="off" class="form-control" />
			</td>
             </tr>
                <small id="helpId" class="text-muted"></small>
          </div>
            `
        })
        sect_1 += `</tbody></table>
        <div class="text-center">
           <small id=${item.classe} style="color:red;font-size:16;text-align:center;" class="text-muted"></small> 
        </div>
        </div>
        </div>
        `;
        section += sect_1;
    })
    section += `
    <button onclick="handleSubmit()" type="button" value="Vérification" class="btn btn-primary">Vérification </button>
    `
    $("#form").html(section);
    //console.log(section)
});