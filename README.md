# Telkom Akses Palembang Stock Opname Application
Developed by:
1. [Muhammad Fadhil Zahran Muwafa](https://www.linkedin.com/in/fadhil-zahran-muwafa-269747261) (Project Leader & Back-end)
2. [Muhammad Rafi Akbar](https://linkedin.com/in/murafba) (Project Assistant & Front-end)

## 1. Introduction
This web-based application is developed using the CodeIgniter 4 framework. The purpose of this app is to manage all incoming and outgoing Network Terminal Equipment (NTE) material data and perform automatic stock opname. It represents an innovative solution developed by the Informatics Engineering interns of Sriwijaya University, led by Muhammad Fadhil Zahran Muwafa. According to our report, this application has resulted in a 50% efficiency improvement in performing stock opname. Consequently, warehouse administrators at PT Telkom Akses Palembang no longer need to manually conduct weekly stock opname, thanks to this app. 
<br>

## 2. What is CodeIgniter?
CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure. More information can be found at the [official site](http://codeigniter.com). This repository holds a composer-installable app starter. It has been built from the [development repository](https://github.com/codeigniter4/CodeIgniter4). More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums. The user guide corresponding to this version of the framework can be found [here](https://codeigniter4.github.io/userguide/).
<br>

## 3. CodeIgniter 4 Installation & Updates
1. `composer create-project codeigniter4/appstarter` then `composer update` whenever there is a new release of the framework.
2. When updating, check the release notes to see if there are any changes you might need to apply to your `app` folder. The affected files can be copied or merged from `vendor/codeigniter4/framework/app`.
3. Run the commands below to check whether the CI4 instalation has been succeeded.
```
cd <your_dir>
php spark serve
```
4. Open localhost URL in your browser.
<br>

## 4. Setup
Copy `env` to `.env` and tailor for your app, specifically the baseURL
and any database settings.

> [!IMPORTANT]
> Important Change with index.php<br>
> `index.php` is no longer in the root of the project! It has been moved inside the *public* folder, for better security and separation of components.
> This means that you should configure your web server to "point" to your project's *public* folder, and not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the framework are exposed.
<br>

## 5. Repository Management
We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages. We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script. Problems with it can be raised on our forum, or as issues in the main repository.
<br>

## 6. Server Requirements
PHP version 7.4 or higher is required, with the following extensions installed:
- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library
> [!WARNING]
> The end of life date for PHP 7.4 was November 28th, 2022. The end of life data for PHP 8.0 was November 26th, 2023. If you are still using PHP 7.4 or 8.0, you should upgrade immediately. The end of life date for PHP 8.1 will be November 25th, 2024.

Additionally, make sure that the following extensions are enabled in your PHP:
- json (enabled by default - don't turn it off!)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) - if you plan to use the MySQL
- xml (enabled by default - don't turn it off)
- [libcurl](https://php.net/manual/en/curl.requirements.php) -  If you plan to use the HTTP\CURLRequest library
<br>

## 7. 
