<?php

namespace app\controller;

use app\core\DB;


class Controller
{
    private $sdb;

    public function __construct()
    {
        $this->sdb = new DB('localhost', 'root', '', 'consult');
        session_start();
    }

    public function Home($ctx)
    {
        $sql = "SELECT * FROM feedbacks
        INNER JOIN users ON feedbacks.teach_id = users.user_id";

        $result = $this->sdb->db->query($sql);
        $fbs = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $fbs[] = $row;
            }
        } else {
            echo "0 results";
        }

        $user = json_decode($ctx->cookie('c_user'), true);
        $apt = $this->sdb
            ->table('appointments')
            ->all();

        //echo var_dump($apt);
        $ctx->blade('Home', ["user" => $user, "apt" => $apt, "fbs" => $fbs]);
    }

    public function Signup($ctx)
    {
        $password = $ctx->input("password");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $_id = $ctx->makeID();
        $user = [
            $_id,
            $ctx->input("full_name"),
            $ctx->input("contact"),
            $ctx->input("username"),
            $hashedPassword,
            $ctx->input("role"),
        ];

        $status = $this->sdb
            ->table("users")
            ->field("user_id, full_name, contact, username, password, role")
            ->insert($user);

        $user = $this->sdb
            ->table('users')
            ->select('username', $ctx->input("username"), 'user_id, username, full_name, role');

        $cookieExpiration = time() + (86400 * 30);
        $ctx->set_session('role', $user['role']);
        $ctx->set_cookie('c_user', json_encode($user), [
            'expires' => $cookieExpiration,
            'path' => '/',
            'samesite' => 'None',
            'secure' => true,
            'httponly' => true
        ]);

        if ($status == "Record inserted successfully.") {
            $ctx->json(["status" => $status]);
        }
    }

    public function Login($ctx)
    {
        $username = $ctx->input('username');
        $password = $ctx->input('password');

        $exist = $this->sdb
            ->table('users')
            ->findBy('username', $username);

        if ($exist == "Record not found.") {
            $ctx->json(["error" => $exist]);
            return;
        }

        $user = $this->sdb
            ->table('users')
            ->select('username', $username, 'user_id, username, password, full_name, role');

        if (password_verify($password, $user["password"])) {
            unset($user["password"]);
            $cookieExpiration = time() + (86400 * 30);
            $ctx->set_session('role', $user['role']);
            $ctx->set_cookie('c_user', json_encode($user), [
                'expires' => $cookieExpiration,
                'path' => '/',
                'samesite' => 'None',
                'secure' => true,
                'httponly' => true
            ]);

            $ctx->json(["status" => "success"]);
        } else {
            $ctx->json(["error" => "password incorrect"]);
        }
    }

    public function Appoint($ctx)
    {
        $data = [
            $ctx->input("fullname"),
            $ctx->input("stud_id"),
            $ctx->input("sub_code"),
            $ctx->input("concern"),
            $ctx->input("day"),
            $ctx->input("time")
        ];

        $error = $this->sdb
            ->table("appointments")
            ->field("full_name, user_id, sub_code, topic, date, time")
            ->insert($data);
        $ctx->json($error);
    }

    public function Response($ctx)
    {
        $data = [
            $ctx->input("apt_id"),
            $ctx->input("teach_id"),
            $ctx->input("respond"),
            $ctx->input("status"),
        ];
        //echo var_dump($data);
        $error = $this->sdb
            ->table("feedbacks")
            ->field("apt_id, teach_id, remarks, status")
            ->insert($data);
        echo var_dump($error);
    }
}
