# chez_pupuce
Evaluation project with theme : OOP
-----------------------------------

Created 25-Jul-2018  
'create a veterinary online shop'  
challenge deadline : 06-Aug-2018  
progression rate : +/- 4hrs/working day  
class diagram was provided by the coach 

Summary  
----  
I. Calendar  
II. Features (client side)  
III. Features (programmer side)  
IV. TODOs and future implementations  

### I. Calendar  
*25-Jul-2018::Creating Employe, Fournisseur and Client databases, creating CRUD interface, Personnes, Clients, Employes, Fournisseurs Class  
*26-Jul-2018::First features in Clients class, including the dataRead method, some changes to be made  
*27-Jul-2018::First big bug, adding Produit, Fournisseur, FournisseurProduit, Commande databases, finding a way to use session_start and session_end to connnect/disconnect Client  
*30-Jul-2018::Last fixes to Clients with changing a bit method expressions and arguments :: course about sessions  
*31-Jul-2018::Starting all Employes methods, heavy copy/pasting session then changing all the necessary fields :: course about associating class/instances to database operations  
*01-Aug-2018::Continued Employes methods. A second bug is fixed, the bug was happening because of wrong table call. FrontEnd, form to connect an Employe by his n° secu (not hashed). Hopefully adding boards to manage Fournisseurs and Produits  
*02-Aug-2018::Starting Fournisseurs methods. All methods are written in the same fashion; than in Clients and Employes. Adding method 'dataReadAll' to retrieve the entire table.  
*03-Aug-2018::Display Produits in Employes panel with Fournisseurs'names, using inner join SQL queries, displaying Produits list in Clients panel, trying some jQuery programming to fill the Panier interactively  
*05-Aug-2018 : Last checks, comments in code, rewrite readme.  

 
### II. Features (client side)  
**important** please add database in localhost  
database 'chez_pupuce.sql' included in root repository  
database user credentials have to be changed in the file './includes/credentials.php'   
then the app can be launched  
There are sample examples in the database

two pages are in action :  
./index.php  
./includes/formSubmit.php  

In index.php there is a global panel with four possibilities :  
* Register Client  
* Connect Client  
* Register Employe  
* Connect Employe  

When Client is connected, he accesses his own panel where he can disconnect his session, delete or update account, and more importantly he can see a selection of products (Produits) and fill a cart (Panier). Then he should be able to save the cart for later, or to order, but the functions are not implemented yet.  

When Employe is connected, he can disconnect his session, or delete his account. Other panels allow to visualize Fournisseurs list or Produits list. A later program should have allowed them to add/delete/update each item directly from the list.  

### III. features (programmer side)  

The architecture relies on the following items :  
* ./index.php  
* ./includes/medoo_init  
* ./includes/database  
* ./includes/treatments  

Index is the first page the user will see. It calls the classes items from 'database' and the 'medoo_init'.  
**Medoo** is a PHP framework allowing to treat SQL requests with simplex syntax.  
In index there are several includes, all located in ./includes.htmlParts. They stand for all the forms the user will see. They are triggered by whether a specific session is set or not.  

In 'database' are located all the Classes . Each class contains methods relative to each table.  

In 'treatments' are located :  
* formSubmit.php, it is cut into small includes also located in this folder  
* formChecks.php, a small class made to standardize tests. The class is not fully complete, but is functional  

In the js folder we can find some small programs relative to cart filling...  

### IV. TODOs and future implementations  

>>> Client panel : the Client should be able to fill his Panier from the selection of Produits. At the deadline, the possible actions are only to add product to Panier once, which de-activates the button. A price 'calculator' adds the prices from items in the list.  In state the thing is not functional. The Client should be able to : see butons '+', '-', or 'trash' to set a number of products, or to delete it from Panier. Also he should be able (with the help of PHP), to save a Panier or place an order (Commandes) ***Solutions for this (in the head):::***()  
* finish the jQuery programs with buttons (or number input) to set a number of required products, or delete a product from list. Elaborate as well a good price-calculation system.  
* finish the classes Panier and Commandes to be able to validate a Panier.  
* An idea was to place all the Panier content (product number, price, id, supplier), in a JSON array. Because in the class diagram the solution proposed was only Panier:::'client_id','produit_id','panier_id', only allowing to treat one single product at each Panier.  
* Design all Paniers and Commandes classes and methods necessary.  

 >>> Employe panel : the Employe was designed a tad quickly and then is lacking features. Employe cannot update his account from form, nor can he update//delete/add Fournisseurs and Produits.  
 The framework 'dataTables' used to build db lists, did not work.***Solutions for this (in the head):::***()  
* use methods located in Fournisseurs  
* design and use methods for Produits  
* design the class ProduitsJOINFournisseurs  
* Find a way to get dataTables working  
* Implement a nice interface with 'add', 'update', 'delete' buttons on each list item in Fournisseurs and Produits.  

>>> Security : no focus has been done on security, since the exercise consists more in creating and managing databases, using OOP. Some simple tests are performed for checking stuff (i.e e-mail address can appear only once in db, postal code must be 5 characters long, passwd1 and passwd2 must be the same). The TODOS on this would consist on adding a pregmatch for every field in PHP, as well as building security blocks with the available tools in JS and HTML (warning on client-side if a form error appears). Nevertheless, the use of the Medoo framework is a sure way to avoid SQL injections, since Medoo uses an API to give instructions to SQL.  

>>> frontEnd and consistent data : no focus has been done on frontEnd design, user experience, nor realistic data. All is revolving around the database. The frontEnd uses Bootstrap to make things easier.  

END
==========

Thanks for reading  
Marvin W  
05-Aug-2018  
