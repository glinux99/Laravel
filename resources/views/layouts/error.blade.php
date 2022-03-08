<?php 

    class Error_code {

        public function error($error){
            if($error=='mail_exist'){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>ERREUR!!!</strong> l\'addresse que vous avez saisi a deja ete enregistre, choississez une autre ou connectez-vous.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
            }
        }
}
$inst = new Error_code();
echo ($inst->error($error));
?>
<script type="text/javascript">
$(document).ready(function () {
 
window.setTimeout(function() {
    $(".alert").fadeTo(1000, 0).slideUp(1000, function(){
        $(this).remove(); 
    });
}, 5000);
});
</script>