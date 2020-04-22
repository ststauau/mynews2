<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class HomeController extends Controller
{
      /**
     * Show Php info *
     */
    public function info()
        {
            echo phpinfo();
        }
        
}

?>
