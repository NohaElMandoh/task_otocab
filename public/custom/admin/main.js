function showSwal(type, message, modal){
    //hide error
    $('.error').removeClass('n_hide text-white bg-secondary bg-secondary-errors alert');
    $('.error').addClass('hidden');
      $(modal).modal('hide');
    //change swal message
  
      Swal.fire({
          position: 'top-middle',
          type: type,
          title: message,
          showConfirmButton: false,
          timer: 2000
      })}
  
  