Getting started
===================
Hey! A Simple, Flexible and Beautiful class adver

Documents
-------------

Advert class and a **small tool that quickly and easily allows an advert** created with some option

> **USING:**

> - Display an advert.
> - Store in the session an advert.
> - Add a type of advert.
> - Choose themed advert.

#### Display an advert.

Displays an advert directly :

>>  **Parameter :**
>> *name* = advert name
>> *type* = type of advert ('succes/info/warning/danger')
>> *keyword* = keyword of the advert if auto it will display the name of the type
>> *text* = text advert

>$advert->push('*name*', '*type*', '*keyword*', '*text*');
	
    $advert->push('push example', 'info', 'news', 'neque porro quisquam est qui dolorem ipsum');

####Store in the session an advert.

Advert to store a session to view the other:
>> **Parameter :**
>>  *name* = advert name
>> *type* = type of advert ('succes/info/warning/danger')
>> *keyword* = keyword of the advert if auto it will display the name of the type
>> *text* = text advert

>	$advert->session('*name*', '*type*', '*keyword*', '*text*');
	
    $advert->session('push example', 'info', 'news', 'neque porro quisquam est qui dolorem ipsum');

Push advert storage.

>> **Parameter :**
>>  *name* = advert name

>	$advert->push_session('name');

    $advert->push_session('session');

#### Add a type of advert.

Creates a new type of advert : 
>> **Parameter :**
>>  name = type name
>> *type* = type of advert ('succes/info/warning/danger')
>> color = hex Color
>> *text* = text advert

>	$advert->addcolor('name','color');
	
    $advert->addcolor('admin','#475577');

#### Choose themed advert.

Change style advert : 
>> **Parameter :**
>>  style = name of style ('round/top')

>	$advert->setstyle('style');
	
    $advert->setstyle('round');


Create new theme
-------------
edit file asset/css/advert.css

    .advert_top{
	height: 50px;
	width: 100%;
	line-height: 50px;
	color: white;
	float: 	left;
}

.advert_top > strong{
	font-size: 	1.2em;
	font-family: 'Open Sans';
	padding-left: 	10px;
}

.advert_top >.advert{
	float: 	right;
	line-height: 50px;
	margin-right: 20px;
	text-align:left;
	display:block;
	height: 50px;
	margin:16px 25px 0 0;
	cursor: pointer;
	
}

.advert_top >.advert:hover{
	font-size: 	1.1em;
}

