<?php
namespace App\Controller;

use App\Core\Role;
use App\Core\Controller;

class HomeController extends Controller
{
    public function dashboard()
    {
        if ($this->request->isGet()) {
            if (!Role::isRP()) {
                $this->redirectToRoute('login');
            } else {
                dd('dash');
            }
        }
    }
}