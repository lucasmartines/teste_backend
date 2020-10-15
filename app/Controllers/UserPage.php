<?php namespace App\Controllers;


use App\Models\User;


class UserPage extends BaseController
{
	
	public function logoff(){

		session()->destroy();

		return redirect()->to( site_url("list"));
	}
	public function index(  )
	{

		$data = [];

		if($this->request->getMethod() === "post" )
		{
			
			$isValid = $this->validate([
				'email' => 'required|min_length[4]|max_length[254]',
				'senha' => 'required|min_length[4]'
			]);

			if( $isValid	)
			{
				$userModel = new User();

				$foundedUser = $userModel->where("email" , $this->request->getPost('email') )->first();

				if($foundedUser){
					if( $foundedUser["senha"] ==  $this->request->getPost('senha')  ){

						session()->set([
							'id' => $foundedUser["id"] ,
							'email' => $foundedUser["email"] ,
							'nome' => $foundedUser["nome"] ,
							'sobre_nome' => $foundedUser["sobre_nome"] ,
							'isLogged' => true
						]);

						return redirect()->to( site_url( "list" ) );
						
					}else{
						
						session()->setFlashdata("user_dont_exists_message" , "usuario ou senha invalidos" );
					}
				}else{

					session()->setFlashdata("user_dont_exists_message" , "usuario não existe" );
				}
			}
			else{
				$data["validation"] = $this->validator;
			}
		}


		return view("pages/user/signin" , $data );
	}

}
