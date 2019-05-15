<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;
use DateTime;
use DateInterval;
use DatePeriod;

class HomeController extends Controller
{
    public function index()
    {
    	// Making a client request by creating new instance of client
        $client = new Client();
        // 1st param is the API route, 2nd param where we attached the body PHP ARRAY format
        $response = $client->get('http://localhost:3000/api/movies');

	        // Getting the body from $response and convert to PHP ARRAY
	        $movies = json_decode($response->getBody());

        return view('home', compact('movies'));
    }

    public function checkout($theatre_id, $movie_id)
    {


    	if ($theatre_id == 1) {
    	
	    	/*Theaters*/
	    	$client1 = new Client();

	        $response1 = $client1->get('http://localhost:3000/api/theatres');

	        	$theatres = json_decode($response1->getBody());
        }else{
        	/*Theaters*/
	    	$client1 = new Client();

	        $response1 = $client1->get('http://localhost:3000/api/theatres');

	        	$theatres = json_decode($response1->getBody());
	        	

        	$client1 = new Client();

	        $response1 = $client1->get('http://localhost:3000/api/theatres/' . $theatre_id);

	        	$theatre = json_decode($response1->getBody());

        }



        /*Movies*/
        $client2 = new Client();
       
        $response2 = $client2->get('http://localhost:3000/api/movies/' . $movie_id);

        	$movie = json_decode($response2->getBody());


        if ($theatre_id == 1) {
        	
        	return view('checkout', compact('theatres', 'movie'));
        
        }else{
        	
        	$client3 = new Client();

        	$response3 = $client3->get('http://localhost:3000/api/theatres/' . $theatre_id . '/schedule');

        		$schedules = json_decode($response3->getBody());

            foreach($schedules as $schedule){

                $begin = new DateTime($schedule->startdate);
                $end = new DateTime($schedule->enddate);
                $end = $end->modify( '+1 day' );

                $interval = new DateInterval('P1D');
                $daterange = new DatePeriod($begin, $interval ,$end);
            }	
        
        	return view('checkout', compact('theatres', 'theatre', 'movie', 'schedules', 'daterange'));
        }
        

    	
    }

    
}
