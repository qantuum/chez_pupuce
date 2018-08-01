# chez_pupuce
Evaluation project with theme : OOP
-----------------------------------

Created 25-Jul-2018  
'create a veterinary online shop'  
challenge deadline : 03-Aug-2018  
progression rate : +/- 4hrs/working day  

--calendar--  
*25-Jul-2018::Creating Employe, Fournisseur and Client databases, creating CRUD interface, Personnes, Clients, Employes, Fournisseurs Class  
*26-Jul-2018::First features in Clients class, some changes to be made  
*27-Jul-2018::First big bug, adding Produit, Fournisseur, FournisseurProduit, Commande databases  
*30-Jul-2018::Last fixes to Clients with changing a bit method expressions and arguments  
*31-Jul-2018::Starting all Employes methods, heavy copy/pasting session then changing all the necessary fields  
*01-Aug-2018::Continued Employe methods. A second bug is fixed, the bug was happening because of wrong table call. FrontEnd, form to connect an Employe by his n° secu (not hashed). Hopefully adding boards to manage Fournisseurs and Produits  

class diagram is provided by the coach  

please add database in localhost  
database 'chez_pupuce.sql' included in root repository  
database user credentials have to be changed in the file './includes/credentials.php'   

features :  

>>> Client (user) car create an account, connect account session, disconnect account session, delete their account, update their account  
**TODO on this** --- the Client must be able to see his Panier and also a selection of Produits. A front-end interface is there already, but it's empty

>>> Employe (user) can create an account, connect account session, disconnect account session, delete their account, update their account  
**TODO on this** --- the Employe must be able to visualize and manage Fournisseur and Produits list  

>>> index.php has a Client Suscribe form, Client Connect form, Employe suscribe form, Employe Connect form, when Client or Employe is connected, the session is opened, and program switches to a different display (see above)  

>>> **security** : no focus was made on security, since the exercise consists more in creating and managing databases, using OOP. Some simple tests are performed for checking stuff (i.e e-mail address can appear only once in db, postal code must be 5 characters long, passwd1 and passwd2 must be the same). The **TODOS on this** would consist on adding a pregmatch for every field in PHP, as well as building security blocks with the available tools in JS and HTML (warning on client-side if a form error appears). Nevertheless, the use of the Medoo framework is a sure way to avoid SQL injections, since Medoo uses an API to give instructions to SQL.  

frameworks :  

* Medoo (database management in PHP)  
* Bootstrap (frontEnd design)  
* jQuery (unused)  
