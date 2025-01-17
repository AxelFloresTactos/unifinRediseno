<?php
/**
* Copyright (c) Microsoft Corporation.  All Rights Reserved.  Licensed under the MIT License.  See License in the project root for license information.
* 
* UserRegistrationFeatureCount File
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
* UserRegistrationFeatureCount class
*
* @category  Model
* @package   Microsoft.Graph
* @copyright (c) Microsoft Corporation. All rights reserved.
* @license   https://opensource.org/licenses/MIT MIT License
* @link      https://graph.microsoft.com
*/
class UserRegistrationFeatureCount extends Entity
{

    /**
    * Gets the feature
    *
    * @return AuthenticationMethodFeature|null The feature
    */
    public function getFeature()
    {
        if (array_key_exists("feature", $this->_propDict)) {
            if (is_a($this->_propDict["feature"], "\Microsoft\Graph\Model\AuthenticationMethodFeature") || is_null($this->_propDict["feature"])) {
                return $this->_propDict["feature"];
            } else {
                $this->_propDict["feature"] = new AuthenticationMethodFeature($this->_propDict["feature"]);
                return $this->_propDict["feature"];
            }
        }
        return null;
    }

    /**
    * Sets the feature
    *
    * @param AuthenticationMethodFeature $val The value to assign to the feature
    *
    * @return UserRegistrationFeatureCount The UserRegistrationFeatureCount
    */
    public function setFeature($val)
    {
        $this->_propDict["feature"] = $val;
         return $this;
    }
    /**
    * Gets the userCount
    *
    * @return int|null The userCount
    */
    public function getUserCount()
    {
        if (array_key_exists("userCount", $this->_propDict)) {
            return $this->_propDict["userCount"];
        } else {
            return null;
        }
    }

    /**
    * Sets the userCount
    *
    * @param int $val The value of the userCount
    *
    * @return UserRegistrationFeatureCount
    */
    public function setUserCount($val)
    {
        $this->_propDict["userCount"] = $val;
        return $this;
    }
}
