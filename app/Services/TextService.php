<?php 

namespace App\Services;


class TextService {

    public function send($request)
    {   
        $resident = $request->user->resident;
        $service = $request->service->name;
        $route = route('resident.requests.index');

        $message = match($request->status) {
            "1" => "Hi! $resident->full_name, your request $service has been approved and it's ready for pick-up. For more info visit the link $route - Barangay Cruz",
            "2" => "Hi! $resident->full_name, unfortunately your request $service has been declined. For more info visit the link $route - Barangay Cruz",
        };

        $ch = curl_init();
        $parameters = array(
            'apikey' => '2d786b4501a4d50bb5e9f7db15943c86', //Your API KEY
            'number' => $resident->contact,
            'message' => $message,
            'sendername' => 'SEMAPHORE'
        );

        curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
        curl_setopt( $ch, CURLOPT_POST, 1 );

        //Send the parameters set above with the request
        curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

        // Receive response from server
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        $output = curl_exec( $ch );
        curl_close ($ch);

        return $output;

    }
}