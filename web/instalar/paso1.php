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
 * instalador
 *
 * @package    alba
 * @author     José Luis Di Biase <josx@interorganic.com.ar>
 * @author     Héctor Sanchez <hsanchez@pressenter.com.ar>
 * @author     Fernando Toledo <ftoledo@pressenter.com.ar>
 * @version    SVN: $Id: instalar.php 4883 2007-07-30 21:41:42Z ftoledo $
 * @filesource
 * @license GPL
 */
 
if (!defined('ALBA_INSTALLER')) die();
 
$dirs = array(
    'config', 
    'cache', 
    'log', 
    'web' . DIRECTORY_SEPARATOR . 'tmp',
    'web' . DIRECTORY_SEPARATOR. 'uploads',
    'web' . DIRECTORY_SEPARATOR. 'uploads' .DIRECTORY_SEPARATOR. 'assets',
);
 
$alba_path = AlbaPath();
?>
<div id="detalle">
<p>Antes de continuar con la instalaci&oacute;n, es necesario comprobar los permisos
de algunos directorios en particular.<br/>
Por favor, corrija los mismos y vuelva a recargar &eacute;sta p&aacute;gina hasta que todos
esten correctos. 
</p>
</div>
              
<p>Directorio base: <?php echo $alba_path?></p> 
<table>
<?php foreach($dirs as $dir):?>
    <?php
    if (!is_writable($alba_path .DIRECTORY_SEPARATOR . $dir))
        $error_flag = true;
    ?>
    <tr>
        <td>Comprobando permisos en: <?php echo $dir ?></td>
        <td><?php echo is_writable($alba_path .DIRECTORY_SEPARATOR . $dir) ? IMG_OK : IMG_ERROR ." (Debe cambiar los permisos)" ?></td>
    </tr>
<?php endforeach;?>
</table>

<?php 
// ir al siguiente paso
   $paso = 2;
?>