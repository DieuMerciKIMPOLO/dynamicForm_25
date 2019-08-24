<?php
       require_once 'core.php';
    
        IF($_SERVER['REQUEST_METHOD']== 'POST') {

		$dias=$_POST['brand_id'];
		?>

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
			<?php
        $productSql="SELECT product.product_name,product.product_id as product_id,product.rate as rate,categories.categories_id as categories_id ,product.categories_id as categorie ,categories.QteCheck,categories.categories_name, product.quantity as quantity  FROM product,categories  WHERE  product.categories_id=categories.categories_id and active=1 AND brand_id=$dias  ORDER BY product.categories_id ";
		$productData=$connect->query($productSql);
		if($productData->num_rows > 0) { 
        while($row = $productData->fetch_array()) {	
         ?>
         <tr id="row<?=$row['product_id']?>" class="<?=$row['product_id']?>">
								  				
			  				<td >
			  					<?=$row['product_name']?> 
								   <input type="hidden" name="productName[]" value="<?=$row['product_id']?>" id="productName<?=$row['product_id']?>"  class="form-control" />
								   
								   <input type=""       name="id[]" value="<?=$row['product_id']?>" id="id<?=$row['product_id']?>"  class="form-control" />
								   <input type=""       name="name[]" value="<?=$row['product_name']?>" id="classe<?=$row['product_name']?>"  class="form-control" />

								   <input type=""       name="idclasse[]" value="<?=$row['categories_id']?>" id="idclasse<?=$row['categories_id']?>"  class="form-control" />
								   <input type=""       name="classe[]" value="<?=$row['categories_name']?>" id="classe<?=$row['categories_name']?>"  class="form-control" />
								   <input type=""       name="valeurmin[]" value="<?=$row['QteCheck']?>" id="valeurmin<?=$row['QteCheck']?>"  class="form-control" />
			  				</td>
			  				<td style="padding-left:20px;">			  					
			  				 <input type="text" name="rate[]"  id="rate<?=$row['product_id']?>" value="<?=$row['rate']?>" autocomplete="off" disabled="true" class="form-control" />			  								  					
							 <input type="hidden" name="rateValue[]" id="rateValue<?=$row['product_id']?>" autocomplete="off" class="form-control" />	  
							</td>
 
			  				<td style="padding-left:20px;">
			  					<div class="form-group">
			  					<input type="text" name="quantity[]" id="quantity<?=$row['product_id']?>"  value="<?php if(!empty($row['categorie'])) { echo $row['categorie']; }?>" onkeyup="getTotal(<?=$row['product_id']?>)" autocomplete="off" class="form-control"  onkeypress="return ISNumber(event)"/>
								  
			  					</div>
			  				</td>
			  				<td>			  					
								<input type="text" name="total[]" id="total<?=$row['product_id']?>" autocomplete="off" class="form-control" disabled="true" />			  					
			  					<input type="hidden" name="totalValue[]" id="totalValue<?=$row['product_id']?>" autocomplete="off" class="form-control" />
			  				</td>
                          </tr>
						  <?php 
					} ?>

					 
				
				<?php } 
					else {
						echo ' <tr> <td colspan="4" style="text-align:center">
						<button  style="font-size:18px"type="button" class="btn btn-lg btn-danger">
						          Pas de produits disponible pour ce Park 
						   </button></td> </tr>';
					}?> 
					</tbody>				  	
					</table>
	  
<?php } ?>