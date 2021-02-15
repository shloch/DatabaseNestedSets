
<?php

function isURLValid($errorObject) {
  $node_id = $_GET['node_id'];
  $language = $_GET['language'];
  $search = $_GET['search'];
  $page_num = ($_GET['page_num'] == null) ? 0 : $_GET['page_num']; //optional
  $page_size = ($_GET['page_size'] == null) ? 100 : $_GET['page_size']; //optional

  $arr = array("isValid"=> True, "errorMsg" => "Success");

  if ($node_id == null || $language == null || $search == null) {
    $arr["isValid"] = false;
    $arr["errorMsg"] = $errorObject->missingParams();
    return $arr;
  }

  if ($node_id != null && !ctype_digit($node_id)){
    $arr["isValid"] = false;
    $arr["errorMsg"] = $errorObject->invalideNode();
    return $arr;
  }
  
  if ($page_num != null && !ctype_digit($page_num)){
    $arr["isValid"] = false;
    $arr["errorMsg"] = $errorObject->invalidPageNum();
    return $arr;
  }

  

  return $arr;

}
  
?>
