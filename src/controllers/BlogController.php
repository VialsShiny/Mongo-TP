<?php
namespace App\Controllers;

use App\EntityManager;
use App\Models\Blog;
use App\Validator;

class BlogController extends Controller
{
    private $em;

    public function __construct()
    {
        parent::__construct();
        $this->em = new EntityManager();
    }

    public function index()
    {
        $blogs = $this->em->findAll('blogs');
        $this->render('blogs.html.twig', ['blogs' => $blogs]);
    }

    public function show($id)
    {
        $blog = $this->em->findById('blogs', $id);
        if (!$blog) {
            http_response_code(404);
            include './views/errors/page404.php';
            exit;
        }
        $this->render('blog.html.twig', ['blog' => $blog]);
    }
    public function blogNew()
    {
        if (empty($_POST)) {
            return $this->render('newblog.html.twig');
        }

        $validator = new Validator();
        $blog = $validator->validate($_POST, Blog::class);

        if (!empty($blog->getErrors())) {
            return $this->render('newblog.html.twig', [
                'data' => $_POST,
                'errors' => $blog->getErrors()
            ]);
        }

        $result = $this->em->insertOne('blogs', $blog->getAllData());

        if (!$result) {
            return $this->render('newblog.html.twig', [
                'data' => $_POST,
                'errors' => [
                    'global' => "Erreur lors de la création de l'article"
                ]
            ]);
        }
        header('Location: /');
        exit;
    }
}