<?php
// This file is part of BOINC.
// http://boinc.berkeley.edu
// Copyright (C) 2008 University of California
//
// BOINC is free software; you can redistribute it and/or modify it
// under the terms of the GNU Lesser General Public License
// as published by the Free Software Foundation,
// either version 3 of the License, or (at your option) any later version.
//
// BOINC is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// See the GNU Lesser General Public License for more details.
//
// You should have received a copy of the GNU Lesser General Public License
// along with BOINC.  If not, see <http://www.gnu.org/licenses/>.



require_once("../inc/db.inc");
require_once("../inc/util.inc");
require_once("../inc/prefs.inc");

db_init();

$user = get_logged_in_user();

$subset = get_str("subset");
$columns = get_int("cols", true);
$updated = get_int("updated", true);

page_head(subset_name($subset)." preferences");
if (isset($updated)) {
	echo "<p style='color: red'>
        Your preferences have been updated.
        Client-related preferences
        will take effect when your computer communicates
        with ".PROJECT." or
        you issue the \"Update\" command from the BOINC client.
        </p>
    ";
}
if ($subset == "global") {
    print_prefs_display_global($user, $columns);
} else {
    print_prefs_display_project($user, $columns);
}
page_tail();

$cvs_version_tracker[]="\$Id$";  //Generated automatically - do not edit
?>
