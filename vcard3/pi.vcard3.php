<?php

/*
=====================================================
 Author: MaxLazar
 http://www.wiseupstudio.com
 
-----------------------------------------------------
 Updated for EE 3 by: Mark Croxton
 http:hallmark-design.co.uk

=====================================================
 File: pi.vcard.php
-----------------------------------------------------
 Purpose: Create your own vCard
=====================================================
*/

$plugin_info = array(
	'pi_name'     		=> 'vCard3',
	'pi_version'    	=> '3.0.0',
	'pi_author'     	=> 'Max Lazar, updated for EE3 by Mark Croxton',
	'pi_author_url'   	=> 'http://wiseupstudio.com/',
	'pi_description'  	=> 'Create your own vCard.',
	'pi_usage'			=> Vcard3::usage()
);

class Vcard3 {

   	public $return_data = '';
    
	public function __construct() 
	{
        $tagdata = ee()->TMPL->tagdata;

		$data = array(
					"class" => (!ee()->TMPL->fetch_param('class')) ? '' : ee()->TMPL->fetch_param('class'),
					"display_name" => (!ee()->TMPL->fetch_param('display_name')) ? '' : ee()->TMPL->fetch_param('display_name'),
					"first_name" => (!ee()->TMPL->fetch_param('first_name')) ? '' : ee()->TMPL->fetch_param('first_name'),
					"last_name" => (!ee()->TMPL->fetch_param('last_name')) ? '' : ee()->TMPL->fetch_param('last_name'),
					"additional_name" => (!ee()->TMPL->fetch_param('additional_name')) ? '' : ee()->TMPL->fetch_param('additional_name'),
					"name_prefix" => (!ee()->TMPL->fetch_param('name_prefix')) ? '' : ee()->TMPL->fetch_param('name_prefix'),
					"name_suffix" => (!ee()->TMPL->fetch_param('name_suffix')) ? '' : ee()->TMPL->fetch_param('name_suffix'),
					"nickname" => (!ee()->TMPL->fetch_param('nickname')) ? '' : ee()->TMPL->fetch_param('nickname'),
					"title" => (!ee()->TMPL->fetch_param('title')) ? '' : ee()->TMPL->fetch_param('title'),
					"role" => (!ee()->TMPL->fetch_param('role')) ? '' : ee()->TMPL->fetch_param('role'),
					"department" => (!ee()->TMPL->fetch_param('department')) ? '' : ee()->TMPL->fetch_param('department'),
					"company" => (!ee()->TMPL->fetch_param('company')) ? '' : ee()->TMPL->fetch_param('company'),
					"work_po_box" => (!ee()->TMPL->fetch_param('work_po_box')) ? '' : ee()->TMPL->fetch_param('work_po_box'),
					"work_extended_address" => (!ee()->TMPL->fetch_param('work_extended_address')) ? '' : ee()->TMPL->fetch_param('work_extended_address'),
					"work_address" => (!ee()->TMPL->fetch_param('work_address')) ? '' : ee()->TMPL->fetch_param('work_address'),
					"work_city" => (!ee()->TMPL->fetch_param('work_city')) ? '' : ee()->TMPL->fetch_param('work_city'),
					"work_state" => (!ee()->TMPL->fetch_param('work_state')) ? '' : ee()->TMPL->fetch_param('work_state'),
					"work_postal_code" => (!ee()->TMPL->fetch_param('work_postal_code')) ? '' : ee()->TMPL->fetch_param('work_postal_code'),
					"work_country" => (!ee()->TMPL->fetch_param('work_country')) ? '' : ee()->TMPL->fetch_param('work_country'),
					"home_po_box" => (!ee()->TMPL->fetch_param('home_po_box')) ? '' : ee()->TMPL->fetch_param('home_po_box'),
					"home_extended_address" => (!ee()->TMPL->fetch_param('home_extended_address')) ? '' : ee()->TMPL->fetch_param('home_extended_address'),
					"home_address" => (!ee()->TMPL->fetch_param('home_address')) ? '' : ee()->TMPL->fetch_param('home_address'),
					"home_city" => (!ee()->TMPL->fetch_param('home_city')) ? '' : ee()->TMPL->fetch_param('home_city'),
					"home_state" => (!ee()->TMPL->fetch_param('home_state')) ? '' : ee()->TMPL->fetch_param('home_state'),
					"home_postal_code" => (!ee()->TMPL->fetch_param('home_postal_code')) ? '' : ee()->TMPL->fetch_param('home_postal_code'),
					"home_country" => (!ee()->TMPL->fetch_param('home_country')) ? '' : ee()->TMPL->fetch_param('home_country'),
					"office_tel" => (!ee()->TMPL->fetch_param('office_tel')) ? '' : ee()->TMPL->fetch_param('office_tel'),
					"office_tel1" => (!ee()->TMPL->fetch_param('office_tel1')) ? '' : ee()->TMPL->fetch_param('office_tel1'),
					"office_tel2" => (!ee()->TMPL->fetch_param('office_tel2')) ? '' : ee()->TMPL->fetch_param('office_tel2'),
					"office_tel3" => (!ee()->TMPL->fetch_param('office_tel3')) ? '' : ee()->TMPL->fetch_param('office_tel3'),
					"office_tel4" => (!ee()->TMPL->fetch_param('office_tel4')) ? '' : ee()->TMPL->fetch_param('office_tel4'),
					"home_tel" => (!ee()->TMPL->fetch_param('home_tel')) ? '' : ee()->TMPL->fetch_param('home_tel'),
					"cell_tel" => (!ee()->TMPL->fetch_param('cell_tel')) ? '' : ee()->TMPL->fetch_param('cell_tel'),
					"cell_tel1" => (!ee()->TMPL->fetch_param('cell_tel1')) ? '' : ee()->TMPL->fetch_param('cell_tel1'),
					"cell_tel2" => (!ee()->TMPL->fetch_param('cell_tel2')) ? '' : ee()->TMPL->fetch_param('cell_tel2'),
					"cell_tel3" => (!ee()->TMPL->fetch_param('cell_tel3')) ? '' : ee()->TMPL->fetch_param('cell_tel3'),
					"fax_tel" => (!ee()->TMPL->fetch_param('fax_tel')) ? '' : ee()->TMPL->fetch_param('fax_tel'),
					"fax_tel1" => (!ee()->TMPL->fetch_param('fax_tel1')) ? '' : ee()->TMPL->fetch_param('fax_tel1'),
					"fax_tel2" => (!ee()->TMPL->fetch_param('fax_tel2')) ? '' : ee()->TMPL->fetch_param('fax_tel2'),
					"fax_tel3" => (!ee()->TMPL->fetch_param('fax_tel3')) ? '' : ee()->TMPL->fetch_param('fax_tel3'),
					"pager_tel" => (!ee()->TMPL->fetch_param('pager_tel')) ? '' : ee()->TMPL->fetch_param('pager_tel'),
					"email1" => (!ee()->TMPL->fetch_param('email1')) ? '' : ee()->TMPL->fetch_param('email1'),
					"email2" => (!ee()->TMPL->fetch_param('email2')) ? '' : ee()->TMPL->fetch_param('email2'),
					"url" => (!ee()->TMPL->fetch_param('url')) ? '' : str_replace("&#47;", "/", urldecode(ee()->TMPL->fetch_param('url'))),
					"photo" => (!ee()->TMPL->fetch_param('photo')) ? '' : ee()->TMPL->fetch_param('photo'),
					"birthday" => (!ee()->TMPL->fetch_param('birthday')) ? '' : ee()->TMPL->fetch_param('birthday'),
					"timezone" => (!ee()->TMPL->fetch_param('timezone')) ? '' : ee()->TMPL->fetch_param('timezone'),
					"sort_string" => (!ee()->TMPL->fetch_param('sort_string')) ? '' : ee()->TMPL->fetch_param('sort_string'),
					"note" => (!ee()->TMPL->fetch_param('note')) ? '' : ee()->TMPL->fetch_param('note'),
					"short_mode" => (!ee()->TMPL->fetch_param('short_mode')) ? "\r\n" : ((ee()->TMPL->fetch_param('short_mode') == "on") ? ' ' : "\r\n"),
					"geo" => (!ee()->TMPL->fetch_param('geo')) ? '' : ee()->TMPL->fetch_param('geo')
					);

		$vc = new vcard();
		
		$vc->data = $data;
		
		$vcard_name = ( !ee()->TMPL->fetch_param('vcard_name')) ? trim($data['display_name']) : ee()->TMPL->fetch_param('vcard_name');
		
		$direct= ( !ee()->TMPL->fetch_param('direct')) ? false : ((ee()->TMPL->fetch_param('direct') == 'yes') ? true : false);
		
		if ( !$vc->card) { $vc->build();}
		
		$vcard_name = str_replace(" ", "_", $vcard_name);

		if ( !$direct) 
		{
			header("Content-type: text/x-vCard;");
			Header("Content-Length: ".strlen($vc->card));
			header("Content-Disposition: attachment; filename=".$vcard_name.".vcf");
			header("Pragma: public");
		}

		$this->return_data = &$vc->card;
    }


// ----------------------------------------
//  Plugin Usage
// ----------------------------------------

// This function describes how the plugin is used.
//  Make sure and use output buffering

public static function usage()
{ 
ob_start(); 
?>

Tag:
{exp:vcard3}

Parameters:
class = ""
display_name = ""
first_name = ""
last_name = ""
additional_name = ""
name_prefix = ""
name_suffix = ""
nickname = ""
title = ""
role = ""
department = ""
company = ""
work_po_box = ""
work_extended_address = ""
work_address = ""
work_city = ""
work_state = ""
work_postal_code = ""
work_country = ""
home_po_box = ""
home_extended_address = ""
home_address = ""
home_city = ""
home_state = ""
home_postal_code = ""
home_country = ""
office_tel = ""
office_tel1 = ""
office_tel2 = ""
office_tel3 = ""
office_tel4 = ""
home_tel = ""
cell_tel = ""
cell_tel2 = ""
cell_tel3 = ""
fax_tel = ""
fax_tel1 = ""
fax_tel2 = ""
fax_tel3 = ""
pager_tel = ""
email1 = ""
email2 = ""
url = ""{url}
photo = ""
birthday = ""
timezone = ""
sort_string = ""
note = ""
	
vcard_name = ""
	
vcard filename by default is {display_name}, but u can choose u own format. 

For example: 
{exp:vcard3 
display_name = "TSawyer"
first_name = "Tom" 
last_name = "Sawyer"
title = "Mister"
cell_tel = "+1 914 218 94885"	
email1 = "Tom.Sawyer@gmail.com"
url = "http://MarkTwain.com"
company = "Fence Design"
work_address = "351 Farmington Avenue, Hartford, CT"
title = "HR"
note = "2000-plus fence design ideas submitted"
vcard_name = "tsawye"}

<?php
$buffer = ob_get_contents();
  
ob_end_clean(); 

return $buffer;
}
/* END */

}

/*
* Filename.......: class_vcard.php
* Author.........: Troy Wolf [troy@troywolf.com]
* Last Modified..: 12 May 2016 by Mark Croxton
* Description....: A class to generate vCards for contact data.
*/
class vcard {
  var $log;
  var $data;  //array of this vcard's contact data
  var $filename; //filename for download file naming
  var $class; //PUBLIC, PRIVATE, CONFIDENTIAL
  var $revision_date;
  var $card;
  
  /*
  The class constructor. You can set some defaults here if desired.
  */
  function __construct() {
    $this->log = "New vcard() called<br />";
    $this->data = array(
	"class"=>null
,"display_name"=>null
,"first_name"=>null
,"last_name"=>null
,"additional_name"=>null
,"name_prefix"=>null
,"name_suffix"=>null
,"nickname"=>null
,"title"=>null
,"role"=>null
,"department"=>null
,"company"=>null
,"work_po_box"=>null
,"work_extended_address"=>null
,"work_address"=>null
,"work_city"=>null
,"work_state"=>null
,"work_postal_code"=>null
,"work_country"=>null
,"home_po_box"=>null
,"home_extended_address"=>null
,"home_address"=>null
,"home_city"=>null
,"home_state"=>null
,"home_postal_code"=>null
,"home_country"=>null
,"office_tel"=>null
,"office_tel1"=>null
,"office_tel2"=>null
,"office_tel3"=>null
,"office_tel4"=>null
,"home_tel"=>null
,"cell_tel"=>null
,"cell_tel1"=>null
,"cell_tel2"=>null
,"cell_tel3"=>null
,"fax_tel"=>null
,"fax_tel1"=>null
,"fax_tel2"=>null
,"fax_tel3"=>null
,"pager_tel"=>null
,"email1"=>null
,"email2"=>null
,"url"=>null
,"photo"=>null
,"birthday"=>null
,"timezone"=>null
,"sort_string"=>null
,"note"=>null
,"short_mode" => null
);
    return true;
  }

  /*
  build() method checks all the values, builds appropriate defaults for
  missing values, generates the vcard data string.
  */  
  function build() {
    $this->log .= "vcard build() called<br />";
    /*
    For many of the values, if they are not passed in, we set defaults or
    build them based on other values.
    */

    if (!$this->data['display_name']) {
$this->data['display_name'] = trim($this->data['first_name']." ".$this->data['last_name']);
    }
    if (!$this->data['sort_string']) { $this->data['sort_string'] = $this->data['last_name']; }
    if (!$this->data['sort_string']) { $this->data['sort_string'] = $this->data['company']; }
    if (!$this->data['timezone']) { $this->data['timezone'] = date("O"); }
    if (!$this->revision_date) { $this->revision_date = date('Y-m-d H:i:s'); }
    
  	$this->card = "BEGIN:VCARD".$this->data['short_mode'];
    $this->card .= "VERSION:3.0".$this->data['short_mode'];
	if ($this->data['class']) { $this->card .= "CLASS:".$this->data['class'].$this->data['short_mode']; }
	
    $this->card .= "REV:".$this->revision_date.$this->data['short_mode'];
  	$this->card .= "FN:".$this->data['display_name'].$this->data['short_mode'];
    $this->card .= "N:"
.$this->data['last_name'].";"
.$this->data['first_name'].";"
.$this->data['additional_name'].";"
.$this->data['name_prefix'].";"
.$this->data['name_suffix'].$this->data['short_mode'];
    if ($this->data['nickname']) { $this->card .= "NICKNAME:".$this->data['nickname'].$this->data['short_mode']; }
  	if ($this->data['title']) { $this->card .= "TITLE:".$this->data['title'].$this->data['short_mode']; }
  	if ($this->data['company']) { $this->card .= "ORG:".$this->data['company']; }
  	if ($this->data['department']) { $this->card .= ";".$this->data['department']; }
	$this->card .= $this->data['short_mode'];
  	
  	if ($this->data['work_po_box']
    || $this->data['work_extended_address']
    || $this->data['work_address']
    || $this->data['work_city']
    || $this->data['work_state']
    || $this->data['work_postal_code']
    || $this->data['work_country']) {
$this->card .= "ADR;TYPE=work:"
  .$this->data['work_po_box'].";"
  .$this->data['work_extended_address'].";"
  .$this->data['work_address'].";"
  .$this->data['work_city'].";"
  .$this->data['work_state'].";"
  .$this->data['work_postal_code'].";"
  .$this->data['work_country'].$this->data['short_mode'];
    }
  	if ($this->data['home_po_box']
    || $this->data['home_extended_address']
    || $this->data['home_address']
    || $this->data['home_city']
    || $this->data['home_state']
    || $this->data['home_postal_code']
    || $this->data['home_country']) {
$this->card .= "ADR;TYPE=home:"
  .$this->data['home_po_box'].";"
  .$this->data['home_extended_address'].";"
  .$this->data['home_address'].";"
  .$this->data['home_city'].";"
  .$this->data['home_state'].";"
  .$this->data['home_postal_code'].";"
  .$this->data['home_country'].$this->data['short_mode'];
    }
    if ($this->data['email1']) { $this->card .= "EMAIL;TYPE=internet,pref:".$this->data['email1'].$this->data['short_mode']; }
    if ($this->data['email2']) { $this->card .= "EMAIL;TYPE=internet:".$this->data['email2'].$this->data['short_mode']; }
	
    if ($this->data['office_tel']) { $this->card .= "TEL;TYPE=work,voice,pref:".$this->data['office_tel'].$this->data['short_mode']; }
	if ($this->data['office_tel1']) { $this->card .= "TEL;TYPE=work,voice:".$this->data['office_tel1'].$this->data['short_mode']; }
	if ($this->data['office_tel2']) { $this->card .= "TEL;TYPE=work,voice:".$this->data['office_tel2'].$this->data['short_mode']; }
  	if ($this->data['office_tel3']) { $this->card .= "TEL;TYPE=work,voice:".$this->data['office_tel3'].$this->data['short_mode']; }  
	if ($this->data['office_tel4']) { $this->card .= "TEL;TYPE=work,voice:".$this->data['office_tel4'].$this->data['short_mode']; }  
	
	if ($this->data['home_tel']) { $this->card .= "TEL;TYPE=home,voice:".$this->data['home_tel'].$this->data['short_mode']; }
    if ($this->data['cell_tel']) { $this->card .= "TEL;TYPE=cell,voice,pref:".$this->data['cell_tel'].$this->data['short_mode']; }
	if ($this->data['cell_tel1']) { $this->card .= "TEL;TYPE=cell,voice:".$this->data['cell_tel1'].$this->data['short_mode']; }
	if ($this->data['cell_tel2']) { $this->card .= "TEL;TYPE=cell,voice:".$this->data['cell_tel2'].$this->data['short_mode']; }
	if ($this->data['cell_tel3']) { $this->card .= "TEL;TYPE=cell,voice:".$this->data['cell_tel3'].$this->data['short_mode']; }
    if ($this->data['fax_tel']) { $this->card .= "TEL;TYPE=work,fax,pref:".$this->data['fax_tel'].$this->data['short_mode']; }
	if ($this->data['fax_tel1']) { $this->card .= "TEL;TYPE=work,fax:".$this->data['fax_tel'].$this->data['short_mode']; }
	if ($this->data['fax_tel2']) { $this->card .= "TEL;TYPE=work,fax:".$this->data['fax_tel1'].$this->data['short_mode']; }
	if ($this->data['fax_tel3']) { $this->card .= "TEL;TYPE=work,fax:".$this->data['fax_tel2'].$this->data['short_mode']; }
	if ($this->data['fax_tel3']) { $this->card .= "TEL;TYPE=work,fax:".$this->data['fax_tel3'].$this->data['short_mode']; }
    if ($this->data['pager_tel']) { $this->card .= "TEL;TYPE=work,pager:".$this->data['pager_tel'].$this->data['short_mode']; }
    if ($this->data['url']) { $this->card .= "URL;TYPE=work:".$this->data['url'].$this->data['short_mode']; }
  	if ($this->data['birthday']) { $this->card .= "BDAY:".$this->data['birthday'].$this->data['short_mode']; }
  	if ($this->data['role']) { $this->card .= "ROLE:".$this->data['role'].$this->data['short_mode']; }
  	if ($this->data['note']) { $this->card .= "NOTE:".$this->data['note'].$this->data['short_mode']; }
	if ($this->data['geo']) { $this->card .= "GEO:".$this->data['geo'].$this->data['short_mode']; }
  	$this->card .= "TZ:".$this->data['timezone'].$this->data['short_mode'];
    $this->card .= "END:VCARD\r";
  }
}