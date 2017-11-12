<?php

namespace RouteBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="front_home")
     */
    public function frontAction()
    {

        return $this->render("::front.html.twig");
    }
	
     /**
     * @Route("/category/{slug}", name="front_category")
     */
	public function front_category($slug){
        return $this->render("::front.html.twig");
	}
    
    /**
     * @Route("/category/{category}/article/{slug}", name="front_article")
     */
    public function front_article($category, $slug){
         return $this->render("::front.html.twig");
    }
    
    /**
     * @Route("/search", name="front_search")
     */
    public function front_search(){
         return $this->render("::front.html.twig");
    }
    
    /**
     * @Route("/login", name="front_login")
     */
    public function front_login(){
         return $this->render("::front.html.twig");
    }
    
    /*==========================ADMIN==========================*/

    /**
     * @Route("/admin", name="admin_home")
     */
    public function adminAction()
    {
        return $this->render("::admin.html.twig");
    }
    
    /*
     * @Route("/admin/settings/{options}", default={option=null},  name="admin_settings")
     */
    //[options] set to null by default
    public function admin_settings($options){
         return $this->render("::admin.html.twig");
    }
    
    /*
     * @Route("/admin/modules/{options}", default={option=null},  name="admin_modules")
     */
    //with [options] set to null by default
    public function admin_modules($options){
        return $this->render("::admin.html.twig");
    }
    
    /*
     * @Route("/admin/content/{options}", default={option=null},  name="admin_content")
     */
    //with [options] set to null by default
    public function admin_content($options){
        return $this->render("::admin.html.twig");
    }
    
    
}
