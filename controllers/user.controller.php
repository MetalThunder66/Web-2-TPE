<?php 

require_once 'models/genre.model.php';
require_once 'models/user.model.php';
require_once 'views/user.view.php';
include_once 'helpers/auth.helper.php';

class UserController{
    private $genreModel;
    private $userModel;
    private $userView;
    private $authHelper;

    function __construct(){
        $this->genreModel = new GenreModel;
        $this->userModel = new UserModel;
        $this->userView = new UserView;
        $this->authHelper = new AuthHelper;
    }
    
    function showUsersList(){
        $this->authHelper->isAdmin();
        $genres = $this->genreModel->getGenres();

        $email = $this->authHelper->getUserEmail(); //obtengo el mail del admin logueado, para que no pueda eliminarse o cambiarse de rol el mismo
        $exists = $this->userModel->emailExists($email);

        if ($exists){
            $users = $this->userModel->getAllUsers($email);
            $this->userView->showAllUsers($users, $genres);
        }else{
            header("Location: " . BASE_URL); 
        }  
    }

    function changeRol($id){
        $this->authHelper->isAdmin();
        $genres = $this->genreModel->getGenres();
        $userRol = $this->userModel->userRolById($id);

        if ($userRol){
            if($userRol->rol == 1){
                $this->userModel->changeUserRol($id, 0);
            }else{
                $this->userModel->changeUserRol($id, 1);
            }
            $email = $this->authHelper->getUserEmail();
            $users = $this->userModel->getAllUsers($email);
            $this->userView->showAllUsers($users, $genres,'Cambio de Rol Exitoso');
        }else{
            header("Location: " . BASE_URL); 
        }   
    }

    function deleteUser($id){
        $this->authHelper->isAdmin();  
        $user = $this->userModel->userIdExists($id);
        if ($user){
            $this->userModel->deleteUserDb($id);
            $email = $this->authHelper->getUserEmail();
            $users = $this->userModel->getAllUsers($email);
            $genres = $this->genreModel->getGenres();
            $this->userView->showAllUsers($users, $genres,'Usuario Eliminado Con Exito');
        }else{
            header("Location: " . BASE_URL);
        }
    }
    
}
