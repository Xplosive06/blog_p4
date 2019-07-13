<?php
/**
 * 
 */
class View
{

    private $template;

    public function __construct($template = null)
    {
        $this->template = $template;
    }

    public function render($params = array(), $start_session = true)
    {
        $session_array = [];

        if($start_session)
        {
            $session_array = $this->startSession();
            if ($session_array) 
            {
                extract($session_array);
            }
        }

        if ($params) 
        {
            extract($params);  
        }

        $template = $this->template;
        ob_start();
        include(VIEW.$template.'.php');
        $contentPage = ob_get_clean();
        include_once (VIEW.'_template.php');
    }

    public function redirect($route)
    {
        header("Location: ".HOST.$route);
    }

    public function startSession()
    {
        session_start();
        $request = $_GET['r'];
        $user_link = 'Non connecté';
        $link_2 = ''; 
        $link_name_2 = '';
        $link_3 = ''; 
        $link_name_3 = '';

        $display = 'style = display:none';

        if(isset($_SESSION['nickname'])){ 
            $user_manager = new UserManager();
            $user = $user_manager->get($_SESSION['nickname']);

            $link_1 = 'home.html';
            $link_name_1 = 'accueil';
            $link_3 = 'disconnection.html';
            $link_name_3 = 'Déconnexion';

        if($user->role() == 'admin')
        {
            $display = 'style = display:block';
            $user_link = '<a href="admin.html">'.$_SESSION['nickname'].'</a>';
            $link_2 = 'admin.html';
            $link_name_2 = 'Administration';
        }
        else
        {
            $display = 'style = display:none';
            $user_link = '<a href="home.html">'.$_SESSION['nickname'].'</a>';
        }
    }
    else
    {
            $link_3 = 'new_connection.html';
            $link_name_3 = 'Inscription';
        if ($request == 'home.html') 
        {
            $link_1 = 'connection.html';
            $link_name_1 = 'connexion';
        }
        else
        {
            $link_1 = 'home.html';
            $link_name_1 = 'accueil';
        }
        $user_link = 'non connecté';
    }


    $session_array = array(
        'user_link'      => $user_link, 
        'request'        => $request, 
        'link_1'         => $link_1,
        'link_name_1'    => $link_name_1,
        'link_2'         => $link_2,
        'link_name_2'    => $link_name_2,
        'link_3'         => $link_3,
        'link_name_3'    => $link_name_3,
        'display'        => $display,
    );

    return $session_array;

}

}