<?php 
session_start();
require_once "../model/education-model.php";

$education = new education();

$id_education=isset($_POST["id_education"])? limpiarCadena($_POST["id_education"]):"";
$date=isset($_POST["date"])? limpiarCadena($_POST["date"]):"";
$title=isset($_POST["title"])? limpiarCadena($_POST["title"]):"";
$nameschool=isset($_POST["nameschool"])? limpiarCadena($_POST["nameschool"]):"";
$description=isset($_POST["description"])? limpiarCadena($_POST["description"]):"";
$language=isset($_POST["language"])? limpiarCadena($_POST["language"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar4':

		if (empty($id_education)){
			$rspta = $education -> insertar4($date, $title, $nameschool, $description, $language);
            echo $rspta ? "Education Registered" : "Education not Registered";
		}
		else {
            $rspta = $education -> editar4($id_education, $date, $title, $nameschool, $description, $language);
            echo $rspta ? "Education Updated" : "Education not Updated";
		}

    break;

    case 'mostrar4':
		$rspta = $education->mostrar4($id_education);
 		//Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;
	break;

  case 'eliminar4':
		$rspta = $education->eliminar4($id_education);
	break;

	case 'listar4':
		$rspta=$education->listar4();
 		//Vamos a declarar un array
        $data= Array();

        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>'<div style="display: flex;"><button class="btn btn-warning" onclick="mostrar4('.$reg->id_education.')"><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger ml-3" onclick="eliminar4('.$reg->id_education.')"><i class="fa fa-trash"></i></button></div>',
                "1"=>$reg->date,
                "2"=>$reg->title,
                "3"=>$reg->nameschool,
                "4"=>$reg->description,
                "5"=>$reg->language
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