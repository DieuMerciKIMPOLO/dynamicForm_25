var errors = {

}
var form_data = []
const getTotals = (classe) => {
    let total = 0;
    form_data.filter(obj=>obj.classe_id===classe.id).map((item) => {
        // console.log("Total####",item);
        total += item.value
    });
    // console.log("Total",classe,"#######",form_data.filter(obj=>obj.classe_id===classe.classe_id));
    return total
}
const getErros = (item) => {

    return getTotals(item) < parseInt(item.minimum) ? `Au moins 1 qauntité doit être ajouté à la famille ${item.classe} ` : ``
}
const handleChange = (classe, produit, valeur, minimum) => {
    // handleChange(this.name,this.id,this.value,this.type)
    console.log("##### FORMAT ERROR",produit)
    let dt=JSON.parse(produit);
    setTimeout(
        ()=>{
            console.log(valeur)
            form_data = [...form_data.filter(obj => obj.key !== dt.key), {
                    classe: classe,
                    key:dt.key,
                    classe_id:dt.id,
                    produit_id:dt.produit.id,
                    produit: dt.produit.nom,
                    value:Number($(".quantity" + dt.produit.id).val()),
                    minimum:dt.minimum
                }]
            console.log(form_data)          
        },300
    )
}

const handleSubmit = () => {
    const data = JSON.parse(localStorage.getItem('data'));
    console.log(data);
    let error=false;
    data.map((item) => {
        if(getTotals(item) < parseInt(item.minimum)){
            error=true
            console.log("Error true",item,"######",getTotals(item) < parseInt(item.minimum))
        }
        $(`#${item.id}`).html(getErros(item))
    })
    if(error===true){
        console.log("False submission",form_data);
    }else{
        console.log('True Okay!!!')
    }
}

$(document).ready(function() {
    $(function() { // ready
        $.getJSON('dada.php', function(data) {
            let donnees = [];
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
                    donnees.push({
                        id: val.categories_id,
                        classe: val.categories_name,
                        minimum: val.QteCheck,
                        produits: produits
                    });
                    is_selected.push(val.categories_id)
                }
            });
            localStorage.setItem('data', JSON.stringify(donnees))
            console.log("####", donnees)
        });

    });


    var section = "" // Permet de generer une section, une classe
        // cette boucle permet de parcourir toutes les classes
    JSON.parse(localStorage.getItem('data')).map((item, Key) => {
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
            <input type='number' name=${item.classe} name="quantity[]" value=''
                        id=${JSON.stringify({classe:item.classe.split(' ').join('_'),key:`${item.id}_${elt.id}`,id:item.id,minimum:parseInt(item.minimum),produit:elt})}   
                        onkeyup="handleChange(this.name,this.id,this.value,this.type)"  
                        onchange ="getTotal(${elt.id})"  
                        class="form-control quantity${elt.id}"  aria-describedby="helpId">
            
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
           <small id=${item.id} style="color:red;font-size:16;text-align:center;" class="text-muted"></small> 
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
    console.log(JSON.parse(localStorage.getItem('data')))
});