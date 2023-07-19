<?php 
session_start();
require_once "../model/codingskills-model.php";

$codingskills = new codingskills();

$id_codingskill=isset($_POST["id_codingskill"])? limpiarCadena($_POST["id_codingskill"]):"";
$language=isset($_POST["language"])? limpiarCadena($_POST["language"]):"";
$percentage=isset($_POST["percentage"])? limpiarCadena($_POST["percentage"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar1':

		if (empty($id_codingskill)){
			$rspta = $codingskills -> insertar1($language, $percentage);
            echo $rspta ? "Coding Skill Registered" : "Coding Skill not Registered";
		}
		else {
            $rspta = $codingskills -> editar1($id_codingskill, $language, $percentage);
            echo $rspta ? "Coding Skill Updated" : "Coding Skill not Updated";
		}

    break;

    case 'mostrar1':
		$rspta = $codingskills->mostrar1($id_codingskill);
 		//Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;
	break;

  case 'eliminar1':
		$rspta = $codingskills->eliminar1($id_codingskill);
	break;

	case 'listar1':
		$rspta=$codingskills->listar1();
 		//Vamos a declarar un array
        $data= Array();

        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>'<div style="display: flex;"><button class="btn btn-warning" onclick="mostrar1('.$reg->id_codingskill.')"><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger ml-3" onclick="eliminar1('.$reg->id_codingskill.')"><i class="fa fa-trash"></i></button></div>',
                "1"=>$reg->language,
                "2"=>$reg->percentage
                );
        }
        $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);

	break;
}
?>