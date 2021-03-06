<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0; width:100%;column-span:1;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:3px 3px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;font-family:"Lucida Sans Unicode", "Lucida Grande"}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:3px 3px;border-style:solid;border-width:0px;overflow:hidden;word-break:normal;width:33.3%;;font-family:"Lucida Sans Unicode", "Lucida Grande"}
.tg .tg-qp8u{color:#ffffff;text-align:center;margin:0px;}
.tg .tg-header{font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;font-size:36px;}
.tg .tg-encabezados{font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;font-size:23px;}
.tg .tg-sub-encabezados{font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;font-size:15px;}
.tg .tg-spacer{width:20%}

#map_canvas {
        width: 100%;
        height: 500px;
      }
	  
.slideshow { margin: auto;width:auto; height:auto; }
.slideshow img { width: 100%; height: 100%; padding: 2px; }

/*.tab_cont {border-color:#000;border-style:dashed;text-align:center;height:10%;font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;height:20px !important}
.tab_cont tr th{background:#000;border-width:1px;font-size:20px;white-space:nowrap;}
.tab_cont th{color:#FFF;font-size:18px;}
.tab_cont tr td{border-width:1px;background:#FFCC33;font-size:12px}
#styled_td {border-width:1px;background:#FFF;} */

.tab_cont {border-color:#000;margin:0px;padding:0px;border-style:none;border:none;text-align:center;height:10%;font-family:Calibri, sans-serif;}
.tab_cont tr th{background:#EAB200;border-width:1px;border-top:thin;border-left:thin;white-space:nowrap;border-right:thin;font-size:15px;font-weight:bold;margin:0px;padding:3px !important;}
.tab_cont th{color:#000;font-size:15px;}
.tab_cont tr td{border-width:1px;background:#E7E7FF;font-size:12px;margin:0px;padding:3px;text-align:center !important;}
#styled_td {border-width:1px;background:#FFF;margin:2px;padding:0px !important;}
</style>


<?php if(!empty($Contratos)){?>
	<table border="1" class="tg">
		<tr >
                    <td class="tg-encabezados">Lista de Contrataciones</br>
                        <img src="<?php echo Yii::app()->baseUrl.'/images/ciudadano_reportes/u6_line.png' ?>" style="height:2px !important" /></td>
		</tr>
        </table >
             <table class="tab_cont">
		<tr>
            <th>Código de Contrato</th>
            <th>Título del contrato</th>
            <th>Alcances del contrato</th>
            <th>Precio del contrato Lps</th>
            <th>Fecha de inicio</th>
            <th>Fecha de finalización</th>
            <th>Duración del contrato</th>
            <th>Ficha</th>
		</tr>
<?php 
    $row=0;
    $total_x=count($Contratos);
?>
<?php 

$td_style = false;

while ($row< $total_x){?>
        <tr>
        <?php if ($td_style == false){ ?>
            <td><?php echo $Contratos[$row] ['contratacion_numero'];?></td>
            <td><?php echo $Contratos[$row] ['contratacion_nombre'];?></td>
            <td><?php echo $Contratos[$row] ['contratacion_alcances'];?></td>
            <td><?php echo number_format($Contratos[$row] ['contratacion_precio'],2,'.',',');?></td>	
            <td><?php echo $Contratos[$row] ['contratacion_inicio'];?></td>
            <td><?php echo $Contratos[$row] ['contratacion_final'];?></td>
            <td><?php echo $Contratos[$row] ['contratacion_duracion'];?></td>
            <td><?php echo CHtml::link(CHtml::Button('Ver información detallada'), array('FichaTecnica', 'control'=>'Contratacion', 'id'=>$Contratos[$row] ['idContratacion'])); ?></td>      
           <?php $td_style = true; }
           else { ?>
            <td id="styled_td"><?php echo $Contratos[$row] ['contratacion_numero'];?></td>
            <td id="styled_td"><?php echo $Contratos[$row] ['contratacion_nombre'];?></td>
            <td id="styled_td"><?php echo $Contratos[$row] ['contratacion_alcances'];?></td>
            <td id="styled_td"><?php echo number_format($Contratos[$row] ['contratacion_precio'],2,'.',',');?></td>	
            <td id="styled_td"><?php echo $Contratos[$row] ['contratacion_inicio'];?></td>
            <td id="styled_td"><?php echo $Contratos[$row] ['contratacion_final'];?></td>
            <td id="styled_td"><?php echo $Contratos[$row] ['contratacion_duracion'];?></td>
            <td id="styled_td"><?php echo CHtml::link(CHtml::Button('Ver información detallada'), array('FichaTecnica', 'control'=>'Contratacion', 'id'=>$Contratos[$row] ['idContratacion'])); ?></td>      
           <?php $td_style = false;
               }?>               
        </tr>
	
<?php $row++;}

    


    

?>
        
             </table>
        </br>
<?php /*
    $query = "Select Distinct
                  vCiudadano.idPrograma,
                  vCiudadano.idProyecto,
                  vCiudadano.idCalificacion,
                  vCiudadano.idAdjudicacion,
                  vCiudadano.idContratacion,
                  vCiudadano.contratacion_nombre,
                  vCiudadano.contratacion_numero,
                  vCiudadano.contratacion_alcances,
                  vCiudadano.contratacion_precio,
                  vCiudadano.contratacion_inicio,
                  vCiudadano.contratacion_final,
                  vCiudadano.contratacion_duracion,
                  vCiudadano.contratacion_estado
              From
                  vCiudadano
              Where
                  vCiudadano.idContratacion Is Not Null And
                  vCiudadano.proyecto_codigo_depto = '01'
            ";
    $count=Yii::app()->db->createCommand($query)->queryAll();
    $dataProvider = new CSqlDataProvider($query, array(
                                                        'keyField' => 'idContratacion', 
                                                        'totalItemCount' => 6,
                                                        'sort' => array(
                                                            'attributes' => array(
                                                                'idContratacion','contratacion_numero', 'contratacion_nombre'
                                                            ),
                                                            'defaultOrder' => array(
                                                                'idContratacion' => CSort::SORT_ASC, //default sort value
                                                            ),
                                                        ),
                                                        'pagination' => array(
                                                            'pageSize' => 3,
                                                            'currentPage' => 1,
                                                        ),
                                                    )
                                        );
    var_dump($dataProvider);

    $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'students-grid',
    'dataProvider'=> $dataProvider, 
    )); */
?>

	<?php }else{  }?>