<?php
//connect to database class
require("../settings/db_class.php");

/**
*General class to handle all functions 
*/
/**
 *@author David Sampah
 *
 */


class general_class extends db_connection
{
	//--INSERT--//

	public function register_user($fname, $lname, $email, $role_id, $pass) {
		$db = new db_connection();
		$fname = mysqli_real_escape_string($db->db_conn(), $fname);
		$lname = mysqli_real_escape_string($db->db_conn(), $lname);
		$email = mysqli_real_escape_string($db->db_conn(), $email);
		$role_id = mysqli_real_escape_string($db->db_conn(), $role_id);
		$pass = mysqli_real_escape_string($db->db_conn(), $pass);
		// Insert into person table
		$sql = "INSERT INTO person (first_name, last_name) VALUES ('$fname', '$lname')";
		$result = $db->db_query($sql);
		
		if ($result) {
			// Get the last inserted person_id
			$person_id = $db->getConnection()->insert_id;
			
			// Insert into staff table
			$sql2 = "INSERT INTO staff (person_id, role_id, staff_password, email) VALUES ('$person_id', '$role_id', '$pass', '$email')";
			$result2 = $db->db_query($sql2);
			
			if ($result2) {
				return true;
			} else {
				// Handle error
				return false;
			}
		} else {
			// Handle error
			return false;
		}
	}


	public function insert_child($fname,$mname, $lname, $gender, $dob, $date_of_admission, $hometown, $notes) {
		$db = new db_connection();
		$fname = mysqli_real_escape_string($db->db_conn(), $fname);
		$mname = mysqli_real_escape_string($db->db_conn(), $mname);
		$lname = mysqli_real_escape_string($db->db_conn(), $lname);
		$gender = mysqli_real_escape_string($db->db_conn(), $gender);
		$dob = mysqli_real_escape_string($db->db_conn(), $dob);
		$date_of_admission = mysqli_real_escape_string($db->db_conn(), $date_of_admission);
		$hometown = mysqli_real_escape_string($db->db_conn(), $hometown);
		$notes = mysqli_real_escape_string($db->db_conn(), $notes);
	
		// Insert into person table
		$sql = "INSERT INTO person (first_name, middle_name, last_name, gender, date_of_birth) VALUES ('$fname', '$mname', '$lname', '$gender', '$dob')";
		$result = $db->db_query($sql);
		
		if ($result) {
			// Get the last inserted person_id
			$person_id = $db->getConnection()->insert_id;
			
			// Insert into staff table
			$sql2 = "INSERT INTO child (person_id, admission_date, hometown, notes) VALUES ('$person_id', '$date_of_admission', '$hometown', '$notes')";
			$result2 = $db->db_query($sql2);
			
			if ($result2) {
				return true;
			} else {
				// Handle error
				return false;
			}
		} else {
			// Handle error
			return false;
		}
	}


	public function insert_donation($fname, $lname, $email, $contact, $date, $amount, $items, $notes, $uploaded_by) {
		$db = new db_connection();
		$fname = mysqli_real_escape_string($db->db_conn(), $fname);
		$lname = mysqli_real_escape_string($db->db_conn(), $lname);
		$contact = mysqli_real_escape_string($db->db_conn(), $contact);

		$email = mysqli_real_escape_string($db->db_conn(), $email);
		$date = mysqli_real_escape_string($db->db_conn(), $date);
		$amount = mysqli_real_escape_string($db->db_conn(), $amount);
		$items = mysqli_real_escape_string($db->db_conn(), $items);
		$notes = mysqli_real_escape_string($db->db_conn(), $notes);
		$uploaded_by = mysqli_real_escape_string($db->db_conn(), $uploaded_by);
	
		// Insert into person table
		$sql = "INSERT INTO person (first_name, last_name, contact) VALUES ('$fname','$lname','$contact')";
		$result = $db->db_query($sql);
		
		if ($result) {
			// Get the last inserted person_id
			$person_id = $db->getConnection()->insert_id;
			
			// Insert into staff table
			$sql2 = "INSERT INTO donation (person_id, donation_amount, donation_items, donation_date, donation_notes, uploaded_by, donor_email ) VALUES ('$person_id',  '$amount', '$items', '$date', '$notes', '$uploaded_by', '$email' )";
			$result2 = $db->db_query($sql2);
			
			if ($result2) {
				return true;
			} else {
				// Handle error
				return false;
			}
		} else {
			// Handle error
			return false;
		}
	}

	public function insert_folder($folder_name, $folder_desc){
		$db = new db_connection();
		$folder_name = mysqli_real_escape_string($db->db_conn(), $folder_name);
		$folder_desc = mysqli_real_escape_string($db->db_conn(), $folder_desc);
		$sql = "INSERT into folder (folder_name, folder_description) values ('$folder_name', '$folder_desc')";
		return $this -> db_query($sql);
	}

	public function insert_person_document($document_name, $person_id, $file_path, $uploaded_by){
		$db = new db_connection();
		$document_name = mysqli_real_escape_string($db->db_conn(), $document_name);
		$person_id = mysqli_real_escape_string($db->db_conn(), $person_id);
		$file_path = mysqli_real_escape_string($db->db_conn(), $file_path);
		$uploaded_by = mysqli_real_escape_string($db->db_conn(), $uploaded_by);
		$sql = "INSERT into document (document_name,person_id,file_path, uploaded_by) values ('$document_name', '$person_id', '$file_path', '$uploaded_by')";
		return $this -> db_query($sql);
	}


	
	public function insert_folder_document($document_name, $folder_id, $file_path, $uploaded_by){
		$db = new db_connection();
		$document_name = mysqli_real_escape_string($db->db_conn(), $document_name);
		$folder_id = mysqli_real_escape_string($db->db_conn(), $folder_id);
		$file_path = mysqli_real_escape_string($db->db_conn(), $file_path);
		$uploaded_by = mysqli_real_escape_string($db->db_conn(), $uploaded_by);
		$sql = "INSERT into document (document_name,folder_id,file_path, uploaded_by) values ('$document_name', '$folder_id', '$file_path', '$uploaded_by')";
		return $this -> db_query($sql);
	}

	public function insert_event($event_name, $event_location, $event_date, $start_time, $end_time){
		$db = new db_connection();
		$event_name = mysqli_real_escape_string($db->db_conn(), $event_name);
		$event_location = mysqli_real_escape_string($db->db_conn(), $event_location);
		$event_date = mysqli_real_escape_string($db->db_conn(), $event_date);
		$start_time = mysqli_real_escape_string($db->db_conn(), $start_time);
		$end_time = mysqli_real_escape_string($db->db_conn(), $end_time);
		$sql = "INSERT into upcoming_event (event_name,event_location,event_date, start_time,end_time) values ('$event_name', '$event_location', '$event_date', '$start_time', '$end_time')";
		return $this -> db_query($sql);
	}


	

	//--SELECT--//
	public function getRoleID($role_name) {
        $db = new db_connection();
        $role_name = mysqli_real_escape_string($db->db_conn(), $role_name);
        $sql = "SELECT role_id FROM access_role WHERE role_name = '$role_name'";
        $result = $this->db_fetch_one($sql);
        return $result ? $result['role_id'] : null;
    }

	public function getRoleName($role_id) {
        $db = new db_connection();
        $role_id = mysqli_real_escape_string($db->db_conn(), $role_id);
        $sql = "SELECT role_name FROM access_role WHERE role_id = '$role_id'";
        $result = $this->db_fetch_one($sql);
        return $result ? $result['role_name'] : null;
    }

	public function login_user($email, $pass){
        $db = new db_connection();
		$email = mysqli_real_escape_string($db->db_conn(), $email);
        $sql = "SELECT * FROM staff WHERE email = '$email'";
        $user = $this->db_fetch_one($sql);

        if (!$user) {
            return false; 
        }

        if (password_verify($pass, $user['staff_password'])) {
            return $user; 
        } else {
            return false; 
        }
    }

	public function get_all_staff() {
        $sql = "SELECT * FROM staff";
        return $this->db_fetch_all($sql);
    }

	public function getPersonInfoById($person_id) {
		$db = new db_connection();
		$person_id = mysqli_real_escape_string($db->db_conn(), $person_id);  
		$sql = "SELECT * FROM person WHERE person_id = '$person_id'";
		$result = $this->db_fetch_one($sql);
		return $result ? $result : null; 
	}
	public function getPersonInfoByStaffId($staffID) {
		$db = new db_connection();
		$staffID = mysqli_real_escape_string($db->db_conn(), $staffID);  
		$sql1 = "SELECT person_id FROM staff WHERE staff_id = '$staffID'";
		$result1 = $this->db_fetch_one($sql1);

		if (!$result1) {
            return false; 
        }else {
			$person_id = $result1['person_id'];
            $sql2 = "SELECT * FROM person WHERE person_id = '$person_id'";
			$result2 = $this->db_fetch_one($sql2);
			return $result2 ? $result2 : null; 
        }

		
	}

	public function getChildInfoById($person_id) {
		$db = new db_connection();
		$person_id = mysqli_real_escape_string($db->db_conn(), $person_id);  
		$sql = "SELECT * FROM child WHERE person_id = '$person_id'";
		$result = $this->db_fetch_one($sql);
		return $result ? $result : null; 
	}

	public function getStaffInfoById($person_id) {
		$db = new db_connection();
		$person_id = mysqli_real_escape_string($db->db_conn(), $person_id);  
		$sql = "SELECT * FROM staff WHERE person_id = '$person_id'";
		$result = $this->db_fetch_one($sql);
		return $result ? $result : null; 
	}

	public function getDocumentsById($person_id) {
		$db = new db_connection();
		$person_id = mysqli_real_escape_string($db->db_conn(), $person_id);  
		$sql = "SELECT * FROM document WHERE person_id = '$person_id'";
		$result = $this->db_fetch_all($sql);
		return $result ? $result : null; 
	}

	public function getRelativesByChildId($child_id) {
		$db = new db_connection();
		$child_id = mysqli_real_escape_string($db->db_conn(), $child_id);
	
		$sql = "SELECT p.first_name, p.last_name, p.middle_name, p.contact, fm.residential_address, r.relationship_name
				FROM family_member_child fmc
				JOIN family_member fm ON fmc.family_member_id = fm.family_member_id
				JOIN person p ON fm.person_id = p.person_id
				JOIN relationship r ON fmc.relationship_id = r.relationship_id
				WHERE fmc.child_id = '$child_id'";
	
		$result = $this->db_fetch_all($sql);
		return $result ? $result : null;
	}
	
	public function get_all_folders() {
        $sql = "SELECT * FROM folder";
        return $this->db_fetch_all($sql);
    }

	public function get_all_donations() {
        $sql = "SELECT * FROM donation ORDER BY donation_date DESC";
        return $this->db_fetch_all($sql);
    }

	public function get_all_children() {
        $sql = "SELECT * FROM child";
        return $this->db_fetch_all($sql);
    }
	
	public function get_folder_documents($folder_id) {
		$db = new db_connection();
		$folder_id = mysqli_real_escape_string($db->db_conn(), $folder_id);  
        $sql = "SELECT * FROM document WHERE folder_id ='$folder_id' ";
        $result = $this->db_fetch_all($sql);
		return $result ? $result : null; 
    }

	public function get_document_by_id($document_id) {
		$db = new db_connection();
		$document_id = mysqli_real_escape_string($db->db_conn(), $document_id);  
        $sql = "SELECT * FROM document WHERE document_id ='$document_id' ";
        $result = $this->db_fetch_one($sql);
		return $result ? $result : null; 
    }

	public function get_all_events() {
        $sql = "SELECT * FROM upcoming_event ORDER BY event_date ASC";
        return $this->db_fetch_all($sql);
    }

	public function get_staff_count() {
		$sql = "SELECT * FROM staff";
		$results = $this->db_fetch_all($sql);
		return $this->db_count();
	}

	public function get_children_count() {
		$sql = "SELECT * FROM child";
		$results = $this->db_fetch_all($sql);
		return $this->db_count();
	}
	public function get_donations_count() {
		$sql = "SELECT * FROM donation";
		$results = $this->db_fetch_all($sql);
		return $this->db_count();
	}
	public function get_documents_count() {
		$sql = "SELECT * FROM document WHERE person_id IS NULL";
		$results = $this->db_fetch_all($sql);
		return $this->db_count();
	}
	
    public function check_folder_empty($folder_id) {
		$db = new db_connection();
		$folder_id = mysqli_real_escape_string($db->db_conn(), $folder_id);  
		
		$sql = "SELECT COUNT(*) as count FROM document WHERE folder_id = '$folder_id'";
		$result = $this->db_fetch_one($sql);
		
		if ($result && $result['count'] > 0) {
			return false; 
		}
		
		return true; 
	}
	




	//--UPDATE--//

	public function update_child($person_id, $fname,$mname, $lname, $gender, $dob, $date_of_admission, $hometown, $notes){
		$db = new db_connection();
		$person_id = mysqli_real_escape_string($db->db_conn(), $person_id);
		$fname = mysqli_real_escape_string($db->db_conn(), $fname);
		$mname = mysqli_real_escape_string($db->db_conn(), $mname);
		$lname = mysqli_real_escape_string($db->db_conn(), $lname);
		$gender = mysqli_real_escape_string($db->db_conn(), $gender);
		$dob = mysqli_real_escape_string($db->db_conn(), $dob);
		$date_of_admission = mysqli_real_escape_string($db->db_conn(), $date_of_admission);
		$hometown = mysqli_real_escape_string($db->db_conn(), $hometown);
		$notes = mysqli_real_escape_string($db->db_conn(), $notes);
	
		$sql = "UPDATE person SET 
				first_name = '$fname', 
				middle_name = '$mname', 
				last_name = '$lname', 
				gender = '$gender', 
				date_of_birth = '$dob'
				WHERE person_id = '$person_id'";

		$result = $db->db_query($sql);
		
		if ($result) {

			$sql2 = "UPDATE child SET 
				admission_date = '$date_of_admission', 
				hometown = '$hometown', 
				notes = '$notes'
				WHERE person_id = '$person_id'";

			$result2 = $db->db_query($sql2);
			
			if ($result2) {
				return true;
			} else {
				// Handle error
				return false;
			}
		} else {
			// Handle error
			return false;
		}
		
	}

	public function update_staff($person_id, $fname,$mname, $lname, $gender, $dob, $date_of_employment, $email, $role_id, $primary_contact, $secondary_contact, $address){
		$db = new db_connection();
		$person_id = mysqli_real_escape_string($db->db_conn(), $person_id);
		$fname = mysqli_real_escape_string($db->db_conn(), $fname);
		$mname = mysqli_real_escape_string($db->db_conn(), $mname);
		$lname = mysqli_real_escape_string($db->db_conn(), $lname);
		$gender = mysqli_real_escape_string($db->db_conn(), $gender);
		$dob = mysqli_real_escape_string($db->db_conn(), $dob);
		$date_of_employment = mysqli_real_escape_string($db->db_conn(), $date_of_employment);
		$role_id = mysqli_real_escape_string($db->db_conn(), $role_id);
		$email = mysqli_real_escape_string($db->db_conn(), $email);
		$primary_contact = mysqli_real_escape_string($db->db_conn(), $primary_contact);
		$secondary_contact = mysqli_real_escape_string($db->db_conn(), $secondary_contact);
		$address = mysqli_real_escape_string($db->db_conn(), $address);
	
		$sql = "UPDATE person SET 
				first_name = '$fname', 
				middle_name = '$mname', 
				last_name = '$lname', 
				gender = '$gender', 
				date_of_birth = '$dob',
				contact = '$primary_contact'
				WHERE person_id = '$person_id'";

		$result = $db->db_query($sql);
		
		if ($result) {

			$sql2 = "UPDATE staff SET 
				employment_start = '$date_of_employment', 
				email = '$email', 
				residential_address = '$address',
				role_id = '$role_id', 
				secondary_contact = '$secondary_contact'
				WHERE person_id = '$person_id'";

			$result2 = $db->db_query($sql2);
			
			if ($result2) {
				return true;
			} else {
				// Handle error
				return false;
			}
		} else {
			// Handle error
			return false;
		}
		
	}

	public function update_event($event_id, $event_name, $event_location, $event_date, $start_time, $end_time){
		$db = new db_connection();
		$event_id = mysqli_real_escape_string($db->db_conn(), $event_id);
		$event_name = mysqli_real_escape_string($db->db_conn(), $event_name);
		$event_location = mysqli_real_escape_string($db->db_conn(), $event_location);
		$event_date = mysqli_real_escape_string($db->db_conn(), $event_date);
		$start_time = mysqli_real_escape_string($db->db_conn(), $start_time);
		$end_time = mysqli_real_escape_string($db->db_conn(), $end_time);
	
		$sql = "UPDATE upcoming_event SET 
				event_name = '$event_name', 
				event_location = '$event_location', 
				event_date = '$event_date', 
				start_time = '$start_time', 
				end_time = '$end_time'
				WHERE event_id = '$event_id'";

		return $this -> db_query($sql);
	}


	public function update_document($document_id, $document_name, $file_path){
		$db = new db_connection();
		$document_id = mysqli_real_escape_string($db->db_conn(), $document_id);
		$document_name = mysqli_real_escape_string($db->db_conn(), $document_name);
		$file_path = mysqli_real_escape_string($db->db_conn(), $file_path);
		
	
		$sql = "UPDATE document SET 
				document_name = '$document_name', 
				file_path = '$file_path'
				WHERE document_id = '$document_id'";

		return $this -> db_query($sql);
		
	}

	public function update_folder($folder_id, $folder_name, $folder_desc){
		$db = new db_connection();
		$folder_id = mysqli_real_escape_string($db->db_conn(), $folder_id);
		$folder_name = mysqli_real_escape_string($db->db_conn(), $folder_name);
		$folder_desc = mysqli_real_escape_string($db->db_conn(), $folder_desc);
		
	
		$sql = "UPDATE folder SET 
				folder_name = '$folder_name', 
				folder_description = '$folder_desc'
				WHERE folder_id = '$folder_id'";

		return $this -> db_query($sql);
		
	}

	//--DELETE--//
	public function delete_document($document_id) {
        $db = new db_connection();
		$document_id = mysqli_real_escape_string($db->db_conn(), $document_id);
        $sql = "DELETE FROM document WHERE document_id = '$document_id'";
        return $this->db_query($sql);
    }

	public function delete_folder($folder_id) {
        $db = new db_connection();
		$folder_id = mysqli_real_escape_string($db->db_conn(), $folder_id);
        $sql = "DELETE FROM folder WHERE folder_id = '$folder_id'";
        return $this->db_query($sql);
    }
	
	public function delete_event($event_id) {
        $db = new db_connection();
		$event_id = mysqli_real_escape_string($db->db_conn(), $event_id);
        $sql = "DELETE FROM upcoming_event WHERE event_id = '$event_id'";
        return $this->db_query($sql);
    }

}

?>