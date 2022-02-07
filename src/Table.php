<?php 

namespace dbGenerator;
class Table {

   
    
    protected string $tableName;
    protected array $columns;

    public function __construct(string $tableName) {
        $this->tableName = $tableName;
    }


    

    /**
     * Get the value of columns
     *
     * @return array
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * Set the value of columns
     *
     * @param array $columns
     *
     * @return self
     */
    public function setColumns(array $columns): self
    {
        $this->columns = $columns;

        return $this;
    }

    /**
     * Get the value of tableName
     *
     * @return string
     */
    public function getTableName(): string
    {
        return $this->tableName;
    }

    /**
     * Set the value of tableName
     *
     * @param string $tableName
     *
     * @return self
     */
    public function setTableName(string $tableName): self
    {
        $this->tableName = $tableName;

        return $this;
    }

    public function addColumn(array $infos){

        $this->columns[]= new Column($infos);
    }
}

?>