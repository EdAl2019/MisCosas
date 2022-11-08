



function imprimirElemento(elemento){
    var ventana = window.open('', 'PRINT', 'height=400,width=600');
    ventana.document.write('<html><head><title>' + document.title + '</title>');
    ventana.document.write('</head><body >');
    ventana.document.write(elemento.innerHTML);
    ventana.document.write('</body></html>');
    ventana.document.close();
    ventana.focus();
    ventana.print();
    ventana.close();
    return true;
  }
	


$(document).ready(function () {
    $("#contenedor_grafico_sexo").load("grafico_sexo.php");
    $("#contenedor_grafico_edades").load("grafico_edades.php");
    $("#contenedor_grafico_estado_civil").load("grafico_estado_civil.php");
    $("#contenedor_grafico_punto_control").load("grafico_punto_control.php");
  
    
  
  
    
  // listar_encuestadores();
    $("#imprimir").on('click',function () {
        var div=document.getElementById("contenedor");
       imprimirElemento(div); 
    });
    $("#fecha_general").on("change",function () {
        console.log("cambie");
        $("#contenedor_grafico_sexo").load("grafico_sexo.php");
        $("#contenedor_grafico_edades").load("grafico_edades.php");
        $("#contenedor_grafico_estado_civil").load("grafico_estado_civil.php");
        $("#contenedor_grafico_punto_control").load("grafico_punto_control.php");
        
       
        
        
    })
    $("#limpiar_f").on("click",function () {
     $("#fecha_general").val("2022").triggerHandler('change');;
     document.getElementById('fecha_general').innerHtml = "2022-mm-dd";
      
     
      
      
  })
   

    $("#fecha_encuestadores").on("change",function () {
        console.log("cambie");
        $("#contenedor_tabla").html(" ");
        $("#contenedor_tabla").load('tabla_e.php');
        
       
        
        
    })



    
    $("#CERRAR_SESION").on('click',function () {
      console.log('salir');
      $.ajax({
        type: "GET",
        url: "controlador_login.php?op=cerrar",
       
        success: function (response) {
         console.log(response);
         if (response==1) {
          window.location='index.php'
          
         }
        }
    });
    })

    $("#grupo").on("change",function () {
      console.log("cambie");
      $("#contenedor_tabla").html(" ");
      $("#contenedor_tabla").load('tabla_e.php');
      
     
      
      
  })

    



});


