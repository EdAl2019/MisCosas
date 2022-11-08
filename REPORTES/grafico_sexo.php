<canvas id="sexo"></canvas>


<script>
  function crear_grafico2(canva, tipo, titulos, datos, label) {
   
   var colort = [];
   var colord = [];
   for (let i = 0; i < titulos.length; i++) {
       colort.push(colorRGB())


   }
   
   if (window.grafica_sexo) {
       window.grafica_sexo.clear();
        window.grafica_sexo.destroy();
    }
  
   let ctx = document.getElementById(canva).getContext('2d');
   Chart.defaults.set('plugins.datalabels', {
     color:colort
   });
   window.grafica_sexo = new Chart(ctx, {
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
   $.post("controlador.php", { op: 'sexo', fecha_gra:fecha },
   function (data, status) {
       arreglotitulos = [];
       arreglodatos = [];
       arreglosuma=0;
 
       console.log(data)
       datos = JSON.parse(data)
 
       datos.forEach(function (elemento, indice, array) {
         console.log(elemento[0] +" in="+indice);
         
     });
       
         arreglotitulos.push("Femenino: "+datos[0].Femenino)
         
         arreglotitulos.push("Masculino: "+datos[0].Masculino)
         console.log(arreglotitulos)
         // arreglodatos.push(valueOfElement);
        
       for (let i = 0; i < datos.length; i++) {
          
           arreglodatos.push(datos[0][i]);
           arreglosuma=arreglosuma+parseInt(datos[i].Femenino)+parseInt(datos[i].Masculino);
 
 
       }
       console.log(arreglodatos);
      
       
    
       crear_grafico2('sexo','doughnut',arreglotitulos,[datos[0].Femenino,datos[0].Masculino],"SEXO (MASCULINO / FEMENINO) "+arreglosuma);
 
   }
 
 );
  
   
 }

 llenar_grafico_sexo()
</script>