<script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{ asset('backend/lib/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/element-in-view.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/slick.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/ajax-form.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/wow.min.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/plugins.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/main.js')}}"></script>
        <script src="{{ asset('frontend/assets/js/myValidation.js')}}"></script>
            <!-- TOASTER -->
 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <script>
    @if(Session::has('message'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
    toastr.options =
    {
      "closeButton" : true,
      "progressBar" : true
    }
        toastr.warning("{{ session('warning') }}");
    @endif
</script>
<script type="text/javascript">
          $(document).ready(function(){
            $('#myForm').validate({
              rules:{
                contact_name:{
                  required:true,
                },
                contact_email:{
                  required:true,
                },
                contact_number:{
                  required:true,
                },
                contact_message:{
                  required:true,
                },
              },
              messages:{
                contact_name:{
                  required:'PLEASE ENTER Contact Name',
                },
                contact_email:{
                  required:'PLEASE ENTER EMAIL',
                },
                contact_number:{
                  required:'PLEASE ENTER VALID NUMBER',
                },
                contact_message:{
                  required:'PLEASE ENTER Contact MESSAGE',
                },
              },
              errorElement:'span',
              errorPlacement:function(error,element){
                error.addClass('invalid-feedback');
                element.closest('.errormessage').append(error);
              },
              highlight:function(element,errorClass,validClass){
                $(element).addClass('is-invalid');
              },
              unhighlight:function(element,errorClass,validClass){
                $(element).removeClass('is-invalid');
              },
            });
          });
      </script>