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
>>*name* = advert name
>> *type* = type of advert ('succes/info/warning/danger')
>> *keyword* = keyword of the advert if auto it will display the name of the type
>> *text* = text advert

>$advert->push('*name*', '*type*', '*keyword*', '*text*');
	
    $advert->push('push example', 'info', 'news', 'neque porro quisquam est qui dolorem ipsum');

####Rename a document

Advert to store a session to view the other:
>> **Parameter :**
>>  *name* = advert name
>> *type* = type of advert ('succes/info/warning/danger')
>> *keyword* = keyword of the advert if auto it will display the name of the type
>> *text* = text advert

>	$advert->push('*name*', '*type*', '*keyword*', '*text*');
	
    $advert->session('push example', 'info', 'news', 'neque porro quisquam est qui dolorem ipsum');

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
