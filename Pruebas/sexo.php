<?php
require_once('../Produccion/TRANSPORTE/Config/conexion.php');
$instancia_conexion = new conexion();
class model{
    function traerdatos(){

        global $instancia_conexion;

        $sql='select id_persona,edad, identidad from TBL_PERSONAS where id_persona>6682 and id_persona<6692';
       
        return $instancia_conexion->ejecutarConsulta($sql);
    }
    function edad($id,$edad,$sexo)
    {
       // global $instancia_conexion;
        $sql="update TBL_PERSONAS set edad=$edad, sexo='$sexo' where id_persona=$id;";
        //$consulta = $instancia_conexion->ejecutarConsulta($sql);

        echo $sql;
    }
}
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
      return $inscripcion->Qry_InscripcionNacimientoResult->ErrorMsg;

    }
    

    

}

$instancia= new model();
$rsp=$instancia->traerdatos();
$i=1;
$updates="";
while ($a= $rsp->fetch_object()) {
    if (!empty($a) and $a->edad=="") {
    $ins=new Web_Service_RNP($a->identidad,'');
    $r=$ins->Identidad_persona();
    $edad=substr($r->FechaDeNacimiento,0,4);
    $edad=2022-intval($edad);
    $sexo=$info->Sexo;
  
    $updates=$updates. "<p style='color:red;'>$i</p>:  ". $a->identidad." ".$edad." ".$sexo." query: ".$instancia->edad($a->id_persona,$edad,$sexo)."<br>";
    $i++;
   
        # code...
    }# code...
}

echo $updates;




?>
