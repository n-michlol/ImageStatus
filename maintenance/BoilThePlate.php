<?php

namespace MediaWiki\Extension\ImageStatus\Maintenance;

use Maintenance;

$IP = getenv( 'MW_INSTALL_PATH' );
if ( $IP === false ) {
	$IP = __DIR__ . '/../../..';
}
require_once "$IP/maintenance/Maintenance.php";

class ImageTheStatus extends Maintenance {
	public function __construct() {
		parent::__construct();
		$this->requireExtension( 'ImageStatus' );
	}

	public function execute() {
		$this->output( "ImageStatus was here.\n" );
	}
}

$maintClass = ImageTheStatus::class;
require_once RUN_MAINTENANCE_IF_MAIN;
