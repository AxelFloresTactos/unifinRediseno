<?php
/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* UserRegistrationMethodSummary File
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
* UserRegistrationMethodSummary class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class UserRegistrationMethodSummary extends Entity
{
    /**
    * Gets the totalUserCount
    *
    * @return int|null The totalUserCount
    */
    public function getTotalUserCount()
    {
        if (array_key_exists("totalUserCount", $this->_propDict)) {
            return $this->_propDict["totalUserCount"];
        } else {
            return null;
        }
    }

    /**
    * Sets the totalUserCount
    *
    * @param int $val The value of the totalUserCount
    *
    * @return UserRegistrationMethodSummary
    */
    public function setTotalUserCount($val)
    {
        $this->_propDict["totalUserCount"] = $val;
        return $this;
    }

    /**
    * Gets the userRegistrationMethodCounts
    *
    * @return UserRegistrationMethodCount|null The userRegistrationMethodCounts
    */
    public function getUserRegistrationMethodCounts()
    {
        if (array_key_exists("userRegistrationMethodCounts", $this->_propDict)) {
            if (is_a($this->_propDict["userRegistrationMethodCounts"], "\Microsoft\Graph\Model\UserRegistrationMethodCount") || is_null($this->_propDict["userRegistrationMethodCounts"])) {
                return $this->_propDict["userRegistrationMethodCounts"];
            } else {
                $this->_propDict["userRegistrationMethodCounts"] = new UserRegistrationMethodCount($this->_propDict["userRegistrationMethodCounts"]);
                return $this->_propDict["userRegistrationMethodCounts"];
            }
        }
        return null;
    }

    /**
    * Sets the userRegistrationMethodCounts
    *
    * @param UserRegistrationMethodCount $val The value to assign to the userRegistrationMethodCounts
    *
    * @return UserRegistrationMethodSummary The UserRegistrationMethodSummary
    */
    public function setUserRegistrationMethodCounts($val)
    {
        $this->_propDict["userRegistrationMethodCounts"] = $val;
         return $this;
    }

    /**
    * Gets the userRoles
    *
    * @return IncludedUserRoles|null The userRoles
    */
    public function getUserRoles()
    {
        if (array_key_exists("userRoles", $this->_propDict)) {
            if (is_a($this->_propDict["userRoles"], "\Microsoft\Graph\Model\IncludedUserRoles") || is_null($this->_propDict["userRoles"])) {
                return $this->_propDict["userRoles"];
            } else {
                $this->_propDict["userRoles"] = new IncludedUserRoles($this->_propDict["userRoles"]);
                return $this->_propDict["userRoles"];
            }
        }
        return null;
    }

    /**
    * Sets the userRoles
    *
    * @param IncludedUserRoles $val The value to assign to the userRoles
    *
    * @return UserRegistrationMethodSummary The UserRegistrationMethodSummary
    */
    public function setUserRoles($val)
    {
        $this->_propDict["userRoles"] = $val;
         return $this;
    }

    /**
    * Gets the userTypes
    *
    * @return IncludedUserTypes|null The userTypes
    */
    public function getUserTypes()
    {
        if (array_key_exists("userTypes", $this->_propDict)) {
            if (is_a($this->_propDict["userTypes"], "\Microsoft\Graph\Model\IncludedUserTypes") || is_null($this->_propDict["userTypes"])) {
                return $this->_propDict["userTypes"];
            } else {
                $this->_propDict["userTypes"] = new IncludedUserTypes($this->_propDict["userTypes"]);
                return $this->_propDict["userTypes"];
            }
        }
        return null;
    }

    /**
    * Sets the userTypes
    *
    * @param IncludedUserTypes $val The value to assign to the userTypes
    *
    * @return UserRegistrationMethodSummary The UserRegistrationMethodSummary
    */
    public function setUserTypes($val)
    {
        $this->_propDict["userTypes"] = $val;
         return $this;
    }
}
