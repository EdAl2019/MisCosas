<canvas id="puntos_control"></canvas>


<script>
  function crear_grafico5(canva, tipo, titulos, datos, label) {
   
   var colort = [];
   var colord = [];
   for (let i = 0; i < titulos.length; i++) {
       colort.push(colorRGB())


   }
   
   if (window.grafica_punto_control) {
       window.grafica_punto_control.clear();
        window.grafica_punto_control.destroy();
    }
  
   let ctx = document.getElementById(canva).getContext('2d');
   Chart.defaults.set('plugins.datalabels', {
     color:colort
   });
   window.grafica_punto_control = new Chart(ctx, {
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

function llenar_grafico_punto_control(fecha) {
  var fecha=$("#fecha_general").val();
  
   console.log(fecha);
   $.post("controlador.php", { op: 'puntos_control', fecha_gra:fecha },
   function (data, status) {
       arreglotitulos = [];
       arreglodatos = [];
       arreglosuma=0;
 
       console.log(data)
       datos = JSON.parse(data)
 
       
       
         
         
        
       for (let i = 0; i < datos.length; i++) {
          arreglotitulos.push(datos[i].punto_control)
           arreglodatos.push(datos[i].cantidad);

           arreglosuma=arreglosuma+parseInt(datos[i].cantidad);
 
 
       }
       console.log(arreglodatos);
      
       
    
       crear_grafico5('puntos_control','bar',arreglotitulos,arreglodatos,"Total "+arreglosuma);
 
   }
 
 );
  
   
 }

 llenar_grafico_punto_control()
</script>