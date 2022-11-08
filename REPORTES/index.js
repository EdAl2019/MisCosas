



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
	function crear_grafico(canva, tipo, titulos, datos, label) {
   
    var colort = [];
    var colord = [];
    for (let i = 0; i < titulos.length; i++) {
        colort.push(colorRGB())


    }
    
    if (window.grafica) {
      window.grafica.clear();
       window.grafica.destroy();
   }
    let ctx = document.getElementById(canva).getContext('2d');
    Chart.defaults.set('plugins.datalabels', {
      color:colort
    });
    window.grafica = new Chart(ctx, {
        type: tipo,
        data: {
            labels: titulos,
            datasets: [{
               
                label:[],
                data: datos,
                backgroundColor: colort,
                borderColor: colort,
                borderWidth: 6,
                datalabels: {
                  label:titulos,
                  color: colort
                }
            },
          ],
        
          
            
             
         
            
        },
       
        options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          },
          legend: {
            labels: {
                // This more specific font property overrides the global property
                font: {
                    size: 30
                }
            }
        },
          plugins: {
            datalabels: {
              label:label,
              color: '#FFCE56'
            },
            title: {
                display: true,
                text: label,
                font:{
                  size:20
                }
            }
        },
      },
      
    });
    
}
function generarNumero(numero) {
  return (Math.random() * numero).toFixed(0);
}

function colorRGB() {
  var coolor = "(" + generarNumero(255) + "," + generarNumero(255) + "," + generarNumero(255) + ")";
  return "rgb" + coolor;
}
function llenar_grafico_equipo(fecha) {
   
  fecha=$("#fecha_grafica_e").val()
  console.log(fecha);
  $.post("controlador.php", { op: 'equipos', fecha_gra:fecha },
  function (data, status) {
      arreglotitulos = [];
      arreglodatos = [];
      arreglosuma=0;

      console.log(data)
      datos = JSON.parse(data)
     
      
      for (let i = 0; i < datos.length; i++) {
         
          arreglotitulos.push(datos[i].grupo)
          arreglodatos.push(datos[i].cantidad)
          arreglosuma=arreglosuma+parseInt(datos[i].cantidad);


      }
      console.log(arreglodatos);
     
      
     
      crear_grafico('equipos','bar',arreglotitulos,arreglodatos,"ENCUESTAS "+arreglosuma);

  }

);
 
  
}


$(document).ready(function () {
    $("#contenedor_grafico_sexo").load("grafico_sexo.php");
    $("#contenedor_grafico_edades").load("grafico_edades.php");
    $("#contenedor_grafico_estado_civil").load("grafico_estado_civil.php");
  
    $("#contenedor_tabla").load('tabla_e.php');
    $("#contenedor_tabla_general").load('tabla_g.php')
    
    $("#fecha_grafica_e").on("change",function () {
      var fecha =$(this).val(); 
      llenar_grafico_equipo(fecha);
      
    })
  
  
  
    
  // listar_encuestadores();
    $("#imprimir").on('click',function () {
        var div=document.getElementById("contenedor");
       imprimirElemento(div); 
    });
    $("#fecha_general").on("change",function () {
        console.log("cambie");
        $("#contenedor_tabla_general").html(" ");
        $("#contenedor_tabla_general").load('tabla_g.php');
        
       
        
        
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


