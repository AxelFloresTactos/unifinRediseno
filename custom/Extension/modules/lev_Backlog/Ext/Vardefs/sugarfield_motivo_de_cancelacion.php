<?php
 // created: 2020-06-19 08:02:41
$dictionary['lev_Backlog']['fields']['motivo_de_cancelacion']['audited']=true;
$dictionary['lev_Backlog']['fields']['motivo_de_cancelacion']['dependency']='or(equal($estatus_de_la_operacion,"Cancelada"),equal($estatus_de_la_operacion,"Cancelada por cliente"))';
$dictionary['lev_Backlog']['fields']['motivo_de_cancelacion']['default']='';

 ?>