# ChangeLog

## 1.0.6 (2023-01-02)
Change composer version depends

## 1.0.5 (2022-11-30)
Do not limit country list

## 1.0.4 (2022-06-07)
Implement multiple where requests with AND logical operator
Implement DELETE commands
New object : DolibarrSetupCompany to get informations about dolibarr company settings
Implement addLine and deleteLine on Orders
add Categorie on Contacts
add subProducts get on products
add Categorie on Objects
add better filter options
add Categorie on dolibarr Thirdpart

## 1.0.3 (2022-03-31)
CommonObject return an object or an collection
Add User-Agent on requests (easy to log server side)
New download method for documents
New find method on CommonObjects
Activate a contract line
AddLine on most of dolibarr objects ('bankaccounts','contracts','invoices','orders','proposals','shipments','supplierinvoices')

## 1.0.2 (2022-03-29)

Add create (POST) / update (PUT) / validate dolibarr call requests
Add first try on Setup part of API with Dictionary Countries : DolibarrSetupDictionaryCountries
## 1.0.1 (2022-03-28)

Search on ID is like a normal where clause, cancel bad idea to put args on get call

## 1.0.0 (2022-03-25)

Project is launched ! All dolibarr objects could be get.
