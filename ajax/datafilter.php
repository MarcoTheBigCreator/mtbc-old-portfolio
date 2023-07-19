<?php 
session_start();
require_once "../model/datafilter-model.php";

$datafilter = new datafilter();

$id_datafilter=isset($_POST["id_datafilter"])? limpiarCadena($_POST["id_datafilter"]):"";
$class=isset($_POST["class"])? limpiarCadena($_POST["class"]):"";
$filter=isset($_POST["filter"])? limpiarCadena($_POST["filter"]):"";
$language=isset($_POST["language"])? limpiarCadena($_POST["language"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar2':

		if (empty($id_datafilter)){
			$rspta = $datafilter -> insertar2($class, $filter, $language);
            echo $rspta ? "Data Filter Registered" : "Data Filter not Registered";
		}
		else {
            $rspta = $datafilter -> editar2($id_datafilter, $class, $filter ,$language);
            echo $rspta ? "Data Filter Updated" : "Data Filter not Updated";
		}

    break;

    case 'mostrar2':
		$rspta = $datafilter->mostrar2($id_datafilter);
 		//Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;
	break;

  case 'eliminar2':
		$rspta = $datafilter->eliminar2($id_datafilter);
	break;

	case 'listar2':
		$rspta=$datafilter->listar2();
 		//Vamos a declarar un array
        $data= Array();

        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>'<div style="display: flex;"><button class="btn btn-warning" onclick="mostrar2('.$reg->id_datafilter.')"><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger ml-3" onclick="eliminar2('.$reg->id_datafilter.')"><i class="fa fa-trash"></i></button></div>',
                "1"=>$reg->class,
                "2"=>$reg->filter,
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