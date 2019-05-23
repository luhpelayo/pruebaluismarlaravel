<div id="cuerpo">
  <form action="#" method="POST" name="autos">
  <label>Seleccione una marca de Autos:</label>&nbsp;
  <select id="compañia" name="SelectAutos" onchange="MostrarAutos()">
     <option value="">Seleccione...</option>

     <option value="Mazda">Mazda</option>     
     <option value="Nissan">Nissan</option>
     <option value="Chevrolet">Chevrolet</option>
     <option value="FIAT">FIAT</option>
   </select>
   
        
        <br><br>
        <div>
        
        <div id="AutosDiv" style="display: none;">
          <label>Selecciona todos los autos</label>
          <br><br><br>
        </div>
        <br>
          <div id="Conjunto_autos_1" style="display: none;">
            <input type="checkbox" name="cuadro" value="Mazda2" id="id_1" required="required"/>
            <label>Mazda2</label>
        
            <br>
            <input type="checkbox" name="cuadro" value="Mazda3" id="id_2" required="required"/>
            <label>Mazda3</label>
            <br>
          
            <input type="checkbox" name="cuadro" value="Mazda MX-5" id="id_3" required="required"/>
            <label>Mazda MX-5</label>
          </div>
         
          <div id="Conjunto_autos_2" style="display: none;">
            <input type="checkbox" name="cuadro" value="Nissan Juke" id="id_4" required="required"/>
            <label>Nissan Juke</label>
            <br>
            <input type="checkbox" name="cuadro" value="Nissan GT-R">
            <label>Nissan GT-R</label>
            <br>
            <input type="checkbox" name="cuadro" value="Nissan 370z">
            <label>Nissan 370z</label>
          </div>
          
          <div id="Conjunto_autos_3" style="display: none;">
            <input type="checkbox" name="cuadro" value="Chevrolet Spark" id="id_5" required="required"/>
            <label>Chevrolet Spark</label>
            <br>
          
            <input type="checkbox" name="cuadro" value="Chevrolet Aveo" id="id_6" required="required"/>
            <label>Chevrolet Aveo</label>
            <br>
            <input type="checkbox" name="cuadro" value="Chevrolet Corvette >ZR1">
            <label>Chevrolet Corvette ZR1</label>
          </div>
            
          <div id="Conjunto_autos_4" style="display: none;">
            <input type="checkbox" name="cuadro" value="FIAT 500" id="id_7" required="required"/>
            <label>FIAT 500</label>
            <br>
          
            <input type="checkbox" name="cuadro" value="FIAT 124 Spider" id="id_8" required="required"/>
            <label>FIAT 124 Spider</label>
            <br>
            <input type="checkbox" name="cuadro" value="FIAT 500L">
            <label>FIAT 500L</label>
          </div>
          
        <br><br>
        
        <input type="submit" value="ENVIAR" id="btn_enviar" style="display: none;">
      
      </div>
      </form>
    </div>
  <script type="text/javascript">
    function MostrarAutos(){
      
    var Autos_1 = document.getElementById('Conjunto_autos_1');
    var Autos_2 = document.getElementById('Conjunto_autos_2'); 
    var Autos_3 = document.getElementById('Conjunto_autos_3');
    var Autos_4 = document.getElementById('Conjunto_autos_4');
    var DiVLabelAutos = document.getElementById('AutosDiv');
    var boton = document.getElementById('btn_enviar');

       
      if(document.autos.SelectAutos.value == 'Mazda'){
        
         DiVLabelAutos.style.display = 'inline-block';
         Autos_1.style.display = 'inline-block';
         boton.style.display = 'inline-block';
         Autos_2.style.display = 'none';
         Autos_3.style.display = 'none';
         Autos_4.style.display = 'none';
            
      }else if(document.autos.SelectAutos.value == 'Nissan'){
          
         DiVLabelAutos.style.display = 'inline-block';
         Autos_2.style.display = 'inline-block';
         Autos_1.style.display = 'none';
         Autos_3.style.display = 'none';
         Autos_4.style.display = 'none';
         boton.style.display = 'inline-block';
  
            
      }else if(document.autos.SelectAutos.value == 'Chevrolet'){
          
         DiVLabelAutos.style.display = 'inline-block';
         Autos_3.style.display = 'inline-block';

         Autos_1.style.display = 'none';
         Autos_2.style.display = 'none';
         Autos_4.style.display = 'none';
         boton.style.display = 'inline-block';
            
            
      }else if(document.autos.SelectAutos.value == 'FIAT'){
          
         DiVLabelAutos.style.display = 'inline-block';
         Autos_4.style.display = 'inline-block';

         Autos_1.style.display = 'none';
         Autos_2.style.display = 'none';
         Autos_3.style.display = 'none';
         boton.style.display = 'inline-block';

            
       }else if(document.autos.SelectAutos.value == ''){
          
         DiVLabelAutos.style.display = 'none';
         Autos_1.style.display = 'none';
         Autos_2.style.display = 'none';
         Autos_3.style.display = 'none';
         Autos_4.style.display = 'none';
         boton.style.display = 'none';
            
      }
   }
  </script>  