<?php


use Facebook\Facebook;

class FacebookController extends Controller
{

    protected $facebook;

    public function __construct()
    {
        parent::__construct();

        $this->facebook = new Facebook([
            'app_id' => '885939088185430',
            'app_secret' => '13831a35078ba0b48c9dfc41bdf0d0c0',
            'default_graph_version' => 'v2.5',
        ]);
    }

    public function index()
    {
        $this->render('facebook/index');
    }

    public function listing()
    {
        $data['users'] = [];
        $data['users'][] = ['id' => '10154610951409972', 'name' => 'Dan McConaghey'];

        $this->render('facebook/listing', $data);
    }


    /**
     * Redirect user to facebook login page.
     */
    public function login()
    {
        $helper = $this->facebook->getRedirectLoginHelper();
        $loginUrl = $helper->getLoginUrl(app_url('/facebook/callback'));

        // Redirect to facebook login page.
        header('location: ' . $loginUrl);
        exit;
    }


    /**
     * Redirect user to facebook logout page.
     */
    public function logout()
    {
        $helper = $this->facebook->getRedirectLoginHelper();
        $logoutUrl = $helper->getLogoutUrl($_SESSION['facebook_access_token'], app_url('/facebook'));

        // Redirect to facebook logout page.
        header('location: ' . $logoutUrl);
        exit;
    }

    /**
     * Callback from facebook login.
     */
    public function callback()
    {
        $helper = $this->facebook->getRedirectLoginHelper();

        try {
            $accessToken = $helper->getAccessToken();
        } catch (Exception $e){
            echo 'Error: ' . $e->getMessage();
            exit;
        }

        if (isset($accessToken)) {
            // Store access token in session.
            $_SESSION['facebook_access_token'] = (string)$accessToken;

            header('Location: /facebook/view');
            exit;
        } elseif($helper->getError()) {
            var_dump($helper->getError());
            var_dump($helper->getErrorCode());
            var_dump($helper->getErrorDescription());
        }


    }

    public function view()
    {
        $accessToken = $_SESSION['facebook_access_token'];

        try {
            $response = $this->facebook->get('/me', $accessToken);
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $user = $response->getGraphUser();

        $data['name'] = $user->getName();
        $data['id'] = $user->getId();

        $this->render('facebook/view', $data);
    }

}