<?php 
session_start();
require_once "../model/experience-model.php";

$experience = new experience();

$id_experience=isset($_POST["id_experience"])? limpiarCadena($_POST["id_experience"]):"";
$date=isset($_POST["date"])? limpiarCadena($_POST["date"]):"";
$title=isset($_POST["title"])? limpiarCadena($_POST["title"]):"";
$namejob=isset($_POST["namejob"])? limpiarCadena($_POST["namejob"]):"";
$description=isset($_POST["description"])? limpiarCadena($_POST["description"]):"";
$language=isset($_POST["language"])? limpiarCadena($_POST["language"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar5':

		if (empty($id_experience)){
			$rspta = $experience -> insertar5($date, $title, $namejob, $description, $language);
            echo $rspta ? "Experience Registered" : "Experience not Registered";
		}
		else {
            $rspta = $experience -> editar5($id_experience, $date, $title, $namejob, $description, $language);
            echo $rspta ? "Experience Updated" : "Experience not Updated";
		}

    break;

    case 'mostrar5':
		$rspta = $experience->mostrar5($id_experience);
 		//Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;
	break;

  case 'eliminar5':
		$rspta = $experience->eliminar5($id_experience);
	break;

	case 'listar5':
		$rspta=$experience->listar5();
 		//Vamos a declarar un array
        $data= Array();

        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>'<div style="display: flex;"><button class="btn btn-warning" onclick="mostrar5('.$reg->id_experience.')"><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger ml-3" onclick="eliminar5('.$reg->id_experience.')"><i class="fa fa-trash"></i></button></div>',
                "1"=>$reg->date,
                "2"=>$reg->title,
                "3"=>$reg->namejob,
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