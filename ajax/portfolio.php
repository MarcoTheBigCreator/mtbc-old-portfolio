<?php 
session_start();
require_once "../model/portfolio-model.php";

$portfolio = new portfolio();

$id_portfolio=isset($_POST["id_portfolio"])? limpiarCadena($_POST["id_portfolio"]):"";
$class=isset($_POST["class"])? limpiarCadena($_POST["class"]):"";
$link=isset($_POST["link"])? limpiarCadena($_POST["link"]):"";
$imgroute=isset($_POST["imgroute"])? limpiarCadena($_POST["imgroute"]):"";
$name=isset($_POST["name"])? limpiarCadena($_POST["name"]):"";
$description=isset($_POST["description"])? limpiarCadena($_POST["description"]):"";
$language=isset($_POST["language"])? limpiarCadena($_POST["language"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar7':

		if (empty($id_portfolio)){
			$rspta = $portfolio -> insertar7($class, $link, $imgroute, $name, $description, $language);
            echo $rspta ? "Portfolio Registered" : "Portfolio not Registered";
		}
		else {
            $rspta = $portfolio -> editar7($id_portfolio, $class, $link, $imgroute, $name, $description, $language);
            echo $rspta ? "Portfolio Updated" : "Portfolio not Updated";
		}

    break;

    case 'mostrar7':
		$rspta = $portfolio->mostrar7($id_portfolio);
 		//Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;
	break;

  case 'eliminar7':
		$rspta = $portfolio->eliminar7($id_portfolio);
	break;

	case 'listar7':
		$rspta=$portfolio->listar7();
 		//Vamos a declarar un array
        $data= Array();

        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>'<div style="display: flex;"><button class="btn btn-warning" onclick="mostrar7('.$reg->id_portfolio.')"><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger ml-3" onclick="eliminar7('.$reg->id_portfolio.')"><i class="fa fa-trash"></i></button></div>',
                "1"=>$reg->class,
                "2"=>$reg->link,
                "3"=>$reg->imgroute,
                "4"=>$reg->name,
                "5"=>$reg->description,
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