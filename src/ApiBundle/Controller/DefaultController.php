<?php

namespace ApiBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DefaultController extends Controller
{   
    
    //Action para realizar toda la funcionalidad
    public function indexAction(Request $request)
    {   
        
        //Llamamos al servicio de los helpers
        $helpers = $this->get('api.helpers');
        //Servicio para el login
        $jwt_auth = $this->get('api.jwt_auth');
        
        //brand = marca, model = modelo, name = nombre
        $user       = (htmlspecialchars($request->get('_user'))) ? htmlspecialchars($request->get('_user')) : null;
        $pwd        = (htmlspecialchars($request->get('_password'))) ? htmlspecialchars($request->get('_password')) : null;
        $brand      = (htmlspecialchars($request->get('_brand'))) ? htmlspecialchars($request->get('_brand')) : null;
        $model      = (htmlspecialchars($request->get('_model'))) ? htmlspecialchars($request->get('_model')) : null;
        $name       = (htmlspecialchars($request->get('_name'))) ? htmlspecialchars($request->get('_name')) : null;
        
        $password = hash('sha256', $pwd);
        
        //Validamos los parametros que son enviados por post
        if(($user != null && $password != null) && 
                (!empty($user) && !empty($password)) &&
                    ($brand != null && $model != null) && 
                        (!empty($brand) && !empty($model)) &&
                            ($name != null && !empty($name))){
            
            //Comprobamos si el usuario existe en la base de datos
            $signup = $jwt_auth->signup($user, $password);
            
            //Si existe entonces procedemos a procesar la información
            if($signup){
                
                $datos = $helpers->mailings($name, $brand, $model);
                return $datos;
                exit();
            }else{                
                return $helpers->respuesta("Error", 401, "Not authorized");
            }
            
        }else{
            return $helpers->respuesta("Unprocessable Entity", 422, "Incomplete data");
        }
       
        
        
    }
    
       
    
}
