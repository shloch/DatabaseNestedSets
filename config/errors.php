
<?php
    class Err {
    // class to handle errors
        public function invalideNode() {
          return "Invalid node id";
        }

        public function missingParams() {
          return "Missing mandatory params";
        }

        public function invalidPageNum() {
          return "Invalid page number requested";
        }

        public function invalidPageSize() {
          return "Invalid page size requested";
        }

        public function noNodeName($n) {
          return "Node name '" . $n . "' doesn't exist";
        }

        public function noChildUnder($node) {
          return "No child under '" . $node . "'";
        }

    }
?>