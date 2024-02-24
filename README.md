# Telkom Akses Palembang Stock Opname Application
Developed by:
1. [Muhammad Fadhil Zahran Muwafa](https://www.linkedin.com/in/fadhil-zahran-muwafa-269747261) (Project Leader & Back-end)
2. [Muhammad Rafi Akbar](https://linkedin.com/in/murafba) (Project Assistant & Front-end)


## 1. Introduction
This web-based application is developed using the CodeIgniter 4 framework. The purpose of this app is to manage all incoming and outgoing Network Terminal Equipment (NTE) material data and perform automatic stock opname. It represents an innovative solution developed by the Informatics Engineering interns of Sriwijaya University, led by Muhammad Fadhil Zahran Muwafa. According to our report, this application has resulted in a 50% efficiency improvement in performing stock opname. Consequently, warehouse administrators at PT Telkom Akses Palembang no longer need to manually conduct weekly stock opname, thanks to this app.

> [!NOTE]
> As part of our academic requirements, this intership program conducted from July to August 2022 fulfills the practical work component of our university curriculum. The output of our intership project, namely this application, earned us an *A* grade (Excellent) from our supervising lecturer. We are deemed to have successfully applied the knowledge acquired from our university by delivering innovative solutions in the form of this application along wih written reports to the company and supervising lecturer.


## 2. What is CodeIgniter?
CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure. More information can be found at the [official site](http://codeigniter.com). This repository holds a composer-installable app starter. It has been built from the [development repository](https://github.com/codeigniter4/CodeIgniter4). More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums. The user guide corresponding to this version of the framework can be found [here](https://codeigniter4.github.io/userguide/).


## 3. CodeIgniter 4 Installation & Updates
1. `composer create-project codeigniter4/appstarter` then `composer update` whenever there is a new release of the framework.
2. When updating, check the release notes to see if there are any changes you might need to apply to your `app` folder. The affected files can be copied or merged from `vendor/codeigniter4/framework/app`.
3. Run the commands to check whether the CI4 instalation has been succeeded. `cd <your_dir>` then `php spark serve`
4. Open localhost URL in your browser.


## 4. Setup
1. Clone the repository using `git clone`
2. Copy `env` to `.env` and tailor for your app, specifically the baseURL and any database settings.
3. Run command `composer install`
4. Run command `php spark migrate`
5. Run command `php spark serve`
6. Open localhost URL in your browser


## 5. Important Change with `index.php`
> [!IMPORTANT]
> `index.php` is no longer in the root of the project! It has been moved inside the *public* folder, for better security and separation of components.
> This means that you should configure your web server to "point" to your project's *public* folder, and not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the framework are exposed.


## 6. Repository Management
We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages. We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script. Problems with it can be raised on our forum, or as issues in the main repository.


## 7. Server Requirements
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


## 8. Features & Functionalities
Figure 1 is the application usecase diagram.<br>

![Use Case Diagram](https://github.com/Fazam16/web_kp_TelkomAkses/blob/main/supporting_images/usecase/d_useCase.png?raw=true "Usecase Diagram")
*Fig. 1 Use Case Diagram*

> [!TIP]
> Due to the plain background of the diagrams we created, such as use case, sequnce, and activity diagrams, we are unable to include all of them in this file. We are afraid you set the dark mode on your GitHub interface. You can download the relevant diagrams to further enhance your understanding of this application through the following [link](https://github.com/Fazam16/web_kp_TelkomAkses/tree/main/supporting_images)

### 8.1 Login Page
![Login Page](https://github.com/Fazam16/web_kp_TelkomAkses/blob/main/supporting_images/interface/halaman_login.png?raw=true "Login Page")
*Fig. 2 Login Page*

### 8.2 Dashboard Page
The dashboard page displays all incoming and outgoing NTE data entered by the user, the warehouse administrator. On this page, users can export data in `.txt` or `.xlsx` formats for performing stock opname on Supply Chain Management (SCM) Telkom application afterward, so there is no need to create `.txt` or `.xlsx` files from scratch. Additionally, users can delete data either entirely or one by one. Figure 3 shows the dashboard page.
![Dashboard Page](https://github.com/Fazam16/web_kp_TelkomAkses/blob/main/supporting_images/interface/halaman_dashboard.png?raw=true "Dashboard Page")
*Fig. 3 Dashboard Page*

### 8.3 Stock Opname Page
This page serves to input data regarding incoming and outgoing NTE materials. Users can also view input history for further cross-checking in case of errors. At the top section, users can search for the specific data to perform actions, either for editing or deleting.
![Stock Opname Page](https://github.com/Fazam16/web_kp_TelkomAkses/blob/main/supporting_images/interface/halaman_stockOpname.png?raw=true "Stock Opname Page")
*Fig. 4 Stock Opname Page*
