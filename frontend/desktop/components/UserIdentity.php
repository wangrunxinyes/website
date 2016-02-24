<?php

class UserIdentity extends CUserIdentity {

	private $_id;

	private $_model;

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

		Logger::log("login", "login user: " . $user->getValue('wrx_username')

			. " and password: " . $this->password . "; key: " . $user->getValue('wrx_password'));

		if ($user === null) {

			$this->errorCode = self::ERROR_USERNAME_INVALID;

		} else if (!self::validatePassword($user->getValue('wrx_password'))) {

			$this->errorCode = self::ERROR_PASSWORD_INVALID;

		} else {

			$this->_id = $user->getValue('id');

			$this->username = $user->getValue('wrx_username');

			$this->_model = $user;

			$this->errorCode = self::ERROR_NONE;

		}

		return $this->errorCode == self::ERROR_NONE;

	}

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