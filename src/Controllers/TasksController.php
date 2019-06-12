<?php
namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\Task;
use MVC\Core\ObjectManager;

class TasksController extends Controller
{
    private static $entityManager;

    public function __construct()
    {
        if (static::$entityManager === null) {
            static::$entityManager = ObjectManager::getInstance();
        }
    }

    function index()
    {
        $taskRepository = static::$entityManager->getRepository('MVC\\Models\\Task');
        $d['tasks'] = $taskRepository->findAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"])) {
            $task = new Task();
            $task->setTitle($_POST["title"]);
            $task->setDescription($_POST["description"]);

            static::$entityManager->persist($task);
            static::$entityManager->flush();
            header("Location: " . WEBROOT . "tasks/index");
        }

        $this->render("create");
    }

    function edit($id)
    {
        $task = static::$entityManager->find('MVC\\Models\\Task', $id);

        if ($task != null) {
            $d["task"] = $task;
        } else {
            echo 'Not found Task with id = ' . $id;
            return;
        }

        if (isset($_POST["title"])) {
            $task->setTitle($_POST["title"]);
            $task->setDescription($_POST["description"]);

            static::$entityManager->flush();
            header("Location: " . WEBROOT . "tasks/index");
        }

        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        $task = static::$entityManager->find('MVC\\Models\\Task', $id);
        
        if ($task != null) {
            static::$entityManager->remove($task);
            static::$entityManager->flush();
            header("Location: " . WEBROOT . "tasks/index");
        } else {
            echo 'Not found Task with id = ' . $id;
        }
    }
}