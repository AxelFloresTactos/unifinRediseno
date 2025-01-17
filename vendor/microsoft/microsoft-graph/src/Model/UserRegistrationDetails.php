<?php
/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* UserRegistrationDetails File
* PHP version 7
*
* @category  Library
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
namespace Microsoft\Graph\Model;

/**
* UserRegistrationDetails class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class UserRegistrationDetails extends Entity
{
    /**
    * Gets the isAdmin
    *
    * @return bool|null The isAdmin
    */
    public function getIsAdmin()
    {
        if (array_key_exists("isAdmin", $this->_propDict)) {
            return $this->_propDict["isAdmin"];
        } else {
            return null;
        }
    }

    /**
    * Sets the isAdmin
    *
    * @param bool $val The isAdmin
    *
    * @return UserRegistrationDetails
    */
    public function setIsAdmin($val)
    {
        $this->_propDict["isAdmin"] = boolval($val);
        return $this;
    }

    /**
    * Gets the isMfaCapable
    *
    * @return bool|null The isMfaCapable
    */
    public function getIsMfaCapable()
    {
        if (array_key_exists("isMfaCapable", $this->_propDict)) {
            return $this->_propDict["isMfaCapable"];
        } else {
            return null;
        }
    }

    /**
    * Sets the isMfaCapable
    *
    * @param bool $val The isMfaCapable
    *
    * @return UserRegistrationDetails
    */
    public function setIsMfaCapable($val)
    {
        $this->_propDict["isMfaCapable"] = boolval($val);
        return $this;
    }

    /**
    * Gets the isMfaRegistered
    *
    * @return bool|null The isMfaRegistered
    */
    public function getIsMfaRegistered()
    {
        if (array_key_exists("isMfaRegistered", $this->_propDict)) {
            return $this->_propDict["isMfaRegistered"];
        } else {
            return null;
        }
    }

    /**
    * Sets the isMfaRegistered
    *
    * @param bool $val The isMfaRegistered
    *
    * @return UserRegistrationDetails
    */
    public function setIsMfaRegistered($val)
    {
        $this->_propDict["isMfaRegistered"] = boolval($val);
        return $this;
    }

    /**
    * Gets the isPasswordlessCapable
    *
    * @return bool|null The isPasswordlessCapable
    */
    public function getIsPasswordlessCapable()
    {
        if (array_key_exists("isPasswordlessCapable", $this->_propDict)) {
            return $this->_propDict["isPasswordlessCapable"];
        } else {
            return null;
        }
    }

    /**
    * Sets the isPasswordlessCapable
    *
    * @param bool $val The isPasswordlessCapable
    *
    * @return UserRegistrationDetails
    */
    public function setIsPasswordlessCapable($val)
    {
        $this->_propDict["isPasswordlessCapable"] = boolval($val);
        return $this;
    }

    /**
    * Gets the isSsprCapable
    *
    * @return bool|null The isSsprCapable
    */
    public function getIsSsprCapable()
    {
        if (array_key_exists("isSsprCapable", $this->_propDict)) {
            return $this->_propDict["isSsprCapable"];
        } else {
            return null;
        }
    }

    /**
    * Sets the isSsprCapable
    *
    * @param bool $val The isSsprCapable
    *
    * @return UserRegistrationDetails
    */
    public function setIsSsprCapable($val)
    {
        $this->_propDict["isSsprCapable"] = boolval($val);
        return $this;
    }

    /**
    * Gets the isSsprEnabled
    *
    * @return bool|null The isSsprEnabled
    */
    public function getIsSsprEnabled()
    {
        if (array_key_exists("isSsprEnabled", $this->_propDict)) {
            return $this->_propDict["isSsprEnabled"];
        } else {
            return null;
        }
    }

    /**
    * Sets the isSsprEnabled
    *
    * @param bool $val The isSsprEnabled
    *
    * @return UserRegistrationDetails
    */
    public function setIsSsprEnabled($val)
    {
        $this->_propDict["isSsprEnabled"] = boolval($val);
        return $this;
    }

    /**
    * Gets the isSsprRegistered
    *
    * @return bool|null The isSsprRegistered
    */
    public function getIsSsprRegistered()
    {
        if (array_key_exists("isSsprRegistered", $this->_propDict)) {
            return $this->_propDict["isSsprRegistered"];
        } else {
            return null;
        }
    }

    /**
    * Sets the isSsprRegistered
    *
    * @param bool $val The isSsprRegistered
    *
    * @return UserRegistrationDetails
    */
    public function setIsSsprRegistered($val)
    {
        $this->_propDict["isSsprRegistered"] = boolval($val);
        return $this;
    }

    /**
    * Gets the isSystemPreferredAuthenticationMethodEnabled
    *
    * @return bool|null The isSystemPreferredAuthenticationMethodEnabled
    */
    public function getIsSystemPreferredAuthenticationMethodEnabled()
    {
        if (array_key_exists("isSystemPreferredAuthenticationMethodEnabled", $this->_propDict)) {
            return $this->_propDict["isSystemPreferredAuthenticationMethodEnabled"];
        } else {
            return null;
        }
    }

    /**
    * Sets the isSystemPreferredAuthenticationMethodEnabled
    *
    * @param bool $val The isSystemPreferredAuthenticationMethodEnabled
    *
    * @return UserRegistrationDetails
    */
    public function setIsSystemPreferredAuthenticationMethodEnabled($val)
    {
        $this->_propDict["isSystemPreferredAuthenticationMethodEnabled"] = boolval($val);
        return $this;
    }

    /**
    * Gets the lastUpdatedDateTime
    *
    * @return \DateTime|null The lastUpdatedDateTime
    */
    public function getLastUpdatedDateTime()
    {
        if (array_key_exists("lastUpdatedDateTime", $this->_propDict)) {
            if (is_a($this->_propDict["lastUpdatedDateTime"], "\DateTime") || is_null($this->_propDict["lastUpdatedDateTime"])) {
                return $this->_propDict["lastUpdatedDateTime"];
            } else {
                $this->_propDict["lastUpdatedDateTime"] = new \DateTime($this->_propDict["lastUpdatedDateTime"]);
                return $this->_propDict["lastUpdatedDateTime"];
            }
        }
        return null;
    }

    /**
    * Sets the lastUpdatedDateTime
    *
    * @param \DateTime $val The lastUpdatedDateTime
    *
    * @return UserRegistrationDetails
    */
    public function setLastUpdatedDateTime($val)
    {
        $this->_propDict["lastUpdatedDateTime"] = $val;
        return $this;
    }

    /**
    * Gets the methodsRegistered
    *
    * @return array|null The methodsRegistered
    */
    public function getMethodsRegistered()
    {
        if (array_key_exists("methodsRegistered", $this->_propDict)) {
            return $this->_propDict["methodsRegistered"];
        } else {
            return null;
        }
    }

    /**
    * Sets the methodsRegistered
    *
    * @param string[] $val The methodsRegistered
    *
    * @return UserRegistrationDetails
    */
    public function setMethodsRegistered($val)
    {
        $this->_propDict["methodsRegistered"] = $val;
        return $this;
    }

    /**
    * Gets the systemPreferredAuthenticationMethods
    *
    * @return array|null The systemPreferredAuthenticationMethods
    */
    public function getSystemPreferredAuthenticationMethods()
    {
        if (array_key_exists("systemPreferredAuthenticationMethods", $this->_propDict)) {
            return $this->_propDict["systemPreferredAuthenticationMethods"];
        } else {
            return null;
        }
    }

    /**
    * Sets the systemPreferredAuthenticationMethods
    *
    * @param string[] $val The systemPreferredAuthenticationMethods
    *
    * @return UserRegistrationDetails
    */
    public function setSystemPreferredAuthenticationMethods($val)
    {
        $this->_propDict["systemPreferredAuthenticationMethods"] = $val;
        return $this;
    }

    /**
    * Gets the userDisplayName
    *
    * @return string|null The userDisplayName
    */
    public function getUserDisplayName()
    {
        if (array_key_exists("userDisplayName", $this->_propDict)) {
            return $this->_propDict["userDisplayName"];
        } else {
            return null;
        }
    }

    /**
    * Sets the userDisplayName
    *
    * @param string $val The userDisplayName
    *
    * @return UserRegistrationDetails
    */
    public function setUserDisplayName($val)
    {
        $this->_propDict["userDisplayName"] = $val;
        return $this;
    }

    /**
    * Gets the userPreferredMethodForSecondaryAuthentication
    *
    * @return UserDefaultAuthenticationMethod|null The userPreferredMethodForSecondaryAuthentication
    */
    public function getUserPreferredMethodForSecondaryAuthentication()
    {
        if (array_key_exists("userPreferredMethodForSecondaryAuthentication", $this->_propDict)) {
            if (is_a($this->_propDict["userPreferredMethodForSecondaryAuthentication"], "\Microsoft\Graph\Model\UserDefaultAuthenticationMethod") || is_null($this->_propDict["userPreferredMethodForSecondaryAuthentication"])) {
                return $this->_propDict["userPreferredMethodForSecondaryAuthentication"];
            } else {
                $this->_propDict["userPreferredMethodForSecondaryAuthentication"] = new UserDefaultAuthenticationMethod($this->_propDict["userPreferredMethodForSecondaryAuthentication"]);
                return $this->_propDict["userPreferredMethodForSecondaryAuthentication"];
            }
        }
        return null;
    }

    /**
    * Sets the userPreferredMethodForSecondaryAuthentication
    *
    * @param UserDefaultAuthenticationMethod $val The userPreferredMethodForSecondaryAuthentication
    *
    * @return UserRegistrationDetails
    */
    public function setUserPreferredMethodForSecondaryAuthentication($val)
    {
        $this->_propDict["userPreferredMethodForSecondaryAuthentication"] = $val;
        return $this;
    }

    /**
    * Gets the userPrincipalName
    *
    * @return string|null The userPrincipalName
    */
    public function getUserPrincipalName()
    {
        if (array_key_exists("userPrincipalName", $this->_propDict)) {
            return $this->_propDict["userPrincipalName"];
        } else {
            return null;
        }
    }

    /**
    * Sets the userPrincipalName
    *
    * @param string $val The userPrincipalName
    *
    * @return UserRegistrationDetails
    */
    public function setUserPrincipalName($val)
    {
        $this->_propDict["userPrincipalName"] = $val;
        return $this;
    }

    /**
    * Gets the userType
    *
    * @return SignInUserType|null The userType
    */
    public function getUserType()
    {
        if (array_key_exists("userType", $this->_propDict)) {
            if (is_a($this->_propDict["userType"], "\Microsoft\Graph\Model\SignInUserType") || is_null($this->_propDict["userType"])) {
                return $this->_propDict["userType"];
            } else {
                $this->_propDict["userType"] = new SignInUserType($this->_propDict["userType"]);
                return $this->_propDict["userType"];
            }
        }
        return null;
    }

    /**
    * Sets the userType
    *
    * @param SignInUserType $val The userType
    *
    * @return UserRegistrationDetails
    */
    public function setUserType($val)
    {
        $this->_propDict["userType"] = $val;
        return $this;
    }

}
