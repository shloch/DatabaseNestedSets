
<?php

function isURLValid($errorObject) {
  $node_id = $_GET['node_id'];
  $language = $_GET['language'];
  $search = $_GET['search'];
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
