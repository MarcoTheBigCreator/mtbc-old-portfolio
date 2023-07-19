<?php 
session_start();
require_once "../model/geninfo-model.php";

$geninfo = new geninfo();

$id_geninfo=isset($_POST["id_geninfo"])? limpiarCadena($_POST["id_geninfo"]):"";
$description=isset($_POST["description"])? limpiarCadena($_POST["description"]):"";
$location=isset($_POST["location"])? limpiarCadena($_POST["location"]):"";
$clocation=isset($_POST["clocation"])? limpiarCadena($_POST["clocation"]):"";
$age=isset($_POST["age"])? limpiarCadena($_POST["age"]):"";
$gender=isset($_POST["gender"])? limpiarCadena($_POST["gender"]):"";
$language=isset($_POST["language"])? limpiarCadena($_POST["language"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar6':

		if (empty($id_geninfo)){
			$rspta = $geninfo -> insertar6($description, $location, $clocation, $age, $gender, $language);
            echo $rspta ? "GenInfo Registered" : "GenInfo not Registered";
		}
		else {
            $rspta = $geninfo -> editar6($id_geninfo, $description, $location, $clocation, $age, $gender, $language);
            echo $rspta ? "GenInfo Updated" : "GenInfo not Updated";
		}

    break;

    case 'mostrar6':
		$rspta = $geninfo->mostrar6($id_geninfo);
 		//Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;
	break;

  case 'eliminar6':
		$rspta = $geninfo->eliminar6($id_geninfo);
	break;

	case 'listar6':
		$rspta=$geninfo->listar6();
 		//Vamos a declarar un array
        $data= Array();

        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>'<div style="display: flex;"><button class="btn btn-warning" onclick="mostrar6('.$reg->id_geninfo.')"><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger ml-3" onclick="eliminar6('.$reg->id_geninfo.')"><i class="fa fa-trash"></i></button></div>',
                "1"=>$reg->description,
                "2"=>$reg->location,
                "3"=>$reg->clocation,
                "4"=>$reg->age,
                "5"=>$reg->gender,
                "6"=>$reg->language
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