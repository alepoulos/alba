<?php

/**
 *    This file is part of Alba.
 * 
 *    Alba is free software; you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation; either version 2 of the License, or
 *    (at your option) any later version.
 *
 *    Alba is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with Alba; if not, write to the Free Software
 *    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
 */


/**
 * relCalendariovacunacionAlumno Acciones
 *
 * @package    alba
 * @author     Jos� Luis Di Biase <josx@interorganic.com.ar>
 * @author     H�ctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id$
 * @filesource
 * @license GPL
 */

class relCalendariovacunacionAlumnoActions extends autorelCalendariovacunacionAlumnoActions
{
  /**
  * Ir a la cuenta del alumno
  */
  function executeIrCuenta(){
    if ( $this->getRequestParameter('id') ){
      
        $c = new Criteria();
        $c->add(RelCalendariovacunacionAlumnoPeer::ID,$this->getRequestParameter('id') );
        $c->addJoin(AlumnoPeer::ID,RelCalendariovacunacionAlumnoPeer::FK_ALUMNO_ID);
        
        $Alum = AlumnoPeer::doSelectOne($c);
        if($Alum->getFkCuentaId()) 
            $this->redirect('cuenta/verCompleta?id='.$Alum->getFkCuentaId());
         else 
             $this->redirect('alumno/list');
    }    
  }
 
  function executeIrAlumnos(){
    $this->redirect('alumno/list');
  }                
}
