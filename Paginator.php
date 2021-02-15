<?php
  
class Paginator {
  
  private $_conn;
  private $_limit;
  private $_page;
  private $_query;
  private $_total;

  public function __construct( $conn, $query ) {
    
    $this->_conn = $conn;
    $this->_query = $query;
  
    $rs= $this->_conn->query( $this->_query );
    $this->_total = $rs->num_rows;     
  }

  public function getData( $limit = 10, $page = 1 ) {
      
    $this->_limit   = $limit;
    $this->_page    = $page;
  
    if ( $this->_limit == 'all' ) {
        $query      = $this->_query;
    } else {
        $query      = $this->_query . " LIMIT " . ( ( $this->_page - 1 ) * $this->_limit ) . ", $this->_limit";
    }
    $rs             = $this->_conn->query( $query );
  
    while ( $row = $rs->fetch_assoc() ) {
        $results[]  = $row;
    }
  
    $result         = new stdClass();
    $result->page   = $this->_page;
    $result->limit  = $this->_limit;
    $result->total  = $this->_total;
    $result->data   = $results;
  
    return $result;
}
  
}