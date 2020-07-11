<?php  

echo("hola");
$id=$_GET['del'];
echo($id);
try {
    require_once('inc/top.php');
    $sql="DELETE  FROM tbl_concurso WHERE id_con = $id";
    $result= $con-> query($sql);
             
    
    header('Location:concursopublicado.php');

    }catch(Exception $e){
        $error=$e->getMessage();
            
    }
        
        
        

?>

