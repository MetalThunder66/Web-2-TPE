<?php
require_once 'models/comment.model.php';
require_once 'models/user.model.php';
require_once 'models/book.model.php';
require_once 'helpers/auth.helper.php';
require_once 'api/api.view.php';

class ApiCommentController
{
    private $commentModel;
    private $bookModel;
    private $userModel;
    private $apiView;
    private $authHelper;

    public function __construct()
    {
        $this->commentModel = new CommentModel();
        $this->bookModel = new BookModel();
        $this->userModel = new UserModel();
        $this->apiView = new APIView();
        $this->authHelper = new AuthHelper();
    }

    private function getBody()
    {
        $data = file_get_contents("php://input");
        return json_decode($data);
    }

    public function addOne($params = null)
    {
        $data = $this->getBody();
        if (($data->valoration <= 5) && ($data->valoration >= 1)) {
            $idBook = $data->id_libro;
            $idUser = $this->authHelper->getUserId();
            $book = $this->bookModel->getBookById($idBook);

            if ($book) { //verifico que el libro exista
                $idUser = $this->userModel->userIdExists($idUser);

                if ($idUser) { //verifico que usuario exista
                    $idComment = $this->commentModel->saveComment($data->comment, $data->valoration, $idBook, $idUser);
                    $comment = $this->commentModel->getComment($idComment);
                    if ($comment) { //si existe el comentario, se agrego 
                        $this->apiView->response("Comentario con id= $idComment ha sido agregado con exito.", 200);
                    } else {
                        $this->apiView->response("El Comentario no fue creado", 500);
                    }
                } else {
                    $this->apiView->response("Comentario no creado. El usuario con id = $idUser no existe", 404);
                }
            } else
                $this->apiView->response("Comentario no creado. El libro con id = $idBook no existe", 404);
        }else{
            $this->apiView->response("Comentario no creado. La valoracion debe ser entre 1 y 5.", 400);
        }
    }

    public function getAll($params = null)
    {
        $idBook = $params[':ID'];
        $book = $this->bookModel->getBookById($idBook);
        if ($book) {
            $comments = $this->commentModel->getAllComments($idBook);
            $this->apiView->response($comments, 200);
        } else {
            $this->apiView->response('Error al consultar los comentarios. El libro no existe.', 404);
        }
    }

    public function remove($params = null)
    {
        $idComment = $params[':ID'];
        $comment = $this->commentModel->getComment($idComment);

        if ($comment) {
            $this->commentModel->deleteComment($idComment);
            $this->apiView->response("Comentario con id= $idComment ha sido eliminada con exito.", 200);
        } else {
            $this->apiView->response("Error. Comentario no encontrado.", 404);
        }
    }
}
