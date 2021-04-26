<?php
$session_role1 = $_SESSION['roleSS'];


$get_comment = "SELECT * FROM comments WHERE status = 'pendiente'";
$get_comment_run = mysqli_query($con, $get_comment);

?>


<!--<div class="list-group rojo"  >
      <?php
      // if ($session_role1 == '4') {
      ?>
      <a href="index.php" class="list-group-item active" style="background-color:#595757">
        <i class="fas fa-home"></i>  Menu principal
      </a>
 
                 
       
              <a href="add-user.php" class="list-group-item">
                <i class="fa fa-users"></i> Agregar Parvularia
              </a>

              <a href="users.php" class="list-group-item">
                  <i class="fa fa-users"></i> Parvularias Registradas
              </a>
    
           
        <?php // } 

$_nom_cdi = $_SESSION['tipo_cdi'];
//echo $_nom_cdi;
$_nom_periodo = $_SESSION['periodo_ac'];
//echo $_nom_periodo;

      $sql = "SELECT * FROM `tbl_cdi` WHERE id = $_nom_cdi";
      $run = mysqli_query($con, $sql);
          while ($row = mysqli_fetch_assoc($run)) {                                                 
          $recha_ali = $row['nombre']; 
          //echo $recha_ali,", ";
      
      }  
        
        
        
        ?>
</div>  -->


<!--xxxxxxxxxxxxxxxxxxxxxxxxx MENU FICHAS NIÑOS ADMINISTRADORA DEL SISTEMA xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->
<div class="list-group rojo" >

      <?php
       if ($session_role1 == '4') {
      ?>
        <a href="index.php" class="list-group-item active" style="background-color:#595757">  
            <i class="fas fa-home"></i>  Fichas de los Niños - <?php echo $recha_ali;  ?>
        </a>

        <div id="accordion">
            <div class="list-group-item">
                <div class="card-header quitarespaciosidebar" id="headingOne">
                  <h5 class=" letrasmenuficha">
                    <button class="btn collapsed" style="color:#555555" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      DATOS PERSONALES DEL NIÑO(A)
                    </button>
                  </h5>
                </div>

                
                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                      <a href="ing_dp_ninio.php" class="list-group-item">
                        <i class="fa fa-users"></i> Ingrese los Datos Personales del Niño(a) 
                      </a>
                      <a href="niniosregistrados.php" class="list-group-item">
                            <i class="fas fa-outdent"></i> Listado de Niños 
                      </a>
                    </div>
                  </div>
            </div>


          <div class="list-group-item">
            <div class="card-header quitarespaciosidebar" id="headingTwo">
              <h5 class="letrasmenuficha">
                <button class="btn collapsed" style="color:#555555" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                  ENTREVISTA INICIAL
                </button>
              </h5>
            </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                 <div class="card-body">
                    <a href="niniosregistrados_ci.php" class="list-group-item">
                      <i class="fa fa-folder-open"></i> Ingrese Entrevista Inicial
                    </a>
                    <a href="nientrevistaregistrada.php" class="list-group-item">
                      <i class="fa fa-folder-open"></i> Entrevistas Registradas del Niño(a)
                    </a>
                 </div>
                </div>
          </div>
        
          <div class="list-group-item">
            <div class="card-header quitarespaciosidebar" id="headingThree">
              <h5 class="letrasmenuficha">
                <button class="btn collapsed" style="color:#555555" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  SOCIO ECONÓMICA
                </button>
              </h5>
            </div>
             <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
               <div class="card-body">
                  <a href="niniosregistrados_ing_se.php" class="list-group-item">
                    <i class="fa fa-folder-open"></i> Ingrese Información Socio Económica
                  </a>
                  <a href="nisocioeconomico.php" class="list-group-item">
                    <i class="fa fa-folder-open"></i> Información Socio Económica Registrada
                  </a>
               </div>
             </div>
          </div>


          <div class="list-group-item">
            <div class="card-header quitarespaciosidebar" id="headingFour">
              <h5 class="letrasmenuficha">
                <a href="niniosregistrados_acta_compromiso.php" >
                  <button class="btn collapsed" style="color:#555555" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    ACTA DE COMPROMISO
                  </button>
                </a>
                
              </h5>
            </div>
          </div> 


          <div class="list-group-item">
            <div class="card-header quitarespaciosidebar" id="headingFour">
              <h5 class="letrasmenuficha">
                <a href="niniosregistrados_vacunas.php" >
                  <button class="btn collapsed" style="color:#555555" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    VACUNAS
                  </button>
                </a>
                
              </h5>
            </div>
          </div> 

          <div class="list-group-item">
            <div class="card-header quitarespaciosidebar" id="headingFour">
              <h5 class="letrasmenuficha">
                <a href="menuprincipalprocesos.php" >
                  <button class="btn collapsed" style="color:#555555" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    PROCESOS
                  </button>
                </a>
                
              </h5>
            </div>
          </div>

          <div class="list-group-item">
            <div class="card-header quitarespaciosidebar" id="headingFour">
              <h5 class="letrasmenuficha">
                <a href="menuprincipal_reportes.php" >
                  <button class="btn collapsed" style="color:#555555" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    REPORTES
                  </button>
                </a>
                
              </h5>
            </div>
          </div> 
        
      </div>
        <?php } ?>
         
</div>



           <!--xxxxxxxxxxxxxxxxxxxxxxxxx MENU FICHAS NIÑOS PARVULARIO xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div class="list-group rojo" >

                  <?php
                    if ($session_role1 == '5') {
                  ?>
                    <a href="index.php" class="list-group-item active" style="background-color:#595757">  
                        <i class="fas fa-home"></i>  Fichas de los Niños 
                    </a>
    
           
                <!--<a href="comments.php" class="list-group-item">
                <?php
                  if ($num_of_rows > 0) {
                  echo "<span class='badge'>$num_of_rows</span>";
                  }
                ?>
        
                    <a href="reportePdfDocumentos.php" class="list-group-item">
                        <i class="fas fa-print"></i> Reportes Documentos
                    </a>-->

            <div id="accordion">
                     <div class="list-group-item">
                        <div class="card-header quitarespaciosidebar" id="headingOne">
                         <h5 class="letrasmenuficha">
                            <button class="btn collapsed" style="color:#555555" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" background= "Black">
                              DATOS PERSONALES DEL NIÑO(A)
                            </button>
                         </h5>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                          <!--<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"> -->
                          <div class="card-body">
                            <a href="ing_dp_ninio.php" class="list-group-item">
                              <i class="fa fa-users"></i> Ingrese los Datos Personales del Niño(a) 
                            </a>
                            <a href="niniosregistrados.php" class="list-group-item">
                                  <i class="fas fa-outdent"></i> Listado de Niños 
                            </a>
                          </div>
                       </div>
                      </div>
                    

                    <div class="list-group-item">
                      <div class="card-header quitarespaciosidebar" id="headingTwo">
                        <h5 class="letrasmenuficha">
                          <button class="btn collapsed" style="color:#555555" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            ENTREVISTA INICIAL
                          </button>
                        </h5>
                      </div>
                          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                              <a href="niniosregistrados_ci.php" class="list-group-item">
                                <i class="fa fa-folder-open"></i> Ingrese Entrevista Inicial
                              </a>
                              <a href="nientrevistaregistrada.php" class="list-group-item">
                                <i class="fa fa-folder-open"></i> Entrevistas Registradas del Niño(a)
                              </a>
                            </div>
                          </div>
                    </div>

                    
                    <div class="list-group-item">
                      <div class="card-header quitarespaciosidebar" id="headingThree">
                        <h5 class="letrasmenuficha">
                          <button class="btn collapsed" style="color:#555555" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            SOCIO ECONÓMICA
                          </button>
                        </h5>
                      </div>
                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <a href="ing_socio_eco.php" class="list-group-item">
                              <i class="fa fa-folder-open"></i> Ingrese Información Socio Económica
                            </a>
                            <a href="nisocioeconomico.php" class="list-group-item">
                              <i class="fa fa-folder-open"></i> Información Socio Económica Registrada
                            </a>
                        </div>
                      </div>
                    </div>
            
            </div>        <!--Class=acordion -->
    
      
      <?php } ?>

</div>



<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX MENU COORDINADOR GENERAL XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->

<div class="list-group rojo"  >
      <?php
       if ($session_role1 == '2') {
      ?>


      <a href="../admin/index.php" class="list-group-item active" style="background-color:#595757">
        <i class="fas fa-home"></i>  Menu principal
      </a>
                  
       
              <a href="../superadministrador/add-user_COR.php" class="list-group-item">
                <i class="fa fa-users"></i> Agregar Administradora
              </a>  

              <a href="../superadministrador/users__COR.php" class="list-group-item">
                  <i class="fa fa-users"></i> Administradoras Registradas
              </a>




        <?php } ?>
</div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX MENU VISITADOR SOCIAL XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->

<div class="list-group rojo"  >
      <?php
       if ($session_role1 == '3') {
      ?>
      <a href="../admin/index.php" class="list-group-item active" style="background-color:#595757">
        <i class="fas fa-home"></i>  Menu principal
      </a>
    
        <!--<a href="comments.php" class="list-group-item">
            <?php
              if ($num_of_rows > 0) {
                echo "<span class='badge'>$num_of_rows</span>";
              }
            ?>
              <i class="fa fa-comment"></i> Comentarios Realizados
               </a>-->
               <a href="../superadministrador/users_VIS.php" class="list-group-item">
                  <i class="fa fa-users"></i> Trabajadora Social Registrada
              </a>
              

                           
          
 
        <?php } ?>
</div>






<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX MENU VISITADOR SOCIAL XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->

<div class="list-group rojo"  >



      <?php
       if ($session_role1 == '6') {
      ?>


      <a href="../admin/index.php" class="list-group-item active" style="background-color:#595757">
        <i class="fas fa-home"></i>  Menu principal
      </a>
    
        
            <?php
              if ($num_of_rows > 0) {
                echo "<span class='badge'>$num_of_rows</span>";
              }
            ?>
              

               <a href="../superadministrador/users_up.php" class="list-group-item">
                  <i class="fa fa-users"></i> Unidad de Proyectos Registrada
              </a>



        <?php } ?>
</div>

<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX MENU ADMIN SISTEMA XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
<div class="list-group rojo"  >
      <?php
       if ($session_role1 == '1') {
      ?>
      <a href="../admin/index.php" class="list-group-item active" style="background-color:#595757">
        <i class="fas fa-home"></i>  Menu principal
      </a>  
             
              <a href="../superadministrador/add-user_cg.php" class="list-group-item">
                <i class="fas fa-user-plus"></i> Agregar Coordinador General
              </a>   

              <a href="../superadministrador/users_cg.php" class="list-group-item">
                  <i class="fa fa-users"></i> Coordinador General Registrado
              </a>

              <a href="../superadministrador/add-user_vs.php" class="list-group-item">
                <i class="fas fa-user-plus"></i> Agregar Trabajadora Social
              </a>   

              <a href="../superadministrador/users_vs.php" class="list-group-item">   
                  <i class="fa fa-users"></i> Trabajadora Social Registrada
              </a>

              <a href="../superadministrador/add-user_up.php" class="list-group-item">
                  <i class="fa fa-users"></i> Agregar Unidad de Proyectos     
              </a>

              <a href="../superadministrador/users_up.php" class="list-group-item">
                  <i class="fa fa-users"></i> Unidad de Proyectos Registrada    
              </a>
           
        <?php } ?>
</div>








    