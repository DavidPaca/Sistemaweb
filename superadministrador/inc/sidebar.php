<?php
$session_role1 = $_SESSION['roleSS'];
//echo('hola');
//echo($session_role1);

$num_cdi = $_REQUEST['numcdi'];
//echo $num_cdi;
//$num_per = $_REQUEST['numper'];
//echo $num_per;

//$get_comment = "SELECT * FROM comments WHERE status = 'pendiente'";
//$get_comment_run = mysqli_query($con, $get_comment);
//$num_of_rows = mysqli_num_rows($get_comment_run);

$sql = "SELECT * FROM `tbl_cdi` WHERE id = $num_cdi";
$run = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($run)) {                                                 
    $recha_ali = $row['nombre']; 
    //echo $recha_ali,", ";

}

?>
<!--xxxxxxxxxxxxxxxxxxxxxxxxx MENU FICHAS NIÑOS Administrador sistema xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div class="list-group rojo" >

      <?php
       if ($session_role1 == '1') {
      ?>
        <a href="index_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item active" style="background-color:#595757">  
            <i class="fas fa-home"></i>  Fichas de los Niños - <?php echo $recha_ali;  ?>
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
                  <h5 class=" letrasmenuficha">
                    <button class="btn collapsed" style="color:#555555" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      DATOS PERSONALES DEL NIÑO(A)
                    </button>
                  </h5>
                </div>

                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <!--<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"> -->
                    <div class="card-body">
                      <a href="ing_dp_ninio_SU_AD.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                        <i class="fa fa-users"></i> Ingrese los Datos Personales del Niño(a) 
                      </a>
                      <a href="niniosregistrados_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
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
                    <a href="niniosregistrados_ei_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fa fa-folder-open"></i> Ingrese Entrevista Inicial
                    </a>
                    <a href="nientrevistaregistrada_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
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
                  <a href="niniosregistrados_ing_se_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                    <i class="fa fa-folder-open"></i> Ingrese Información Socio Económica
                  </a>
                  <a href="nisocioeconomico_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                    <i class="fa fa-folder-open"></i> Información Socio Económica Registrada
                  </a>
               </div>
             </div>
          </div>


          <div class="list-group-item">
            <div class="card-header quitarespaciosidebar" id="headingFour">
              <h5 class="letrasmenuficha">
                <a href="niniosregistrados_acta_compromiso_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" >
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
                <a href="niniosregistrados_vacunas_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" >
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
                <a href="menuprincipalprocesos_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" >
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
                <a href="menuprincipal_reportes_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" >
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

<!--xxxxxxxxxxxxxxxxxxxxxxxxx MENU FICHAS NIÑOS COORDINADOR GENERAL xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div class="list-group rojo" >

      <?php
       if ($session_role1 == '2') {
      ?>
        <a href="index_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item active" style="background-color:#595757">  
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
                  <h5 class=" letrasmenuficha">
                    <button class="btn collapsed" style="color:#555555" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      DATOS PERSONALES DEL NIÑO(A)
                    </button>
                  </h5>
                </div>

                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <!--<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"> -->
                    <div class="card-body">
                      <a href="ing_dp_ninio_SU_AD.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                        <i class="fa fa-users"></i> Ingrese los Datos Personales del Niño(a) 
                      </a>
                      <a href="niniosregistrados_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
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
                    <a href="niniosregistrados_ei_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fa fa-folder-open"></i> Ingrese Entrevista Inicial
                    </a>
                    <a href="nientrevistaregistrada_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
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
                  <a href="niniosregistrados_ing_se_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                    <i class="fa fa-folder-open"></i> Ingrese Información Socio Económica
                  </a>
                  <a href="nisocioeconomico_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                    <i class="fa fa-folder-open"></i> Información Socio Económica Registrada
                  </a>
               </div>
             </div>
          </div>


          <div class="list-group-item">
            <div class="card-header quitarespaciosidebar" id="headingFour">
              <h5 class="letrasmenuficha">
                <a href="niniosregistrados_acta_compromiso_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" >
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
                <a href="menuprincipalprocesos_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" >
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

<!--xxxxxxxxxxxxxxxxxxxxxxxxx MENU FICHAS VISITADORA SOCIAL xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div class="list-group rojo" >

      <?php
       if ($session_role1 == '3') {
      ?>
        <a href="index_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item active" style="background-color:#595757">  
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
                  <h5 class=" letrasmenuficha">
                    <button class="btn collapsed" style="color:#555555" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      DATOS PERSONALES DEL NIÑO(A)
                    </button>
                  </h5>
                </div>

                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <!--<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"> -->
                    <div class="card-body">
                   <!--   <a href="ing_dp_ninio_SU_AD.php?numcdi=<?php //echo $num_cdi; ?>&numper=<?php //echo $num_per; ?>" class="list-group-item">
                        <i class="fa fa-users"></i> Ingrese los Datos Personales del Niño(a) 
                      </a>  -->
                      <a href="niniosregistrados_VIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
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
                   <!-- <a href="niniosregistrados_ei_CDIS.php?numcdi=<?php //echo $num_cdi; ?>&numper=<?php //echo $num_per; ?>" class="list-group-item">
                      <i class="fa fa-folder-open"></i> Ingrese Entrevista Inicial
                    </a> -->
                    <a href="nientrevistaregistrada_VIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
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
                  <a href="niniosregistrados_ing_se_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                    <i class="fa fa-folder-open"></i> Ingrese Información Socio Económica
                  </a>  
                  <a href="nisocioeconomico_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                    <i class="fa fa-folder-open"></i> Información Socio Económica Registrada
                  </a>
               </div>
             </div>
          </div>


   <!--       <div class="list-group-item">
            <div class="card-header quitarespaciosidebar" id="headingFour">
              <h5 class="letrasmenuficha">
                <a href="niniosregistrados_acta_compromiso_CDIS.php?numcdi=<?php //echo $num_cdi; ?>&numper=<?php //echo $num_per; ?>" >
                  <button class="btn collapsed" style="color:#555555" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    ACTA DE COMPROMISO
                  </button>
                </a>                
              </h5>
            </div>
          </div> -->

    <!--      <div class="list-group-item">
            <div class="card-header quitarespaciosidebar" id="headingFour">
              <h5 class="letrasmenuficha">
                <a href="menuprincipalprocesos_CDIS.php?numcdi=<?php //echo $num_cdi; ?>&numper=<?php //echo $num_per; ?>" >
                  <button class="btn collapsed" style="color:#555555" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    PROCESOS
                  </button>
                </a>                
              </h5>
            </div>
          </div>  -->

          <div class="list-group-item">
            <div class="card-header quitarespaciosidebar" id="headingFour">
              <h5 class="letrasmenuficha">
                <a href="menuprincipal_reportes_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" >
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

<!--xxxxxxxxxxxxxxxxxxxxxxxxx MENU FICHAS VISITADORA SOCIAL xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx-->

<div class="list-group rojo" >

      <?php
       if ($session_role1 == '6') {
      ?>
        <a href="index_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item active" style="background-color:#595757">  
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
                  <h5 class=" letrasmenuficha">
                    <button class="btn collapsed" style="color:#555555" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      DATOS PERSONALES DEL NIÑO(A)
                    </button>
                  </h5>
                </div>

                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <!--<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion"> -->
                    <div class="card-body">
                      <a href="ing_dp_ninio_SU_AD.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                        <i class="fa fa-users"></i> Ingrese los Datos Personales del Niño(a) 
                      </a>  
                      <a href="niniosregistrados_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
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
                 <a href="niniosregistrados_ei_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                      <i class="fa fa-folder-open"></i> Ingrese Entrevista Inicial
                    </a> 
                    <a href="nientrevistaregistrada_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
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
                  <a href="niniosregistrados_ing_se_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                    <i class="fa fa-folder-open"></i> Ingrese Información Socio Económica
                  </a>  
                  <a href="nisocioeconomico_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" class="list-group-item">
                    <i class="fa fa-folder-open"></i> Información Socio Económica Registrada
                  </a>
               </div>
             </div>
          </div>


         <div class="list-group-item">
            <div class="card-header quitarespaciosidebar" id="headingFour">
              <h5 class="letrasmenuficha">
                <a href="niniosregistrados_acta_compromiso_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" >
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
                <a href="menuprincipalprocesos_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" >
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
                <a href="menuprincipal_reportes_CDIS.php?numcdi=<?php echo $num_cdi; ?>&numper=<?php echo $num_per; ?>" >
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



<!--XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX MENU ADMIN SISTEMA XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX-->
<!--<div class="list-group rojo"  >
      <?php
      // if ($session_role1 == '1') {
      ?>
      <a href="../admin/index.php" class="list-group-item active" style="background-color:#595757">
        <i class="fas fa-home"></i>  Menu principal
      </a> -->
 
   
        <!--<a href="comments.php" class="list-group-item">
            <?php
             // if ($num_of_rows > 0) {
            //    echo "<span class='badge'>$num_of_rows</span>";
             // }
            ?>
              <i class="fa fa-comment"></i> Comentarios Realizados
               </a>-->
       
               <!--<a href="../superadministrador/add-user_cg.php" class="list-group-item">
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
              
              <div class="list-group-item">
                      <div class="card-header quitarespaciosidebar" id="headingTwo">
                        <h5 class="letrasmenuficha">
                        <i class="fas fa-university"></i>
                          <button class="btn collapsed" style="color:#555555" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            Centros de desarrollo Infantil
                          </button>
                        </h5>
                      </div>
                          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">

                              <a href="menu_principal_periodos.php?numcdi=<?php //echo $num_cdi; ?>&numper=<?php //echo $num_per;?>" class="list-group-item">
                                <i class="fa fa-folder-open"></i> CDI 1
                              </a>
                              <a href="menu_principal_periodos.php?numcdi=<?php //echo $num_cdi; ?>&numper=<?php //echo $num_per;?>" class="list-group-item">
                                <i class="fa fa-folder-open"></i> CDI 2
                              </a>
                              <a href="menu_principal_periodos.php?numcdi=<?php //echo $num_cdi; ?>&numper=<?php //echo $num_per;?>" class="list-group-item">
                                <i class="fa fa-folder-open"></i> CDI 3
                              </a>
                              <a href="menu_principal_periodos.php?numcdi=<?php //echo $num_cdi; ?>&numper=<?php //echo $num_per;?>" class="list-group-item">
                                <i class="fa fa-folder-open"></i> CDI 4
                              </a>
                              <a href="menu_principal_periodos.php?numcdi=<?php //echo $num_cdi; ?>&numper=<?php //echo $num_per;?>" class="list-group-item">
                                <i class="fa fa-folder-open"></i> CDI 5
                              </a>
                              <a href="menu_principal_periodos.php?numcdi=<?php //echo $num_cdi; ?>&numper=<?php //echo $num_per;?>" class="list-group-item">
                                <i class="fa fa-folder-open"></i> CDI 6
                              </a>
                            </div>
                          </div>
                    </div>
              
 
        <?php //} ?>
</div> --> 


          









    