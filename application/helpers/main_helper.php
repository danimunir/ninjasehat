<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function rupiahkan($nominal){
	return 'Rp '.number_format($nominal, 0, ',', '.');
}