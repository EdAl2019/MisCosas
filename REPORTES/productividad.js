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
                title: {
                    display: true,
                    text: 'Horas'
                  },
                ticks: {
                    // Include a dollar sign in the ticks
                    callback: function(HORAS, index, ticks) {
                        var form
                        var valor
                        if (HORAS<12 && HORAS>=6) {
                            form="am"
                            valor=HORAS+" "
                        }else if (HORAS==0) {
                            form=""
                        }else{
                            form="pm"
                            valor=HORAS+" "
                        }
                        return HORAS+form;
                    },
                    stepSize: 1,
                },
               
              },
              x: {
                title: {
                    display: true,
                    text: 'GRUPOS'
                  },
                ticks: {
                    // Include a dollar sign in the ticks
                   
                   
                },
               
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
 function crear_grafico6(canva, tipo, datos,total,d1,d2,d3,d4,d5,d6,d7,d8,d9,d10,d11,d12) {
   
    var colort = [];
   
    
    if (window.grafica_grupo) {
        window.grafica_punto.clear();
         window.grafica_grupo.destroy();
     }
   
    let ctx = document.getElementById(canva).getContext('2d');
    Chart.defaults.set('plugins.datalabels', {
      color:colort
    });
  
    window.grafica_grupo = new Chart(ctx, {
        type: "bar",
        data: {
            datasets: [d1,d2,d3,d4,d5,d6,d7,d8,d9,d10,d11,d12]
             
        },
       
        options: {
            parsing: {
                xAxisKey: 'x',
                yAxisKey: 'y'
              },
          
          scales: {
              y: {
                title: {
                    display: true,
                    text: 'Cantidad'
                  },
                ticks: {
                    // Include a dollar sign in the ticks
                  
                    stepSize: 1,
                },
               
              },
              x: {
                title: {
                    display: true,
                    text: 'GRUPOS / Horas'
                  },
                ticks: {
                    // Include a dollar sign in the ticks
                   
                   
                },
               
              }
          },
          
          legend: {
            labels: {
                // This more specific font property overrides the global property
                font: {
                    size: 10
                }
            }
        },
          plugins: {
           
            title: {
                display: true,
                text: total,
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
 
 function llenar_grafico_productividad(fecha) {
   var fecha=$("#fecha_general").val();
   
    console.log(fecha);
    $.post("controlador.php", { op: 'productividad_g', fecha_gra:fecha },
    function (data, status) {
       
        arreglotitulos = ['6',"7","8","9","10","11","12","1","2","3","4","5"];
        arreglodatos=[];
        arreglosuma=0;
  
       
        datos = JSON.parse(data)
  
        
        
          
          var cantidad_mayor1=0
          var grupo_1=""
          var cantidad_mayor2=0
          var grupo_2=""
          var cantidad_mayor3=0
          var grupo_3=""
          var cantidad_mayor4=0
          var grupo_4=""
          var cantidad_mayor5=0
          var grupo_5=""
          var cantidad_mayor6=0
          var grupo_6=""
          var cantidad_mayor7=0
          var grupo_7=""
          var cantidad_mayor8=0
          var grupo_8=""
          var cantidad_mayor9=0
          var grupo_9=""
          var cantidad_mayor10=0
          var grupo_10=""
          var cantidad_mayor11=0
          var grupo_11=""
          var cantidad_mayor12=0
          var grupo_12=""
          
          
          
          
         
        for (let i = 0; i < datos.length; i++) {
          
           switch (datos[i].hora) {
            case "1":
              
                
                if (cantidad_mayor1<=parseInt( datos[i].total)) {
                    cantidad_mayor1=datos[i].total
                    grupo_1="GRUPO "+datos[i].grupo;
                    
                    
                }
                
                break;
                case "2":
                    if (cantidad_mayor2<=parseInt( datos[i].total)) {
                        cantidad_mayor2=datos[i].total
                        grupo_2="GRUPO "+datos[i].grupo;
                        
                        
                    }
                
                break;
                case "3":
                    if (cantidad_mayor3<=parseInt( datos[i].total)) {
                        cantidad_mayor3=datos[i].total
                        grupo_3="GRUPO "+datos[i].grupo;
                        
                        
                    }
                
                break;
                case "4":
                    if (cantidad_mayor4<=parseInt( datos[i].total)) {
                        cantidad_mayor4=datos[i].total
                        grupo_4="GRUPO "+datos[i].grupo;
                        
                        
                    }
                
                break;
                case "5":
                    if (cantidad_mayor5<=parseInt( datos[i].total)) {
                        cantidad_mayor5=datos[i].total
                        grupo_5="GRUPO "+datos[i].grupo;
                        
                        
                    }
                
                break;
                case "6":
                    if (cantidad_mayor6<=parseInt( datos[i].total)) {
                        cantidad_mayor6=datos[i].total
                        grupo_6="GRUPO "+datos[i].grupo;
                        
                        
                    }
                
                break;
                case "7":
                    if (cantidad_mayor7<=parseInt( datos[i].total)) {
                        cantidad_mayor7=datos[i].total
                        grupo_7="GRUPO "+datos[i].grupo;
                        
                        
                    }
                break;
                case "8":
                    if (cantidad_mayor8<=parseInt( datos[i].total)) {
                        cantidad_mayor8=datos[i].total
                        grupo_8="GRUPO "+datos[i].grupo;
                        
                        
                    }
                
                break;
                case "9":
                    if (cantidad_mayor9<=parseInt( datos[i].total)) {
                        cantidad_mayor9=datos[i].total
                        grupo_9="GRUPO "+datos[i].grupo;
                        
                        
                    }
                
                break;
                case "10":
                    if (cantidad_mayor10<=parseInt( datos[i].total)) {
                        cantidad_mayor10=datos[i].total
                        grupo_10="GRUPO "+datos[i].grupo;
                        
                        
                    }
                
                break;
                case "11":
                    if (cantidad_mayor11<=parseInt( datos[i].total)) {
                        cantidad_mayor11=datos[i].total
                        grupo_11="GRUPO "+datos[i].grupo;
                        
                        
                    }
                
                break;
                case "12":
                    if (cantidad_mayor12<=parseInt( datos[i].total)) {
                        cantidad_mayor12=datos[i].total
                        grupo_12="GRUPO "+datos[i].grupo;
                        
                        
                    }
                
                break;
           
            default:
                break;
           }
            arreglosuma=arreglosuma+parseInt(datos[i].total);
  
  
        }

        arreglodatos.push(grupo_6);
        arreglodatos.push(grupo_7);
        arreglodatos.push(grupo_8);
        arreglodatos.push(grupo_9);
        arreglodatos.push(grupo_10);
        arreglodatos.push(grupo_11);
        arreglodatos.push(grupo_12);
        arreglodatos.push(grupo_1);
        arreglodatos.push(grupo_2);
        arreglodatos.push(grupo_3);
        arreglodatos.push(grupo_4);
        arreglodatos.push(grupo_5);
       
       
        
     
        crear_grafico5('productividad','line',arreglodatos,arreglotitulos,"Total "+arreglosuma);
  
    }
  
  );
   
    
  }
  function llenar_grafico_productividad_grupo(fecha) {
    var fecha=$("#fecha_general").val();
    
     console.log(fecha);
     $.post("controlador.php", { op: 'productividad_grupo', fecha_gra:fecha },
     function (data, status) {
        
         
         arreglodatos=[];
         arreglosuma=0;

         
   
        
         datos = JSON.parse(data)
        var d1=[]
        var d2=[]
        var d3=[]
        var d4=[]
        var d5=[]
        var d6=[]
        var d7=[]
        var d8=[]
        var d9=[]
        var d10=[]
        var d11=[]
        var d12=[]
         
        $.map(datos, function (elementOrValue, indexOrKey) {
            
            $.map(elementOrValue, function (element, index) {
                
                if(index==6){
                    
                   d6.push({x:"Grupo "+indexOrKey,y:(Math.round( element.suma/element.dias))})
                }
               
                 if(index==7){
                    
                    d7.push({x:"Grupo "+indexOrKey,y:(Math.round( element.suma/element.dias))})
                 }
                 if(index==8){
                    
                    d8.push({x:"Grupo "+indexOrKey,y:(Math.round( element.suma/element.dias))})
                 }
                 if(index==9){
                    
                    d9.push({x:"Grupo "+indexOrKey,y:(Math.round( element.suma/element.dias))})
                 }
                 if(index==10){
                    
                    d10.push({x:"Grupo "+indexOrKey,y:(Math.round( element.suma/element.dias))})
                 }
                 if(index==11){
                    
                    d11.push({x:"Grupo "+indexOrKey,y:(Math.round( element.suma/element.dias))})
                 }
                 if(index==12){
                    
                    d12.push({x:"Grupo "+indexOrKey,y:(Math.round( element.suma/element.dias))})
                 }
                 if(index==1){
                    
                    d1.push({x:"Grupo "+indexOrKey,y:(Math.round( element.suma/element.dias))})
                 }
                 if(index==2){
                    
                    d2.push({x:"Grupo "+indexOrKey,y:(Math.round( element.suma/element.dias))})
                 }
                 if(index==3){
                    
                    d3.push({x:"Grupo "+indexOrKey,y:(Math.round( element.suma/element.dias))})
                 }
                 if(index==4){
                    
                    d4.push({x:"Grupo "+indexOrKey,y:(Math.round( element.suma/element.dias))})
                 }
                 if(index==5){
                    
                    d5.push({x:"Grupo "+indexOrKey,y:(Math.round( element.suma/element.dias))})
                 }
                 arreglosuma=arreglosuma+element.suma;
                
            });
          
            
            
         });
           

        d6={
                
            label: "6am",
            data:d6,
            backgroundColor: colorRGB(),
            borderColor: colorRGB(),
         }
         d7={
                
            label: "7am",
            data:d7,
            backgroundColor: colorRGB(),
            borderColor: colorRGB(),
         }
         d8={
                
            label: "8am",
            data:d8,
            backgroundColor: colorRGB(),
            borderColor: colorRGB(),
         }
         d9={
                
            label: "9am",
            data:d9,
            backgroundColor: colorRGB(),
            borderColor: colorRGB(),
         }
         d10={
                
            label: "10am",
            data:d10,
            backgroundColor: colorRGB(),
            borderColor: colorRGB(),
         }
         d11={
                
            label: "11am",
            data:d11,
            backgroundColor: colorRGB(),
            borderColor: colorRGB(),
         }
         d12={
                
            label: "12pm",
            data:d12,
            backgroundColor: colorRGB(),
            borderColor: colorRGB(),
         }
         d1={
                
            label: "1pm",
            data:d1,
            backgroundColor: colorRGB(),
            borderColor: colorRGB(),
         }
         d2={
                
            label: "2pm",
            data:d2,
            backgroundColor: colorRGB(),
            borderColor: colorRGB(),
         }
         d3={
                
            label: "3pm",
            data:d3,
            backgroundColor: colorRGB(),
            borderColor: colorRGB(),
         }
         d4={
                
            label: "4pm",
            data:d4,
            backgroundColor: colorRGB(),
            borderColor: colorRGB(),
         }
         d5={
                
            label: "5pm",
            data:d5,
            backgroundColor: colorRGB(),
            borderColor: colorRGB(),
         }
        
         console.log(d6);
       crear_grafico6('productividad_grupo_hora','bar',arreglodatos,"PROMEDIOS GRUPOS / HORAS",d1,d2,d3,d4,d5,d6,d7,d8,d9,d10,d11,d12);
   
     }
   
   );
    
     
   }
  llenar_grafico_productividad()
  llenar_grafico_productividad_grupo();




$(document).ready(function () {
 
    $("#contenedor_tabla_p").load('tabla_p.php')
    
    $("#fecha_grafica_e").on("change",function () {
      var fecha =$(this).val(); 
      llenar_grafico_equipo(fecha);
      
    })
  
  
  
    
  // listar_encuestadores();
    $("#imprimir").on('click',function () {
        var div=document.getElementById("contenedor");
       imprimirElemento(div); 
    });
  




    
    $("#CERRAR_SESION").on('click',function () {
      console.log('salir');
      $.ajax({
        type: "GET",
        url: "controlador_login.php?op=cerrar",
       
        success: function (response) {
         console.log(response);
         if (response==1) {
          window.location='index.php'
          00
         }
        }
    });
    })

   

    



});