# Access to your Dolibarr From Laravel app

## Installation

- Require it with Composer:

```bash
composer require caprel/laravel-dolibarr
```

Voir https://packagist.org/packages/caprel/laravel-dolibarr

## Publish config file :


```
php artisan vendor:publish --provider="Caprel\Dolibarr\DolibarrServiceProvider" --tag="config"
```

Then add in your config .env file 

```
DOLIBARR_USER_LOGIN=
DOLIBARR_USER_PASSWORD=
DOLIBARR_API_KEY=
DOLIBARR_SERVER_URI=
DOLIBARR_AUTH_ACCESS=false
```

## Tests

```
php artisan dolibarr:search --help
```

## Code

The main idea is to give "laravel" reflex, then you can make a search on ThirdParties like that

```
$tp = new DolibarrThirdparties;
$res = $tp->where("nom","LIKE", "%CAP%")->get();
print_r($res);
```

And for example you can put others options in your request :

```
$res = $tp->where("nom","LIKE", "%CAP%")->limit(10)->get();
```

```
$res = $tp->where("nom","LIKE", "%CAP%")->limit(10)->orderBy("nom")->get();
```

Whith all dolibarr objects:
 * Agendaevents
 * Bankaccounts
 * Boms
 * Categories
 * CommonObject
 * Contacts
 * Contracts
 * Documents
 * Expensereports
 * Invoices
 * Mos
 * Orders
 * Products
 * Projects
 * Proposals
 * Shipments
 * Stockmovements
 * Supplierinvoices
 * Supplierorders
 * Tasks
 * Thirdparties
 * Users
 * Warehouses
