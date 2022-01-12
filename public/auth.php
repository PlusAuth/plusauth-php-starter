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
        $oidc->addScope('openid profile email');
        $oidc->setAllowImplicitFlow(true);
        $oidc->addAuthParam(array('response_mode' => 'form_post'));
        $oidc->setRedirectURL('http://localhost:3000/login.php');

        $this->oidc = $oidc;
        $this->postLogoutRedirectUri = "http://localhost:3000/";
    }

    public function login() {
        if ($this->isLoggedIn() == false) {
            $this->oidc->authenticate();
            $this->setAccessToken($this->oidc->getAccessToken());
            $this->setIdToken($this->oidc->getIdToken());
            $this->setUser($this->oidc->requestUserInfo());
        }
    }

    public function logout() {
        // Clear session, user will still be logged in on OP side
        $idToken = $this->getIdToken();
        unset($_SESSION['accessToken']);
        unset($_SESSION['idToken']);
        unset($_SESSION['user']);

        // RP initiated logout, user will be logged out op OP side too
        // Comment next line to see the difference
        return $this->oidc->signOut($idToken, $this->postLogoutRedirectUri);
    }

    public function getIdToken() {
        return $_SESSION['idToken'];
    }

    public function getAccessToken() {
        return $_SESSION['accessToken'];
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
    
    private function setAccessToken($accessToken)
    {
        $_SESSION['accessToken'] = $accessToken;
    }

    private function setUser($user) {
        $_SESSION['user'] = $user;
    }
}

session_start();
$auth = new Auth();
?>