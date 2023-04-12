$(document).ready(function(){
  //Cargar el carro
  
  function load_cart(){
    let wrapper=$("#cart-wrapper")
    let action='get'

    // ajax
    $.ajax({
      url:'ajax.php',
      type:'POST',
      dataType:'JSON',
      data:{action},
      beforeSend:()=>wrapper.waitMe()
    })
    .done((res)=>{
      if(res.status==200){
        wrapper.html(res.data)
      }
    })
    .fail((err)=>{
      console.log(err)
      Swal.fire({
        title: 'Error!',
        text: err.statusText,
        icon: 'error',
        confirmButtonText: 'Cerrar'
      })
      return false
    })
    .always(()=>{
      wrapper.waitMe('hide')
    })
  }
  load_cart()

  //Agregar al carro al dar clic en boton

  //Actualizar la cantidad del carro si el producto ya existe dentro

  //Actualizar carro con input

  //Borrar elementos del carro

  //Vaciar carro

  //Realizar pago
})
