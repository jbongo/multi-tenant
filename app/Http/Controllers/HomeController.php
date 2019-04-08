<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Hyn\Tenancy\Models\Hostname;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;
class HomeController extends Controller
{
    //

    public function index(){
     
    

            $website = new Website;
            $website->uuid = "agence".str_random(10);
            $website->managed_by_database_connection = 'asia';
            app(WebsiteRepository::class)->create($website);

            $hostname = new Hostname;
            $hostname->fqdn = 'luceos.demo.app';
            $hostname = app(HostnameRepository::class)->create($hostname);
            app(HostnameRepository::class)->attach($hostname, $website);
            // dd($website->hostnames);
            // dd($website->uuid); // Unique id
                return view('welcome');
           
    }
}
