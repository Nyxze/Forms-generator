<?php 
namespace dbGenerator;

use dbGenerator\FormFields\BaseFormField;
use dbGenerator\FormFields\FloatFormField;
use dbGenerator\FormFields\IntegerFormField;
use dbGenerator\FormFields\DateFormField;
use dbGenerator\FormFields\SelectFormField;
use dbGenerator\Table;
class FormGenerator{
    private array $sqlTypeMap = [

        "varchar"=>"text",
        "int"=>"int",
        "mediumint"=>"int",
        "text"=>"textarea",
        "decimal"=>"float",
        "date"=>"date",
        "datetime"=>"date",
        "smallint"=>"int",
        "char"=>"text",
        "tinyint"=>"int"
    ];
    
    private array $fieldsMap = [
        "text"=>BaseFormField::class,
        "int"=>IntegerFormField::class,
        "date"=>DateFormField::class,
        "float"=>FloatFormField::class

    ];

    private Table $table;

    public function __construct(Table $table)
    {
        $this->table= $table;
    }

    private function getFormField(Column $col){
        $type = $this->sqlTypeMap[$col->getType()];
        if(array_key_exists($type,$this->fieldsMap)){
            if($col->isForeignKey()){
                $className = SelectFormField::class;

            }else{
                $className = $this->fieldsMap[$type];
            }
            

        }else{

            $className = BaseFormField::class;
        }
        
        $instance = new $className($col->getColName());

        return $instance;

    }

    public function render ():string{
        $form = "<form method = \"post\">";
        foreach($this->table->getColumns() as $row){

            $label = str_replace("_"," ", $row->getColName());
            $form .="<div>";
            $form .="<label>$label</label>";

            $form .= $this->getFormField($row);
            $form .= "</div>";

        }
        $form .= "<input type='submit' value='Submit'></form>";
        
        return $form;
    }

    public function save():void{
        $path ="output/".$this->table->getTableName().".html";
        file_put_contents($path,$this->render());


    }


}
?>