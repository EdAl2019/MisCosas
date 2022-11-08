<canvas id="estado_civil"></canvas>


<script>
  function crear_grafico4(canva, tipo, titulos, datos, label) {
   
   var colort = [];
   var colord = [];
   for (let i = 0; i < titulos.length; i++) {
       colort.push(colorRGB())


   }
   
   if (window.grafica_estado) {
       window.grafica_estado.clear();
        window.grafica_estado.destroy();
    }
  
   let ctx = document.getElementById(canva).getContext('2d');
   Chart.defaults.set('plugins.datalabels', {
     color:colort
   });
   window.grafica_estado = new Chart(ctx, {
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

function llenar_grafico_sexo(fecha) {
   
  
   console.log(fecha);
   $.post("controlador.php", { op: 'estado_civil', fecha_gra:fecha },
   function (data, status) {
       arreglotitulos = [];
       arreglodatos = [];
       arreglosuma=0;
 
       console.log(data)
       datos = JSON.parse(data)
 
       
       
         arreglotitulos.push("SOLTERO "+datos[0].SOLTERO)
         
         arreglotitulos.push("CASADO "+datos[0].CASADO)
         
         arreglotitulos.push("DIVORCIADO"+datos[0].DIVORCIADO)
         
         arreglotitulos.push("UNION LIBRE: "+datos[0].UNION_LIBRE)
         
         arreglotitulos.push("VIUDO: "+datos[0].VIUDO)
         
         arreglotitulos.push("SE DESCONOCE: "+datos[0].IGNORA)

         arreglotitulos.push("OTROS: "+datos[0].OTRO)
         
        
         console.log(arreglotitulos)
         // arreglodatos.push(valueOfElement);
        
       for (let i = 0; i < datos.length; i++) {
          
           arreglodatos.push(datos[0][i]);
           arreglosuma=arreglosuma+parseInt(datos[i].SOLTERO)+parseInt(datos[i].CASADO)+parseInt(datos[i].DIVORCIADO)+parseInt(datos[i].UNION_LIBRE)+parseInt(datos[i].VIUDO)+parseInt(datos[i].OTRO)+parseInt(datos[i].IGNORA);
 
 
       }
       console.log(arreglodatos);
      
       
    
       crear_grafico4('estado_civil','doughnut',arreglotitulos,[datos[0].DIVORCIADO,datos[0].CASADO,datos[0].DIVORCIADO,datos[0].UNION_LIBRE,datos[0].VIUDO,datos[0].OTRO,datos[0].IGNORA],"Estado Civil "+arreglosuma);
 
   }
 
 );
  
   
 }

 llenar_grafico_sexo()
</script>