
<?php

function isURLValid($errorObject) {
  $node_id = $_GET['node_id'];
  $language = $_GET['language'];
  $search = $_GET['search'];
  $page_num = ($_GET['page_num'] == null) ? 0 : $_GET['page_num']; //optional
  $page_size = ($_GET['page_size'] == null) ? 100 : $_GET['page_size']; //optional
  $arr = array("isValid"=> True, "errorMsg" => "Success");

  // checking Missing mandatory params
  if ($node_id == null || $language == null || $search == null) {
    $arr["isValid"] = false;
    $arr["errorMsg"] = $errorObject->missingParams();
    return $arr;
  }

  // check if NODE_ID is not valid number
  if ($node_id != null && !ctype_digit($node_id)){
    $arr["isValid"] = false;
    $arr["errorMsg"] = $errorObject->invalideNode();
    return $arr;
  }
  
  // check if PAGE_NUM is not valid number
  if ($page_num != null && !ctype_digit($page_num)){
    $arr["isValid"] = false;
    $arr["errorMsg"] = $errorObject->invalidPageNum();
    return $arr;
  }

  // check if PAGE_SIZE is out of Range
  if (ctype_digit($page_size)){
    if(($page_size < 0) || ($page_size > 1000)) {
      $arr["isValid"] = false;
      $arr["errorMsg"] = $errorObject->invalidPageSize();
      return $arr;
    }
    
  }

  return $arr;

}
  
?>
