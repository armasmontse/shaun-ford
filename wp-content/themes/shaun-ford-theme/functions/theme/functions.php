<?php

/**
 * En este archivo se incluyen las funciones del tema 
 *
 */


/** ==============================================================================================================
 *                                              FUNCIONES DEL TEMA
 *  ==============================================================================================================
 */

function getInstagramPhotos()
{
	if (!defined('INSTAGRAM_CLIENT_KEY') || empty('INSTAGRAM_CLIENT_KEY')) {
		return array(
			'https://instagram.fmex7-2.fna.fbcdn.net/t51.2885-15/s640x640/sh0.08/e35/c164.0.752.752/24327718_979693195521145_5926320459137155072_n.jpg',
			'https://instagram.fmex7-2.fna.fbcdn.net/t51.2885-15/s640x640/sh0.08/e35/25007328_463374084057486_4202366662931906560_n.jpg',
			'https://instagram.fmex7-2.fna.fbcdn.net/t51.2885-15/s640x640/sh0.08/e35/24274537_883051235206270_1674945273010323456_n.jpg',
			'https://instagram.fmex7-2.fna.fbcdn.net/t51.2885-15/s640x640/sh0.08/e35/24254161_820673758094437_8968843062188965888_n.jpg',
			'https://instagram.fmex7-2.fna.fbcdn.net/t51.2885-15/s640x640/sh0.08/e35/c1.0.1077.1077/24254633_169558897114728_8684804801751416832_n.jpg',
			'https://instagram.fmex7-2.fna.fbcdn.net/t51.2885-15/s640x640/sh0.08/e35/c0.95.1080.1080/24124861_1912156219101611_2164421152179486720_n.jpg',
			'https://instagram.fmex7-2.fna.fbcdn.net/t51.2885-15/s640x640/sh0.08/e35/23966876_1820539604904919_3278452324921507840_n.jpg',
			'https://instagram.fmex7-2.fna.fbcdn.net/t51.2885-15/s640x640/sh0.08/e35/c0.102.1080.1080/23098704_2000753523539026_3531175532127322112_n.jpg',
			'https://instagram.fmex7-2.fna.fbcdn.net/t51.2885-15/e35/22352341_434368616964185_2080880902946160640_n.jpg',
			'https://instagram.fmex7-2.fna.fbcdn.net/t51.2885-15/s640x640/sh0.08/e35/c4.0.1072.1072/22069330_391481964600723_3757044722602868736_n.jpg',
			'https://instagram.fmex7-2.fna.fbcdn.net/t51.2885-15/s640x640/sh0.08/e35/21435441_393873154348738_3350035200519176192_n.jpg',
			'https://instagram.fmex7-2.fna.fbcdn.net/t51.2885-15/e35/20766112_1528362793892144_4693568255665635328_n.jpg',
			'https://instagram.fmex7-2.fna.fbcdn.net/t51.2885-15/s640x640/sh0.08/e35/20837064_1247676548677748_6997650835094110208_n.jpg',
			'https://instagram.fmex7-2.fna.fbcdn.net/t51.2885-15/s640x640/sh0.08/e35/22280937_285539518619563_506657844297203712_n.jpg',
			'https://instagram.fmex7-2.fna.fbcdn.net/t51.2885-15/s640x640/sh0.08/e35/22221084_1964345760508959_1278426307331358720_n.jpg',
			'https://instagram.fmex7-2.fna.fbcdn.net/t51.2885-15/s640x640/sh0.08/e35/21980596_337488053381076_4425065935614771200_n.jpg',
			'https://instagram.fmex7-2.fna.fbcdn.net/t51.2885-15/e35/21576527_274519029730042_4177729622420488192_n.jpg',
			'https://instagram.fmex7-2.fna.fbcdn.net/t51.2885-15/s640x640/sh0.08/e35/20759926_278135109335844_835068519971291136_n.jpg',
		);
	}
}