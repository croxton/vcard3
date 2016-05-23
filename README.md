##vCard3 v3.0.0

Simply way to generate vCards on your ExpressionEngine site. Forked from [MX vCard3](http://www.wiseupstudio.com/expressionengine/mx-vcard3.html) by Max Lazar. 

### Requirements

* [ExpressionEngine](https://ellislab.com/expressionengine) 2.9+ or 3.1+

### Installation

1. [Download vcard3](https://github.com/croxton/vcard3/archive/master.zip)

2. Unzip the download, and then:

	* ExpressionEngine 2* - move the 'vcard3' folder to the `./system/expressionengine/third_party` directory.
	* ExpressionEngine 3* - move the 'vcard3' folder to the `./system/user/addons` directory. Go to Add-On Manager and click the button to install `vCard3`.

### How to use

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
		vcard_name = "tsawye"
	}
	