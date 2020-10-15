<?php namespace App\Controllers;


use App\Models\User;


class ListPage extends BaseController
{

	public function __construct()
	{
		helper(["url","form"]);
	}

	/** Search View */
	public function search(  )
	{

		if(! $this->request->getVar("search") ) {
			return redirect()->to( site_url("list"));
		}


		$list = new User();
		
		$data = [
			'users' => $list->like("nome", $this->request->getVar("search")  )->paginate(10),
			'search' => $this->request->getVar("search")
		];
		

		echo view ("templates/header");
		return view("pages/list/list" , $data );
	}


    /** List View */
	public function index(   )
	{
		$list = new User();

		 

		$data = [
			'users' => $list->getUsers() ,
			'pager' => $list->pager,
		];

		// RENDER 
		echo view ("templates/header");
		return view("pages/list/list" , $data  );
	}

    

    public function createView(  )
	{

		$data = [];

		if( $this->request->getMethod() === "post" )
		{
			if(!$this->validate( $this->validateRulesCreateUser() , $this->errorsMessages()  )){
				
				$data["validation"] = $this->validator;
				//$data["validation"] =  \Config\Services::validation();
				
				echo view ("templates/header");
				echo view("pages/list/add" ,$data );
				return ;
				
			}else
			{
				$data = $this->getRequestData();		 

				$userModel = new User();
				$userModel->save( $data );
	
				session()->setFlashdata("saved_item_message","Usuario foi salvo com sucesso");
			}
			// echo view ("templates/header");
			// echo view("pages/list/list" ,$data );

			return redirect()->to( site_url("list") );
		}

		echo view ("templates/header");
		echo view("pages/list/add" ,$data );
		
    }
    
    /* for someone item that exists */
    public function modifyView( $id )
	{
		$userModel = new User();
		$myUser = $userModel->getUser($id);

		$data = [];

		if( $this->request->getMethod() === "post" )		
		{
			if(!$this->validate( $this->validateRulesUpdateUser()  , $this->errorsMessages()  )){
				$data["validation"] = $this->validator;
			}
			else
			{
				$request_data = $this->getRequestData();
			
				$request_data["id"] = $id;
				$userModel->save( $request_data );
	
				// gett Updated user
				$myUser = $userModel->getUser($id);

				session()->setFlashdata("updated_item_message","Usuario foi atualizado com sucesso");
			}
		}
		

		if($myUser)
		{
			$data["user"] = $myUser ;	
	
			echo view ("templates/header");
			return view("pages/list/edit" , $data );

		}
		else{
			return "User Not Found";
		}
	
    }

    public function viewOne( $id  )
	{

		echo view ("templates/header");
		return view("pages/list/view");
    }
    

    /* receive a post to delete someone */
    public function delete( $id  )
	{

		$userModer = new User();

		$userModer->delete($id);
		session()->setFlashData("user_deleted_success","Usuáro fo deletado com sucesso!");

		return redirect()->to( site_url("list") );
	}


	private function errorsMessages(){
		return [
			'nome' => [
				'required' => "O nome do usuário é obrigatório" ,
				'min_length' => "O minimo necessário é 5 caracteres" ,
				'max_length' => "O máximo permitido é 255 caracteres" ,
			] ,
			'sobre_nome' => [
				'required' => "O sobrenome do usuário é obrigatório" ,
				'max_length' => "O máximo permitido é 255 caracteres" ,
			],
			'nascimento'=>[
				'required' => "A data de nascimento do usuário é obrigatório" ,
			],
			'email' => [
				'required' => "O email é obrigatório",
				'valid_email' => "Atenção o email é inválido",
				'is_unique' => "Atenção já existe alguem com esse email cadastrado, por favor selecione outro!",
			]
		];
	}

	private function validateRulesCreateUser(){
		return [
			'nome' => 'required|min_length[5]|max_length[254]',
			'sobre_nome'  => 'required|max_length[254]',
			'nascimento'  => 'required',
			'email'  => 'required|valid_email|is_unique[user.email]',
		];
	}

	private function validateRulesUpdateUser(){
		return [
			'nome' => 'required|min_length[5]|max_length[254]',
			'sobre_nome'  => 'required',
			'nascimento'  => 'required',
			'email'  => 'required|valid_email',
		];
	}
	private function getRequestData(){
		return [
			'nome' => $this->request->getPost('nome'),
			'sobre_nome'  => $this->request->getPost('sobre_nome'),
			'nascimento'  => $this->request->getPost('nascimento') ,
			'email'  => $this->request->getPost('email') ,
		]; 
	}

}
