<?php
require __DIR__ . '/JwtHandler.php';

class Auth extends JwtHandler
{
    protected $db;
    protected $headers;
    protected $token;

    public function __construct($db, $headers)
    {
        parent::__construct();
        $this->db = $db;
        $this->headers = $headers;
    }

    public function isValid()
    {

        if (array_key_exists('Authorization', $this->headers) && preg_match('/Bearer\s(\S+)/', $this->headers['Authorization'], $matches)) {

            $data = $this->jwtDecodeData($matches[1]);

            if (
                isset($data['data']->user_id) &&
                $user = $this->fetchUser($data['data']->user_id)
            ) :
                return [
                    "success" => 1,
                    "user" => $user
                ];
            else :
                return [
                    "success" => 0,
                    "message" => $data['message'],
                ];
            endif;
        } else {
            return [
                "success" => 0,
                "message" => "Token not found in request"
            ];
        }
    }

    protected function fetchUser($user_id)
    {
      
            $fetch_user_by_id = "SELECT `name`,`email` FROM `users` WHERE `id`=?";
            $query_stmt = $this->db->prepare($fetch_user_by_id);
            $query_stmt->bind_param("i", $user_id);
           
            $query_stmt->execute();
            $result =  $query_stmt->get_result();

            if ($result->num_rows>0) :
                return $result->fetch_assoc();
            else :
                return false;
            endif;
       
    }
}