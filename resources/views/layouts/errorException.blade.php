<script>
    $(document).ready(function(){
        window.setTimeout(function(){
            $('.alert').fadeTo(10000,0).slideUp(7000, function(){
                $(this).remove();
            }, 5000);
        });
    })
</script>
<div class="mt-2 alert alert-dismissible fade show bg-success col-lg-5 mx-auto" role="alert">
    <strong>{{ __("Success!") }}</strong>
    {{__("Traitement effectue avec success")}} <br>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>