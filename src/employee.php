<!-- TODO Employee view -->
<?php
require('./library/employeeManager.php');
require_once('./library/avatarsApi.php');

if (isset($_GET['id'])) {
    $employee = getEmployee($_GET['id'], './../resources/employees.json');
    $select = generateSelect('gender', array('', 'male', 'female'), $employee['gender']);
    $avatar = $employee['avatar'];
} else {
    $select = generateSelect('inputGender', array('', 'male', 'female'), '');
}
if (isset($_GET['avatar'])){
    if (isset($_GET['id'])) {
        $avatar = getImageFromAPI($employee['gender']);
    } else {
        $avatar = getImageFromAPI('');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="module" src="./../assets/js/index.js"></script>
    <link rel="stylesheet" href="./../assets/css/main.css">
    <title>Employee</title>
</head>

<body>
    <?php require('./../assets/html/header.php') ?>
    <main class= "main__container">
        <section class="employee-container">
            <article class="avatar__container">
                <a href="./employee.php?avatar=get<?php isset($_GET['id']) ? print ("&id={$_GET['id']}") : '';?>">
                    <img class="avatar__image" src="<?php isset($avatar) ? print($avatar) :
                                print("https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/versions/generation-v/black-white/animated/383.gif"); ?>" alt="avatarImage">
                </a>
            </article>
            <form class="employee-form" action="./library/employeeController.php" method="POST">
                <input hidden type="number" name="id" value="<?php isset($_GET['id']) ? print($employee['id']) : ""; ?>">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputName">Name</label>
                        <input required type="text" class="form-control" id="inputName" placeholder="Name" name="name" value="<?php isset($_GET['id']) ? print($employee['name']) : ""; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputLastname">Lastname</label>
                        <input required type="text" class="form-control" id="inputLastname" placeholder="Lastname" name="lastName" value="<?php isset($_GET['id']) ? print($employee['lastName']) : ""; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail">Email </label>
                        <input required type="text" class="form-control" id="inputEmail" placeholder="email@email.com" name="email" value="<?php isset($_GET['id']) ? print($employee['email']) : ""; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputGender">Gender</label>
                        <?php print($select); ?>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input required type="text" class="form-control" id="inputCity" placeholder="City" name="city" value="<?php isset($_GET['id']) ? print($employee['city']) : ""; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAddress">Street Address</label>
                        <input required type="text" class="form-control" id="inputAddress" placeholder="Street Address" name="streetAddress" value="<?php isset($_GET['id']) ? print($employee['streetAddress']) : ""; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputState">State</label>
                        <input required type="text" class="form-control" id="inputState" placeholder="State" name="state" value="<?php isset($_GET['id']) ? print($employee['state']) : ""; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputAge">Age</label>
                        <input required type="number" class="form-control" id="inputAge" placeholder="Age" name="age" value="<?php isset($_GET['id']) ? print($employee['age']) : ""; ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPostal">Postal code</label>
                        <input required type="number" class="form-control" id="inputPostal" placeholder="Postal code" name="postalCode" value="<?php isset($_GET['id']) ? print($employee['postalCode']) : ""; ?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPhone">Phone number</label>
                        <input required type="number" class="form-control" id="inputPhone" placeholder="Phone number" name="phoneNumber" value="<?php isset($_GET['id']) ? print($employee['phoneNumber']) : ""; ?>">
                    </div>
                </div>
                <input hidden type="text" name="avatar" value="<?php isset($avatar) ? print($avatar) : ""; ?>">
                <div class="form-row">
                    <button type="submit" class="btn btn-primary form-submit">Submit</button>
                    <button class="btn btn-danger form-submit"><a style="text-decoration: none; color: white;" href="./dashboard.php">Cancel</a></button>
                </div>
            </form>
        </section>
    </main>

</body>

</html>