<?php 
session_start();
require_once "../model/designskills-model.php";

$designskills = new designskills();

$id_designskill=isset($_POST["id_designskill"])? limpiarCadena($_POST["id_designskill"]):"";
$skill=isset($_POST["skill"])? limpiarCadena($_POST["skill"]):"";
$percentage=isset($_POST["percentage"])? limpiarCadena($_POST["percentage"]):"";
$language=isset($_POST["language"])? limpiarCadena($_POST["language"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar3':

		if (empty($id_designskill)){
			$rspta = $designskills -> insertar3($skill, $percentage, $language);
            echo $rspta ? "Design Skill Registered" : "Design Skill not Registered";
		}
		else {
            $rspta = $designskills -> editar3($id_designskill, $skill, $percentage, $language);
            echo $rspta ? "Design Skill Updated" : "Design Skill not Updated";
		}

    break;

    case 'mostrar3':
		$rspta = $designskills->mostrar3($id_designskill);
 		//Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;
	break;

  case 'eliminar3':
		$rspta = $designskills->eliminar3($id_designskill);
	break;

	case 'listar3':
		$rspta=$designskills->listar3();
 		//Vamos a declarar un array
        $data= Array();

        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>'<div style="display: flex;"><button class="btn btn-warning" onclick="mostrar3('.$reg->id_designskill.')"><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger ml-3" onclick="eliminar3('.$reg->id_designskill.')"><i class="fa fa-trash"></i></button></div>',
                "1"=>$reg->skill,
                "2"=>$reg->percentage,
                "3"=>$reg->language
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