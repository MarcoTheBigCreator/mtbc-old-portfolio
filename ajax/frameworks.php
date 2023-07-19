<?php 
session_start();
require_once "../model/frameworks-model.php";

$frameworks = new frameworks();

$id_framework=isset($_POST["id_framework"])? limpiarCadena($_POST["id_framework"]):"";
$framework=isset($_POST["framework"])? limpiarCadena($_POST["framework"]):"";
$percentage=isset($_POST["percentage"])? limpiarCadena($_POST["percentage"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar10':

		if (empty($id_framework)){
			$rspta = $frameworks -> insertar10($framework, $percentage);
            echo $rspta ? "Coding Skill Registered" : "Coding Skill not Registered";
		}
		else {
            $rspta = $frameworks -> editar10($id_framework, $framework, $percentage);
            echo $rspta ? "Coding Skill Updated" : "Coding Skill not Updated";
		}

    break;

    case 'mostrar10':
		$rspta = $frameworks->mostrar10($id_framework);
 		//Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;
	break;

  case 'eliminar10':
		$rspta = $frameworks->eliminar10($id_framework);
	break;

	case 'listar10':
		$rspta=$frameworks->listar10();
 		//Vamos a declarar un array
        $data= Array();

        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>'<div style="display: flex;"><button class="btn btn-warning" onclick="mostrar10('.$reg->id_framework.')"><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger ml-3" onclick="eliminar10('.$reg->id_framework.')"><i class="fa fa-trash"></i></button></div>',
                "1"=>$reg->framework,
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