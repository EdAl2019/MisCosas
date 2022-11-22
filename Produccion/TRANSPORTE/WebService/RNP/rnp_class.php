<?php

class Web_Service_RNP
{
    protected ?string $identidad;
    protected ?string $qr;
    protected string $CodigoInstitucion="IHTT";
    protected string $CodigoSeguridad='80353E6A658D4C248566938EA820E6D8';
    protected string $UsuarioInstitucion="0801198814764";
    protected string $url='https://rcm.rnp.hn/API/WSInscripciones.asmx?wsdl';



    public function __construct(string $id=null,string $qrb=null) {
        $this->identidad=$id;
        $this->qr=$qrb;


    }
    function Identidad_persona(){

        $cliente = new SoapClient(
            $this->url,
            ['trace' => 1, 'exception' => 0]
        );
        $parametros = [
            'NumeroIdentidad' => $this->identidad,
            'CodigoInstitucion' => $this->CodigoInstitucion,
            'CodigoSeguridad' => $this->CodigoSeguridad,
            'UsuarioInstitucion' => $this->UsuarioInstitucion,
        ];
        $inscripcion = $cliente->Qry_InscripcionNacimiento($parametros);
        return $inscripcion->Qry_InscripcionNacimientoResult;
    }
    function QR_persona(){
        $cliente = new SoapClient(
            $this->url,
            ['trace' => 1, 'exception' => 0]
        );
        $parametros = [
            'CodigoBarras' => $this->qr,
            'CodigoInstitucion' => $this->CodigoInstitucion,
            'CodigoSeguridad' => $this->CodigoSeguridad,
            'UsuarioInstitucion' => $this->UsuarioInstitucion,
        ];
        $inscripcion = $cliente->Qry_IdentidadxCodigoBarras($parametros);
        return $inscripcion->Qry_IdentidadxCodigoBarrasResult->Inscripcion;


    }
    function Valida_persona(){
      $cliente = new SoapClient(
         $this->url,
          ['trace' => 1, 'exception' => 0]
      );
      $parametros = [
          'NumeroIdentidad' => $this->identidad,
          'CodigoInstitucion' => $this->CodigoInstitucion,
          'CodigoSeguridad' => $this->CodigoSeguridad,
          'UsuarioInstitucion' => $this->UsuarioInstitucion,
      ];
      $inscripcion = $cliente->Qry_InscripcionNacimiento($parametros);
      return $inscripcion->Qry_InscripcionNacimientoResult;

    }
    function Valida_persona_qr(){
        $cliente = new SoapClient(
            $this->url,
            ['trace' => 1, 'exception' => 0]
        );
        $parametros = [
            'CodigoBarras' => $this->qr,
            'CodigoInstitucion' => $this->CodigoInstitucion,
            'CodigoSeguridad' => $this->CodigoSeguridad,
            'UsuarioInstitucion' => $this->UsuarioInstitucion,
        ];
        $inscripcion = $cliente->Qry_IdentidadxCodigoBarras($parametros);
        return $inscripcion->Qry_IdentidadxCodigoBarrasResult->Inscripcion;
  
      }

    function Domicilio_persona(){
        $cliente = new SoapClient(
           $this->url,
            ['trace' => 1, 'exception' => 0]
        );
        $parametros = [
            'NumeroIdentidad' => $this->identidad,
            'CodigoInstitucion' => $this->CodigoInstitucion,
            'CodigoSeguridad' => $this->CodigoSeguridad,
            'UsuarioInstitucion' => $this->UsuarioInstitucion,
        ];
        $inscripcion = $cliente->Qry_DireccionInscrito($parametros);
        print_r($inscripcion);
    }

}



?>
