<?php 
session_start();
require_once "../model/users-model.php";

$users = new users();

$id_user=isset($_POST["id_user"])? limpiarCadena($_POST["id_user"]):"";
$user_name=isset($_POST["user_name"])? limpiarCadena($_POST["user_name"]):"";
$user_nick=isset($_POST["user_nick"])? limpiarCadena($_POST["user_nick"]):"";
$password=isset($_POST["password"])? limpiarCadena($_POST["password"]):"";
$user_type=isset($_POST["user_type"])? limpiarCadena($_POST["user_type"]):"";
$opcion=isset($_POST["op"])?$_POST["op"]:$_REQUEST["op"];

switch ($opcion){
	case 'guardaryeditar9':

		if (empty($id_user)){
			$rspta = $users -> insertar9($user_name, $user_nick, $password, $user_type);
            echo $rspta ? "User registered" : "User not Registered";
		}
		else {
            $rspta = $users -> editar9($id_user, $user_name, $user_nick, $password, $user_type);
            echo $rspta ? "User Updated" : "User not Updated";
		}

    break;

    case 'mostrar9':
		$rspta = $users->mostrar9($id_user);
 		//Codificar el resultado utilizando json
        echo json_encode($rspta);
        break;
	break;

  case 'eliminar9':
		$rspta = $users->eliminar9($id_user);
	break;

	case 'listar9':
		$rspta=$users->listar9();
 		//Vamos a declarar un array
        $data= Array();

        while ($reg=$rspta->fetch_object()){
            $data[]=array(
                "0"=>'<div style="display: flex;"><button class="btn btn-warning" onclick="mostrar9('.$reg->id_user.')"><i class="fa fa-pencil"></i></button>
                <button class="btn btn-danger" onclick="eliminar9('.$reg->id_user.')"><i class="fa fa-trash"></i></button></div>',
                "1"=>$reg->user_name,
                "2"=>$reg->user_nick,
                "3"=>$reg->password,
                "4"=>$reg->user_type
                );
        }
        $results = array(
 			"sEcho"=>1, //Información para el datatables
 			"iTotalRecords"=>count($data), //enviamos el total registros al datatable
 			"iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);

	break;

  case 'verificar':
  $user_name=$_POST['logina'];
  $user_key=$_POST['clavea'];
  $rspta=$users->verificar($user_name,$user_key);

  while ($row = $rspta->fetch_object()){
    $user_arr[] = $row;
    }

   if ($user_arr)
     {
        //session_start();
         //Declaramos las variables de sesión
         $_SESSION["id_user"]=$user_arr[0]->id_user;
         $_SESSION["user_name"]=$user_arr[0]->user_name;
         $_SESSION['user_nick']=$user_arr[0]->user_nick;
         $_SESSION['password']=$user_arr[0]->password;
         $_SESSION['user_type']=$user_arr[0]->user_type;
     }
     //var_dump( $_SESSION["nombre"]);
    echo json_encode(array('data'=>$user_arr));
break;
}
?>