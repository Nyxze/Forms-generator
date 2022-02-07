<?php 
namespace dbGenerator;

class Column {

private string $colName;
private string $type;
private bool $primary;
private bool $autoIncrement;
private bool $nullable;
private bool $foreignKey;


public function __construct(array $infos){
    $this->colName = $infos["Field"];
    $this->type = $this->getCleanType($infos["Type"]);
    $this->primary = $infos["Key"]=="PRI";
    $this->foreignKey = $infos["Key"]=="MUL";
    $this->nullable = $infos["Null"]=="YES";
    $this->autoIncrement = $infos["Extra"] == "auto_increment";

}

private function getCleanType(string $type){

    $type = str_replace("unsigned","",$type);
    if(str_contains($type,")")){
        preg_match("/([a-z0-9_]+)(\([0-9,]+\))/",$type,$matches);
        return $matches[1];

    }else{
        return $type;
    }

}



    

/**
 * Get the value of colName
 *
 * @return string
 */
public function getColName(): string
{
return $this->colName;
}

/**
 * Set the value of colName
 *
 * @param string $colName
 *
 * @return self
 */
public function setColName(string $colName): self
{
$this->colName = $colName;

return $this;
}

/**
 * Get the value of type
 *
 * @return string
 */
public function getType(): string
{
return $this->type;
}

/**
 * Set the value of type
 *
 * @param string $type
 *
 * @return self
 */
public function setType(string $type): self
{
$this->type = $type;

return $this;
}

/**
 * Get the value of primary
 *
 * @return bool
 */
public function isPrimary(): bool
{
return $this->primary;
}

/**
 * Set the value of primary
 *
 * @param bool $primary
 *
 * @return self
 */
public function setPrimary(bool $primary): self
{
$this->primary = $primary;

return $this;
}

/**
 * Get the value of autoIncrement
 *
 * @return bool
 */
public function isAutoIncrement(): bool
{
return $this->autoIncrement;
}

/**
 * Set the value of autoIncrement
 *
 * @param bool $autoIncrement
 *
 * @return self
 */
public function setAutoIncrement(bool $autoIncrement): self
{
$this->autoIncrement = $autoIncrement;

return $this;
}

/**
 * Get the value of nullable
 *
 * @return bool
 */
public function isNullable(): bool
{
return $this->nullable;
}

/**
 * Set the value of nullable
 *
 * @param bool $nullable
 *
 * @return self
 */
public function setNullable(bool $nullable): self
{
$this->nullable = $nullable;

return $this;
}

/**
 * Get the value of foreignKey
 *
 * @return bool
 */
public function isForeignKey(): bool
{
return $this->foreignKey;
}

/**
 * Set the value of foreignKey
 *
 * @param bool $foreignKey
 *
 * @return self
 */
public function setForeignKey(bool $foreignKey): self
{
$this->foreignKey = $foreignKey;

return $this;
}



}

?>