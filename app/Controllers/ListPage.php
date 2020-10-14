<?php namespace App\Controllers;


use App\Models\User;


class ListPage extends BaseController
{

	public function __construct()
	{
		helper("url");
	}

	/** Search View */
	public function search(  )
	{

		 

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
		echo "index";
		echo view ("templates/header");
		return view("pages/list/list" , $data  );
	}

    

    public function createView(  )
	{

		if( $this->request->getMethod() === "post" &&
			$this->validate( $this->validateRules() ) )
		{

			$data = $this->getRequestData();		 

			$userModel = new User();
			$userModel->save( $data );

			session()->setFlashdata("saved_item_message","Usuario foi salvo com sucesso");
		}

		echo view ("templates/header");
		return view("pages/list/add");
    }
    
    /* for someone item that exists */
    public function modifyView( $id )
	{
		$userModel = new User();
		$myUser = $userModel->getUser($id);

		
		// FOR UPDATING USER
		if( $this->request->getMethod() === "post" &&
			$this->validate( $this->validateRules() ) )
		{
			//echo var_dump( $this->getRequestData() );

			$request_data = $this->getRequestData();
			
			$request_data["id"] = $id;
			$userModel->save( $request_data );

			session()->setFlashdata("updated_item_message","Usuario foi atualizado com sucesso");


			return redirect()->to("/list/".$id."/edit");
			//return view("pages/list/view");
		}
		// FOR VIEWING USER
		else
		{

			if($myUser){
				$data = [
					"user" => $myUser
				];	
		
				echo view ("templates/header");
		
				return view("pages/list/edit" , $data );

			}
			else{
				return "User Not Found";
			}
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

		echo $id . " deleted";
		$userModer = new User();

		$userModer->delete($id);
		session()->setFlashData("user_deleted_success","Usuáro fo deletado com sucesso!");

		echo view ("templates/header");
		return redirect()->to("/list");
	}

	private function validateRules(){
		return [
			'nome' => 'required|min_length[3]|max_length[255]',
			'sobre_nome'  => 'required',
			'nascimento'  => 'required',
			'email'  => 'required',
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
