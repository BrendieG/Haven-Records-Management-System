<?php

class general_class {
	public function register_user($fname, $lname, $email, $role_id, $pass) {
        // Simulate user registration
        return [
            'first_name' => $fname,
            'last_name' => $lname,
            'email' => $email,
            'role_id' => $role_id,
            'password' => $pass
        ];
    }

    public function insert_child($fname, $mname, $lname, $gender, $dob, $date_of_admission, $hometown, $notes) {
        // Simulate child insertion
        return [
            'first_name' => $fname,
            'middle_name' => $mname,
            'last_name' => $lname,
            'gender' => $gender,
            'date_of_birth' => $dob,
            'admission_date' => $date_of_admission,
            'hometown' => $hometown,
            'notes' => $notes
        ];
    }

    public function insert_donation($fname, $lname, $email, $contact, $date, $amount, $items, $notes, $uploaded_by) {
        // Simulate donation insertion
        return [
            'first_name' => $fname,
            'last_name' => $lname,
            'email' => $email,
            'contact' => $contact,
            'donation_date' => $date,
            'donation_amount' => $amount,
            'donation_items' => $items,
            'donation_notes' => $notes,
            'uploaded_by' => $uploaded_by
        ];
    }

    public function insert_folder($folder_name, $folder_desc) {
        // Simulate folder insertion
        return [
            'folder_name' => $folder_name,
            'folder_description' => $folder_desc
        ];
    }

    public function insert_person_document($document_name, $person_id, $file_path, $uploaded_by) {
        // Simulate person document insertion
        return [
            'document_name' => $document_name,
            'person_id' => $person_id,
            'file_path' => $file_path,
            'uploaded_by' => $uploaded_by
        ];
    }

    public function insert_folder_document($document_name, $folder_id, $file_path, $uploaded_by) {
        // Simulate folder document insertion
        return [
            'document_name' => $document_name,
            'folder_id' => $folder_id,
            'file_path' => $file_path,
            'uploaded_by' => $uploaded_by
        ];
    }

    public function insert_event($event_name, $event_location, $event_date, $start_time, $end_time) {
        // Simulate event insertion
        return [
            'event_name' => $event_name,
            'event_location' => $event_location,
            'event_date' => $event_date,
            'start_time' => $start_time,
            'end_time' => $end_time
        ];
    }

    //--SELECT--//

    public function getRoleID($role_name) {
        // Simulate fetching role ID
        return 1; // Example ID
    }

    public function getRoleName($role_id) {
        // Simulate fetching role name
        return "Admin"; // Example role name
    }

    public function login_user($email, $pass) {
        // Simulate user login
        if ($email === "test@example.com" && $pass === "password") {
            return [
                'email' => $email,
                'password' => $pass
            ];
        }
        return false;
    }

    public function get_all_staff() {
        // Simulate fetching all staff
        return [
            ['staff_id' => 1, 'name' => 'John Doe'],
            ['staff_id' => 2, 'name' => 'Jane Smith']
        ];
    }

    public function getPersonInfoById($person_id) {
        // Simulate fetching person info by ID
        return [
            'person_id' => $person_id,
            'name' => 'John Doe'
        ];
    }
}
?>
