<?php 
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once './config/config.php';
include_once './models/Model.php';
include_once './config/errors.php';
include_once './config/urlConfig.php';

//collecting GET optional params
$page_num = ($_GET['page_num'] == null) ? 0 : $_GET['page_num']; //optional
$page_size = ($_GET['page_size'] == null) ? 100 : $_GET['page_size']; //optional

$erroObject = new Err();
$urlValidity = isURLValid($erroObject);

if($urlValidity['isValid'] == false) {
  $response['error'] = $urlValidity['errorMsg'];
  echo json_encode($response);
} else {
  //instatntiate DB and conect
  $database = new Database();
  $db = $database->connect();

  //instantiate  post object
  $tree = new Model($db);

  //Tree post query
  $checkSearchname = $tree->checkIfNameExist($_GET['search']);
  if($num = $checkSearchname->rowCount() == 0) {
    echo json_encode(
      array('error' => $erroObject->noNodeName($_GET['search']) )
    );
  } else {
    $result = $tree->getTreeFromNode($_GET['node_id'], $_GET['search'], $_GET['language']);
    //get row count
    $num = $result->rowCount();


    // check if any post
    if($num > 0) {
      //post array
      $response = array();
      $response['data'] = array();

      while($row = $result->fetch(PDO::FETCH_ASSOC)) {
          extract($row);
          $tree_item = array(
              'idNode' => $idNode,
              'NodeName' => ($nodeName)
          );

          // push  to "data"
          array_push($response['data'], $tree_item);
      }
      //turn it to JSON $ output
      echo json_encode($response);
    } else {
      //no post
      echo json_encode(
          array('error' => $erroObject->invalideNode() )
      );
    }
  }
  

}





?>