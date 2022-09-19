<?php

class Web_Service_RNP
{   
    protected ?string $identidad;
    protected ?string $qr;
    protected string $CodigoInstitucion="PRUEBAS";
    protected string $CodigoSeguridad='T3$T1NG';
    protected string $UsuarioInstitucion="Usuario13";
    

    public function __construct(string $id=null,string $qrb=null) {
        $this->identidad=$id;
        $this->qr=$qrb;


    }
    function Identidad_persona(){

        $cliente = new SoapClient(
            'https://wstest.rnp.hn:1893/API/WSInscripciones.asmx?wsdl',
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
            'https://wstest.rnp.hn:1893/API/WSInscripciones.asmx?wsdl',
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
            'https://wstest.rnp.hn:1893/API/WSInscripciones.asmx?wsdl',
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