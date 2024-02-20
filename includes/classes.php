<?php
    date_default_timezone_set('Asia/Kolkata');
    include_once(__DIR__.'/db.php');
    use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
	require __DIR__.'/../PHPMailer/src/PHPMailer.php';
	require __DIR__.'/../PHPMailer/src/SMTP.php';
	require __DIR__.'/../PHPMailer/src/Exception.php';

	
	   /**
	    * Summary of Utility
	    */
    class Utility
	{
		//var $base_url = 'https://helper4hire.com';
		//var $base_dir  = '/home/helper4hire/helper4hire.com';
		var $base_dir  = 'c:/wamp64/www/Helper4hire/';
		var $base_url = 'http://localhost/Helper4hire/';
		var $conn;

		
		public function fetch($db, $query, $prep_array)
		{
			$this->conn = $db;
			if($query->execute($prep_array)){
				if($query->rowCount() > 0){
					$res['data'] = $query->fetchAll();
					$res['msg'] = 'success';
				}
				else{
					$res['msg'] = 'No data found';
				}
			}
			else{
				$res['msg'] = 'failure';
			}
			return $res;  	
		}
		function check_login()
		{
			if(!isset($_SESSION['username']) or $_SESSION['username'] == NULL or $_SESSION['username'] == '')
			{
				header('location:index.php');
			}
		}
		
		function check_vendor()
		{
			if(!isset($_SESSION['vendor_id']) or $_SESSION['vendor_id'] == NULL or $_SESSION['vendor_id'] == '')
			{
				header('location:index.php');
			}
		}
		
		function check_buyer()
		{
			if(!isset($_SESSION['buyer_id']) or $_SESSION['buyer_id'] == NULL or $_SESSION['buyer_id'] == '')
			{
				header('location:index.php');
			}
		}
		
		function upload_file($temp_file, $new_file, $rest)
		{
			//print_r($temp_file);
			if(is_array($temp_file['name']))
			{
				$count = count($temp_file['name']);
				for($i=0;$i<$count;$i++)
				{
					if(count(explode('.',$temp_file['name'][$i])) == 2)
					{
						$ts = date('Ymdhis');
						//$fname = $temp_file['name'][$i];
						$fsize = $temp_file['size'][$i];
						$ftmp = $temp_file['tmp_name'][$i];
						$ftype = $temp_file['type'][$i];
						$fexp = explode('.', $temp_file['name'][$i]);
						$fext = strtolower(end($fexp));
						
						$fname = $this->base_dir.$new_file.'-'.$ts.'-'.$i.'.'.$fext;
						$fname1 = $this->base_url.$new_file.'-'.$ts.'-'.$i.'.'.$fext;
						//print_r(in_array($fext, $rest['ext']));
						if(in_array($fext, $rest['ext']) === false)
						{
							$error[] = 'ferr1';
						}
						if($fsize > $rest['size'])
						{
							$error[] = 'ferr2';
						}
						if(!isset($error))
						{
							if(move_uploaded_file($ftmp, $fname) === true)
							{
								$res['file'][] = $fname1;
								$res['oldfile'][] = $temp_file['name'][$i]; //$fname;
								$res['status'][] = 'success';
							}
							else
							{
								$res['file'][] = $fname1;
								$res['oldfile'][] = $temp_file['name'][$i]; //$fname;
								$res['status'][] = 'ferr3';
							}
						}
						else
						{
							//$res['file'][] = $fname1;
							$res['oldfile'][] = $temp_file['name'][$i]; //$fname;
							$res['status'][] = $error;
						}
					}
					unset($error);
				}
			}
			else
			{
				$count = 1;
				if(count(explode('.',$temp_file['name'])) == 2)
				{
					$ts1 = new DateTime();
					$ts = $ts1->format('Ymdhisu');
					//$fname = $temp_file['name'];
					$fsize = $temp_file['size'];
					$ftmp = $temp_file['tmp_name'];
					$ftype = $temp_file['type'];
					$fexp = explode('.', $temp_file['name']);
					$fext = strtolower(end($fexp));
					//echo 'Exnetsion = '.$fext.'<br>';
					$fname = $this->base_dir.$new_file.'-'.$ts.'.'.$fext;
					$fname1 = $this->base_url.$new_file.'-'.$ts.'.'.$fext;
					//print_r(in_array($fext, $rest['ext']));
					if(in_array($fext, $rest['ext']) === false)
					{
						$error[] = 'ferr1';
					}
					if($fsize > $rest['size'])
					{
						$error[] = 'ferr2';
					}
					if(!isset($error))
					{
						move_uploaded_file($ftmp, $fname);
						$res['file'][] = $fname1;
						$res['oldfile'][] = $temp_file['name']; //$fname;
						$res['status'][] = 'success';
					}
					else
					{
						$res['file'][] = $fname1;
						$res['oldfile'][] = $temp_file['name']; //$fname;
						$res['status'][] = $error;
					}
				}
				unset($error);
			}
			//print_r($res); 	
			return $res;
		}

		function resizeImage($temp_file, $new_file, $rest)
		{
			if(count(explode('.',$temp_file)) == 2)
			{
				$fprop = getimagesize($temp_file);
				if($fprop !== false)
				{
					$imgtype = $fprop[2];
					$imgwidth = $fprop[0];
					$imgheight = $fprop[1];
					
					if(isset($rest['width']) and is_array($rest['width'])){
						foreach($rest['width'] as $width){
							$ratio = $imgheight/$imgwidth;
							$new_width = $width;
							$new_height = round(($width * $ratio),0,PHP_ROUND_HALF_UP);
							switch($imgtype){
								case IMAGETYPE_JPEG:
									$resourceType = imagecreatefromjpeg($temp_file);
									$imageLayer = imagecreatetruecolor($new_width, $new_height);
									imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $new_width, $new_height, $imgwidth, $imgheight);
									$upload_file =str_replace($this->base_url,$this->base_dir,$new_file);
									$mkfilename = explode('.',$upload_file);
									$new_file1 = $mkfilename[0]."-".$new_width."w-".$new_height."h.".$mkfilename[1];
									imagejpeg($imageLayer,$new_file1);
									
								break;
								case IMAGETYPE_PNG:
									$resourceType = imagecreatefrompng($temp_file);
									$imageLayer = imagecreatetruecolor($new_width, $new_height);
									imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $new_width, $new_height, $imgwidth, $imgheight);
									$upload_file =str_replace($this->base_url,$this->base_dir,$new_file);
									$mkfilename = explode('.',$upload_file);
									$new_file1 = $mkfilename[0]."-".$new_width."w-".$new_height."h.".$mkfilename[1];
									imagepng($imageLayer,$new_file1);
								break;
								case IMAGETYPE_GIF:
									$resourceType = imagecreatefromgif($temp_file);
									$imageLayer = imagecreatetruecolor($new_width, $new_height);
									imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $new_width, $new_height, $imgwidth, $imgheight);
									$upload_file =str_replace($this->base_url,$this->base_dir,$new_file);
									$mkfilename = explode('.',$upload_file);
									$new_file1 = $mkfilename[0]."-".$new_width."w-".$new_height."h.".$mkfilename[1];
									imagegif($imageLayer,$new_file1);
								break;
							}
							//move_uploaded_file($ftmp, $new_file1);
						}
						
					}
					elseif(isset($rest['height']) and is_array($rest['height'])){
						foreach($rest['height'] as $height){
							$ratio = $imgwidth/$imgheight;
							$new_width = $height * $ratio;
							$new_height = $height;
							switch($imgtype){
								case IMAGETYPE_JPEG:
									$resourceType = imagecreatefromjpeg($temp_file);
									$imageLayer = imagecreatetruecolor($new_width, $new_height);
									imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $new_width, $new_height, $imgwidth, $imgheight);
									$upload_file =str_replace($this->base_url,$this->base_dir,$new_file);
									$mkfilename = explode('.',$upload_file);
									$new_file1 = $mkfilename[0]."-".$new_width."w-".$new_height."h".$mkfilename[1];
									imagejpeg($imageLayer,$new_file1);
									
								break;
								case IMAGETYPE_PNG:
									$resourceType = imagecreatefrompng($temp_file);
									$imageLayer = imagecreatetruecolor($new_width, $new_height);
									imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $new_width, $new_height, $imgwidth, $imgheight);
									$upload_file =str_replace($this->base_url,$this->base_dir,$new_file);
									$mkfilename = explode('.',$upload_file);
									$new_file1 = $mkfilename[0]."-".$new_width."w-".$new_height."h.".$mkfilename[1];
									imagepng($imageLayer,$new_file1);
								break;
								case IMAGETYPE_GIF:
									$resourceType = imagecreatefromgif($temp_file);
									$imageLayer = imagecreatetruecolor($new_width, $new_height);
									imagecopyresampled($imageLayer, $resourceType, 0, 0, 0, 0, $new_width, $new_height, $imgwidth, $imgheight);
									$upload_file =str_replace($this->base_url,$this->base_dir,$new_file);
									$mkfilename = explode('.',$upload_file);
									$new_file1 = $mkfilename[0]."-".$new_width."w-".$new_height."h".$mkfilename[1];
									imagegif($imageLayer,$new_file1);
								break;
							}
							//move_uploaded_file($ftmp, $new_file1);
						}
					}
					
				}
			}
			
			
		}
		
		function sendSMS($mobile, $var1, $var2, $TemplateID)
		{
			$auth = '398193AMv8iJYoMRo647ebff5P1';
			$senderID = 'AGRKIS';
			$mobile = '91'.$mobile;
			$curl = curl_init();
			if($var2 == NULL){
				$post = "{\"template_id\":\"".$TemplateID."\",\"sender\":\"".$senderID."\",\"short_url\":\"0\",\"mobiles\":\"".$mobile."\",\"var\":\"".$var1."\"}";
			}
			else{
				$post = "{\"template_id\":\"".$TemplateID."\",\"sender\":\"".$senderID."\",\"short_url\":\"0\",\"mobiles\":\"".$mobile."\",\"VAR1\":\"".$var1."\",\"VAR2\":\"".$var2."\"}";
			}
			curl_setopt_array($curl, [
			CURLOPT_URL => "https://control.msg91.com/api/v5/flow/",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			//CURLOPT_POSTFIELDS => "{\"template_id\":\"EntertemplateID\",\"sender\":\"$senderID\",\"short_url\":\"0\",\"mobiles\":\"$mobile\",\"VAR1\":\"VALUE 1\",\"VAR2\":\"VALUE 2\"}",
			CURLOPT_POSTFIELDS => $post,
			CURLOPT_HTTPHEADER => [
				"accept: application/json",
				"authkey: ".$auth,
				"content-type: application/json"
			],
			]);

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				$res =  "Failure : " . $err;
			} else {
					$res = "success";
			}
			return $res;
		}
	}

	class umbmail extends PHPMailer
	{
		private $_host = 'server.umbrellatechnologies.pro';
		private $_user = 'admin@umbrella-technologies.com';
		private $_password = 'Umbrella@12';

		public function __construct($exceptions=true)
		{
			$this->Host = $this->_host;
			$this->Username = $this->_user;
			$this->Password = $this->_password;
			$this->Port = 465;
			$this->SMTPAuth = true;
			$this->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
			$this->isSMTP();
			$this->isHTML(true); 
			parent::__construct($exceptions);
		}

	   public function sendMail($to, $cc, $bcc, $subject, $body)
	   {
			$this->setFrom($this->_user);
			$this->addAddress($to);
			if($cc != NULL and $cc != '')
			{
				$this->addCC($cc);
			}
			if($bcc != NULL and $bcc != '')
			{
				$this->addCC($bcc);
			}
			$this->Subject = $subject;
			$this->Body = $body;
			return $this->send();
		}
	}

    class adminUser{
        public $id;
        public $fname;
        public $lname;
        public $email;
        public $mobile;
        public $password;
        public $status;
        public $conn;

        public function __construct($db){
			$this->conn = $db;
		}

        public function create($fname, $lname, $email, $mobile, $password, $status){
            $password = md5($password);
            $sql = $this->conn->prepare("INSERT INTO user(`fname`, `lname`, `email`, `mobile`, `password`, `status`) VALUES(:fname, :lname, :email, :mobile, :password, :status)");
            if($sql->execute(['fname' => $fname, 'lname' => $lname, 'email' => $email, 'mobile' => $mobile, 'password' => $password, 'status' => $status])){
                $data['id'] = $this->conn->lastInsertId();
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function update($id, $fname, $lname, $email, $mobile, $password, $status){
            $sql = $this->conn->prepare("UPDATE user SET `fname` = :fname, `lname` = :lname, `email` = :email, `mobile` = :mobile, `status` = :status  WHERE `id` = :id");
            if($sql->execute(['id' => $id, 'fname' => $fname, 'lname' => $lname, 'email' => $email, 'mobile' => $mobile, 'status' => $status])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
        }

        public function changePassword($id, $password){
            $password = md5($password);
            $sql = $this->conn->prepare("UPDATE user SET `password` = :password WHERE `id` = :id");
            if($sql->execute(['id' => $id, 'password' => $password])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
        }

        public function userAuthentication($email, $mobile, $password){
            $password = md5($password);
            var_dump($this->conn);
            $sql = $this->conn->prepare("SELECT * FROM user WHERE (`email` = :email OR `mobile` = :mobile) AND `password` = :password");
            if($sql->execute(['email' => $email, 'mobile' => $mobile, 'password' => $password])){
                if($sql->rowCount() > 0){
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                    if(count($data['data']) == 1){
                        $data['id'] = $data['data'][0];
                        $data['status'] = 'success';
                    }
                    else{
                        $data['status'] = 'failure';
                    }
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function delete($id){
            $sql = $this->conn->prepare("DELETE FROM user WHERE `id` = :id");
            if($sql->execute(['id' => $id])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function  chkSession(){
            if(isset($_SESSION['id']) and $_SESSION['id'] != '' and $_SESSION['id'] != NULL){
                
            }
            else{
                header('location:index.php');    
            }
        }

        public function fetch($id){
            $sql = $this->conn->prepare("SELECT * FROM user WHERE `id` = :id");
            if($sql->execute(['id' => $id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }
    }

    class city{
        public $id;
        public $name;
        public $status;
        public $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        public function create($name, $status){
            $sql = $this->conn->prepare("INSERT INTO city(`name`, `status`) VALUES(:name, :status)");
            if($sql->execute(['name' => $name, 'status' => $status])){
                $data['status'] = 'success';
                $data['id'] = $this->conn->lastInsertId();
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function update($id, $name, $status){
            $sql = $this->conn->prepare("UPDATE city SET `name` = :name, `status` = :status WHERE `id` = :id");
            if($sql->execute(['id' => $id, 'name' => $name, 'status' => $status])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function delete($id){
            $sql = $this->conn->prepare("DELETE FROM city WHERE `id` = :id");
            if($sql->execute(['id' => $id])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchById($id){
            $sql = $this->conn->prepare("SELECT * FROM city WHERE `id` = :id");
            if($sql->execute(['id' => $id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchAll(){
            $sql = $this->conn->prepare("SELECT * FROM city");
            if($sql->execute()){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchAllByStatus($status){
            $sql = $this->conn->prepare("SELECT * FROM city WHERE `status` = :status");
            if($sql->execute(['status' => $status])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function changeStatus($id, $status){
            $sql = $this->conn->prepare("UPDATE city SET `status` = :status WHERE `id` = :id");
            if($sql->execute(['id' => $id, 'status' => $status])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }
    }

    class service{
        public $id;
        public $name;
        public $short_desc;
        public $long_desc;
        public $features;
        public $status;
        public $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        public function create($name, $short_desc, $long_desc, $features, $status){
            $sql = $this->conn->prepare("INSERT INTO service(`name`, `short_desc`, `long_desc`, `features`, `status`) VALUES(:name, :short_desc, :long_desc, :features, :status)");
            if($sql->execute(['name' => $name, 'short_desc' => $short_desc, 'long_desc' => $long_desc, 'features' => $features, 'status' => $status])){
                $data['status'] = 'success';
                $data['id'] = $this->conn->lastInsertId();
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function update($id, $name, $short_desc, $long_desc, $features, $status){
            $sql = $this->conn->prepare("UPDATE service SET `name` = :name, `short_desc` = :short_desc, `long_desc` = :long_desc, `features` = :features, `status` = :status WHERE `id` = :id");
            if($sql->execute(['id' => $id, 'name' => $name, 'short_desc' => $short_desc, 'long_desc' => $long_desc, 'features' => $features, 'status' => $status])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function delete($id){
            $sql = $this->conn->prepare("DELETE FROM `service` WHERE `id`=:id");
            if($sql->execute([':id' => $id])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchById($id){
            $sql = $this->conn->prepare("SELECT * FROM `service` WHERE `id`=:id");
            if($sql->execute([':id' => $id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetch(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchAll(){
            $sql = $this->conn->prepare("SELECT * FROM `service`");
            if($sql->execute()){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function changeStatus($id, $status){
            $sql = $this->conn->prepare("UPDATE service SET `status` = :status WHERE `id` = :id");
            if($sql->execute(['id' => $id, 'status' => $status])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchByStatus($status){
            $sql = $this->conn->prepare("SELECT * FROM `service` WHERE `status`=:status");
            if($sql->execute([':status' => $status])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }
    }

    class serviceCity{
        public $id;
        public $service_id;
        public $city_id;
        public $base_price;
        public $status;
        public $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        public function create($service_id, $city_id, $base_price, $status){
            $sql = $this->conn->prepare("INSERT INTO service_city(`service_id`, `city_id`, `base_price`, `status`) VALUES(:service_id, :city_id, :base_price, :status)");
            if($sql->execute(['service_id' => $service_id, 'city_id' => $city_id, 'base_price' => $base_price, 'status' => $status])){
                $data['status'] = 'success';
                $data['id'] = $this->conn->lastInsertId();
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function update($id, $base_price, $status){
            $sql = $this->conn->prepare("UPDATE service_city SET `base_price` = :base_price, `status` = :status WHERE `id` = :id");
            if($sql->execute([':id' => $id, ':base_price' => $base_price, ':status' => $status])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function delete($id){
            $sql = $this->conn->prepare("DELETE FROM `service_city` WHERE `id`=:id");
            if($sql->execute([':id' => $id])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetch($id){
            $sql = $this->conn->prepare("SELECT * FROM `service_city` WHERE `id`=:id");
            if($sql->execute([':id' => $id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetch(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchAll(){
            $sql = $this->conn->prepare("SELECT * FROM `service_city`");
            if($sql->execute()){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchCity($service_id){
            $sql = $this->conn->prepare("SELECT city_id FROM `service_city` WHERE `service_id`=:service_id");
            if($sql->execute([':service_id' => $service_id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchByServiceId($service_id){
            $sql = $this->conn->prepare("SELECT * FROM `service_city` WHERE `service_id`=:service_id");
            if($sql->execute([':service_id' => $service_id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function changeStatus($id, $status){
            $sql = $this->conn->prepare("UPDATE service_city SET `status` = :status WHERE `id` = :id");
            if($sql->execute(['id' => $id, 'status' => $status])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchByStatus($status){
            $sql = $this->conn->prepare("SELECT * FROM `service_city` WHERE `status`=:status");
            if($sql->execute([':status' => $status])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchByCityIdandStatus($city_id, $status){
            $sql = $this->conn->prepare("SELECT * FROM `service_city` WHERE `city_id`=:city_id AND `status`=:status");
            if($sql->execute([':city_id' => $city_id, ':status' => $status])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }
    }

    class sgo{
        public $id;
        public $service_city_id;
        public $name;
        public $status;
        public $conn;
        
        public function __construct($db){
            $this->conn = $db;
        }

        public function create($service_city_id, $name, $status){
            $sql = $this->conn->prepare("INSERT INTO sgo(`service_city_id`, `name`, `status`) VALUES(:service_city_id, :name, :status)");
            if($sql->execute([':service_city_id' => $service_city_id, ':name' => $name, ':status' => $status])){
                $data['status'] = 'success';
                $data['id'] = $this->conn->lastInsertId();
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function update($id, $service_city_id, $name, $status){
            $sql = $this->conn->prepare("UPDATE sgo SET `service_city_id` = :service_city_id, `name` = :name, `status` = :status WHERE `id` = :id");
            if($sql->execute(['id' => $id, 'service_city_id' => $service_city_id, 'name' => $name, 'status' => $status])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function delete($id){
            $sql = $this->conn->prepare("DELETE FROM `sgo` WHERE `id`=:id");
            if($sql->execute([':id' => $id])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetch($id){
            $sql = $this->conn->prepare("SELECT * FROM `sgo` WHERE `id`=:id");
            if($sql->execute([':id' => $id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetch(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchAll(){
            $sql = $this->conn->prepare("SELECT * FROM `sgo`");
            if($sql->execute()){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function changeStatus($id, $status){
            $sql = $this->conn->prepare("UPDATE sgo SET `status` = :status WHERE `id` = :id");
            if($sql->execute(['id' => $id, 'status' => $status])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchByStatus($status){
            $sql = $this->conn->prepare("SELECT * FROM `sgo` WHERE `status`=:status");
            if($sql->execute([':status' => $status])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchByServiceCity($service_city_id){
            $sql = $this->conn->prepare("SELECT * FROM `sgo` WHERE `service_city_id`=:service_city_id");
            if($sql->execute([':service_city_id' => $service_city_id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchByServiceCityAndStatus($service_city_id, $status){
            $sql = $this->conn->prepare("SELECT * FROM `sgo` WHERE `service_city_id`=:service_city_id AND `status`=:status");
            if($sql->execute([':service_city_id' => $service_city_id, ':status' => $status])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }
    }

    class sgoOptions{
        public $id;
        public $sgo_id;
        public $name;
        public $price;
        public $status;
        public $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        public function create($sgo_id, $name, $price, $status){
            $sql = $this->conn->prepare("INSERT INTO sgo_options(`sgo_id`, `name`, `price`, `status`) VALUES(:sgo_id, :name, :price, :status)");
            if($sql->execute([':sgo_id' => $sgo_id, ':name' => $name, ':price' => $price, ':status' => $status])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function update($id, $sgo_id, $name, $price, $status){
            $sql = $this->conn->prepare("UPDATE sgo_options SET `sgo_id` = :sgo_id, `name` = :name, `price` = :price, `status` = :status WHERE `id` = :id");
            if($sql->execute([':id' => $id, ':sgo_id' => $sgo_id, ':name' => $name, ':price' => $price, ':status' => $status])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function delete($id){
            $sql = $this->conn->prepare("DELETE FROM sgo_options WHERE `id` = :id");
            if($sql->execute([':id' => $id])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetch($id){
            $sql = $this->conn->prepare("SELECT * FROM `sgo_options` WHERE `id` = :id");
            if($sql->execute([':id' => $id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetch(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchBySgoId($sgo_id){
            $sql = $this->conn->prepare("SELECT * FROM `sgo_options` WHERE `sgo_id` = :sgo_id");
            if($sql->execute([':sgo_id' => $sgo_id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchByStatus($status){
            $sql = $this->conn->prepare("SELECT * FROM `sgo_options` WHERE `status` = :status");
            if($sql->execute([':status' => $status])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchBySgoIdAndStatus($sgo_id, $status){
            $sql = $this->conn->prepare("SELECT * FROM `sgo_options` WHERE `sgo_id` = :sgo_id AND `status` = :status");
            if($sql->execute([':sgo_id' => $sgo_id, ':status' => $status])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchAll(){
            $sql = $this->conn->prepare("SELECT * FROM `sgo_options`");
            if($sql->execute()){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function changeStatus($id, $status){
            $sql = $this->conn->prepare("UPDATE sgo_options SET `status` = :status WHERE `id` = :id");
            if($sql->execute(['id' => $id, 'status' => $status])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }
    }

    class subscriptionPlan{
        public $id;
        public $name;
        public $city_id;
        public $duration;
        public $replacements;
        public $price;
        public $status;
        public $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        public function create($name, $city_id, $duration, $replacements, $price, $status){
            $sql = $this->conn->prepare("INSERT INTO subscription_plan(`name`, `city_id`, `duration`, `replacements`, `price`, `status`) VALUES(:name, :city_id, :duration, :replacements, :price, :status)");
            if($sql->execute([':name' => $name, ':city_id' => $city_id, ':duration' => $duration, ':replacements' => $replacements, ':price' => $price, ':status' => $status])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function update($id, $name, $city_id, $duration, $replacements, $price, $status){
            $sql = $this->conn->prepare("UPDATE subscription_plan SET `name` = :name, `city_id` = :city_id, `duration` = :duration, `replacements` = :replacements, `price` = :price, `status` = :status WHERE `id` = :id");
            if($sql->execute([':id' => $id, ':name' => $name, ':city_id' => $city_id, ':duration' => $duration, ':replacements' => $replacements, ':price' => $price, ':status'=>$status])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function delete($id){
            $sql = $this->conn->prepare("DELETE FROM subscription_plan WHERE `id` = :id");
            if($sql->execute([':id' => $id])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchAll(){
            $sql = $this->conn->prepare("SELECT * FROM subscription_plan");
            if($sql->execute()){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchById($id){
            $sql = $this->conn->prepare("SELECT * FROM subscription_plan WHERE `id` = :id");
            if($sql->execute([':id' => $id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetch(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchByCity($city_id){
            $sql = $this->conn->prepare("SELECT * FROM subscription_plan WHERE find_in_set(:city_id, `city_id`)");
            if($sql->execute([':city_id' => $city_id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }
        public function fetchByCityandStatus($city_id, $status){
            $sql = $this->conn->prepare("SELECT * FROM subscription_plan WHERE find_in_set(:city_id, `city_id`) and `status` = :status");
            if($sql->execute([':city_id' => $city_id,':status' =>$status])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function changeStatus($id, $status){
            $sql = $this->conn->prepare("UPDATE `subscription_plan` SET `status` = :status WHERE id = :id");
            if($sql->execute([':status'=>$status, ':id'=>$id])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }
    }

    class customer{
        public $id;
        public $fname;
        public $mname;
        public $lname;
        public $gender;
        public $birth_date;
        public $address;
        public $city;
        public $pincode;
        public $mobile1;
        public $mobile2;
        public $whatsapp1;
        public $whatsapp2;
        public $email;
        public $password;
        public $status;
        public $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        public function create($fname, $mname, $lname, $gender, $birth_date, $address, $city, $pincode, $email, $mobile1, $whatsapp1, $mobile2, $whatsapp2, $password, $status){
            $sql = $this->conn->prepare("INSERT INTO `customer` (`fname`, `mname`, `lname`, `gender`, `birth_date`, `address`, `city`, `pincode`, `email`, `mobile1`, `whatsapp1`, `mobile2`, `whatsapp2`, `password`, `status`) VALUES (:fname, :mname, :lname, :gender, :birth_date, :address, :city, :pincode, :email, :mobile1, :whatsapp1, :mobile2, :whatsapp2, :password, :status)");
            if($sql->execute([':fname'=>$fname, ':mname'=>$mname, ':lname'=>$lname, ':gender'=>$gender, ':birth_date'=>$birth_date, ':address'=>$address, ':city'=>$city, ':pincode'=>$pincode, ':email'=>$email, ':mobile1'=>$mobile1, ':whatsapp1'=>$whatsapp1, ':mobile2'=>$mobile2, ':whatsapp2'=>$whatsapp2, ':password'=>$password, ':status'=>$status])){
                $data['status'] = 'success';
                $data['data'] = $this->conn->lastInsertId();
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function update($id, $fname, $mname, $lname, $gender, $birth_date, $address, $city, $pincode, $email, $mobile1, $whatsapp1, $mobile2, $whatsapp2, $status){
            $sql = $this->conn->prepare("UPDATE `customer` SET `fname`=:fname,`mname`=:mname,`lname`=:lname,`gender`=:gender,`birth_date`=:birth_date,`address`=:address,`city`=:city,`pincode`=:pincode,`email`=:email,`mobile1`=:mobile1,`whatsapp1`=:whatsapp1,`mobile2`=:mobile2,`whatsapp2`=:whatsapp2,`status`=:status WHERE `id`=:id");
            if($sql->execute([':id'=>$id,':fname'=>$fname, ':mname'=>$mname, ':lname'=>$lname, ':gender'=>$gender, ':birth_date'=>$birth_date, ':address'=>$address, ':city'=>$city, ':pincode'=>$pincode, ':email'=>$email, ':mobile1'=>$mobile1, ':whatsapp1'=>$whatsapp1, ':mobile2'=>$mobile2, ':whatsapp2'=>$whatsapp2, ':status'=>$status])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function delete($id){
            $sql = $this->conn->prepare("DELETE FROM `customer` WHERE `id`=:id");
            if($sql->execute([':id' => $id])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function changeStatus($id, $status){
            $sql = $this->conn->prepare("UPDATE `customer` SET `status`=:status WHERE `id`=:id");
            if($sql->execute([':status' => $status, ':id' => $id])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchById($id){
            $sql = $this->conn->prepare("SELECT * FROM `customer` WHERE `id`=:id");
            if($sql->execute([':id' => $id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchByMobile($mobile){
            $sql = $this->conn->prepare("SELECT * FROM `customer` WHERE `mobile1`=:mobile OR `mobile2`=:mobile");
            if($sql->execute([':mobile' => $mobile])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchAllByStatus($status){
            $sql = $this->conn->prepare("SELECT * FROM `customer` WHERE `status`=:status");
            if($sql->execute([':status' => $status])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchAllByStatusAndCity($status, $city){
            $sql = $this->conn->prepare("SELECT * FROM `customer` WHERE `status`=:status AND `city`=:city");
            if($sql->execute([':status' => $status, ':city' => $city])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchAllByCity($city){
            $sql = $this->conn->prepare("SELECT * FROM `customer` WHERE `city`=:city");
            if($sql->execute([':city' => $city])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;   
        }

        public function fetchByEmail($email){
            $sql = $this->conn->prepare("SELECT * FROM `customer` WHERE `email`=:email");
            if($sql->execute([':email' => $email])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchAll(){
            $sql = $this->conn->prepare("SELECT * FROM `customer`");
            if($sql->execute()){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }
    }

    class customerAdresses{

        public $address;
        public $customer_id;
        public $city;
        public $pincode;
        public $conn;

        public function __construct($db){
            $this->conn = $this->$db;
        }

        public function create($customer_id, $address, $city, $pincode){
            $sql = $this->conn->prepare("INSERT INTO `customer_adresses` (`customer_id`, `address`, `city`, `pincode`) VALUES (:customer_id, :address, :city, :pincode)");
            if($sql->execute([':customer_id'=>$customer_id, ':address'=>$address, ':city'=>$city, ':pincode'=>$pincode])){
                $data['status'] = 'success';
                $data['data'] = $this->conn->lastInsertId();
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function update($id, $address, $city, $pincode){
            $sql = $this->conn->prepare("UPDATE `customer_adresses` SET `address`=:address,`city`=:city,`pincode`=:pincode WHERE `id`=:id");
            if($sql->execute([':address'=>$address, ':city'=>$city, ':pincode'=>$pincode, ':id'=>$id])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function delete($id){
            $sql = $this->conn->prepare("DELETE FROM `customer_adresses` WHERE `id`=:id");
            if($sql->execute([':id' => $id])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchAll(){
            $sql = $this->conn->prepare("SELECT * FROM `customer_adresses`");
            if($sql->execute()){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchById($id){
            $sql = $this->conn->prepare("SELECT * FROM `customer_adresses` WHERE `id`=:id");
            if($sql->execute([':id' => $id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchByCustomerId($customer_id){
            $sql = $this->conn->prepare("SELECT * FROM `customer_adresses` WHERE `customer_id`=:customer_id");
            if($sql->execute([':customer_id' => $customer_id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }
    }

    class customerPayments{
        public $id;
        public $customer_id;
        public $payment_date;
        public $mode;
        public $type;
        public $txn_no;
        public $amount;
        public $status;
        public $description;
        public $comments;
        public $ts;
        public $conn;

        public function __construct($db){
            $this->conn = $db;
        }
        
        public function create($customer_id, $payment_date, $mode, $type, $txn_no, $amount, $status, $description, $comments){
            $sql = $this->conn->prepare("INSET into customer_payment (customer_id, payment_date, mode, type, txn_no, amount, status, description, comments) VALUES (:customer_id, :payment_date, :mode, :type, :txn_no, :amount, :status, :description, :comments)");
            if($sql->execute([':customer_id'=>$customer_id, ':payment_date'=>$payment_date, ':mode'=>$mode, ':type'=>$type, ':txn_no'=>$txn_no, ':amount'=>$amount, ':status'=>$status, ':description'=>$description, ':comments'=>$comments])){
                $data['status'] = 'success';
                $data['data'] = $this->conn->lastInsertId();
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function update($id, $customer_id, $payment_date, $mode, $type, $txn_no, $amount, $status, $description, $comments){
            $sql = $this->conn->prepare("UPDATE `customer_payments` SET customer_id=:customer_id, payment_date=:payment_date, mode=:mode, type=:type, txn_no=:txn_no, amount=:amount, status=:status, description=:description, comments=:comments WHERE id=:id");
            if($sql->execute([':id'=>$id, ':customer_id'=>$customer_id, ':payment_date'=>$payment_date, ':mode'=>$mode, ':type'=>$type, ':txn_no'=>$txn_no, ':amount'=>$amount, ':status'=>$status, ':description'=>$description, ':comments'=>$comments])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchAll(){
            $sql = $this->conn->prepare("SELECT * FROM `customer_payments`");
            if($sql->execute()){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchById($id){
            $sql = $this->conn->prepare("SELECT * FROM `customer_payments` WHERE `id`=:id");
            if($sql->execute([':id' => $id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchByCustomerId($customer_id){
            $sql = $this->conn->prepare("SELECT * FROM `customer_payments` WHERE `customer_id`=:customer_id");
            if($sql->execute([':customer_id' => $customer_id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }
    }

    class customerServices{
        public $id;
        public $customer_id;
        public $service_city_id;
        public $sgo_options;
        public $detailed_pricing;
        public $price;
        public $discount;
        public $total_pirce;
        public $start_date;
        public $end_date;
        public $address;
        public $city;
        public $pincode;
        public $status;
        public $ts;
        public $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        public function create($customer_id, $service_city_id, $sgo_options, $detailed_pricing, $price, $discount, $total_pirce, $start_date, $end_date, $address, $city, $pincode, $status){
            $sql = $this->conn->prepare("INSERT INTO `customer_services` (`customer_id`, `service_city_id`, `sgo_options`, `detailed_pricing`, `price`, `discount`, `total_price`, `start_date`, `end_date`, `address`, `city`, `pincode`, `status`) VALUES (:customer_id, :service_city_id, :sgo_options, :detailed_pricing, :price, :discount, :total_price, :start_date, :end_date, :address, :city, :pincode, :status)");
            if($sql->execute([':customer_id' => $customer_id,':service_city_id' => $service_city_id,':sgo_options' => $sgo_options,':detailed_pricing' => $detailed_pricing,':price' => $price,':discount' => $discount,':total_price' => $total_pirce,':start_date' => $start_date,':end_date' => $end_date,':address' => $address,':city' => $city,':pincode' => $pincode,':status' => $status])){
                $data['status'] = 'success';
                $data['data'] = $this->conn->lastInsertId();
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function update($id, $customer_id, $service_city_id, $sgo_options, $detailed_pricing, $price, $discount, $total_pirce, $start_date, $end_date, $address, $city, $pincode, $status){
            $sql = $this->conn->prepare("UPDATE `customer_services` SET customer_id=:customer_id, service_city=:service_city_id, sgo_options=:sgo_options, detailed_pricing=:detailed_pricing, price=:price, discount=:discount, total_price=:total_price, start_date=:start_date, end_date=:end_date, address=:address, city=:city, pincode=:pincode, status=:status WHERE id=:id");
            if($sql->execute([
                ':id' => $id,
                ':customer_id' => $customer_id,
                ':service_city_id' => $service_city_id,
                ':sgo_options' => $sgo_options,
                ':detailed_pricing' => $detailed_pricing,
                ':price' => $price,
                ':discount' => $discount,
                ':total_price' => $total_pirce,
                ':start_date' => $start_date,
                ':end_date' => $end_date,
                ':address' => $address,
                ':city' => $city,
                ':pincode' => $pincode,
                ':status' => $status
            ])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function delete($id){
            $sql = $this->conn->prepare("DELETE FROM `customer_services` WHERE id=:id");
            if($sql->execute([':id' => $id])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;   
        }

        public function fetchAll(){
            $sql = $this->conn->prepare("SELECT * FROM `customer_services`");
            if($sql->execute()){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchById($id){
            $sql = $this->conn->prepare("SELECT * FROM `customer_services` WHERE id=:id");
            if($sql->execute([':id' => $id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchByCustomerId($customer_id){
            $sql = $this->conn->prepare("SELECT * FROM `customer_services` WHERE `customer_id`=:customer_id");
            if($sql->execute([':customer_id' => $customer_id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchByStatus($status){
            $sql = $this->conn->prepare("SELECT * FROM `customer_services` WHERE `status`=:status");
            if($sql->execute([':status' => $status])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }
    }

    class customerSubscription{

        private $conn;
        public $id;
        public $customer_id; 
        public $subscription_id; 
        public $start_date; 
        public $end_date; 
        public $price; 
        public $discount; 
        public $total_price; 
        public $max_replacements; 
        public $replacements_used; 
        public $status; 
        public $ts;
        
        public function __construct($db){
            $this->conn = $db;
        }

        public function create($customer_id, $subscription_id, $start_date, $end_date, $price, $discount, $total_price, $max_replacements, $replacements_used, $status){
            $sql = $this->conn->prepare("INSERT INTO `customer_subscription` (`customer_id`, `subscription_id`, `start_date`, `end_date`, `price`, `discount`, `total_price`, `max_replacements`, `replacements_used`, `status`) VALUES(:customer_id, :subscription_id, :start_date, :end_date, :price, :discount, :total_price, :max_replacements, :replacements_used, :status)");
            if($sql->execute([
                ':customer_id' => $customer_id,
                ':subscription_id' => $subscription_id,
                ':start_date' => $start_date,
                ':end_date' => $end_date,
                ':price' => $price,
                ':discount' => $discount,
                ':total_price' => $total_price,
                ':max_replacements' => $max_replacements,
                ':replacements_used' => $replacements_used,
                ':status' => $status
            ])){
                $data['status'] = 'success';
                $data['data'] = $this->conn->lastInsertId();
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function update($id, $customer_id, $subscription_id, $start_date, $end_date, $price, $discount, $total_price, $max_replacements, $replacements_used, $status){
            $sql = $this->conn->prepare("UPDATE `customer_subscription` SET `customer_id`=:customer_id, `subscription_id`=:subscription_id, `start_date`=:start_date, `end_date`=:end_date, `price`=:price, `discount`=:discount, `total_price`=:total_price, `max_replacements`=:max_replacements, `replacements_used`=:replacements_used, `status`=:status where `id`=:id");
            if($sql->execute([
                ':customer_id' => $customer_id,
                ':subscription_id' => $subscription_id,
                ':start_date' => $start_date,
                ':end_date' => $end_date,
                ':price' => $price,
                ':discount' => $discount,
                ':total_price' => $total_price,
                ':max_replacements' => $max_replacements,
                ':replacements_used' => $replacements_used,
                ':status' => $status,
                ':id' => $id
            ])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchByCustomerId($customer_id){
            $sql = $this->conn->prepare("SELECT * FROM `customer_subscription` WHERE `customer_id`=:customer_id");
            if($sql->execute([':customer_id' => $customer_id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchByCustomerIdandEndDate($customer_id){
            $sql = $this->conn->prepare("SELECT * FROM `customer_subscription` WHERE `customer_id`=:customer_id" . " AND `end_date` > NOW()");
            if($sql->execute([':customer_id' => $customer_id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchById($id){
            $sql = $this->conn->prepare("SELECT * FROM `customer_subscription` WHERE `id`=:id");
            if($sql->execute([':id' => $id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetch(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchBySubscriptionId($subscription_id){
            $sql = $this->conn->prepare("SELECT * FROM `customer_subscription` WHERE `subscription_id`=:subscription_id");
            if($sql->execute([':subscription_id' => $subscription_id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchAll(){
            $sql = $this->conn->prepare("SELECT * FROM `customer_subscription`");
            if($sql->execute()){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchByStatus($status){
            $sql = $this->conn->prepare("SELECT * FROM `customer_subscription` WHERE `status`=:status");
            if($sql->execute([':status' => $status])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function delete($id){
            $sql = $this->conn->prepare("DELETE FROM `customer_subscription` WHERE `id`=:id");
            if($sql->execute([':id' => $id])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

    }

    class worker{
        public $id;
        public $fname; 
        public $mname;
        public $lname;
        public $dob;
        public $gender;
        public $address;
        public $city;
        public $p_address;
        public $p_city;
        public $police_verification;
        public $address_verification;
        public $photoid_verification;
        public $photo;
        public $subscription_id;
        public $end_date;
        public $subscription_status;
        public $status;
        public $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        public function create($fname, $mname, $lname, $dob, $gender, $address, $city, $p_address, $p_city, $police_verification, $address_verification, $photoid_verification, $photo, $subscription_id, $end_date, $subscription_status, $status){
            $sql = $this->conn->prepare("INSERT INTO `worker` (`fname`, `mname`, `lname`, `dob`, `gender`, `address`, `city`, `p_address`, `p_city`, `police_verification`, `address_verification`, `photoid_verification`, `photo`, `subscription_id`, `end_date`, `subscription_status`, `status`) VALUES(:fname, :mname, :lname, :dob, :gender, :address, :city, :p_address, :p_city, :police_verification, :address_verification, :photoid_verification, :photo, :subscription_id, :end_date, :subscription_status, :status)");
            if($sql->execute([':fname'=>$fname, ':mname'=>$mname, ':lname'=>$lname, ':dob'=>$dob, ':gender'=>$gender, ':address'=>$address, ':city'=>$city, ':p_address'=>$p_address, ':p_city'=>$p_city, ':police_verification'=>$police_verification, ':address_verification'=>$address_verification, ':photoid_verification'=>$photoid_verification, ':photo'=>$photo, ':subscription_id'=>$subscription_id, ':end_date'=>$end_date, ':subscription_status'=>$subscription_status, ':status'=>$status])){
                $data['status'] = 'success';
                $data['data'] = $this->conn->lastInsertId();
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function update($id, $fname, $mname, $lname, $dob, $gender, $address, $city, $p_address, $p_city, $police_verification, $address_verification, $photoid_verification, $photo, $subscription_id, $end_date, $subscription_status, $status){
            $sql = $this->conn->prepare("UPDATE `worker` SET `fname`=:fname, `mname`=:mname, `lname`=:lname, `dob`=:dob, `gender`=:gender, `address`=:address, `city`=:city, `p_address`=:p_address, `p_city`=:p_city, `police_verification`=:police_verification, `address_verification`=:address_verification, `photoid_verification`=:photoid_verification, `photo`=:photo, `subscription_id`=:subscription_id, `end_date`=:end_date, `subscription_status`=:subscription_status, `status`=:status, where `id`=:id");
            if($sql->execute([':fname'=>$fname, ':mname'=>$mname, ':lname'=>$lname, ':dob'=>$dob, ':gender'=>$gender, ':address'=>$address, ':city'=>$city, ':p_address'=>$p_address, ':p_city'=>$p_city, ':police_verification'=>$police_verification, ':address_verification'=>$address_verification, ':photoid_verification'=>$photoid_verification, ':photo'=>$photo, ':subscription_id'=>$subscription_id, ':end_date'=>$end_date, ':subscription_status'=>$subscription_status, ':status'=>$status, ':id'=>$id])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
        }

        public function delete($id){
            $sql = $this->conn->prepare("DELETE FROM `worker` WHERE `id`=:id");
            if($sql->execute([':id'=>$id])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchAll(){
            $sql = $this->conn->prepare("SELECT * FROM `worker`");
            if($sql->execute()){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchById($id){
            $sql = $this->conn->prepare("SELECT * FROM `worker` WHERE `id`=:id");
            if($sql->execute([':id'=>$id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetch(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchBySubscriptionId($subscription_id){
            $sql = $this->conn->prepare("SELECT * FROM `worker` WHERE `subscription_id`=:subscription_id");
            if($sql->execute([':subscription_id'=>$subscription_id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchBySubscriptionStatus($subscription_status){
            $sql = $this->conn->prepare("SELECT * FROM `worker` WHERE `subscription_status`=:subscription_status");
            if($sql->execute([':subscription_status'=>$subscription_status])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }
    }

    class workerSubscriptionPlan{
        public $conn;
        public $id;
        public $name;
        public $city_id;
        public $duration;
        public $price;
        public $servcies;
        public $status;
        
        public function __construct($db){
            $this->conn = $db;
        }

        public function create($name, $city_id, $duration, $price, $servcies, $status){
            $sql = $this->conn->prepare("INSERT INTO `worker_subscription_plan`(`name`, `city_id`, `duration`, `price`, `services`, `status`) VALUES (:name, :city_id, :duration, :price, :servcies, :status)");
            if($sql->execute([':name'=>$name, ':city_id'=>$city_id, ':duration'=>$duration, ':price'=>$price, ':servcies'=>$servcies, ':status'=>$status])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function update($id, $name, $city_id, $duration, $price, $servcies, $status){
            $sql = $this->conn->prepare("UPDATE `worker_subscription_plan` SET `name`=:name, `city_id`=:city_id, `duration`=:duration, `price`=:price, `services`=:servcies, `status`=:status WHERE `id`=:id");
            if($sql->execute([':name'=>$name, ':city_id'=>$city_id, ':duration'=>$duration, ':price'=>$price, ':servcies'=>$servcies, ':status'=>$status, ':id'=>$id])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function delete($id){
            $sql = $this->conn->prepare("DELETE FROM `worker_subscription_plan` WHERE `id`=:id");
            if($sql->execute([':id'=>$id])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchAll(){
            $sql = $this->conn->prepare("SELECT * FROM `worker_subscription_plan`");
            if($sql->execute()){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchById($id){
            $sql = $this->conn->prepare("SELECT * FROM `worker_subscription_plan` WHERE `id`=:id");
            if($sql->execute([':id'=>$id])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetch(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function fetchByServices($service){
            $sql = $this->conn->prepare("SELECT * FROM `worker_subscription_plan` WHERE find_in_set(:services, `services`)");
            if($sql->execute([':servcies'=>$service])){
                if($sql->rowCount() > 0){
                    $data['status'] = 'success';
                    $data['data'] = $sql->fetchAll(PDO::FETCH_ASSOC);
                }
                else{
                    $data['status'] = 'No Data';
                }
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }

        public function changeStatus($id, $status){
            $sql = $this->conn->prepare("UPDATE `worker_subscription_plan` SET `status`=:status WHERE `id`=:id");
            if($sql->execute([':id'=>$id,':status'=>$status])){
                $data['status'] = 'success';
            }
            else{
                $data['status'] = 'failure';
            }
            return $data;
        }
    }
?>