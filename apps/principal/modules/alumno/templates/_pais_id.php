<?php
    use_helper('Javascript');
    
    $c = new Criteria();
    $paises = PaisPeer::doSelect($c);
    if ($alumno->getFkProvinciaId()) {
        $pais_selected = $alumno->getProvincia()->getPais()->getId();
        $provincia_id = $alumno->getFkProvinciaId();
    } else {
        $pais_selected = $paises[0]->getId();
        $provincia_id = 0;
    }
        
    echo select_tag('pais_id',objects_for_select($paises,'getId','getNombreLargo',$pais_selected));
    
    echo observe_field('pais_id', array(
        'update'   => 'item_provincia',
        'url'      => 'alumno/cambiarPais?vista=noMuestraMenu',
        'with'     => "'pais_id=' + value"));
        
    echo javascript_tag(
        remote_function( array(
        'update'  => 'item_provincia',
        'url'     => 'alumno/cambiarPais?vista=noMuestraMenu&pais_id='. $pais_selected . '&provincia_id=' . $provincia_id,
        ))
    );
                                               
?>
