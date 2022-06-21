# PHP BASIC APPLICATION TO MANAGE AN EMPLOYEES LIST

## Application main points

1. Login and logout with a json file as user storage
2. Controlled user session set to 10 minutes
3. Show data from a JSON in a JS Grid
4. Pagination of the data configured by the grid
5. Employees CRUD Create Read Delete and Update with a json file as employees storage
6. Employee page with employee detail
7. External web service to get employees images
8. Employee avatar through web service images

### File structure

This file structure has a specific purpose. So you have to implement all the required over it. Later when we get to OPP and MySQL we will refactor the project to get it more sophisticated, modern and cleaner. Please take care of it!!

```
assets/
resources/
src/
 /library
```

- Assets contains html, css, js & images
- Css just css files.
- Resources folder contains users.json and employees.json
- Src folder contains PHP files which contain HTML or JS
- Src/library folder contains PHP files that contain just PHP

**We left to you the project files in their folders to give you a structure which we want you to work with in order to later refactor it.**

We use some naming conventions when create code files. For instance a file which handles HTTP request we name it as `Controller`.

In the other hand we have also the concept of `Manager` which typically implements an abstraction layer over a storage system, in this case as we are going to work with json files for a while (bear on mind later we refactor it to MySQL and then we will also have a `Model` file) we would need to create on it all functions we need to access the json file.

A file called `Model` implements a database layer is a file which interacts directly with a Database. **On future projects we will refactor this project to add Models and much more!!**

We also added the concept of `Helper` which is a class which its finality is to help `Controllers` and `Managers` to be lighter and to keep single responsibility.

```
index.php // which is the entry point of the application. The login view
employeeController.php // file which has JUST the php code to handle employees request
employeeManager.php // In this file we left you a list of named mehtods to implement and use.

loginController.php // here you need to handle all HTTP request of login things
loginManager.php // same thing here you need to write things as login validation logout etc..

sessionHelper.php // here you can add the code to check if the user session has expired.
```

The sessionHelper file need to be added to each page we visit in order to check if the user session has expired and if so to call the methods of the loginManager to logout the admin user.

### Including or importing code files to current file

As you have seen in JS there are sentences to import code from other files to the current file we are working. In PHP happens the same thing. And as we want to encapsulate code by concepts( the login page request are managed by a loginController and so on) it is required to import files.

So for instance a dashboard.php page can look like this at the beginning of the file:

```
 <?php
include "./library/sessionHelper.php";  // we added the code of the helper to check session

include "../assets/html/header.html"; // the header file that we also include it on every page
?>
<div id="alert" class="alert alert-danger w-25 mx-auto text-center" data-dismiss="alert" aria-label="Close" role="alert"></div>
<div id="employeesGrid" class="ml-5"></div>
<script>
..............
```

So when the server returns the processed file, PHP has changed all `include` sentences by the code that is on that files.
Let's make it clearer. Let's say that we have a sessionHelper which has this code.

```
session_start();
if(isset($_SESSION['userId'])) {
    if(time() - $_SESSION['time'] > $_SESSION['lifeTime']) {
        logout();
		....
  }
} else {
	.....
}
```

And we want to include it on every page user visits in order to check if his session is still valid. We just need to do this to include it for instance on `dashboard.php` file.

```
<?php include "./library/sessionHelper.php";?>

<div id="alert" class="alert alert-danger w-25 mx-auto text-center" data-dismiss="alert" aria-label="Close" role="alert"></div>
..............
```

So what we have done is to include literally that `if else` of the helper at the top of the `dashboard.php` file. We can do this with all files we need.

### Project key points

The user is stored in `resouces/users.json` file there you have an admin user work with it.

The employees are stored `resouces/employees.json` file you have to make a CRUD over this file

You should follow with coherence the project structure we give you and when you add files or functions make them self-descriptive. As you could see in the methodology we left on the project.

```
$data = getAllData($id); // get employee data
$employee = getEmployee($id);// just reading we know that gets employee by id, cool! and clean!
```

The functions you create have to be coherent, the naming is a serious affair. You can write in such a way that everything describes itself.

Same thing for variables, it is really important to give proper names.

```
$data = "John";
$name = 'John;// no words needed
```

And yeah! also same thing for every file you create give sense and coherence to it.

[About naming](https://dzone.com/articles/naming-conventions-from-uncle-bobs-clean-code-phil)

## External libraries

All them must be installed with the npm here you have a package.json take a look please.

- [Bootstrap](https://getbootstrap.com/)
- [Bootstrap icons](https://icons.getbootstrap.com/)
- [JSGrid](http://js-grid.com/)

## Images Web Service for the extra feature

As we explained in the pdf document of this project we will use [this images api](https://uifaces.co/)

This web service in the version free that is which we are going to use has limitations. Five request per minute or thirty in an hour.  
So if you want to develop this extra feature it would be cool to have a mocked response to develop at ease. So for this purpose we left in `resources/` folder a file called images_mock which can be used to the implementation of the extra feature once you have your code running well you need to remove this mock and to connect directly with the web service.

[Read the doc!](https://uifaces.co/api-docs)

## Curl

In php we interact with HTTP web services through cUrl or client URL.  
This is also a command in Unix systems. We are going to give you an over view in order to familiarise with it and then use it in the application for the extra feature.

To play a little with it, You can create a script in the root folder of your web server and with these request we have here to try make GET, POST. PUT and DELETE request against this super cool service which ables to developer to post and get data from what we call a request bin.  
[ReqBin ](https://reqbin.com/curl)

#### Basic knowledge

```
<?php
curl_init();      // initializes a session
curl_setopt();    // changes the session behavior setting options
curl_exec();      // executes the started session
curl_close();     // closes the session and deletes data made by curl_init();
```

#### Adding headers to request0

```
curl_setopt($curlHandler, CURLOPT_HTTPHEADER, array(
 'Header-Key: Header-Value', 'X-API-KEY: 5d17e5de89a3e35d3902c4d667534'));
```

#### Getting error messages from cUrl

```
$curlHandler = curl_init('https://hostname.com/resource/');
curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);

if(curl_exec($curlHandler) === false)
{
 echo 'Curl error: ' . curl_error($curlHandler); //gets last cUrl error as a string
}
```

#### Get Request

```
<?php

$curlHandler = curl_init();

curl_setopt($curlHandler, CURLOPT_URL, 'https://hostname.com/resource');
curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);

$apiResponse = curl_exec($curlHandler);
curl_close($curlHandler);

$decodedResponse = json_decode($apiResponse);

```

#### Post Request

```
<?php

$postData = [
 'parameter1' => 'foo', 'parameter2' => 'bar'];

$curlHandler = curl_init('http://hostname.com/api/resource');
curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $postData);
curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);// saying cUrl to return the response in the cUrl exec call

$apiResponse = curl_exec($curlHandler);
curl_close($curlHandler);

$decodedResponse = json_decode($apiResponse);

```

#### Post Request

```
<?php

$postData = [
 'parameter1' => 'foo', 'parameter2' => 'bar'];

$curlHandler = curl_init('http://hostname.com/api/resource');
curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $postData);
curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);// saying cUrl to return the response in the cUrl exec call

$apiResponse = curl_exec($curlHandler);
curl_close($curlHandler);

$decodedResponse = json_decode($apiResponse);

```

#### Delete Request

```
$curlHandler = curl_init('http://hostname.com/api/resource');
curl_setopt($curlHandler, CURLOPT_CUSTOMREQUEST, 'DELETE');// Setting HTTP verb that will by used for the request

$apiResponse = curl_exec($curlHandler);
$httpCode = curl_getinfo($curlHandler, CURLINFO_HTTP_CODE);// Getting http response code
curl_close($curlHandler);

$decodedResponse = json_decode($apiResponse);
```

#### All together

```
$postData = [
 'parameter1' => 'foo', 'parameter2' => 'bar'];

$curlHandler = curl_init('http://hostname.com/api/resource');
curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $postData);
curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);// saying cUrl to return the response in the cUrl exec call

$apiResponse = curl_exec($curlHandler);
if (curl_errno($curlHandler)) {
 $errorMessage = curl_error($curlHandler);
 //throw error}
curl_close($curlHandler);

$decodedResponse = json_decode($apiResponse);
```
