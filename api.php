<?php 
//headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once './config/config.php';
include_once './models/Model.php';
include_once './config/errors.php';
include_once './config/urlCheck.php';

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

  //instantiate  data object
  $tree = new Model($db);

  //Tree data query
  $checkSearchname = $tree->checkIfNameExist($_GET['search']);
  if($num = $checkSearchname->rowCount() == 0) {
    echo json_encode(
      array('error' => $erroObject->noNodeName($_GET['search']) )
    );
  } else {
    if($tree->nodeID_searchString_match($_GET['node_id'], $_GET['search']) == 0) {
      echo json_encode(array('error' => $erroObject->nodeID_nodeName_mismatch($_GET['node_id'], $_GET['search'])));
    } else {
      $result = $tree->getTreeFromNode($_GET['node_id'], $_GET['search'], $_GET['language'], $page_size, $page_num);
      $num = $result->rowCount();
  
      if($num > 0) {
        $response = array();
        $response['data'] = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);     
            if($idNode != $_GET['node_id']) {       
              $tree_item = array(
                'idNode' => $idNode,
                'NodeName' => $nodeName
              );
              array_push($response['data'], $tree_item);
            }
        }
        if(count($response['data']) == 0) {
          echo json_encode(
            array('error' => $erroObject->noChildUnder($_GET['search']) )
          );
        } else {
          echo json_encode($response);
        }
        
      } else {
        //no matching data
        echo json_encode(
            array('error' => $erroObject->generalError() )
        );
      }
    }
   
  }
}

?>