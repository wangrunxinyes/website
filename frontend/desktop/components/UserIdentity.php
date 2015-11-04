<?php

/**







 * UserIdentity represents the data needed to identity a user.







 * It contains the authentication method that checks if the provided







 * data can identity the user.







 */

class UserIdentity extends CUserIdentity {

	private $_id;

	private $_model;

	/**







	 * Authenticates a user.







	 * @return boolean whether authentication succeeds.







	 */

	public function validatePassword($password) {

		if ($password == null || $password == "") {

			return false;

		}

		if ($this->password === $password) {

			return true;

		}

		return false;

	}

	public function authenticate() {

		return false;

	}

	public function authenticateWithUser($user) {

		Logger::log("login", "login user: " . $user->main_user_general_uname

			. " and password: " . $this->password . "; key: " . $user->main_user_general_psw);

		if ($user === null) {

			$this->errorCode = self::ERROR_USERNAME_INVALID;

		} else if (!self::validatePassword($user->main_user_general_psw)) {

			$this->errorCode = self::ERROR_PASSWORD_INVALID;

		} else {

			$this->_id = $user->id;

			$this->username = $user->main_user_general_uname;

			$this->_model = wrx_model_user::create($user);

			$this->errorCode = self::ERROR_NONE;

		}

		return $this->errorCode == self::ERROR_NONE;

	}

	/**







	 * @return integer the ID of the user record







	 */

	public function getId() {

		return $this->_id;

	}

	public function getUsername() {

		return $this->username;

	}

	public function getUserModel() {

		return $this->_model;

	}

}