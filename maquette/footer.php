<?php
$user=getTableValues('users',array("user_id"=>$_SESSION['userId']));
if (!empty($user)) {
            foreach ($user as $key => $value) {
                $row=$value;
            }
   }
?>
<div class="footer">
            <div class="pull-right">
                Utilisateur Connecté: <strong> <?=$row['NomPrenomUser'];?> </strong>            </div>

                <strong> PARTENAIRE </strong> &copy; <?php echo $date=date('Y'); ?>
            </div>
        </div>
		
<!-- Mainly scripts -->
    <script src="assets/js/jquery-2.1.1.js"></script>
	
	<script>
       $(function() {
	  $('a[data-confirm]').click(function(ev) {
		    var href = $(this).attr('href');
		
		if (!$('#dataConfirmModal').length) {
			$('body').append('<div id="dataConfirmModal"  class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-dialog" style="text-align:center"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel" style="text-align:center;font-size:24px;font-family:Maiandra GD">DECONNEXION </h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Non</button><a class="btn btn-danger" id="dataConfirmOK">Oui</a></div></div></div></div>');
		}
		$('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
		$('#dataConfirmOK').attr('href', href);
		$('#dataConfirmModal').modal({show:true});
		
		return false;
	});
});
  </script>
