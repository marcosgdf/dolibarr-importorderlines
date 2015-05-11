<?php

/**
 * Copyright © 2015 Marcos García de La Fuente <hola@marcosgdf.com>
 *
 * This file is part of Importorderlines.
 *
 * Multismtp is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Multismtp is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Multismtp.  If not, see <http://www.gnu.org/licenses/>.
 */

if (file_exists('../../main.inc.php')) {
	require '../../main.inc.php';
} else {
	require '../../../main.inc.php';
}

$langs->load('admin');
$langs->load('importorderlines@importorderlines');

llxHeader();

$linkback='<a href="'.DOL_URL_ROOT.'/admin/modules.php">'.$langs->trans("BackToModuleList").'</a>';
print_fiche_titre($langs->trans('ImportOrderLinesInfo'), $linkback);

?>

<div class="titre"><?php echo $langs->trans('ImportOrderLinesTitle') ?></div>

<p><?php echo $langs->trans('ImportOrderLinesInfoFormat') ?></p><ul>
	<li><?php echo $langs->trans('ImportOrderLinesInfoFormatA', $langs->trans('Ref')) ?></li>
	<li><?php echo $langs->trans('ImportOrderLinesInfoFormatB', $langs->trans('Label')) ?></li>
	<li><?php echo $langs->trans('ImportOrderLinesInfoFormatC', $langs->trans('Qty')) ?></li>
</ul>
<p><?php echo $langs->trans('ImportOrderLinesInfoFormatMore') ?></p>
<p><?php echo $langs->trans('ImportOrderLinesInfoFormatCreate',
		$langs->transnoentities('Tools'),
		$langs->transnoentities('NewExport'),
		$langs->transnoentities('Products'),
		$langs->transnoentities('Ref')
	).$langs->trans('ImportOrderLinesInfoFormatCreate2',
			$langs->transnoentities('Label'),
			$langs->transnoentities('Qty')
		) ?></p>
<p><?php echo $langs->trans('ImportOrderLinesInfoFormatExample') ?></p>
<img src="<?php echo $langs->trans('ImportOrderLinesInfoFormatExampleImgSrc') ?>" alt="<?php echo $langs->trans('ImportOrderLinesInfoFormatExampleImgAlt') ?>">

<br><br>

<div class="titre"><?php echo $langs->trans('ImportOrderLinesInfoUsing') ?></div>

<p><?php echo $langs->trans('ImportOrderLinesInfoUsingOrder', $langs->transnoentities('ImportOrderLines')) ?></p>

<br>

<div class="titre"><?php echo $langs->trans('ImportOrderLinesAbout') ?></div>

<p><?php echo $langs->trans('ImportOrderLinesAuthor', '<a href="http://marcosgdf.com">http://marcosgdf.com</a>') ?></p>
<p><?php echo $langs->trans('ImportOrderLinesContact', '<a href="mailto:hola@marcosgdf.com">hola@marcosgdf.com</a>') ?></p>

<?php

llxFooter();