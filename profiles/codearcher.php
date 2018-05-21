<?php

class Bot
{
    private $conn;
    private $version = "0.0.1";

    public function __construct()
    {

        if (!defined('DB_USER')) {
            require 'db.php';

            try {
                $this->conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_DATABASE, DB_USER, DB_PASSWORD);
            } catch (PDOException $e) {
                die("Could not connect to the database " . DB_DATABASE . ": " . $e->getMessage());
            }
        }

    }

    /**
     * Returns json resonpse
     */
    private function response($message)
    {
        echo json_encode(array("res" => $message));
    }

    public function sendMessage($question)
    {
        $sql = $this->conn->prepare("SELECT * FROM chatbot WHERE question = :question ORDER BY RAND()");
        $sql->execute([':question' => "{$question}"]);
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            $this->response('I do not understand what you mean because I\'ve not been trained on that.');
        } else {
            extract($result);
            $this->response($answer);
        }
    }

    private function sanitize($value)
    {
        return $value ? trim(filter_var($value, FILTER_SANITIZE_STRING)) : "";
    }

    public function train($message)
    {
        if (preg_match("/^train/", $message)) {
            $question = $this->sanitize(preg_split("/[:#]/", $message)[1]);
            $answer = $this->sanitize(preg_split("/[:#]/", $message)[2]);
            $password = $this->sanitize(preg_split("/[:#]/", $message)[3]);

            if ($password !== 'password') {
                return $this->response('Oh no! That\'s not the password to train me');
            }

            if (empty($question)) {
                return $this->response('It look like you did not provide me with a question');
            }
            if (empty($answer)) {
                return $this->response('It look like you did not provide me with answer');
            }

            // Now we check if the question and answer already exists
            $sql = $this->conn->prepare("SELECT * FROM chatbot WHERE question = :question AND answer = :answer");
            $sql->execute([':question' => $question, ':answer' => $answer]);
            $result = $sql->fetch(PDO::FETCH_ASSOC);

            if (!empty($result)) {
                return $this->response('Oh! I already knew that. Please teach something else.');
            } else {
                $sql = 'INSERT INTO chatbot (question, answer) VALUES (:question, :answer)';

                try {
                    $query = $this->conn->prepare($sql);
                    if ($query->execute([':question' => $question, ':answer' => $answer]) == true) {
                        $this->response('Great! thank you so much for teaching that');
                    }

                } catch (PDOException $e) {
                    $this->response('Oh o! Looks like the system that allows my to learn had a glitch, please try again');
                }
            }
        } else {
            return $this->response('Oh! No. This is how to train me: train: Question # Answer Password');
        }

    }
    public function getVersion()
    {
        return $this->response($this->version);
    }

}

$bot = new Bot();

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case "POST":
        $data = json_decode(file_get_contents("php://input"));
        $question = $data->question;
        $type = $data->type;

        switch ($type) {
            case 'message':
                $bot->sendMessage($question);
                break;
            case 'train':
                $bot->train($question);
                break;
            case 'version':
                $bot->getVersion();
                break;
            default:
                # code...
                break;
        }
        break;
    default:
        echo "<h1>Simple chat bot api</h1>";
        break;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta name="theme-color" content="#000000">
    <link rel="manifest" href="/profiles/codearcher/manifest.json">
    <link rel="shortcut icon" href="/profiles/codearcher/favicon.ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
        crossorigin="anonymous">
    <title>Codearcher Bot</title>
    <link href="/profiles/codearcher/static/css/main.1cb28894.css" rel="stylesheet">
</head>

<body>
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root"></div>
    <script type="text/javascript" src="/profiles/codearcher/static/js/main.38bc426c.js"></script>
</body>

</html>