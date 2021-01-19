<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('insurance_availability') ) {
	function insurance_availability() {
		return array('True' => 'Yes', 'False' => 'No');
    }
}

if ( ! function_exists('include_insurance') ) {
	function include_insurance($temp) {
		$arr = array('True' => 'Yes', 'False' => 'No');
		return $arr[$temp];
    }
}

if ( ! function_exists('price_included') ) {
	function price_included() {
		return array('True' => 'Yes', 'False' => 'No');
    }
}

if ( ! function_exists('price_or_percentage') ) {
	function price_or_percentage() {
		return array('True' => 'Price', 'False' => 'Percentage');
    }
}

if ( ! function_exists('with_driver') ) {
	function with_driver() {
		return array('Yes', 'No');
    }
}

if ( ! function_exists('duration') ) {
	function duration() {
		return array('3', '6', '12', '24');
    }
}

if ( ! function_exists('type_service_area') ) {
	function type_service_area() {
		return array('Area', 'Radius');
    }
}

if ( ! function_exists('status_transaction_history') ) {
	function status_transaction_history() {
		return array('Pending', 'Accepted', 'OnGoing', 'Completed', 'Canceled');
    }
}

if ( ! function_exists('status_new_booking') ) {
	function status_new_booking() {
		return array('Accepted', 'Canceled');
    }
}

if ( ! function_exists('delivery_method') ) {
	function delivery_method() {
		return array('Deliver', 'Pickup', 'Both');
    }
}

if ( ! function_exists('discount_type') ) {
	function discount_type() {
		return array('Day', 'Week', 'Month', 'Year');
    }
}

// display raw data
if ( ! function_exists('pre') ) {
	function pre( $array = array() ) {
        echo '<pre>';
        	print_r($array);
        echo '<pre>';
        exit;
    }
}

if ( ! function_exists('unexit_pre') ) {
	function unexit_pre( $variable ) {
		echo '<pre>';
		echo print_r( $variable );
		echo '</pre>';
	}
}

if ( ! function_exists('check_login') ) {
	function check_login(){
		$ci =& get_instance();
		
		$session = $ci->session->userdata('id');
		if ( !$session ) {
			redirect('rcmadmin/auth');
		} else {
			if ( $ci->uri->segment(2) == 'auth' ) {
				redirect('rcmadmin/home');
			}
		}
	}
}

if ( ! function_exists('get_kec_or_desa') ) {
	function get_kec_or_desa($key, $id){
		$ci =& get_instance();
		
		$query = array();
		if ($key == "kecamatan") {
			$ci->db->where('id', $id);
			$query = $ci->db->get('kecamatan')->row_array();
		} elseif ($key == "desa") {
			$ci->db->where('id', $id);
			$query = $ci->db->get('desa')->row_array();
		}
	
		return $query;
	}
}

if ( ! function_exists('check_role') ) {
	function check_role(){
		$ci =& get_instance();

		$kecamatan = array('home', 'tps', 'cakades', 'user', 'tungsura');
		$desa 	   = array('home', 'tps', 'cakades', 'tungsura');
		
		$role = $ci->session->userdata('role');
		if ( $role == 2 ) {
			if ( !array_search($ci->uri->segment(2), $kecamatan) ) {
				redirect('rcmadmin/home');
			}
		} elseif ( $role == 3 ) {
			if ( !array_search($ci->uri->segment(2), $desa) ) {
				redirect('rcmadmin/home');
			}
		}
	}
}

// if ( ! function_exists('check_permission') ) {
// 	function check_permission( $role = "*" ){

// 		$ci =& get_instance();
		
// 		if ($role == "*") {
// 			return true;
// 		} else {
// 			$access = is_array($role) ? $role : explode(",", $role);
// 			if (in_array(session()['id_partner_role'], array_map("trim", $access)) ) {
// 				return true;
// 			} else {
// 				redirect('rmcadmin/home');
// 			}
// 		}
// 	}
// }

// if ( ! function_exists('check_permission_user') ) {
// 	function check_permission_user( $role = "*" ){

// 		$ci =& get_instance();
		
// 		if ($role == "*") {
// 			return true;
// 		} else {
// 			$access = is_array($role) ? $role : explode(",", $role);
// 			if (in_array(session()['id_partner_role'], array_map("trim", $access)) ) {
// 				return true;
// 			} else {
// 				return false;
// 			}
// 		}
// 	}
// }

// if ( ! function_exists('my_wallet') ) {
// 	function my_wallet(){

// 		$ci =& get_instance();

// 		return $ci->api->view('partner/dashboard', '', 'true');
// 	}
// }

// if ( ! function_exists('rating') ) {
// 	function rating( $id_transaction_detail ){

// 		$ci =& get_instance();

// 		return $ci->api->view('data/rating', $id_transaction_detail . '/', 'true');
// 	}
// }

if ( ! function_exists('encrypt') ) {
	function encrypt( $string, $action = 'e' ) {

	    // you may change these values to your own
	    $secret_key = md5('rentist');
	    $secret_iv  = md5('rentist spesialist indonesia');
	 
	    $output         = false;
	    $encrypt_method = "AES-256-CBC";
	    $key            = hash( 'sha256', $secret_key );
	    $iv             = substr( hash( 'sha256', $secret_iv ), 0, 16 );
	 
	    if( $action == 'e' ) {
	        $output = base64_encode( openssl_encrypt( $string, $encrypt_method, $key, 0, $iv ) );
	    }
	    else if( $action == 'd' ){
	        $output = openssl_decrypt( base64_decode( $string ), $encrypt_method, $key, 0, $iv );
	    }
	 
	    return $output;
	}
}

if ( ! function_exists('alert') ) {
	function alert() {
		$ci =& get_instance();
		
		if ( $ci->session->flashdata('success') ) {
			echo "<div class='alert alert-success alert-dismissable'>";
			    echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
			    echo "<i data-icon='G' class='linea-icon linea-basic fa-fw'></i>";
				echo $ci->session->flashdata('success');
			echo "</div>";
		} elseif ( $ci->session->flashdata('info') ) {
			echo "<div class='alert alert-info alert-dismissable'>";
			    echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
			    echo "<i data-icon='G' class='linea-icon linea-basic fa-fw'></i>";
				echo $ci->session->flashdata('info');
			echo "</div>";
        } elseif ( $ci->session->flashdata('warning') ) {
			echo "<div class='alert alert-warning alert-dismissable'>";
			    echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
			    echo "<i data-icon='G' class='linea-icon linea-basic fa-fw'></i>";
				echo $ci->session->flashdata('warning');
			echo "</div>";
		} elseif ( $ci->session->flashdata('danger') ) {
			echo "<div class='alert alert-danger alert-dismissable'>";
			    echo "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
			    echo "<i data-icon='G' class='linea-icon linea-basic fa-fw'></i>";
				echo $ci->session->flashdata('danger');
			echo "</div>";
		}
	}
}

// if ( ! function_exists('complete_your_partner_profile') ) {
// 	function complete_your_tenant_profile() {
// 		$ci =& get_instance();

// 		$temp = "";
// 		if ( empty(session()['verified_by']) ) {
// 			$temp .= "";
// 		}

// 		echo $temp;
// 	}
// }

// if ( ! function_exists('notification_verified_email') ) {
// 	function notification_verified_email() {
// 		$ci =& get_instance();

// 		$temp = "";
// 		//Silahkan melengkapi data kemitraan anda. Data anda akan segera diverifikasi!
// 		if ( $ci->session->userdata('origin_verified') != 'email' AND $ci->session->userdata('second_verified') != 'email' AND $ci->session->userdata('role') == 'SuperAdmin' ) {
// 			$temp .= "<script type='text/javascript'>
// 					  	 $(document).ready(function() {
// 					  	 	$('body').pgNotification({
// 					            style: 'bar',
// 					            message: 'Harap verifikasi akun Anda melalui email, jika Anda tidak menerima email. Klik <a href=\"" . base_url('rentistadmin/tenant_user/resend_token_email') . "\" style=\"color: #f55753; font-weight: bold;\">disini</a> untuk dikirim ulang.',
// 					            position: 'top',
// 					            timeout: 0,
// 					            type: 'warning'
// 					        }).show();
// 					  	 });
// 					  </script>";
// 		}

// 		echo $temp;
// 	}
// }

if ( ! function_exists('date_format_indo') ) {
	function date_format_indo($date, $print_day = false, $time = false){
		if ( ! empty($date) AND $date != "0000-00-00 00:00:00" AND $date != "0000-00-00" ) {
			// pre(ok);
			$day = array ( 1 =>    'Senin',
						'Selasa',
						'Rabu',
						'Kamis',
						'Jumat',
						'Sabtu',
						'Minggu'
					);
					
			$bulan = array (1 =>   'Januari',
						'Februari',
						'Maret',
						'April',
						'Mei',
						'Juni',
						'Juli',
						'Agustus',
						'September',
						'Oktober',
						'November',
						'Desember'
					);
			$split 	  = explode('-', $date);
			$date_indonesia = substr($split[2], 0, 2) . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
			
			if ($print_day) {
				$num = date('N', strtotime($date));
				if ($time) {
					return $day[$num] . ', ' . $date_indonesia . ' ' . date('H:i', strtotime($date));
				} else {
					return $day[$num] . ', ' . $date_indonesia;
				}
			}
			return $date_indonesia;
		}
	}
}

// if ( ! function_exists('session') ) {
// 	function session(){

// 		// $ci =& get_instance();
		
// 		// $ci->db->select("tb_partner_person.id_partner_person,
// 		// 	tb_partner_person.profile_pic,
// 		// 	CONCAT(tb_partner_person.first_name, ' ',tb_partner_person.last_name) AS name_partner_person,
// 		// 	tb_partner_person.first_name,
// 		// 	tb_partner_person.last_name,
// 		// 	tb_partner_person.phone,
// 		// 	tb_partner_person.email,
// 		// 	tb_partner_person.`password`,
// 		// 	tb_partner_person.id_partner_role,
// 		// 	tb_partner_person.google_id,
// 		// 	tb_partner_person.facebook_id,
// 		// 	tb_partner_person.secret_token");

// 		// $ci->db->select("tb_partner.id_partner,
// 		// 	tb_partner.profile_pic AS profile_pic_partner,
// 		// 	tb_partner.rental_name,
// 		// 	CONCAT(tb_partner.first_name, ' ',tb_partner.last_name) AS name_partner,
// 		// 	tb_partner.first_name AS first_name_partner,
// 		// 	tb_partner.last_name AS last_name_partner,
// 		// 	tb_partner.phone AS phone_partner,
// 		// 	tb_partner.email AS email_partner,
// 		// 	tb_partner.id_partner_type,
// 		// 	tb_partner.referral_id,
// 		// 	tb_partner.referrer,
// 		// 	tb_partner.ip_address,
// 		// 	tb_partner.registered_on,
// 		// 	tb_partner.`status`,
// 		// 	tb_partner.parent_id,
// 		// 	tb_partner.verified_email,
// 		// 	tb_partner.verified_phone,
// 		// 	tb_partner.verified_by,
// 		// 	tb_partner.verified_date");
// 		// $ci->db->join('tb_partner', 'tb_partner.id_partner = tb_partner_person.id_partner', 'inner');
// 		// $ci->db->where('secret_token', get_cookie('token_partner_person'));
// 		// $query = $ci->db->get('tb_partner_person')->row_array();

// 		// return $query;
// 	}
// }

// if ( ! function_exists('session_attribute') ) {
// 	function session_attribute( $field = "" ){

// 		$ci =& get_instance();
		
// 		$ci->db->where('id_partner', session()['id_partner']);
// 		$query = $ci->db->get('tb_partner_attribute')->result_array();
		
// 		$temp = array();
// 		foreach ($query as $data) {
// 			$temp[$data['id_partner_attribute']] = $data['attribute_value'];
// 		}

// 		return empty($temp[$field]) ? "" : $temp[$field];
// 	}
// }

// if ( ! function_exists('count_transaction_detail_by_status') ) {
// 	function count_transaction_detail_by_status( $status, $id_asset_category ){

// 		$ci =& get_instance();
		
// 		$ci->db->where('tb_transaction_detail.id_partner', session()['id_partner']);
// 		$ci->db->where('tb_asset.id_asset_category', $id_asset_category);
// 		$ci->db->where('tb_transaction_detail.status', $status);

// 		$ci->db->select('count(*) AS count');
// 		$ci->db->join('tb_asset', 'tb_asset.id_asset = tb_transaction_detail.id_asset', 'inner');
// 		$query = $ci->db->get('tb_transaction_detail')->row_array();

// 		return $query['count'];
// 	}
// }

// if ( ! function_exists('hint') ) {
// 	function hint( $attribute_name ){

// 		$ci =& get_instance();
// 		$ci->db->where('attribute_name', $attribute_name);
// 		$query = $ci->db->get('tb_form_language')->row_array();

// 		return $query;
// 	}
// }

// if ( ! function_exists('count_chat') ) {
// 	function count_chat(){

// 		$ci =& get_instance();

// 		$ci->db->where('id_partner', session()['id_partner']);
// 		$ci->db->where('type', 'Member');
// 		$ci->db->where('status', 'Sent');
// 		$query = $ci->db->get('tb_chat')->num_rows();

// 		return $query;
// 	}
// }

if ( ! function_exists('role') ) {
	function role( $id_role ){

		$result = "";
		if ( $id_role == 1 ) {
			$result = "Administrasi";
		} elseif ($id_role == 2) {
			$result = "Petugas Kecamatan";
		} elseif ($id_role == 3) {
			$result = "Petugas Desa";
		}

		return $result;
	}
}


if ( ! function_exists('swal') ) {
	function swal( $message, $type, $url = "" ) {
		$ci =& get_instance();

		$temp = "<script type='text/javascript'>
				  	 $(document).ready(function() {
				  	 	swal('" . $message . "', {
			                icon: '" . $type . "',
			                buttons: false,
			                timer: 2000,
			            });
			            setTimeout(function() {
                      
		                    if(url == ''){
		                    	location.reload(false);
		                    } else {
		                	    window.location = url;    
		                    }
		                      
		                }, 2000);
				  	 });
				  </script>";

		echo $temp;
	}
}

if ( ! function_exists('get_fee_asset_category') ) {
	function get_fee_asset_category( $id_asset_category ) {
		
		$ci = get_instance();

		$ci->db->where('id_asset_category', $id_asset_category);
		$query = $ci->db->get('tb_fee_general')->row_array();

		return $query['partner_percentage'];

	}
}