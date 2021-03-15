<?php
class dbConfig{
    private $dbPath = 'json'.DIRECTORY_SEPERATOR;
    private $dirCheck;
    public function __construct(){
        $this->dirCheck = is_dir($this->dbPath);
    }

    public function getDbConfig(){
        try{
            if(!$this->dirCheck){
                Exception('Dosya Bulunamadı');
            }
            else if($this->dirCheck){
                Exception('Dosya Var');
            }
        }catch (\Exception $e){
            if($e->getCode() ===404){
                return 'Dosya Oluşturunuz';
            }
            else{
                return 'Dosya zaten Var';
            }
        }
    }

} 