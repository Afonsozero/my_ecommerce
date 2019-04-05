<?php  

namespace Principal\Model;//pasta dessa classe

use \Principal\DB\Sql;//para usar a classe sql
use \Principal\Model;
use \Principal\Mailer;


class Category extends Model {

	

  


   public static function listAll(){//lista os usuarios

   	$sql = new Sql();

   	return $sql->select("SELECT * FROM tb_categories ORDER BY descategory"); // pega os usuarios das duas tabelas
   }

   public function save(){


   	$sql = new Sql();


	//chamando procedures que são consultas masi rapidas no banco
	$result = $sql->select("CALL sp_categories_save(:idcategory, :descategory)", array(//passa os dados que estao no atributo, chave=>this->atributo
		":idcategory"=>$this->getidcategory(),
		":descategory"=>$this->getdescategory(),
		
		));

	$this->setData($result[0]);
			
	}

	public function get($idcategory){

		$sql = new Sql();

		//se o id digitado for igual o da tabela ele retorna os dados
		$results = $sql->select("SELECT * FROM tb_categories WHERE idcategory = :idcategory", [
			':idcategory'=>$idcategory//'parametro'=>$valor da variavel

		]);

		$this->setData($results[0]);
	}

	public function delete(){

		$sql = new Sql();

        //deleta a categoria 
		$sql->query("DELETE FROM tb_categories WHERE idcategory = :idcategory", [
			':idcategory'=>$this->getidcategory()

		]);

		
	}

 }


?>




