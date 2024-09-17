<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Types\Menu;
use App\Types\Sexe;

class TableauController extends Controller
{


    /**
     * Affiche la  liste des  categories
     *
     * @return \Illuminate\Http\Response
     */
    public function tableau ()
    {



        return view('admin.tableau')->with(
            [


            ]


        );


    }



}
