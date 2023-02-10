<!-- Scripts project -->
<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery-2.2.4.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
<!-- count -->
<script type="text/javascript" src='{{ asset('frontend/assets/js/jquery.countTo.js') }}'></script>
<!-- google maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBt5tJTim4lOO3ojbGARhPd1Z3O3CnE-C8" type="text/javascript"></script>
<!-- swiper -->
<script type="text/javascript" src="{{ asset('frontend/assets/js/idangerous.swiper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/equalHeightsPlugin.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap-datepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/jquery.datetimepicker.full.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script type="text/javascript" src="{{ asset('frontend/assets/js/bootstrap-select.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/assets/js/index.js') }}"></script>
<!-- sixth block end -->

<!-- Script -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#input-val22').datepicker({
            minDate: 0
        }); 
        $('#input-val24').datepicker({
            minDate: 0
        }); 
        $('#input-val13').datepicker({
            minDate: 0
        }); 
        $('#input-val15').datepicker({
            minDate: 0
        }); 
    });
</script>


{{-- Toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
    var jq = jQuery.noConflict();
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
    @if (Session::has('message'))
        var type="{{ Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
            break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
            break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
            break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
            break;
        }
    @endif
    // ssl Commerz
    (function (window, document) {
        var loader = function () {
            var script = document.createElement("script"), tag = document.getElementsByTagName("script")[0];
            script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
            tag.parentNode.insertBefore(script, tag);
        };
        window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
    })(window, document);
</script>


