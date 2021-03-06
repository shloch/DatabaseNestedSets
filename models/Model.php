<?php 

class Model {

    private $connection;
    private $tree = 'node_tree';
    private $tree_names  = 'node_tree_names';

    //constructor with DB
    public function __construct($db) {
        $this->connection = $db;
    }

    //Get tree from specific node
    public function getTreeFromNode($nodeID, $search, $language='english', $page_size = 100, $page_num = 0 ) {
        //create query
         $query = 'SELECT n.idNode, n.nodeName, t.level AS parentLevel FROM node_tree_names n 
                   INNER JOIN node_tree t ON t.idNode = n.idNode 
                   WHERE (n.language = \'' .$language. '\') AND (n.idNode IN (SELECT node.idNode FROM node_tree AS node, node_tree AS parent 
                                                  INNER JOIN node_tree_names t ON t.idNode = parent.idNode 
                                                  WHERE (node.iLeft BETWEEN parent.iLeft AND parent.iRight) AND (parent.idNode = \''. $nodeID .'\') AND (t.language = \''.$language.'\') 
                                                  ORDER BY node.iLeft))';
        
        $query = $query . " LIMIT " . ( ( $page_num ) * $page_size ) . ", $page_size ";
        
        //prepare statements
        $satement = $this->connection->prepare($query);
        $satement->execute();
        return $satement;
    }


    public function checkIfNameExist($search) {
        //create query
        $query = 'SELECT n.nodeName FROM node_tree_names n 
                    WHERE (n.nodeName = \'' .$search. '\')';

        //prepare statements
        $satement = $this->connection->prepare($query);
        $satement->execute();
        return $satement;
    }

    //ensure that searched NODE NAME matches the NodeID passed in search
    public function nodeID_searchString_match($nodeID, $search) {
        $query = 'SELECT n.nodeName FROM node_tree_names n 
                  WHERE (n.nodeName = \'' .$search. '\')
                  AND (n.idNode = \'' .$nodeID. '\')';

        //prepare statements
        $satement = $this->connection->prepare($query);
        $satement->execute();
        $total = $satement->rowCount();
        return $total;
    }

}

?>