<?php
    require_once("libs/dao.php");
function mostrarTabla(){
	ConexionSQLRecursosHumanos();

	$query= mssql_query("SELECT * FROM GN_Persona");
	while($dato= mssql_fetch_array($query)){
		$dato['cNombres']=utf8_encode($dato['cNombres']);
		$dato["cApellidos"]=utf8_encode($dato["cApellidos"]);
		$dato["cPersonaId"]=utf8_encode($dato["cPersonaId"]);
									
	$msg[]=$dato;

}
	return $msg;
}
function mostrarhistorial($CodigoEmpleado, $fechaInicio,$fechaFinal){
ConexionSQLRecursosHumanos();


	$query=mssql_query("SELECT  a.Estado,a.cPermisoId, b.cPeriodo, a.fDesde, a.fHasta, a.iDias,a.iHorasDiarias,a.cMotivo FROM PR_PermisoH a,PR_Permisos b WHERE b.cPermisoId =a.cPermisoId and b.cPersonaId='$CodigoEmpleado' and a.fDesde between '$fechaInicio' and '$fechaFinal' and b.Estado =1 and a.Estado =1");
	while ($dato=mssql_fetch_array($query)) {
		$dato['fDesde']=date('d/m/Y',strtotime($dato['fDesde']));
		$dato['fHasta']=date('d/m/Y',strtotime($dato['fHasta']));
		if($dato['cPeriodo']=='1111 - 1111'){
			$dato['cPeriodo']='PERIODO DE PRUEBA';
		}
			
		
		$msg[]=$dato;
	}
// and cPermisoId IN (SELECT cPermisoId FROM PR_Permisos WHERE cPersonaId='$CodigoEmpleado')

return $msg;

}


function mostrarDatosEmpleado($identidad){
	ConexionSQLRecursosHumanos();

	$query=mssql_query("SELECT * FROM GN_Persona WHERE cPersonaId='$identidad'");

	if ($dato=mssql_fetch_array($query)) {
		$dato['cNombres']=utf8_encode($dato['cNombres']);
	    $dato["cApellidos"]=utf8_encode($dato["cApellidos"]);

	    $msg[]=$dato['cNombres'];
	    $msg[]=$dato['cApellidos'];
		
	}

	return $msg;
}

?>
