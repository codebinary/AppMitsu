<?php

namespace ApiBundle\Services;


class Helpers{
    
    //Método para responder en formato json
    public function json($data){
        
        $nomarlizers = array(new \Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer());
        $encoders = array("json" => new \Symfony\Component\Serializer\Encoder\JsonEncoder());
        
        $serializer = new \Symfony\Component\Serializer\Serializer($nomarlizers, $encoders);
        $json = $serializer->serialize($data, 'json');
        
        $response = new \Symfony\Component\HttpFoundation\Response();
        $response->setContent($json);
        $response->headers->set("Content-Type", "application/json");
        
        return $response;
   
    }
    
    public function mailings($_name, $_brand, $_model){
      
        
        $id         = 1;
        $model      = $_model;
        $brand      = $_brand;
        $nameCli    = $_name;
        $html       = '<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"><!-- Save for Web Slices (mailing_riohb.psd) --><table width="640" height="1679" border="0" align="center" cellpadding="0" cellspacing="0" id="Table_01"><tr><td><img style="display: block;" margin="0" padding="0" border="0" src="http://kia.com.pe/respuestas/v1/riohb/images/mailing_riohb_01.jpg" width="640" height="347" alt=""></td></tr><tr><td><img style="display: block;" margin="0" padding="0" border="0" src="http://kia.com.pe/respuestas/v1/riohb/images/mailing_riohb_02.jpg" width="640" height="207" alt=""></td></tr><tr><td><img style="display: block;" margin="0" padding="0" border="0" src="http://kia.com.pe/respuestas/v1/riohb/images/mailing_riohb_03.jpg" width="640" height="330" alt=""></td></tr><tr><td><img style="display: block;" margin="0" padding="0" border="0" src="http://kia.com.pe/respuestas/v1/riohb/images/mailing_riohb_04.jpg" alt="" width="640" height="432" usemap="#Map"></td></tr><tr><td><img style="display: block;" margin="0" padding="0" border="0" src="http://kia.com.pe/respuestas/v1/riohb/images/mailing_riohb_05.jpg" alt="" width="640" height="234" usemap="#Map2"></td></tr><tr><td><img style="display: block;" margin="0" padding="0" border="0" src="http://kia.com.pe/respuestas/v1/riohb/images/mailing_riohb_06.jpg" width="640" height="129" alt=""></td></tr></table><!-- End Save for Web Slices --><map name="Map"> <area shape="rect" coords="58,37,307,159" href="https://youtu.be/6QGRCBwaMo8" target="_blank"> <area shape="rect" coords="339,37,587,161" href="https://youtu.be/BRbOeyKqOvA" target="_blank"> <area shape="rect" coords="209,242,455,366" href="https://youtu.be/nGX_MCcwEzs?list=PLo2UaA9KXvXzOci21Rzg1aOcnhkA8ZSzh" target="_blank"></map><map name="Map2"> <area shape="rect" coords="78,177,313,215" href="http://www.kia.com.pe/pdf/modelos/ficha-tecnica-rio-hatchback.pdf" target="_blank"> <area shape="rect" coords="323,178,555,215" href="http://www.kia.com.pe/pdf/catalogo-colores/rio_hb.pdf" target="_blank"></map></body>';

        $data = array(
            "status" => "success",
            "code" => 200,
            "data" => array(
                "id" => 1,
                "brand" => $brand,
                "model" => $model,
                "html" => $html
            )
            
        );
        
        return $this->json($data);

    }
    
   
    //Método que respondera json
    public function respuesta($status, $codigo, $msg){
        $data = array(
            "status" => $status,
            "code" => $codigo,
            "message" => $msg
        );

        return $this->json($data);
    }
    
}
