<?php

/**



 * LoginForm class.



 * LoginForm is the data structure for keeping



 * user login form data. It is used by the 'login' action of 'SiteController'.



 */

class Oauth extends CFormModel {

	public $init_sql;

	public $password;

	public $rememberMe;

	private $_identity;

	private $client_user;

	/**



	 * Declares the validation rules.



	 * The rules state that username and password are required,



	 * and password needs to be authenticated.



	 */

	public function rules() {

		return array(

			// username and password are required

			array('username, password', 'required'),

			// rememberMe needs to be a boolean

			array('rememberMe', 'boolean'),

			// password needs to be authenticated

			array('password', 'authenticate'),

		);

	}

	/**



	 * Declares attribute labels.



	 */

	public function attributeLabels() {

		return array(

			'rememberMe' => 'Remember me next time',

		);

	}

	public function init() {
		$this->client_user = array();
	}

	//init database

	public function init_database($server, $username, $password) {

		mysql_connect($server, $username, $password);

		if (mysql_errno()) {

			die(' Error ' . mysql_errno() . ': ' . mysql_error());

		}

		mysql_select_db('wangrunxin');

		$sql = "# Datamodel for OAuthStoreMySQL

            #

            # You need to add the foreign key constraints for the user ids your are using.

            # I have commented the constraints out, just look for 'usa_id_ref' to enable them.

            #

            # The --SPLIT-- markers are used by the install.php script

            #

            # @version Id: mysql.sql 148 2010-08-18 19:06:00Z brunobg@corollarium.com

            # @author Marc Worrell

            #



            # Changes:

            #

            # 2010-07-22

            #			ALTER TABLE oauth_consumer_registry DROP INDEX ocr_consumer_key;

            #			ALTER TABLE oauth_consumer_registry ADD UNIQUE ocr_consumer_key(ocr_consumer_key,ocr_usa_id_ref,ocr_server_uri)

            #

            # 2010-04-20 (on 103 and 110)

            #           ALTER TABLE oauth_consumer_registry MODIFY ocr_consumer_key varchar(128) binary not null;

            #           ALTER TABLE oauth_consumer_registry MODIFY ocr_consumer_secret varchar(128) binary not null;

            #

            # 2010-04-20 (on 103 and 110)

            # 			ALTER TABLE oauth_server_token ADD ost_verifier char(10);

            # 			ALTER TABLE oauth_server_token ADD ost_callback_url varchar(512);

            #

            # 2008-10-15 (on r48) Added ttl to consumer and server tokens, added named server tokens

            #

            #			ALTER TABLE oauth_server_token

            #			ADD ost_token_ttl datetime not null default '9999-12-31',

            #			ADD KEY (ost_token_ttl);

            #

            #			ALTER TABLE oauth_consumer_token

            #			ADD oct_name varchar(64) binary not null default '',

            #			ADD oct_token_ttl datetime not null default '9999-12-31',

            #			DROP KEY oct_usa_id_ref,

            #			ADD UNIQUE KEY (oct_usa_id_ref, oct_ocr_id_ref, oct_token_type, oct_name),

            #			ADD KEY (oct_token_ttl);

            #

            # 2008-09-09 (on r5) Added referrer host to server access token

            #

            #			ALTER TABLE oauth_server_token ADD ost_referrer_host VARCHAR(128) NOT NULL;

            #





            #

            # Log table to hold all OAuth request when you enabled logging

            #



            CREATE TABLE IF NOT EXISTS oauth_log (

                                                  olg_id                  int(11) not null auto_increment,

                                                  olg_osr_consumer_key    varchar(64) binary,

                                                  olg_ost_token           varchar(64) binary,

                                                  olg_ocr_consumer_key    varchar(64) binary,

                                                  olg_oct_token           varchar(64) binary,

                                                  olg_usa_id_ref          int(11),

                                                  olg_received            text not null,

                                                  olg_sent                text not null,

                                                  olg_base_string         text not null,

                                                  olg_notes               text not null,

                                                  olg_timestamp           timestamp not null default current_timestamp,

                                                  olg_remote_ip           bigint not null,



                                                  primary key (olg_id),

                                                  key (olg_osr_consumer_key, olg_id),

                                                  key (olg_ost_token, olg_id),

                                                  key (olg_ocr_consumer_key, olg_id),

                                                  key (olg_oct_token, olg_id),

                                                  key (olg_usa_id_ref, olg_id)



                                                  #   , foreign key (olg_usa_id_ref) references any_user_auth (usa_id_ref)

                                                  #       on update cascade

                                                  #       on delete cascade

                                                  ) engine=InnoDB default charset=utf8;



            #--SPLIT--



            #

            # /////////////////// CONSUMER SIDE ///////////////////

            #



            # This is a registry of all consumer codes we got from other servers

            # The consumer_key/secret is obtained from the server

            # We also register the server uri, so that we can find the consumer key and secret

            # for a certain server.  From that server we can check if we have a token for a

            # particular user.



            CREATE TABLE IF NOT EXISTS oauth_consumer_registry (

                                                                ocr_id                  int(11) not null auto_increment,

                                                                ocr_usa_id_ref          int(11),

                                                                ocr_consumer_key        varchar(128) binary not null,

                                                                ocr_consumer_secret     varchar(128) binary not null,

                                                                ocr_signature_methods   varchar(255) not null default 'HMAC-SHA1,PLAINTEXT',

                                                                ocr_server_uri          varchar(255) not null,

                                                                ocr_server_uri_host     varchar(128) not null,

                                                                ocr_server_uri_path     varchar(128) binary not null,



                                                                ocr_request_token_uri   varchar(255) not null,

                                                                ocr_authorize_uri       varchar(255) not null,

                                                                ocr_access_token_uri    varchar(255) not null,

                                                                ocr_timestamp           timestamp not null default current_timestamp,



                                                                primary key (ocr_id),

                                                                unique key (ocr_consumer_key, ocr_usa_id_ref, ocr_server_uri),

                                                                key (ocr_server_uri),

                                                                key (ocr_server_uri_host, ocr_server_uri_path),

                                                                key (ocr_usa_id_ref)



                                                                #   , foreign key (ocr_usa_id_ref) references any_user_auth(usa_id_ref)

                                                                #       on update cascade

                                                                #       on delete set null

                                                                ) engine=InnoDB default charset=utf8;



            #--SPLIT--



            # Table used to sign requests for sending to a server by the consumer

            # The key is defined for a particular user.  Only one single named

            # key is allowed per user/server combination



            CREATE TABLE IF NOT EXISTS oauth_consumer_token (

                                                             oct_id                  int(11) not null auto_increment,

                                                             oct_ocr_id_ref          int(11) not null,

                                                             oct_usa_id_ref          int(11) not null,

                                                             oct_name                varchar(64) binary not null default '',

                                                             oct_token               varchar(64) binary not null,

                                                             oct_token_secret        varchar(64) binary not null,

                                                             oct_token_type          enum('request','authorized','access'),

                                                             oct_token_ttl           datetime not null default '9999-12-31',

                                                             oct_timestamp           timestamp not null default current_timestamp,



                                                             primary key (oct_id),

                                                             unique key (oct_ocr_id_ref, oct_token),

                                                             unique key (oct_usa_id_ref, oct_ocr_id_ref, oct_token_type, oct_name),

                                                             key (oct_token_ttl),



                                                             foreign key (oct_ocr_id_ref) references oauth_consumer_registry (ocr_id)

                                                             on update cascade

                                                             on delete cascade



                                                             #   , foreign key (oct_usa_id_ref) references any_user_auth (usa_id_ref)

                                                             #       on update cascade

                                                             #       on delete cascade

                                                             ) engine=InnoDB default charset=utf8;



            #--SPLIT--





            #

            # ////////////////// SERVER SIDE /////////////////

            #



            # Table holding consumer key/secret combos an user issued to consumers.

            # Used for verification of incoming requests.



            CREATE TABLE IF NOT EXISTS oauth_server_registry (

                                                              osr_id                      int(11) not null auto_increment,

                                                              osr_usa_id_ref              int(11),

                                                              osr_consumer_key            varchar(64) binary not null,

                                                              osr_consumer_secret         varchar(64) binary not null,

                                                              osr_enabled                 tinyint(1) not null default '1',

                                                              osr_status                  varchar(16) not null,

                                                              osr_requester_name          varchar(64) not null,

                                                              osr_requester_email         varchar(64) not null,

                                                              osr_callback_uri            varchar(255) not null,

                                                              osr_application_uri         varchar(255) not null,

                                                              osr_application_title       varchar(80) not null,

                                                              osr_application_descr       text not null,

                                                              osr_application_notes       text not null,

                                                              osr_application_type        varchar(20) not null,

                                                              osr_application_commercial  tinyint(1) not null default '0',

                                                              osr_issue_date              datetime not null,

                                                              osr_timestamp               timestamp not null default current_timestamp,



                                                              primary key (osr_id),

                                                              unique key (osr_consumer_key),

                                                              key (osr_usa_id_ref)



                                                              #   , foreign key (osr_usa_id_ref) references any_user_auth(usa_id_ref)

                                                              #       on update cascade

                                                              #       on delete set null

                                                              ) engine=InnoDB default charset=utf8;



            #--SPLIT--



            # Nonce used by a certain consumer, every used nonce should be unique, this prevents

            # replaying attacks.  We need to store all timestamp/nonce combinations for the

            # maximum timestamp received.



            CREATE TABLE IF NOT EXISTS oauth_server_nonce (

                                                           osn_id                  int(11) not null auto_increment,

                                                           osn_consumer_key        varchar(64) binary not null,

                                                           osn_token               varchar(64) binary not null,

                                                           osn_timestamp           bigint not null,

                                                           osn_nonce               varchar(80) binary not null,



                                                           primary key (osn_id),

                                                           unique key (osn_consumer_key, osn_token, osn_timestamp, osn_nonce)

                                                           ) engine=InnoDB default charset=utf8;



            #--SPLIT--



            # Table used to verify signed requests sent to a server by the consumer

            # When the verification is succesful then the associated user id is returned.



            CREATE TABLE IF NOT EXISTS oauth_server_token (

                                                           ost_id                  int(11) not null auto_increment,

                                                           ost_osr_id_ref          int(11) not null,

                                                           ost_usa_id_ref          int(11) not null,

                                                           ost_token               varchar(64) binary not null,

                                                           ost_token_secret        varchar(64) binary not null,

                                                           ost_token_type          enum('request','access'),

                                                           ost_authorized          tinyint(1) not null default '0',

                                                           ost_referrer_host       varchar(128) not null,

                                                           ost_token_ttl           datetime not null default '9999-12-31',

                                                           ost_timestamp           timestamp not null default current_timestamp,

                                                           ost_verifier            char(10),

                                                           ost_callback_url        varchar(512),



                                                           primary key (ost_id),

                                                           unique key (ost_token),

                                                           key (ost_osr_id_ref),

                                                           key (ost_token_ttl),



                                                           foreign key (ost_osr_id_ref) references oauth_server_registry (osr_id)

                                                           on update cascade

                                                           on delete cascade



                                                           #   , foreign key (ost_usa_id_ref) references any_user_auth (usa_id_ref)

                                                           #       on update cascade

                                                           #       on delete cascade

                                                           ) engine=InnoDB default charset=utf8;







            ";

		$ps = explode('#--SPLIT--', $sql);

		foreach ($ps as $p) {

			$p = preg_replace('/^\s*#.*$/m', '', $p);

			echo "install()->" . $p . "</br></br>";

			mysql_query($p);

			if (mysql_errno()) {

				die(' Error ' . mysql_errno() . ': ' . mysql_error());

			}

		}

		echo "install successfully.";

	}

	public function authenticate($attribute, $params) {

		$this->_identity = new UserIdentity($this->username, $this->password);

		if (!$this->_identity->authenticate()) {
			$this->addError('password', 'Incorrect username or password.');
		}

	}

	public function addServiceProvider() {

	}

	public function getKeys($name = null) {

		include 'Oauth/config.inc.php';
		include_once 'Oauth/oauth-php/library/OAuthStore.php';

		if (!Yii::app()->authorize->check(authorize_helper::GET_OAUTH_KEYS)) {
			Logger::log("get_keys", "no access");
			return null;
		}
		$store = OAuthStore::instance('MySQL', $dbOptions);

		$sql = 'select * from oauth_server_registry where osr_usa_id_ref = "' . Yii::app()->user->getModel("wrx_id") . '"';
		$result = $store->sql_query($sql);

		if (count($result) == 0) {
			Logger::log("get_keys", "no keys found");
			return null;
		} else {
			Logger::log("get_keys", print_r($result[0], true));
			if ($name == "key") {
				return $result[0]['osr_consumer_key'];
			}

			if ($name == "secret") {
				return $result[0]['osr_consumer_secret'];
			}

			return array('key' => $result[0]['osr_consumer_key'], 'secret' => $result[0]['osr_consumer_secret']);
		}
	}

	public function getKeysForce($id, $name = "all") {

		include 'Oauth/config.inc.php';
		include_once 'Oauth/oauth-php/library/OAuthStore.php';

		$store = OAuthStore::instance('MySQL', $dbOptions);

		$sql = 'select * from oauth_server_registry where osr_usa_id_ref = "' . $id . '"';
		$result = $store->sql_query($sql);

		if (count($result) == 0) {
			Logger::log("get_keys", "no keys found");
			return null;
		} else {
			Logger::log("get_keys", print_r($result[0], true));
			if ($name == "key") {
				return $result[0]['osr_consumer_key'];
			}

			if ($name == "secret") {
				return $result[0]['osr_consumer_secret'];
			}

			return array('key' => $result[0]['osr_consumer_key'], 'secret' => $result[0]['osr_consumer_secret']);
		}
	}

	public function generateKey() {

		if (!Yii::app()->authorize->check(authorize_helper::GENERATE_OAUTH_KEYS)) {
			if (Yii::app()->authorize->check(authorize_helper::GET_OAUTH_KEYS)) {
				return self::getKeys();
			} else {
				return null;
			}
		} else {

			$user_id = Yii::app()->user->getModel("wrx_id");

			// 来自用户表单

			$consumer = array(

				// 下面两项必填

				'requester_name' => Yii::app()->user->getModel("wrx_username"),

				'requester_email' => Yii::app()->user->getModel("wrx_username"),

				// // 以下均为可选

				// 'callback_uri'           =&gt; 'http://www.demo.com/oauth_callback',

				// 'application_uri'        =&gt; 'http://www.demo.com/',

				// 'application_title'      =&gt; 'Online Printer',

				// 'application_descr'      =&gt; 'Online Print Your Photoes',

				// 'application_notes'      =&gt; 'Online Printer',

				// 'application_type'       =&gt; 'website',

				// 'application_commercial' =&gt; 0

			);

			include 'Oauth/config.inc.php';

			include_once 'Oauth/oauth-php/library/OAuthStore.php';

			// 注册消费方

			$store = OAuthStore::instance('MySQL', $dbOptions);

			$key = $store->updateConsumer($consumer, $user_id);

			// 获取消费方信息

			$consumer = $store->getConsumer($key, $user_id);

			// 消费方注册后得到的 App Key 和 App Secret

			$consumer_id = $consumer['id'];

			$consumer_key = $consumer['consumer_key'];

			$consumer_secret = $consumer['consumer_secret'];

			$array = array();

			$array['key'] = $consumer_key;

			$array['Secret'] = $consumer_secret;

			//update server;

			$store = OAuthStore::instance('MySQL', $dbOptions);

			$user_id = Yii::app()->user->getModel("wrx_id");

			$server = array(

				'consumer_key' => $consumer_key,

				'consumer_secret' => $consumer_secret,

				'server_uri' => '',

				'signature_methods' => array('HMAC-SHA1', 'PLAINTEXT'),

				'request_token_uri' => 'http://www.tongchengchina.com/interface/Requesttoken',

				'authorize_uri' => 'http://www.tongchengchina.com/Oauth/authorize.php',

				'access_token_uri' => 'http://www.tongchengchina.com/Oauth/access_token.php',

			);

			$consumer_key = $store->updateServer($server, $user_id);

			//update user;

			$user = Yii::app()->user->setDBuser("main_user_general_app_keys", "1");

			return $array;

		}

	}

	public function generateUnauthorizedToken($consumer_key) {

		if (!Yii::app()->authorize->check(authorize_helper::GENERATE_TOKEN)) {
			return null;
		} else {

			Logger::log("OAUTH-generateUnauthorizedToken", "Pass Access Check");

			include 'Oauth/config.inc.php';

			include_once 'Oauth/oauth-php/library/OAuthStore.php';

			include_once 'Oauth/oauth-php/library/OAuthRequester.php';

			$store = OAuthStore::instance('MySQL', $dbOptions);

			// end-user-id 用户Id, 必须为整型

			$user_id = Yii::app()->user->getModel("wrx_id");

			Logger::log("OAUTH-generateUnauthorizedToken", "Server Id: " . $user_id);

			// 从服务器获取未授权的token

			try {

				$token = OAuthRequester::requestRequestToken($consumer_key, $user_id);

				Logger::log("OAUTH-generateUnauthorizedToken", "Token: " . print_r($token, true));

				return $token;

				//header('Location: ' . $token['authorize_uri'] . "?oauth_token=" . $token['token'] . "&oauth_consumer_key=" . $consumer_key);

				//echo "<a href='".$token['authorize_uri']."?oauth_token=".$token['token']."&oauth_consumer_key=".$consumer_key."'>test</a>";

			} catch (Exception $e) {

				Logger::log("OAUTH-generateUnauthorizedToken", "Error: " . print_r($e, true));
			}
		}
	}

	public function requestToken() {

		include_once 'Oauth/config.inc.php';

		include_once 'Oauth/oauth-php/library/OAuthStore.php';

		include_once 'Oauth/oauth-php/library/OAuthServer.php';

		$store = OAuthStore::instance('MySQL', $dbOptions);

		$server = new OAuthServer();

		$server->requestToken();

		exit();

	}

	public function authorizedServer($token) {

		if (session_id() == "") {
			session_start();
		}

		include 'Oauth/config.inc.php';

		include_once 'Oauth/oauth-php/library/OAuthStore.php';

		include_once 'Oauth/oauth-php/library/OAuthServer.php';

		//登陆用户

		$user_id = Yii::app()->user->getModel("wrx_id");

		// 取得 oauth store 和 oauth server 对象

		$store = OAuthStore::instance('MySQL', $dbOptions);

		$server = new OAuthServer();

		$server->setParam("oauth_token", $token);

		try

		{

			// 检查当前请求中是否包含一个合法的请求token

			// 返回一个数组, 包含consumer key, consumer secret, token, token secret 和 token type.

			$rs = $server->authorizeVerify();

			// print_r($rs);

			// exit;

			if ($_SERVER['REQUEST_METHOD'] == 'POST' || true) {

				// 判断用户是否点击了 "allow" 按钮(或者你可以自定义为其他标识)

				$authorized = array_key_exists('allow', $_POST);

				$authorized = true;

				// 设置token的认证状态(已经被认证或者尚未认证)

				// 如果存在 oauth_callback 参数, 重定向到客户(消费方)地址

				$reuslt = $server->authorizeFinish($authorized, $user_id);

				// 如果没有 oauth_callback 参数, 显示认证结果

				// ** 你的代码 **

				$url = explode("?", 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER["REQUEST_URI"]);

				$url = $url[0];

				$request_parameters[0] = $rs['consumer_secret'];

				$request_parameters[1] = $rs['token_secret'];

				$request_parameters[2] = "request";

				$shorttime = time();

				$str = $this->getRandChar(32);

				$base = "GET&" . urlencode($url) . "&" . urlencode("oauth_consumer_key=" . $rs['consumer_key'] . "&oauth_nonce=" . $str . "&oauth_signature_method=HMAC-SHA1&oauth_timestamp=" . $shorttime . "&oauth_token=" . $rs['token']);

				$key = urlencode($rs['consumer_secret']) . '&' . urlencode($rs['token_secret']);

				$data = $this->signature($key, $base, $rs['consumer_secret'], $rs['token_secret']);

				$request_data = array('base_string' => $base,
					'consumer_secret' => $rs['consumer_secret'],
					'token_secret' => $rs['token_secret'],
					'signature' => $data,
				);
				Logger::log("send data", print_r($request_data, true));

				$post_data = array();

				//$post_data['oauth_signature'] = $data;

				$post_data['oauth_consumer_key'] = $rs['consumer_key'];

				$post_data['oauth_signature_method'] = 'HMAC-SHA1';

				$post_data['oauth_token'] = $rs['token'];

				$post_data['oauth_timestamp'] = $shorttime;

				$post_data['oauth_nonce'] = $str;

				$user_id = 1;

				try

				{

					$store = OAuthStore::instance('MySQL', $dbOptions);

					$server = new OAuthServer();

					$server->setParam('oauth_signature', $data);

					$server->setParam('oauth_consumer_key', $rs['consumer_key']);

					$server->setParam('oauth_signature_method', 'HMAC-SHA1');

					$server->setParam('oauth_token', $rs['token']);

					$server->setParam('oauth_timestamp', $shorttime);

					$server->setParam('consumer_secret', $rs['consumer_secret'] . ";" . $rs['consumer_key']);

					$server->setParam('oauth_nonce', $str);

					$data = $server->accessToken(false);

					return $data;

				} catch (OAuthException $e) {

					// 请求中没有包含token, 显示一个使用户可以输入token以进行验证的页面

					// ** 你的代码 **

				}

			} else {

				echo 'Error';

			}

		} catch (OAuthException $e) {

			// 请求中没有包含token, 显示一个使用户可以输入token以进行验证的页面

			// ** 你的代码 **

		}

	}

	public function signature($key, $base_string, $consumer_secret, $token_secret) {

		if (function_exists('hash_hmac')) {

			$signature = base64_encode(hash_hmac("sha1", $base_string, $key, true));

		} else {

			$blocksize = 64;

			$hashfunc = 'sha1';

			if (strlen($key) > $blocksize) {

				$key = pack('H*', $hashfunc($key));

			}

			$key = str_pad($key, $blocksize, chr(0x00));

			$ipad = str_repeat(chr(0x36), $blocksize);

			$opad = str_repeat(chr(0x5c), $blocksize);

			$hmac = pack(

				'H*', $hashfunc(

					($key ^ $opad) . pack(

						'H*', $hashfunc(

							($key ^ $ipad) . $base_string

						)

					)

				)

			);

			$signature = base64_encode($hmac);

		}

		return $signature;

	}

	public function getRandChar($length) {

		$str = null;

		$strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";

		$max = strlen($strPol) - 1;

		for ($i = 0; $i < $length; $i++) {

			$str .= $strPol[rand(0, $max)]; //rand($min,$max)生成介于min和max两个数之间的一个随机整数

		}

		return $str;

	}

	public function responseAccess($token, $key) {
		$keys = self::getKeys();
		if (md5($token . $keys['secret']) == $key) {
			if (self::checkAccessToken($keys['key'], $keys['secret'], $token)) {
				return true;
			} else {
				return false;
			}
		} else {
			return null;
		}
	}

	public function checkAccessToken($key, $secret, $access_token) {

		Logger::log("OAUTH_CHECK_ACCESSTOKEN", "START");
		$token = explode("WRX_OAUTH", $access_token);

		include 'Oauth/config.inc.php';
		include_once 'Oauth/oauth-php/library/OAuthStore.php';

		$store = OAuthStore::instance('MySQL', $dbOptions);
		$sql = 'select * from oauth_server_token where ost_token = "' . $token[1] . '"';
		$result = $store->sql_query($sql);

		if (count($result) == 0) {
			return null;
		} else {
			$token_secret = $result[0]['ost_token_secret'];
			$client_id = $result[0]['ost_authorized'];
			$type = $result[0]['ost_token_type'];
			$ttl = $result[0]['ost_token_ttl'];
		}

		Logger::log("oauth_signature", "token_secret: " . $token_secret);
		Logger::log("oauth_signature", "secret: " . $secret);
		Logger::log("oauth_signature", "key: " . $key);

		$key = md5($key . $secret . $token[1]);
		$accessToken = base64_encode(md5($key . $token_secret)) . "WRX_OAUTH" . $token[1];
		if ($access_token === $accessToken) {
			Logger::log("oauth_signature", "pass, user id: " . $client_id);
			$user = R::load('main_user_general', $client_id);
			if ($user == null) {
				Logger::log("oauth_signature", "can't find user");
				return false;
			}
			$user = R::exportAll($user);
			$this->client_user[$access_token] = $user;
			return true;
		} else {
			Logger::log("oauth_signature", "fail");
			Logger::log("oauth_signature", "get str: " . $access_token);
			Logger::log("oauth_signature", "encrypt: " . $accessToken);
			return false;
		}
	}

	public function get_client_user($access_token) {
		if (isset($this->client_user[$access_token])) {
			return $this->client_user[$access_token];
		} else {
			return null;
		}
	}
}

?>