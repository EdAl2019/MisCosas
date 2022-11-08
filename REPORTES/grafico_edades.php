<canvas id="edad"></canvas>


<script>
  function crear_grafico3(canva, tipo, titulos, datos, label) {
   
   var colort = [];
   var colord = [];
   for (let i = 0; i < titulos.length; i++) {
       colort.push(colorRGB())


   }
   
   if (window.grafica_edad) {
       window.grafica_edad.clear();
        window.grafica_edad.destroy();
    }
  
   let ctx = document.getElementById(canva).getContext('2d');
   Chart.defaults.set('plugins.datalabels', {
     color:colort
   });
   window.grafica_edad = new Chart(ctx, {
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
   $.post("controlador.php", { op: 'edades', fecha_gra:fecha },
   function (data, status) {
       arreglotitulos = [];
       arreglodatos = [];
       arreglosuma=0;
 
       console.log(data)
       datos = JSON.parse(data)
 
       
       
         arreglotitulos.push("0-18: "+datos[0].r1)
         
         arreglotitulos.push("19-25: "+datos[0].r2)
         
         arreglotitulos.push("26-35: "+datos[0].r3)
         
         arreglotitulos.push("36-49: "+datos[0].r4)
         
         arreglotitulos.push("50-65: "+datos[0].r5)
         
         arreglotitulos.push("65+: "+datos[0].r6)
         
        
         console.log(arreglotitulos)
         // arreglodatos.push(valueOfElement);
        
       for (let i = 0; i < datos.length; i++) {
          
           arreglodatos.push(datos[0][i]);
           arreglosuma=arreglosuma+parseInt(datos[i].r1)+parseInt(datos[i].r2)+parseInt(datos[i].r3)+parseInt(datos[i].r4)+parseInt(datos[i].r5)+parseInt(datos[i].r6);
 
 
       }
       console.log(arreglodatos);
      
       
    
       crear_grafico3('edad','bar',arreglotitulos,[datos[0].r1,datos[0].r2,datos[0].r3,datos[0].r4,datos[0].r5,datos[0].r6],"Edades "+arreglosuma);
 
   }
 
 );
  
   
 }

 llenar_grafico_sexo()
</script>