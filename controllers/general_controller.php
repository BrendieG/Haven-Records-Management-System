<?php
//connect to the user account class
include("../classes/general_class.php");

//sanitize data




//--INSERT--//
function register_user_ctr($fname, $lname, $email, $encrypted_pass, $role_id){
    $generalClass = new general_class();
    return $generalClass -> register_user($fname, $lname, $email, $role_id, $encrypted_pass);
}

function insert_child_ctr($fname,$mname, $lname, $gender, $dob, $date_of_admission, $hometown, $notes){
    $insert_child = new general_class();
    return $insert_child -> insert_child($fname,$mname, $lname, $gender, $dob, $date_of_admission, $hometown, $notes);
}

function insert_donation_ctr($fname, $lname, $email, $contact, $date, $amount, $items, $notes, $uploaded_by){
    $insert_donation = new general_class();
    return $insert_donation -> insert_donation($fname, $lname, $email, $contact, $date, $amount, $items, $notes, $uploaded_by);
}

function insert_person_document_ctr($document_name, $person_id, $file_path, $uploaded_by){
    $insert_document = new general_class();
    return $insert_document -> insert_person_document($document_name, $person_id, $file_path, $uploaded_by);
}

function insert_folder_document_ctr($document_name, $folder_id, $file_path, $uploaded_by){
    $insert_document = new general_class();
    return $insert_document -> insert_folder_document($document_name, $folder_id, $file_path, $uploaded_by);
}
function insert_folder_ctr($folder_name, $folder_desc){
    $insert_folder = new general_class();
    return $insert_folder -> insert_folder($folder_name, $folder_desc);
}
function insert_event_ctr($event_name, $event_location, $event_date, $start_time, $end_time){
    $insert_event = new general_class();
    return $insert_event -> insert_event($event_name, $event_location, $event_date, $start_time, $end_time);
}

//--SELECT--//
function getRoleById_ctr($role_name){
    $get_roleid = new general_class();
    return $get_roleid->getRoleID($role_name);
}

function getRoleName_ctr($role_id){
    $get_rolename = new general_class();
    return $get_rolename->getRoleName($role_id);
}

function login_check($email, $pass) {
    $login_check = new general_class();
    return $login_check->login_user($email, $pass);
}

function get_all_staff_ctr() {
    $get_staff = new general_class();
    return $get_staff->get_all_staff();
}

function get_all_children_ctr() {
    $get_children = new general_class();
    return $get_children->get_all_children();
}

function get_all_folders_ctr() {
    $get_folders = new general_class();
    return $get_folders->get_all_folders();
}
function get_folder_documents_ctr($folder_id) {
    $get_folder_documents = new general_class();
    return $get_folder_documents->get_folder_documents($folder_id);
}

function get_all_donations_ctr() {
    $get_donations = new general_class();
    return $get_donations->get_all_donations();
}

function get_all_events_ctr() {
    $get_events = new general_class();
    return $get_events->get_all_events();
}


function getPersonInfoById_ctr($personID) {
    $get_person = new general_class();
    return $get_person->getPersonInfoById($personID);
}

function getChildInfoById_ctr($personID) {
    $get_child = new general_class();
    return $get_child->getChildInfoById($personID);
}

function getStaffInfoById_ctr($personID) {
    $get_staff = new general_class();
    return $get_staff->getStaffInfoById($personID);
}

function getRelativesByChildId_ctr($child_id) {
    $get_relatives = new general_class();
    return $get_relatives->getRelativesByChildId($child_id);
}

function getPersonInfoByStaffId_ctr($staffID) {
    $get_person_id = new general_class();
    return $get_person_id->getPersonInfoByStaffId($staffID);
}

function getDocumentsById_ctr($personID) {
    $get_person_documents = new general_class();
    return $get_person_documents->getDocumentsById($personID);
}

function get_staff_count_ctr() {
    $staff_count = new general_class();
    return $staff_count->get_staff_count();
}

function get_children_count_ctr() {
    $children_count = new general_class();
    return $children_count->get_children_count();
}
function get_donations_count_ctr() {
    $donations_count = new general_class();
    return $donations_count->get_donations_count();
}
function get_documents_count_ctr() {
    $documents_count = new general_class();
    return $documents_count->get_documents_count();
}
function get_document_by_id_ctr($document_id) {
    $document = new general_class();
    return $document->get_document_by_id($document_id);
}


//--UPDATE--//
function update_child_ctr($person_id, $fname,$mname, $lname, $gender, $dob, $date_of_admission, $hometown, $notes){
    $update_child = new general_class();
    return $update_child -> update_child($person_id, $fname,$mname, $lname, $gender, $dob, $date_of_admission, $hometown, $notes);
}

function update_staff_ctr($person_id, $fname,$mname, $lname, $gender, $dob, $date_of_employment, $email, $role_id, $primary_contact, $secondary_contact, $address){
    $update_staff = new general_class();
    return $update_staff -> update_staff($person_id, $fname,$mname, $lname, $gender, $dob, $date_of_employment, $email, $role_id, $primary_contact, $secondary_contact, $address);
}

function update_event_ctr($event_id, $event_name, $event_location, $event_date, $start_time, $end_time){
    $update_event = new general_class();
    return $update_event -> update_event($event_id, $event_name, $event_location, $event_date, $start_time, $end_time);
}

function update_document_ctr($document_id, $document_name, $file_path){
    $update_document = new general_class();
    return $update_document -> update_document($document_id, $document_name, $file_path);
}

function update_folder_ctr($folder_id, $folder_name, $folder_desc){
    $update_folder = new general_class();
    return $update_folder -> update_folder($folder_id, $folder_name, $folder_desc);
}

//--DELETE--//

?>