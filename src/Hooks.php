<?php
/**
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *
 * @file
 */

namespace MediaWiki\Extension\ImageStatus;

use MediaWiki\Hook\ImageBeforeProduceHTMLHook;
use MediaWiki\Hook\BeforePageDisplayHook;
use MediaWiki\Preferences\Hook\GetPreferencesHook;
use MediaWiki\MediaWikiServices;
use MediaWiki\Linker\DummyLinker;
use MediaWiki\Title\Title;
use Parser;
use Wikimedia\Parsoid\Ext\JSON\JSON;

class Hooks implements ImageBeforeProduceHTMLHook, BeforePageDisplayHook, GetPreferencesHook {

	/**
     * @see https://www.mediawiki.org/wiki/Manual:Hooks/ImageBeforeProduceHTML
     * @param string &$html
     * @param array &$args
     * @param \Image $image
	 */
	public function onImageBeforeProduceHTML( $linker, &$title, &$file, &$frameParams, &$handlerParams, &$time, &$res, $parser, &$query, &$widthOption ) {
		wfDebugLog('ImageStatus', "onImageBeforeProduceHTML: Processing image: ". $widthOption);
		$parserOutput = $parser->getOutput();
		/*
		$status = $this->getImageStatus($file) ?? false;
		if ( $status == "block" ) {
			$parserOutput->addCategory('דפים עם תמונות חסומות');
			$html = '<div style="color:red; font-weight:bold;">Image blocked</div>';
            $res = $html;
            return false;
		}
		if (!$status) {
			$frameParams['class'] = "image-status-unknown";
			$parserOutput->addCategory('דפים עם תמונות שלא נבדקו');
		}
			*/
	}

	/**
	 * @see https://www.mediawiki.org/wiki/Manual:Hooks/BeforePageDisplay
	 * @param \OutputPage $out
	 * @param \Skin $skin
	 */
	public function onBeforePageDisplay( $out, $skin ): void {}

	public function onGetPreferences( $user, &$preferences ) {}

}
