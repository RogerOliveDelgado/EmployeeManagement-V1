<?php

function addEmployee(array $newEmployee, string $db): void {
    $data = json_decode(file_get_contents($db), true);
    $newEmployee['id'] = array_key_last($data) + 1;
    $data[$newEmployee['id']] = $newEmployee;
    file_put_contents($db, json_encode($data));
}

function deleteEmployee(string $id, string $db): void {
    $data = json_decode(file_get_contents($db), true);
    unset($data[$id]);
    file_put_contents($db, json_encode($data));
}

function updateEmployee(array $updateEmployee, string $db): void{
    $data = json_decode(file_get_contents($db), true);
    $data[$updateEmployee['id']] = $updateEmployee;
    file_put_contents($db, json_encode($data));
}

function getEmployee(string $id, string $db): array|string {
    $data = json_decode(file_get_contents($db), true);
    return $data[$id];
}

function getAllEmployees(string $db): array {
    return json_decode(file_get_contents(($db)), true);
}

function removeAvatar(string $id, string $db): void{
    $data = json_decode(file_get_contents($db), true);
    $data[$id]['avatar'] = "";
    file_put_contents($db, json_encode($data));
}

function getQueryStringParameters(): array {
    return array(
            "id" => null,
            "name" => null,
            "lastName" => null,
            "email" => null,
            "gender" => null,
            "age" => null,
            "streetAddress" => null,
            "city" => null,
            "state" => null,
            "postalCode" => null,
            "phoneNumber" => null
    );
}

function generateSelect($name = '', $options = array(), $default=''): string{
    $html= '<select name="'.$name.'" class="form-control">';
    foreach ($options as $option =>$value) {
        if($value == $default){
            $html .= '<option value="'.$value.'" selected ="selected">'.$value.'</option>';
        } else {
            $html .= '<option value="'.$value.'">'.$value.'</option>';
        }
    }
    $html .= '</select>';
    return $html;
}