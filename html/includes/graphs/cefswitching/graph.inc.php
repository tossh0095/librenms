<?php

// Cycle through dot3stats OIDs and build list of RRAs to pass to multi simplex grapher
$oids = array(
    'drop',
    'punt',
    'hostpunt',
);
$i    = 0;

if (rrdtool_check_rrd_exists($rrd_filename)) {
    foreach ($oids as $oid) {
        $oid    = str_replace('dot3Stats', '', $oid);
        $oid_ds = truncate($oid, 19, '');
        $rrd_list[$i]['filename'] = $rrd_filename;
        $rrd_list[$i]['descr']    = $oid;
        $rrd_list[$i]['ds']       = $oid_ds;
        $i++;
    }
}

$colours   = 'mixed';
$nototal   = 1;
$unit_text = 'Errors';

require 'includes/graphs/generic_multi_simplex_seperated.inc.php';
