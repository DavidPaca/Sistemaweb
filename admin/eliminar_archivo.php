<?php  

echo("hola");
$id=$_GET['del'];
echo($id);
try {
    require_once('inc/top.php');
    $sql="DELETE  FROM tbl_user_doc WHERE id_doc = $id";
    $result= $con-> query($sql);
    $sql2="DELETE FROM tbl_documents WHERE id_doc = $id";
    $result2=$con->query($sql2);           
    
    header('Location:listaAñadirPdf.php');

    }catch(Exception $e){
        $error=$e->getMessage();
            
    }
        
        
        

?>

