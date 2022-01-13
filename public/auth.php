<?php 
require_once('../vendor/autoload.php');
use Jumbojett\OpenIDConnectClient;
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

class Auth {
    /**
     * @var OpenIDConnectClient oidc client
     */
    private $oidc;
    /**
     * @var string uri that user will be redirected to after logout. Make sure to configure it
     * in Post Logout Redirect Uris on the dashboard 
     */
    private $postLogoutRedirectUri;

    public function __construct() {
        $oidc = new OpenIDConnectClient(
            $_ENV['AUTH_URL'],
            $_ENV['CLIENT_ID'],
            $_ENV['CLIENT_SECRET']);

        $oidc->setResponseTypes('id_token token');
        $oidc->addScope(array('openid profile'));
        $oidc->setAllowImplicitFlow(true);
        $oidc->addAuthParam(array('response_mode' => 'form_post'));
        $oidc->setRedirectURL('http://localhost:3000/login.php');
        
        // For development mode only
        $oidc->setVerifyHost(false);
        $oidc->setVerifyPeer(false);

        $this->oidc = $oidc; // Crate oidc object at page load
        $this->postLogoutRedirectUri = "http://localhost:3000/";
    }

    public function login() {
        if ($this->isLoggedIn() == false) {
            $this->oidc->authenticate();
            $this->setIdToken($this->oidc->getIdToken());
            $this->setUser($this->oidc->requestUserInfo());
        }
        // User information is in the session if user logged in
      }

    public function logout() {
        // Clear session, user will still be logged in on PlusAuth
        $idToken = $this->getIdToken();
        unset($_SESSION['idToken']);
        unset($_SESSION['user']);

        // RP initiated logout, user will be logged out from PlusAuth too
        return $this->oidc->signOut($idToken, $this->postLogoutRedirectUri);
    }

    public function getIdToken() {
        return $_SESSION['idToken'];
    }

    public function getUser() {
        return $_SESSION['user'];
    }

    public function isLoggedIn() {
        return $this->getUser() !== null;
    }

    private function setIdToken($idToken)
    {
        $_SESSION['idToken'] = $idToken;
    }
    
    private function setUser($user) {
        $_SESSION['user'] = $user;
    }
}

session_start();
$auth = new Auth();
?>