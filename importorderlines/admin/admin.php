<?php

/* Copyright (C) 2004-2017 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright © 2015-2016 Marcos García de La Fuente <hola@marcosgdf.com>
 * Copyright (C) 2020 Julio Gonzalez <jrgonzalezrios@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

/**
 * \file    ImportOrderLines/admin/setup.php
 * \ingroup ImportOrderLines
 * \brief   ImportOrderLines setup page.
 */

// Load Dolibarr environment
$res = 0;
// Try main.inc.php into web root known defined into CONTEXT_DOCUMENT_ROOT (not always defined)
if (!$res && !empty($_SERVER["CONTEXT_DOCUMENT_ROOT"])) $res = @include $_SERVER["CONTEXT_DOCUMENT_ROOT"]."/main.inc.php";
// Try main.inc.php into web root detected using web root calculated from SCRIPT_FILENAME
$tmp = empty($_SERVER['SCRIPT_FILENAME']) ? '' : $_SERVER['SCRIPT_FILENAME']; $tmp2 = realpath(__FILE__); $i = strlen($tmp) - 1; $j = strlen($tmp2) - 1;
while ($i > 0 && $j > 0 && isset($tmp[$i]) && isset($tmp2[$j]) && $tmp[$i] == $tmp2[$j]) { $i--; $j--; }
if (!$res && $i > 0 && file_exists(substr($tmp, 0, ($i + 1))."/main.inc.php")) $res = @include substr($tmp, 0, ($i + 1))."/main.inc.php";
if (!$res && $i > 0 && file_exists(dirname(substr($tmp, 0, ($i + 1)))."/main.inc.php")) $res = @include dirname(substr($tmp, 0, ($i + 1)))."/main.inc.php";
// Try main.inc.php using relative path
if (!$res && file_exists("../../main.inc.php")) $res = @include "../../main.inc.php";
if (!$res && file_exists("../../../main.inc.php")) $res = @include "../../../main.inc.php";
if (!$res) die("Include of main fails");

global $langs, $user;

// Libraries
require_once DOL_DOCUMENT_ROOT."/core/lib/admin.lib.php";
//require_once '../lib/ImportOrderLines.lib.php';
//require_once "../class/myclass.class.php";

// Translations
$langs->loadLangs(array("admin", "importorderlines@importorderlines"));

// Access control
if (!$user->admin) accessforbidden();

// Parameters
$action = GETPOST('action', 'alpha');
$backtopage = GETPOST('backtopage', 'alpha');

$arrayofparameters = array(
	'TEST1_MYPARAM1'=>array('css'=>'minwidth200', 'enabled'=>1),
	'TEST1_MYPARAM2'=>array('css'=>'minwidth500', 'enabled'=>1)
);



/*
 * Actions
 */

if ((float) DOL_VERSION >= 6)
{
	include DOL_DOCUMENT_ROOT.'/core/actions_setmoduleoptions.inc.php';
}



/*
 * View
 */

$page_name = "ImportOrderLines Setup";
llxHeader('', $langs->trans($page_name));

// Subheader
$linkback = '<a href="'.($backtopage ? $backtopage : DOL_URL_ROOT.'/admin/modules.php?restore_lastsearch_values=1').'">'.$langs->trans("BackToModuleList").'</a>';

print load_fiche_titre($langs->trans($page_name), $linkback, 'object_importorderlines@importorderlines');

// Configuration header
//$head = test1AdminPrepareHead();
//dol_fiche_head($head, 'settings', '', -1, "importorderlines@importorderlines");

$linkback='<a href="'.DOL_URL_ROOT.'/admin/modules.php">'.$langs->trans("BackToModuleList").'</a>';
?>

<div class="titre"><?php echo $langs->trans('ImportOrderLinesTitle') ?></div>

<p><?php echo $langs->trans('ImportOrderLinesInfoFormat') ?></p><ul>
	<li><?php echo $langs->trans('ImportOrderLinesInfoFormatA', $langs->transnoentities('Ref')) ?></li>
	<li><?php echo $langs->trans('ImportOrderLinesInfoFormatB', $langs->transnoentities('Label')) ?></li>
	<li><?php echo $langs->trans('ImportOrderLinesInfoFormatC', $langs->transnoentities('Qty')) ?></li>
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
<img src="<?php echo 'example-en_US.png' ?>" alt="<?php echo $langs->trans('ImportOrderLinesInfoFormatExampleImgAlt') ?>">

<br><br>

<div class="titre"><?php echo $langs->trans('ImportOrderLinesInfoUsing') ?></div>

<p><?php echo $langs->trans('ImportOrderLinesInfoUsingOrder', $langs->transnoentities('ImportOrderLines')) ?></p>

<br>

<div class="titre"><?php echo $langs->trans('ImportOrderLinesAbout') ?></div>

<p><?php echo $langs->trans('ImportOrderLinesAuthor', '<a href="http://marcosgdf.com">http://marcosgdf.com</a>') ?></p>
<p><?php echo $langs->trans('ImportOrderLinesContact', '<a href="mailto:hola@marcosgdf.com">hola@marcosgdf.com</a>') ?></p>

<?php

// Page end
dol_fiche_end();

llxFooter();
$db->close();