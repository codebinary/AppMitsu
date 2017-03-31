<?php

namespace ApiBundle\Services;

use Firebase\JWT\JWT;

class JwtAuth{
    
    public $manager;
    
    public function __construct($manager) {
        $this->manager = $manager;
    }
    
    
    public function signup($_user, $_password, $getHash = NULL){
        $key = "clave-secreta";
        
        $user = $this->manager->getRepository('ApiBundle:User')->findOneBy(
                    array(
                        "email" => $_user,
                        "password" => $_password
                    )
                );
        
        $signup = false;
        
        if(is_object($user)){
            $signup = true;
        }
        
        if($signup){
            return true;
        }else{
            return false;
        }
    }
    
    
}
