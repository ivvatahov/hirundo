<?php

namespace Proxies\__CG__;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class User extends \User implements \Doctrine\ODM\MongoDB\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'User' . "\0" . 'id', '' . "\0" . 'User' . "\0" . 'username', '' . "\0" . 'User' . "\0" . 'email', '' . "\0" . 'User' . "\0" . 'password', '' . "\0" . 'User' . "\0" . 'salt', '' . "\0" . 'User' . "\0" . 'roles', '' . "\0" . 'User' . "\0" . 'registrationDate', '' . "\0" . 'User' . "\0" . 'followers', '' . "\0" . 'User' . "\0" . 'following', '' . "\0" . 'User' . "\0" . 'verified', '' . "\0" . 'User' . "\0" . 'messages');
        }

        return array('__isInitialized__', '' . "\0" . 'User' . "\0" . 'id', '' . "\0" . 'User' . "\0" . 'username', '' . "\0" . 'User' . "\0" . 'email', '' . "\0" . 'User' . "\0" . 'password', '' . "\0" . 'User' . "\0" . 'salt', '' . "\0" . 'User' . "\0" . 'roles', '' . "\0" . 'User' . "\0" . 'registrationDate', '' . "\0" . 'User' . "\0" . 'followers', '' . "\0" . 'User' . "\0" . 'following', '' . "\0" . 'User' . "\0" . 'verified', '' . "\0" . 'User' . "\0" . 'messages');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (User $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function setId($id)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setId', array($id));

        return parent::setId($id);
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setUsername($username)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUsername', array($username));

        return parent::setUsername($username);
    }

    /**
     * {@inheritDoc}
     */
    public function getUsername()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsername', array());

        return parent::getUsername();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', array($email));

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', array());

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setPassword($password)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPassword', array($password));

        return parent::setPassword($password);
    }

    /**
     * {@inheritDoc}
     */
    public function getPassword()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPassword', array());

        return parent::getPassword();
    }

    /**
     * {@inheritDoc}
     */
    public function setSalt($salt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSalt', array($salt));

        return parent::setSalt($salt);
    }

    /**
     * {@inheritDoc}
     */
    public function getSalt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSalt', array());

        return parent::getSalt();
    }

    /**
     * {@inheritDoc}
     */
    public function addRole($role)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addRole', array($role));

        return parent::addRole($role);
    }

    /**
     * {@inheritDoc}
     */
    public function getRoles()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRoles', array());

        return parent::getRoles();
    }

    /**
     * {@inheritDoc}
     */
    public function setRegistrationDate($registrationDate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRegistrationDate', array($registrationDate));

        return parent::setRegistrationDate($registrationDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getRegistrationDate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRegistrationDate', array());

        return parent::getRegistrationDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setFollowers($followers)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFollowers', array($followers));

        return parent::setFollowers($followers);
    }

    /**
     * {@inheritDoc}
     */
    public function getFollowing()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFollowing', array());

        return parent::getFollowing();
    }

    /**
     * {@inheritDoc}
     */
    public function setFollowing($following)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFollowing', array($following));

        return parent::setFollowing($following);
    }

    /**
     * {@inheritDoc}
     */
    public function addFollowing($followed)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addFollowing', array($followed));

        return parent::addFollowing($followed);
    }

    /**
     * {@inheritDoc}
     */
    public function getFollowers()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFollowers', array());

        return parent::getFollowers();
    }

    /**
     * {@inheritDoc}
     */
    public function removeFollower($follower)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeFollower', array($follower));

        return parent::removeFollower($follower);
    }

    /**
     * {@inheritDoc}
     */
    public function removeFollowing($followed)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeFollowing', array($followed));

        return parent::removeFollowing($followed);
    }

    /**
     * {@inheritDoc}
     */
    public function setVerified($verified)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVerified', array($verified));

        return parent::setVerified($verified);
    }

    /**
     * {@inheritDoc}
     */
    public function isVerified()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'isVerified', array());

        return parent::isVerified();
    }

    /**
     * {@inheritDoc}
     */
    public function getMessages()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMessages', array());

        return parent::getMessages();
    }

    /**
     * {@inheritDoc}
     */
    public function addMessage($message)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addMessage', array($message));

        return parent::addMessage($message);
    }

    /**
     * {@inheritDoc}
     */
    public function setMessages($messages)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMessages', array($messages));

        return parent::setMessages($messages);
    }

}
