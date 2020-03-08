	<!-- sweet alert -->
    <script src="{{ asset('/custom/admin/vendor/sweetalert/js/sweetalert2.min.js') }}"></script>
	<script src="{{ asset('/custom/admin/main.js') }}"></script>

    
<script type="text/javascript">
		//token for ajax request
		$.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  },
		  
        });
      

	</script>
    @if(session('success'))
    <style type="text/css">
      .swal2-popup .swal2-content{
        display: none;
      }
    </style>
      <script>
      Swal.fire({
        position: 'top-middle',
        type: 'success',
        title: "{{session('success')}}",
        showConfirmButton: false,
        timer: 3500
      })
      </script>
	  @endif
	  