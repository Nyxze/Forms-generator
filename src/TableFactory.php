<?php 
namespace dbGenerator;
use \PDO ;
use dbGenerator\Table;

class TableFactory{

    private PDO $pdo;

    function __construct(PDO $pdo){
        $this->pdo  = $pdo;
    }

    public function makeTable(string $tableName):Table{
        $sql = "DESCRIBE `$tableName`; ";

        $resultSet = $this->pdo->query($sql);
        $data = $resultSet->fetchAll(PDO::FETCH_ASSOC);
        $resultSet = null;
        
        $table = new Table($tableName);

        foreach($data as $row){
            $table->addColumn($row);
        }

        return $table;

    }
    



}


?>