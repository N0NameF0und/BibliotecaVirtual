$(document).ready(function(){
        vector =  [4,5,6] 
    norma = calcularNorma(vector);
    ESCRIBIRrESULTADO(norma)
        });

    
   function ESCRIBIRrESULTADO(resultado){
       document.getElementById("resultado").innerHTML=resultado;

   }
   function calcularNorma(vector){
       norma = 0;
       for(i=0;i < vector.length ; i++) {
           norma = norma+(vector[i]+vector[i])

       }
       norma = vector;
       return norma;
   }